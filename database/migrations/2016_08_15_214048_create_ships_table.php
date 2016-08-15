<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
//            $table->integer('pirate_id')->unsigned()->nullable();
            $table->integer('captain_id')->unsigned()->nullable();
            $table->foreign('captain_id')->references('id')->on('pirates');
            $table->double('displacement');
            $table->double('length');
            $table->double('draft');
            $table->double('crew_saltiness');
            $table->integer('num_cannons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ships');
    }
}
