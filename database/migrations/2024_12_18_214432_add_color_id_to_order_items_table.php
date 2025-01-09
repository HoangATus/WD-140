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
    Schema::table('order_items', function (Blueprint $table) {
        $table->unsignedBigInteger('color_id')->nullable()->after('id');
        $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('order_items', function (Blueprint $table) {
        $table->dropForeign(['color_id']);
        $table->dropColumn('color_id');
    });
}

};
