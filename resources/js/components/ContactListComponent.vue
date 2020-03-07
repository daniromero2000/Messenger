<template>
  <div>
    <b-form>
      <b-form-input class="text-center" placeholder="Search..."></b-form-input>
    </b-form>
    <b-list-group>
            <contact-component v-for="conversation in conversations" :key="conversation.id" :conversation="conversation"></contact-component>

      <!-- <contact-component></contact-component>
      <contact-component></contact-component>
      <contact-component></contact-component> -->
    </b-list-group>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getConversations()
  },
  data() {
    return {
     conversations: [] 
    }
  },
  
  methods: {
    getConversations() {
      axios.get("/api/conversations").then(response => {
        console.log(response.data);
        this.conversations = response.data;
      });
    }
  }
};
</script>
