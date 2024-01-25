<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Ingreso;
use App\Ingreso_Detalle;
use App\Producto;
use App\Proveedor;
use App\Lote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Ingreso::latest()->paginate(25);
        // Ingreso::where('almacen_id', 0)->delete();

        return view('ingreso.index',['notas' => $notas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacenes = Almacen::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        
        return view('ingreso.create',compact('almacenes','productos','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ingreso = new  Ingreso();
        $ingreso->codigo = $request->codigo;
        $ingreso->fecha = Carbon::parse($request->fecha) ;
        $ingreso->tipo = $request->tipo;
        $ingreso->estado = $request->estado;
        $ingreso->almacen_id = $request->almacen_id;
        $ingreso->usuario_id = $request->usuario_id;
        $ingreso->proveedor_id = $request->proveedor_id;
        $ingreso->save();
        $detalle_producto = $request->detalle_productos;

        foreach ($detalle_producto as $detalle) {
            
            $ingreso_d = new Ingreso_Detalle();
           
            $ingreso_d->cantidad = $detalle['cantidad'];
            $ingreso_d->precio =  $detalle['precio'];
            $ingreso_d->subtotal = $detalle['cantidad'] * $detalle['precio'];
            $ingreso_d->descripcion = $detalle['descripcion'];
            $ingreso_d->ingreso_id =$ingreso->id;
            $ingreso_d->producto_id = $detalle['producto_id'];
            $ingreso_d->save();
            
        }

        return response()->json([
            "status"=> 200,
            'mensaje'=>$detalle_producto,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $nota = Ingreso::find($id);
        return view('ingreso.add_lote',compact('nota'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $nota = Ingreso::find($id);
       $nota->delete();
       return redirect()
            ->route('ingreso.index')
            ->withStatus('Nota de ingreso anulada correctamente.');
    }

    public function guardarLotes(Request $request)
    {
        $detalle_ingreso = Ingreso_Detalle::firstWhere('ingreso_id', $request->get('ingreso')['id']);
        $producto = Producto::firstWhere('id', $request->get('producto')['id']);

        foreach ($request->get('lotes') as $key => $lot) {
            $lote = Lote::create([
                'codigo' => $lot['codigo'],
                'fecha_vencimiento' => $lot['fecha'],
                'producto_id' => $producto->id,
            ]);

            $lote->detalleIngresos()->attach(['ingreso_detalle_id' => $detalle_ingreso->id],['cantidad'=>$lot['cantidad']]);
        }

        $this->verifi_estado_ingreso($request->get('ingreso')['id']);
        return response()->json([
            "status"=> 200,
            'mensaje'=> 'Proceso realizado con éxito.',
        ]);
    }
    public function verifi_estado_ingreso($ingreso_id)
    {
        $canDetalle = 0;
        $canDetalleLote = 0;
        $ingreso = Ingreso::firstWhere('id', $ingreso_id);
        foreach ($ingreso->ingresoDetalles as $key => $detalle) {
            $canDetalle += floatval($detalle->cantidad);
            foreach ($detalle->lotes as $index => $lote) {
                $canDetalleLote += floatval($lote->pivot->cantidad);
            }
        }
        if ($canDetalle == $canDetalleLote) {
            $ingreso->estado = 'Terminado';
            $ingreso->update();
        }
        return $canDetalleLote;
    }

}
