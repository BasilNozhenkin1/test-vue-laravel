<template>
  <div>
    <navbar/>
    <md-table v-model="books">
      <md-table-toolbar>
        <h1 class="md-title">Книги</h1>
      </md-table-toolbar>

      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Название" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Автор" md-sort-by="author_name">{{ item.author_name }}</md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import navbar from "../common/navbar";

export default {
  components: {
    navbar
  },
  async mounted() {
    await this.loadBooks();
  },
  methods: {
    ...mapActions({loadBooks: 'Books/loadBooks'})
  },
  computed: {
    ...mapGetters({books: 'Books/getBooks'})
  }
}
</script>