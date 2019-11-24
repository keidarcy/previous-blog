<template>
	<div
		id="intro"
		class="about-scene"
	>
		<section
			class="section"
			style="padding-top:10rem;"
		>
			<div class="container">
				<div class="columns">
					<div class="column is-6 is-offset-3">
						<div class="card">
							<div
								class="card-image"
								data-aos="fade-left"
							>
								<figure class="image is-4by3">
									<img
										:src="basicInfo.big_picture"
										alt="Placeholder image"
									/>
								</figure>
							</div>
							<div
								class="card-content"
								data-aos="fade-right"
							>
								<div class="content">
									Hi! My name is no
									<a :href="basicInfo.facebook">
										<strong>{{ basicInfo.full_name }} ( {{ basicInfo.chinese_name }} )</strong>
									</a>.
									<br />
									<br />
									<div v-html="basicInfo.introduction"></div>
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
import { mapGetters, mapActions } from 'vuex';
export default {
	methods: {
		...mapActions(['fetchBasicInfo']),
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
	},
};
</script>
<style lang="scss">
#intro {
	background-image: linear-gradient(to top, #9890e3 0%, #b1f4cf 100%);
}
</style>
