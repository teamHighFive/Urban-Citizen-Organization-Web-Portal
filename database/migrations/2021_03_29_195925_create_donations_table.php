<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->boolean('is_paid')->default(false);
            $table->string('payment_method');
            $table->float('amount', 10, 2);
            $table->string('currency');
            $table->string('donation_id');
            $table->string('donation_event_id');
            $table->string('donner_id');
            $table->string('donner_fullname');
            $table->string('donner_address');
            $table->string('donner_country');
            $table->string('donner_city');
            $table->boolean('is_member')->default(false);
            $table->string('donner_phone');
            $table->string('donner_email');
            $table->string('comments')->nullable();
            $table->timestamps();
           
        

            $table->foreign('donation_event_id')->references('id')->on('donation_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
