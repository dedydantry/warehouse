<template>
    <div class="clearfix">
        <breadcrumbs title="Transaction"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ isTitle }}</strong>
                                <router-link :to="`/transaction/create/${this.$route.params.status}`" class="btn btn-outline-primary float-sm-right"><i class="fa fa-plus"></i> New</router-link>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">No Faktur</th>
                                            <th scope="col">Supplier</th>
                                            <th scope="col">Remark</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(transactions, index) in transaction" :key="index">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ transactions.picker }}</td>
                                            <td>{{ transactions.faktur_number }}</td>
                                            <td>{{ transactions.supplier }}</td>
                                            <td>{{ transactions.remark }}</td>
                                            <td>
                                               <router-link :to="`/transaction/order/${transactions.id}`" title="Detail" class="btn btn-outline-secondary btn-sm"><i class="menu-icon fa  fa-folder"></i></router-link>
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
        return{
            title : '',
            transaction : []
        }
    },
    components : {Breadcrumbs},


    computed : {
        isTitle(){
            return this.$route.params.status == 'in' ? 'Receving' : 'Issuing/Out'
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
                let datas = await axios.get('api/transaction?status='+this.$route.params.status);
                this.transaction = datas.data
            } catch (error) {
                console.log(error)
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