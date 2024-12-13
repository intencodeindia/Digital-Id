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
        Schema::create('custom_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('address');
            $table->unsignedBigInteger('created_by');
            $table->string('border_color_top')->nullable();
            $table->string('border_color_right')->nullable();
            $table->string('border_color_bottom')->nullable();
            $table->string('border_color_left')->nullable();
            $table->timestamps();

            // Foreign key constraint to users table
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_organizations');
    }
};
