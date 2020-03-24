<template>
  <div>
    <b-form>
      <b-form-input class="text-center" placeholder="Search..."></b-form-input>
    </b-form>
    <b-list-group>
      <contact-component
        v-for="conversation in conversations"
        :key="conversation.id"
        :conversation="conversation"
        @click.native="selectConversation(conversation)"
      ></contact-component>

      <!-- <contact-component></contact-component>
      <contact-component></contact-component>
      <contact-component></contact-component>-->
    </b-list-group>
  </div>
</template>

<script>
export default {
  props:{
conversations: Array
  },
   data() {
    return {
    };
  },
  methods: {
       selectConversation(conversation) {
      // console.log(conversation);
      this.$emit('conversationSelected', conversation);
    }
  }
};
</script>
