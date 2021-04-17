<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DonationFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_files', function (Blueprint $table) {
            $table->increments('id');
            $table->String('document_details');
            $table->String('location');
            $table->integer('created_by');
            $table->String('description')->nullable();
            $table->boolean('p_admin');
            $table->boolean('p_member');
            $table->boolean('p_visitor');
            $table->binary('file');
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
        Schema::dropIfExists('donation_files');
    }
}
