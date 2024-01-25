

@extends('layouts.app',['page' => 'Nuevo Producto', 'pageSlug' => 'Producto', 'section' => 'Inventario'])
@section('content')
    <create-product
        :laboratorios = "{{$laboratorios}}"
        :categorias = "{{$categorias}}"
        :formas = "{{$formas}}"
        :tipos = "{{$tipos}}"
        :unidades = "{{$unidades}}"
        :farmacos = "{{$farmacos}}"
        :userss = "{{$userss}}"

    ></create-product>
@endsection
