<template>
	<div id="particle">
		<div
			id="particle-canvas"
			class="animated fadeIn slow"
		>
		</div>
	</div>
</template>

<script>
//import { mapGetters } from 'vuex';
import particle from '../../../modules/patical.js';
export default {
	//computed: mapGetters(['loadingState']),
	mounted() {
		var canvasDiv = document.getElementById('particle-canvas');
		var options = {
			particleColor: '#888',
			background:
				'https://images.unsplash.com/photo-1503437313881-503a91226402?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80.jpg',
			interactive: true,
			speed: 'fast',
			density: 'high',
		};
		var particleCanvas = new ParticleNetwork(canvasDiv, options);
	},
	// data() {
	// 	return {
	// 		aos: '',
	// 		duration: '',
	// 		easing: '',
	// 		once: '',
	// 	};
	// },
	// mounted() {
	// 	this.$store.watch(
	// 		(state, getters) => getters.loadingState,
	// 		(newValue, oldValue) => {
	// 			if (!newValue) {
	// 				console.log(newValue);
	// 				this.aos = 'zoom-out-up';
	// 				this.duration = 2000;
	// 				this.easing = 'ease-in-out';
	// 				this.once = true;
	// 			}
	// 		}
	// 	);
	// },
};
</script>

<style scoped>
#particle-canvas {
	height: 100vh;
	background-image: linear-gradient(to bottom, #b1f4cf 0%, #9890e3 100%);
}
.fadeTrigger {
	position: absolute;
	bottom: 30% rgb(250, 3, 3);
}
</style>
