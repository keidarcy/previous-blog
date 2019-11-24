<template>
	<div id="posts">
		<div data-aos="fade-up">
			<section class="section">
				<div class="container">
					<div class="control has-icons-left has-icons-right desktop">
						<input
							type="text"
							class="input my-input is-large"
							placeholder="Search for title ;) "
							v-model="textSearch"
							:class="[isLoaded && articalsFilter.length==0 ? 'is-danger' : 'is-primary']"
						/>
						<span class="icon is-large is-right">
							<i class="fab fa-searchengin"></i>
						</span>
						<span class="icon is-large is-left">
							<i class="fas fa-hat-wizard"></i>
						</span>
					</div>
					<div class="control has-icons-left has-icons-right mobile">
						<input
							type="text"
							class="input my-input is-mediumn"
							placeholder="Search for title ;) "
							v-model="textSearch"
							:class="[isLoaded && articalsFilter.length==0 ? 'is-danger' : 'is-primary']"
						/>
						<span class="icon is-mediumn is-right">
							<i class="fab fa-searchengin"></i>
						</span>
						<span class="icon is-mediumn is-left">
							<i class="fas fa-hat-wizard"></i>
						</span>
					</div>
				</div>
			</section>

			<div v-if="about==''"></div>
			<div
				class="title is-4 center"
				v-else
			>posts about {{ about }}</div>

			<section class="section">
				<div class="container">
					<div v-if="isLoaded && articalsFilter.length">
						<div class="columns is-multiline">
							<div
								class="column is-one-third center"
								v-for="artical in articalsFilter"
								:key="artical.id"
							>
								<div class="notification artical">
									<div class="card">
										<div class="card-image">
											<figure class="image is-4by3">
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
					<div
						class="help is-danger "
						v-else-if="isLoaded"
					>Sorry, no result!
					</div>
				</div>
			</section>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			articals: [],
			textSearch: '',
			isLoaded: false,
			about: location.pathname.slice(7),
		};
	},
	computed: {
		articalsFilter: function() {
			let textSearch = this.textSearch;
			return this.articals.filter(function(el) {
				return el.title.toLowerCase().includes(textSearch.toLowerCase());
			});
		},
	},
	mounted() {
		let that = this;
		axios
			.get(`/api${location.pathname}`)
			.then(response => (that.articals = response.data))
			.then(response => (that.isLoaded = true))
			.catch(error => console.log(error));
	},
};
</script>
<style lang="scss" scoped>
.v-application .title {
	font-family: Nunito !important;
	font-size: 1.25rem;
	font-weight: 600;
}
#posts {
	height: 100%;
	background-image: linear-gradient(
		to right,
		#eea2a2 0%,
		#bbc1bf 19%,
		#57c6e1 42%,
		#b49fda 79%,
		#7ac5d8 100%
	);
}
</style>
