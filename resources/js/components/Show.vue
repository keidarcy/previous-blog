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
						class="artical-in-show column is-10 is-offset-1"
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
												:src="basicInfo.little_picture"
												alt="ops"
											/>
										</figure>
										<span
											class="subtitle is-3"
											style="padding-top:20px;"
										>{{ basicInfo.nick_name }}</span>
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
													:src="basicInfo.little_picture"
													alt="ops"
												/>
											</figure>
										</div>
										<div
											class="center"
											style="padding-top:20px;"
										>
											<span class="subtitle is-4">{{ basicInfo.nick_name }}</span>
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
import { mapGetters, mapActions } from 'vuex';
import RelatedPosts from './Blocks/Show/RelatedPosts.vue';
import TopImage from './Blocks/Show/TopImage.vue';
export default {
	components: { RelatedPosts, TopImage },
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
	methods: {
		...mapActions(['fetchBasicInfo']),
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
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

.artical-in-show {
	box-shadow: 0 8.2px 14.6px -33px rgba(0, 0, 0, 0.303),
		0 14.3px 23.3px -33px rgba(0, 0, 0, 0.437), 0 18.7px 30.5px -33px rgba(0, 0, 0, 0.511),
		0 22.9px 41px -33px rgba(0, 0, 0, 0.558), 0 40px 65px -33px rgba(0, 0, 0, 0.59);
	border-radius: 30px;
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
