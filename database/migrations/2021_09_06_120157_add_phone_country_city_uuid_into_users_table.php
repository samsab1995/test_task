<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneCountryCityUuidIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('phone', 11)->nullable()->after('password');
            $table->string('country', 30)->nullable()->after('phone');
            $table->string('city', 30)->nullable()->after('country');
            $table->uuid('uuid')->after('city');
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
            $table->dropColumn(['phone', 'country', 'city', 'uuid']);
        });
    }
}
