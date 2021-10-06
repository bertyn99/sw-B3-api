<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pilot');
            $table->foreign('pilot')->references('id')->on('peoples');
            $table->unsignedBigInteger('vehicle');
            $table->foreign('vehicle')->references('id')->on('vehicles');
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
        Schema::dropIfExists('peoples_vehicles');
    }
}
