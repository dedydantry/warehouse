<template>
    <div>
        <breadcrumbs title="Brand"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal"  @submit.prevent="submitForm">
                            <div class="row has-warning form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <input type="text" v-model="brand_name" name="input2-group2" placeholder="Brand name" :class="className">
                                        <div class="input-group-btn"><button class="btn btn-outline-primary" type="submit">{{ actionName }}</button></div>
                                        <div class="input-group-btn" v-on:click="reset()" v-if="action"><button class="btn btn-outline-danger" type="button">Cancel</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(brands, index) in brand" v-bind:key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ brands.brand_name }}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm" v-on:click="editBrand(brands)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-outline-danger btn-sm" v-on:click="destroyBrand(brands)"><i class="fa fa-trash"></i></button>

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
            brand_name : '',
            brand : [],
            action: false,
            errors :[],
            items : {}
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    computed:{
        className(){
            return this.errors.length ? 'form-control is-invalid' : 'form-control'
        },

        actionName(){
            return this.action ? 'Update' : 'Save'
        }
    },

    created(){
        this.fetchBrand()
    },

    methods:{

        async fetchBrand(){
            try {
                let brand = await axios.get('/api/brand')
                this.brand = brand.data.data
            } catch (error) {
                console.log(error)
            }
        },

        submitForm(){
            this.errors = []
            return this.action ? this.updateBrand() : this.addBrand()
        },

        async addBrand(){
            if(this.brand_name){
                try {
                    let brand = await axios.post('/api/brand', {'name' : this.brand_name})
                    this.brand.push(brand.data.data)
                    return this.reset()
                } catch (error) {
                    console.log(error)
                }
            } else {
                this.errors.push('Name required');
            }
        },

        editBrand(items){
            this.action = true;
            this.brand_name = items.brand_name
            this.items = items
        },

        async updateBrand(){
            if(this.brand_name){
                try {
                    let brand = await axios.put('/api/brand/'+this.items.id, {'name':this.brand_name})
                    let index = this.brand.indexOf(this.items)
                    this.brand.splice(index, 1, brand.data.data)
                    return this.reset();
                } catch (error) {
                    console.log(error)
                }
            } else{
                this.errors.push("Brand name required")
            }
        },

        async destroyBrand(items){
            if(confirm("Hapus data")){
                let index = this.brand.indexOf(items)
                try {
                    let brand = await axios.delete('/api/brand/'+items.id)
                    this.$delete(this.brand, index)
                } catch (error) {
                    console.log(error)
                }
            }
        },

        reset(){
            this.brand_name = ''
            this.items = {}
            this.action = false
        },
    }
}
</script>