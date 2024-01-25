<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Ingreso;
use App\Producto;
use App\Salida;
use App\Salida_Detalle;
use App\Lote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notas = Salida::latest()->paginate(25);
        return view('salida.index',['notas' => $notas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacenes = Almacen::all();
        $productos = Producto::with('detalleIngresoPro')->get();
        
        return view('salida.create',compact('almacenes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salida = new  Salida();
        $salida->codigo = $request->codigo;
        $salida->fecha = Carbon::parse($request->fecha);
        $salida->tipo = $request->tipo;
        $salida->estado = $request->estado;
        $salida->almacen_id = $request->almacen_id;
        $salida->usuario_id = $request->usuario_id;
        $salida->save();
        $detalle_producto = $request->detalle_productos;

        foreach ($detalle_producto as $detalle) {
            $salida_d = new Salida_Detalle();
            $salida_d->cantidad = $detalle['cantidad'];
            $salida_d->precio =  $detalle['precio'];
            $salida_d->subtotal = $detalle['cantidad'] * $detalle['precio'];
            $salida_d->descripcion = $detalle['descripcion'];
            $salida_d->salida_id =$salida->id;
            $salida_d->producto_id = $detalle['producto_id'];
            $salida_d->save();
        }

        return response()->json([
            "status"=> 200,
            'mensaje'=>$detalle_producto,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $nota = Salida::find($id);
        return view('salida.add_lote',compact('nota'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Salida::find($id);
        $nota->delete();
        return redirect()
             ->route('salida.index')
             ->withStatus('Nota de salida anulada correctamente.');
    }

    
    public function obtenerProductos ($id)
    {
        
        $productos = []; 

        return response()->json([
            "status"=> 200,
            'productos'=>$productos,
            'mensaje' => Salida::where('almacen_id',$id),

        ]);
        
    }

    public function getProductos(Request $request)
    {
        
        $search=$request->get("searchProducto");
        $almacen_id=$request->get("almacenId");
        if($search!=null && $almacen_id!=null){
            $productos = Salida::where('almacen_id',$almacen_id)->productos();  
                     // $productos = Ingreso::join('proyecto_vendedor', 'vendedor.id', '=', 'proyecto_vendedor.vendedor_id')
                // ->where('proyecto_vendedor.proyecto_id',$proyecto_id)
                // ->vendedores($search)
                // ->orderBy('nombre', 'asc')
                // ->take(10)
                // ->get();
        }
        return response()->json([
            'productos' => $productos,
        ]);
    }

    public function guardarLotes(Request $request)
    {
        $detalle_salida = Salida_Detalle::firstWhere('salida_id', $request->get('salida')['id']);

        foreach ($request->get('lotes') as $key => $lot) {
            $lote = Lote::firstWhere('id', $lot['lote_id']);
            $lote->detalleSalidas()->attach(['detalle_salida_id' => $detalle_salida->id],['cantidad'=>$lot['cantidad']]);
        }

        $this->verifi_estado_salida($request->get('salida')['id']);
        return response()->json([
            "status"=> 200,
            'mensaje'=> 'Proceso realizado con éxito.',
        ]);
    }

    public function verifi_estado_salida($salida_id)
    {
        $canDetalle = 0;
        $canDetalleLote = 0;
        $salida = Salida::firstWhere('id', $salida_id);
        foreach ($salida->salidaDetalles as $key => $detalle) {
            $canDetalle += floatval($detalle->cantidad);
            foreach ($detalle->lotes as $index => $lote) {
                $canDetalleLote += floatval($lote->pivot->cantidad);
            }
        }
        if ($canDetalle == $canDetalleLote) {
            $salida->estado = 'Terminado';
            $salida->update();
        }
        return $canDetalleLote;
    }
    
}
