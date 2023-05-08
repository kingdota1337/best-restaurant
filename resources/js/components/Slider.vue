<template>
  <div>
    <v-slider
      v-bind="$attrs" 
      :thumb-size="36"
      thumb-label="always"
    />
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
}
</script>