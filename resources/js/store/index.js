import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);

import Authors from './modules/authors';
import Books from './modules/books';


export default new Vuex.Store({
  modules: {
    Authors,
    Books
  }
});