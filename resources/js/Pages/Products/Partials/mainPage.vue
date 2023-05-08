<template>
  <v-col>
    <v-btn
      color="primary"
      :href="route('products.create')"
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
            Name
          </th>
          <th class="text-left">
            Sugar
          </th>
          <th class="text-left">
            Calories
          </th>
          <th class="text-left">
            Color
          </th>
          <th class="text-left">
            Gasification
          </th>
          <th class="text-left">
            Multiplicity
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
          <td>{{ item.name }}</td>
          <td>{{ item.sugar }}</td>
          <td>{{ item.calories }}</td>
          <td>
            <color-input
              class="mt-1 block w-full"
              label="Color"
              v-model="item.color"
              disabled
            />
          </td>
          <td>{{ item.gasification }}</td>
          <td>{{ item.multiplicity }}</td>
          <td>
            <v-btn class="mr-1" color="yellow" :href="route('products.edit', item.id)">Edit</v-btn>
            
            <v-btn color="red" @click="destroy(route('products.destroy', item.id))">Delete</v-btn>
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
<script setup>
  import ColorInput from 'vue-color-input'
</script>