<template lang="html">
<div >
    <table class="table table-striped">
    <thead>
                <tr>
                    <th>Product</th> 
                    <th>Supplier id</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
    <tr>
        <td>
            <input type="text"  class="form-control"
                v-model="editForm.product_name" v-if="edit"
            >
            <span v-else>{{ product.product_name }}</span>
        </td>  

        <td>
            <input type="text"  class="form-control " disabled
                v-model="editForm.supplier_id" v-if="edit"
            >
            <span v-else>{{ product.supplier_id }}</span>
        </td>    
        
        <td>
            <button type="button" class="btn btn-info"
                v-on:click="editProduct" v-if="!edit"
            >
                Edit
            </button>

            <button type="button" class="btn btn-default"
                v-on:click="cancelEdit" v-if="edit"
            >
                Cancel
            </button>

            <button type="button" class="btn btn-primary"
                v-on:click="updateProduct(product, editForm)" v-if="edit"
            >
                update
            </button>

            <button type="button" class="btn btn-danger"
                v-on:click="$emit('delete-product', product)" v-if="!edit"
            >
                Delete
            </button>
        </td>
    </tr>
    </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props:['product'],
    data(){
        return {
            edit: false,
            editForm :{
                product_name: '',
                supplier_id:''

            },

        }
    },

    methods: {
        editProduct(){
            this.edit = true;
            this.editForm.product_name = this.product.product_name;
            this.editForm.supplier_id = this.product.supplier_id;

        },
        cancelEdit(){
            this.edit = false;
            this.editForm.name = '';

        },
        updateProduct(oldProduct, newProduct){
            this.axios.patch('/api/products/' + oldProduct.id, newProduct).then(response => {
                this.$emit('update-product');
                this.cancelEdit();
                console.log(response.data);
            }, (response) => {
                console.log(response.data);
            });
        }
    }
}
</script>
