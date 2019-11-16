<template>
	<div>
		<transition name="slide-fade">
			<v-alert
				dense
				text
				outlined
				type="success"
				transition="slide-x-transition"
				v-if="alertVisbile"
			>

				I'm a dense alert with the <strong>text</strong> prop and a <strong>type</strong> of success
			</v-alert>
		</transition>
		<section
			class="section"
			style="padding-top:10rem;"
			data-aos="fade-up"
		>
			<div class="container center">
				<h1 class="title is-1">{{ basic.greet }}</h1>
			</div>
		</section>
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
										:src="basic.big_picture"
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
									<a :href="basic.facebook">
										<strong>{{ basic.full_name }} ( {{ basic.chinese_name }} )</strong>
									</a>.
									<br />
									<br />
									<div v-html="basic.introduction"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<Thanks></Thanks>
	</div>
</template>
<script>
import Thanks from './Blocks/Thanks';
export default {
	name: 'About',
	components: {
		Thanks: Thanks,
	},
	props: {
		basic: {
			required: true,
			type: Object,
		},
	},
	data() {
		return {
			alertVisbile: true,
		};
	},
	created() {
		setTimeout(() => (this.alertVisbile = false), 1000);
	},
};
</script>

<style lang="scss" scoped>
.slide-fade-leave-active {
	transition: all 5s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-leave-to {
	transform: translateX(10px);
	opacity: 0;
}
</style>
