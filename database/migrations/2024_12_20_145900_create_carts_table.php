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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->integer('quantity')->default(1); 
            $table->timestamps(); 
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('variant_id')->references('id')->on('variants');
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
