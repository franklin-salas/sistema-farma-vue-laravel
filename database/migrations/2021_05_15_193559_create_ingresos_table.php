<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->enum('tipo', ['Traspaso','Normal','Compra']);
            $table->enum('estado', ['Nuevo','Terminado',]);
            $table->unsignedBigInteger('almacen_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('proveedor_id');
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
        Schema::dropIfExists('ingresos');
    }
}
