<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conf_files', function (Blueprint $table) {
            $table->increments('document_id');
            $table->String('document_name');
            $table->String('location');
            $table->String('description');
            $table->integer('created_by');
            $table->String('event')->nullable();
            $table->boolean('p_admin');
            $table->boolean('p_member');
            $table->boolean('p_visitor');
            $table->binary('file')->nullable();
            $table->String('type');
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
        Schema::dropIfExists('conf_files');
    }
}
