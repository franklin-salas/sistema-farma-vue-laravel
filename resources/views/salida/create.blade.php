@extends('layouts.app',['page' => 'Nueva Nota de Salida ', 'pageSlug' => '', 'section' => 'Movimiento'])
@section('content')
<create-salida :almacenes= "{{$almacenes}}" 
                :productos= "{{$productos}}"
                :usuarios= "{{$userss}}"
/>

{{-- <div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('proveedors.store') }}" autocomplete="off">
                        @csrf
                        <div class="ibox-content m-b-sm border-bottom">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="codigo">Código</label>
                                        <input type="text" id="codigo" name="codigo" value="" placeholder="Codigo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="fecha">Fecha de  Ingreso</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fecha" type="text" class="form-control" value="03/04/2014">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="customer">Empleado</label>
                                        <input type="text" id="empleado" name="empleado" value="" placeholder="Empleado" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="date_added">Almacén</label>
                                        <select class="form-control form-control-lg" id="almacen" name="almacen">
                                            <option>Large select</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="producto">Producto</label>
                                        <select class="form-control form-control-lg" id = 'producto' name= 'producto'>
                                            <option>Large select</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="lote">Lote</label>
                                        <select class="form-control form-control-lg" id = 'lote' name= 'lote'>
                                            <option>Large select</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                        
             
                        
                    </form>
                </div>
            </div>
    </div>
</div> --}}

@endsection