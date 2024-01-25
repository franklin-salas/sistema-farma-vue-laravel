<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class ReporteController extends Controller
{
    
    public function inventario(){

        $productos = Producto::all();
        return view('reporte.inventario', compact("productos"));
    }
}
