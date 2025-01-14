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
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Clients\CommentController;
use App\Http\Controllers\Clients\ContactController;
use App\Http\Controllers\Clients\FavoriteController;
use App\Http\Controllers\Clients\OrderController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\DetailsofpurchaseorderController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\PurchasedOrderDetailsController;
use App\Http\Controllers\ReviewController;



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
Route::get('/blog', [ShopController::class, 'blog'])->name('clients.blog');
Route::get('blog/{slug}', [ShopController::class, 'blogDetail'])->name('clients.blogDetail');
Route::post('/blog/{newsId}/comment', [ShopController::class, 'storeComment'])->name('comments.storeComment');
Route::delete('/comments/{id}', [ShopController::class, 'deleteComment'])->name('comments.delete');
Route::put('/comments/{id}', [ShopController::class, 'updateComment'])->name('comments.update');

// Route cho sản phẩm
Route::resource('/products', ProductController::class)->parameters([
    'products' => 'slug'
]);
//Route comment
Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comments.store');

// Route cho giỏ hàng

Route::middleware(['web'])->group(function () {
    // Giỏ Hàng
    Route::middleware(['auth'])->group(function () {
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
        Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
        Route::get('/cart/modal', [CartController::class, 'modal'])->name('cart.modal');
        Route::post('/checkout/apply-loyalty-points', [CheckoutController::class, 'applyLoyaltyPoints'])->name('checkout.apply.loyalty.points');
        Route::post('/cart/apply-loyalty-points', [CartController::class, 'applyLoyaltyPoints'])->name('cart.applyLoyaltyPoints');
        Route::post('/cart/proceedToCheckout', [CartController::class, 'proceedToCheckout'])->name('cart.proceedToCheckout');
        Route::post('/cart/update-total', [CartController::class, 'updateCarTotal'])->name('cart.updateTotal');
        Route::delete('/cart/{variant_id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

        // Thanh Toán
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

        Route::get('/checkout2', [CheckoutController::class, 'checkout2'])->name('checkout.checkout2');
        Route::post('/checkout2/process2', [CheckoutController::class, 'process2'])->name('checkout2.process2');
        Route::get('/voucher-details/{id}', [CheckoutController::class, 'detailVoucher'])->name('clients.checkout.voucher');
        Route::get('/user-vouchers', [CheckoutController::class, 'getUserVouchers']);
        Route::get('/apply-voucher/{id}', [CheckoutController::class, 'applyVoucher']);
        Route::get('/check-voucher/{code}', [CheckoutController::class, 'checkVoucher'])->name('check.voucher');
        Route::post('/save-voucher', [CheckoutController::class, 'saveVoucher']);
        Route::get('/vnpay-callback', [CheckoutController::class, 'vnpayCallback'])->name('vnpay.callback');
        Route::get('checkout2/pending/{order}', [CheckoutController::class, 'pending'])->name('checkout.pending');
        Route::get('my-orders/{id}/retry-payment', [OrderController::class, 'retryPayment'])->name('clients.retryPayment');
        Route::post('my-orders/{id}/process-retry-payment', [OrderController::class, 'processRetryPayment'])->name('orders.processRetryPayment');

        // Đơn Hàng

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
        Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('clients.favorites.destroy');

        //Route thông tin tài khoản
        // Route::resource('/profile', ProfileController::class);
        // Route::get('/profile', [ProfileController::class, 'index'])->name('clients.profile.index');
        // Route::get('/profile/{user_id}/edit', [ProfileController::class, 'edit'])->name('clients.profile.edit');
        // Route::put('/profile/{user_id}/update', [ProfileController::class, 'update'])->name('clients.profile.update'); 
        Route::resource('/profile', ProfileController::class);
    });
});

// Route cho đơn hàng đã mua
Route::resource('/purchased', PurchasedOrderDetailsController::class);
Route::get('/shop/category/{id}', [ShopController::class, 'listByCategory'])->name('shop.category');

// Route cho trang admin
Route::get('/admin/danhmucs', function () {
    return view('admins.danhmucs.index');
});



// Route cho đăng nhập và đăng ký
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route cho đặt lại mật khẩu
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/orders/{order}/confirm-receipt', [OrderController::class, 'confirmReceipt'])->name('orders.confirm-receipt');

// Route cho đánh giá sản phẩm
Route::middleware(['auth'])->group(function () {
    Route::post('/orders/{order}/rate', [OrderController::class, 'rateProduct'])->name('orders.rate');
    // Route::post('/orders/rate/{product_id}', [OrderController::class, 'rateProduct'])->name('orders.rate');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('clients.favorites.store');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('clients.favorites.index');
});

// route trang gioi thieu
Route::get('/gioi-thieu', function () {
    return view('clients.introduce');
})->name('about');

// lien he
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');



Route::get('/admin/dashboard', [RevenueController::class, 'index'])->name('admin.dashboard');
