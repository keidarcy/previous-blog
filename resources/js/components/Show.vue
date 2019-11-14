<template>
	<div v-if="post">
		<div
			class="big-pic"
			data-aos="fade-right"
			data-aos-once="true"
			:style="{ backgroundImage: `url(${post.post.featured_image})` }"
		>
			<section class="hero is-medium big-pic">
				<div class="hero-body">
					<div class="container">
						<h1 class="title has-text-white is-1 is-size-2-mobile">{{ post.post.title }}</h1>
					</div>
				</div>
			</section>
		</div>
		<section class="section">
			<div class="container">
				<h1
					class="center title has-text-black is-1 is-size-3-mobile has-text-black"
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
										<div class="is-divider-vertical"></div>
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
								<div class="is-divider"></div>
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
		<section class="section">
			<div
				class="container"
				data-aos="fade-up"
				data-aos-offset="50"
			>
				<div class="is-divider"></div>
				<h1 class="title center has-text-black">More Posts</h1>
				<div class="columns">
					<div
						class="column is-one-third center"
						v-for="relate in post.relates"
						:key="relate.id"
					>
						<div class="card artical">
							<div class="card-image">
								<figure class="image is-5by4">
									<a :href="`/show/${relate.post.slug}`">
										<img
											:src="relate.post.featured_image"
											alt="Placeholder image"
										/>
									</a>
								</figure>
							</div>
							<div class="card-content">
								<div class="media">
									<div class="media-content">
										<p class="title is-5">
											<a :href="`/show/${relate.post.slug}`">{{ relate.post.title }}</a>
										</p>
										<div class="tags are-small">
											<a
												:href="`/posts/${tag.slug}`"
												v-for="tag in relate.post.tags"
												:key="tag.id"
											>
												<span class="tag is-dark">{{ tag.name }}</span>&nbsp;
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>
<script>
export default {
	props: {
		basic: {
			required: true,
			type: Object,
		},
	},
	data() {
		return {
			post: '',
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
.big-pic {
	background-position: center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	filter: blur(0.8px);
}
.artical-backround {
	background-color: #ffffff;
	box-shadow: 0px 0px 6px 2px rgba(9, 9, 16, 0.2);
	margin-top: 3rem;
}
.artical-body {
	font-family: Helvetica, Arial, sans-serif !important;
	color: #000 !important;
	margin-block-start: 1em;
	margin-block-end: 1em;
	margin-inline-start: 0px;
	margin-inline-end: 0px;
}
.v-application .title {
	font-family: Nunito !important;
	font-size: 3rem !important;
	font-weight: 600;
}
</style>
