<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function(){
    return view('welcome');
});


Auth::routes([
    'login'=>false, // 404 disable
    'register'=>false, // 404 disable
]);


//================ Authinticate ================//
Route::get('signin',[AuthController::class, 'signIn'])->name('signin');
Route::post('signin/store',[AuthController::class, 'signInStore'])->name('signin.store');
Route::get('signup',[AuthController::class, 'signUp'])->name('signup');
Route::post('signup/store',[AuthController::class, 'signUpStore'])->name('signup.store');

//================== Frontend ================//
Route::group(['as'=>'frontend.'], function(){
    //------------ Index page ------------//\
    Route::get('/',[FrontController::class, 'index']);


});


