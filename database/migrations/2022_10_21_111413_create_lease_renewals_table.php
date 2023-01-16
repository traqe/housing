<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaseRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllease_renewals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lease_id');
            $table->string('narration');
            $table->string('document');
            $table->enum('status', ['declined', 'pending', 'approved'])->default('pending');
            $table->string('approved_by');
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
        Schema::dropIfExists('lease_renewals');
    }
}