@extends('layouts.app',['page' => 'Lista de Proveedores', 'pageSlug' => '', 'section' => 'Proveedor'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('proveedors.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
                </div>
            </div>
            <div class="ibox-content">
                @include('alerts.success')
                <div class="table-responsive">
                <table  class=" table table-stripped toggle-arrow-tiny" data-page-size="15">
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Razon Social</th>
                        <th scope="col">Nit</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>PV- {{$proveedor->id}}</td>
                        <td><span class="line">{{$proveedor->nombre}}</span></td>
                        <td >{{$proveedor->razon_social}} </td>
                        <td >{{$proveedor->nit}} </td>
                        <td >{{$proveedor->direccion}} </td>
                        <td >{{$proveedor->telefono}} </td>
                        <td>
                        <a href="{{ route('proveedors.show', $proveedor) }}" class="btn btn-primary" type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('proveedors.edit', $proveedor) }}" class="btn btn-success" type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('proveedors.destroy',$proveedor) }}" method="post" class="d-inline">
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
                                    {{ $proveedores->links() }}
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