// Vue.component('home', require('./components/HomeComponent.vue'));
import Home from './components/HomeComponent.vue';
import Category from './components/CategoryComponent.vue';
import Brand from './components/BrandComponent.vue';
import Satuan from './components/SatuanComponent.vue';
import Barang from './components/BarangComponent.vue';
import NewBarang from './components/BarangNewComponent.vue';

export const routes = [
    { path : '/', component:Home, name:'home'},
    { path : '/category', component:Category, name:'category'},
    { path : '/brand', component:Brand, name:'brand'},
    { path : '/satuan', component:Satuan, name:'satuan'},
    { path : '/barang', component:Barang, name:'barang'},
    { path : '/barang/create', component:NewBarang, name:'newbarang'},
    { path : '/barang/edit/:id', component:NewBarang, name:'editbarang'}
]