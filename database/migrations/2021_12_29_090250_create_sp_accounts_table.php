<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sp_id');
            $table->string('sp_username')->unique();
            $table->string('sp_password');
            $table->rememberToken();
            $table->dateTime('sp_last_login')->nullable();
            $table->dateTime('sp_last_logout')->nullable();
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
        Schema::dropIfExists('sp_accounts');
    }
}
