<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->unique();
            $table->string('merchant_id')->nullable();
            $table->string('provider_reference_id')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('checksum')->nullable();
            $table->string('payment_status')->default('PAYMENT_PENDING');
            $table->text('response_msg')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
} 