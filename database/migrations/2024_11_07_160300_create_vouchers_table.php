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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type', ['amount', 'percentage']); // Loại giảm giá (mệnh giá hoặc %)
            $table->decimal('discount_amount', 10, 2)->nullable(); // Mệnh giá giảm giá
            $table->integer('discount_percentage')->nullable(); // % giảm giá
            $table->decimal('max_discount', 10, 2)->nullable(); // Giới hạn tối đa số tiền được giảm
            $table->integer('quantity')->default(1); // Số lượng voucher
            $table->boolean('status')->default(true); // Trạng thái voucher (có sẵn hay không)
            $table->enum('usage_type', ['all', 'restricted'])->default('all'); // Phạm vi sử dụng
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
