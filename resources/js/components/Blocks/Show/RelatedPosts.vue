<template>
	<v-container
		data-aos="fade-up"
		data-aos-offset="50"
	>
		<v-divider inset></v-divider>
		<p class="big-title text-center">More Posts</p>
		<v-slide-group
			:show-arrows="!isMobile"
			class="pl-1 related-posts"
		>
			<v-slide-item
				v-for="relate in relatedPosts"
				:key="relate.id"
				class="pa-4"
			>

				<v-card
					class="ma-6 artical"
					max-width="350"
					max-height="450"
				>
					<a :href="`/show/${relate.post.slug}`">
						<v-img
							height="280px"
							:src="relate.post.featured_image"
							class="artical-image"
						>
						</v-img>
					</a>

					<v-card-text class="text--primary">
						<div>{{ relate.post.title }}</div>
					</v-card-text>
					<v-chip
						class="my-tag grey darken-3 mx-1 my-1"
						text-color="white darken-3"
						v-for="tag in relate.post.tags"
						:key="tag.id"
						draggable
						label
						:href="`/posts/${tag.name}`"
					>
						{{ tag.name }}
					</v-chip>
				</v-card>
			</v-slide-item>
		</v-slide-group>
	</v-container>
</template>

<script>
export default {
	props: {
		relatedPosts: {
			type: Array,
		},
	},
	data() {
		return {
			isMobile: true,
		};
	},
	mounted() {
		screen.width <= 760 ? '' : (this.isMobile = false);
	},
};
</script>

<style lang="scss">
.related-posts > div > div.v-slide-group__content {
	padding-bottom: 100px !important;
}
</style>
