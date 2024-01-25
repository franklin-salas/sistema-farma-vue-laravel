@extends('layouts.app',['page' => 'Lista de Categorias', 'pageSlug' => 'Categoria', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('almacen.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
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
                        <th scope="col">Operaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($almacenes as $almacen)
                    <tr>
                        <td>A- {{$almacen->id}}</td>
                        <td><span class="line">{{$almacen->nombre}}</span></td>
                    
                        <td>
                        <a href="{{ route('almacen.show', $almacen) }}" class="btn btn-primary " type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('almacen.edit', $almacen) }}" class="btn btn-success " type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('almacen.destroy', $almacen) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este Almacen?.') ? this.parentElement.submit() : ''">
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
                                    {{ $almacenes->links() }}
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