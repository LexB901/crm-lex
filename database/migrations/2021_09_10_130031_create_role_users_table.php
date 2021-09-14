<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            // $table->foreign('user_id')
            //     ->reference('id')
            //     ->on('users')
            //     ->onDelete('cascade');
            // $table->foreign('role_id')
            //     ->reference('id')
            //     ->on('roles')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_users');
    }
}
