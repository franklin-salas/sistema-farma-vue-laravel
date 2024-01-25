@extends('layouts.app',['page' => 'Nuevo Tipo de Producto ', 'pageSlug' => 'Tipo de Producto ', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('tipos.store') }}" autocomplete="off">
                        @csrf
                    
                        <div class="form-group row {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label for="nombre" class="col-sm-2 form-control-label ">Nombre</label>
                                <div class="col-sm-8">
                                <input type="text" name="nombre" placeholder="nombre del tipo de producto  ej: Medicamento .."
                                 id="nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
                                 @include('alerts.feedback', ['field' => 'nombre'])
                                </div>
                        </div>
                    
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{ route('tipos.index') }}" class ="btn btn-white btn-sm" 
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