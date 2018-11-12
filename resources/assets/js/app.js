require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import swal from 'sweetalert2'


Vue.use(VueRouter)
Vue.use(swal)
Vue.use(VueAxios, axios)



import App from './components/App';
import Products from './components/product/Products.vue';
import Orders from './components/order/Orders.vue';
import Suppliers from './components/supplier/Suppliers.vue';



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'suppliers',
            component: Suppliers
        },
        {
            path: '/suppliers',
            name: 'suppliers',
            component: Suppliers
        },
        {
            path: '/Products',
            name: 'products',
            component: Products,
        },
        {
            path: '/orders',
            name: 'orders',
            component: Orders,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});