<?php

namespace App\Http\Controllers;

use App\Laboratorio;
use Illuminate\Http\Request;
use App\Http\Requests\LaboratorioRequest;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorios = Laboratorio::paginate(25);
        return view('inventario.laboratorio.index', compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.laboratorio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratorioRequest $request)
    {
        $laboratorio = new Laboratorio();
        $laboratorio->create($request->all());

        return redirect()
            ->route('laboratorios.index')
            ->withStatus('Laboratorio creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio)
    {
        return view('inventario.laboratorio.show', [
            'laboratorio' => $laboratorio
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorio $laboratorio)
    {
        return view('inventario.laboratorio.edit', compact('laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorio $laboratorio)
    {
        $laboratorio->update($request->all());

        return redirect()
            ->route('laboratorios.index')
            ->withStatus('Laboratorio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio->delete();

        return redirect()
            ->route('laboratorios.index')
            ->withStatus('Laboratorio eliminado correctamente.');
    }
}
