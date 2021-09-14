<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::prefix('/product')->group(function() {
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('product.show');
});

Route::get('/order/success', function(Request $request) {
    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
    $order_session = $stripe->checkout->sessions->retrieve($request->query('session_id'));
    $customer_name = $stripe->customers->retrieve($order_session['customer'])['name'];
    $product = Product::where('slug', $order_session['metadata']['product_id'])->first();
    return view('order.success', [
        'product' => $product,
        'customer_name' => $customer_name
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

