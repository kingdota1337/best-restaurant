<script setup>
	import Layout from '@/index.vue'
	import createPage from './Partials/createPage.vue'
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
    <v-card-title>Product Edit</v-card-title>
    <create-page/>      
  </div>
</template>