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
    }
  },
  mutations: {
    setAuthors(state, authors) {
      state.authors = authors
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
