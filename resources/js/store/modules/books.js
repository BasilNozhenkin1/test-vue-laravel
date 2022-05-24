import axios from "axios";

export default {
  namespaced: true,
  actions: {
    loadBooks(ctx)
    {
      return new Promise((resolve, reject) => {
        axios
          .get('/api/v1/books')
          .then(response => {
            if (response.status === 200) {
              ctx.commit('setBooks', response.data)
            }
            resolve(response)
          })
          .catch(error => {
            reject(error.response.data.errors)
          });
      })
    }
  },
  mutations: {
    setBooks(state, books) {
      state.books = books
    }
  },
  state: {
    books: []
  },
  getters: {
    getBooks(state) {
      return state.books
    }
  }
}
