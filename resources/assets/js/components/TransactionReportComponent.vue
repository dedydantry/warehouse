<template>
    <div class="clearfix">    
        <breadcrumbs title="Report"/>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <form @submit.prevent="submitForm" class="float-sm-left">
                                    <div class="input-group">
                                        <!-- <select v-model="periode" class="form-control">
                                            <option>Select Month</option>
                                            <option v-for="n in 12">{{ n }}</option>
                                        </select> -->
                                        <input type="month" v-model="periode" placeholder="Periode" class="form-control">
                                        <div class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></div>
                                    </div>
                                </form>
                                <p style="text-align:center"><strong>{{isTitle}}</strong></p>
                                <button v-on:click="generatePDF()" class="btn btn-outline-default float-sm-right" title="Print"><i class="fa fa-print"></i></button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">No Faktur</th>
                                            <th scope="col">Items Name</th>
                                            <th scope="col">{{isTitle}}</th>
                                            <th scope="col">Real Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(transactions, index) in transaction" :key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ transactions.transaction.picker }}</td>
                                            <td>{{ transactions.transaction.faktur_number }}</td>
                                            <td>{{ transactions.barang.description }}</td>
                                            <td>{{ transactions.amount }}</td>
                                            <td>{{ transactions.barang.stok }}</td>
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
import table from '../helper/table.js';

export default {
    data(){
        return{
            transaction:[],
            title:'',
            table:[[
                {text:'#', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Date', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Faktur', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Item Name', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Receiving', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Real Stok', bold:true, fontSize:10, alignment:'center'}
                ]],
            periode : ''
            
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    computed : {
        isTitle(){
            return this.$route.params.status == 'in' ? 'Receiving' : 'Issuing/Out'
        },
    },

     mounted(){
        if(this.$route.params.status == 'in'){
             this.fetchTransaction()
        } else {
            this.fetchTransaction()
        }
    },

    methods:{
        async fetchTransaction(){
            try {
                let datas = await axios.get('api/report/transaction/'+this.$route.params.status);
                this.transaction = datas.data
            } catch (error) {
            }
            console.log
        },

        generateTabelPdf(items){
           items.map((value, index) => {
                var res = [
                    {text :  index+1, fontSize:9},
                    {text:value.transaction.picker, fontSize:9},
                    {text:value.transaction.faktur_number, fontSize:9},
                    {text:value.barang.description, fontSize:9},
                    {text: value.amount, fontSize:9,alignment:'center'},
                    {text:value.barang.stok, fontSize:9, alignment:'center'}
                ]
                this.table.push(res)
           })
        },


        generatePDF(){
            this.generateTabelPdf(this.transaction)

            let params = {
               'title' : 'Receiving items',
               'data' : this.table,
               'width':['auto', 100,  100, 150, 'auto', 'auto']
           }
           return table(params)
        },

        async submitForm(){
            if(this.periode){
                try {
                    let periode = await axios.get('api/report/transaction/'+this.$route.params.status+'?periode='+this.periode)
                    this.transaction = periode.data
                } catch (error) {
                    console.log(error)
                }
            }
        }
        
    },

     watch: {
        '$route.params.status'() {
            this.fetchTransaction()
        }
    }
}
</script>