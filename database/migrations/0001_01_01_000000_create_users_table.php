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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user', 'organization', 'employee', 'familymember'])->default('user'); // Role column added
            $table->string('digital_id')->default(str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT));
            $table->boolean('status')->default(true); // Active or inactive user
            $table->string('username')->unique(); // Unique username
            $table->string('profile_photo')->nullable(); // Profile photo path
            $table->string('bio')->nullable(); // Bio
            $table->string('phone')->nullable(); // Phone number
            $table->string('relationship')->nullable(); // Relationship to the user
            $table->foreignId('parent_id')->nullable()->constrained('users'); // Parent ID should be user primary key and not nullable
            $table->string('organization_logo')->nullable(); // Organization logo path
            $table->string('email_verified_link')->nullable(); // Email verification link
            $table->rememberToken();
            $table->timestamps();
        });

        // Password Reset Tokens table (for password recovery)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Session table (optional, stores user sessions)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
