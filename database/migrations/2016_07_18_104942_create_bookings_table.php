<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('bookee'); //The bookers id or name
            $table->date('booked_on');
            $table->date('from');
            $table->date('to');
            $table->boolean('read'); // Is the booking read by the business
            $table->boolean('confirm'); // Is it confirmed
            $table->morphs('bookee'); // Which type of business has been booked
            $table->unsignedInteger('user_id');
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
        Schema::drop('bookings');
    }
}
