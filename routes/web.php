<?php

use App\Http\Controllers\Backend\User\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function(){
    return view('welcome');
});

Auth::routes([
    'register'=>false, // 404 disable
    'logout'=>false, // 404 disable
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

    });

});



//================ User Route ==============//
Route::group(['as'=>'user.','middleware'=>['auth','is_user']], function(){
    //------------ Index page ------------//\
    Route::get('dashbaord',[DashboardController::class, 'dashboard'])->name('dashboard');
});


