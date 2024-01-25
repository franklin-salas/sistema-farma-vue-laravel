@extends('layouts.app',['page' => 'Nueva Nota de Ingreso ', 'pageSlug' => '', 'section' => 'Movimiento'])
@section('content')
<add-lote :nota= "{{$nota}}"
:usuarios= "{{$userss}}"
                
/>

{{-- <div class="">


    <div class="ibox-content m-b-sm ">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="order_id">Codigo</label>
                    <input type="text"   class="form-control" disabled>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="date_added">Fecha de Ingreso</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input  type="text" class="form-control" value="03/04/2014" disabled>
                    </div>
                </div>    
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="status">Empleado</label>
                    <input type="text"  class="form-control" disabled>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label" for="status">Almacen</label>
                    <input type="text"  class="form-control" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label" for="amount">Proveedor</label>
                    <input type="text"  value="" placeholder="Jose miguel" class="form-control" disabled>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class=" table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>

                            <th>Codigo</th>
                            <th >Producto</th>
                            <th data-hide="phone">Cantidad</th>
                            <th data-hide="phone">Lote</th>
                            <th data-hide="phone">Estado</th>
                            <th class="text-right">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                               3214
                            </td>
                            <td>
                                Customer example
                            </td>
                            <td>
                                $500.00
                            </td>
                            <td>
                           <ul  class="nav metismenu">
                               <li>
                                <i class="fa fa-truck"></i> <span class="nav-label"> Lote 4569</span> <span
                                   ><button type="button" class="float-right btn btn-xs btn-white"><i
                                        class="fa fa-remove"></i></button></span>
                                       
                                 <ul >
                                    <li> fecha vencimiento 45/65/21</li>
                                     <li> Cantidad: 6  </li>
                                 </ul>
                               </li>
                               <li>
                                <i class="fa fa-truck"></i> <span class="nav-label"> Lote 4569</span> <span
                                   ><button type="button" class="float-right btn btn-xs btn-white"><i
                                        class="fa fa-remove"></i></button></span>
                                       
                                 <ul class="">
                                    <li> fecha vencimiento 45/65/21</li>
                                     <li> Cantidad: 6  </li>
                                 </ul>
                               </li>
                           </ul>
                            </td>
                           
                            <td>
                                <span class="label label-primary">Pending</span>
                            </td>
                            <td class="text-right">
                                <button type="button" class="btn btn-primary " data-toggle="tooltip" data-placement="bottom" title="Agregar" onclick="confirm('¿Está seguro de que desea Anular nota de ingreso?') ? this.parentElement.submit() : ''">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               3214
                            </td>
                            <td>
                                Customer example
                            </td>
                            <td>
                                $500.00
                            </td>
                            <td>
                                <ul  class="nav metismenu">
                                    <li>
                                     <i class="fa fa-truck"></i> <span class="nav-label"> Lote 4569</span> <span
                                        ><button type="button" class="float-right btn btn-xs btn-white" title="adicionar"><i
                                             class="fa fa-remove"></i></button></span>
                                            
                                      <ul >
                                         <li> fecha vencimiento 45/65/21</li>
                                          <li> Cantidad: 6  </li>
                                      </ul>
                                    </li>
                                    <li>
                                     <i class="fa fa-truck"></i> <span class="nav-label"> Lote 4569</span> <span
                                        ><button type="button" class="float-right btn btn-xs btn-white" title="adicionar"><i
                                             class="fa fa-remove"></i></button></span>
                                            
                                      <ul class="">
                                         <li> fecha vencimiento 45/65/21</li>
                                          <li> Cantidad: 6  </li>
                                      </ul>
                                    </li>
                                </ul>
                            </td>
                           
                            <td>
                                <span class="label label-primary">Pending</span>
                            </td>
                            <td class="text-right">
                                <button type="button" class="btn btn-primary " data-toggle="tooltip" data-placement="bottom" title="Agregar" onclick="confirm('¿Está seguro de que desea Anular nota de ingreso?') ? this.parentElement.submit() : ''">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">
                                <ul class="pagination float-right">

                                </ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div> --}}

@endsection