<template>
  <b-form>
    <b-form-input type="text" v-model="querySearch" class="text-center" placeholder="Search..."></b-form-input>
  </b-form>
</template>
<script>
export default {
  computed: {
    querySearch: {
      get() {
        return this.$store.state.querySearch;
      },
      set(value) {
        this.$store.commit("newQuerySearch", value);
      }
    }
  }
};
</script>