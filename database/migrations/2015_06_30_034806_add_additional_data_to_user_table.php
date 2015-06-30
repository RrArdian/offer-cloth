<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalDataToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('activation_code')->after('password');
            $table->enum('status', ['active', 'inactive', 'suspend'])->default('inactive')->after('activation_code');
            $table->string('device_id')->after('status');
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
            $table->dropColumn('activation_code');
            $table->dropColumn('status');
            $table->dropColumn('device_id');
        });
    }
}
