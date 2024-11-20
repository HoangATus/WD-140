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
            $table->enum('discount_type', ['fixed', 'percent']);
            $table->decimal('discount_value', 10, 0)->nullable(); 
            $table->decimal('discount_percent', 5, 0)->nullable(); 
            $table->decimal('max_discount_amount', 10, 0)->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('min_order_amount', 10, 0)->nullable();
            $table->datetimes('start_date');
            $table->datetimes('end_date');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_public')->default(true);
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
