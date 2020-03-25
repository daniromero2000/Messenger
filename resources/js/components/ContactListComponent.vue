<template>
  <b-list-group>
    <contact-component
      v-for="conversation in conversations"
      :key="conversation.id"
      :conversation="conversation"
      :selected="selectConversationId === conversation.id"
      @click.native="selectConversation(conversation)"
    ></contact-component>

    <!-- <contact-component></contact-component>
      <contact-component></contact-component>
    <contact-component></contact-component>-->
  </b-list-group>
</template>

<script>
export default {
  props: {
    conversations: Array
  },
  data() {
    return {
      selectConversationId: null
    };
  },
  methods: {
    selectConversation(conversation) {
      // console.log(conversation);
      this.selectConversationId = conversation.id;
      this.$emit("conversationSelected", conversation);
    }
  }
};
</script>
