<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Mail\OrderSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function history() {
        return view('order.history');
    }

    public function success(Request $request) {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
        $order_session = $stripe->checkout->sessions->retrieve($request->query('session_id'));
        $customer_name = $stripe->customers->retrieve($order_session['customer'])['name'];
        $product = Product::where('slug', $order_session['metadata']['product_id'])->first();

        // See if order exists in orders table, if not, create it
        if(!Order::where('stripe_session_id', $request->query('session_id'))->first()) {
            try {
                $order = Order::create([
                    'stripe_session_id' => $request->query('session_id'),
                    'user_id' => User::where('stripe_id', $order_session['customer'])->first()->id,
                    'product_id' => $product->id 
                ]);

                Mail::to($request->user()->email)->send(new OrderSuccess($order));
            } catch (\exception $e) {
                dd($e);
            }
        }

        return view('order.success', [
            'product' => $product,
            'customer_name' => $customer_name
        ]);
    }
}
