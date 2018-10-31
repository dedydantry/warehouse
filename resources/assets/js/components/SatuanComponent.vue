<template>
    <div class="clearfix">        
        <breadcrumbs title="Satuan"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal"  @submit.prevent="submitForm">
                            <div class="row has-warning form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <input type="text" v-model="satuan_name" name="input2-group2" placeholder="Satuan name" :class="className">
                                        <div class="input-group-btn"><button class="btn btn-outline-primary" type="submit">{{ actionName }}</button></div>
                                        <div class="input-group-btn" v-on:click="reset()" v-if="action"><button class="btn btn-outline-danger" type="button">Cancel</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Satuan</strong>
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
                                        <tr v-for="(satuans, index) in satuan" v-bind:key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ satuans.satuan_name }}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm" v-on:click="editSatuan(satuans)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-outline-danger btn-sm" v-on:click="destroySatuan(satuans)"><i class="fa fa-trash"></i></button>

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
            satuan_name : '',
            satuan : [],
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
        this.fetchSatuan()
    },

    methods:{

        async fetchSatuan(){
            try {
                let satuan = await axios.get('/api/satuan')
                this.satuan = satuan.data.data
            } catch (error) {
                console.log(error)
            }
        },

        submitForm(){
            this.errors = []
            return this.action ? this.updateSatuan() : this.addSatuan()
        },

        async addSatuan(){
            if(this.satuan_name){
                try {
                    let satuan = await axios.post('/api/satuan', {'name' : this.satuan_name})
                    this.satuan.push(satuan.data)
                    return this.reset()
                } catch (error) {
                    console.log(error)
                }
            } else {
                this.errors.push('Name required');
            }
        },

        editSatuan(items){
            this.action = true;
            this.satuan_name = items.satuan_name
            this.items = items
        },

        async updateSatuan(){
            if(this.satuan_name){
                try {
                    let satuan = await axios.put('/api/satuan/'+this.items.id, {'name':this.satuan_name})
                    let index = this.satuan.indexOf(this.items)
                    this.satuan.splice(index, 1, satuan.data)
                    return this.reset();
                } catch (error) {
                    console.log(error)
                }
            } else{
                this.errors.push("Satuan name required")
            }
        },

        async destroySatuan(items){
            if(confirm("Hapus data")){
                let index = this.satuan.indexOf(items)
                try {
                    let satuan = await axios.delete('/api/satuan/'+items.id)
                    this.$delete(this.satuan, index)
                } catch (error) {
                    console.log(error)
                }
            }
        },

        reset(){
            this.satuan_name = ''
            this.items = {}
            this.action = false
        },
    }
}
</script>