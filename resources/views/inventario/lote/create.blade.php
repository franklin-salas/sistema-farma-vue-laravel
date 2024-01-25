@extends('layouts.app',['page' => 'Nuevo Lote', 'pageSlug' => 'Lote', 'section' => 'Inventario'])
@section('content')

<create-lote  :productos= "{{$productos}}"
                
/>

{{-- <div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="{{ route('lote.store') }}" autocomplete="off">
                        @csrf
                    
                    <div class="row  justify-content-center">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-form-label" for="codigo">Código</label>
                                <input type="text" id="codigo" name="codigo" value="" placeholder="Código" 
                                class="form-control form-control-alternative{{ $errors->has('codigo') ? ' is-invalid' : '' }}" value="{{ old('codigo') }}">
                                @include('alerts.feedback', ['field' => 'codigo'])
                            </div>
                        </div>
                        <div class=" col-sm-10 ">
                            <div class="form-group">
                                <label class="col-form-label" for="date_added">Fecha de Caducidad</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" name="fecha_vencimiento" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-10 ">
                            <div class="form-group">
                                <label class="col-form-label" for="date_added">Fecha de Caducidad</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" name="fecha_vencimiento" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                    </div>
                   
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{ route('categorias.index') }}" class ="btn btn-white btn-sm" 
                                >Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div> --}}

@endsection

