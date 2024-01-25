<?php

namespace App\Http\Controllers;

use App\Farmaco;
use Illuminate\Http\Request;
use App\Http\Requests\FarmacoRequest;

class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmacos = Farmaco::paginate(25);
        return view('inventario.farmaco.index', compact('farmacos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.farmaco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmacoRequest $request)
    {
         $farmaco = new Farmaco(); 
         $farmaco->create($request->all());

        return redirect()
            ->route('farmacos.index')
            ->withStatus('Farmaco creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farmaco  $farmaco
     * @return \Illuminate\Http\Response
     */
    public function show(Farmaco $farmaco)
    {
        return view('inventario.farmaco.show', [
            'farmaco' => $farmaco,
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmaco  $farmaco
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmaco $farmaco)
    {
        return view('inventario.farmaco.edit', compact('farmaco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmaco  $farmaco
     * @return \Illuminate\Http\Response
     */
    public function update(FarmacoRequest $request, Farmaco $farmaco)
    {
        $farmaco->update($request->all());

        return redirect()
            ->route('farmacos.index')
            ->withStatus('Farmaco actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmaco  $farmaco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmaco $farmaco)
    {
        $farmaco->delete();

        return redirect()
            ->route('farmaco.index')
            ->withStatus('Farmaco eliminado correctamente.');
    }
}
