<template>
  <div>
    {{message}}
      <button>Hello World</button>

  </div>

</template>
<script>
const default_layout = "default";


export default {
  computed: {},
  data() {
      return {
          message:'HelloWOrld'
      }
  }
};
</script>