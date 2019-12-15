<template>
	<div>
		<v-container>
			<div v-if="isLoaded && articalsFilter.length">
				<div class="columns is-multiline is-centered ">
					<div
						class="column is-one-third"
						v-for="artical in articalsFilter"
						:key="artical.id"
					>
						<div class="notification artical">
							<div class="card">
								<div class="card-image">
									<figure class="image is-4by3 artical-image">
										<a :href="`/show/${artical.slug}`">
											<img
												:src="artical.featured_image"
												alt="Placeholder image"
											/>
										</a>
									</figure>
								</div>
								<div class="card-content">
									<div class="media">
										<div class="media-content">
											<p class="title is-5">
												<a :href="`/show/${artical.slug}`">{{ artical.title }}</a>
											</p>
										</div>
									</div>
									<br />
									<div class="content">
										<a :href="`/show/${artical.slug}`">{{ artical.summary }}</a>
										<br />
									</div>
									<div class="tags are-medium">
										<a
											:href="`/posts/${tag.slug}`"
											v-for="tag in artical.tags"
											:key="tag.id"
										>
											<span class="tag is-dark">{{ tag.name }}</span>&nbsp;
										</a>
									</div>
									<time class="right">{{ artical.published_at }}</time>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div v-else-if="isLoaded">
				<v-col cols="12">
					<v-row justify="center">
						<v-col
							cols="6"
							md="6"
						>
							<div class="error-emoji">(·_·)</div>
							<div class="error-message help is-danger center">No Posts Found!</div>
							<return-button />
						</v-col>
					</v-row>
				</v-col>
			</div>
		</v-container>
	</div>
</template>

<script>
import returnButton from '../ReturnPostsButton.vue';
export default {
	components: { returnButton },
	data() {
		return {};
	},
	props: {
		articals: {
			type: Array,
			default: [],
		},
		isLoaded: {
			type: Boolean,
			default: false,
		},
		articalsFilter: {
			type: Array,
		},
	},
};
</script>
<style lang="scss" scoped>
.error-emoji {
	color: rgba(0, 0, 0, 0.4);
	font-size: 300px;
	letter-spacing: 70px;
}

.error-message {
	font-size: 30px;
}

.return-button {
	position: absolute;
	top: 0%;
	right: 0%;
}
</style>

