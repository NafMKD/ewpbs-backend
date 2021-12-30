<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpcAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spc_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spc_id');
            $table->string('spc_username')->unique();
            $table->string('spc_password');
            $table->rememberToken();
            $table->dateTime('spc_last_login')->nullable();
            $table->dateTime('spc_last_logout')->nullable();
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
        Schema::dropIfExists('spc_accounts');
    }
}
