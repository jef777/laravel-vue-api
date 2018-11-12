<template lang="html">
<div >
    <table class="table table-striped">
    <thead>
                <tr>
                    <th>Order date</th> 
                    <th>headquaters id</th> 
                    <th>Action</th>
                </tr>
            </thead>
    <tbody>
    <tr>
        <td>
            <!-- <input type="text"  class="form-control"
                v-model="editForm.order_date" v-if="edit"
            > -->
            <date-picker v-model="editForm.order_date" v-if="edit" :lang="lang" ></date-picker>
            <span v-else>{{ order.order_date }}</span>
        </td>  

        <td>
            <input type="text"  class="form-control " disabled
                v-model="editForm.headquater_id" v-if="edit"
            >
            <span v-else>{{ order.headquater_id }}</span>
        </td>  
        
        
        <td>
            <button type="button" class="btn btn-info"
                v-on:click="editOrder" v-if="!edit"
            >
                Edit
            </button>

            <button type="button" class="btn btn-default"
                v-on:click="cancelEdit" v-if="edit"
            >
                Cancel
            </button>

            <button type="button" class="btn btn-primary"
                v-on:click="updateOrder(order, editForm)" v-if="edit"
            >
                update
            </button>

            <button type="button" class="btn btn-danger"
                v-on:click="$emit('delete-order', order)" v-if="!edit"
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
import DatePicker from 'vue2-datepicker';
export default {
    props:['order'],
    data(){
        return {
            lang: {
                lang:'en'
            },
            edit: false,
            editForm :{
                headquater_id: '',
                order_date:''

            },

        }
    },
components:{ DatePicker  },
    methods: {
        editOrder(){
            this.edit = true;
            this.editForm.headquater_id = this.order.headquater_id;
            this.editForm.order_date = this.order.order_date;

        },
        cancelEdit(){
            this.edit = false;
            this.editForm.name = '';

        },
        updateOrder(oldOrder, newOrder){
            this.axios.patch('/api/orders/' + oldOrder.id, newOrder).then(response => {
                this.$emit('update-order');
                this.cancelEdit();
                console.log(response.data);
            }, (response) => {
                console.log(response.data);
            });
        }
    }
}
</script>
