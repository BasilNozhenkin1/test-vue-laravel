require('./bootstrap');

import vue from "vue";
window.Vue = vue;

import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

window.Vue.use(VueMaterial);

import store from "./store";
import router from "./router";

const app = new Vue({
  store,
  router
}).$mount("#app");
