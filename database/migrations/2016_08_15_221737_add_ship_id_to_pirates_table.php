<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShipIdToPiratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pirates', function ($table) {
//            $table->string('email');
            $table->integer('ship_id')->unsigned()->nullable();
            $table->foreign('ship_id')->references('id')->on('ships');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
