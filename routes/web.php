<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('/product')->group(function() {
    Route::get('/{product:id}', [ProductController::class, 'show'])->name('product.show');
});

Route::get('/order/success', function(Request $request) {
    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
    $order_session = $stripe->checkout->sessions->retrieve($request->query('session_id'));
    $customer_name = $stripe->customers->retrieve($order_session['customer'])['name'];
    $product = Product::find($order_session['metadata']['product_id']);
    return view('success', [
        'product' => $product,
        'customer_name' => $customer_name
    ]);
});



