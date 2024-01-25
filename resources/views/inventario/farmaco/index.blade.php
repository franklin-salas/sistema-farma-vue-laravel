@extends('layouts.app',['page' => 'Nuevo Farmaco', 'pageSlug' => 'Farmaco ', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('farmacos.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
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
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($farmacos as $farmaco)
                    <tr>
                        <td>F- {{$farmaco->id}}</td>
                        <td><span class="line">{{$farmaco->nombre}}</span></td>
                        
                        <td>
                        <a href="{{ route('farmacos.show', $farmaco) }}" class="btn btn-primary" type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('farmacos.edit', $farmaco) }}" class="btn btn-success" type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('farmacos.destroy', $farmaco) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este Farmaco?.') ? this.parentElement.submit() : ''">
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
                                    {{ $farmacos->links() }}
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