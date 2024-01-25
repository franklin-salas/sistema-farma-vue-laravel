<template>
    <div class="row">
    <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Información </h5>
                </div>
                <div class="ibox-content">
                    
                    <form  method="post"
                          action="#"
                         autocomplete="off"
                      @submit.prevent="store_object()">
                   
                    
                    <div class="row  justify-content-center">
                          <div class="col-sm-10">
                  <div class="form-group">
                    <label class="col-form-label">Producto</label>
                    <v-select
                      class="style-chooser seccion-calendario-input-select"
                      v-model="producto_select"
                      :clearable="false"
                      placeholder="Producto.."
                       label= "nombre" 
                      :filterable="true"
                      :options="productos"
                      style="box-shadow: inset 0px 0px 5px #d5d5d5"
                      required
                    >
                  <template slot="option" slot-scope="option">
                   
                      {{ option.nombre }} {{ option.nombre_generico }} {{option.contenido}} {{option.unidad_medida}} -{{option.forma_nombre}}- {{option.laboratorio_nombre}}
                    </template>

                     <template slot="selected-option" slot-scope="option">
                   
                     {{ option.nombre }} {{ option.nombre_generico }} {{option.contenido}} {{option.unidad_medida}}-{{option.forma_nombre }} -{{option.laboratorio_nombre}}
                   </template>
                    
                    </v-select>

                  </div>
                </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-form-label" for="codigo">Código</label>
                                <input type="text" id="codigo" name="codigo" v-model="form.codigo" placeholder="Código" 
                                class="form-control form-control-alternative is-invalid      ">
                              
                            </div>
                        </div>
                        <div class=" col-sm-10 ">
                            <div class="form-group">
                                <label class="col-form-label" for="fecha">Fecha de Caducidad</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="fecha" type="date" name="fecha" data-date-format="D - MM - Y" class="form-control" v-model="form.fecha">
                                </div>
                              
   
                            </div>
                        </div>

                    </div>
                   
                        <div class="form-group row "> 
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="" class ="btn btn-white btn-sm" 
                                >Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
</template>
<script>
import vSelect from "vue-select";
import moment from "moment";
import "vue-select/dist/vue-select.css";
export default {
  props: [ "productos"],
  data() {
    return {
      // inicialisacion
      url: {
        store: "/lote",
        cancel: "/lote",
      },

      form: new Forms({
        codigo: "",
        fecha: "",
        producto_id: "",       
      }),

      messageE: "",
      producto_select: "",
    };
  },

  mounted() {
    ///cuando se carga el comp
    //   console.log(this.almacenes);
  },
  watch: {
  
    producto_select: function (val) {
      let me = this;
      me.form.producto_id = val.id;
    },
  },
  methods: {
    store_object() {
      let me = this;
      console.log(me.form);
      me.form
        .post(me.url.store)
        .then(function (response) {
          console.log(response);
          // me.mensaje_susses = response.data.mensaje;

          if(response.data.status === 200){
            setTimeout(() => location.href = me.url.cancel, 2000);
          }
        })
        .catch(function (error) {
          console.log(error);
          me.errors = error.response.data.errors;
        });
    },

    add_productos() {

      if(!this.buscarProducto(this.producto_select.id)){
        console.log('entro');
      this.form.detalle_productos.push({
        producto_id: this.producto_select.id,
        producto_nombre: this.producto_select.nombre,
        descripcion: "",
        precio: "0",
        cantidad: "0",
      });
      }
    },
    
  },

  components: {
    vSelect,
  },
};
</script>