<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings',function(Blueprint $table){
            $table->increments('id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('pintrest');
            $table->string('google');
            $table->string('address');
            $table->string('phone');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_settings');
    }
}
