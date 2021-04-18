<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_events', function (Blueprint $table) {
            $table->increments('id',6)->unique();
            $table->string('name');
            $table->string('description');
            $table->string('coverimage');
            $table->integer('status')->default(2)->comment('0 - Deleted, 1 - Finished, 2 - Ongoing');
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
        Schema::dropIfExists('donation_events');
    }
}
