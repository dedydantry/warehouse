<template>
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ title }}</h1>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><router-link :to="{name : 'home'}"><i class="menu-icon fa fa-laptop"></i>Dashboard</router-link></li>
                                <li><a href="#">Joss</a></li>
                                <li class="active">Basic</li>
                            </ol>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            classCard : 'card'
        }
    },

    props : ['title']
}
</script>

