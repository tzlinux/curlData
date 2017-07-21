<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRailwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('railways', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->index()->unique()->comment('content uuid');
            $table->string('title')->nullable();
            $table->string('project')->nullable();
            $table->string('tenderee')->nullable();
            $table->string('tenderee_address')->nullable();
            $table->string('contact')->nullable();
            $table->string('telephone')->nullable();
            $table->string('bulletin_date')->nullable();
            $table->string('bidders')->nullable();
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
        Schema::dropIfExists('railways');
    }
}
