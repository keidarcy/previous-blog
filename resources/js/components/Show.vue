<template>
	<div
		id="show"
		v-if="post"
	>
		<top-image
			:image="post.post.featured_image"
			:title="post.post.title"
		/>
		<section class="section">
			<div class="container">
				<h1
					class="center big-title"
					data-aos="fade-up"
					data-aos-once="true"
					data-aos-offset="-100"
				>{{ post.post.title }}</h1>
				<div class="columns">
					<div
						class="artical-backround column is-10 is-offset-1"
						data-aos="fade-up"
						data-aos-once="true"
						data-aos-offset="-100"
					>
						<div class="artical-hearder">
							<section class="section">
								<div class="container">
									<div class="center desktop">
										<figure
											class="image is-64x64"
											style="margin-right:40px;"
										>
											<img
												class="is-rounded"
												:src="basic.little_picture"
												alt="ops"
											/>
										</figure>
										<span
											class="subtitle is-3"
											style="padding-top:20px;"
										>{{ basic.nick_name }}</span>
										<v-divider
											class="mx-4"
											inset
											vertical
										></v-divider>
										<span>Published at : {{ post.post.updated_at }}</span>
									</div>
									<div class="mobile">
										<div
											class="center"
											style="padding-top:20px;"
										>
											<figure class="image is-64x64">
												<img
													class="is-rounded"
													:src="basic.little_picture"
													alt="ops"
												/>
											</figure>
										</div>
										<div
											class="center"
											style="padding-top:20px;"
										>
											<span class="subtitle is-4">{{ basic.nick_name }}</span>
										</div>
										<div
											class="center"
											style="padding-top:20px;"
										>
											<div>Published at : {{ post.post.published_at }}</div>
										</div>
									</div>
								</div>

								<v-divider></v-divider>

								<div
									data-aos="fade-up"
									data-aos-once="true"
									data-aos-offset="100"
								>
									<div
										class="artical-body"
										v-html="post.post.body"
									></div>
									<div class="tags are-large">
										<a
											:href="`/posts/${tag.slug}`"
											v-for="tag in post.tags"
											:key="tag.id"
										>
											<span class="tag is-dark">{{ tag.name }}</span>&nbsp;&nbsp;
										</a>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</section>

		<related-posts :relatedPosts="post.relates" />
		<div class="clear"></div>
	</div>
</template>
<script>
import RelatedPosts from './Blocks/Show/RelatedPosts.vue';
import TopImage from './Blocks/Show/TopImage.vue';
export default {
	components: { RelatedPosts, TopImage },
	props: {
		basic: {
			required: true,
			type: Object,
		},
	},
	data() {
		return {
			post: '',
			relatedPosts: [],
		};
	},
	mounted() {
		let that = this;
		that.loading = true;
		axios
			.get(`/api${location.pathname}`)
			.then(function(response) {
				that.post = response.data;
				that.loading = false;
			})
			.catch(error => console.log(error));
	},
};
</script>
<style scoped>
#show {
	background-image: linear-gradient(
		to right,
		#e4afcb 0%,
		#b8cbb8 0%,
		#b8cbb8 0%,
		#e2c58b 30%,
		#c2ce9c 64%,
		#7edbdc 100%
	);
}

.artical-backround {
	background-color: #ffffff;
	box-shadow: 0px 0px 6px 2px rgba(9, 9, 16, 0.2);
	margin-top: 3rem;
}

@media (min-width: 768px) {
	.artical-body {
		color: #000 !important;
	}
}
@media (max-width: 768px) {
	.artical-body {
		font-size: 18px;
		color: #000 !important;
	}
}
</style>
