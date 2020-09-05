<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Traits\Order;

class StripePaymentController extends Controller
{
  use Order;
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => ""
        ]);

        Session::flash('success', 'Payment successful!');

        $objectData   = $request->input('orderDetails');
        $arrayData    = json_decode(json_encode($objectData),true);
        $arrayData    = json_decode($arrayData);
        $this->getPaymentStatus($arrayData);

        return view('order-placed');
    }
}
