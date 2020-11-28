require('./bootstrap');


window.Vue = require('vue');
Vue.component('mainapp', require ('./components/mainapp.vue') .default);

import router from "./router.js";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import common from './common'
Vue.mixin(common)


const app = new Vue({
    el: '#app',
    router
})