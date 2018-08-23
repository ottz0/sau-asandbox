<template>
<div>herer</div>
</template>

<script>
export default {
  props:['msg'],
  created(){
    this.sweetAlert();
  },
  data(){
    return{
  
    }
  },
  methods:{
    sweetAlert() {
      this.$swal(this.msg)
    }
  }

}
</script>

<style>

</style>
