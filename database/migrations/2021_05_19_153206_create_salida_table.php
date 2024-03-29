<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->enum('tipo', ['Traspaso','Venta','Baja','Normal']);
            $table->enum('estado', ['Nuevo','Terminado',]);
            $table->unsignedBigInteger('almacen_id');
            $table->unsignedBigInteger('usuario_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida');
    }
}
