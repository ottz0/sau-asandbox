<template>
<div>
        <div class="d-flex flex-row">
            <div class="sau-menu">
                <button class="dropbtn">Small  this sis the file <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                <div class="sau-menu-content">
                    <a href="#">Link 1 long link</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    <div class="sep"></div>
                    <a href="#">Link 1 long link</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                     <div class="sep"></div>
                    <a href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Link 1 long links</a>
                </div>
            </div>

             <div class="sau-menu">
                <button class="dropbtn">Long Menu item</button>
                <div class="sau-menu-content">
                    <a href="#">Link 1 long links</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link</a>
                </div>
            </div>

            <div class="sau-menu">
                <button class="dropbtn">a really long Long Menu item</button>
                <div class="sau-menu-content">
                    <a href="#">Link 1 long link</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            //sauMenu:false
        }
    },
    methods:{
    //     myFunc(){
    //         console.log('hit');
    //         this.sauMenu = !this.sauMenu;
    //     }
    }
}
</script>

<style lang="scss">
</style>
