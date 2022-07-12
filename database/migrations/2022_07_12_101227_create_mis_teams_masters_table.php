<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisTeamsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_teams_masters', function (Blueprint $table) {
            $table->increments('team_id');
            $table->integer('user_id');
            $table->string('team_name');
            $table->string('team_desc');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('team_type')->nullable();
            $table->tinyInteger('is_technical');
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
        Schema::dropIfExists('mis_teams_masters');
    }
}
