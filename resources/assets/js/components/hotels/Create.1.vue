<template>
  <div class="row pt-5">
    <div class="col-md-8 offset-md-2">
        <form @submit.prevent="formSubmit">
            <div class="form-group">
                <label for="hotel-name">Hotel Name</label>
                <input type="text" class="form-control" id="hotel-name" placeholder="" name="hotel_name" value="" v-model="form.hotel_name">
                <!-- Error block -->
                <div class="error-ul">
                    <ul class="sau-form-feedback is-invalid">
                        <li v-for="(error, index) in errorResponse.errors">
                            {{index}} | {{error}}
                        </li>
                    </ul>
                </div>
            </div>
            {{errorResponse}}
            <!-- / Error block -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="hotel_desc" value="" v-model="form.hotel_desc"></textarea></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
</template>

<script>
export default {
    props:['token'],
    data(){
        return{
            form:{
                hotel_name: '',
                hotel_desc: ''
            },
            errorResponse: {}
        }
    },
    methods:{
        formSubmit(){
            //return console.log(this.$data.form);
            axios.post('/hotels', this.$data.form)
                .then(response => alert('Success'))
                .catch(error => this.errorResponse = error.response.data)
        }
    }

}
</script>

<style>

</style>
