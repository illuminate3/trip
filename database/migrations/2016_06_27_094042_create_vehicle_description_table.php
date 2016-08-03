<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_descriptions', function (Blueprint $table) {
            $table->increments('id');
            /*Prices are per day*/
            $table->string('type');
            $table->integer('price');
            $table->integer('doors');
            $table->integer('max_people');
            $table->string('manufacturer');
            $table->integer('mileage');
            $table->text('description');
            $table->boolean('air_conditioned');
            $table->unsignedInteger('vehicle_id');
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
        Schema::drop('vehicle_descriptions');
    }
}
