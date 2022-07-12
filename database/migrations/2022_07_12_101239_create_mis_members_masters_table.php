<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisMembersMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_members_masters', function (Blueprint $table) {
            $table->increments('team_member_id');
            $table->integer('user_id');
            $table->integer('team_id');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->dateTime('created_on');
            $table->dateTime('updated_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mis_members_masters');
    }
}
