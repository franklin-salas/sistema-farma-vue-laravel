@extends('layouts.app',['page' => 'Nueva Forma de Presentación ', 'pageSlug' => 'Forma de Presentación ', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('formas.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
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
                        @foreach ($formas as $forma)
                    <tr>
                        <td>F- {{$forma->id}}</td>
                        <td><span class="line">{{$forma->nombre}}</span></td>
                   
                        <td>
                        <a href="{{ route('formas.show', $forma) }}" class="btn btn-primary " type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('formas.edit', $forma) }}" class="btn btn-success " type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('formas.destroy', $forma) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger " data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar esta Forma de Presentación?.') ? this.parentElement.submit() : ''">
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
                                    {{ $formas->links() }}
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