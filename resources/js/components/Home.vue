<template>
	<div id="home">
		<LoadPage />
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
};
</script>
<style lang="scss" scoped>
</style>
