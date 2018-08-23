<template>
	<div>
		<div class="row py-5">
			<div class="col">
				<h4>This is the component 5 parent</h4>
				<p>Your name is {{name}} {{reaction}} {{changeUsername}}</p>
				<button class="btn btn-primary" @click.prevent="updateUsername">Update Username</button>
				{{doubleCounter}}
				<!-- <button type="button" class="btn btn-primary" @click.prevent="changeName('Peter')">Change name</button> -->
				<hr>
			</div>
		</div>
		<dev-5-child :reaction="reaction" class="child"></dev-5-child>
		<hr>
		<another-counter class="child"></another-counter>
	</div>
</template>

<script>
import { mapGetters } from 'vuex';
import { mapMutations } from 'vuex';
import Dev5Child from '../dev/Dev5.child';
import AnotherCounter from '../dev/AnotherCounter';
export default {
	components:{
		'dev-5-child': Dev5Child,
		'another-counter': AnotherCounter
	},
	created(){
		//this.runSweetAlert();
	},
	data(){
		return {
			name: "steven",
			reaction: "my reaction"
		}
	},
	methods:{
		updateUsername(){
            this.$store.commit('updateUsername', 'Mary Smith'); 
		},
		runSweetAlert(){
			this.$swal({
				title: 'Submit email to run ajax request',
				input: 'email',
				showCancelButton: true,
				confirmButtonText: 'Submit',
				showLoaderOnConfirm: true,
				preConfirm: (email) => {
					return new Promise((resolve) => {
					setTimeout(() => {
						if (email === 'taken@example.com') {
						this.$swal.showValidationError(
							'This email is already taken.'
						)
						}
						resolve()
					}, 2000)
					})
				},
				allowOutsideClick: true
				}).then((result) => {
				if (result.value) {
					this.$swal({
					type: 'success',
					title: 'Ajax request finished!',
					html: 'Submitted email: ' + result.email
					})
				}
			})
		}
	},
	computed: { 
		...mapGetters([
			'changeUsername',
			'doubleCounter'
		]),
		ourOwn(){

		}
	}
}
</script>

<style>
	.child{
		padding-left:35px;
	}
</style>
