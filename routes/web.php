<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function() {
    return view('shop.index');
})->name('shop.index');

Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/manage/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/manage/products/new', [ProductController::class, 'create'])->name('product.create');
    Route::get('/manage/products/edit/{product:slug}', [ProductController::class, 'edit'])->name('product.edit');
});

Route::prefix('/product')->group(function() {
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('product.show');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/order/success', [OrderController::class, 'success']);
    Route::get('/orders', [OrderController::class, 'history'])->name('order.history');
    Route::get('/download/{filename}', [FileController::class, 'download'])->name('file.download');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

require __DIR__.'/fortify.php';