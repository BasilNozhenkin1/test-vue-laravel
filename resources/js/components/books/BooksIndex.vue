<template>
  <div>
    <Navbar/>
    <BooksModals :modals="modals" :entity="entity"/>
    <md-table v-model="books">
      <md-table-toolbar>
        <h1 class="md-title">Книги</h1>
        <md-button @click="modalShow('store', {})"
                   class="md-primary">
          Добавить
        </md-button>
      </md-table-toolbar>

      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Название" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Автор" md-sort-by="author_name">{{ item.author_name }}</md-table-cell>
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
import BooksModals from "./BooksModals";


export default {
  data: () => ({
    modals: {
      store: false,
      edit: false,
      delete: false
    },
    entity: {
      id: 0,
      name: '',
      author_id: 0
    }
  }),
  components: {
    Navbar, BooksModals
  },
  async mounted() {
    await this.loadBooks();
  },
  methods: {
    ...mapActions({loadBooks: 'Books/loadBooks'}),
    ...mapActions({createBook: 'Books/createBook'}),
    ...mapActions({updateBook: 'Books/updateBook'}),
    ...mapActions({deleteBook: 'Books/deleteBook'}),

    modalShow(modalId, entity) {
      this.modals[modalId] = true;
      this.entity = entity;
    },
    modalHide(modalId) {
      this.modals[modalId] = false;
      this.entity = {
        id: 0,
        name: '',
        author_id: 0
      };
    },
    submit(modalId)
    {
      switch (modalId)
      {
        case 'store':
          this.createBook(this.entity);
          break;
        case 'edit':
          this.updateBook(this.entity);
          break;
        case 'delete':
          this.deleteBook(this.entity);
          break;
      }
      this.modalHide(modalId);
    }
  },
  computed: {
    ...mapGetters({books: 'Books/getBooks'})
  }
}
</script>