<template>
  <div class="row pt-5">
    <div class="col-md-8 offset-md-2">
        <form @submit.prevent="onSubmit">
            
            <div class="form-group">
                <input type="text" v-model="form.hotel_name" class="form-control">
            </div>

            <sau-field :config="hotel_nameConfig"></sau-field>
            <sau-field :config="hotel_descConfig"></sau-field>

            <button class="btn btn-success btn-lg btn-block" type="submit" :disabled="!canSubmit">Send Request</button>

        </form>
    </div>
</div>
</template>

<script>
import sauFormFunctions from '../helpers/forms/sauFormFunctions';
export default {
    mixins:[sauFormFunctions],
    props:['hotel'],
    created(){
        this.form = JSON.parse(this.hotel);
    },
    data(){
        return{
            inlineUrl: '/validation/check-validation',
            submitUrl: '/hotels',
            redirectUrl: '/hotels',
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
