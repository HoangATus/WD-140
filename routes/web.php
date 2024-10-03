<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients\ShopController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PurchasedOrderDetailsController;
use App\Http\Controllers\OrdersuccessController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\CartController;

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
Route::resource('/', ShopController::class);
Route::resource('/cart', CartController::class);
Route::resource('/', ShopController::class);
Route::resource('/purchased', PurchasedOrderDetailsController::class);
// Route::get('/admin/danhmucs', function () {
//     return view('admins.danhmucs.index');
//     Route::resource('categories', CategoryController::class);

// });
Route::resource('/home', ShopController::class);
Route::resource('/profile', ProfileController::class);


Route::resource('/checkout', CheckoutController::class);
Route::resource('/orderSuccess', OrdersuccessController::class);

Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/password/reset', [AuthController::class, 'showformRequest'])->name('password.request');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/product', ProductController::class);

// admin
Route::get('/admin/login', [AuthController::class, 'showFormLoginAdmin'])->name('admin.login'); // Đặt tên route hợp lệ
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.post'); // Đặt tên route hợp lệ
Route::post('/admin/logout', [AuthController::class, 'logoutAdmin'])->name('admin.logout');

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/danhmucs', function () {
        return view('admins.danhmucs.index');
    });
});
