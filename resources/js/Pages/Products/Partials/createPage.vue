<template>
	<form @submit.prevent="submit">
		<v-row>
			<v-col>
				<text-field
					class="mt-1 block w-full"
					label="Name"
					v-model="form.name"
					:error-messages="form.errors.name"
				/>
			</v-col>

			<v-col>
				<text-field
					type="number"
					class="mt-1 block w-full"
					label="Multiplicity"
					v-model="form.multiplicity"
					:error-messages="form.errors.multiplicity"
				/>    
			</v-col>
		</v-row>

		<v-row>
			<v-col class="d-flex justify-center">
				<color-input
					class="mt-1 block w-full"
					label="Color"
					v-model="form.color"
					:error-messages="form.errors.color"
					@change="validateForPredictSubtype"
				/>
			</v-col>

			<v-col class="mt-6">
				<slider
					label="Gasification"
					v-model="form.gasification"
					:error-messages="form.errors.gasification"
					@change="validateForPredictSubtype"
				/> 
			</v-col>
		</v-row>

		<v-row>
			<v-col>
				<text-field
					type="number"
					step="0.01"
					class="mt-1 block w-full"
					label="Sugar"
					v-model="form.sugar"
					:error-messages="form.errors.sugar"
					@change="validateForPredictSubtype"
				/>
			</v-col>

			<v-col>
				<text-field
					type="number"
					step="0.01"
					class="mt-1 block w-full"
					label="Calories"
					v-model="form.calories"
					:error-messages="form.errors.calories"
					@change="validateForPredictSubtype"
				/>
			</v-col>
		</v-row>

		<v-row>
			<v-col class="mt-4">
				<autocomplete
					v-model="form.type_id"
					:items="selectsData.types"
					label="Type"
					:error-messages="form.errors.type_id"
				/>
			</v-col>

			<v-col class="mt-4">
				<autocomplete
					v-model="form.sub_type_id"
					:items="selectsData.subTypes"
					label="Subtype"
					:error-messages="form.errors.sub_type_id"
				/>
			</v-col>
		</v-row>

		<div class="flex items-center justify-end mt-4 mb-2">
			<primary-button class="ml-4" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
				Save
			</primary-button>

		</div>
	</form>
</template>
  
<script>
import axios from 'axios'
import { useForm } from '@inertiajs/vue3';
import ColorInput from 'vue-color-input'
import Slider from '@/components/Slider.vue'
export default {
	components:{
		ColorInput,
		Slider
	},
	data () {
		return {
			form: useForm({
				name: null,
				type_id: null,
				sub_type_id: null,
				sugar: null,
				calories: null,
				color: null,
				multiplicity: null,
				gasification: null
			}),
			selectsData: {
				types:[],
				subTypes: [],
			}
		}
	},
	created() {
		if(this.$page['props']['model'])
		{
			this.form.name = this.$page['props']['model']['name']
			this.form.type_id = this.$page['props']['model']['type_id']
			this.form.sub_type_id = this.$page['props']['model']['sub_type_id']
			this.form.sugar = this.$page['props']['model']['sugar']
			this.form.calories = this.$page['props']['model']['calories']
			this.form.color = this.$page['props']['model']['color']
			this.form.multiplicity = this.$page['props']['model']['multiplicity']
			this.form.gasification = this.$page['props']['model']['gasification']
		}

		this.selectsData.types = this.$page['props']['data']['types']
		this.selectsData.subTypes = this.$page['props']['data']['subTypes']
		
	},
	methods: {
		submit() {
			if(this.$page['props']['model']) {
				this.form.put(route('products.update', route().params.product), {})	
			} else {
				this.form.post(route('products.store'), {})	
			}
		},
		validateForPredictSubtype() {
		if(this.sugar !== null && this.calories !== null && this.color !== null && this.multiplicity !== null) {
			this.predictSubtype()
		}
		
	},
		predictSubtype() {
			axios.post(route('products.predict-subtype'), this.form)
				.then(data => {
					this.form.sub_type_id = data.data.sub_type_id
				})
		}
	},
}
</script>

<style>
	.color-input.user .box {
		width: 100px;
		height: 100px;
		border-radius: 50px;
	}
	.color-input.user .box.active {
		background: #0f0f0f;
	}
	.color-input.user .box.active .inner {
		transform: scale(.9) rotate(90deg);
	}
	.color-input.user .box.disabled {}
	.color-input.user .picker-popup {}
	.color-input.user .slider {}
	.color-input.user .slider-pointer {}
	.color-input.user .saturation-pointer {}
	.color-input.user .picker-popup-enter-from,
	.color-input.user .picker-popup-leave-to {}
	.color-input.user .picker-popup-enter-active,
	.color-input.user .picker-popup-leave-active {}
</style>
  