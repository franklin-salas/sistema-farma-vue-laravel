<template>
 <div class="row">
     
    <div class="col-lg-12">
  <form method="post" action="#" autocomplete="off"
                      @submit.prevent="store_object()"
                    >
 
        
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content ">
                    
                  
                        
                        <div class=" m-b-sm border-bottom">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="codigo">Código</label>
                                        <input type="text" id="codigo" name="codigo" v-model="form.codigo" placeholder="Codigo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="fecha">Fecha de  Ingreso </label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="fecha" type="text" class="form-control" v-model="form.fecha" disabled >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                       <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="customer">Empleado</label>
                                        <input type="text" id="empleado" name="empleado" v-model="empleado_nombre" placeholder="Empleado" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="almacen">Almacén</label>
                                         <v-select 
                                    class="style-chooser seccion-calendario-input-select " 
                                    v-model="almacen" 
                                    :clearable="false"  
                                    placeholder="Almacen.. " 
                                    label="nombre" 
                                    :filterable="true"
                                    :options="almacenes" 
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
                                     <!-- @input="obtener_productos()" -->
                                </v-select>
                                    </div>
                                </div>
                                       <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" >Producto</label>
                                              <v-select 
                                    class="style-chooser seccion-calendario-input-select " 
                                    v-model="producto_select" 
                                    :clearable="false"  
                                    placeholder="Producto.." 
                                    label="nombre" 
                                    :filterable="true"
                                    :options="productos" 
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
                                      <!-- @search="onSearch_productos"  -->
                                </v-select>
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" >Proveedor</label>
                                <v-select 
                                    class="style-chooser seccion-calendario-input-select " 
                                    v-model="proveedor_select" 
                                    :clearable="false"  
                                    placeholder="Proveedores.." 
                                    label="nombre" 
                                    :filterable="true"
                                    :options="proveedores" 
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
                                </v-select>
                                    </div>
                                </div>
                            
                            </div>
            
                        </div>

                  
                </div>
            </div>
 
  

    <div class="inbox">
          <div class="ibox-title ">
        <div class="col-lg-4">
                        <button class="btn btn-primary btn-lg "   @click="add_productos"><i class="fa fa-plus"></i></button>
                </div>
          </div>
            <div class="ibox-content">
       
            <div class="m-b-sm border-bottom">
                <div class="table-responsive">
           

                <table class="table table-bordered table-hover">
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody v-for="(detalle_producto,i) in form.detalle_productos" :key="i">
                        
                    <tr >
                        <td>{{i+1}}</td>
                        <td><span class="w-50">{{detalle_producto.producto_nombre}}</span></td>
                        <td >
                                <input type="text" id="price" name="descripcion" v-model="detalle_producto.descripcion" placeholder="Price" class="form-control">
                           
                                 </td>
                        <td >    
                                <input type="number" id="price" name="price" v-model="detalle_producto.precio" placeholder="Price" class="form-control" min ="0">
                        </td>
                        <td > 
                                <input type="number" id="quantity" name="quantity" v-model="detalle_producto.cantidad" placeholder="Quantity" class="form-control" min ="0">
                        </td>
                        <td >{{formatPrice(detalle_producto.cantidad*detalle_producto.precio)}} </td>
                        <td>
                         <button type="button" class="btn btn-sm btn-danger"
                                        @click="quitar_detalle(detalle_producto)"><i
                                    class="fa fa-remove"></i></button>

                                    <button type="button" class="btn btn-sm btn-primary"
                                        @click="add_lote(i)" data-toggle="modal" data-target="#add_lotes" ><i
                                    class="fa fa-plus"></i></button>
                        </td>


                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>codigo de lote</th>
                        <th>cantidad</th>
                        <th></th>
                    </tr>
                    <tr  v-for="(detalle_lote,index) in detalle_producto.lotes" :key="index">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{detalle_lote.lote_codigo}}</td>
                        <td>{{detalle_lote.cantidad}}</td>
                        <td></td>
                    </tr>
                     
                    </tbody>
                   
                </table>
                  
                </div>
             </div>
                      <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a  class="btn btn-white btn-sm"
                                >Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                
                
            </div>
          
        </div>
   </form>
    </div>
 

<div class="modal fade" id="add_lotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                 <div class="form-group">
                                        <label class="col-form-label" >Lotes</label>
                                              <v-select 
                                    class="style-chooser seccion-calendario-input-select " 
                                    v-model="lote_select" 
                                    :clearable="false"  
                                    placeholder="Lotes.." 
                                    label="codigo" 
                                    :filterable="true"
                                    :options="lotes" 
                                     
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
                                </v-select>
                                    </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                                        <label class="col-form-label" for="cantidad_lote">Cantidad</label>
                                        <input type="number" id="cantidad_lote" v-model="cantidad_lote" placeholder="Codigo" class="form-control">
                                    </div>
            </div>
            <div class="col-12">
                 <button type="button" class="btn btn-sm btn-primary"
                                        @click="add_lote2()"> Agregar</button>
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
 import moment from "moment"
 import 'vue-select/dist/vue-select.css'
export default {
  props: ['almacenes','productos','usuarios','proveedores','lotes'],
  data() {
    return { // inicialisacion
     url: {
                store: '/ingreso',
                cancel: '/ingreso',
            },

    form: new Forms({
            codigo: '',
            fecha: moment().format('DD - MMM - Y  HH:mm'),
            estado: 'Nuevo',
            tipo: 'Normal',
            usuario_id: this.usuarios.id,
            almacen_id : 0,
            proveedor_id : 0,
            detalle_productos:[]

        }),    
        
        empleado_nombre: this.usuarios.name,
        messageE: '',
        loaded: false,
        peticion: false,
        errorsEmail: [],
        almacen:'',
        lote_select:'',
        cantidad_lote:0,
        index_producto: null,
        proveedor_select: '',
        producto_select:'',
       
    };
  },
 
  mounted() {  ///cuando se carga el comp
//   console.log(this.almacenes);
  },
   watch:{
        almacen: function (val) {
            let me = this;
             me.form.almacen_id = val.id;
        },
         proveedor_select: function (val) {
            let me = this;
             me.form.proveedor_id = val.id;
        },
  },
  methods: {
    // crear: function () {
    //     this.loaded = true;
    //     this.limpiar();
    //     let url = '/admin/crear_temporal';
    //     axios.post(url, {
    //         email: this.email,
    //     }).then(
    //         response => {
    //             //console.log(response.data);
    //             this.peticion=true;
    //             if (response.data.status===200) {
    //                 this.password=response.data.credencial;
    //                 this.loaded = false;
    //                 //location.href = "/admin/home";
    //             } else {
    //                 this.loaded = false;
    //                 this.messageE = response.data.message;
    //             }
    //         },
    //         error => {
    //             //console.log(error.response.data);
    //             this.loaded = false;
    //             if(error.response.data.errors.email){
    //                 this.errorsEmail=error.response.data.errors.email;
    //             }
    //         }
    //     ).catch(error => {
    //     });
    // },
    regargar: function () {
        if (this.peticion) {
            location.reload();   
        }
    },
    limpiar: function () {
        this.errorsEmail=[];
    },
    
    store_object() {
            let me = this;
            console.log(me.form);
            me.form.post(me.url.store)
                .then(function (response) {
                    console.log(response);
                    // me.mensaje_susses = response.data.mensaje;

                    // setTimeout(() => location.href = me.url.cancel, 2000);

                }).catch(function (error) {
                console.log(error);
                me.errors = error.response.data.errors;
            });
    },

    

    //  obtener_productos: function() {
    //             if (this.almacen.id != "") {
    //                 let url = '/obtener_productos/' + this.almacen.id;
    //                 axios.get(url).then(response => {
    //                     console.log(response.data)
    //                     this.productos = response.data.productos
    //                 });
    //             }
    //         },
    
    add_productos(){
        this.form.detalle_productos.push({
            'producto_id': this.producto_select.id,
            'producto_nombre':this.producto_select.nombre,
            'descripcion': '',
            'precio': '0',
            'cantidad': '0',
            'lotes':[],
        });

    },
    add_lote(index){
        this.index_producto= index;
        // this.form.detalle_productos[index].lotes.push({
        //     'lote_id': 0,
        //     'lote_codigo': '100',
        //     'cantidad': 0,
        // });

    },

     add_lote2(){
         let producto=  this.form.detalle_productos[ this.index_producto];
         let cant = this.cantidad_lote;
         console.log(producto);
      if(cant> parseInt(producto.cantidad)){
          cant = producto.cantidad;
      }
        this.form.detalle_productos[ this.index_producto].lotes.push({
            'lote_id': this.lote_select.id,
            'lote_codigo': this.lote_select.codigo,
            'cantidad': cant,
        });
        this.lote_select='';
        this.cantidad_lote= 0 ;
        $("#add_lotes").modal('hide');
    },
        
    // onSearch_productos(search) {
    //             console.log(search);
    //             if (search.length > 0) {
    //                 let url = '/getProductos';

    //                 axios.post(url, {
    //                     searchProducto: search,
    //                     almacenId: this.almacen.id,
    //                 }).then(
    //                     response => {
    //                         this.productos = response.data.productos
                            
    //                     },
    //                     error => {

    //                     }
    //                 ).catch(error => {});

    //             }
    //         },
    formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
    quitar_detalle(detalle_producto) {
            let me = this;
            let index = me.form.detalle_productos.indexOf(detalle_producto);
            me.form.detalle_productos.splice(index, 1);
        },


   
  },
  
    components: {
            vSelect,
        },
};
</script>