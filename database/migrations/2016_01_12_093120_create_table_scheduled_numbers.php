<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScheduledNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('schedule_id')->unsigned();
            $table->timestamps();



            $table->foreign('schedule_id')
                ->references('id')
                ->on('scheduled_messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scheduled_numbers');
    }
}
