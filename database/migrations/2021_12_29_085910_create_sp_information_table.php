<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_information', function (Blueprint $table) {
            $table->id('sp_id');
            $table->unsignedBigInteger('spc_id');
            $table->string('sp_name');
            $table->string('sp_region')->nullable();
            $table->string('sp_zone')->nullable();
            $table->string('sp_town')->nullable();
            $table->timestamps();
            $table->foreign('spc_id')
                ->references('spc_id')
                ->on('spc_information')
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
        Schema::dropIfExists('sp_information');
    }
}
