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
        // Create the vcard_details table to store VCard data
        Schema::create('vcard_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing 'users' table
            $table->string('address')->nullable(); // Physical address
            $table->string('organization')->nullable(); // Organization name
            $table->string('title')->nullable(); // Job title
            $table->string('website')->nullable(); // Website URL
            $table->string('social_media_facebook')->nullable(); // Facebook profile URL
            $table->string('social_media_twitter')->nullable(); // Twitter handle
            $table->string('social_media_linkedin')->nullable(); // LinkedIn profile URL
            $table->string('social_media_instagram')->nullable(); // Instagram handle
            $table->text('note')->nullable(); // Additional notes
            $table->timestamps(); // Timestamps for created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the vcard_details table if it exists
        Schema::dropIfExists('vcard_details');
    }
};
