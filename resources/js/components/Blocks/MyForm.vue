<template>
	<v-app
		id="my-form"
		class="about-scene"
	>
		<v-row align="center">
			<v-col
				cols="12"
				md="6"
				offset-md="3"
			>
				<v-form
					ref="form"
					lazy-validation
				>
					<v-text-field
						:counter="10"
						label="Name"
						required
					></v-text-field>

					<v-text-field
						label="E-mail"
						required
					></v-text-field>

					<v-textarea
						class="pt-4"
						label="Your Message 😺"
						auto-grow
						outlined
						rows="4"
						row-height="25"
					></v-textarea>
					<v-row justify="center">
						<button class="my-button button">Send</button>
					</v-row>
				</v-form>
			</v-col>
		</v-row>
	</v-app>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
#my-form {
	background-image: linear-gradient(to top, #5ee7df 0%, #b490ca 100%);
}
.my-button {
	background-color: transparent;
	&:hover {
		background-color: #2ee59d;
	}
}
</style>
