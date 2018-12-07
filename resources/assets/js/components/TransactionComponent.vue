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
                                <ul class="pagination">
                                    <li v-if="page > 1" @click="prevPage()" class="page-item pagination-prev-nav">
                                        <a href="javascript:;" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a>
                                    
                                    </li>
                                    <li v-for="n in meta.total" :key="n" :class="[page == n ? 'page-item active' : 'page-item']">
                                        <a v-if="meta.total > limit && n==2" href="javascript:;" class="page-link">...</a>
                                        <a v-else href="javascript:;" class="page-link" @click="makePagination(n)">{{n}}</a>
                                    </li>
                                    <li v-if="page < 2" class="page-item pagination-next-nav">
                                        <a href="javascript:;" @click="nextPage()" aria-label="Next" class="page-link">
                                            <span aria-hidden="true">»</span><span class="sr-only">Next</span></a>
                                    </li>
                                </ul>
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
            title : '',
            transaction : [],
            links : {},
            meta:{},
            page:1,
            limit:5
        }
    },

    computed : {
        isTitle(){
            return this.$route.params.status == 'in' ? 'Receving' : 'Issuing/Out'
        },
    },

    mounted(){
        if(this.$route.params.status == 'in'){
             this.makePagination()
        } else {
            this.makePagination()
        }
    },

    methods:{

        async makePagination(page = 1){
            this.page = page
             try {
                let datas = await axios.get('api/transaction?status='+this.$route.params.status+'&page='+page);
                this.transaction = datas.data.data
                this.links = datas.data.links,
                this.meta = datas.data.meta
                return
            } catch (error) {
                console.log(error)
            }
        },

        nextPage(){
            return this.makePagination(this.page+1)
        },

        prevPage(){
            return this.makePagination(this.page-1)
        }
    },

    watch: {
        '$route.params.status'() {
            this.makePagination()
        }
    }
}
</script>