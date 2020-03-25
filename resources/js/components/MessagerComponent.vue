<template>
  <b-container fluid class="h-100">
    <b-row class="h-100">
      <b-col cols="4 pt-2">
        <b-form>
          <b-form-input
            type="text"
            v-model="querySearch"
            class="text-center"
            placeholder="Search..."
          ></b-form-input>
        </b-form>
        <contact-list-component
          v-on:conversationSelected="changeActiveCoversation($event)"
          :conversations="conversationFiltered"
        ></contact-list-component>
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
  data() {
    return {
      selectedConversation: null,
      conversations: [],
      querySearch: ""
    };
  },
  mounted() {
    this.getConversations();

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
  },
  methods: {
    changeStatus(user, status) {
      const index = this.conversations.findIndex(conversation => {
        return conversation.contact_id == user.id;
      });
      console.log(index);
      if (index >= 0) {
        this.$set(this.conversations[index], "online", status);
      }
    },
    changeActiveCoversation(conversation) {
      this.selectedConversation = conversation;
      this.getMessages();
    },
    getMessages() {
      axios
        .get("/api/messages?contact_id=" + this.selectedConversation.contact_id)
        .then(response => {
          // console.log(response.data);
          this.$store.state.messages = response.data;
        });
    },
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
        this.$store.state.messages.push(message);
      }
    },
    getConversations() {
      axios.get("/api/conversations").then(response => {
        // console.log(response.data);
        this.conversations = response.data;
      });
    }
  },
  computed: {
    // myImageUrl() {
    //   return "/users/" + this.user.image;
    // },
    conversationFiltered() {
      return this.conversations.filter(conversations => {
        return (
          !this.querySearch ||
          conversations.contact_name
            .toLowerCase()
            .indexOf(this.querySearch.toLowerCase()) > -1
        );
      });
    }
  }
};
</script>