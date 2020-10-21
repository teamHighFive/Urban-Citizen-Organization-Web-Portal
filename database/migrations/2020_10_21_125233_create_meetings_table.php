<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id('meeting_id')->autoIncrement();
            $table->string('meeting_name', 200);
            $table->string('meeting_description', 500);
            $table->string('creator', 100);
            $table->string('moderator_password', 50);
            $table->string('attendee_password', 50);
            $table->date('date');
            $table->time('time', 0);
            $table->boolean('recording')->comment('0 - Do not allow recording, 1 - Allow recording');
            $table->boolean('display_on_calendar')->comment('0 - Do not display on calendar, 1 - Display on calendar');
            $table->boolean('approval')->default(false)->comment('0 - Not reviewed by admin, 1 - Reviewed by admin');
            $table->boolean('status')->default(true)->comment('0 - Ended or canceled, 1 - Upcoming');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
