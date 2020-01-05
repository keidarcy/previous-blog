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
						<v-card
							class="artical py-5 d-flex justify-center"
							max-width="450"
							:color="isMobileColor"
						>
							<v-card
								class="mx-2"
								max-width="400"
							>
								<a :href="`/show/${artical.slug}`">
									<v-img
										class="white--text align-end artical-image"
										height="360px"
										:width="isMobileWidth"
										:src="artical.featured_image"
									>
									</v-img>
								</a>
								<v-card-subtitle class="pb-1 title">
									<a :href="`/show/${artical.slug}`">
										{{ artical.title }}
									</a>
								</v-card-subtitle>
								<v-spacer></v-spacer>
								<v-card-text class="text--primary subtitle-1">
									<a :href="`/show/${artical.slug}`">{{ artical.summary }}</a>
								</v-card-text>

								<v-card-actions>
									<v-chip
										class="my-tag grey darken-3 mx-1 my-1"
										text-color="white darken-3"
										v-for="tag in artical.tags"
										:key="tag.id"
										draggable
										label
										:href="`/posts/${tag.name}`"
									>
										<v-icon
											color="red lighten-3"
											left
											class="my-tag-icon"
										>mdi-gamepad-square-outline</v-icon>
										{{ tag.name }}
									</v-chip>
								</v-card-actions>
								<p class="pb-2 mx-5 font-italic">{{ artical.published_at }}</p>
							</v-card>
						</v-card>

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
							<div class="error-message help is-danger center">
								Posts Found
							</div>
							<return-button>Go to play with all posts</return-button>
						</v-col>
					</v-row>
				</v-col>
			</div>
		</v-container>
	</div>
</template>

<script>
import returnButton from '../../modules/ReturnPostsButton.vue';
export default {
	components: { returnButton },
	data() {
		return {
			isMobileColor: 'grey lighten-4',
			isMobileWidth: '400px',
		};
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
	mounted() {
		window.innerWidth > 800 ? '' : (this.isMobileColor = 'transparent');
		window.innerWidth > 800 ? '' : (this.isMobileWidth = '340px');
	},
};
</script>
<style lang="scss" scoped>
.my-tag {
	transition: all 0.2s;

	&:hover {
		transform: translateY(-5px);
	}

	&-icon:hover {
		transform: translateY(-8px);
	}
}
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
.theme--light.v-card .v-card__subtitle,
.theme--light.v-card > .v-card__text {
	color: unset;
}
</style>

