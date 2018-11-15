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
import jsPDF from 'jspdf'

export default {
    data(){
        return{
            barang:{
                
            }
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

        generatePDF(){
            let pdfName = "stok"
            var doc = new jsPDF()
            doc.text("Hello Wordl")
            doc.save(pdfName + '.pdf')
        }
    }
}
</script>