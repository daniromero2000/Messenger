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
    Echo.channel("example").listen("MessageSent", data => {
      const message = data.message;
      message.from_id = (this.userId == message.from_id);
      console.log(this.userId);
      this.messages.push(data.message);
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
    }
  }
};
</script>