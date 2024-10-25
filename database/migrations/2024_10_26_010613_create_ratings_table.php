<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');    // Tham chiếu đến cột 'id' của bảng 'users'
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Liên kết với bảng 'products'
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Liên kết với bảng 'orders'

            // Thêm cột order_item_id và thiết lập khóa ngoại
            $table->unsignedBigInteger('order_item_id');  // Bỏ 'after id'
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');

            // Các cột khác
            $table->integer('rating')->default(0);
            $table->text('review')->nullable();

            // Cột 'hidden', nếu cần sửa lại logic, thay đổi như sau
            $table->boolean('hidden')->default(false);  // Ví dụ giữ nguyên

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
