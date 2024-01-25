<template>
<form method="post" action="#" autocomplete="off"
 @submit.prevent="store_object()"
>
 <div class="row">
    
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content ">    
                        <div class=" m-b-sm border-bottom">
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div :class="'widget puntero-select '+ class_tipo('Venta')" @click="seleccionar_tipo('Venta')">
                                    <div class="row vertical-align">
                                        <div class="col-3">
                                        <i class="fa fa-user fa-3x"></i>
                                        </div>
                                        <div class="col-9 text-right">
                                        <h3 class="font-bold">Venta</h3>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div :class="'widget puntero-select '+ class_tipo('Baja')" @click="seleccionar_tipo('Baja')">
                                    <div class="row vertical-align">
                                        <div class="col-3">
                                        <i class="fa fa-user fa-3x"></i>
                                        </div>
                                        <div class="col-9 text-right">
                                        <h3 class="font-bold">Baja</h3>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div :class="'widget puntero-select '+ class_tipo('Normal')" @click="seleccionar_tipo('Normal')">
                                    <div class="row vertical-align">
                                        <div class="col-3">
                                        <i class="fa fa-user fa-3x"></i>
                                        </div>
                                        <div class="col-9 text-right">
                                        <h3 class="font-bold">Normal</h3>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
                                </v-select>
                                    </div>
                                </div>
                            
                            </div>
            
                        </div>  
                </div>
            </div>
    </div>


    <div class="col-lg-12">
    <div class="inbox">
          <div class="ibox-title ">
  <div class="col-lg-4">
                        <button class="btn btn-primary btn-lg "  type="button" @click="add_productos"><i class="fa fa-plus"></i></button>
                </div>
          </div>
            <div class="ibox-content">
    
            <div class="m-b-sm border-bottom">
                <div v-if="messageArray!=''" class="alert alert-danger" role="alert">
                        {{this.messageArray}}
                </div>
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
                            <input type="text" id="price" name="descripcion" v-model="detalle_producto.descripcion" placeholder="Descripcion" class="form-control">   
                        </td>
                        <td >    
                            <input type="number" id="price" name="price" v-model="detalle_producto.precio" placeholder="Precio" class="form-control" min ="0">
                        </td>
                        <td > 
                            <input type="number" id="quantity" name="quantity" v-model="detalle_producto.cantidad" placeholder="Cantidad" class="form-control" min ="0">
                            <span>Max:{{detalle_producto.cantidad_max}}</span>
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
                
                   </table>
                   
                </div>
             </div>
                      <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a  class="btn btn-white btn-sm"
                                >Cancel</a>
                                <button v-if="!loading" class="btn btn-primary btn-sm" type="submit">
                                Guardar
                                </button>
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
  </form>

</template>
<script>
 import vSelect from 'vue-select'
 import moment from "moment";
 import 'vue-select/dist/vue-select.css'
export default {
  props: ['almacenes','productos','usuarios'],
  data() {
    return { // inicialisacion

    url: {
        store: "/salida",
        cancel: "/salida",
      },

        form: new Forms({
            codigo: '',
            fecha: moment().format('DD - MMM - Y  HH:mm'),
            estado: "Nuevo",
            tipo: "Normal",
            usuario_id: this.usuarios.id,
            almacen_id: 0,
            detalle_productos:[],  
        }),    
        
        empleado_nombre: this.usuarios.name,
        almacen:'',
        producto_select:'',
        error:[],
        messageArray:'',

        loading:false,
    };
  },
 
  mounted() {  ///cuando se carga el comp
    //console.log(this.almacenes);
  },
   watch:{
        almacen: function (val) {
            let me = this;
             me.form.almacen_id = val.id;
        },
  },
  methods: {
    class_tipo(tipo) {
      if (this.form.tipo === tipo) {
        return 'select_tipo';
      }
      return '';
    },
    seleccionar_tipo(tipo){
      this.form.tipo = tipo;
    },
    verifi_array(){
        this.messageArray = '';
        if (this.form.codigo=='' || this.almacen=='' || this.producto_select=='') {
            return false;
        }
        if (this.form.detalle_productos.length<1) {
             this.messageArray = 'Debe agregar productos.';
            return false;
        }
        for (let index = 0; index < this.form.detalle_productos.length; index++) {
            if (parseFloat(this.form.detalle_productos[index].cantidad)>this.form.detalle_productos[index].cantidad_max) {
                this.messageArray = 'Las cantidades no deben superar las cantidades máximas.';
                return false;
            }
        }
        return true;
    },
    store_object() {
        if (this.verifi_array()) {
            let me = this;
            me.loading=true;
            me.form
            .post(me.url.store)
            .then(function (response) {
                    //console.log(response.data);
                    location.href = me.url.cancel;
                })
            .catch(function (error) {
                console.log(error);
                me.loading=false;
                me.errors = error.response.data.errors;
            });    
        }
    },
    add_productos(){
        this.form.detalle_productos.push({
            'producto_id': this.producto_select.id,
            'producto_nombre':this.producto_select.nombre,
            'descripcion': '',
            'precio': '0',
            'cantidad': '0',
            'cantidad_max': this.cantidadMaxima(),
        });
    },
    cantidadMaxima(){
        let cant = 0;
        for (let index = 0; index < this.producto_select.detalle_ingreso_pro.length; index++) {
            cant += parseFloat(this.producto_select.detalle_ingreso_pro[index].cantidad);
        }
        return cant;
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