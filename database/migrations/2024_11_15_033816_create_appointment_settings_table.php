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
        Schema::create('appointment_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('base_price', 10, 2);
            $table->json('available_days');
            $table->time('working_hours_start');
            $table->time('working_hours_end'); 
            $table->integer('slot_duration')->default(30); // Default 30 minutes
            $table->integer('break_time')->default(15); // Default 15 minutes break
            $table->integer('max_appointments')->default(10);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_settings');
    }
};
