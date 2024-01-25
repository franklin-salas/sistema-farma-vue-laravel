<?php

namespace App\Http\Controllers;

use App\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\TipoProductoRequest;

class TipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tipoProductos = TipoProducto::paginate(25);
        return view('inventario.producto.tipo.index', compact('tipoProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.producto.tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoProductoRequest $request)
    {
        $tipoProducto = new TipoProducto();
        $tipoProducto->create($request->all());

        return redirect()
            ->route('tipos.index')
            ->withStatus('Tipo de Producto creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProducto $tipo)
    {
        return view('inventario.producto.tipo.show', [
            'tipo' => $tipo,
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProducto $tipo)
    {
        return view('inventario.producto.tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function update(TipoProductoRequest $request, TipoProducto $tipo)
    {
        $tipo->update($request->all());

        return redirect()
            ->route('tipos.index')
            ->withStatus('Tipo de Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProducto $tipo)
    {
        $tipo->delete();

        return redirect()
            ->route('tipos.index')
            ->withStatus('Tipo de producto eliminado correctamente.');
    }
}
