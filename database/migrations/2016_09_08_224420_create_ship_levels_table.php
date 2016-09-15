<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('max_health')->unsigned();
            $table->integer('max_crew')->unsigned();
            $table->integer('max_cannons')->unsigned();
            $table->integer('max_cargo')->unsigned();
            $table->integer('max_speed')->unsigned();
            $table->integer('cost')->unsigned();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('ship_levels');
    }
}
