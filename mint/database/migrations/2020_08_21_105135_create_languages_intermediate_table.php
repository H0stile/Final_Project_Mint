<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesIntermediateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages_intermediate', function (Blueprint $table) {

            $table->unsignedBigInteger('users_id');

            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('languages_id');

            $table->foreign('languages_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages_intermediate');
    }
}
