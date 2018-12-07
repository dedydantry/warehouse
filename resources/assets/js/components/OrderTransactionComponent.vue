<template>
    <div class="clearfix">    
        <breadcrumbs title="Order Transaction"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border border-secondary">
                            <div class="card-header">
                                <strong class="card-title">{{ isTitle }} Details</strong>
                                <div class="float-sm-right">
                                    <button class="btn btn-link btn-sm" v-on:click="generatePDF()" title="Print"><i class="fa fa-print"></i></button> |
                                    <router-link :to="`/transaction/edit/${this.$route.params.id}`" title="Detail" class="btn btn-link btn-sm"><i class="fa fa-edit"></i></router-link>

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Part Number</th>
                                            <th>Name</th>
                                            <th>UoM</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(orders, index) in order" :key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ orders.barang.part_number }}</td>
                                            <td>{{ orders.barang.description }}</td>
                                            <td>{{ orders.barang.satuan.satuan_name }}</td>
                                            <td>{{ orders.amount }}</td>
                                        </tr>
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="">Total : 20</td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <p class="text-right">
                                           Total : {{ order.length }} items
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="card bg-light">
                                           <div class="card-body">
                                               <p><strong>Remark : </strong>
                                                    <br>
                                                    {{ isRemark }}
                                               </p>
                                           </div>
                                       </div>
                                    </div>
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
import table from '../helper/receipt.js';
import receipt from '../helper/receipt.js';

export default {
    data(){
        return {
            order :[],
            table :[
                [{text:'#', bold:true}, {text:'Part Number', bold:true}, {text:'Item Name', bold:true}, {text:'Amount', bold:true}]
            ]
        }
    },

    computed:{
        isTitle(){
            if(this.order.length)
                return this.title = this.order[0].transaction.status == 'IN' ? 'Receving' : 'Issuing'
        },

        isRemark(){
            if(this.order.length)
                return this.remark = this.order[0].transaction.remark
        }
    },

    created(){
        this.fetchOrder()
    },
    
    methods:{

        async fetchOrder(){
            try {
                let order = await axios.get('api/order?transaction='+this.$route.params.id)
                this.order = order.data
            } catch (error) {
                console.log(error)
            }
        },

        generateTable(items){
            items.map((value, index) => {
                var res = [
                    {text : index+1, fontSize:9},
                    {text:value.barang.part_number, fontSize:9},
                    {text:value.barang.description, fontSize:9},
                    {text:value.amount+' '+value.barang.satuan.satuan_name, fontSize:9},
                ]
                this.table.push(res)
            })
        },
        
        generatePDF(){
            this.generateTable(this.order)
            let transaction = this.order[0];
            let params = {
                title : transaction.transaction.status == 'IN' ? 'Receipt Items' : 'Issuing Items',
                transaction_date : transaction.transaction.picker,
                faktur : transaction.transaction.faktur_number,
                supplier : transaction.transaction.supplier,
                width : ['auto', 200, 200, '*'],
                remark:transaction.transaction.remark,
                data : this.table
            }
            return receipt(params);
        }
    },

     watch: {
        '$route.params.id'() {
            this.fetchOrder()
        }
    }
}
</script>