<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_firstname');
            $table->string('user_lastname');
            $table->string('emp_code')->nullable();
            $table->string('user_emailaddress')->unique();
            $table->integer('technology_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('roleid')->nullable();
            $table->string('mis_photo',191)->nullable();
            $table->string('photo',255)->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
