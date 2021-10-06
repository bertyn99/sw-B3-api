<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_species', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people');
            $table->foreign('people')->references('id')->on('peoples');
            $table->unsignedBigInteger('specie');
            $table->foreign('specie')->references('id')->on('species');
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
        Schema::dropIfExists('people_species');
    }
}
