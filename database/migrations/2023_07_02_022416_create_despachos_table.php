<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachosTable extends Migration
{
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_inventarios');
            $table->integer('cantidad_despacho');
            $table->timestamps();

            // Establecer relación con la tabla "users"
            $table->foreign('user_id')->references('id')->on('users');

            // Establecer relación con la tabla "inventarios"
            $table->foreign('id_inventarios')->references('id')->on('inventarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}
