<template>
	<v-app
		id="greeting"
		class="about-scene"
	>
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

		<v-row align="center">
			<v-img
				src="/images/paper-plane.png"
				max-width="500"
				max-height="500"
			></v-img>
		</v-row>

	</v-app>
</template>
<script>
import { TimelineLite } from 'gsap';
export default {
	data() {
		return {
			alertVisbile: false,
			alignments: ['start', 'center', 'end'],
		};
	},
	created() {
		setTimeout(() => (this.alertVisbile = false), 1000);
	},
};
</script>
<style lang="scss" scoped>
#greeting {
	background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
}
</style>
