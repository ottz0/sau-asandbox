<template>
    <div>
        <button :class="btnClass" @click.prevent="sweetAlert">{{btnTxt}}</button>
    </div>
</template>

<script>
export default {
  props:['btnTxt', 'btnClass','alertMsg'],
  data(){
    return{}

  },
  methods:{
    sweetAlert() {
      console.log('this is clicked');
      this.$swal(this.alertMsg);
    }
  }

}
</script>

<style>

</style>
