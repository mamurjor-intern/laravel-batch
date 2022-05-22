<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;


//================== Admin Route Group =================//
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','is_admin']], function(){
    //---------------- Dashboard ---------------//
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    //---------------- Category -----------------//
    Route::resource('categories',CategoryController::class)->except(['show','create','destroy']);
    Route::post('category/get-data',[CategoryController::class, 'categoryData'])->name('category.get-data');
    Route::post('category/delete',[CategoryController::class, 'delete'])->name('categories.delete');
    //----------------- Category Status ----------------//
    Route::post('category/status',[CategoryController::class, 'categoryStatus'])->name('categories.status');

});

