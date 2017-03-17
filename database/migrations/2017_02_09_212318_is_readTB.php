<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IsReadTB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('is_readTB', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('announcementID');
            $table->string('IDno');
            $table->integer('is_read ');
            $table->integer('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('is_readTB');
    }
}
