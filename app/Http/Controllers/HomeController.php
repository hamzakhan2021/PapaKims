<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
  protected $foodName;

  public function __construct(Request $request)
  {
      // $this->request      = $request;
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
        $start = '06:00:00';
        $end   = '20:00:00';
        $now   = Carbon::now();
        $time  = $now->format('H:i:s');
        //dd($time);
        if ($time >= $start && $time <= $end) {
            return View('welcomeIndex');
        } else {
          return View('index');
        }
      } else {
        return View('index');
      }
    }

    public function storeOrder(Request $request)
    {
      $number = $request->input('number');
      $firstname = $request->input('firstname');
      //store order in db
      return View('order-placed');
    }



    public function getPostalCode(Request $request)
    {
      $postalCode = $request->input('post-code');
      return View('choose-food');
    }

    public function storeFood(Request $request)
    {
      $foodName = $request->input('invisible');
      $this->foodName = $foodName;
      return View('add-drink', compact('foodName'));
    }

    public function redirectPay(Request $request)
    {
      $food   = $request->input('food');
      return View('time-pay', compact('food'));
    }
}
