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
                                    <button class="btn btn-link btn-sm" title="Print"><i class="fa fa-print"></i></button> |
                                    <router-link :to="`/transaction/edit/${this.$route.params.id}`" title="Detail" class="btn btn-link btn-sm"><i class="fa fa-edit"></i></router-link>

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Part Number</th>
                                            <th>Description</th>
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
                                           Total Jenis Barang : {{ order.length }} items
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
import Breadcrumbs from './BreadcrumbsComponent.vue'
export default {
    data(){
        return {
            order :[],
        }
    },

    components:{Breadcrumbs},

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
        }
    },
     watch: {
        '$route.params.id'() {
            this.fetchOrder()
        }
    }
}
</script>