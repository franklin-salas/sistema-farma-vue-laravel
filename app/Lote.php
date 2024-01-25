<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lote extends Model
{
    use SoftDeletes;
    protected $table = 'lotes';
    protected $fillable = ['codigo','fecha_vencimiento','producto_id'];
    protected $dates = ['fecha_vencimiento'];

    public function detalleIngresos(){
        return $this->belongsToMany(Ingreso_Detalle::class,'lote_ingreso','lote_id','ingreso_detalle_id')
        ->withTimestamps()
        ->withPivot(['cantidad','ingreso_detalle_id']);
    }
    
    public function detalleSalidas(){
        return $this->belongsToMany(Salida_Detalle::class,'lote_salida','lote_id','detalle_salida_id')
        ->withTimestamps()
        ->withPivot(['cantidad','detalle_salida_id']);
    }
}
