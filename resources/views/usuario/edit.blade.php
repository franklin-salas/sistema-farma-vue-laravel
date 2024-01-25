@extends('layouts.app',['page' => 'Editar Usuario', 'pageSlug' => '', 'section' => 'Usuario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('proveedors.update', $proveedor) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name" class="col-sm-2 form-control-label ">Nombre</label>
                                <div class="col-sm-8">
                                <input type="text" name="nombre" placeholder="Nombre"
                                 id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name',$proveedor->name) }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'name'])
                                </div>
                        </div>
                        <div class="form-group row {{ $errors->has('apellido') ? ' has-danger' : '' }}">
                            <label for="apellido" class="col-sm-2 form-control-label ">Apellido</label>
                                <div class="col-sm-8">
                                <input type="text" name="apellido" placeholder="Apellido"
                                 id="apellido" class="form-control form-control-alternative{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ old('apellido',$usario->apellido) }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'apellido'])
                                </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="col-sm-2 form-control-label ">Correo</label>
                                <div class="col-sm-8">
                                <input type="text" name="email" placeholder="Correo"
                                 id="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email',$usuario->email) }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'email'])
                                </div>
                        </div>

                        <div class="form-group row {{ $errors->has('ci') ? ' has-danger' : '' }}">
                            <label for="ci" class="col-sm-2 form-control-label ">CI</label>
                                <div class="col-sm-8">
                                <input type="text" name="ci" placeholder="CI"
                                 id="ci" class="form-control form-control-alternative{{ $errors->has('ci') ? ' is-invalid' : '' }}" value="{{ old('ci',$usario->ci) }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'ci'])
                                </div>
                        </div>
                        <div class="form-group row {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                            <label for="direccion" class="col-sm-2 form-control-label ">Dirección</label>
                                <div class="col-sm-8">
                                <input type="text" name="direccion" placeholder="Dirección"
                                 id="direccion" class="form-control form-control-alternative{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{ old('direccion',$usuario->direccion) }}" autofocus>
                                 @include('alerts.feedback', ['field' => 'direccion'])
                                </div>
                        </div>
                      
                        <div class="form-group row {{ $errors->has('telefono') ? ' has-danger' : '' }}">
                            <label for="direccion" class="col-sm-2 form-control-label ">Teléfono</label>
                                <div class="col-sm-8">
                                <input type="text" name="telefono" placeholder="Teléfono"
                                 id="telefono" class="form-control form-control-alternative{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono',$usuario->telefono) }}"  autofocus>
                                 @include('alerts.feedback', ['field' => 'telefono'])
                                </div>
                        </div>
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{ route('usuario.index') }}" class ="btn btn-white btn-sm" 
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