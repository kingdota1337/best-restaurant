<template>
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
			<primary-button class="ml-4" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
				Save
			</primary-button>

		</div>
	</form>
</template>
  
<script>
import { useForm } from '@inertiajs/vue3';
export default {
	data () {
		return {
			form: useForm({
					name: '',
					first_name: '',
					surname: '',
					email: '',
					password: '',
					password_confirmation: '',
			})
		}
	},
	created() {
		if(this.$page['props']['model'])
		{
			this.form.name = this.$page['props']['model']['name']
			this.form.first_name = this.$page['props']['model']['first_name']
			this.form.surname = this.$page['props']['model']['surname']
			this.form.email = this.$page['props']['model']['email']
			this.form.password = this.$page['props']['model']['password']
			this.form.password_confirmation = this.$page['props']['model']['password_confirmation']
		}
		
	},
	methods: {
		submit() {
			if(this.$page['props']['model']) {
				this.form.put(route('users.update', route().params.user), {})	
			} else {
				this.form.post(route('users.store'), {})	
			}
		}
	}
}
</script>
  