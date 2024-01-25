@extends('layouts.app',['page' => 'Lista de Notas de Ingreso', 'pageSlug' => 'Ingresos', 'section' => 'Movimiento'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">

                <div class="col-lg-4">
                        <a href="{{route('ingreso.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
                </div>
            </div>
            <div class="ibox-content">
                @include('alerts.success')
                <div class="table-responsive">
                <table class="table table-stripped toggle-arrow-tiny">
                    <thead >
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Almacen</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tipo</th>
                    
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas as $nota)
                    <tr>
                        <td>{{$nota->codigo}}</span></td>
                        <td >{{$nota->fecha}} </td>
                        <td >{{$nota->almacen->nombre}} </td>
                        <td ><span class="label label-primary">{{$nota->estado}}</span> </td>
                        <td ><span class="label label-info">{{$nota->tipo}}</span></td>
                        <td>
                           
                        <a href="{{ route('ingreso.edit', $nota->id) }}" class="btn btn-primary " type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                   
                        <form action="{{ route('ingreso.destroy', $nota->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger " data-toggle="tooltip" data-placement="bottom" title="Anular" onclick="confirm('¿Está seguro de que desea Anular nota de ingreso?') ? this.parentElement.submit() : ''">
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
                                    {{ $notas->links() }}
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
