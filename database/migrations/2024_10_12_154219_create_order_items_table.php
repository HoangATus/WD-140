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
        Schema::create('order_items', function (Blueprint $table) {
        
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            // Tạo trường 'order_id' với kiểu dữ liệu foreign key, liên kết với khóa chính của bảng 'orders'.
            // 'onDelete('cascade')' có nghĩa là nếu một đơn hàng bị xóa, tất cả các mục đơn hàng liên quan sẽ bị xóa theo.
        
            $table->foreignId('variant_id')->constrained()->onDelete('cascade');
            // Tạo trường 'variant_id' với kiểu dữ liệu foreign key, liên kết với khóa chính của bảng 'variants'.
            // 'onDelete('cascade')' có nghĩa là nếu một biến thể sản phẩm bị xóa, tất cả các mục đơn hàng liên quan sẽ bị xóa theo.
        
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // Tạo trường 'product_id' với kiểu dữ liệu foreign key, liên kết với khóa chính của bảng 'products'.
            // 'onDelete('cascade')' có nghĩa là nếu một sản phẩm bị xóa, tất cả các mục đơn hàng liên quan sẽ bị xóa theo.
        
            $table->string('product_name');
            // Tạo trường 'product_name' với kiểu dữ liệu chuỗi (string), dùng để lưu tên sản phẩm.
        
            $table->string('variant_name');
            // Tạo trường 'variant_name' với kiểu dữ liệu chuỗi (string), dùng để lưu tên biến thể của sản phẩm.
        
            $table->bigInteger('price');
            // Tạo trường 'price' với kiểu dữ liệu số nguyên lớn (bigInteger), dùng để lưu giá của sản phẩm tại thời điểm mua.
        
            $table->integer('quantity');
            // Tạo trường 'quantity' với kiểu dữ liệu số nguyên (integer), dùng để lưu số lượng của sản phẩm trong đơn hàng.
        
            $table->string('image');
            // Tạo trường 'image' với kiểu dữ liệu chuỗi (string), dùng để lưu đường dẫn tới hình ảnh của sản phẩm.
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
