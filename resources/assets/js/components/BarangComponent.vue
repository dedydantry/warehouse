<template>
    <div class="clearfix">
        <breadcrumbs title="Barang"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Barang</strong>
                                <router-link to="/barang/create" class="btn btn-outline-primary float-sm-right"><i class="fa fa-plus"></i> New</router-link>
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
                                            <th scope="col">Stok</th>
                                            <th scope="col">Price</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(barangs, index) in barang" v-bind:key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ barangs.part_number }}</td>
                                            <td>{{ barangs.description }}</td>
                                            <td>{{ barangs.category.category_name }}</td>
                                            <td>{{ barangs.brand.brand_name }}</td>
                                            <td>{{ barangs.satuan.satuan_name }}</td>
                                            <td>{{ barangs.stok }}</td>
                                            <td>{{ 'Rp '+ barangs.price }}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm" v-on:click="edit(barangs)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-outline-danger btn-sm" v-on:click="destroy(barangs)"><i class="fa fa-trash"></i></button>
                                            </td>
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
                console.log(this.barang)
            } catch (error) {
                console.log(error)
            }
        },

        async edit(items){
            return this.$router.push('barang/edit/'+items.id) ;
        },

        async destroy(items){   
            if(confirm('Delete data ini ?')){
                let result = this.barang.indexOf(items)
                try {
                    let destroy = await axios.delete('/api/barang/'+items.id);
                    this.$delete(this.barang, result)
                } catch (error) {
                    console.log(error)
                }
            }
        }
    }
}
</script>