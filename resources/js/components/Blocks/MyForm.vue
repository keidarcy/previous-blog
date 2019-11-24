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
				<v-container>
					<v-form
						ref="loginForm"
						@submit.prevent="contactSubmit"
						v-model="valid"
						lazy-validation
						data-aos="fade-down"
						data-aos-duration="1000"
						data-aos-once="true"
					>
						<input
							type="hidden"
							name="_token"
							:value="csrf"
						>
						<v-text-field
							v-model="name"
							:counter="10"
							label="Name"
							required
							:rules="nameRules"
							color="cyan accent-3"
						></v-text-field>

						<v-text-field
							v-model="email"
							label="E-mail"
							required
							:rules="emailRules"
							color="cyan accent-3"
						></v-text-field>

						<v-textarea
							v-model="message"
							class="pt-4"
							label="Your Message 😺"
							auto-grow
							outlined
							rows="4"
							row-height="25"
							required
							:rules="messageRules"
							color="cyan accent-3"
							append-icon="mdi-fountain-pen-tip"
						></v-textarea>
						<v-row justify="center">
							<button class="my-button button">Send</button>
						</v-row>
					</v-form>
				</v-container>
			</v-col>
		</v-row>
	</v-app>
</template>

<script>
export default {
	data() {
		return {
			valid: true,
			email: '',
			emailRules: [
				v => !!v || 'No blank Email plz 🙀',
				v => /.+@.+\..+/.test(v) || 'Tell me a valide E-mail, that I can contact you 😉',
			],
			name: '',
			nameRules: [v => !!v || 'Tell me your name plz 😭'],
			message: '',
			messageRules: [v => !!v || 'Tell me comething plz'],
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		};
	},
	methods: {
		contactSubmit() {
			if (this.$refs.loginForm.validate()) {
				const formData = new FormData();
				formData.append('name', this.name);
				formData.append('email', this.email);
				formData.append('message', this.message);
				axios
					.post('/api/message/create', formData)
					.then(res => {
						if (res.status === 200) {
							window.location.reload();
							this.$emit('sent', this.name);
							var elmnt = document.getElementById('thanks');
							elmnt.scrollIntoView();
						} else {
							console.log(res.status);
						}
					})
					.catch(error => console.log(error));
				//with vue router : router.go('/some_url.php')this.$router.push('Welcome')
			} else {
				console.log(99);
			}
		},
	},
};
</script>

<style lang="scss" scoped>
.my-button {
	background-color: transparent;
	&:hover {
		background-color: #2ee59d;
	}
}
#my-form {
	background-image: linear-gradient(to top, #5ee7df 0%, #9890e3 100%);
	&input {
		font-weight: 600 !important;
	}
}
</style>
