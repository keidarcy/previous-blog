<template>
	<div>
		<div v-if="!isLoggedIn">
			<v-fab-transition>
				<section
					v-show="isChatting"
					id="firebaseui-auth-container"
				></section>
			</v-fab-transition>

			<v-speed-dial
				v-model="isChatting"
				fixed
				:right="true"
				:bottom="true"
				color="pink"
				transition="slide-y-reverse-transition"
			>
				<v-btn
					fab
					dark
					small
					color="green"
				>
					<v-icon>mdi-pencil</v-icon>
				</v-btn>
				<v-btn
					fab
					dark
					small
				>
					<v-icon color="yellow">mdi-duck</v-icon>
				</v-btn>

				<template v-slot:activator>
					<v-fab-transition>
						<v-btn
							v-model="isChatting"
							color="pink darken-2"
							dark
							fab
							v-show="!hidden"
						>
							<v-icon v-if="isChatting">mdi-close</v-icon>
							<v-icon v-else>mdi-robot</v-icon>

						</v-btn>
					</v-fab-transition>
				</template>
			</v-speed-dial>
		</div>
		<div v-else>

			<v-speed-dial
				v-model="isChatting"
				fixed
				:right="true"
				:bottom="true"
				transition="slide-y-reverse-transition"
			>
				<v-btn
					color="info"
					@click="googleLogout"
				>
					Logout
				</v-btn>

				<template v-slot:activator>
					{{ user.displayName }}
					<v-btn
						v-model="isChatting"
						color="purple darken-2"
						dark
						fab
					>
						<v-avatar>
							<img
								:src="user.photoURL"
								:alt="user.displayName"
							>
						</v-avatar>

					</v-btn>
				</template>
			</v-speed-dial>
		</div>
	</div>
</template>
<script>
import ChatCard from './ChatCard.vue';
import { db } from '../../app.js';
import firebase from 'firebase/app';
import 'firebase/auth';
import * as firebaseui from 'firebaseui';
import 'firebaseui/dist/firebaseui.css';
export default {
	data() {
		return {
			isLoggedIn: false,
			isChatting: false,
			test: false,
			hidden: true,
			scrolled: false,
			user: null,
			isLoggedIn: false,
		};
	},
	methods: {
		handleScroll() {
			this.isChatting ? '' : (this.hidden = window.scrollY < 50);
		},
		googleLogout() {
			firebase
				.auth()
				.signOut()
				.then(() => {
					this.isLoggedIn = false;
					this.user = null;
				})
				.catch(error => {
					console.log(error);
				});
		},
	},
	mounted() {
		window.addEventListener('scroll', this.handleScroll);
		firebase.auth().onAuthStateChanged(user => {
			if (user) {
				this.isLoggedIn = true;
				this.user = user;
				console.log(user);
			} else {
				this.isLoggedIn = false;
				this.user = null;
			}
		});
		var ui = new firebaseui.auth.AuthUI(firebase.auth());
		var uiConfig = {
			callbacks: {
				signInSuccessWithAuthResult: function(authResult, redirectUrl) {
					//trueにするとsignInSuccessUrlで定めた場所にリダイレクトされる
					//falseにするとページは遷移しない
					return true;
				},
				uiShown: function() {
					// ログイン画面が出たときに行う作業
				},
			},
			signInFlow: 'popup',
			signInSuccessUrl: '/lab/calendar',
			signInOptions: [
				firebase.auth.GoogleAuthProvider.PROVIDER_ID,
				firebase.auth.FacebookAuthProvider.PROVIDER_ID,
				firebase.auth.TwitterAuthProvider.PROVIDER_ID,
				firebase.auth.GithubAuthProvider.PROVIDER_ID,
				firebase.auth.EmailAuthProvider.PROVIDER_ID,
				firebase.auth.PhoneAuthProvider.PROVIDER_ID,
				firebaseui.auth.AnonymousAuthProvider.PROVIDER_ID,
			],
		};
		ui.start('#firebaseui-auth-container', uiConfig);
	},
};
</script>
<style lang="stylus" scoped>
#firebaseui-auth-container
	position fixed
	right 0%
	top 30%
</style>
