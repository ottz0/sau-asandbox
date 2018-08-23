<template>
  <div>
      <p @click="test">progress</p>
  </div>
</template>

<script>
export default {
  methods:{
    start () {
        this.$Progress.start();
        console.log('here');
    },
    set (num) {
        this.$Progress.set(num)
    },
    increase (num) {
        this.$Progress.increase(num)
    },
    decrease (num) {
        this.$Progress.decrease(num)
    },
    finish () {
        this.$Progress.finish()
    },
    fail () {
        this.$Progress.fail()
    },
    test(){
      this.$Progress.start()
        console.log('started');
      this.$http.jsonp('http://api.rottentomatoes.com/')
      .then((response) => {
          this.$Progress.finish()
          console.log(response)
      }, (response) => {
          this.$Progress.fail()
      })
    }
  }
}
</script>

<style>

</style>
