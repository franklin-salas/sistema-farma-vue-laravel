@extends('layouts.app',['page' => 'Lista de Lotes', 'pageSlug' => 'Lotes', 'section' => 'Inventario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('lote.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
                </div>
            </div>
            <div class="ibox-content">
                @include('alerts.success')
                <div class="table-responsive">
                <table  class=" table table-stripped toggle-arrow-tiny" data-page-size="15">
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Fecha de Caducidad</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Dañados </th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($lotes as $lote)
                    <tr>
                        <td>L- {{$lote->id}}</td>
                        <td>{{$lote->codigo}}</td>
                        <td><span class="line">{{$lote->fecha_vencimiento->format('d M Y')}}</span></td>
                        
                        <td>
                        <a href="{{ route('lote.show', $lote) }}" class="btn btn-primary " type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                    
                        <form action="{{ route('lote.destroy', $lote) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger " data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este lote?.') ? this.parentElement.submit() : ''">
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
                                    {{ $lotes->links() }}
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