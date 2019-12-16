<template>
	<div id="home">
		<!-- <LoadPage /> -->
		<ParticleCanvas />
		<About />
		<Robot />
		<contact-from />
		<Thanks />
	</div>
</template>
<script>
import LoadPage from './Blocks/Home/LoadPage.vue';
import ParticleCanvas from './Blocks/Home/Particle.vue';
import Robot from './Blocks/Home/Robot.vue';
import About from './Blocks/Home/About.vue';
import ContactFrom from './Blocks/Home/ContactFrom.vue';
import Thanks from './Blocks/Home/Thanks.vue';
export default {
	components: { LoadPage, ContactFrom, Robot, About, ParticleCanvas, Thanks },
	data() {
		return {
			// sentences: [
			// 	'Hey, what bring you to here ?',
			// 	'Could you change a mode for me?',
			// 	'I have 5 modes, which one do you like ?',
			// 	'Could you choose my mode, please ?',
			// ],
		};
	},
	computed: {
		// randomSentence() {
		// 	return this.sentences[Math.floor(Math.random() * this.sentences.length)];
		// },
	},
};
</script>
<style lang="scss" scoped>
</style>
