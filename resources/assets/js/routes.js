// Vue.component('home', require('./components/HomeComponent.vue'));
import Home from './components/HomeComponent.vue';
import Category from './components/CategoryComponent.vue';

export const routes = [
    { path : '/', component:Home, name:'home'},
    { path : '/category', component:Category, name:'category'}
]