<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpcTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spc_tarifs', function (Blueprint $table) {
            $table->id('spc_tarif_id');
            $table->unsignedBigInteger('spc_id');
            $table->decimal('spc_tarif_meter_min');
            $table->decimal('spc_tarif_meter_max');
            $table->decimal('spc_tarif_amount');
            $table->timestamps();
            $table->foreign('spc_id')
                ->references('spc_id')
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
        Schema::dropIfExists('spc_tarifs');
    }
}
