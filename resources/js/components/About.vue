<template>
	<div id="about">
		<div class="d-none d-lg-block">
			<Greeting></Greeting>
		</div>
		<Intro></Intro>
		<my-form @sent="emailSent"></my-form>
		<Thanks :emailSentOK='sent'></Thanks>

	</div>
</template>
<script>
import Greeting from './Blocks/Greeting';
import Intro from './Blocks/Intro';
import Thanks from './Blocks/Thanks';
import MyForm from './Blocks/MyForm';
export default {
	name: 'About',
	components: {
		Thanks: Thanks,
		Intro: Intro,
		Greeting: Greeting,
		'my-form': MyForm,
	},
	data() {
		return {
			sent: 'noName',
		};
	},
	methods: {
		emailSent(value) {
			this.sent = value;
		},
	},
};
</script>

<style lang="scss" scoped>
.about-scene {
	min-height: 100vh;
}
</style>
