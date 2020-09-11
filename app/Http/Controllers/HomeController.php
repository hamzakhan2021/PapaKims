<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Friend;
use App\FoodOrder;
use App\Player;
use App\PostalCode;

class HomeController extends Controller
{
  protected $foodName;

  public function __construct(Request $request)
  {
      $this->foodName     = $request->input('invisible');;
  }

    public function index()
    {
      $weekMap = [
          0 => 'SU',
          1 => 'MO',
          2 => 'TU',
          3 => 'WE',
          4 => 'TH',
          5 => 'FR',
          6 => 'SA',
      ];
      $dayOfTheWeek = Carbon::now()->dayOfWeek;
      $weekday = $weekMap[$dayOfTheWeek];
      if($weekday == 'WE' || $weekday == 'TH' || $weekday == 'FR' || $weekday == 'SA' || $weekday == 'SU')
      {
        $start = '01:00:00';
        $end   = '20:00:00';
        $now   = Carbon::now();

        $time  = $now->format('H:i:s');

        if ($time >= $start && $time <= $end) {
            return View('welcomeIndex');
        } else {
          return View('index');
        }
      } else {
        return View('index');
      }
    }

    public function getScore(Request $request)
    {
      $score        = $request->input('score');
      $playerNumber = $request->input('number1');

      $player = new Player();
      $player->number = $playerNumber;
      $player->score  = $score;
      $player->status = 1;
      $player->save();

      return 0;
    }

    public function getPlayerNumber(Request $request)
    {
        $number = $request->input('phone_number');

        $check = Player::where('number',$number)->whereDate('created_at', Carbon::today())->get();

        if(count($check) > 0){
          $messageUserLimit = "You have played for today, please come again tomorrow";
          return View('index', compact('messageUserLimit'));
        }

        return View('snake', compact('number'));
    }

    public function getChooseFoodView()
    {
      return View('choose-food');
    }

    public function storeOrder(Request $request)
    {
      $food       = $request->input('food');
      $number     = $request->input('number');
      $firstname  = $request->input('firstname');

      $storeOrder = new FoodOrder();
      $storeOrder->food_item  = $food;
      $storeOrder->name       = $firstname;
      $storeOrder->number     = $number;
      $storeOrder->status     = 0;
      $storeOrder->save();

      return View('stripe', compact('storeOrder'));//stripe
    }

    public function sendFriend(Request $request)
    {
      $number     = $request->input('number');
      $firstname  = $request->input('firstname');

      $saveFriend = new Friend();
      $saveFriend->name   = $firstname;
      $saveFriend->number = $number;
      $saveFriend->status = 1;
      $saveFriend->save();

      $message = "NOODS send successfully!";

      return View('order-placed', compact('message'));
    }

    public function getPostalCode(Request $request)
    {
      $postalCode = $request->input('post-code');

      $postCode = PostalCode::where('code', $postalCode)->first();

      if($postCode == null){
        $invalidPost = "Sorry, we do not deliever in this area";
        return View('welcomeIndex', compact('invalidPost'));
          // return View('welcomeIndex', compact('invalidPost'));
      }

      return View('choose-food');
    }

    public function storeFood(Request $request)
    {
      $quantity1 = $request->input('quantity1');
      $quantity2 = $request->input('quantity2');
      $quantity3 = $request->input('quantity3');

      $noodle1 = '';
      $noodle2 = '';
      $noodle3 = '';
      $noodleQuantity1 = '';
      $noodleQuantity2 = '';
      $noodleQuantity3 = '';
      if(isset($quantity1) && $quantity1 > 0){
        $noodle1            = 'NOODLES WITH KIMCHI and mushrooms, very tasty';
        $noodleQuantity1    = $quantity1;
      }
      if(isset($quantity2) && $quantity2 > 0){
        $noodle2 = 'NOODLES WITH MISO and mushrooms, very tasty';
        $noodleQuantity2    = $quantity2;
      }
      if(isset($quantity3) && $quantity3 > 0){
        $noodle3            = 'NOODLES WITH HAPPY and mushrooms, very tasty';
        $noodleQuantity3    = $quantity3;
      }

      return View('time-pay', compact(['noodle1','noodleQuantity1','noodle2','noodleQuantity2','noodle3','noodleQuantity3']));
    }

    public function redirectPay(Request $request)
    {
      $food       = $request->input('food');
      $skipdrink   = $request->input('skipDrink');
      $notSkip = "";
      $notSkipamou = "";
      if($skipdrink == null){
        $notSkip = '1x lychee juice';
        $notSkipamou = '2.00';
      }
      return View('time-pay', compact(['food','notSkip','notSkipamou']));
    }

}
