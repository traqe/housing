<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostingProjectStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcosting_project_stands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stand_type_id');
            $table->integer('project_id');
            $table->string('area_available');
            $table->string('number_of_units');
            $table->string('size');
            $table->integer('created_by');
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
        Schema::dropIfExists('costing_project_stands');
    }
}