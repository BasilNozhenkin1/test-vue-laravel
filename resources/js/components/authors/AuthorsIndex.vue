<template>
  <div>
    <navbar/>
    <md-table v-model="authors">
      <md-table-toolbar>
        <h1 class="md-title">Авторы</h1>
      </md-table-toolbar>

      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Имя автора" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Количество книг" md-sort-by="author_name">{{ item.books_count }}</md-table-cell>
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
    await this.loadAuthors();
  },
  methods: {
    ...mapActions({loadAuthors: 'Authors/loadAuthors'})
  },
  computed: {
    ...mapGetters({authors: 'Authors/getAuthors'})
  }
}
</script>