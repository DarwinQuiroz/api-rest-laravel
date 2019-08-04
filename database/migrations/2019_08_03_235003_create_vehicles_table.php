<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_vehicle_id');
            $table->unsignedBigInteger('type_vehicle_id');
            $table->unsignedBigInteger('location_id');
            $table->float('current_kilometers')->default(0);
            $table->string('engine_size');
            $table->enum('fuel_type', ['GASOIL', 'GASOLINE', 'ELECTRIC']);

            $table->foreign('model_vehicle_id')->references('id')->on('model_vehicles');
            $table->foreign('type_vehicle_id')->references('id')->on('type_vehicles');
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('vehicles');
    }
}
