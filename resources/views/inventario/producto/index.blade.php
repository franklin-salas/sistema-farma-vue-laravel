@extends('layouts.app',['page' => 'Lista de Productos', 'pageSlug' => 'Inventario', 'section' => 'Productos'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">

                <div class="col-lg-4">
                        <a href="{{route('productos.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
                </div>
            </div>
            <div class="ibox-content">
                @include('alerts.success')
                <div class="table-responsive">
                <table class="table table-stripped toggle-arrow-tiny">
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Concentración</th>
                        <th scope="col">Receta</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                    <tr>
                        <td>PV- {{$producto->id}}</td>
                        <td><span class="line">{{$producto->nombre}}</span></td>
                        <td >{{$producto->descripcion}} </td>
                        <td >{{$producto->precio}} </td>
                        <td >{{$producto->concentracion}} </td>
                        <td >
                            @if($producto->receta == 1)
                            <span class="label label-danger">Requiere</span>
                            @else
                            <span class="label label-primary">No Requiere</span>
                            @endif
                        </td>
                        <td>
                        <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary " type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-success " type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('productos.destroy',$producto) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este Proveedor?') ? this.parentElement.submit() : ''">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <ul class="pagination float-right">
                                    {{ $productos->links() }}
                                </ul>

                            </td>
                        </tr>
                        </tfoot>
                   </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
