@extends('layouts.app',['page' => 'Lista de Usuario', 'pageSlug' => '', 'section' => 'Usuario'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title ">
                
                <div class="col-lg-4">
                        <a href="{{route('usuario.create')}}" class="btn btn-primary btn-lg ">Nuevo</a>
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
                        <th scope="col">Correo</th>
                        <th scope="col">CI</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                    <tr>
                        <td>PV- {{$usuario->id}}</td>
                        <td><span class="line">{{$usuario->name}} {{$usuario->apellido}}</span></td>
                        <td >{{$usuario->email}} </td>
                        <td >{{$usuario->ci}} </td>
                        <td >{{$usuario->telefono}} </td>
                           <td>
                        <a href="{{ route('usuario.show', $usuario) }}" class="btn btn-primary btn-circle" type="button" title="Detalle"><i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-success btn-circle" type="button" title="Editar" ><i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('usuario.destroy',$usuario) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="confirm('¿Está seguro de que desea eliminar este usuario?') ? this.parentElement.submit() : ''">
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
                                    {{ $usuarios->links() }}
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