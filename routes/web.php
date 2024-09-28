<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Clients\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/',ShopController::class);

Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/detailProduct', ProductDetailController::class);

// admin
Route::get('/admin', [AuthController::class, 'showFormLoginAdmin']);
Route::post('/admin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
