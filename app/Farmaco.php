<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmaco extends Model
{
    use SoftDeletes;
    protected $table = 'farmacos';
    protected $fillable = ['nombre'];

}
