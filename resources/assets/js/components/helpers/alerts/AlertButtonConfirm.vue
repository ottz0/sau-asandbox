<template>
    <div>
        <button :class="delBtnClass" @click.prevent="sweetAlert">{{delBtnTxt}}</button>
      <br />{{delSwalUrl}}<br />
    </div>
</template>

<script>
export default {
  props:[
    'delBtnTxt', 
    'delBtnClass',
    'delSwalUrl',
    'delSwalTitle',
    'delSwalText',
    'delSwalRespTitle',
    'delSwalRespType',
    'delSwalRespText',
    'delSwalRedirUrl'
  ],
  data(){
    return{}

  },
  methods:{
    sweetAlert() {

      let that = this;

      this.$swal({
              title: that.delSwalTitle,
              text: that.delSwalText, 
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Confirm',
              cancelButtonText: 'Cancel',
              showLoaderOnConfirm: true,
              preConfirm: function () {
                return new Promise(function (resolve, reject) {
                  axios.delete(that.delSwalUrl)
                      .then(function (response) {
                        resolve(response);
                    })
                    .catch(function (error) {
                        console.log('asdfa');
                        console.log(error);
                        that.$swal.close();
                    });
               })
              },
              allowOutsideClick: false
            }).then(function (response) {
                that.$swal({
                  title: that.delSwalRespTitle,
                  type: that.delSwalRespType,
                  html: that.delSwalRespText,
                  showCancelButton: false,
                  allowOutsideClick: true,
                  showConfirmButton: false,
                });
                 setTimeout(function(){
                    window.location.href = that.delSwalRedirUrl
                },1500);

            }).catch(that.$swal.noop);




      
    
    
    
    
    }
  }

}
</script>

<style>

</style>