<template lang="html">
    <div class="page">
        <form v-on:submit.prevent="createOrder" method="post">

            <div v-bind:class="{'form-group': true, 'has-error': errors.order_date}">
                <label>Order Date:</label>
                <!-- <input type="text" v-model="order.order_date" class="form-control"> -->
                <date-picker v-model="order.order_date" type="datetime" :lang="lang" ></date-picker>
                <span class="help-block" v-for="error in errors.order_date" >{{ error }}</span>
            </div>

            <div v-bind:class="{'form-group': true, 'has-error': errors.headquater_id}">
                <label>Headquater id:</label>
                <select class="form-control" id="sel1" v-model="order.headquater_id">
                <option v-for="headquater in headquaters" v-bind:order="headquater" :key="headquater.id">
                {{headquater.id}}
                </option>
                </select>
                
                <span class="help-block" v-for="error in errors.headquater_id" >{{ error }}</span>
            </div>
            


            <div class="form-group">
                <button type="submit" v-on:click="fetchOrders" class="btn btn-primary">Create New Order</button>
            </div>
        </form>

    
            
            
                <Order v-for="order in orders" v-bind:order="order" :key="order.id"
                    v-on:delete-order="deleteOrder"
                    v-on:update-order="fetchOrders"

                >
                </Order>
            
        
    </div>
</template>

<script>
import Order from './Order.vue';
import DatePicker from 'vue2-datepicker';


export default {

    data(){
        return {
            lang: {
                lang:'en'
            },
            orders: [],
            headquaters: [],
            errors: [],
            headquater:{

                id:'',
                
                
            },
            order:{
                order_date: '',
                headquater_id:''
                
                
            }
        }
    },
    components:{ Order, DatePicker  },
    created(){
        this.fetchOrders();
        this.fetchHeadQ();
    },
    methods: {
        
        fetchOrders(){
            this.axios.get('/api/orders/').then(respon => {
                this.orders = respon.data.data;
            });
        },

        fetchHeadQ(){
            this.axios.get('/headquaters/').then(response => {
                this.headquaters = response.data;
            });
        },

        createOrder(){
            this.axios.post('/api/orders/', this.order).then(response => {
                this.orders.push(response.data.order);
                this.order = {order_date:'', headquater_id:''};
                this.fetchOrders();
                if (this.errors) {
                    this.errors = [];
                }
                console.log(response.data);
            }, response => {
                this.errors = response.data;
            });
        },

        deleteOrder(order){
            this.axios.delete('/api/orders/' + order.id).then(response => {
                let index = this.orders.indexOf(order);
                this.orders.splice(index, 1);
                console.log(response.data);
            });
        }
    }
}
</script>
