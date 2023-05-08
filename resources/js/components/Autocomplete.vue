<template>
  <v-autocomplete
    variant="solo"
    item-title="name"
    item-value="id"
    v-bind="$attrs" 
  />
</template>

<script>
  export default {
    inheritAttrs: false
  }
</script>