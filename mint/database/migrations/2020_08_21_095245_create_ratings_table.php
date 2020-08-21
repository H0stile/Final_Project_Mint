<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            //$table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('writer_id');
            $table->unsignedBigInteger('target_id');
            $table->foreign('writer_id')->references('id')->on('users');
            $table->foreign('target_id')->references('id')->on('users');
            $table->integer('score');
            $table->string('comment',500);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
