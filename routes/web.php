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
use App\Http\Controllers\Clients\CommentController;
use App\Http\Controllers\Clients\FavoriteController;
use App\Http\Controllers\Clients\OrderController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\DetailsofpurchaseorderController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\MyOrderController;
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
    'products' => 'slug'
]);

Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comments.store');
// Route::post('products/{product}/comments', [ClientsCommentController::class, 'store'])->middleware('auth');


// Route cho giỏ hàng

Route::middleware(['web'])->group(function () {
    // Giỏ Hàng
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
    Route::get('/cart/modal', [CartController::class, 'modal'])->name('cart.modal');

    // Thanh Toán
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // Đơn Hàng
    Route::middleware(['auth'])->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

        Route::post('/orders/{id}/repurchase', [OrderController::class, 'repurchase'])->name('orders.repurchase');

        Route::get('/my-orders', [MyOrderController::class, 'index'])->name('orders.index');
        Route::get('/my-orders/{order}', [MyOrderController::class, 'show'])->name('orders.show');

        // Route DELETE cho cancel
        Route::post('/my-orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
        Route::post('/my-orders/{order}/reorder', [OrderController::class, 'reorder'])->name('orders.reorder');
        Route::get('/my-orders/{order}/cancel', [OrderController::class, 'showCancelForm'])->name('orders.cancel.form');

        // Route san pham yeu thich
        Route::post('/favorites', [FavoriteController::class, 'store'])->name('clients.favorites.store');
        Route::get('/favorites', [FavoriteController::class, 'index'])->name('clients.favorites.index');
    });
});

// Route cho đơn hàng đã mua
Route::resource('/purchased', PurchasedOrderDetailsController::class);
Route::get('/shop/category/{id}', [ShopController::class, 'listByCategory'])->name('shop.category');

// Route cho trang admin
Route::get('/admin/danhmucs', function () {
    return view('admins.danhmucs.index');
});

// Route cho hồ sơ người dùng

Route::resource('/profile', ProfileController::class);

// Route cho thanh toán


// Route cho đăng nhập và đăng ký
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route cho đặt lại mật khẩu
Route::get('/password/reset', [AuthController::class, 'showformRequest'])->name('password.request');

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/orders/{order}/confirm-receipt', [OrderController::class, 'confirmReceipt'])->name('orders.confirm-receipt');
