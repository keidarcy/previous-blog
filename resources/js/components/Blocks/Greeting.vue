<template>
	<v-app
		id="greeting"
		class="about-scene"
	>
		<transition name="slide-fade">
			<v-alert
				dense
				text
				outlined
				type="success"
				transition="slide-x-transition"
				v-if="alertVisbile"
			>
				I'm a dense alert with the <strong>text</strong> prop and a <strong>type</strong> of success
			</v-alert>
		</transition>
		<v-parallax
			src="https://images.unsplash.com/photo-1514467159223-eae20502f859?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1952&q=80"
			jumbotron
			class="animation"
			height="1000"
		>
			<img
				src="/images/paper-plane.png"
				alt="paper-plane"
				class="paper-plane"
			>
			<div class="alice-words">
				<p
					class="alice"
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
					class="alice"
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
import { TweenLite, TimelineLite } from 'gsap';
export default {
	data() {
		return {
			alertVisbile: false,
		};
	},
	created() {
		setTimeout(() => (this.alertVisbile = false), 1000);
	},
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
		const tween = new TimelineLite();
		tween.add(
			TweenLite.to('.paper-plane', 1, {
				bezier: flightPath,
				ease: Power1.easeInout,
			})
		);
		const scene1 = this.$scrollmagic
			.scene({
				triggerElement: '.animation',
				duration: 3000,
				triggerHook: 0,
			})
			.setTween(tween)
			//.addIndicators()
			.setPin('.animation');

		this.$scrollmagic.addScene(scene1);
	},
};
</script>
<style lang="scss" scoped>
.slide-fade-enter-active {
	transition: all 0.3s ease;
}
.slide-fade-leave-active {
	transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter,
.slide-fade-leave-to {
	transform: translateX(10px);
	opacity: 0;
}
.paper-plane {
	position: absolute;
	width: 100px;
	top: 40%;
}
.animation {
	background-image: url('https://images.unsplash.com/photo-1514467159223-eae20502f859?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1952&q=80');
	height: 100vh;
	position: relative;
	overflow: hidden;
}
.alice {
	position: relative;
	font-family: 'Times New Roman', Times, serif;
	color: rgba($color: #000000, $alpha: 0.6);
	font-size: 20px;
	font-weight: 500;
	left: 30%;
	padding-top: 20px;
	&-words {
		margin-top: 280px;
	}
}
</style>
