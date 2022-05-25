import axios from "axios";

export default {
  namespaced: true,
  actions: {
    loadAuthors(ctx)
    {
      return new Promise((resolve, reject) => {
        axios
          .get('/api/v1/authors')
          .then(response => {
            if (response.status === 200) {
              ctx.commit('setAuthors', response.data)
            }
            resolve(response)
          })
          .catch(error => {
            reject(error.response.data.errors)
          });
      })
    },
    createAuthor(ctx, author) {
      return new Promise((resolve, reject) => {
        axios
          .post('/api/v1/authors/store', author)
          .then(response => {
            if (response.status === 201) {
              ctx.commit('addAuthor', response.data);
            }
            resolve(response)
          })
          .catch(error => reject(error.response.data.errors));
      })
    },
    updateAuthor(ctx, author) {
      return new Promise((resolve, reject) => {
        axios
          .patch(`/api/v1/authors/${author.id}/update`, author)
          .then(response => resolve(response))
          .catch(error => reject(error.response.data.errors));
      })
    },
    deleteAuthor(ctx, author) {
      const index = ctx.state.authors.findIndex(item => item.id === author.id);
      ctx.state.authors.splice(index, 1);

      return new Promise((resolve, reject) => {
        axios
          .delete(`/api/v1/authors/${author.id}/delete`, author)
          .then(response => resolve(response))
          .catch(error => reject(error.response.data.errors));
      })
    }
  },
  mutations: {
    setAuthors(state, authors) {
      state.authors = authors;
    },
    addAuthor(state, author) {
      author.books_count = 0;
      state.authors.push(author);
    }
  },
  state: {
    authors: []
  },
  getters: {
    getAuthors(state) {
      return state.authors
    }
  }
}
