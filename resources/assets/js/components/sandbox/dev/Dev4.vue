<template>
	<div>
		<h4 @click="updateName()">this is my {{name}}</h4>
		<test-name-main :name="name" :checked="checked" @nameWasReset="name = $event" @termsChecked="checked = $event"></test-name-main>
    this is parent: {{checked}}
		<!-- <b-form-checkbox id="checkbox1"
                     	 v-model="checked"
                     	 value="agree">
      I accept the terms and use
      {{checked}}
    </b-form-checkbox> -->
		<button class="btn btn-success" :disabled="!checked">This the the main button</button>
	</div>
</template>
<script>
import testNameMain from './_testNameMain.vue';
export default {
    components: {
        'test-name-main':testNameMain
    },
    data() {
    	return {
    		name:'peter',
    		checked: false
    	}
    },
    methods: {
      updateName(){
        this.name = 'ricky';
        console.log('hi');
      }
    },
    computed:{
    }
}
</script>