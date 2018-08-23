<template>
  <div>
      <button class="btn btn-primary" @click.prevent="increment">Increment</button>
      <button class="btn btn-primary" @click.prevent="updateUsername">Update Username</button>
  </div>
</template>

<script>
export default {
    methods: {
        increment(){
            this.$store.commit('increment');
        },
        updateUsername(){
            this.$store.commit('updateUsername', 'peter pan'); 
        }
    }
}
</script>

<style>

</style>
