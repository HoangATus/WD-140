<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Clients\ShopController;
use App\Http\Controllers\PurchasedOrderDetailsController;
use App\Http\Controllers\OrdersuccessController;
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
Route::resource('/purchased', PurchasedOrderDetailsController::class);
Route::get('/admin/danhmucs', function () {
    return view('admins.danhmucs.index');
});
Route::resource('/', ShopController::class);
Route::resource('/profile', ProfileController::class);

Route::resource('/checkout', CheckoutController::class);
Route::resource('/orderSuccess', OrdersuccessController::class);

Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::resource('/detailProduct', ProductDetailController::class);
