<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterRecordInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_record_information', function (Blueprint $table) {
            $table->id('meter_record_id');
            $table->unsignedBigInteger('sp_emp_id');
            $table->unsignedBigInteger('meter_id');
            $table->decimal('meter_reading');
            $table->boolean('status');
            $table->date('meter_reading_month_year');
            $table->dateTime('meter_reading_date');
            $table->timestamps();
            $table->foreign('sp_emp_id')
                ->references('sp_emp_id')
                ->on('sp_employee_information')
                ->onDelete('cascade');
            $table->foreign('meter_id')
                ->references('meter_id')
                ->on('meter_information')
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
        Schema::dropIfExists('meter_record_information');
    }
}
