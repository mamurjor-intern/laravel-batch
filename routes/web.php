<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Backend\User\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;

Route::get('/', function(){
    return view('welcome');
});

Auth::routes([
    'register' => false,   // 404 disable
    'logout'   => false,   // 404 disable
    'verify'   => true
]);

//================ Authinticate ================//
Route::get('signin',[AuthController::class, 'signIn'])->name('signin');
Route::post('signin/store',[AuthController::class, 'signInStore'])->name('signin.store');
Route::get('signup',[AuthController::class, 'signUp'])->name('signup');
Route::post('signup/store',[AuthController::class, 'signUpStore'])->name('signup.store');

Route::get('logout',[AuthController::class, 'logOut'])->name('logout');

//================== Frontend ================//
Route::group(['as'=>'frontend.'], function(){
    //------------ Index page ------------//\
    Route::get('/',[FrontController::class, 'index']);
    //---------------- Product -----------------//
    Route::group(['as'=>'product.'], function(){
        Route::post('product/quick-view',[ProductController::class, 'quickView'])
            ->name('quick-view');
        Route::post('product/add-to-cart/modal',[ProductController::class, 'addToCartModal'])
            ->name('add-to-cart.modal');
        //--------------- Mini Cart -----------------//\
        Route::get('mini/cart', [CartController::class, 'miniCartGet'])->name('mini-cart.data');
    });

    //------------------ Cart ------------------//
    Route::get('cart', [CartController::class, 'cartIndex'])->name('cart.index');
    Route::post('cart/get-product', [CartController::class, 'cartProducts'])
        ->name('product.cart.get-product');

    //------------------ Product Cart Remove ----------------//
    Route::post('product/cart-remove', [CartController::class, 'productCartRemove'])
        ->name('product.cart.remove');

    Route::get('contact', [ContactController::class, 'index'])
        ->name('index');

    Route::post('contact/store', [ContactController::class, 'storeMail'])
        ->name('contact-mail');

    //------------------ Checkout ----------------//
    Route::get('checkout',[CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/store',[CheckoutController::class, 'checkoutStore'])->name('checkout.store');

});

//================ User Route ==============//
Route::group(['prefix'=>'user/','as'=>'user.','middleware'=>['auth','is_user','verified']], function(){
    //------------ Index page ------------//
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
});


