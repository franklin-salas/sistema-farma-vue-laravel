<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $fillable = [
        'codigo',
        'nombre',
        'nombre_generico',
        'descripcion',
        'precio',
        'contenido',
        'unidad_medida',
        'generico',
        'receta',
        'indicaciones',
        'advertencia',
        'laboratorio_id',
        'categoria_id',
        'tipo_id',
        'forma_id'
    ];

     public $appends = ['forma_nombre','laboratorio_nombre','categoria_nombre'];

     public function getFormaNombreAttribute(){
                                // return "hola cesar";
                                return $this->forma->nombre;
                            }
     public function getLaboratorioNombreAttribute(){
                                // return "hola cesar";
                                return $this->laboratorio->nombre;
                            }
    public function getCategoriaNombreAttribute(){
                                // return "hola cesar";
                                return $this->categoria->nombre;
                            }

    public function composicion(){

        return $this->belongsToMany(Farmaco::class,'composiciones','producto_id','farmaco_id')
        ->withTimestamps()
        ->withPivot(['principio_activo','unidad_medida','cantidad']);

    }
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function forma()
    {
        return $this->belongsTo(Forma::class);
    }

    public function Categoria()
    {
        return $this->belongsTo(Forma::class);
    }
    public function Tipo()
    {
        return $this->belongsTo(TipoProducto::class);
    }


    public function lotes()
    {
        return $this->hasMany(Lote::class,'producto_id')->with('detalleIngresos')->with('detalleSalidas');
    }

    public function detalleIngresoPro(){
        return $this->hasMany(Ingreso_Detalle::class,'producto_id');
    }



}
