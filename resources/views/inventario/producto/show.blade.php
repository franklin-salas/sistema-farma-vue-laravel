@extends('layouts.app',['page' => 'Detalle de Producto', 'pageSlug' => 'Producto', 'section' => 'Inventario'])
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title ">
                    <div class="row">
                        <div class="col-lg-10">
                            <h4 class="d-inline">Detalles</h4>
                            <a href="{{route('productos.index')}}"> <button type="button" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Atras</button> </a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-info btn-xs float-right">Editar Producto</a>

                                <h2>{{$producto->nombre}}</h2>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Estado:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"><span class="label label-primary">Activo</span></dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Codigo:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">{{$producto->codigo}}</dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Receta Medica:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"><span class="label label-primary">{{$producto->receta}}</span></dd>
                                </div>
                            </dl>

                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Descripcion:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->descripcion}} </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Contenido:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"><a href="#"
                                                        class="text-navy"> {{$producto->contenido}} {{$producto->unidad_medida}} </a>
                                    </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Precio:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->precio}} bs</dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Forma:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->forma->nombre}} </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Laboratorio:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->laboratorio->nombre}} </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Categoria:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->categoria->nombre}} </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Indicaciones:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->indicaciones}} </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Advertencias:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->advertencia}} </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="col-lg-6" id="cluster_info">

                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Ultima Actualizacion:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">{{$producto->updated_at}}</dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Fecha de creacion:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> {{$producto->created_at}}</dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Nombre Generico:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="project-people mb-1">
                                        {{$producto->nombre_generico}}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-lg-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link" href="#tab-1" data-toggle="tab">Composición:</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">

                                            <table class="table table-striped">
                                                <thead>

                                                <tr>
                                                    <th>Farmaco</th>
                                                    <th>Cantidad</th>
                                                    <th>Principio Activo</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($producto->composicion as $composicion)
                                                <tr>
                                                    <td>
                                                        <span class="label label-primary"><i class="fa fa-check"></i> {{$composicion->nombre}}</span>
                                                    </td>
                                                    <td>
                                                        {{$composicion->pivot->cantidad}} {{$composicion->pivot->unidad_medida}}
                                                    </td>
                                                    <td>
                                                        {{$composicion->pivot->principio_activo}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
