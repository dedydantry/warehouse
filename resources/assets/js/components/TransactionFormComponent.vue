<template>
    <div class="clearfix">    
        <breadcrumbs title="Barang"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Barang</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control" v-model="select_barang">
                                        <option value="" disabled>Pilih barang</option>
                                        <option v-for="(barangs, index) in barang" :key="index" :value="barangs">{{ barangs.part_number }}</option>
                                    </select>
                                </div>
                                <hr>
                                 <div class="input-group">
                                    <input type="number" v-model="count_barang" min="1" class="form-control">
                                    <div class="input-group-btn"><button type="button" class="btn btn-primary" v-on:click="addBarang()">Add</button></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Receiving Detail</strong>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-6">
                                        <input type="date"  class="form-control form-control-sm" v-model="picker">
                                    </div>
                                     <div class="col-6">
                                        <input type="text"  class="form-control form-control-sm" placeholder="No Faktur" v-model="faktur">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <input type="text"  class="form-control form-control-sm" placeholder="Supplier" v-model="supplier">
                                    </div>
                                     <div class="col-6">
                                        <textarea name="" class="form-control form-control-sm" placeholder="Remark" v-model="remark"></textarea>
                                    </div>
                                </div>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                         <th scope="col">P.Number</th>
                                         <th scope="col">Detail</th>
                                         <th scope="col">Brand</th>
                                         <th scope="col">Satuan</th>
                                         <th scope="col">jumlah</th>
                                         <th scope="col" v-if="cekBarang"><button class="btn btn-link" title="Delete all" v-on:click="destroyAll()"><i class="fa fa-trash"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in array_barang" :key="index">
                                            <td>{{ value.part_number }}</td>
                                            <td>{{ value.category.category_name }}</td>
                                            <td>{{ value.brand.brand_name}}</td>
                                            <td>{{ value.satuan.satuan_name}}</td>
                                            <td>{{ value.count }}</td>
                                            <td><button class="btn btn-link" v-on:click="destroy(value)"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group" v-if="cekBarang">
                                    <button  class="btn btn-outline-primary" v-on:click="saveTransaction()">Save</button>
                                    <button  class="btn btn-outline-danger" v-on:click="cancel()">Cancel</button>
                                </div>
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
        return{
            barang:[],
            select_barang : {},
            count_barang : 0,
            array_barang : [],
            picker:'',
            faktur:'',
            supplier:'',
            remark:'',
            order_transaction:[]
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    computed:{
        cekBarang(){
            return this.array_barang.length ? true : false
        }
    },

    created(){
        this.fetchBarang()
        if(this.$route.params.id){
            this.fetchOneTransaction()
        }
    },

    methods:{

        async fetchBarang(){
            try {
                let barang = await axios.get('api/barang');
                this.barang = barang.data.data
            } catch (error) {
                console.log(error)
            }
        },  

        addBarang(){
            if(this.select_barang.part_number && this.count_barang ){
                let index = this.barang.indexOf(this.select_barang)
                this.$delete(this.barang, index)
    
                this.select_barang.count = parseInt(this.count_barang)
                this.array_barang.push(this.select_barang)
                console.log(this.array_barang)
                return this.reset()
            }
        },

        destroy(items){
            if(confirm("Hapus data ini ?")){
                let index = this.array_barang.indexOf(items)
                this.$delete(this.array_barang, index)
                return this.barang.push(items)
            }
        },

        destroyAll(){
            if(confirm("Hapus semua data ?")){
                Array.prototype.push.apply(this.barang, this.array_barang);
                return this.array_barang = []
            }
        },

        async saveTransaction(){
            try {
                let save = await axios.post('/api/transaction', {
                    "picker" : this.picker,
                    "faktur_number" : this.faktur,
                    "remark" : this.remark,
                    "supplier" :this.supplier,
                    "status" : this.$route.params.status,
                    "barang" : this.array_barang
                });
                return this.$router.push('/transaction/'+this.$route.params.status);
            } catch (error) {
                console.log(error)
            }
            
        },

        // edit transaction
        async fetchOneTransaction(){
            try {
                let data = await axios.get('/api/transaction/show/'+this.$route.params.id)
                this.picker = data.data.picker
                this.faktur = data.data.faktur_number
                this.supplier = data.data.supplier
                this.remark = data.data.remark
                // this.array_barang = data.data.order
            } catch (error) {
                console.log(error)
            }
            
        },

        cancel(){
             return this.$router.push('/transaction/'+this.$route.params.status);
        },

        reset(){
            this.select_barang = {}
            this.count_barang = 0
        }
    }
}
</script>