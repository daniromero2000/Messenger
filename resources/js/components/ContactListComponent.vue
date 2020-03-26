<template>
  <b-list-group>
    <contact-component
      v-for="conversation in conversationFiltered"
      :key="conversation.id"
      :conversation="conversation"
      :selected="isSelected(conversation)"
      @click.native="selectConversation(conversation)"
    ></contact-component>

    <!-- <contact-component></contact-component>
      <contact-component></contact-component>
    <contact-component></contact-component>-->
  </b-list-group>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    selectConversation(conversation) {
      // console.log(conversation);
      this.selectConversationId = conversation.id;
      // this.$emit("conversationSelected", conversation);
      this.$store.dispatch("getMessages", conversation);
    },
    isSelected(conversation) {
      if (this.selectedConversation) {
        return this.selectedConversation.id === conversation.id;
      }
      return false;
    }
  },
  computed: {
    selectedConversation() {
      return this.$store.state.selectedConversation;
    },
    conversationFiltered() {
      return this.$store.getters.conversationFiltered;
    }
  }
};
</script>
