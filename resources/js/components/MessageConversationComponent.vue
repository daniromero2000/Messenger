<template>
  <b-media class="mb-3" vertical-align="center" :right-align="alignTextRight">
    <template v-slot:aside>
      <b-img
        blank
        width="48"
        height="48"
        rounded="circle"
        blank-color="#777"
        class="mt-1"
        alt="Circle image"
      ></b-img>
    </template>
    <b-card>
      <p class="mb-0">
        <slot></slot>
      </p>
    </b-card>
  </b-media>
</template>

<script>
export default {
  props: {
    alignTextRight: Boolean
  },
  mounted() {
    console.log(this.alignTextRight);
  },
  data() {
    return {
      content: "abc"
    };
  }
};
</script>
