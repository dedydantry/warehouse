<template>
    <div class="clearfix">    
        <breadcrumbs title="Category"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal"  @submit.prevent="submitForm">
                            <div class="row has-warning form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <input type="text" v-model="category_name" name="input2-group2" placeholder="Category name" :class="className">
                                        <div class="input-group-btn"><button class="btn btn-outline-primary" type="submit">{{ actionName }}</button></div>
                                        <div class="input-group-btn" v-on:click="cancel()" v-if="action"><button class="btn btn-outline-danger" type="button">Cancel</button></div>
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
                                        <tr v-for="(categories, index) in barang_paging"  v-bind:key="index">
                                            <th scope="row">{{ page > 1 ? (page*finish)-10+(index+1) : index+1 }}</th>
                                            <td>{{ categories.category_name }}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm" v-on:click="edit(categories)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-outline-danger btn-sm" v-on:click="destroy(categories)"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <paginate
                                    v-model="page_active"
                                    :page-count="page_count"
                                    :page-range="10"
                                    :margin-pages="2"
                                    :prev-text="'Prev'"
                                    :next-text="'Next'"
                                    :clickHandler="generatePaging"
                                    :container-class="'pagination'"
                                    :page-class="'page-item'"
                                    :page-link-class="'page-link'"
                                    :prev-link-class="'page-link'"
                                    :next-link-class="'page-link'"
                                    >
                                </paginate>
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
import Paginate from 'vuejs-paginate'
export default {
    data() {
        return{
            message : 'hello Category',
            category_name : '',
            errors : [],
            action : false,
            page_active:1,
            page_count :0,
            category :[],
            paging : {},
            items : {},
            barang_paging:[],
            start : 0,
            finish:10,
            page:1
        }
    },

    computed:{
        className(){
            return this.errors.length ? 'form-control is-invalid' : 'form-control'
        },

        actionName(){
            return this.action ? 'Update' : 'Save'
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs,
        'paginate' : Paginate
    },

    created(){
        this.fetchCategory()
    },

    methods:{

        generatePaging(page){
            console.log(page)
            let start = this.start
            let finish = this.finish
            this.page = page
            if(page > 1){
                start = (finish*page)-10
                finish = page*finish
            }
            this.barang_paging = this.category.slice(start, finish)
        },

        async fetchCategory(base_url) {
           try{
               const category = await axios.get('/category');
               this.category = category.data
               this.page_count = (this.category.length / this.finish)
               this.barang_paging = this.category.slice(this.start, this.finish)
           } catch(error){
                console.log(error)
           }
        },

        async submitForm(){
            this.errors = []
            if(this.category_name){
                if(this.action){
                    this.updateCategory()
                } else {
                    this.addCategory()
                }
            } else {
                this.errors.push('Name required');
            }

        },

        async addCategory(){
            try {
                let save = await axios.post('/category', {'name' : this.category_name});
                this.category.push(save.data)
                this.category_name = ''
            } catch (error) {
                console.log(error)
            }
        },

        async updateCategory(){
            try {
                let update = await axios.post('/category/update/'+this.items.id, {'name' : this.category_name});
                let result = this.category.indexOf(this.items)
                this.category.splice(result, 1, update.data)
                return this.cancel()
            } catch (error) {
                console.log(error)
            }
        },

        edit(items){
            this.action = true
            let edit = this.category.indexOf(items)
            this.category_name = items.category_name
            this.items = items
        },

        async destroy(items){
            if(confirm('Delete data ini ?')){
                let result = this.category.indexOf(items)
                try {
                    let destroy = await axios.post('/category/delete/'+items.id);
                    this.$delete(this.category, result)
                } catch (error) {
                    console.log(error)
                }
            }
        },
        
        cancel(){
            this.items = {}
            this.category_name = ''
            this.action = false
        },
    }
}
</script>