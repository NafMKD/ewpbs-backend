<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_information', function (Blueprint $table) {
            $table->id('meter_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('sp_id');
            $table->string('meter_serial');
            $table->string('meter_latitude');
            $table->string('meter_longitude');
            $table->timestamps();
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customer_information')
                ->onDelete('cascade');
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
        Schema::dropIfExists('meter_information');
    }
}
