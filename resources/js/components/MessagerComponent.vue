<template>
  <b-container fluid class="h-100">
    <b-row class="h-100">
      <b-col cols="4 pt-2">
        <contact-list-component v-on:conversationSelected="changeActiveCoversation($event)"></contact-list-component>
      </b-col>
      <b-col cols="8">
        <active-conversation-component
          v-if="selectedConversation"
          :contact-id="selectedConversation.contact_id"
          :contact-name="selectedConversation.contact_name"
          :messages="messages"
          @messageCreated="addMessage($event)"
        ></active-conversation-component>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    userId: Number
  },
  data() {
    return {
      selectedConversation: null,
      messages: []
    };
  },
  mounted() {
    Echo.channel("user." + this.userId).listen("MessageSent", data => {
      console.log(this.userId);
      const message = data.message;
      this.addMessage(message);
    });
  },
  methods: {
    changeActiveCoversation(conversation) {
      this.selectedConversation = conversation;
      this.getMessages();
    },
    getMessages() {
      axios
        .get("/api/messages?contact_id=" + this.selectedConversation.contact_id)
        .then(response => {
          // console.log(response.data);
          this.messages = response.data;
        });
    },
    addMessage(message) {
      console.log(message);

      message.from_id = this.userId == message.from_id;
      this.messages.push(message);
    }
  }
};
</script>