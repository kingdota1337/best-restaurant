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
  <div class="mr-2 ml-2">
    <v-card-title>Users</v-card-title>
    <main-page/>
  </div>
</template>