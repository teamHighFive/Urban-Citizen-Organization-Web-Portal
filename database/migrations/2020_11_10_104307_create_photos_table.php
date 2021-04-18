<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id',6)->unique();
            $table->integer('album_id')->unsigned();
            $table->string('caption');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->foreign('id')->references('album_id')->on('albums')->onDelete('CASCADE')->onUpdate('CASCADE');;
            // $table->foreignId('album_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
