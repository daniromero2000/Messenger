<template>
  <b-list-group-item :variant="variant">
    <b-row aling-h="center">
      <b-col cols="3" mb="3" class="text-center">
        <b-img
          blank
          width="48"
          height="48"
          rounded="circle"
          blank-color="#777"
          class="mt-1"
          alt="Circle image"
        ></b-img>
        <!-- <b-img
          blank
          :src="conversation.contac_image"
          width="48"
          height="48"
          rounded="circle"
          class="mt-1"
          alt="Circle image"
        ></b-img>-->
      </b-col>
      <b-col cols="6" aling-self="center" class="d-none d-md-block">
        <p class="mb-1">
          <status-component :online="conversation.online"></status-component>
          {{conversation.contact_name}}
        </p>
        <p class="text-muted small mb-1">{{conversation.last_message}}</p>
      </b-col>
      <b-col cols="3" class="d-none d-md-block">
        <p class="text-muted small">{{ lastTime}}</p>
      </b-col>
    </b-row>
  </b-list-group-item>
</template>

<script>
export default {
  props: {
    conversation: Object,
    selected: Boolean
  },
  data() {
    return {};
  },
  computed: {
    lastTime() {
      return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss")
        .locale("es")
        .fromNow();
    },
    variant() {
      return this.selected ? "secondary" : "";
    }
  },
  mounted() {
    // console.log("Component mounted.");
  }
};
</script>
