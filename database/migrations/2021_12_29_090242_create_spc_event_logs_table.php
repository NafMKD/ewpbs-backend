<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpcEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spc_event_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spc_id');
            $table->string('spc_event_action');
            $table->string('spc_event_detail');
            $table->timestamps();
            $table->foreign('spc_id')
                ->references('spc_id')
                ->on('spc_information')
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
        Schema::dropIfExists('spc_event_logs');
    }
}
