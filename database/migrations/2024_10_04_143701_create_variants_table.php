<?php

use App\Models\Product;
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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->foreignId('attribute_color_id')->constrained('colors')->onDelete('cascade');
            $table->foreignId('attribute_size_id')->constrained('attribute_sizes')->onDelete('cascade');
            $table->decimal('variant_listed_price', 10, 2);
            $table->decimal('variant_sale_price', 10, 2);
            $table->decimal('variant_import_price', 10, 2);
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
