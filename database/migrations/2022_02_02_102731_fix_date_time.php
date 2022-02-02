<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixDateTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marathons', function (Blueprint $table) {
            $table->date('date_start_marathon');
            $table->dropColumn('start_date');
            $table->dropColumn('year_held');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('start_data_time');
            $table->dropColumn('start_data');
            $table->time('time_start_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marathons', function (Blueprint $table) {
            $table->dropColumn('date_start_marathon');
            $table->timestamp('start_date');
            $table->integer('year_held');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->timestamp('start_data_time');
            $table->string('start_data');
            $table->dropColumn('time_start_event');
        });
    }
}
