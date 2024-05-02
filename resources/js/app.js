require('./bootstrap');

window.Vue  = require('vue');

Vue.component('read', require('./components/read.vue').default);
const app = new Vue({
    el: '#app',
});