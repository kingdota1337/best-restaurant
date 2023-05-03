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
            v-for="item in orders"
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
        orders: [],
      }
    },
    created() {
      this.orders = this.$page['props']['items']
    }
  }
  </script>
  