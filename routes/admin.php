<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\PostManageController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\SettingController;

//================== Admin Route Group =================//
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','is_admin']], function(){
    //---------------- Dashboard ---------------//
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix'=>'ecommerce'], function(){
        //---------------- Category -----------------//
        Route::resource('categories',CategoryController::class)->except(['show','create','destroy']);
        Route::post('category/get-data',[CategoryController::class, 'categoryData'])->name('category.get-data');
        Route::post('category/delete',[CategoryController::class, 'delete'])->name('categories.delete');
        //----------------- Category Status ----------------//
        Route::post('category/status',[CategoryController::class, 'categoryStatus'])
            ->name('categories.status');
        //---------------- Products ---------------//
        Route::resource('products', ProductController::class);
        Route::post('products/get-data', [ProductController::class,'productGetData'])
            ->name('products.get-data');
    });

    //------------------ Blog -----------------//
    Route::group(['prefix'=>'blog','as'=>'blogs.'], function(){
        //--------------- Categories ---------------//
        Route::get('categories',[PostManageController::class, 'categoryIndex'])->name('categories.index');
        Route::get('categories/create',[PostManageController::class, 'categoryCreate'])->name('categories.create');
        Route::post('categories/store',[PostManageController::class, 'categoryStore'])->name('categories.store');
        Route::get('categories/{id}/edit',[PostManageController::class, 'categoryEdit'])->name('categories.edit');
        Route::put('categories/{id}/update',[PostManageController::class, 'categoryUpdate'])->name('categories.update');
        Route::delete('categories/destroy/{id}',[PostManageController::class, 'categoryUpdate'])->name('categories.destroy');
        //------------------ Posts -----------------//
        Route::resource('posts', PostManageController::class);
    });

    //----------------- Setting ----------------//
    Route::group(['prefix'=>'setting','as'=>'setting.'], function(){
        Route::get('general',[SettingController::class,'general'])->name('general.index');
        Route::post('general/store',[SettingController::class,'generalStore'])
            ->name('general.store');
    });

});

