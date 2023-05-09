<template>
  <v-col>
    <v-btn
      color="primary"
      :href="route('users.create')"
    >
      Create
    </v-btn>    

    <v-table density="compact">
      <thead>
        <tr>
          <th class="text-left">
            Id
          </th>
          <th class="text-left">
            Email
          </th>
          <th class="text-left">
            First Name
          </th>
          <th class="text-left">
            Surname
          </th>
          <th class="text-left">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in items"
          :key="item.name"
        >
          <td>{{ item.id }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.first_name }}</td>
          <td>{{ item.surname }}</td>
          <td>
            <v-btn class="mr-1" color="yellow" :href="route('users.edit', item.id)">Edit</v-btn>
            
            <v-btn color="red" @click="destroy(route('users.destroy', item.id))">Delete</v-btn>
          </td>
        </tr>
      </tbody>
    </v-table>
  </v-col>
</template>

<script >
import { indexPageMixin } from "@/Mixins/indexPage.js";
export default {
  mixins: [indexPageMixin]
}
</script>




