<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'admin_users',
            function (Blueprint $table) {
                $table->foreign('roles_id')->references('id')->on('roles');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'admin_users',
            function (Blueprint $table) {
                $table->dropForeign(['roles_id']);
            }
        );
    }
}
