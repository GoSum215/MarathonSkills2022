<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCostAndDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marathons', function (Blueprint $table) {
            $table->integer('cost');
            $table->string('start_date');
        });
        Schema::table('registration_events', function (Blueprint $table) {
            $table->foreignId('runner_id')->constrained()->cascadeOnDelete();
            $table->foreignId('registration_id')->nullable()->change();
            $table->integer('bib_number')->nullable()->change();
            $table->string('race_time')->nullable()->change();
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
            $table->dropColumn('cost');
            $table->dropColumn('start_date');
        });
        Schema::table('registration_events', function (Blueprint $table) {
            $table->dropColumn('runner_id');
            $table->foreignId('registration_id')->nullable(false)->change();
            $table->integer('bib_number')->nullable(false)->change();
            $table->string('race_time')->nullable(false)->change();
        });
    }
}
