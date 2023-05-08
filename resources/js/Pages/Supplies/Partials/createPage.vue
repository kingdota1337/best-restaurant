<template>
	<form @submit.prevent="submit">
		<div>
			<text-field
				class="mt-1 block w-full"
				label="Number"
				v-model="form.number"
				:error-messages="form.errors.number"
			/>
		</div>

		<div>
			<autocomplete
				class="mt-1 block w-full"
				label="Products"
				v-model="form.products"
				:items="selectsData.products"
				:error-messages="form.errors.products"
				multiple
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
					number: null,
					products: []
			}),
			selectsData: {
				products:[],
			}
		}
	},
	created() {
		if(this.$page['props']['model'])
		{
			this.form.number = this.$page['props']['model']['data']['number']
			this.form.products = this.$page['props']['model']['data']['products']
		}

		this.selectsData.products = this.$page['props']['data']['products']
		
	},
	methods: {
		submit() {
			if(this.$page['props']['model']) {
				this.form.put(route('supplies.update', route().params.supply), {})	
			} else {
				this.form.post(route('supplies.store'), {})	
			}
		}
	}
}
</script>
  