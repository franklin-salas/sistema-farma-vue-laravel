

@extends('layouts.app',['page' => 'Editar Producto', 'pageSlug' => 'Producto', 'section' => 'Inventario'])
@section('content')
    <edit-product
        :laboratorios = "{{$laboratorios}}"
        :categorias = "{{$categorias}}"
        :formas = "{{$formas}}"
        :tipos = "{{$tipos}}"
        :unidades = "{{$unidades}}"
        :farmacos = "{{$farmacos}}"
        :userss = "{{$userss}}"
        :producto = "{{$producto}}"
    ></edit-product>
@endsection
