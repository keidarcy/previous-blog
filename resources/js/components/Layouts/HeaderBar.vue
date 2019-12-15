<template>
	<div id="header">
		<template>
			<v-card v-if="home">
				<v-app-bar
					dark
					flat
					dense
					color="grey darken-4"
				>
					<v-app-bar-nav-icon @click="changeLoadingState"></v-app-bar-nav-icon>

					<v-toolbar-title>xyyolab

					</v-toolbar-title><a href="/">
						<img
							src="/images/logo-without-background.png"
							alt="logo"
							class="title-logo"
						/></a>

					<v-spacer></v-spacer>

					<v-btn icon>
						<v-icon>mdi-magnify</v-icon>
					</v-btn>

					<v-btn
						icon
						color="orange darken-2"
						@click="$vuetify.goTo('#robot', options)"
					>
						<v-icon class="animated wobble infinite slow">mdi-robot mdi-36px</v-icon>
					</v-btn>

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
			</v-card>
			<v-app-bar
				color="grey darken-4"
				dark
				v-else
				elevate-on-scroll
			>

				<v-toolbar-title>xyyolab

				</v-toolbar-title>
				<a href="/">
					<img
						src="/images/logo-without-background.png"
						alt="logo"
						class="title-logo"
					/>
				</a>

				<v-spacer></v-spacer>

				<v-btn icon>
					<v-icon>mdi-magnify</v-icon>
				</v-btn>
				<a href="/posts">
					<v-btn
						icon
						color="red darken-1"
					>
						<v-icon>mdi-pokeball mdi-spin</v-icon>

					</v-btn>
				</a>
			</v-app-bar>
		</template>
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
		};
	},
	methods: {
		...mapActions(['fetchBasicInfo', 'changeLoadingState']),
		target(tab) {
			return `#${tab.toLowerCase()}`;
		},
	},
	//computed: mapGetters(['basicInfo']),
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
	},
	created() {
		this.fetchBasicInfo();
	},
};
</script>
<style lang="scss">
$breakpoint-md: 768px !default;

#header {
	background: black;
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
		width: 2rem;
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
