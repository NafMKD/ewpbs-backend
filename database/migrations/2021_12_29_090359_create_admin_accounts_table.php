<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('admin_username')->unique();
            $table->string('admin_password');
            $table->rememberToken();
            $table->dateTime('admin_last_login')->nullable();
            $table->dateTime('admin_last_logout')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')
                ->references('admin_id')
                ->on('admin_information')
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
        Schema::dropIfExists('admin_accounts');
    }
}
