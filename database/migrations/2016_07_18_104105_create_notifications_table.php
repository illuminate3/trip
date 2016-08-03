<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->boolean('type'); //Check if the notification is error,success or info
            $table->boolean('expires'); // If the value is set as 1 then it expires on the expires_on date
            $table->datetime('expires_on')->nullable();//Time for notification to expire
            $table->boolean('status');//Read or Unread
            $table->unsignedInteger('user_id'); // Which user id is associated with the notification
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
        Schema::drop('notifications');
    }
}
