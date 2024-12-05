<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('employee_id')->nullable();  // Optional employee ID
            $table->string('department')->nullable();  // Department name
            $table->string('designation')->nullable();  // Designation/job title
            $table->date('joining_date')->nullable();  // Joining date
            $table->string('profile_photo')->nullable();  // Profile photo path
            $table->enum('work_type', ['Full Time', 'Part Time'])->nullable();  // Full time or part time
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
