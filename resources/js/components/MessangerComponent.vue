<template>
  <b-container fluid class="h-100">
    <b-row class="h-100">
      <b-col cols="4 pt-2">
        <contact-form-component></contact-form-component>

        <contact-list-component></contact-list-component>
      </b-col>
      <b-col cols="8">
        <!-- <active-conversation-component
          v-if="selectedConversation"
          :contact-id="selectedConversation.contact_id"
          :contact-name="selectedConversation.contact_name"
          :contact-image="selectedConversation.contact_image"
          :my-image="myImageUrl"
          :messages="messages"
          @messageCreated="addMessage($event)"
        ></active-conversation-component>-->
        <active-conversation-component
          v-if="selectedConversation"
          :contact-id="selectedConversation.contact_id"
          :contact-name="selectedConversation.contact_name"
          :contact-image="selectedConversation.contact_image"
          @messageCreated="addMessage($event)"
        ></active-conversation-component>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user: Object
  },
  mounted() {
    Echo.join("messenger")
      .here(users => {
        console.log("online", users);
        users.forEach(user => this.changeStatus(user, true));
      })
      .joining(user => this.changeStatus(user, true))

      .leaving(user => this.changeStatus(user, false));

    Echo.private("users." + this.user.id).listen("MessageSent", data => {
      console.log(this.user.id);
      const message = data.message;
      this.addMessage(message);
    });
    this.$store.dispatch("getConversations");
  },
  methods: {
    changeStatus(user, status) {
      const index = this.$store.state.conversations.findIndex(conversation => {
        return conversation.contact_id == user.id;
      });
      console.log(index);
      if (index >= 0) {
        this.$set(this.$store.state.conversations[index], "online", status);
      }
    },
    // changeActiveCoversation(conversation) {
    //   this.selectedConversation = conversation;
    //   this.getMessages();
    // },
    addMessage(message) {
      console.log(message);
      const conversation = this.conversations.find(conversation => {
        return (
          conversation.contact_id == message.from_id ||
          conversation.contact_id == message.to_id
        );
      });

      const author =
        this.user.id === message.from_id ? "Tu" : conversation.contact_name;

      conversation.last_message = author + " : " + message.content;
      conversation.last_time = message.created_at;

      if (
        this.selectedConversation.contact_id == message.to_id ||
        this.selectedConversation.contact_id == message.from_id
      ) {
        message.from_id = this.user.id == message.from_id;
        this.$store.commit("addNewMessage", message);

        // this.$store.state.messages.push(message);
      }
    }
  },
  computed: {
    selectedConversation() {
      return this.$store.state.selectedConversation;
    }
    // myImageUrl() {
    //   return "/users/" + this.user.image;
    // },
  }
};
</script>