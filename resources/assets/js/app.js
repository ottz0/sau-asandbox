
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue';
import { store } from './store/store';
//import VeeValidate from 'vee-validate'; 




/*

    Tested Vue js adons

*/
import VueSweetAlert from 'vue-sweetalert'; //Good Working vue-sweetalert
import VueFlatpickr from 'vue-flatpickr'; //Check - Is not deprecated
import Scrollspy from 'vue2-scrollspy'; //Good Working -vue2-scrollspy
import VueScrollTo from "vue-scrollto";//Good - Not needed as can use vue2-scrollspy
import ICountUp from 'vue-countup-v2';
import VueProgressBar from 'vue-progressbar';



window.Vue = Vue; // Adds the vue into the window instance
Vue.use(BootstrapVue);
Vue.use(Scrollspy);
Vue.use(VueSweetAlert);
Vue.use(VueFlatpickr);
Vue.use(VueScrollTo);
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '10px'
});



//Vue.use(VeeValidate); 






/**
    Dev Page components
 */
Vue.component('dev', require('./components/sandbox/dev/Dev'));
Vue.component('dev5', require('./components/sandbox/dev/Dev5'));
Vue.component('dev6', require('./components/sandbox/dev/Dev6'));
Vue.component('dev7', require('./components/sandbox/dev/Dev7'));


 /**
   Load addon components
 */

Vue.component('scrollspy', require('./components/sandbox/addons/Scrollspy'));
Vue.component('scrollto', require('./components/sandbox/addons/Scrollto'));
Vue.component('ICountUp', require('./components/sandbox/addons/CountUp'));



Vue.component('sau-progress', require('./components/sandbox/addons/Progress'));


Vue.component('sau-fastview', require('./components/widgets/fastview/Fastview'));
Vue.component('sau-selects', require('./components/selects'));
Vue.component('sau-counters', require('./components/widgets/Counters'));

Vue.component('sau-preloader', require('./components/widgets/Preloader'));





Vue.component('sau-hotel-create', require('./components/hotels/Create'));
Vue.component('sau-hotel-edit', require('./components/hotels/Edit'));
Vue.component('sau-alert-button', require('./components/helpers/alerts/AlertButton'));
Vue.component('sau-alert-button-confirm', require('./components/helpers/alerts/AlertButtonConfirm'));
Vue.component('sau-alert', require('./components/helpers/alerts/Alert'));

Vue.component('sau-validation', require('./components/Validation'));
Vue.component('sau-field', require('./components/helpers/forms/SauInput'));
Vue.component('sau-error', require('./components/helpers/forms/SauError'));
Vue.component('sau-menu', require('./components/widgets/menu'));

const app = new Vue({
    el: '#sandbox-app',
    store
});
