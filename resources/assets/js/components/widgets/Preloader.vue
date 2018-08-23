<template>
    <div class="loader-wrap">
        <div class="loader">Loading...</div>
    </div>
</template>

<script>
export default {
  props:['reaction'],
    data(){
    return{
      isLoaded: false,
      myCheck: 'nuffy'
    }
  },
  created() {
    this.loadPage();
  },
  methods:{
    loadPage(){
      let that = this;
      setTimeout(function(){
        that.isLoaded = true;
        that.$emit('abc', that.isLoaded);
      }, 1500);
    }
  }
}
</script>

<style land="scss">
      .loader-wrap{
    min-height:100%;
    width:100%;
    z-index: 6;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background-color: #fff; */
  }


.loader,
.loader:before,
.loader:after {
  border-radius: 50%;
  width: 1.7em;
  height: 1.7em;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation: load7 1.6s infinite ease-in-out;
  animation: load7 1.6s infinite ease-in-out;
  z-index: 15;
}
.loader {
  color:#c6c6c6;
  font-size: 10px;
  margin: 60px auto;
  position: relative;
  text-indent: -9999em;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
.loader:before,
.loader:after {
  content: '';
  position: absolute;
  top: -2px;
}
.loader:before {
  left: -2.5em;
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.loader:after {
  left: 2.5em;
}
@-webkit-keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}
@keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}
</style>
