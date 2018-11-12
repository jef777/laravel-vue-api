<template lang="html">
    <div class="page" >
        <form v-on:submit.prevent="createSupplier" method="post">

            <div v-bind:class="{'form-group': true, 'has-error': errors.supplier_name}">
                <label>Supplier Name:</label>
                <input type="text" v-model="supplier.supplier_name" class="form-control">
                <span class="help-block" v-for="error in errors.supplier_name" >{{ error }}</span>
            </div>

            


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create New Supplier</button>
            </div>
        </form>

        
                <Supplier v-for="supplier in suppliers" v-bind:supplier="supplier" :key="supplier.id"
                    v-on:delete-supplier="deleteSupplier"
                    v-on:update-supplier="fetchSuppliers"

                >
                </Supplier>
        
    </div>
</template>

<script>
import Supplier from './Supplier.vue';


export default {

    data(){
        return {

            suppliers: [],
            errors: [],
            
            supplier:{
                supplier_name: '',
                delivery_id: 1

            }
        }
    },
    components:{ Supplier },
    created(){
        this.fetchSuppliers();
    },
    methods: {
        fetchSuppliers(){
            this.axios.get('/api/suppliers/').then(respon => {
                this.suppliers = respon.data.data;
            });
        },


        createSupplier(){
            this.axios.post('/api/suppliers/', this.supplier).then(response => {
                this.suppliers.push(response.data.supplier);
                this.supplier = {supplier_name:'', delivery_id:''};
                this.fetchSuppliers();
                if (this.errors) {
                    this.errors = [];
                }
                console.log(response.data);
            }, response => {
                this.errors = response.data;
            });
        },

        deleteSupplier(supplier){
            this.axios.delete('/api/suppliers/' + supplier.id).then(response => {
                let index = this.suppliers.indexOf(supplier);
                this.suppliers.splice(index, 1);
                console.log(response.data);
            });
        }
    }
}
</script>
