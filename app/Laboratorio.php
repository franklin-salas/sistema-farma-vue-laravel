<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratorio extends Model
{
    use SoftDeletes;
    protected $table = 'laboratorios';
    protected $fillable = ['nombre'];
}
