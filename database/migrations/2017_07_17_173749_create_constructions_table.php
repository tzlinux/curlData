<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->index()->unique()->comment('content uuid');
            $table->string('title')->nullable();
            $table->string('project')->nullable();
            $table->string('owner')->nullable();
            $table->string('owner_contact')->nullable();
            $table->string('tenderee')->nullable();
            $table->string('tenderee_contact')->nullable();
            $table->string('ifb_agency')->nullable();
            $table->string('ifb_agency_contact')->nullable();
            $table->string('ifb_address')->nullable();
            $table->string('ifb_date')->nullable();
            $table->string('bulletin_date')->nullable();
            $table->string('high_limit_price')->nullable();
            $table->text('bidders')->nullable();
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
        Schema::dropIfExists('constructions');
    }
}
