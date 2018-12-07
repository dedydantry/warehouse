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
                                        <input type="date"  class="form-control form-control-sm" v-model="form.picker">
                                    </div>
                                     <div class="col-6">
                                        <input type="text"  class="form-control form-control-sm" placeholder="No Faktur" v-model="form.faktur">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <input type="text"  class="form-control form-control-sm" placeholder="Supplier" v-model="form.supplier">
                                    </div>
                                     <div class="col-6">
                                        <textarea name="" class="form-control form-control-sm" placeholder="Remark" v-model="form.remark"></textarea>
                                    </div>
                                </div>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                         <th scope="col">P.Number</th>
                                         <th scope="col">Detail</th>
                                         <th scope="col">jumlah</th>
                                         <th scope="col" v-if="cekBarang && !this.$route.params.id"><button class="btn btn-link" title="Delete all" v-on:click="destroyAll()"><i class="fa fa-trash"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in array_barang" :key="index">
                                            <td>{{ value.part_number ? value.part_number : value.barang.part_number }}</td>
                                            <td>{{ value.categories ?  value.categories.category_name : value.barang.category.category_name }}</td>
                                            <td>{{ value.count ? value.count : value.amount }} {{ value.satuans ? value.satuans.satuan_name : value.barang.satuan.satuan_name }}</td>
                                            <td><button class="btn btn-link" v-on:click="destroy(value)"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group" v-if="cekBarang">
                                    <button v-if="cekUpdate" class="btn btn-outline-primary" v-on:click="submitform()">Save</button>
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
export default {
    data(){
        return{
            barang:[],
            select_barang : {},
            count_barang : 0,
            array_barang : [],
            form:{},
            order_transaction:[],
            update_post :[]
        }
    },

    computed:{
        cekBarang(){
            return this.array_barang.length ? true : false
        },

        cekUpdate(){
            if(this.$route.params.status){
                return true;
            }
            return this.update_post.length > 0 ? true : false
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
                let barang = await axios.get('api/barang?all=true');
                this.barang = barang.data
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

                if(this.$route.params.id){
                    this.update_post.push(this.select_barang)
                }
                return this.reset()
            }
        },

        destroy(items){
            
            if(confirm("Hapus data ini ?")){
                let index = this.array_barang.indexOf(items)
                if(this.$route.params.id){
                    if(this.array_barang.length >1){
                        this.$delete(this.array_barang, index)
                        this.$delete(this.update_post, index)
                        if(this.update_post.length < 1) return this.deleteOrder(items)
                    } else{
                        alert('Failed to delete')
                        return;
                    }
                }
                this.$delete(this.update_post, index)
                this.$delete(this.array_barang, index)
               
                return this.barang.push(items)
            }
        },

        async deleteOrder(items){
            try {
                let remove = await axios.delete('api/order/'+items.id)
            } catch (error) {
                console.log(error)
            }
        },

        destroyAll(){
            if(confirm("Hapus semua data ?")){
                Array.prototype.push.apply(this.barang, this.array_barang);
                return this.array_barang = []
            }
        },

        async submitform(){
           return this.$route.params.id ? this.updateTransaction() : this.saveTransaction()
        },

        async saveTransaction(){
             try {
                let datas = this.array_barang
                let save = await axios.post('/api/transaction', {
                    "picker" : this.form.picker,
                    "faktur_number" : this.form.faktur,
                    "remark" : this.form.remark,
                    "supplier" :this.form.supplier,
                    "status" : this.$route.params.status,
                    "barang" : datas
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
                this.form.picker = data.data.picker
                this.form.faktur = data.data.faktur_number
                this.form.supplier = data.data.supplier
                this.form.remark = data.data.remark
                this.array_barang = data.data.order
                return this.removeItemsArray(data.data.order)
            } catch (error) {
                console.log(error)
            }
            
        },

        removeItemsArray(arr){
            for(var value in arr){
                var index = this.barang.map((el)=>{
                    return el.category.category_name
                }).indexOf(arr[value].barang.category.category_name)
                this.$delete(this.barang, index)
            }
        },

        generateEditPost(){
            this.array_barang.forEach((key, index)=>{
                this.update_post.push({
                    'barang_id' : key.barang.id,
                    'amount' : key.amount
                })
            });
        },

        async updateTransaction(){
            try {
                let update = await axios.put('api/transaction/'+this.$route.params.id, {
                    "picker" : this.form.picker,
                    "faktur_number" : this.form.faktur,
                    "remark" : this.form.remark,
                    "supplier" :this.form.supplier,
                    "order" : this.update_post
                })
    
                return this.$router.push('/transaction/') 

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