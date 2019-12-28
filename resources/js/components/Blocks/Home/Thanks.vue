<template>
	<div id="thanks">
		<v-row>
			<v-col
				cols="12"
				md="6"
			>
				<v-container class="ma-12 pt-md-12">
					<thanks-human-svg />
				</v-container>
			</v-col>
			<v-col md="6">
				<v-container class="ma-12 pt-md-12  text-center">
					<thanks-face-svg />
				</v-container>
			</v-col>
		</v-row>
		<div class="clear"></div>
	</div>
</template>
<script>
import ThanksFaceSvg from './ThanksFaceSvg.vue';
import ThanksHumanSvg from './ThanksHumanSvg.vue';
export default {
	components: { ThanksFaceSvg, ThanksHumanSvg },
};
</script>
<style lang="stylus" scoped>
#thanks {
	background-image linear-gradient(to top, #f087e0dd 0%, #5ee7df 100%)
}

.row {
	margin-right unset !important
}
</style>
