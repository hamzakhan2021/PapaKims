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
        $start = '09:00:00';
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

    public function storeOrder(Request $request)
    {
      $food       = $request->input('food');
      $number     = $request->input('number');
      $firstname  = $request->input('firstname');

      $storeOrder = new FoodOrder();
      $storeOrder->food_item  = $food;
      $storeOrder->name       = $firstname;
      $storeOrder->number     = $number;
      $storeOrder->status     = '0';
      $storeOrder->save();

      return View('order-placed');//stripe
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

      // $postCode = PostalCode::where('code', $postalCode)->first();
      //
      // if($postCode == null){
      //   $invalidPost = "Sorry, we do not deliever in this area"
      //     return View('welcomeIndex', compact('foodName'));
      // }

      return View('choose-food');
    }

    public function storeFood(Request $request)
    {
      $foodName = $request->input('invisible');

      return View('add-drink', compact('foodName'));
    }

    public function redirectPay(Request $request)
    {
      $food   = $request->input('food');

      return View('time-pay', compact('food'));
    }

}
