<template>
  <div>

    <i-count-up
        :start="0"
        :end="120"
        :decimals="0"
        :duration="4.5"
        :options="options" 
    ></i-count-up>
    <br /><br /><br /><br />

    <vue-circle
        :progress="100"
        :size="200"
        :reverse="false"
        line-cap="butt"
        :fill="fill"
        empty-fill="rgba(0, 0, 0, .1)"
        :animation="animation"
        :animation-start-value="0.0"
        :start-angle="0"
        insert-mode="append"
        :thickness="15"
        :show-percent="false"
        @vue-circle-progress="progress"
        @vue-circle-end="progress_end">
          <p>
              <i-count-up
                :start="0"
                :end="120"
                :decimals="0"
                :duration="4"
                :options="options" 
            ></i-count-up>
          </p>
      </vue-circle>

      <br /><br /><br /><br />

    <vue-circle
        :progress="count"
        :fill="fill"
        ref="myUniqueID"
        :size="200"
        :reverse="false"
        line-cap="butt"
        empty-fill="rgba(0, 0, 0, .1)"
        :animation="{ duration: 500, easing: 'circleProgressEasing' }"
        :animation-start-value="0.0"
        :start-angle="0"
        insert-mode="append"
        :thickness="15"
        :show-percent="true"
        v-model="count"
        @vue-circle-progress="progress"
        @vue-circle-end="progress_end">
          <p>
              Status
          </p>
      </vue-circle>

      <br /><br />

      <button class="btn btn-primary" @click.prevent="decrement">Remove Step</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" @click.prevent="increment">Add Step</button>
{{count}}
      <br /><br /><br /><br />
      

  </div>
</template>

<script>
import ICountUp from 'vue-countup-v2';
import VueCircle from 'vue2-circle-progress'
export default {
    components: {
      ICountUp,
      VueCircle
    },
    data(){
        return{
            options: {
                useEasing: true,
                useGrouping: true,
                separator: '',
                decimal: '',
                prefix: '',
                suffix: ''
            },
            animation:{ duration: 4000, easing: "circleProgressEasing" },
            fill:{ color: "#0769ba" },
            count: 0
        }
    },
    watch:{
        count(){
            return this.count;
        }
    },
    methods:{
        // updateProgress(){
        //     console.log('updated');
        // },
        progress(event,progress,stepValue){
            //console.log(stepValue);
        },
        progress_end(event){
            //console.log("Circle progress end");
        },
        increment(){
            if(this.count < 100){
                this.$refs.myUniqueID.updateProgress(this.count+=10);
            }
        },
        decrement(){
            if(this.count > 0){
                this.$refs.myUniqueID.updateProgress(this.count-=10);
            } 
        }
    }
}
</script>

<style scoped>
  .iCountUp {
    font-size: 12em;
    margin: 0;
    color: #0769ba;
  }
</style>
