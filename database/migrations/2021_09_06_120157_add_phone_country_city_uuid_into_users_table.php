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
            $table->addColumn('char', 'phone', ['length' => 11])->nullable()->unique()->after('password');
            $table->addColumn('string', 'country', ['length' => 50])->nullable()->after('phone');
            $table->addColumn('string', 'city', ['length' => 30])->nullable()->after('country');
            $table->addColumn('uuid', 'uuid')->unique()->after('city');
            $table->softDeletes();
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
