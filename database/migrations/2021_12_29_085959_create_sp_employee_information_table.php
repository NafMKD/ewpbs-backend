<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpEmployeeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_employee_information', function (Blueprint $table) {
            $table->id('sp_emp_id');
            $table->unsignedBigInteger('sp_id');
            $table->string('sp_emp_first_name');
            $table->string('sp_emp_middle_name');
            $table->string('sp_emp_last_name');
            $table->string('sp_emp_region')->nullable();
            $table->string('sp_emp_town')->nullable();
            $table->string('sp_emp_phone')->unique();
            $table->string('sp_emp_house_no')->nullable();
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
        Schema::dropIfExists('sp_employee_information');
    }
}
