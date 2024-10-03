<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Route;




Route::prefix('admins')->as('admins.')->group(function () {
    // Dashboard cho Admin
    Route::get('/', function () {
        return view('admins.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class); 
    Route::resource('attributeSizes', SizeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('colors',ColorController::class);
    

});
