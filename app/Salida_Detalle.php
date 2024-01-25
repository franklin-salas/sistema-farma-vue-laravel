<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_Detalle extends Model
{
    protected $table = 'detalle_salida';
    protected $fillable = ['cantidad',
                            'precio',
                            'subtotal',
                            'descripcion',
                            'salida_id',
                            'producto_id'];

    public function lotes(){
        return $this->belongsToMany(Lote::class,'lote_salida','detalle_salida_id','lote_id')
                ->withPivot('cantidad');
                            
    }
}
