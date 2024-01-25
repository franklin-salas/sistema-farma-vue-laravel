<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composiciones', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->enum('unidad_medida',['kg','g', 'mg','mcg','ml','l','ud','%']);
            $table->boolean('principio_activo');
            $table->unsignedBigInteger('farmaco_id');
            $table->unsignedBigInteger('producto_id');
            $table->timestamps();
            $table->foreign('farmaco_id')->references('id')->on('farmacos');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composiciones');
    }
}
