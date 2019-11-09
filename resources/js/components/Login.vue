<template>
	<v-app>
		<v-card class="mx-auto">
			<v-img
				class="white--text align-end"
				height="400px"
				src="https://images.unsplash.com/photo-1508970057347-0524a45ebdff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
			>
				<v-card-title class="is-capitalized">start an adventure</v-card-title>
			</v-img>
			<v-card-text class="text--primary">
				<v-form
					ref="form"
					v-model="valid"
					lazy-validation
				>
					<v-text-field
						v-model="name"
						:counter="20"
						:rules="nameRules"
						label="Potion"
						required
					></v-text-field>

					<v-text-field
						v-model="email"
						:rules="emailRules"
						label="Ingredient"
						required
					></v-text-field>
					<v-card-actions class="justify-center">
						<v-btn
							color="success"
							class="mr-4"
							@click="validate"
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
export default {};
</script>
