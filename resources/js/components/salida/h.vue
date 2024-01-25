<template>
 <div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content ">
                    
                    <form method="post" action="#" autocomplete="off">
                        
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
                                            <input id="fecha" type="text" class="form-control" v-model="form.fecha_inicio" disabled >
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
                                    @input="obtener_productos()"
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
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
                                      @search="onSearch_productos" 
                                    style="box-shadow: inset 0px 0px 5px #d5d5d5" 
                                    required>
                                </v-select>
                                    </div>
                                </div>
                            
                            </div>
            
                        </div>
                        
             
                        
                    </form>
                </div>
            </div>
    </div>
  

    <div class="col-lg-12">
    <div class="inbox">
          <div class="ibox-title ">
  <div class="col-lg-4">
                        <button class="btn btn-primary btn-lg "   @click="add_productos"><i class="fa fa-plus"></i></button>
                </div>
          </div>
            <div class="ibox-content">
                <!-- @include('alerts.success') -->
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
                    <tbody>
                        <!-- @foreach ($proveedores as $proveedor) -->
                    <tr v-for="(detalle_producto,key) in form.detalle_productos" :key="key">
                        <td>{{key+1}}</td>
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

                        </td>

                    </tr>
                    <!-- @endforeach -->
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <td colspan="7">
                                <ul class="pagination float-right">
                                   
                                </ul>
                              
                            </td>
                        </tr>
                        </tfoot>-->
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
  
    </div>
</div>
 

</template>
<script>
 import vSelect from 'vue-select'
 import moment from "moment";
 import 'vue-select/dist/vue-select.css'
export default {
  props: ['almacenes','productos','usuarios'],
  data() {
    return { // inicialisacion

        form: new Forms({
            codigo: '',
            fecha_inicio: moment().format('DD - MMM - Y  HH:mm'),
            empleado_id: this.usuarios.id,
            almacen_id : '',
            detalle_productos:[]

        }),    
        
        empleado_nombre: this.usuarios.name,
        messageE: '',
        loaded: false,
        peticion: false,
        errorsEmail: [],
        almacen:'',
        productos:[],
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
        producto_select: function (val) {
            let me = this;
             me.form.detalle_productos.producto_id = val.id;
             me.form.detalle_productos.producto_nombre = val.nombre;
        },
  },
  methods: {
    crear: function () {
        this.loaded = true;
        this.limpiar();
        let url = '/admin/crear_temporal';
        axios.post(url, {
            email: this.email,
        }).then(
            response => {
                //console.log(response.data);
                this.peticion=true;
                if (response.data.status===200) {
                    this.password=response.data.credencial;
                    this.loaded = false;
                    //location.href = "/admin/home";
                } else {
                    this.loaded = false;
                    this.messageE = response.data.message;
                }
            },
            error => {
                //console.log(error.response.data);
                this.loaded = false;
                if(error.response.data.errors.email){
                    this.errorsEmail=error.response.data.errors.email;
                }
            }
        ).catch(error => {
        });
    },
    regargar: function () {
        if (this.peticion) {
            location.reload();   
        }
    },
    limpiar: function () {
        this.errorsEmail=[];
    },
     obtener_productos: function() {
                if (this.almacen.id != "") {
                    let url = '/obtener_productos/' + this.almacen.id;
                    axios.get(url).then(response => {
                        console.log(response.data)
                        this.productos = response.data.productos
                    });
                }
            },
    add_productos(){
        this.form.detalle_productos.push({
            'producto_id': '',
            'producto_nombre':this.producto_select.nombre,
            'descripcion': '',
            'precio': '0',
            'cantidad': '0',
        });

    },
        
    onSearch_productos(search) {
                console.log(search);
                if (search.length > 0) {
                    let url = '/getProductos';

                    axios.post(url, {
                        searchProducto: search,
                        almacenId: this.almacen.id,
                    }).then(
                        response => {
                            this.productos = response.data.productos
                            
                        },
                        error => {

                        }
                    ).catch(error => {});

                }
            },
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