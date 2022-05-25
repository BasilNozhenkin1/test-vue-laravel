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
    },
    createBook(ctx, book) {
      return new Promise((resolve, reject) => {
        axios
          .post('/api/v1/books/store', book)
          .then(response => {
            if (response.status === 201) {
              ctx.commit('addBook', response.data);
            }
            resolve(response)
          })
          .catch(error => reject(error.response.data.errors));
      })
    },
    updateBook(ctx, book) {
      return new Promise((resolve, reject) => {
        axios
          .patch(`/api/v1/books/${book.id}/update`, book)
          .then(response => resolve(response))
          .catch(error => reject(error.response.data.errors));
      })
    },
    deleteBook(ctx, book) {
      const index = ctx.state.books.findIndex(item => item.id === book.id);
      ctx.state.books.splice(index, 1);

      return new Promise((resolve, reject) => {
        axios
          .delete(`/api/v1/books/${book.id}/delete`, book)
          .then(response => resolve(response))
          .catch(error => reject(error.response.data.errors));
      })
    }
  },
  mutations: {
    setBooks(state, books) {
      state.books = books
    },
    addBook(state, book) {
      state.books.push(book);
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
