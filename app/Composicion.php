<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Composicion extends Model
{
    use SoftDeletes;
    protected $table = 'composiciones';
    protected $fillable = ['cantidad','unidad_medida',
                            'principio_activo',
                            'farmaco_id','producto_id'];
}
