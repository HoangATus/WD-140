<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersuccessController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PurchasedOrderDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\ProductController as ClientsProductController;
use App\Http\Controllers\Clients\ShopController;

// use App\Http\Controllers\Clients\ShopController;


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

// Route cho trang chủ
Route::get('/', [ShopController::class, 'index'])->name('home.index');

Route::resource('/cart', CartController::class);
Route::resource('/purchased', PurchasedOrderDetailsController::class);

Route::resource('/profile', ProfileController::class);


Route::resource('/checkout', CheckoutController::class);
Route::resource('/orderSuccess', OrdersuccessController::class);

Route::resource('/profile',ProfileController::class);

Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::resource('/detailProduct', ProductDetailController::class);
Route::get('/password/reset', [AuthController::class, 'showformRequest'])->name('password.request');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/products', ClientsProductController::class);