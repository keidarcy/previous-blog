<template>
	<div>
		<div id="header">
			<div
				class="overlay moblie"
				:style="overlay"
			>
				<div class="overlay-content">
					<a href="/">
						<p class=" hovered-link has-text-weight-bold has-text-white">HOME</p>
					</a>
					<a href="/posts">
						<p class=" hovered-link has-text-weight-bold has-text-white">BLOG</p>
					</a>
					<a href="/about">
						<p class=" hovered-link has-text-weight-bold has-text-white">ABOUT</p>
					</a>
					<div>
						<v-switch
							v-model="success"
							inset
							color="success"
							class="moblie center"
						></v-switch>
					</div>
				</div>

				<div class="center overlay-icon">
					<figure class="media-left">
						<a :href="basicInfo.facebook">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-facebook-square"></i>
							</span>
						</a>
					</figure>

					<figure class="media-left">
						<a :href="basicInfo.github">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-github-square"></i>
							</span>
						</a>
					</figure>
				</div>
			</div>

			<div class="header-section">
				<section class="hero">
					<div class="hero-head ">
						<div class="navbar columns is-mobile is-marginless has-text-weight-bold has-background-black">

							<div
								class="column left"
								style="z-index:11;"
							>
								<a href="/">
									<img
										src="/images/logo-without-background.png"
										alt="logo"
										class="logo-pic"
									/></a>
								<div style="flex-direction: row">
									<a href="/">
										<div class="logo-word">
											<p class="logo-word-top-mobile left has-text-white mobile"><strong class="has-text-primary is-4">xy</strong>yo</p>
											<p class="logo-word-top-desktop left has-text-white desktop"><strong class="has-text-primary is-4">xy</strong>yo</p>
											<p class="logo-word-bottom-mobile left has-text-white mobile">
												Laboratory.
											</p>
											<p class="logo-word-bottom-desktop left has-text-white desktop">
												Laboratory.
											</p>
										</div>
									</a>
								</div>
							</div>

							<div class="column center desktop">
								<a href="/">
									<p class="navbar-item has-text-white hovered-link">HOME</p>
								</a>
								<a href="/posts">
									<p class=" navbar-item has-text-white hovered-link">BLOG</p>
								</a>
								<a href="/about">
									<p class="navbar-item has-text-white hovered-link">ABOUT</p>
								</a>
							</div>

							<div class="column right">
								<v-switch
									v-model="success"
									inset
									color="success"
									class="desktop"
								></v-switch>
								<button
									@click='clickBurger'
									:class="burger"
									class="hamburger hamburger--emphatic mobile"
									type="button"
								>
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
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
		};
	},
	methods: {
		...mapActions(['fetchBasicInfo']),
		clickBurger() {
			this.burger = !this.burger ? 'is-active' : '';
			this.overlay = !this.overlay ? 'width:100%' : '';
		},
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
	},
};
</script>
<style lang="scss">
.navbar {
	height: 90px;
}
.v-application p {
	margin-bottom: 1px;
}
</style>
