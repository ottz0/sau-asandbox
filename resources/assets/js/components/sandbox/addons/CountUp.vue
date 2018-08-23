<template>

    <div class="iCountUp">
        <i-count-up
                            :start="0"
                            :end="10"
                            :decimals="0"
                            :duration="4.5"
                            :options="options"
                            :callback="callback"
                            >
        </i-count-up>
    </div>
  
</template>

<script>
import ICountUp from 'vue-countup-v2';
export default {
    components: {
      ICountUp
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
            }
        }
    },
    methods: {
        callback(ins) {
            ins.update(ins.endVal + 100); 
        }
    }
}
</script>

<style lang="scss" scoped>
  .iCountUp {
    font-size: 12em;
    margin: 0;
    color: #0769ba;
  }
</style>
