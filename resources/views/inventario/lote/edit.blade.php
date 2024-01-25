@extends('layouts.app',['page' => 'Editar Categoria', 'pageSlug' => 'Categoria', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('categorias.update', $categoria) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2  col-form-label ">Nombre</label>
                            <div class="col-sm-8"><input type="text" placeholder="Analgésico" name="nombre"
                                id="nombre" class="form-control" value="{{old('nombre', $categoria->nombre)}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection