<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_bills', function (Blueprint $table) {
            $table->id('hs_bill_id');
            $table->unsignedBigInteger('sp_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('hs_meter_reading');
            $table->decimal('hs_amount_birr');
            $table->date('hs_month_year');
            $table->decimal('hs_paid_amount');
            $table->date('hs_paid_date');
            $table->date('hs_reading_date');
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
        Schema::dropIfExists('history_bills');
    }
}
