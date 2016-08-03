<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zone');
            $table->string('district');
            $table->string('representative');
            $table->string('role');
            $table->string('address');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('mobile');
            $table->string('email');
            $table->string('fax');
            $table->string('facebook');
            $table->string('website');
            $table->string('latitude');
            $table->string('longitude');
            $table->morphs('contactable');
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
        Schema::drop('contacts');
    }
}
