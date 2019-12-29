<template>
	<div>
		<div
			class="bg-pic"
			data-aos="fade-right"
			data-aos-once="true"
			:style="{ backgroundImage: `url(${image})` }"
			v-if="!isMobile"
		>
			<section class="hero is-medium big-pic is-large">
				<div class="hero-body">
					<h1 class="left bg-title has-text-white">{{ title }}</h1>
				</div>
			</section>
		</div>
		<div v-else>
			<v-carousel style="height:100%">
				<v-carousel-item
					v-for="(item,i) in items"
					v-bind:src="item.src"
					:key="i"
				>
				</v-carousel-item>
			</v-carousel>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		image: {
			type: String,
		},
		title: {
			type: String,
		},
	},
	data() {
		return {
			isMobile: true,
			items: [
				{
					src: 'https://source.unsplash.com/random/600x1000',
				},
				{
					src: 'https://source.unsplash.com/random/600x1010',
				},
				{
					src: 'https://source.unsplash.com/random/600x1020',
				},
				{
					src: 'https://source.unsplash.com/random/600x1030',
				},
			],
		};
	},
	mounted() {
		screen.width <= 760 ? '' : (this.isMobile = false);
	},
};
</script>
<style>
.bg-pic {
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	filter: blur(0.8px);
	background-color: #999;
}
.bg-title {
	font-family: Nunito !important;
	font-size: 2.5rem !important;
}
@media (max-width: 768px) {
	.bg-title {
		font-family: Nunito !important;
		font-size: 1rem !important;
	}
}
</style>
