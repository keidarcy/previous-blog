<template>
	<v-app>
		<v-card class="mx-auto mt-12">
			<v-img
				class="white--text align-end"
				height="400px"
				src="https://images.unsplash.com/photo-1508970057347-0524a45ebdff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
			>
				<v-card-title class="is-capitalized purple--text">start an adventure</v-card-title>
			</v-img>
			<v-card-text class="text--primary">
				<v-form
					ref="form"
					@submit.prevent="login"
				>
					<input
						type="hidden"
						name="_token"
						:value="csrf"
					>
					<v-text-field
						v-model="email"
						:counter="30"
						label="Potion"
						name="email"
						required
						color="purple accent-4"
						append-icon="mdi-fountain-pen-tip"
					></v-text-field>

					<v-text-field
						v-model="password"
						label="Ingredient"
						type="password"
						name="password"
						color="purple accent-4"
						required
						append-icon="mdi-electron-framework"
					></v-text-field>
					<v-card-actions class="justify-center">
						<v-btn
							color="purple accent-4"
							class="mr-4"
							outlined
							type="submit"
							autocomplete="current-password"
						>
							Explore
						</v-btn>
					</v-card-actions>
				</v-form>
			</v-card-text>
		</v-card>
	</v-app>
</template>

<script>
export default {
	data() {
		return {
			email: '',
			password: '',
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		};
	},
	methods: {
		login() {
			axios
				.post('/thisisxyyo/login', {
					email: this.email,
					password: this.password,
				})
				.then(response => console.log(response.data))
				.catch(error => console.log(error));
		},
	},
};
</script>
