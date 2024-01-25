<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('nombre_generico')->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
             $table->decimal('contenido', 10, 2);
            $table->enum('unidad_medida', ['kg','g', 'mg','mcg','ml','l','%','ud']);
            $table->boolean('generico');
            $table->boolean('receta');
            $table->text('indicaciones')->nullable();
            $table->text('advertencia')->nullable();
            $table->unsignedBigInteger('laboratorio_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('forma_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('forma_id')->references('id')->on('formas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
