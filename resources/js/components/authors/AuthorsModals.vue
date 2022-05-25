<template>
  <div>
    <md-dialog :md-active.sync="modals.store">
      <md-dialog-title>Создание нового автора</md-dialog-title>
      <form class="md-layout">
        <md-card class="md-layout-item md-size-100 md-small-size-100">
          <md-card-content>
            <md-field>
              <label for="name">Имя автора</label>
              <md-input name="name"
                        v-model="entity.name"
              >
              </md-input>
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
        Редактирование автора
        <span class="md-body-2">{{ entity.name }}</span>
      </md-dialog-title>
      <form class="md-layout">
        <md-card class="md-layout-item md-size-100 md-small-size-100">
          <md-card-content>
            <md-field>
              <label for="name">Имя автора</label>
              <md-input name="name"
                        v-model="entity.name"
              >
              </md-input>
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
        Удаление автора
        <span class="md-body-2">{{ entity.name }}</span>
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
export default {
  props: {
    modals: {
      type: Object
    },
    entity: {
      type: Object
    }
  },
  methods: {
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
  }
}
</script>
