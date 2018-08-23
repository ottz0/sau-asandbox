<template>
	<div><p>This is the {{name}} {{counter}} {{userName}} {{changeUsername}}</p>

gfg
		<div class="iCountUp">
    <i-count-up
      :start="0"
      :end="1000"
      :decimals="0"
      :duration="4.5"
      :options="options"
    ></i-count-up>
  </div>


	</div>
</template>

<script>
import { mapGetters } from 'vuex';
import ICountUp from 'vue-countup-v2';
export default {
    components: {
      ICountUp
    },
	data(){
		return {
			name: "component 7",
			userName: this.$store.getters.changeUsername,
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
	created(){
		this.checkName();
	},
	methods:{
		checkName(){
			console.log('hi');
		},
		callback(ins) {
        ins.update(ins.endVal + 100);
      }
	},
	computed: {
		...mapGetters([
			'changeUsername'
		]),
		counter() {
			return this.$store.getters.doubleCounter * 100;
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
