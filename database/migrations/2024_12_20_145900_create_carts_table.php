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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Khai báo cột user_id
            $table->unsignedBigInteger('product_id'); // Khai báo cột product_id
            $table->string('product_name');
            $table->string('variant_name');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->string('image');
            $table->integer('stock');
            $table->timestamps();

            // Tạo khóa ngoại cho user_id tham chiếu đến user_id trong bảng users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            // Tạo khóa ngoại cho product_id tham chiếu đến id trong bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
