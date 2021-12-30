<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_acounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_username')->unique();
            $table->string('customer_password');
            $table->rememberToken();
            $table->dateTime('customer_last_login')->nullable();
            $table->dateTime('customer_last_logout')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customer_information')
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
        Schema::dropIfExists('customer_acounts');
    }
}
