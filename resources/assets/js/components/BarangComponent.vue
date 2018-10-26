<template>
    <div>
        <breadcrumbs title="Barang"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Barang</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Part Number</th>
                                            <th scope="col">Desc</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Stn</th>
                                            <th scope="col">Price</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(barangs, index) in barang" v-bind:key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ barangs.part_number }}</td>
                                            <td>{{ barangs.description }}</td>
                                            <td>{{ barangs.categories.category_name }}</td>
                                            <td>{{ barangs.brands.brand_name }}</td>
                                            <td>{{ barangs.satuans.satuan_name }}</td>
                                            <td>{{ 'Rp '+ barangs.price }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from './BreadcrumbsComponent.vue'
export default {
    data(){
        return {
            barang : []
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    created(){
        this.fetchBarang()
    },

    methods:{
        
        async fetchBarang(){
            try {
                let barang = await axios.get('/api/barang');
                this.barang = barang.data.data
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>