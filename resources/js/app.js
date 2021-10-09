require('./bootstrap');
//import Vue from 'vue';
import { createApp } from 'vue';
import App from './components/App.vue';
import MakeSchedule from './components/MakeSchedule.vue';

import VueSession from 'vue-session';
Vue.use(VueSession);

Vue.config.productionTip = false;

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

createApp(App).mount("#example");
createApp(MakeSchedule).mount("#MakeSchedule");

// window.Vue = require('vue');

// Vue.component('MakeShedule-form', require('./components/MakeSchedule.vue'));

// const app = new Vue({
//     el: '#app'
// });