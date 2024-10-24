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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            // Tạo trường 'user_id' với kiểu dữ liệu foreign key, liên kết với trường 'user_id' trong bảng 'users'.
            // 'onDelete('cascade')' có nghĩa là nếu một người dùng bị xóa, tất cả các đơn hàng liên quan sẽ bị xóa theo.
        
            $table->string('order_code');
            // Tạo trường 'order_code' với kiểu dữ liệu chuỗi (string), dùng để lưu mã đơn hàng.
        
            $table->string('name');
            // Tạo trường 'name' với kiểu dữ liệu chuỗi (string), dùng để lưu tên người nhận.
        
            $table->string('phone');
            // Tạo trường 'phone' với kiểu dữ liệu chuỗi (string), dùng để lưu số điện thoại của người nhận.
        
            $table->string('address');
            // Tạo trường 'address' với kiểu dữ liệu chuỗi (string), dùng để lưu địa chỉ giao hàng.
        
            $table->text('notes')->nullable();
            // Tạo trường 'notes' với kiểu dữ liệu văn bản (text), dùng để lưu ghi chú về đơn hàng.
            // Trường này có thể chứa giá trị null (không bắt buộc).
        
            $table->bigInteger('total');
            // Tạo trường 'total' với kiểu dữ liệu số nguyên lớn (bigInteger), dùng để lưu tổng giá trị đơn hàng.
        
            $table->enum('status', ['pending', 'confirmed', 'shipped','delivered', 'completed', 'canceled','failed'])->default('pending');
            // Tạo trường 'status' với kiểu dữ liệu enum, chứa các trạng thái của đơn hàng.
            // Giá trị mặc định của trường này là 'pending', tức là đơn hàng đang chờ xử lý.
        
            $table->string('payment_method')->nullable();
            // Tạo trường 'payment_method' với kiểu dữ liệu chuỗi (string), dùng để lưu phương thức thanh toán.
            // Trường này có thể chứa giá trị null (không bắt buộc).
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
