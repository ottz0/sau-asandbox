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

      <!-- <div class="col-sm-3">
        <div class="mainbox-wrapper">
          <div class="mainbox">text</div>
          <div class="selectbox" v-on:click="mMenu" id="foo-2" ref="foo-2" tabindex="0" @blur="cMenu">select box</div>
          <div class="menu d-none">
            <ul>
              <li>this is a link</li>
              <li>this is a link</li>
              <li>this is a link</li>
              <li>this is a link</li>
              <li>this is a link</li>
            </ul>

          </div>
        </div>
      </div> -->
<div class="col-sm-3">
      <div class="select-wrapper">
        <div>Windows</div>
        <div @click="show = !show" @blur="cMenu" tabindex="0" class="dd">
           {{selectedVal}}
        </div>
        <transition name="slide-fade">
          <div v-if="show">
              <ul>
                <li v-for="item in items" @click="selectedItem(item.message)">{{item.message}}</li>
              </ul>
          </div>
        </transition>
      </div>
</div>
    
    
    
    </div>
  </div>
</template>


<script>
export default {
   data(){
      return{
        show: false,
        myVal: '',
        selectedVal:'Please Select',
        items:[
          { message: 'Foo' },
          { message: 'Bar' }  
        ]
      }
  },
  methods:{
  selectedItem(selectedItem){
    this.selectedVal = selectedItem;
  },
   cMenu(event){
      setTimeout(() => {
        this.show = false;
      }, 100);
    }
  }
}
</script>

<style>
.select-wrapper{
  border: 1px solid #f1f1f1;
}
.selectbox{
  background-color: green;
  outline: none;
}

.mainsec{
  border: 1px solid black;
  height:45px;
}

.dd{
  outline:none;
  cursor:pointer;
}


.slide-fade-enter-active {
  transition: all .2s ease;
}
.slide-fade-leave-active {
  transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}




</style>
