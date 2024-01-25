<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Composicion;
use App\Farmaco;
use App\Forma;
use App\Http\Requests\ProductoRequest;
use App\Laboratorio;
use App\Producto;
use App\TipoProducto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use function Sodium\add;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(25);
        return view('inventario.producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboratorios = Laboratorio::all();
        $categorias = Categoria::all();
        $formas = Forma::all();
        $tipos = TipoProducto::all();
        $farmacos = Farmaco::all();
        $unidades =__('datos.unidad_medida');
        $unidades = new Collection($unidades);

        return view('inventario.producto.create', compact('laboratorios','categorias','formas','tipos','unidades','farmacos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $producto = new Producto();
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->nombre_generico = $request->get('nombre_generico');
        // $producto->nombre_generico = "sssss";
        $producto->descripcion = $request->get('descripcion');
        $producto->receta = $request->receta;
        $producto->contenido = $request->contenido;
        $producto->unidad_medida = $request->get('unidad_medida');
        $producto->precio = $request->get('precio');
        $producto->forma_id = $request->get('forma_id');
        $producto->generico = $request->get('generico');
        $producto->laboratorio_id = $request->get('laboratorio_id');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->indicaciones = $request->get('indicaciones');
        $producto->advertencia = $request->get('advertencia');
        $producto->tipo_id = $request->get('tipo_id');
        $composiciones =  $request->get('array_composicion');
        $producto->save();
       foreach( $composiciones as $composicion){

            // $compo = new Composicion();
            // $compo->cantidad = $composicion['cantidad'];
            // $compo->principio_activo = $composicion['principio_activo'];
            // $compo->unidad_medida = $composicion['unidad'];
            // $compo->farmaco_id = $composicion['farmaco_id'];
            // $compo->producto_id = $producto->id;
            // $compo->save();
            $producto->composicion()->attach(['farmaco_id' => $composicion['farmaco_id']],['cantidad'=> $composicion['cantidad'],
            'principio_activo' => $composicion['principio_activo'],'unidad_medida' => $composicion['unidad'] ]);

            // $compra->lotes()->attach(['lote_id' => $lote['loteId']], ['precio_venta' => $monto]);
        }

        return response()->json([
            "status"=> 200,
            'mensaje'=> "datos Creado Correctamente",
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('inventario.producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $laboratorios = Laboratorio::all();
        $categorias = Categoria::all();
        $formas = Forma::all();
        $tipos = TipoProducto::all();
        $farmacos = Farmaco::all();
        $unidades =__('datos.unidad_medida');
        $unidades = new Collection($unidades);
        $producto['composicion'] = $producto->composicion;
        $producto['forma'] = $producto->forma;
        $producto['laboratorio'] = $producto->laboratorio;
        $producto['categoria'] = $producto->categoria;
        $producto['tipo'] = $producto->tipo;
        return view('inventario.producto.edit', compact('producto', 'laboratorios', 'categorias', 'formas', 'tipos', 'unidades', 'farmacos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->nombre_generico = $request->get('nombre_generico');
        $producto->descripcion = $request->get('descripcion');
        $producto->receta = $request->receta;
        $producto->contenido = $request->contenido;
        $producto->unidad_medida = $request->get('unidad_medida');
        $producto->precio = $request->get('precio');
        $producto->forma_id = $request->get('forma_id');
        $producto->generico = $request->get('generico');
        $producto->laboratorio_id = $request->get('laboratorio_id');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->indicaciones = $request->get('indicaciones');
        $producto->advertencia = $request->get('advertencia');
        $producto->tipo_id = $request->get('tipo_id');
        $producto->update();

        return response()->json([
            "status"=> 200,
            'mensaje'=> "datos Actualizado",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
