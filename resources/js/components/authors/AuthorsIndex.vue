<template>
  <div>
    <Navbar/>
    <AuthorsModals :modals="modals" :entity="entity"/>
    <md-table v-model="authors">
      <md-table-toolbar>
        <h1 class="md-title">Авторы</h1>
        <md-button @click="modalShow('store', {})"
                   class="md-primary">
          Добавить
        </md-button>
      </md-table-toolbar>

      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Имя автора" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Количество книг" md-sort-by="author_name">{{ item.books_count }}</md-table-cell>
        <md-table-cell md-label="Действия">
          <md-button @click="modalShow('edit', item)"
                     class="md-primary">
            Редактировать
          </md-button>
          <md-button @click="modalShow('delete', item)"
              class="md-accent">Удалить</md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import Navbar from "../common/navbar";
import AuthorsModals from "./AuthorsModals";

export default {
  data: () => ({
    modals: {
      store: false,
      edit: false,
      delete: false
    },
    entity: {
      id: 0,
      name: ''
    }
  }),
  components: {
    Navbar, AuthorsModals
  },
  async mounted() {
    await this.loadAuthors();
  },
  methods: {
    ...mapActions({loadAuthors: 'Authors/loadAuthors'}),
    ...mapActions({createAuthor: 'Authors/createAuthor'}),
    ...mapActions({updateAuthor: 'Authors/updateAuthor'}),
    ...mapActions({deleteAuthor: 'Authors/deleteAuthor'}),

    modalShow(modalId, entity) {
      this.modals[modalId] = true;
      this.entity = entity;
    },
    modalHide(modalId) {
      this.modals[modalId] = false;
      this.entity = {
        'id': 0,
        'name': ''
      };
    },
    submit(modalId)
    {
      switch (modalId)
      {
        case 'store':
          this.createAuthor(this.entity);
          break;
        case 'edit':
          this.updateAuthor(this.entity);
          break;
        case 'delete':
          this.deleteAuthor(this.entity);
          break;
      }
      this.modalHide(modalId);
    }
  },
  computed: {
    ...mapGetters({authors: 'Authors/getAuthors'})
  }

}
</script>