<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins')->as('admins.')->middleware('auth.admin')->group(function () {
    // Dashboard cho Admin
    Route::get('/', [RevenueController::class, 'index'])->name('dashboard');

    // Các resource controllers
    Route::resource('users', UserController::class);
    Route::post('users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::post('users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');

    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('attributeSizes', SizeController::class);
    Route::resource('products', ProductController::class);
    Route::get('/products/check-variant-usage/{variantId}', [ProductController::class, 'checkVariantUsage'])
    ->name('products.checkVariantUsage');
    Route::resource('colors', ColorController::class);
    Route::resource('orders', OrderController::class);

    Route::post('logout', [AuthController::class, 'logoutAdmin'])->name('logout');
    Route::resource('news_categories', \App\Http\Controllers\Admin\NewsCategoryController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::post('news/comments/{id}/approve', [NewsController::class, 'approve'])->name('news.comments.approve');
    Route::post('news/comments/{id}/unapprove', [NewsController::class, 'unapprove'])->name('news.comments.unapprove');
    // Routes for revenue statistics
    Route::get('/dashboard/year', [RevenueController::class, 'getRevenueByYear'])->name('dashboard.year');
    Route::get('/dashboard/day', [RevenueController::class, 'getRevenueByDay'])->name('dashboard.day');
    Route::get('/dashboard/revenue', [RevenueController::class, 'getRevenue'])->name('dashboard.revenue');
    Route::get('/dashboard/range', [RevenueController::class, 'getRevenueByRange'])->name('dashboard.range'); // Adjusted to match method name
    Route::get('/dashboard/month', [RevenueController::class, 'getRevenueByMonth'])->name('dashboard.month');

    // Route cho bình luận và đánh giá
    Route::resource('comments', CommentController::class);
    Route::post('/admin/comments/{id}/approve', [CommentController::class, 'approve'])->name('comments.is_approve');
    Route::post('admins/comments/{id}/cancel-approve', [CommentController::class, 'cancelApprove'])->name('comments.cancel_approve');

    Route::resource('ratings', RatingController::class);
    Route::patch('/admin/ratings/{id}/hide', [RatingController::class, 'hide'])->name('ratings.hide');
    Route::patch('/admin/ratings/{id}/unhide', [RatingController::class, 'unhide'])->name('ratings.unhide');

    Route::resource('vouchers', VoucherController::class);
});


