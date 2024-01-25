
@extends('layouts.app',['page' => 'Nueva Nota de Salida', 'pageSlug' => '', 'section' => 'Movimiento'])
@section('content')

<add-lote-salida :nota= "{{$nota}}" :usuarios= "{{$userss}}"/>


@endsection