<template lang="html">
    <div class="page">
        <form v-on:submit.prevent="createProduct" method="post">

            <div v-bind:class="{'form-group': true, 'has-error': errors.product_name}">
                <label>Product Name:</label>
                <input type="text" v-model="product.product_name" class="form-control">
                <span class="help-block" v-for="error in errors.product_name" >{{ error }}</span>
            </div>

            <div v-bind:class="{'form-group': true, 'has-error': errors.supplier_id}">
                <label>supplier id:</label>
                <select class="form-control" id="sel1" v-model="product.supplier_id">
                <option v-for="supplier in suppliers" v-bind:product="supplier" :key="supplier.id">
                {{supplier.id}}
                </option>
                </select>
                
                <span class="help-block" v-for="error in errors.supplier_id" >{{ error }}</span>
            </div>


            <div class="form-group">
                <button type="submit"  class="btn btn-primary">Create New Product</button>
            </div>
        </form>

        
        
                <Product v-for="product in products" v-bind:product="product" :key="product.id"
                    v-on:delete-product="deleteProduct"
                    v-on:update-product="fetchProducts"

                >
                </Product>
            
    </div>
</template>

<script>
import Product from './Product.vue';


export default {

    data(){
        return {
            products: [],
            suppliers: [],
            errors: [],
            supplier:{

                supplier_id:''  
                
            },
            product:{
                product_name: '',
                supplier_id:''
                
                
            }
        }
    },
    components:{ Product },
    created(){
        this.fetchProducts();
        this.fetchSupplier();
    },
    methods: {
        fetchProducts(){
            this.axios.get('/api/products/').then(respon => {
                this.products = respon.data.data;
            });
        },

        fetchSupplier(){
            this.axios.get('/api/suppliers/').then(response => {
                this.suppliers = response.data.data;
            });
        },

        createProduct(){
            this.axios.post('/api/products/', this.product).then(response => {
                this.products.push(response.data.product);
                this.product = {product_name:'', supplier_id:''};
                this.fetchProducts();
                if (this.errors) {
                    this.errors = [];
                }
                console.log(response.data);
            }, response => {
                this.errors = response.data;
            });
        },

        deleteProduct(product){
            this.axios.delete('/api/products/' + product.id).then(response => {
                let index = this.products.indexOf(product);
                this.products.splice(index, 1);
                console.log(response.data);
            });
        }
    }
}
</script>
