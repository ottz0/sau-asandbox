<template>
  <div class="row pt-5">
    <div class="col-md-8 offset-md-2">
         <div v-if="response.feedback" class="sau-form-message text-center">
            <b-alert variant="danger" show>Oops! We are unable to process your request. Please ensure all fields have been filled out appropriately.</b-alert>
        </div>
        <div v-else class="sau-form-message text-center">
            <b-alert variant="info" show>More Australian businesses choose us for their server hosting than any other provider.</b-alert>
        </div>
        
        <form @submit.prevent="onSubmit">
            <div class="form-group">
               
               <sau-field :config="hotel_nameConfig"></sau-field> 
               <sau-field :config="hotel_descConfig"></sau-field>
            
            </div>
            <!-- / Error block -->
            <div class="form-group">
                <button class="btn btn-success btn-lg btn-block" type="submit" :disabled="!canSubmit">Send Request</button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
import sauFormFunctions from '../helpers/forms/sauFormFunctions';
export default {
    mixins:[sauFormFunctions],
    props:['data'],
    created(){
        if(this.data) {
            this.updateUrl = '/hotels/' + JSON.parse(this.data).id;
        }
    },
    data(){
        return{
            inlineUrl: '/validation/check-validation',
            updateUrl: '',
            submitUrl: '/hotels',
            redirectUrl: '/hotels',
            excludes: {
                id: '',
                hotel_phone:'',
                created_at:'',
                updated_at:''
            },
            form: {
                hotel_name: '',
                hotel_desc: '',
            },
            hotel_nameConfig: {
                saufield : 'hotel_name',
                type: 'text',
                placeholder: '',
                hint: '',
                label: 'Hotel Name',
                required: true
            },
            hotel_descConfig: {
                saufield : 'hotel_desc',
                type: 'text',
                placeholder: '',
                hint: '',
                label: 'Hotel Description',
                required: true
            }
        }
    }
}
</script>

<style>

</style>
