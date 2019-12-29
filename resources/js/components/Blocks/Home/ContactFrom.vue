<template>
	<div id="contact">

		<v-row>
			<v-col
				cols="12"
				md="6"
			>
				<v-container class="ma-12 pt-md-12">
					<v-form
						ref="loginForm"
						@submit.prevent="contactSubmit"
						v-model="valid"
						lazy-validation
						data-aos="zoom-in-up"
						data-aos-duration="2000"
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
						<div class="text-center">
							<button class="my-button button">Send</button>
						</div>
					</v-form>
					<div
						class="display-1 pt-12 text-right"
						data-aos="zoom-in-up"
						data-aos-duration="2000"
					>glad to hear any voice from you 😉
					</div>
				</v-container>
			</v-col>
			<v-col md="6">

				<v-container class="ma-12">
					<contact-svg />
				</v-container>
				<left-arrow-contact />
			</v-col>
		</v-row>

	</div>
</template>

<script>
import LeftArrowContact from './LeftArrowContact.vue';
import ContactSvg from './ContactSvg.vue';
export default {
	components: { ContactSvg, LeftArrowContact },
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
							// this.$emit('sent', this.name);
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
.row {
	margin-right: unset !important;
}
#contact {
	background-image: linear-gradient(to top, #5ee7df 0%, #65afe0 100%);
	min-height: 100vh;
}
.display-1 {
	font-family: unset !important;
	@media screen and (max-width: 600px) {
		font-size: 1rem !important;
	}
}
</style>
