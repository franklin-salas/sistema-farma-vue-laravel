<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_Detalle extends Model
{
    protected $table = 'ingreso_detalle';
    protected $fillable = ['cantidad',
                            'precio',
                            'subtotal',
                            'descripcion',
                            'ingreso_id',
                            'producto_id'];

    public function ingreso(){
        return $this->belongsTo(Ingreso::class);
    }

    public function lotes(){
        return $this->belongsToMany(Lote::class,'lote_ingreso','ingreso_detalle_id','lote_id')
        ->withPivot('cantidad');
    
    }
    
}
