<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::controller(UserController::class)->group(function(){
    Route::get('/users/register', 'create')->name('user.form');
    Route::get('/login', 'Login')->name('user.login');
    Route::post('/registrer', 'registration')->name('user.registration');
    Route::post('/logout', 'Logout')->name('user.logout');
    Route::post('/users', 'validarSesion')->name('user.validate');
    Route::put('/user/{id}', 'update')->name('user.put');
    Route::put('/img/{id}', 'actImage')->name('user.img');
    Route::get('/profile',function(){
        return view('users.profile');
    })->name('profile');

    Route::get('/ordersUser', function (){
       return view('users.orders');
    })->name('ordersUser');
    Route::get('historySales', function (){
       return view('users.historySales');
    })->name('Hsales');
    Route::get('/cart',function (){
      return view('users.cart');
    })->name('cart');

});


Route::controller(CarritoController::class)->group(function(){
    Route::get('/carrito/{id}', 'addCarrito')->name('carrito.add');
    Route::get('/carritos/destroy', 'destroyCarrito')->name('carrito.destroy');
});

Route::get('/', function () {
    return view('users.index');
})->name('index');
Route::get('/wishlist', function () {
    return view('users.wishlist');
})->name('wishlist');

Route::controller(WishlistController::class)->group(function(){
   
    Route::get('/wishlist/add/{id}', 'store')->name('wishlist.add');
});
Route::controller(\App\Http\Controllers\SaleController::class)->group(function (){
    Route::put('/sales/put/{id}','update')->name('sales.put');
    Route::get('/sale/add', 'create')->name('sale.add');
});

Route::middleware('isAdmin')->group(function(){
    Route::get('/admin', function (){
        return view('admin.managerProducts');
    })->name('adminProducts');

    Route::get('/adminUser',function(){
        return view('admin.managerUsers');
    })->name('adminUsers');

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products/register', 'create')->name('product.form');
        Route::post('/product', 'store')->name('product.register');
        Route::get('/products/edit/{id}', 'edit')->name('product.edit');
        Route::put('/product/{id}', 'update')->name('product.put');

    });

    Route::controller(UserController::class)->group(function(){
        Route::post('/user', 'store')->name('user.register');
        Route::get('/users/edit/{id}', 'edit')->name('user.edit');
  
    });
});


