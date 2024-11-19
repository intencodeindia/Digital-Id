<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->enum('type', ['video', 'image'])->notNull(); // Type of portfolio item (video or image)
            $table->string('title'); // Portfolio title
            $table->text('description')->nullable(); // Portfolio description
            $table->decimal('price', 10, 2)->nullable(); // Price of portfolio item (nullable)
            $table->string('file_path'); // Path to the portfolio file (video/image)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for user_id
            $table->timestamps(); // Created at & updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
