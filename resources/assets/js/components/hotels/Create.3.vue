<template>
  <div class="row pt-5">
    <div class="col-md-8 offset-md-2">
        <form @submit.prevent="formSubmit">
            <div class="form-group">
               
               
               
               
               
                <sau-input saufield="hotel_name" type="text">
                    <label slot="label">Hotel Name</label>
                </sau-input>
            
            
            
            
            </div>
            <!-- / Error block -->
            <div class="form-group">
                <sau-input saufield="hotel_desc" type="textarea">
                    <div slot="after">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be 8-20 characters long, contain letters and numbers,
                        </small>
                    </div>
                    <label slot="label">Hotel Description</label>
                </sau-input>
            </div>
            <button class="btn btn-primary" type="submit" :disabled="!canSubmitForm">Create</button>
        </form>
    </div>
</div>
</template>

<script>
export default {
    props:['token'],
    data(){
        return{
            url: '/validation/check-validation',
            classes:{},
            response:{
                errors:{},
                feedback: false
            },
            form:{
                hotel_name: '',
                hotel_desc: ''
            },
            errorResponse: {}
        }
    },
    methods:{
        formSubmit(){
            let that = this;
            axios.post('/hotels', this.$data.form)
            .then(function (response) {
                that.$swal({
                    type: 'success',
                    title: 'Hotel has been added',
                    showConfirmButton: false,
                });
                setTimeout(function(){
                    window.location.href = '/hotels'
                },1500);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    },

    computed:{
        canSubmitForm(){
            return this.form.hotel_name && this.form.hotel_desc
        }
    }
}
</script>

<style>

</style>
