require('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify'; // Import Vuetify library
import 'vuetify/dist/vuetify.min.css';


Vue.use(Vuetify);
export default new Vuetify({ })

window.Vue = require('vue').default;

Vue.component('mainapp', require('./components/home.vue').default);
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify
});
