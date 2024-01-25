<?php

namespace App\Http\Controllers;

use App\Almacen;
use Illuminate\Http\Request;
use App\Http\Requests\AlmacenRequest;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Almacen::paginate(25);
        return view('inventario.almacen.index', compact('almacenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.almacen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlmacenRequest $request)
    {
        $almacen = new Almacen(); 
        $almacen->create($request->all());

        return redirect()
            ->route('almacen.index')
            ->withStatus('Almacen creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        return view('inventario.almacen.show', [
            'almacen' => $almacen
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        return view('inventario.almacen.edit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(AlmacenRequest $request, Almacen $almacen)
    {
        $almacen->update($request->all());

        return redirect()
            ->route('almacen.index')
            ->withStatus('Almacen actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        
        $almacen->delete();

        return redirect()
            ->route('almacen.index')
            ->withStatus('Almacen eliminado correctamente.');
    }
}
