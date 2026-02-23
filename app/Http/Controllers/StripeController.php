<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    // public function index(Reservation $reservation)
    // {
    //     return view('stripe.index', compact($reservation));
    // }

    public function checkout()
    {        
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            
                            'name' => 'get room',
                        ],
                        'unit_amount' => 5000,
                    ],
                    'quantity' => 1,
                ],
            ],
            'metadata' => [
                'type' => 'send_money',
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);

        return view('stripe.success', compact('session'));
    }
}