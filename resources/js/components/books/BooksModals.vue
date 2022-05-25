<template>
  <div>
    <md-dialog :md-active.sync="modals.store">
      <md-dialog-title>Создание новой книги</md-dialog-title>
      <form class="md-layout">
        <md-card class="md-layout-item md-size-100 md-small-size-100">
          <md-card-content>
            <md-field>
              <label for="name">Название книги</label>
              <md-input name="name"
                        v-model="entity.name"
              >
              </md-input>
            </md-field>
            <md-field>
              <label for="author_id">Автор книги</label>
              <select
                  v-model="entity.author_id"
                  name="author_id"
                  id="author_id">
                  <option v-for="author in authors"
                          :value="author.id"
                          :key="author.id">
                    {{ author.name }}
                  </option>
              </select>
            </md-field>
          </md-card-content>
        </md-card>
      </form>
      <md-dialog-actions>
        <md-button class="md-primary"
                   @click="modalHide('store')">
          Отмена
        </md-button>
        <md-button class="md-primary"
                   @click="submit('store')">
          Добавить автора
        </md-button>
      </md-dialog-actions>
    </md-dialog>
    <md-dialog :md-active.sync="modals.edit">
      <md-dialog-title>
        Редактирование книги
        <span class="md-body-2">{{ entity.name }}</span>
      </md-dialog-title>
      <form class="md-layout">
        <md-card class="md-layout-item md-size-100 md-small-size-100">
          <md-card-content>
            <md-field>
              <label for="name">Название книги {{ entity.name }}</label>
              <md-input name="name"
                        v-model="entity.name"
              >
              </md-input>
            </md-field>
            <md-field>
              <label for="author_id">Автор книги {{ entity.author_name }}</label>
              <select
                  v-model="entity.author_id"
                  name="author_id"
                  id="author_id">
                <option v-for="author in authors"
                        :value="author.id"
                        :key="author.id"
                >
                  {{ author.name }}
                </option>
              </select>
            </md-field>
          </md-card-content>
        </md-card>
      </form>
      <md-dialog-actions>
        <md-button class="md-primary"
                   @click="modalHide('edit')">
          Отмена
        </md-button>
        <md-button class="md-primary"
                   @click="submit('edit')">
          Сохранить изменения
        </md-button>
      </md-dialog-actions>
    </md-dialog>
    <md-dialog :md-active.sync="modals.delete">
      <md-dialog-title>
        Вы действительно хотите удалить
        <span class="md-body-2">{{ entity.name }}</span>
        ?
      </md-dialog-title>
      <md-dialog-actions>
        <md-button class="md-primary"
                   @click="modalHide('delete')">
          Отмена
        </md-button>
        <md-button class="md-primary"
                   @click="submit('delete')">
          Да, удалить
        </md-button>
      </md-dialog-actions>
    </md-dialog>
  </div>

</template>
<script>
import {mapActions, mapGetters} from "vuex";

export default {
  props: {
    modals: {
      type: Object
    },
    entity: {
      type: Object
    }
  },
  async mounted() {
    await this.loadAuthors();
  },
  methods: {
    ...mapActions({loadAuthors: 'Authors/loadAuthors'}),
    modalShow(modalId)
    {
      this.$parent.modalShow(modalId);
    },
    modalHide(modalId)
    {
      this.$parent.modalHide(modalId);
    },
    submit(modalId)
    {
      this.$parent.submit(modalId);
    }
  },
  computed: {
    ...mapGetters({authors: 'Authors/getAuthors'})
  }
}
</script>
<style scoped>
select {
  width: 100%;
}
</style>
