<?php

use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

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
});

//================== Admin Route Group =================//
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    //---------------- Dashboard ---------------//
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    //---------------- Category -----------------//
    Route::resource('categories',CategoryController::class);
});
