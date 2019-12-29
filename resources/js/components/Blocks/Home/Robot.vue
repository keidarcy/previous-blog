<template>
	<div id="robot">

		<v-row>
			<v-col
				cols="12"
				md="6"
			>
				<v-container class="ma-12 pt-md-12">
					<robot-svg />
					<div class="text-right">
						<div
							class="display-1"
							data-aos="zoom-in-up"
							data-aos-duration="2000"
						>
							Like to create something funny 🤪
							<br />
							Like this <span class="word-css">css</span> robot 🤖
						</div>
						<right-arrow-robot />
					</div>
				</v-container>
			</v-col>
			<v-col md="6">
				<v-container
					class="ma-12 pt-md-12"
					data-aos="zoom-in-up"
					data-aos-duration="2000"
					data-aos-once="true"
				>
					<RobotHead @statusChanging="robotStatusChanging"></RobotHead>
					<RunningWords :robotStatusNow='robotStatus'></RunningWords>
				</v-container>
			</v-col>
		</v-row>
	</div>

</template>

<script>
import RightArrowRobot from './RightArrowRobot.vue';
import RobotSvg from './RobotSvg.vue';
import RobotHead from '../RobotHead.vue';
import RunningWords from '../RunningWords.vue';
export default {
	components: { RunningWords, RobotHead, RobotSvg, RightArrowRobot },
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

<style lang="scss" scoped>
#robot {
	min-height: 100vh;
	background-image: linear-gradient(to bottom, #9890e3 0%, #65afe0 100%);
}
.display-1 {
	line-height: 2;
	font-family: unset !important;
	color: snow;
	@media screen and (max-width: 600px) {
		font-size: 1rem !important;
	}
}
.word-css {
	color: #2965f1;
	font-style: italic;
	font-weight: 600;
	font-size: 2rem;
}
.row {
	margin-right: unset !important;
}
</style>
