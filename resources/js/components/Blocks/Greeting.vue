<template>
	<v-app
		id="greeting"
		class="about-scene"
	>
		<v-parallax
			src="https://images.unsplash.com/photo-1514467159223-eae20502f859?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1952&q=80"
			jumbotron
			class="animation"
			height="1000"
			data-aos="fade-in"
			data-aos-duration="1000"
			data-aos-once="true"
		>
			<img
				src="/images/paper-plane.png"
				alt="paper-plane"
				class="paper-plane"
			>
			<div class="alice-words">
				<p
					class="alice first-line"
					data-aos="fade-in"
					data-aos-offset="500"
					data-aos-duration="4000"
					data-aos-easing="ease-in-out"
				>ሊሙሴቖንቍቈሰቻቕቛ@.@</p>

				<p
					class="alice"
					data-aos="fade-in"
					data-aos-offset="1000"
					data-aos-duration="4000"
					data-aos-easing="ease-in-out"
				>Hey, here is My lab 👨‍🔬🧪</p>

				<p
					class="alice"
					data-aos="fade-in"
					data-aos-offset="1500"
					data-aos-duration="4000"
					data-aos-easing="ease-in-out"
				>WHO ARE YOU 🤨 ⁉️</p>

				<p
					class="alice"
					data-aos="fade-in"
					data-aos-offset="2000"
					data-aos-duration="4000"
				>Wanna try this 🍎🍏</p>

				<p
					class="alice last-line"
					data-aos="fade-in"
					data-aos-offset="2500"
					data-aos-duration="4000"
				>Good Luck 😸😼</p>
			</div>

		</v-parallax>
	</v-app>
</template>
<script>
import gsap from 'scrollmagic';
import { TweenMax, TimelineMax } from 'gsap';
export default {
	mounted() {
		const flightPath = {
			curviness: 1.25,
			autoRotate: true,
			values: [
				{ x: window.innerWidth / 20, y: -5 },
				{ x: window.innerWidth / 7, y: 10 },
				{ x: window.innerWidth / 4, y: 100 },
				{ x: window.innerWidth / 2.6, y: -100 },
				{ x: window.innerWidth / 5.7, y: -50 },
				{ x: window.innerWidth / 3.3, y: 100 },
				{ x: window.innerWidth / 2.5, y: 0 },
				{ x: window.innerWidth, y: -450 },
			],
		};
		const tween = new TimelineMax();
		tween.add(
			TweenMax.to('.paper-plane', 1, {
				bezier: flightPath,
				ease: Power1.easeInout,
			})
		);
		const scene1 = this.$scrollmagic
			.scene({
				triggerElement: '.animation',
				duration: 2500,
				triggerHook: 0,
			})
			.setTween(tween)
			//.addIndicators()
			.setPin('.animation');

		const tweenFadeImage = new TimelineMax().add([
			TweenMax.to('.animation', 1, {
				opacity: 0,
			}),
		]);

		const scene2 = this.$scrollmagic
			.scene({
				triggerElement: '.last-line',
				duration: 500,
			})
			.setTween(tweenFadeImage);
		//.addIndicators();

		const tweenFadeWords = new TimelineMax().add([
			TweenMax.to('.alice-words', 1, {
				opacity: 0,
			}),
		]);

		const scene3 = this.$scrollmagic
			.scene({
				triggerElement: '.first-line',
			})
			.setTween(tweenFadeWords);
		// 	.addIndicators();

		this.$scrollmagic.addScene(scene1);
		this.$scrollmagic.addScene(scene2);
		this.$scrollmagic.addScene(scene3);
	},
};
</script>
<style lang="scss" scoped>
#greeting {
	background-image: linear-gradient(to top, #b1f4cf 0%, #4d4d4d 100%);
}
.paper-plane {
	position: absolute;
	width: 100px;
	top: 40%;
}
.animation {
	height: 100vh;
	position: relative;
	overflow: hidden;
}
.alice {
	position: relative;
	font-family: 'Times New Roman', Times, serif;
	color: rgba($color: #000000, $alpha: 0.5);
	font-size: 20px;
	font-weight: 550;
	left: 30%;
	padding-top: 1%;
	&-words {
		margin-top: 14%;
	}
}
</style>
