require('./bootstrap');

window.Vue = require('vue').default;

import { MdButton, MdContent, MdTabs, MdTable } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

window.Vue.use(MdButton)
window.Vue.use(MdContent)
window.Vue.use(MdTabs)
window.Vue.use(MdTable)

import store from "./store";
import router from "./router";

const app = new Vue({
  store,
  router
}).$mount("#app");
