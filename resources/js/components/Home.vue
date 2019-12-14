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
			dense
			icon="mdi-auto-fix"
		>{{ randomSentence }}</v-alert>

		<Robot @statusChanging="robotStatusChanging"></Robot>

		<RunningWords :robotStatusNow='robotStatus'></RunningWords>
		<load-page />
		<div class="clear"></div>
	</div>

</template>
<script>
import Robot from './Blocks/Robot.vue';
import RunningWords from './Blocks/RunningWords.vue';
import LoadPage from './Blocks/Home/LoadPage.vue';
export default {
	components: { RunningWords, Robot, LoadPage },
	data() {
		return {
			alert: true,
			sentences: [
				'Hey, what bring you to here ?',
				'Could you change a mode for me?',
				'I have 5 modes, which one do you like ?',
				'Could you choose my mode, please ?',
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
	background-image: linear-gradient(to top, #9890e3 0%, #b1f4cf 100%);
}
._wrapper {
	flex-direction: column;
}
</style>
