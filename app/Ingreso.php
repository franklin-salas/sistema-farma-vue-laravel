<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingreso extends Model
{
    use SoftDeletes;
    protected $table = 'ingresos';
    protected $fillable = ['codigo',
                            'fecha',
                            'tipo',
                            'estado',
                            'almacen_id',
                            'usuario_id',
                            'proveedor_id',
                        ];
                        
    protected $dates = ['fecha'];
    // protected $with = ['productos'];
    public $appends = ['almacen_nombre','proveedor_nombre','usuario_nombre','nota_productos'];


    public function getAlmacenNombreAttribute(){
        // return "hola cesar";
        return $this->almacen->nombre;
    } 
    public function getProveedorNombreAttribute(){
        // return "hola cesar";
        return $this->proveedor->nombre;
    } 

    public function getUsuarioNombreAttribute(){
        // return "hola cesar";
        return $this->usuario->name;
    } 

    public function getNotaProductosAttribute(){
        // return "hola cesar";
        return $this->productos;
    } 
    public function productos(){

        return $this->belongsToMany(Producto::class,'ingreso_detalle','ingreso_id','producto_id')
        ->withTimestamps()
        ->withPivot(['cantidad','precio','descripcion','id'])
        ->with('lotes');
        //->with('detalleIngresoPro');
    
    } 

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function ingresoDetalles()
    {
        return $this->hasMany(Ingreso_Detalle::class,'ingreso_id');
    }

}
