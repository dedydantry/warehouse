<template>
    <div class="clearfix">    
        <breadcrumbs title="Barang"></breadcrumbs>
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
                                            <th scope="col">Category</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(barangs, index) in barang" v-bind:key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ barangs.part_number }}</td>
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
import Breadcrumbs from './BreadcrumbsComponent.vue'
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;

export default {
    data(){
        return{
            barang:{
                
            },
            table:[
                ['No', 'PartNumber', 'Category', 'Brand', 'Stok'],
                ['Jon', 'jin', 'jne', 'kak', 'ls']
            ]
            
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    created(){
        this.fetchBarang()
        this.generateTabelPdf()
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

        generateTabelPdf(){
            for (var prop in this.barang) {
                console.log(this.barang(prop))
            }
        },

        generatePDF(){
            
           var dd = {
                content: [
                    {
                        text : 'LAPORAN STOK BARANG',
                        style : 'header',
                    },

                    {
                        text : 'PT. BINA KARYA',
                        style : 'subheader',
                        alignment: 'center'
                    },
                    {
                        canvas: [{ type: 'line', x1: 0, y1: 5, x2: 595-2*40, y2: 5, lineWidth: 3 }]
                    },
                    {
                        // style:"tabelstok",
                        // table:{
                        //     	headerRows: 1,
                        //     body : this.table
                        // }
                         columns: [
                            { width: '*', text: '' },
                            {
                                width: 'auto',
                                style:"tabelstok",
                                table: {
                                    widths: ['auto', 100,  100, 120, 'auto'],
                                    body : this.table
                                }
                            },
                            { width: '*', text: '' },
                        ]
                    }
                ],
                styles:{
                    fontFamily : 'times new roman',
                    header:{
                        fontSize:20,
                        bold:true,
                        alignment: 'center'
                    },
                    subheader:{
                        fontSize:16,
                        bold:true,
                        alignment: 'center'
                    },
                    tabelstok:{
                        margin: [0, 5, 0, 15]
                    }
                },
                
                
            }
             pdfMake.createPdf(dd).open();
            //  pdfMake.createPdf(dd).download('jos');
        }
    }
}
</script>