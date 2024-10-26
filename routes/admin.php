<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::prefix('admins')->as('admins.')->middleware('auth.admin')->group(function () {
    // Dashboard cho Admin
    Route::get('/', function () {
        // Thực hiện các logic cần thiết ở đây
        return app()->make(DashBoardController::class)->index();
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::post('users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::post('users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('attributeSizes', SizeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('ratings', RatingController::class);
    // Route để ẩn, hiện đánh giá
    Route::patch('/admin/ratings/{id}/hide', [RatingController::class, 'hide'])->name('ratings.hide');
    Route::patch('/admin/ratings/{id}/unhide', [RatingController::class, 'unhide'])->name('ratings.unhide');
    Route::resource('comments', CommentController::class);
    Route::post('/admin/comments/{id}/approve', [CommentController::class, 'approve'])->name('comments.is_approve');
    // route hủy phê duyệt
    Route::post('admins/comments/{id}/cancel-approve', [CommentController::class, 'cancelApprove'])->name('comments.cancel_approve');

    Route::post('logout', [AuthController::class, 'logoutAdmin'])->name('logout');
});
