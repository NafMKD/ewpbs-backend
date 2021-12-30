<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_event_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sp_id');
            $table->string('sp_event_action');
            $table->string('sp_event_detail');
            $table->timestamps();
            $table->foreign('sp_id')
                ->references('sp_id')
                ->on('sp_information')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sp_event_logs');
    }
}
