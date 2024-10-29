<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password');
            $table->string('user_address');
            $table->string('user_phone_number')->nullable()->unique();
            $table->enum('role', [User::ROLE_ADMIN, User::ROLE_USER])->default(User::ROLE_USER);
            $table->rememberToken();
            $table->boolean('is_banned')->default(false); 
            $table->timestamp('banned_until')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
