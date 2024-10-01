<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;




Route::prefix('admins')->as('admins.')->group(function () {
    // Dashboard cho Admin
    Route::get('/', function () {
        return view('admins.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
});
