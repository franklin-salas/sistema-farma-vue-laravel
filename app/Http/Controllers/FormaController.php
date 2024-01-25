<?php

namespace App\Http\Controllers;

use App\Forma;
use Illuminate\Http\Request;
use App\Http\Requests\FormaRequest;

class FormaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formas = Forma::paginate(25);
        return view('inventario.forma.index', compact('formas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.forma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormaRequest $request)
    {
        $forma = new forma(); 
        $forma->create($request->all());

        return redirect()
            ->route('formas.index')
            ->withStatus('Forma de presentación creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function show(Forma $forma)
    {
        return view('inventario.forma.show', [
            'forma' => $forma,
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function edit(Forma $forma)
    {
        return view('inventario.forma.edit', compact('forma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forma $forma)
    {
        $forma->update($request->all());

        return redirect()
            ->route('formas.index')
            ->withStatus('Formas de presentación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forma $forma)
    {
        $forma->delete();

        return redirect()
            ->route('formas.index')
            ->withStatus('Formas de presentación eliminada correctamente.');
    }
}
