<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle');
            $table->foreign('vehicle')->references('id')->on('vehicles');
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
        Schema::dropIfExists('vehicles_films');
    }
}
