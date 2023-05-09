<template>
	<form @submit.prevent="submit" class="ml-2">
		<v-row>
			<v-col>
				<autocomplete
					class="mt-1 block w-full"
					label="Role"
					v-model="form.role_id"
					:items="selectsData.roles"
					:error-messages="form.errors.role_id"
				/>
			</v-col>
			<v-col>
				<v-text-field
					class="mt-1 block w-full"
					label="Name"
					v-model="form.name"
					autofocus
					variant="solo"
					autocomplete="name"
					:error-messages="form.errors.name"
				/>
			</v-col>
		</v-row>

		<v-row>
			<v-col>
				<v-text-field
					class="mt-1 block w-full"
					label="First Name"
					v-model="form.first_name"
					variant="solo"
					:error-messages="form.errors.first_name"
				/>
			</v-col>

			<v-col>
				<v-text-field
					class="mt-1 block w-full"
					label="Surname"
					v-model="form.surname"
					variant="solo"
					:error-messages="form.errors.surname"
				/>
			</v-col>
		</v-row>

		<div class="mt-4">
			<text-field
				class="mt-1 block w-full"
				label="Email"
				v-model="form.email"
				:error-messages="form.errors.email"
			/>
		</div>

		<v-row>
			<v-col>
				<text-field
					id="password"
					type="password"
					class="mt-1 block w-full"
					label="Password"
					v-model="form.password"
					:error-messages="form.errors.password"
				/>    
			</v-col>

			<v-col>
				<text-field
					id="password_confirmation"
					type="password"
					class="mt-1 block w-full"
					label="Password Confirmation"
					v-model="form.password_confirmation"
					:error-messages="form.errors.password_confirmation"
				/> 
			</v-col>
		</v-row>

		<div class="flex items-center justify-end mt-4">
			<primary-button class="ml-4 mb-3" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
					role_id: null,
					name: null,
					first_name: null,
					surname: null,
					email: null,
					password: null,
					password_confirmation: null,
			}),
			selectsData: {
				roles:[],
			}
		}
	},
	created() {
		if(this.$page['props']['model'])
		{
			this.form.name = this.$page['props']['model']['data']['name']
			this.form.first_name = this.$page['props']['model']['data']['first_name']
			this.form.surname = this.$page['props']['model']['data']['surname']
			this.form.email = this.$page['props']['model']['data']['email']
			this.form.password = this.$page['props']['model']['data']['password']
			this.form.password_confirmation = this.$page['props']['model']['data']['password_confirmation']
			this.form.role_id = this.$page['props']['model']['data']['role_id']
		}

		this.selectsData.roles = this.$page['props']['data']['roles']
		
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
  