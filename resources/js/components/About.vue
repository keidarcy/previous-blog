<template>
	<div>
		<Greeting></Greeting>
		<Intro></Intro>
		<Thanks></Thanks>
		<my-form></my-form>
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
};
</script>

<style lang="scss" scoped>
.about-scene {
	min-height: 100vh;
}
</style>
