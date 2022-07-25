<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCheckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_checkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('smpt_id')->nullable();
            $table->string('department',500)->nullable();
            $table->string('tech',500)->nullable();
            $table->string('subject',500)->nullable();
            $table->string('message',500)->nullable();
            $table->string('attachment',1000)->nullable();
            $table->dateTime('date_time')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('admin_checkers');
    }
}
