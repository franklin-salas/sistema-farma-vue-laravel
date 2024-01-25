@extends('layouts.app',['page' => 'Editar Farmaco', 'pageSlug' => 'Farmaco', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('farmacos.update', $farmaco) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2  col-form-label ">Nombre</label>
                            <div class="col-sm-8"><input type="text" placeholder="nombre del farmaco  ej: Amoxicilina .." name="nombre"
                                id="nombre" class="form-control" value="{{old('nombre', $farmaco->nombre)}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{ route('farmacos.index') }}" class ="btn btn-white btn-sm" 
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