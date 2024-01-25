<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use SoftDeletes;
    protected $table = 'salida';
    protected $fillable = ['codigo',
                            'fecha',
                            'tipo',
                            'estado',
                            'almacen_id',
                            'usuario_id',
                            
                        ];
                        
    protected $dates = ['fecha'];


    public $appends = ['almacen_nombre','usuario_nombre','nota_productos'];

    public function getAlmacenNombreAttribute(){
        return $this->almacen->nombre;
    } 

    public function getUsuarioNombreAttribute(){

        return $this->usuario->name;
    } 

    public function getNotaProductosAttribute(){
        return $this->productos;
    }

    public function productos(){

        return $this->belongsToMany(Producto::class,'detalle_salida','salida_id','producto_id')
        ->withTimestamps()
        ->withPivot(['cantidad','precio','descripcion','id'])
        ->with('lotes');
    } 

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function salidaDetalles()
    {
        return $this->hasMany(Salida_Detalle::class,'salida_id');
    }
 


    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

  
}
