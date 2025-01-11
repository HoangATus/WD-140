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
            $table->string('order_code');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->text('notes')->nullable();
            $table->bigInteger('total');    
            $table->enum('status', ['pending', 'confirmed', 'shipped','delivered', 'completed', 'canceled','failed'])->default('pending');
            $table->decimal('discount', 10, 0)->default(0);
            $table->decimal('points_discount', 10, 0)->default(0);
            $table->decimal('voucher_discount', 10, 0)->default(0);
            $table->string('payment_method')->nullable();
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null')->after('discount');
        
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
