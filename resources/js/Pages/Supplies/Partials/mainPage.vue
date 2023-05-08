<template>
  <v-col>
    <v-btn
      color="primary"
      :href="route('supplies.create')"
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
            number
          </th>
          <th class="text-left">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in items"
          :key="item.id"
        >
          <td>{{ item.id }}</td>
          <td>{{ item.number }}</td>
          <td>
            <v-btn class="mr-1" color="yellow" :href="route('supplies.edit', item.id)">Edit</v-btn>
            
            <v-btn color="red" @click="destroy(route('supplies.destroy', item.id))">Delete</v-btn>
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