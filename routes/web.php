<?php

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\ProductController as ClientsProductController;
use App\Http\Controllers\Clients\ShopController;
use App\Http\Controllers\OrdersuccessController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\PurchasedOrderDetailsController;

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


// Route cho trang chủ
Route::get('/', [ShopController::class, 'index'])->name('home'); // Giả định phương thức index cho ShopController

// Route cho sản phẩm
Route::resource('/products', ProductController::class)->parameters([
    'products'=> 'slug'
]);


// Route cho giỏ hàng

Route::resource('/cart', CartController::class);

// Route cho đơn hàng đã mua
Route::resource('/purchased', PurchasedOrderDetailsController::class);


// Route cho trang admin
Route::get('/admin/danhmucs', function () {
    return view('admins.danhmucs.index');
});

// Route cho hồ sơ người dùng

Route::resource('/profile', ProfileController::class);

// Route cho thanh toán
Route::resource('/checkout', CheckoutController::class);

// Route cho thành công đơn hàng
Route::resource('/orderSuccess', OrdersuccessController::class);

// Route cho đăng nhập và đăng ký
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route cho đặt lại mật khẩu
Route::get('/password/reset', [AuthController::class, 'showformRequest'])->name('password.request');

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



