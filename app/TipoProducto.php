<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProducto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tipos';
    protected $fillable = ['nombre'];
}
