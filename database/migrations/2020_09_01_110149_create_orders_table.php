<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('order_number')->nullable();
            $table->string('order_total');

            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('matrix')->nullable();
            $table->string('origin')->nullable();
            $table->string('intended_use')->nullable();  
            $table->text('message')->nullable();

            $table->integer('staff_id')->nullable();
            
            $table->integer('order_status_id')->default('1');
            $table->integer('accept_order')->default('0');
            $table->string('reject_reason')->nullable();
            $table->string('budget')->nullable();
            $table->string('invoice')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('payment_proof_one')->nullable();
            $table->string('payment_proof_two')->nullable();
            $table->string('service_speci')->nullable();
            $table->string('signed_service_speci')->nullable();
            $table->string('result')->nullable();
            $table->string('raw_data')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
