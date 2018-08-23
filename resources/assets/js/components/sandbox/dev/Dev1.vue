<template>
	<div>
		<div class="row pt-5">
			<div class="col-lg-6 mx-auto">
				

				<div v-show="sauForm">
					<form @submit.prevent="onSubmit">
						<div class="form-group">
							<label>Username</label>
							
							<div class="sau-input-ico">
							    <i class="sau-input-ico-fa fa" :class="{'fa-check sau-t-green': fields.user.valid, 'fa-times sau-t-red': errors.has('user')}" aria-hidden="true"></i>
								<input type="text" 
								       name="user"
								       v-model="userConfig.username"
								       v-validate="'required|alpha'"
								       class="form-control"
								       :class="{
			                            'is-valid': !fields.user.pristine && fields.user.valid, 
			                            'is-invalid': errors.has('user') 
			                           }">
		                    </div>
							<div class="error-ul">
								<ul v-for="message in formErrors.errors" class="sau-form-feedback error">
									<li>
										{{message}}
									</li>
								</ul>
		                    </div>
		                    
		                    <div v-show="errors.has('user') || formErrors.errors" class="sau-form-feedback error">{{ errors.first('user') }}</div>
						</div>

						<div v-if="formErrorMessage">
							<b-alert show variant="danger" class="text-center">{{formErrors.data.message}}</b-alert>
							
						</div>

						<div v-if="formIsSending">
							<button class="btn btn-primary btn-lg btn-block" type="submit" :disabled="btnDisabled">
								<i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>
								Sending Request..Please wait
							</button>
						</div>
						<div v-else>
							<button class="btn btn-primary btn-lg btn-block" type="submit" :disabled="btnDisabled">Send Request</button>
						</div>
					</form>
				</div>

				<div v-show="!sauForm">
					This is success cool as
				</div>




			</div>
		</div>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				userConfig:{
					username:'',
					email:''
				},
				formErrors:[],
				formIsSending:false,
				formErrorValidCheck:null,
				formErrorMessage:null,
				formHasError:false,
				sauForm:true

			}
		},
		methods:{
			onSubmit() {
				this.formIsSending = true;
				axios.post('/steve', this.userConfig)
					.then((response) => {
						this.formIsSending = false;				
						if(response.data.formErrorCheck){
							this.formIsSending = false;
							this.formErrorValidCheck = response.data.response.validCheck.valid;
							this.formErrors = response.data;
							this.formErrorMessage = response.data.data.message;
						}else{
							this.sauForm = false;
						}
					})
					.catch((err) => {
						console.log(err)
					})
				}
			},
	    computed:{
	    	btnDisabled(){
	            if(this.fields.user.valid){
	                return false;
	            }else{
	                return true;
	            }
	        }
		}
	}
</script>
<style lang="scss">
	.error-ul ul{
		padding:0;
		margin:0;
		li{
			list-style-type: none;
		}
		
	}
</style>



