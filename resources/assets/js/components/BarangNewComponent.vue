<template>
    <div class="clearfix">
        <breadcrumbs title="Barang"></breadcrumbs>
        <div class="content">
            <div class="animate fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Form Barang</strong>
                                <router-link to="/barang" class="btn btn-outline-primary float-sm-right">Kembali</router-link>
                            </div>
                            <div class="card-body">
                                <form class="form" @submit.prevent="submitForm">
                                    <div class="form-group">
                                        <label for="part_number" class=" form-control-label">Part :</label>
                                        <input type="text" name="part_number" v-model="part_number" :class="[invalidPart && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                        <span v-if="attemptSubmit && invalidPart" class="invalid-feedback">{{ errors.part_number }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class=" form-control-label">Desc :</label>
                                        <input type="text" v-model="description" name="description" :class="[invalidDesc && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                        <span v-if="attemptSubmit && invalidDesc" class="invalid-feedback">{{ errors.description }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="select_category" class=" form-control-label">Category :</label>
                                        <select name="select_category" v-model="select_category" :class="[invalidCategory && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                            <option value="" disabled>...</option>
                                            <option v-for="(categories, index) in category" :value="categories.id" :key="index">{{ categories.category_name }}</option>
                                        </select>
                                        <span v-if="attemptSubmit && invalidCategory" class="invalid-feedback">{{ errors.category }}</span>

                                    </div>
                                    <div class="form-group">
                                        <label for="select_brand" class=" form-control-label">Brand :</label>
                                        <select name="select_brand" v-model="select_brand" :class="[invalidBrand && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                            <option value="" disabled>...</option>
                                            <option v-for="(brands, index) in brand" :value="brands.id" :key="index">{{ brands.brand_name }}</option>
                                        </select>
                                        <span v-if="attemptSubmit && invalidBrand" class="invalid-feedback">{{ errors.brand }}</span>

                                    </div>
                                    <div class="form-group">
                                        <label for="select_satuan" class="form-control-label">Satuan :</label>
                                            <select name="select_satuan" v-model="select_satuan" :class="[invalidSatuan && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                            <option value="" disabled>...</option>
                                            <option v-for="(satuans, index) in satuan" :value="satuans.id" :key="index">{{ satuans.satuan_name }}</option>
                                        </select>
                                        <span v-if="attemptSubmit && invalidSatuan" class="invalid-feedback">{{ errors.satuan }}</span>

                                    </div>
                                    <div class="form-group">
                                        <label for="price" class=" form-control-label">Harga :</label>
                                        <input type="number" v-model="price" name="price" :class="[invalidPrice && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                        <span v-if="attemptSubmit && invalidSatuan" class="invalid-feedback">{{ errors.price }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok" class=" form-control-label">Stok :</label>
                                        <input type="number" v-model="stok" name="stok" :class="[invalidStok && attemptSubmit ? 'is-invalid form-control' : 'form-control']">
                                        <span v-if="attemptSubmit && invalidSatuan" class="invalid-feedback">{{ errors.stok }}</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="cover" class=" form-control-label">Cover :</label>
                                        <input type="file" name="cover">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info btn-lg float-lg-right" type="submit">Submit</button>
                                    </div>
                                </form>
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
            part_number :'',
            description:'',
            select_category:'',
            select_brand:'',
            select_satuan:'',
            price:'',
            stok:'',
            cover:'',
            category :{},
            brand : {},
            satuan : {},
            errors : [],
            attemptSubmit : false,
            validateMessage:{
                "required" : "The field is required",
                "number" : "The field must be number",
            }
        }
    },

    components:{
        'breadcrumbs' : Breadcrumbs
    },

    created(){
        this.fetchData()
        this.fetchOne()
    },

    computed : {
        invalidPart(){
            if(!this.part_number) return this.errors.part_number = this.validateMessage.required
        },

        invalidDesc(){
            if(!this.description) return this.errors.description = this.validateMessage.required
        },

        invalidCategory(){
            if(!this.select_category) return this.errors.category = this.validateMessage.required
        },

        invalidBrand(){
            if(!this.select_brand) return this.errors.brand = this.validateMessage.required
        },

        invalidSatuan(){
            if(!this.select_satuan) return this.errors.satuan = this.validateMessage.required
        },

        invalidPrice(){
            if(!this.price) return this.errors.price = this.validateMessage.required
        },

        invalidStok(){
            if(!this.stok) return this.errors.stok = this.validateMessage.required
        },
    },

    methods:{
        async submitForm(){
            this.attemptSubmit = true
            if(this.validateForm()){
                return this.$route.params.id ? this.updateBarang() : this.addBarang()
            }
        },

        async addBarang(){
            let save = await axios.post('/api/barang', {
                "part_number" : this.part_number, 
                "description" : this.description, 
                "category_id" : this.select_category, 
                "brand_id" : this.select_brand, 
                "satuan_id" : this.select_satuan,
                "price" : this.price,
                "cover" : 'img.jpg',
                "stok" : this.stok,
            })
            this.reset();
            return this.$router.push('/barang') 
        },

        async updateBarang(){
            let save = await axios.put('/api/barang/'+this.$route.params.id, {
                "part_number" : this.part_number, 
                "description" : this.description, 
                "category_id" : this.select_category, 
                "brand_id" : this.select_brand, 
                "satuan_id" : this.select_satuan,
                "price" : this.price,
                "cover" : 'img.jpg',
                "stok" : this.stok,
            })
            this.reset();
            return this.$router.push('/barang') 
        },

        validateForm(){
            if(this.invalidPart|| this.invalidDesc || this.invalidCategory || this.invalidBrand || this.invalidSatuan || this.invalidPrice || this.invalidStok) return false;

            return true;
        },

        async fetchData(){
            try {
                let data = await axios.get('/api/barang/create');
                this.satuan   = data.data.satuan
                this.category   = data.data.category
                this.brand   = data.data.brand
            } catch (error) {
                console.log(error)
            }
        },
        

        reset(){
            this.part_number = ''
            this.description = ''
            this.category = ''
            this.brand = ''
            this.satuan = ''
            this.price = ''
            this.stok = ''
        },

        //edit

        async fetchOne(){
            if(this.$route.params.id){
                try {
                    let data = await axios.get(`/api/barang/${this.$route.params.id}`)
                    console.log(data.data)
                    this.part_number = data.data.part_number
                    this.description = data.data.description
                    this.select_category = data.data.category_id
                    this.select_brand = data.data.brand_id
                    this.select_satuan = data.data.satuan_id
                    this.price = data.data.price
                    this.stok = data.data.stok
                } catch (error) {
                    console.log(error)
                }
            }
        },
    }
}
</script>