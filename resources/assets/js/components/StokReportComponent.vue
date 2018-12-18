<template>
    <div class="clearfix">    
        <breadcrumbs title="Report Stock"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Report</strong>
                                <button v-on:click="generatePDF()" class="btn btn-outline-default float-sm-right" title="Print"><i class="fa fa-print"></i></button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Part Number</th>
                                            <th scope="col">Items Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(barangs, index) in barang" v-bind:key="index">
                                            <td>{{ barangs.id }}</td>
                                            <td>{{ barangs.part_number }}</td>
                                            <td>{{ barangs.description }}</td>
                                            <td>{{ barangs.category.category_name }}</td>
                                            <td>{{ barangs.brand.brand_name }}</td>
                                            <td>{{ barangs.stok }} {{ barangs.satuan.satuan_name }}</td>
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
import table from '../helper/table.js';

export default {
    data(){
        return{
            barang:{
                
            },
            table:[[
                {text:'#', bold:true, fontSize:10, alignment:'center'}, 
                {text:'PartNumber', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Items Name', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Category', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Brand', bold:true, fontSize:10, alignment:'center'}, 
                {text:'Stok', bold:true, fontSize:10, alignment:'center'}
            ]]
        }
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
        },

        generateTabelPdf(items){
           items.map((value, index) => {
                var res = [
                    {text: index+1, fontSize:9},
                    {text : value.part_number, fontSize:9},
                    {text : value.description, fontSize:9},
                    {text :  value.category.category_name, fontSize:9},
                    {text :value.brand.brand_name, fontSize:9},
                    {text:value.stok+' '+value.satuan.satuan_name, fontSize:9},
                ]
                this.table.push(res)
           })
        },

        generatePDF(){
            this.generateTabelPdf(this.barang)
            
            let params = {
               'title' : 'Items Stock Report',
               'data' : this.table,
               'width':['auto', 100, 100,  100, 100, 'auto']
           }
           return table(params)
        }
    }
}
</script>