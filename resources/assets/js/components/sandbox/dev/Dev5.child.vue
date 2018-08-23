<template>
	<div>
		<p>This is component 5 child vue {{reaction}}</p>

		<div>Change it back again <button @click="increment">Change</button></div>
		<p>Counter is {{counter}}</p>
	</div>
</template>

<script>
export default {
	props:['reaction'],
	data(){
		return{
			newRection: 'New Reaction' 
		}
	},
	created(){ 

	},
	methods:{
		onClickButton(event){
			//this.$emit('clicked', 'some value');
			this.$store.state.counter;
		},
		increment() {
			this.$store.state.counter++;
		}
	},
	computed:{
		counter(){
			return this.$store.getters.doubleCounter;
		}
	}
}
</script>

<style>

</style>
