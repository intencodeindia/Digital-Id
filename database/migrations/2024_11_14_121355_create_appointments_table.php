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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to user table
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');  // Assuming a services table exists
            $table->dateTime('appointment_time');  // The date and time of the appointment
            $table->integer('duration_minutes');  // Duration in minutes
            $table->string('status')->default('pending');  // Status of the appointment (pending, confirmed, etc.)
            $table->text('notes')->nullable();  // Additional notes for the appointment
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
