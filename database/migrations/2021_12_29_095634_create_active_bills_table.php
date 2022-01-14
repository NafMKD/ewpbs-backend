<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_bills', function (Blueprint $table) {
            $table->id('ac_bill_id');
            $table->unsignedBigInteger('sp_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('ac_meter_reading');
            $table->decimal('ac_meter_reading_previous');
            $table->decimal('ac_meter_reading_tarif');
            $table->decimal('ac_amount_birr');
            $table->date('ac_month_year');
            $table->date('ac_reading_date');
            $table->timestamps();
            $table->foreign('sp_id')
                ->references('sp_id')
                ->on('sp_information')
                ->onDelete('cascade');
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
        Schema::dropIfExists('active_bills');
    }
}
