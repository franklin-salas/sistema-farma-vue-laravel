@extends('layouts.app',['page' => 'Detalle de Tipos de Productos', 'pageSlug' => 'Tipo de Productos', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                <div class="row">
                    <div class="col-sm-11">
                        <h4>Detalles</h4>
                    </div>
                <div class="col-sm-1">
                        <a href="{{ route('tipos.edit', $tipo) }}" class="btn btn-success btn-lg ">Editar</a>
                </div>
            </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td class="desc">
                                <h3>
                                <a href="#" class="text-navy">
                                    {{$tipo->nombre}}
                                </a>
                                </h3>
                                <dl class="small m-b-none">
                                    <dt>Descripción</dt>
                                    <dd>Codigo : F-{{$tipo->id}} </dd>
                                    <dd>Cantidad de productos : 12 </dd>
                                    <dd>Stock total : 12 </dd>
                                    <dd>Defectuoso total : 12 </dd>
                                </dl>
                            </td>

                         </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content">
                @include('alerts.success')
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Dañados </th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($categorias as $categoria) --}}
                    {{-- <tr>
                        <td>{{$laboratorio->id}}</td>
                        <td><span class="line">{{$laboratorio->nombre}}</span></td>
                        <td class="text-navy"><i class="fa fa-level-up"></i> 00</td>
                        <td class="text-warning"> <i class="fa fa-level-down"></i> 40% </td>
                        <td>
                        <button class="btn btn-primary btn-circle" type="button"><i class="fa fa-search"></i>
                        </button>
                        <a href="{{ route('laboratorios.edit', $laboratorio) }}" class="btn btn-success btn-circle" type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('laboratorios.destroy', $laboratorio) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar esta categoría? Todos los productos que le pertenecen serán eliminados y los registros que lo contengan no serán precisos.') ? this.parentElement.submit() : ''">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </td>

                    </tr> --}}
                    {{-- @endforeach --}}
                    </tbody>
                </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection