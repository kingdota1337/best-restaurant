<script setup>
  import mainPage from './Partials/mainPage.vue'
  import Layout from '@/index.vue'
</script>

<script>
  export default {
    // Using a render function...
    layout: (h, page) => h(Layout, [page]),

    // Using shorthand syntax...
    layout: Layout,
  }
</script>

<template>
  <main-page/>
</template>