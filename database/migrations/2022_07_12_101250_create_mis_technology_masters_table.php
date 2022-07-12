<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisTechnologyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_technology_masters', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('category_name');
            $table->text('category_desc');
            $table->integer('type_id');
            $table->integer('department_id');
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('mis_technology_masters');
    }
}
