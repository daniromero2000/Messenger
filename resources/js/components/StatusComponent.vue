<template>
    <b-img
     blank
      width="10"
      height="10"
      rounded="circle"
      :title="online ? 'Conectado' : 'Desconectado'"
      :blank-color="online ? 'green' : 'gray'"
      alt="Circle image"
    ></b-img>
</template>
<script>
export default {
  props: {
    online: Boolean
  },
  data() {
    return {};
  }
};
</script>