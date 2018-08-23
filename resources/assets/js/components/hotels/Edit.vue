<template>
  <div class="row pt-5">
    <div class="col-md-8 offset-md-2">
        <form @submit.prevent="formSubmit">
            
            <div class="form-group">
                <input type="text" v-model="form.hotel_name" class="form-control">
            </div>

            <sau-field :config="hotel_nameConfig"></sau-field>
            <sau-field :config="hotel_descConfig"></sau-field>
            ffggggfgggfgfgfg
            {{data}}
            <button class="btn btn-success btn-lg btn-block" type="submit" :disabled="!canSubmit">Send Requestffdf</button>

        </form>
    </div>
</div>
</template>

<script>
export default {
    props:['token', 'hotel', 'data'],
    created(){
        this.form = JSON.parse(this.hotel);
    },
    data(){
        return{}
    },
    methods:{
        formSubmit(){
            let that = this;
            axios.put('/hotels/'+this.form.id, this.$data.form)
            .then(function (response) {
                that.$swal({
                    type: 'success',
                    title: 'Hotel Updated',
                    showConfirmButton: false,
                });
                setTimeout(function(){
                    window.location.href = '/hotels/'
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
