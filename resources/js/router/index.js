import Vue from "vue";
import VueRouter from "vue-router";


Vue.use(VueRouter);


import MainIndex from '../components/main/Index.vue';
import BooksIndex from '../components/books/BooksIndex.vue';
import AuthorsIndex from '../components/authors/AuthorsIndex.vue';

const routes = [
  {
    path: '/',
    name: 'main',
    component: MainIndex
  },
  {
    path: '/books',
    name: 'books.index',
    component: BooksIndex
  },
  {
    path: '/authors',
    name: 'authors.index',
    component: AuthorsIndex
  }
];

const router = new VueRouter({
  mode: 'history',
  routes,
  scrollBehavior: function(to, from, savedPosition) {
    return { x: 0, y: 0 }
  },
});

export default router;