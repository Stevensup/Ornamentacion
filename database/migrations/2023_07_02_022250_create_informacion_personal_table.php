<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionPersonalTable extends Migration
{
    public function up()
    {
        Schema::create('informacion_personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('metodo_de_pago');
            $table->text('comentario_adicional')->nullable();
            $table->timestamps();

            // Establecer relación con la tabla "users"
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('informacion_personal');
    }
}
