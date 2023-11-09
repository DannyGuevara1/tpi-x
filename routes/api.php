<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'ShowUsers')->name('users.all');
    Route::get('/users/{id}', 'ShowUser')->name('users.one');
    Route::delete('/users/delete/{id}', 'destroy')->name('user.delete');
    Route::get('/orders', 'showSales')->name('orders');
    Route::get('/historySales','showSalesBuy')->name('historySales');


});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'ShowProducts')->name('products.all');
    Route::delete('/products/delete/{id}', 'destroy')->name('product.delete');
    Route::get('/products/{id}', 'ShowProduct')->name('product.one');
    Route::get('/products/category/{category}', 'showCategory')->name('product.category');
    Route::get('/products/price/{inicio}/{final}', 'showRangePrice')->name('product.rangePrice');

});
Route::controller(CarritoController::class)->group(function(){
    Route::get('/carrito', 'showCarProducts')->name('carrito.show');
    Route::delete('/carrito/delete/{id}', 'destroy')->name('carrito.delete');
});

Route::controller(\App\Http\Controllers\SaleController::class)->group(function (){
    Route::delete('/sales/delete/{id}','destroy')->name('sales.delete');
});

Route::controller(WishlistController::class)->group(function(){
    Route::get('/wishlistAll','index')->name('wishlist.all');
    Route::delete('/wishlistDelete/{id}','destroy')->name('wishlist.delete');
});





