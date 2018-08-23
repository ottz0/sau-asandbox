<template>
  <div>
    <div class="row">
      
      <!-- <div class="col-sm-3">
        <div class="mainbox-wrapper">
          <div class="mainbox">text</div>
          <div class="selectbox" v-on:click="mMenu" id="foo-2" ref="foo-2" tabindex="0" @blur="cMenu">select box</div>
          <div class="menu d-none"><a href="http://www.google.com">select</a></div>
        </div>
      </div> -->

      <div class="col-sm-3">
        <div class="mainbox-wrapper">
          <div class="mainbox">text</div>
          <div class="selectbox" v-on:click="mMenu" id="foo-2" ref="foo-2" tabindex="0" @blur="cMenu">select box</div>
          <div class="menu d-none"><a href="http://www.google.com">select</a></div>
        </div>
      </div>
    
    
    
    </div>





  </div>
</template>


<script>
import At from 'vue-at'
import AtTa from 'vue-at/dist/vue-at-textarea'
export default {
  components: { At, AtTa },
   data(){
      return{
        isShow: false,
        show: false,
        myhide:'',
        fade:''
      }
  },
  methods:{
    mMenu(event){
      //this.fade = 'visible'
      //event.target.nextElementSibling.classList.toggle('visible');
      event.target.nextElementSibling.classList.toggle('d-none');
    },
   cMenu(event){
      setTimeout(() => {
        //this.fade='hidden'
        event.target.nextElementSibling.classList.add('d-none');
      }, 200);
    }
  }
}
</script>

<style>
.mainbox-wrapper{
  border: 1px solid #f1f1f1;
}
.selectbox{
  background-color: green;
  outline: none;
}
.menu{

}
.mainsec{
  border: 1px solid black;
  height:45px;
}
.mystyle{
  display:none;
}




</style>
