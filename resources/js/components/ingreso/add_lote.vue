<template>
<div style="display: contents;">
    <form method="post" action="#" autocomplete="off"
 @submit.prevent="store_object()"
>
 <div class="row">
    
    <div class="col-lg-12">
         <div class="">


    <div class="ibox-content m-b-sm ">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="order_id">Codigo</label>
                    <input type="text"
                      id="codigo"
                      name="codigo"
                      v-model="nota.codigo"
                      placeholder="Codigo"
                      class="form-control" disabled>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="date_added">Fecha de Ingreso</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input   id="fecha"
                        type="text"
                        class="form-control"
                        v-model="fecha"
                         disabled>
                    </div>
                </div>    
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-form-label" for="status">Empleado</label>
                    <input type="text"
                      v-model="nota.usuario_nombre"
                       class="form-control"
                      disabled>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label" for="status">Almacen</label>
                    <input type="text"
                      id="almacen"
                      name="almacen"
                      v-model="nota.almacen_nombre"
                      placeholder="Almacen"
                      class="form-control"
                      disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label" for="amount">Proveedor</label>
                    <input  type="text"
                      id="proveedor"
                      name="proveedor"
                      v-model="nota.proveedor_nombre"
                      placeholder="Proveedor"
                      class="form-control"
                      disabled>
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
                            <th>#</th>
                            <th>Codigo</th>
                            <th >Producto</th>
                            <th data-hide="phone">Cantidad</th>
                            <th data-hide="phone">Lote</th>
                            <th data-hide="phone">Estado</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody  v-for="(detalle_producto, i) in nota.nota_productos" :key="i">
                        <tr>
                            <td>{{i+1}}</td>
                            <td>
                               {{detalle_producto.codigo}}
                            </td>
                            <td>
                            <ul class="nav metismenu">
                                <li>{{detalle_producto.nombre }}</li>
                                <li>{{detalle_producto.contenido }} {{ detalle_producto.unidad_medida }}</li>
                                <li>{{detalle_producto.nombre_generico}}</li>
                                <li>{{detalle_producto.laboratorio.nombre}}</li>
                                <li>{{detalle_producto.categoria.nombre}}</li>
                                <li>{{detalle_producto.forma.nombre}}</li>
                            </ul>
                            </td>
                            <td>
                                 {{detalle_producto.pivot.cantidad }}
                            </td>
                            <td>
                                <div v-for="lote in detalle_producto.lotes" :key="lote.id">
                                    <ul v-if="nota.id === lote.detalle_ingresos[0].ingreso_id" class="nav metismenu">
                                        <li>
                                            <i class="fa fa-truck"></i> <span class="nav-label"> Lote {{lote.codigo}}</span> <span
                                            ></span>
                                                
                                            <ul >
                                                <li> fecha vencimiento {{getFecha(lote.fecha_vencimiento)}}</li>
                                                <li> Cantidad: {{lote.detalle_ingresos[0].pivot.cantidad}} </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                           
                            <td>
                                <span v-if="!mostrar_agregar(detalle_producto,detalle_producto.pivot.cantidad)" class="label label-primary">Terminado</span>
                                <span v-else class="label label-primary">Pendiente</span>
                            </td>
                            <td class="text-right">
                                <button v-if="mostrar_agregar(detalle_producto,detalle_producto.pivot.cantidad)" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter" @click="abrir_add_lote(detalle_producto)">
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


</div>
    </div>
    
</div>

    
  </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Asignar Lote a producto {{this.producto_agregar.nombre}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div v-if="message!=''" class="alert alert-danger" role="alert">
                        {{this.message}}
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label" for="cantidad_lote">Cantidad</label>
                                <input type="number" id="cantidad_lote" v-model="cantidad_lote" placeholder="Cantidad" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label" for="codigo_lote">Còdigo</label>
                                <input type="number" id="codigo_lote" v-model="codigo_lote" placeholder="Codigo" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label" for="fecha_lote">Fecha Vencimiento</label>
                                <input type="date" id="fecha_lote" v-model="fecha_lote" placeholder="Codigo" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-3">
                            <button type="button" class="btn btn-sm btn-info mt-4"
                            @click="add_lote()"> Agregar</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="m-b-sm border-bottom">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead >
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Còdigo</th>
                                         <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha Vencimiento</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(lote, index) in form.lotes" :key="index">
                                        <td>{{index+1}}</td>
                                        <td>{{lote.codigo}}</td>
                                        <td>{{lote.cantidad}}</td>
                                        <td>{{lote.fecha}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" @click="quitar_lote(lote)">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <div v-if="producto_agregar!='' && form.lotes.length>0" class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button v-if="!loading" class="btn btn-primary btn-sm" @click="store_object()">Guardar</button>
                                <button v-else class="btn btn-primary btn-sm" disabled>
                                <div class="sk-chase">
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                </div>
                                </button>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
 import vSelect from 'vue-select'
 import moment from "moment";
 import 'vue-select/dist/vue-select.css'
export default {
  props: ['nota',"usuarios"],
  data() {
    return { // inicialisacion

    url: {
        store: "/guardarLotes",
        cancel: "/salida",
      },

        form: new Forms({
            
            ingreso: this.nota,
            producto:'',
            lotes:[],

        }),    
        fecha: moment(this.nota.fecha).format('DD - MMM - YY  HH:mm'),
        error:[],
        
        producto_agregar:'',
        cantidad_lote:'',
        codigo_lote:'',
        fecha_lote:'',
        message:'',
        cantidad_productos:0,
        loading:false,
       
    };
  },
 
  mounted() {  ///cuando se carga el comp
   //console.log(this.nota);
  },
  methods: {
    getFecha(fecha){
        return moment(fecha).format('DD - MMM - YY');
    },
    abrir_add_lote(product){
        this.producto_agregar = product;
        this.cantidad_lote='';
        this.codigo_lote='';
        this.fecha_lote='';
        this.form.lotes=[];
        this.message='';
        this.cantidad_productos=0;
        for (let i = 0; i < product.lotes.length; i++) {
            for (let index = 0; index < product.lotes[i].detalle_ingresos.length; index++) {
                 if (product.pivot.id === product.lotes[i].detalle_ingresos[index].pivot.ingreso_detalle_id) {
                    this.cantidad_productos += parseFloat(product.lotes[i].detalle_ingresos[index].pivot.cantidad);
                }    
            } 
        }   
        //console.log(this.cantidad_productos);
    },
    add_lote(){
        if (this.verifi_agragar_lote()) {
            this.message='';
            this.form.lotes.push({
                'cantidad': this.cantidad_lote,
                'codigo': this.codigo_lote,
                'fecha':this.fecha_lote,
            });
            this.cantidad_lote='';
            this.codigo_lote='';
            this.fecha_lote='';
        }else{
            this.message='Por favor complete todos los campos.';
        }
    },
    quitar_lote(lote) {
        let me = this;
        let index = me.form.lotes.indexOf(lote);
        me.form.lotes.splice(index, 1);
    },
    verifi_agragar_lote(){
        if (this.producto_agregar!='' && this.cantidad_lote!='' && this.codigo_lote!='' && this.fecha_lote!='') {
            return true;
        }
        return false;
    },
    verifi_store_object(){
        this.message='';
        let cant = this.cantidad_productos;
        for (let index = 0; index < this.form.lotes.length; index++) {
            cant += parseFloat(this.form.lotes[index].cantidad);    
        }
        //console.log(cant);
        if(cant > parseFloat(this.producto_agregar.pivot.cantidad)){
            return false;
        }else{
            return true;
        }
    },
    mostrar_agregar(product, cantidad){
        //console.log(product);
        let can = 0;
        for (let i = 0; i < product.lotes.length; i++) {
            for (let index = 0; index < product.lotes[i].detalle_ingresos.length; index++) {
                if (this.nota.id === product.lotes[i].detalle_ingresos[index].ingreso_id) {
                    can += parseFloat(product.lotes[i].detalle_ingresos[index].pivot.cantidad);
                }    
            } 
        }  
        if (can === cantidad) {
            return false
        }else{
            return true;
        }
    },
    store_object() {
    if (this.verifi_store_object()) {
      let me = this;
      me.form.producto = this.producto_agregar;
      me.loading=true;
      //console.log(me.form);
      me.form
        .post(me.url.store)
        .then(function (response) {
          console.log(response.data);
          //me.loading=false;
          location.reload();
        })
        .catch(function (error) {
          console.log(error);
          me.loading=false;
          me.errors = error.response.data.errors;
        });  
    }else{
        this.message='Las sumas de las cantidasde no debe ser mayor a '+this.producto_agregar.pivot.cantidad;
    }
      
    },

    /*add_productos(){
        this.form.detalle_productos.push({
            'producto_id': this.producto_select.id,
            'producto_nombre':this.producto_select.nombre,
            'descripcion': '',
            'precio': '0',
            'cantidad': '0',
        });

    },*/  
    /*formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },*/
    /*quitar_detalle(detalle_producto) {
            let me = this;
            let index = me.form.detalle_productos.indexOf(detalle_producto);
            me.form.detalle_productos.splice(index, 1);
        },*/

  },
  
    components: {
            vSelect,
        },
};
</script>