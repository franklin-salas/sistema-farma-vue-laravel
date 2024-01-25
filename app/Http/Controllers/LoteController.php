<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\LoteRequest;
use App\Lote;
use App\Producto;
use Illuminate\Http\Request;


class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::paginate(25);
        return view('inventario.lote.index', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $productos = Producto:: all();
          return view('inventario.lote.create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoteRequest $request)
    {
        $lote = new Lote();
        $lote->codigo = $request->get('codigo');
        $lote->fecha_vencimiento = Carbon::parse($request->get('fecha'))->format('d-m-Y');
        $lote->producto_id = $request->producto_id;
        // $fecha_vencimiento = Carbon::createFromFormat( 'd/m/Y', $request->fecha_vencimiento ); 
        // dd($lote);
        $lote->save();  

        return redirect()
            ->route('lote.index')
            ->withStatus('Lote creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show(Lote $lote)
    {
        return view('inventario.lote.show', [
            'lote' => $lote
        //    'products' => Product::where('product_category_id', $category->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote)
    {
        return view('inventario.lote.edit', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(LoteRequest $request, Lote $lote)
    {
        $lote->update($request->all());

        return redirect()
            ->route('lote.index')
            ->withStatus('Lote actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        $lote->delete();

        return redirect()
            ->route('lote.index')
            ->withStatus('lote eliminada correctamente.');
    }
}
