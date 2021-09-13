<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
	public function createSession(Request $request) {
		$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

		$response = $stripe->checkout->sessions->create([
			'success_url' => 'http://127.0.0.1:8000/order/success?session_id={CHECKOUT_SESSION_ID}',
			'cancel_url' => url()->previous(),
			'payment_method_types' => ['card'],
			'line_items' => [
				[
					'name' => $request['name'],
					'amount' => $request['price'],
					'currency' => 'usd',
					'quantity' => 1,
				],
			],
			'mode' => 'payment',
			'metadata' => [ 'product_id' => $request['id'] ],
		]);

		return response()->json([
			'id' => $response['id'],
			'url' => $response['url']
		]);
	}
}
