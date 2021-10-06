<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film');
            $table->foreign('films')->references('id')->on('species');
            $table->unsignedBigInteger('specie');
            $table->foreign('species')->references('id')->on('films');
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
        Schema::dropIfExists('species_films');
    }
}
