<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51HtazaKuw1q3WCZyi2il60ukWrq0cNuICJ8fNDQaN11FmQh9fb6mkWrYyFG34dfLIbp68BCrzsobxMPd0sHEkIUd00U3rg7MtE');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Furkan Yildirim',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
