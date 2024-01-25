@extends('layouts.app',['page' => 'Nuevo Tipo de Producto ', 'pageSlug' => 'Tipo de Producto ', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('tipos.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
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
                        <th scope="col">Stock</th>
                        <th scope="col">Dañados </th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipoProductos as $tipoProducto)
                    <tr>
                        <td>TP- {{$tipoProducto->id}}</td>
                        <td><span class="line">{{$tipoProducto->nombre}}</span></td>
                        <td class="text-navy"><i class="fa fa-level-up"></i> 00</td>
                        <td class="text-warning"> <i class="fa fa-level-down"></i> 40% </td>
                        <td>
                        <a href="{{ route('tipos.show', $tipoProducto) }}" class="btn btn-primary" type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('tipos.edit', $tipoProducto) }}" class="btn btn-success" type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('tipos.destroy', $tipoProducto) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este tipo de Producto?.') ? this.parentElement.submit() : ''">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination float-right">
                                    {{ $tipoProductos->links() }}
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