<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_information', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_first_name');
            $table->string('customer_middle_name');
            $table->string('customer_last_name');
            $table->string('customer_phone')->unique();
            $table->string('customer_region')->nullable();
            $table->string('customer_town')->nullable();
            $table->string('customer_kebele')->nullable();
            $table->string('customer_house_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_information');
    }
}
