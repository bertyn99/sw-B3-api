<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planet');
            $table->foreign('planet')->references('id')->on('planets');
            $table->unsignedBigInteger('film');
            $table->foreign('film')->references('id')->on('films');
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
        Schema::dropIfExists('planets_films');
    }
}
