<template>
	<div id="header">
		<v-app-bar
			dark
			flat
			dense
			color="grey darken-4"
		>
			<v-toolbar-title>
				xy<span
					class="css-title-text"
					@click="changeLoadingState"
				>yo</span>lab
			</v-toolbar-title>
			<a href="/">
				<img
					src="/images/logo-without-background.png"
					alt="logo"
					class="title-logo"
				/>
			</a>
			<v-row>
				<v-col
					class="offset-md-8 mt-2 offset-4 "
					md="3"
				>
					<v-autocomplete
						:placeholder="placeholder"
						v-model="selected"
						:loading="loading"
						:items="items"
						href="/"
						auto-select-first
						prepend-inner-icon="mdi-feature-search-outline"
						hide-no-data
						clearable
						ref="search"
						color="orange darken-2"
						@change="goRoute(selected)"
						@keyup="getSearchData"
					>
					</v-autocomplete>
				</v-col>
				<v-col
					md="1"
					class="d-flex justify-end"
				>
					<v-btn
						icon
						color="orange darken-2"
						@click="$vuetify.goTo('.robot-head', options)"
					>
						<v-icon class="animated wobble infinite slow">mdi-robot mdi-36px</v-icon>
					</v-btn>
				</v-col>
			</v-row>
			<template v-slot:extension>
				<v-tabs
					centered
					slider-color="yellow"
					background-color="transparent"
					v-model="isPosts"
				>
					<v-tab>
						<router-link :to="{ name: 'Home' }">Home</router-link>
					</v-tab>

					<v-tab @click="goHomeScollTo('about')">
						ABOUT
					</v-tab>

					<v-tab @click="goHomeScollTo('contact')">
						CONTACT
					</v-tab>

					<v-tab>
						<router-link :to="{ name: 'Posts' }">BLOG</router-link>
					</v-tab>

				</v-tabs>
			</template>
		</v-app-bar>
	</div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
export default {
	name: 'header-bar',
	data() {
		return {
			apiPosts: [],
			apiTags: [],
			loading: false,
			selected: '',
			placeholder: '',
			pressedKey: '',
			isPosts: 0,
			options: { duration: 1500, offset: 0, easing: 'easeInOutCubic' },
		};
	},
	methods: {
		...mapActions(['changeLoadingState']),
		target(tab) {
			return `#${tab.toLowerCase()}`;
		},
		getSearchData() {
			console.log(this.loading);
			console.log(this.pressedKey);
			if (this.pressedKey !== 38 && this.pressedKey !== 40) {
				this.loading = !this.loading;
				if (this.loading) {
					axios
						.get('/api/search/posts')
						.then(response => {
							this.apiPosts = response.data.posts;
							this.apiTags = response.data.tags;
							this.loading = !this.loading;
						})
						.catch(error => console.log(error));
				}
			}
		},
		goRoute(data) {
			if (typeof data !== 'undefined') {
				let index = this.apiPosts.map(post => post.title).indexOf(data);
				if (index > -1) {
					window.location.replace('/show/' + this.apiPosts.map(post => post.slug)[index]);
				} else {
					index = this.apiTags.map(tag => tag.name).indexOf(data);
					window.location.replace('/posts/' + this.apiTags.map(tag => tag.slug)[index]);
				}
			}
		},
		// if (index > -1) {
		// 	const slug = this.apiPosts.map(post => post.slug)[index];
		// 	this.$router.push({ name: 'Show', params: { slug } });
		// } else {
		// 	index = this.apiTags.map(tag => tag.name).indexOf(data);
		// 	const slug = this.apiTags.map(tag => tag.slug)[index];
		// 	this.$router.push({ name: 'Posts', params: { slug } });
		// }
		goHomeScollTo(sec) {
			if (this.$router.currentRoute.name === 'Home') {
				this.$vuetify.goTo('#' + sec, this.options);
			} else {
				this.$router.push({ name: 'Home' });
			}
		},
	},
	computed: {
		...mapGetters(['loadingState']),
		items() {
			return [...this.apiTags.map(tag => tag.name), ...this.apiPosts.map(post => post.title)];
		},
	},
	mounted() {
		if (window.innerWidth > 760) {
			this.placeholder = "Search(' / ' to focus)";
		}
		window.addEventListener('keyup', e => {
			const key = e.which || e.keyCode;
			if (key == 191) {
				this.$refs.search.focus();
				this.selected = '';
			} else {
				this.pressedKey = key;
			}
		});
		location.pathname.length === 1 ? 0 : (this.isPosts = 3);
	},
};
</script>
<style lang="scss">
$breakpoint-md: 768px !default;

#header {
	background: black;
}
.css-title-text {
	color: #64ffda !important;
	cursor: pointer;
}
.v-toolbar__title {
	@media only screen and (max-width: $breakpoint-md) {
		overflow: unset;
		font-size: 1rem;
	}
}
.v-application a {
	color: unset !important;
}
.title-logo {
	width: 2.75rem;
	height: 2.75rem;
	transition: all 0.5s;
	transition-timing-function: ease-in-out;

	&:hover {
		transform: rotateZ(360deg);
	}
	@media only screen and (max-width: $breakpoint-md) {
		height: 2rem;
	}
}
.v-tab {
	font-size: large;
}
.blog-link {
	padding-top: 10px;
}
</style>
