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
            $table->id('id')->autoIncrement();
            $table->string('payment_method');
            $table->float('amount', 10, 2);
            $table->integer('donation_event_id');
            $table->string('donner_fullname');
            $table->string('donner_address')->nullable();
            $table->string('donner_country')->nullable();
            $table->string('donner_city')->nullable();
            $table->string('is_member');
            $table->string('is_success')->default('no');
            $table->string('donner_phone');
            $table->string('donner_email');
            $table->string('comment')->nullable();
            $table->timestamps();
           
            $table->foreign('donation_event_id')->references('id')->on('donation_events')->onDelete('CASCADE')->onUpdate('CASCADE');
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
