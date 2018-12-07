
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import { routes } from './routes'
Vue.use(VueRouter);

//component
import Paginate from 'vuejs-paginate'
import Breadcrumbs from './components/BreadcrumbsComponent.vue'
Vue.component('Breadcrumbs', Breadcrumbs)
Vue.component('paginate', Paginate)
Vue.component('pagination', require('laravel-vue-pagination'));

const router = new VueRouter({
    // mode : 'history',
    routes
})

// global components

const app = new Vue({
    el: '#app',
    router,
});
