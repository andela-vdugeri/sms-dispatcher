<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSchduleIdColumnOnScheduledNumbrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scheduled_numbers', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'scheduled_message_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scheduled_numbers', function (Blueprint $table) {
            //
        });
    }
}
