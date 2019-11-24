<template>
	<div
		id="home"
		data-aos="fade-in"
		data-aos-duration="1000"
		data-aos-once="true"
	>

		<v-alert
			v-model="alert"
			dismissible
			color="cyan"
			border="left"
			elevation="2"
			colored-border
			icon="mdi-auto-fix"
		>{{ randomSentence }}</v-alert>

		<Robot @statusChanging="robotStatusChanging"></Robot>

		<RunningWords :robotStatusNow='robotStatus'></RunningWords>

	</div>

</template>
<script>
import Robot from './Blocks/Robot.vue';
import RunningWords from './Blocks/RunningWords.vue';
export default {
	components: {
		RunningWords: RunningWords,
		Robot: Robot,
	},
	data() {
		return {
			alert: true,
			sentences: [
				'Hey, what bring you to here ?',
				"Hey, how's your day today?",
				'I have 5 modes, which one do you like ?',
				'Could you choose my mode, please ?',
				"What's the weather there ?",
				"Hi, my name is xyh! What's your name ?",
			],
			robotStatus: '',
		};
	},
	computed: {
		randomSentence() {
			return this.sentences[Math.floor(Math.random() * this.sentences.length)];
		},
	},

	methods: {
		clickBurger() {
			this.burger = !this.burger ? 'is-active' : '';
			this.overlay = !this.overlay ? 'width:100%' : '';
		},
		robotStatusChanging(value) {
			this.robotStatus = value;
		},
	},
};
</script>
<style lang="scss" scoped>
#home {
	height: 100vh;
	background-image: linear-gradient(to top, #9890e3 0%, #b1f4cf 100%);
}
._wrapper {
	flex-direction: column;
}
</style>
