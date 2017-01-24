<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnnouncementNotif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('announcementNotif', function (Blueprint $table) {
            $table->increments('anID');
            $table->string('creator_IDno');
            $table->string('subject');
            $table->text('message');
            $table->string('image');
            $table->integer('is_approved');
            $table->integer('recipient_userLevel');
            $table->integer('type');
            $table->integer('status');
            $table->rememberToken();
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
        Schema::drop('announcementNotif');
    }
}
