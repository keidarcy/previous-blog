<template>
	<div>
		<div v-show="LoginButtonClicked">
			<div v-if="isLoggedIn">
				<span class="mx-2 subheading">hello {{ user.displayName }} !</span>

				<v-avatar>
					<img
						:src="user.photoURL"
						:alt="user.displayName"
					>
				</v-avatar>

				<v-btn
					color="info"
					@click="googleLogout"
				>
					Logout
				</v-btn>
			</div>

			<div v-else>
				<section id="firebaseui-auth-container"></section>
			</div>
		</div>
		<v-btn @click="LoginButtonClicked = !LoginButtonClicked">Login to chat</v-btn>

	</div>
</template>
<script>
import { db } from '../../../app.js';
import firebase from 'firebase/app';
import 'firebase/auth';
import * as firebaseui from 'firebaseui';
import 'firebaseui/dist/firebaseui.css';
export default {
	data() {
		return {
			newNote: '',
			isLoggedIn: false,
			user: null,
			LoginButtonClicked: false,
		};
	},
	mounted() {
		firebase.auth().onAuthStateChanged(user => {
			if (user) {
				this.isLoggedIn = true;
				this.user = user;
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
			signInSuccessUrl: '/',
			signInOptions: [
				firebase.auth.GoogleAuthProvider.PROVIDER_ID,
				//firebase.auth.FacebookAuthProvider.PROVIDER_ID,
				//firebase.auth.TwitterAuthProvider.PROVIDER_ID,
				firebase.auth.GithubAuthProvider.PROVIDER_ID,
				firebase.auth.EmailAuthProvider.PROVIDER_ID,
				firebase.auth.PhoneAuthProvider.PROVIDER_ID,
				//firebaseui.auth.AnonymousAuthProvider.PROVIDER_ID,
			],
		};
		ui.start('#firebaseui-auth-container', uiConfig);
	},
	methods: {
		// googleLogin() {
		// 	auth().signInWithRedirect(new auth.GoogleAuthProvider());
		// },
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
};
</script>
