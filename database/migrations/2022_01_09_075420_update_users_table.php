<?php

use App\Enums\Gender;
use App\Enums\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', [Role::RUNNER, Role::COORDINATOR, Role::ADMINISTRATOR]);
            $table->string('surname', 50);
            $table->enum('gender', [Gender::MALE, GENDER::FEMALE]);
            $table->string('login', 30)->unique();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('surname');
            $table->dropColumn('gender');
            $table->dropColumn('login');
            $table->string('email')->nullable(false)->change();
        });
    }
}
