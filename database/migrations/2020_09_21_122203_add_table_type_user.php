<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableTypeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_user',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_rol')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            //
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('rol');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('type_user');
    }
}
