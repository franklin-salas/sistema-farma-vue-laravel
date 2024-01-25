require('./bootstrap');
window.Vue = require('vue');
import {AlertError, Form, HasError} from 'vform';


/* credenciales temporales */
Vue.component('create-ingreso', require('./components/ingreso/create.vue').default);
Vue.component('create-salida', require('./components/salida/create.vue').default);
Vue.component('create-product', require('./components/product/create.vue').default);
Vue.component('create-lote', require('./components/lote/create.vue').default);
Vue.component('add-lote', require('./components/ingreso/add_lote.vue').default);

Vue.component('reporte', require('./components/reporte/reporte.vue').default);

Vue.component('add-lote-salida', require('./components/salida/add_lote.vue').default);
Vue.component('home', require('./components/Home.vue').default);



/**Edit**/
Vue.component('edit-product', require('./components/product/edit.vue').default);





window.Forms = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
const app = new Vue({
    el: '#app'
});
