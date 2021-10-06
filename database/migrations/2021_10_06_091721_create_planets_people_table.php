<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planet');
            $table->foreign('planet')->references('id')->on('planets');
            $table->unsignedBigInteger('people');
            $table->foreign('people')->references('id')->on('peoples');
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
        Schema::dropIfExists('planets_people');
    }
}
