<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
	public function createSession(Request $request) {
		$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

		$response = $stripe->checkout->sessions->create([
			'success_url' => 'http://127.0.0.1:8888/order/success?session_id={CHECKOUT_SESSION_ID}',
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
			'customer' => $request['customerId']
		]);

		return response()->json([
			'id' => $response['id'],
			'url' => $response['url']
		]);
	}

	public function addPaymentMethod(Request $request) {
		$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
		$customer_id = auth()->user()->stripe_id;

		$card_response = $stripe->paymentMethods->create([
			'type' => 'card',
			'card' => [
				'number' => $request['number'],
				'exp_month' => $request['exp_month'],
				'exp_year' => $request['exp_year'],
				'cvc' => $request['cvc'],
			],
		]);

		$response = $stripe->paymentMethods->attach([
			$card_response['id'],
			[ 'customer' => $customer_id ]
		]);


		return $response;
	}
}
