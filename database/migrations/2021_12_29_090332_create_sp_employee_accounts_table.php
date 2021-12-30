<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpEmployeeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_employee_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sp_emp_id');
            $table->string('sp_emp_username')->unique();
            $table->string('sp_emp_password');
            $table->rememberToken();
            $table->dateTime('sp_emp_last_login')->nullable();
            $table->dateTime('sp_emp_last_logout')->nullable();
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
        Schema::dropIfExists('sp_employee_accounts');
    }
}
