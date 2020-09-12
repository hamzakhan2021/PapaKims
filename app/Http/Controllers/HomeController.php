<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Friend;
use App\FoodOrder;
use App\Player;
use App\PostalCode;
use App\Order;

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
        $end   = '24:00:00';
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
      $noodle1                  = $request->input('noodle1');
      $noodleQuantity1          = $request->input('noodleQuantity1');
      $noodle2                  = $request->input('noodle2');
      $noodleQuantity2          = $request->input('noodleQuantity2');
      $noodle3                  = $request->input('noodle3');
      $noodleQuantity3          = $request->input('noodleQuantity3');
      $number                   = $request->input('number');
      $firstname                = $request->input('firstname');
      $address                  = $request->input('address');

      $total = 0;
      $storeCust = new FoodOrder();
      $storeCust->name       = $firstname;
      $storeCust->number     = $number;
      $storeCust->address    = $address;
      $storeCust->status     = 0;
      $storeCust->save();

      if($noodle1 != null){
        $order = new Order();
        $order->cust_id     = $storeCust->id;
        $order->food        = $noodle1;
        $order->quantity    = $noodleQuantity1;
        $order->unit_price  = $noodleQuantity1*5.00;
        $order->save();
        $total = ($noodleQuantity1 + $total)*5.00;
      }
      if($noodle2 != null){
        $order = new Order();
        $order->cust_id     = $storeCust->id;
        $order->food        = $noodle2;
        $order->quantity    = $noodleQuantity2;
        $order->unit_price  = $noodleQuantity2*5.00;
        $order->save();
        $total = ($noodleQuantity2 + $total)*5.00;
      }
      if($noodle3 != null){
        $order = new Order();
        $order->cust_id     = $storeCust->id;
        $order->food        = $noodle3;
        $order->quantity    = $noodleQuantity3;
        $order->unit_price  = $noodleQuantity3*5.00;
        $order->save();
        $total = ($noodleQuantity3 + $total)*5.00;
      }

       $total = $total + 0.7;
      // dd($total+0);
      return View('stripe', compact(['storeCust','total']));//stripe
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

      $noodle1 = null;
      $noodle2 = null;
      $noodle3 = null;
      $noodleQuantity1 = null;
      $noodleQuantity2 = null;
      $noodleQuantity3 = null;
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
