<template>
  <v-col>
    <v-text-field
      label="test"
      variant="solo"
    />

    <v-table density="compact">
      <thead>
        <tr>
          <th class="text-left">
            id
          </th>
          <th class="text-left">
            name
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in supplies"
          :key="item.id"
        >
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
        </tr>
      </tbody>
    </v-table>
  </v-col>
  </template>
  
  <script>
  
  export default {
    data () {
      return {
        supplies: []
      }
    },
    created() {
      this.supplies = this.$page['props']['items']
    }
  }
  </script>
  