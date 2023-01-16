<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostingProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcosting_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('project_number');
            $table->string('site_number');
            $table->string('site_location');
            $table->binary('project_description');
            $table->string('start_date');
            $table->string('project_manager');
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
        Schema::dropIfExists('costing_projects');
    }
}