<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarathonSlugAndEditBug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marathons', function (Blueprint $table) {
            $table->string('slug', 255)->unique();
            $table->string('country');
            $table->string('marathon_name')->unique()->change();
            $table->dropColumn('event_id');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('marathon_id')->constrained()->cascadeOnDelete();
            $table->string('start_data');
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
            $table->dropColumn('slug');
            $table->dropColumn('country');
            $table->dropUnique('marathons_marathon_name_unique');
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('marathon_id');
            $table->dropColumn('start_data');
        });
    }
}
