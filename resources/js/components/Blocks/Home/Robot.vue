<template>
	<div id="robot">
		<RobotHead @statusChanging="robotStatusChanging"></RobotHead>

		<RunningWords :robotStatusNow='robotStatus'></RunningWords>
	</div>

</template>

<script>
import RobotHead from '../RobotHead.vue';
import RunningWords from '../RunningWords.vue';
export default {
	components: { RunningWords, RobotHead },
	data() {
		return {
			robotStatus: '',
		};
	},
	methods: {
		robotStatusChanging(value) {
			this.robotStatus = value;
		},
	},
};
</script>

<style>
#robot {
	min-height: 100vh;
	background-image: linear-gradient(to bottom, #9890e3 0%, #65afe0 100%);
}
/* ._wrapper {
	flex-direction: column;
} */
</style>
