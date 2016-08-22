<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefensiveRatingsToSeaportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seaports', function (Blueprint $table) {
            $table->integer('defensive_rating');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('seaports');
//        Schema::table('seaports', function (Blueprint $table) {
//            //
////            $table->dropColumn('defensive_rating');
//        });
    }
}
