@extends('layouts.app',['page' => 'Nueva Nota de Ingreso ', 'pageSlug' => '', 'section' => 'Movimiento'])
@section('content')
<create-ingreso :almacenes= "{{$almacenes}}" 
                :productos= "{{$productos}}"
                :proveedores= "{{$proveedores}}"
                :usuarios= "{{$userss}}"
/>


@endsection