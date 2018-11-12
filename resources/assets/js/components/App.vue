<template>
    <div>
        <h1>Vue api crud</h1>
        

        <p>
            <router-link :to="{ name: 'suppliers' }">Suppliers</router-link> |
            <router-link :to="{ name: 'products' }">Products </router-link> |
            <router-link :to="{ name: 'orders' }">Orders</router-link> 
        </p>

        <div class="container">
           <transition name="router-anim">
            <router-view></router-view>
            </transition>
        </div>
    </div>
</template>
<script>
    export default {}
</script>

<style >
.page {
    position: fixed;
    
  }
.router-anim-enter-active {
  animation: coming 1s;
  animation-delay: .5s;
  opacity: 0;
}
.router-anim-leave-active {
  animation: going 1s;
}

@keyframes going {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50px);
    opacity: 0;
  }
}
@keyframes coming {
  from {
    transform: translateX(-50px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}
</style>
