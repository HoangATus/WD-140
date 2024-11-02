<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã voucher
            $table->enum('discount_type', ['fixed', 'percent']); // Loại giảm giá: 'fixed' (theo mệnh giá) hoặc 'percent' (theo %)
            $table->decimal('discount_value', 10, 2)->nullable(); // Giá trị giảm giá nếu là theo mệnh giá
            $table->decimal('discount_percent', 5, 2)->nullable(); // % giảm giá, có thể null nếu không phải theo %
            $table->decimal('max_discount_amount', 10, 2)->nullable(); // số tiền giảm tối đa
            $table->integer('quantity')->default(1); // Số lượng voucher có sẵn
            $table->date('start_date'); // ngày bắt đầu
            $table->date('end_date'); // ngày kết thúc
            $table->boolean('is_active')->default(true); // Trạng thái hoạt động (1: Hoạt động, 0: Không hoạt động)
            $table->boolean('is_public')->default(true); // Có phải là voucher công khai không
            $table->unsignedBigInteger('created_by')->nullable(); // ID của người tạo voucher
            $table->timestamps();
        });
        
        Schema::create('user_voucher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Cột này là khóa ngoại
            $table->unsignedBigInteger('voucher_id');
            $table->timestamps();
        
            // Ràng buộc khóa ngoại đúng đến cột user_id trong bảng users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
        });
        
        
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('user_voucher'); // Xóa bảng user_voucher trước
        Schema::dropIfExists('vouchers'); // Xóa bảng vouchers
    }
};
