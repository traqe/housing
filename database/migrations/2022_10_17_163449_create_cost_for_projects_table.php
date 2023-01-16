<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostForProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcost_for_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('costing_project_stand_id');
            $table->integer('stage_id');
            $table->string('name');
            $table->string('cost');
            $table->string('description');
            $table->string('document');
            $table->string('date');
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
        Schema::dropIfExists('cost_for_projects');
    }
}