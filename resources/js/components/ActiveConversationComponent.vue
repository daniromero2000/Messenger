<template>
  <b-row class="pt-0 h-100" aling-h="center">
    <b-col cols="8" aling-self="center" class="d-none d-md-block">
      <b-card class="h-100 border-0 mt-1" header-tag="header" footer-tag="footer">
        <message-conversation-component
          v-for="message in messages"
          :key="message.id "
          :align-text-right="message.from_id"
        >{{message.content}}</message-conversation-component>

        <template v-slot:footer>
          <b-form @submit.prevent="storeMessage" autocomplete="off">
            <b-input-group>
              <b-form-input
                class="text-center"
                type="text"
                v-model="newMessage"
                placeholder="Enviar..."
              ></b-form-input>
              <b-input-group-append>
                <b-button size="sm" type="submit" variant="info">Enviar</b-button>
              </b-input-group-append>
            </b-input-group>
          </b-form>
        </template>
      </b-card>
    </b-col>
    <b-col cols="4" class="d-none d-md-block">
      <b-img
        blank
        width="48"
        height="48"
        rounded="circle"
        blank-color="#777"
        class="mt-1"
        alt="Circle image"
      ></b-img>
      <p>{{contactName }}</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciònes</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  props: {
    contactId: Number,
    contactName: String
  },
  data() {
    return {
      messages: [],
      newMessage: ""
    };
  },
  mounted() {
    this.getMessages();
  },
  methods: {
    getMessages() {
      axios.get("/api/messages?contact_id=" + this.contactId).then(response => {
        console.log(response.data);
        this.messages = response.data;
      });
    },
    storeMessage() {
      const params = {
        to_id: this.contactId,
        content: this.newMessage
      };
      axios.post("/api/messages", params).then(response => {
        console.log(response.data);
        (this.newMessage = ""), this.getMessages();
      });
    }
  },
  watch: {
    contactId(value) {
      this.getMessages();
    }
  }
};
</script>

