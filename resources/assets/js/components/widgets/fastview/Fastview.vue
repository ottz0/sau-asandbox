<template>
  <div>
      
      <div class="row">
          <div class="col">
                <div class="sau-widget-btns" :class="{ active: isActive('weather') }" @click="setActive('weather')"></div>
                <div class="sau-widget-btns" :class="{ active: isActive('news') }" @click="setActive('news')"></div>
                <div class="sau-widget-btns" :class="{ active: isActive('events') }" @click="setActive('events')"></div>
                <div class="sau-widget-btns" :class="{ active: isActive('plans') }" @click="setActive('plans')"></div>
          </div>
      </div>

      <div class="row clearfix">
          <div class="col">
              <transition name="fade">
                <sau-widget-weather v-if="activeItem == 'weather'" :class="fadeIn"></sau-widget-weather>
                <sau-widget-news v-if="activeItem == 'news'" :class="fadeIn"></sau-widget-news>
                <sau-widget-events v-if="activeItem == 'events'" :class="fadeIn"></sau-widget-events>
                <sau-widget-plans v-if="activeItem == 'plans'" :class="fadeIn"></sau-widget-plans>
              </transition>
          </div>
      </div>



    </div>
</template>

<script>
import WidgetWeather from './_Weather';
import WidgetNews from './_News';
import WidgetEvents from './_Events';
import WidgetPlans from './_Plans';
export default {
    components:{
        'sau-widget-weather': WidgetWeather,
        'sau-widget-news': WidgetNews,
        'sau-widget-events': WidgetEvents,
        'sau-widget-plans': WidgetPlans
    },
    data(){
        return{
            activeItem: 'weather',
            fadeIn: false
        }
    },
    methods:{
        isActive(widgetType){
              return this.activeItem == widgetType;
        },
        setActive: function (menuItem) {
            this.activeItem = menuItem // no need for Vue.set()
            this.fadeIn = true;
            console.log(menuItem)
        }
    }
}
</script>

<style lang="scss" scoped>
    .bgc{
        background-color:aqua;
    }
    .sau-widget-btns{
        background-color: #E1E0E0;
        height:13px;
        width:13px;
        margin:5px;
        border-radius: 50%;
        cursor: pointer;
        float:left;
        &.active{
            background-color: #B7B7B7;
        }
    }
    .sau-clearfx{
        clear: both;
    }
    .fadein{
        -webkit-transition: opacity 2s ease-in;
        -moz-transition: opacity 2s ease-in;
        -o-transition: opacity 2s ease-in;
        -ms-transition: opacity 2s ease-in;
        transition: opacity 2s ease-in;
    }
    .fade-enter-active {
    transition: opacity .5s;
    }
    .fade-enter {
    opacity: 0;
    }
</style>
