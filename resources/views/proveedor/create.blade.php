@extends('layouts.app',['page' => 'Nuevo Proveedor', 'pageSlug' => '', 'section' => 'Proveedor'])
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('proveedors.store') }}" autocomplete="off">
                        @csrf
                    
                        <div class="form-group row {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label for="nombre" class="col-sm-2 form-control-label ">Nombre</label>
                                <div class="col-sm-8">
                                <input type="text" name="nombre" placeholder="Nombre"
                                 id="nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'nombre'])
                                </div>
                        </div>
                        <div class="form-group row {{ $errors->has('razon_social') ? ' has-danger' : '' }}">
                            <label for="razon_social" class="col-sm-2 form-control-label ">Razón Social</label>
                                <div class="col-sm-8">
                                <input type="text" name="razon_social" placeholder="Razón Social"
                                 id="razon_social" class="form-control form-control-alternative{{ $errors->has('razon_social') ? ' is-invalid' : '' }}" value="{{ old('razon_social') }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'razon_social'])
                                </div>
                        </div>

                        <div class="form-group row {{ $errors->has('nit') ? ' has-danger' : '' }}">
                            <label for="nit" class="col-sm-2 form-control-label ">Nit</label>
                                <div class="col-sm-8">
                                <input type="text" name="nit" placeholder="Nit"
                                 id="nit" class="form-control form-control-alternative{{ $errors->has('nit') ? ' is-invalid' : '' }}" value="{{ old('nit') }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'nit'])
                                </div>
                        </div>

                        <div class="form-group row {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                            <label for="direccion" class="col-sm-2 form-control-label ">Dirección</label>
                                <div class="col-sm-8">
                                <input type="text" name="direccion" placeholder="Dirección"
                                 id="direccion" class="form-control form-control-alternative{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{ old('direccion') }}" autofocus>
                                 @include('alerts.feedback', ['field' => 'direccion'])
                                </div>
                        </div>
                        <div class="form-group row {{ $errors->has('telefono') ? ' has-danger' : '' }}">
                            <label for="telefono" class="col-sm-2 form-control-label ">Teléfono</label>
                                <div class="col-sm-8">
                                <input type="text" name="telefono" placeholder="Teléfono"
                                 id="telefono" class="form-control form-control-alternative{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}" autofocus>
                                 @include('alerts.feedback', ['field' => 'telefono'])
                                </div>
                        </div>
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset--4">
                                <a href="{{ route('proveedors.index') }}" class ="btn btn-white btn-sm" 
                                >Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection