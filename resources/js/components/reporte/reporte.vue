<template>
<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class=" table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>

                            <tr>

                                <th></th>
                                <th ></th>
                                <th></th>
                                <th data-hide="phone"></th>
                                <th data-hide="phone" colspan="2" class="text-center">Entrada</th>
                                <th data-hide="phone" colspan="2" class="text-center">Salida</th>
                            
    
                            </tr>
                        <tr>

                            <th>Codigo</th>
                            <th >Producto</th>
                            <th >Valor Unitario</th>
                            <th data-hide="phone">detalle</th>
                            <th data-hide="phone">Cantidad</th>
                            <th >Total</th>
                            <th data-hide="phone">Cantidad</th>
                            <th >Total</th>

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
                         Compra de productos
                            </td>
                           
                            <td>
                                500.00
                            </td>
                            <td >
                                500.00
                            </td>

                            <td>
                                500.00
                            </td>
                            <td class="text-right">
                                500.00
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

</template>
<script>
 import vSelect from 'vue-select'
 import moment from "moment";
 import 'vue-select/dist/vue-select.css'
export default {
  props: ['productos'],
  data() {
    return { // inicialisacion

    url: {
        cancel: "/",
      },

        total_ingreso: 0,
        total_salida:0,
        producto_select:'',
        error:[]
       
    };
  },
 
  mounted() {  ///cuando se carga el comp
   console.log(this.nota);
  },
   watch:{
        almacen: function (val) {
            let me = this;
             me.form.almacen_id = val.id;
        },
  },
  methods: {
    
        
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