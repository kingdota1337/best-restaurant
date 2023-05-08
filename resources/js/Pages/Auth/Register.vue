<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    first_name: '',
    surname: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
  <guest-layout>
    <head title="Register" />

    <form @submit.prevent="submit">
      <div>
        <v-text-field
          class="mt-1 block w-full"
          label="Name"
          v-model="form.name"
          autofocus
          variant="solo"
          autocomplete="name"
          :error-messages="form.errors.name"
        />
      </div>

      <div class="mt-4">
        <v-text-field
          class="mt-1 block w-full"
          label="First Name"
          v-model="form.first_name"
          variant="solo"
          :error-messages="form.errors.first_name"
        />
      </div>

      <div class="mt-4">
        <v-text-field
          class="mt-1 block w-full"
          label="Surname"
          v-model="form.surname"
          variant="solo"
          :error-messages="form.errors.surname"
        />
      </div>

      <div class="mt-4">
        <text-field
          class="mt-1 block w-full"
          label="Email"
          v-model="form.email"
          :error-messages="form.errors.email"
        />
      </div>

      <div class="mt-4">
        <text-field
          id="password"
          type="password"
          class="mt-1 block w-full"
          label="Password"
          v-model="form.password"
          :error-messages="form.errors.password"
        />    
      </div>

      <div class="mt-4">
        <text-field
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          label="Password Confirmation"
          v-model="form.password_confirmation"
          :error-messages="form.errors.password_confirmation"
        /> 
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          :href="route('login')"
          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Already registered?
        </Link>

        <primary-button class="ml-4" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Register
        </primary-button>

      </div>
    </form>
  </guest-layout>
</template>
