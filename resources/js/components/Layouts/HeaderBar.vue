<template>
	<div id="header">
		<v-app-bar
			dark
			flat
			dense
			color="grey darken-4"
			v-if="home"
		>
			<v-toolbar-title>
				xy<a
					class="css-title-text"
					@click="changeLoadingState"
				>yo</a>lab
			</v-toolbar-title>
			<a href="/">
				<img
					src="/images/logo-without-background.png"
					alt="logo"
					class="title-logo"
				/>
			</a>

			<!-- <v-container class="mt-12">
				<v-row>
					<v-col
						offset-md="7"
						md="4"
					> -->
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
						@click="$vuetify.goTo('#robot', options)"
					>
						<v-icon class="animated wobble infinite slow">mdi-robot mdi-36px</v-icon>
					</v-btn>
				</v-col>
			</v-row>
			<!-- </v-col>
				</v-row>
			</v-container> -->

			<template v-slot:extension>
				<v-tabs
					centered
					slider-color="yellow"
					background-color="transparent"
				>
					<v-tab
						v-for="tab in tabs"
						:key="tab.id"
						@click="$vuetify.goTo(target(tab), options)"
					>
						{{ tab }}
					</v-tab>
					<a
						class="blog-link"
						href="/posts"
					>
						<v-tab>
							BLOG
						</v-tab>
					</a>
				</v-tabs>
			</template>
		</v-app-bar>

		<v-app-bar
			color="grey darken-4"
			dark
			v-else
		>

			<v-toolbar-title>
				xyyolab
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
					class="offset-md-5 mt-2 offset-4 "
					md="6"
				>
					<v-autocomplete
						:placeholder="placeholder"
						v-model="selected"
						:loading="loading"
						:items="items"
						href="/"
						prepend-inner-icon="mdi-feature-search-outline"
						hide-no-data
						auto-select-first
						clearable
						ref="search"
						color="red darken-1"
						@change="goRoute(selected)"
						@keyup="getSearchData"
					></v-autocomplete>
				</v-col>
				<v-col
					md="1"
					class="d-flex justify-end"
				>

					<a href="/posts">
						<v-btn
							icon
							color="red darken-1"
						>
							<v-icon>mdi-pokeball mdi-spin mdi-36px</v-icon>

						</v-btn>
					</a>
				</v-col>
			</v-row>
		</v-app-bar>
	</div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
export default {
	name: 'header-bar',
	data() {
		return {
			burger: '',
			overlay: '',
			success: '',
			tabs: ['HOME', 'ABOUT', 'CONTACT'],
			duration: 1000,
			offset: 0,
			easing: 'easeInOutCubic',
			apiPosts: [],
			apiTags: [],
			loading: false,
			selected: '',
			placeholder: '',
		};
	},
	methods: {
		...mapActions(['changeLoadingState']),
		target(tab) {
			return `#${tab.toLowerCase()}`;
		},
		getSearchData() {
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
	},
	computed: {
		...mapGetters(['loadingState']),
		options() {
			return {
				duration: this.duration,
				offset: this.offset,
				easing: this.easing,
			};
		},
		home() {
			return location.pathname.length === 1 ? true : false;
		},
		items() {
			return [...this.apiTags.map(tag => tag.name), ...this.apiPosts.map(post => post.title)];
		},
	},
	mounted() {
		window.addEventListener('keyup', e => {
			const key = e.which || e.keyCode;
			if (key == 191) {
				this.$refs.search.focus();
				this.selected = '';
			}
		});
		if (window.innerWidth > 760) {
			this.placeholder = "Search(' / ' to focus)";
		}
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
}
.v-toolbar__title {
	@media only screen and (max-width: $breakpoint-md) {
		overflow: unset;
		font-size: 1rem;
	}
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
