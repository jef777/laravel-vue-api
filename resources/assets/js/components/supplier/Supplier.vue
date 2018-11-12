<template lang="html">
<div >
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supplier</th> 
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
    <tr>
        <td>
            <input type="text"  class="form-control"
                v-model="editForm.supplier_name" v-if="edit"
            >
            <span v-else>{{ supplier.supplier_name }}</span>
        </td>  

        
        
        <td>
            <button type="button" class="btn btn-info"
                v-on:click="editSupplier" v-if="!edit"
            >
                Edit
            </button>

            <button type="button" class="btn btn-default"
                v-on:click="cancelEdit" v-if="edit"
            >
                Cancel
            </button>

            <button type="button" class="btn btn-primary"
                v-on:click="updateSupplier(supplier, editForm)" v-if="edit"
            >
                update
            </button>

            <button type="button" class="btn btn-danger"
                v-on:click="$emit('delete-supplier', supplier)" v-if="!edit"
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
    props:['supplier'],
    data(){
        return {
            edit: false,
            editForm :{
                supplier_name: '',
                

            },

        }
    },

    methods: {
        editSupplier(){
            this.edit = true;
            this.editForm.supplier_name = this.supplier.supplier_name;
        

        },
        cancelEdit(){
            this.edit = false;
            this.editForm.name = '';

        },
        updateSupplier(oldSupplier, newSupplier){
            this.axios.patch('/api/suppliers/' + oldSupplier.id, newSupplier).then(response => {
                this.$emit('update-supplier');
                this.cancelEdit();
                console.log(response.data);
            }, (response) => {
                console.log(response.data);
            });
        }
    }
}
</script>
