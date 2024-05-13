<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('date');
            $table->string('service_offered');

            $table->integer('satisfaction_level');
            $table->integer('services_again');
            $table->integer('value_for_fee');
            $table->integer('prices_quotes');
            $table->integer('employee_response');
            $table->integer('samples_easy');
            $table->integer('turnaround_time');
            $table->integer('delivery_my_needs');
            $table->integer('reports_easy');
            $table->integer('payments_easy');

            $table->text('previous_response');
            $table->text('help_feedback');
            $table->text('complaint');

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
        Schema::dropIfExists('feedback');
    }
}
