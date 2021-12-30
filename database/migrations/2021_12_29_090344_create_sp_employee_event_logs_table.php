<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpEmployeeEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_employee_event_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sp_emp_id');
            $table->string('sp_emp_event_action');
            $table->string('sp_emp_event_detail');
            $table->timestamps();
            $table->foreign('sp_emp_id')
                ->references('sp_emp_id')
                ->on('sp_employee_information')
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
        Schema::dropIfExists('sp_employee_event_logs');
    }
}
