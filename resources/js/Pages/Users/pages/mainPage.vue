<template>
  <v-col>
    <v-btn
      color="primary"
    >
      Create
    </v-btn>

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
            email
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in users"
          :key="item.name"
        >
          <td>{{ item.id }}</td>
          <td>{{ item.email }}</td>
        </tr>
      </tbody>
    </v-table>
  </v-col>
</template>

<script>

export default {
  data () {
    return {
      users: [],
    }
  },
  created() {
    this.users = this.$page['props']['items']
  }
}
</script>
