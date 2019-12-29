<template>

	<v-dialog
		v-model="loadingState"
		fullscreen
	>
		<div class="full">
			<v-btn
				icon
				dark
				@click="changeLoadingState"
				color="grey darken-1"
			>
				<v-icon>mdi-dog-service mdi-36px</v-icon>
			</v-btn>

			<div class="display-3 front-hello animated fadeInDownBig">Hello.</div>
			<div class="message">
				<div class="ma-5">
					<br>

					<div class="first-line">
						<div
							class="animated display-2 front-word"
							:class="frontFirstLine"
							@mouseover="mouseInFirstLine"
							@mouseleave="mouseOutFirstLine"
							@touchstart="mouseInFirstLine"
							@touchend="mouseOutFirstLine"
						>My name is
							<span class="idea some-difference">
								Xing Yahao
							</span>.
						</div>

						<div
							class="animated back-word display-2"
							:class="backFirstLine"
							@mouseover="mouseInFirstLine"
							@mouseleave="mouseOutFirstLine"
							@touchstart="mouseInFirstLine"
							@touchend="mouseOutFirstLine"
						>My Chinese name is <span class="some-difference idea">邢 亜豪.
							</span>
						</div>
					</div>

					<br>

					<div class="second-line">
						<div
							class="display-1 animated front-word"
							:class="frontSecondLine"
							@mouseover="mouseInSecondLine"
							@mouseleave="mouseOutSecondLine"
							@touchstart="mouseInSecondLine"
							@touchend="mouseOutSecondLine"
						>I want to create staffs that</div>
						<div
							class="display-1 animated back-word"
							:class="backSecondLine"
							@mouseover="mouseInSecondLine"
							@mouseleave="mouseOutSecondLine"
							@touchstart="mouseInSecondLine"
							@touchend="mouseOutSecondLine"
						>I'd like to
						</div>
					</div>

					<br>

					<div class="third-line">
						<div
							class="display-1 animated front-word pb-5"
							:class="frontThirdLine"
							@mouseover="mouseInThirdLine"
							@mouseleave="mouseOutThirdLine"
							@touchstart="mouseInThirdLine"
							@touchend="mouseOutThirdLine"
						><span class="some-difference">make</span> a <span class="some-difference">difference</span>.</div>
						<div
							class="display-1 animated back-word pb-5"
							:class="backThirdLine"
							@mouseover="mouseInThirdLine"
							@mouseleave="mouseOutThirdLine"
							@touchstart="mouseInThirdLine"
							@touchend="mouseOutThirdLine"
						>turn <span class="some-difference idea">ideas</span> to <span class="some-difference idea">reality</span>.</div>
					</div>
				</div>

				<div class="text-center front-button animated fadeInDownBig">
					<v-hover v-slot:default="{ hover }">
						<v-btn
							:outlined="hover ? false : true"
							x-large
							color="#41C19A"
							@click="changeLoadingState"
							class="loadBtn pulse animated infinite"
						>View me<v-icon
								class="pl-2 heartBeat animated infinite"
								:color="hover ? 'pink' : '#41C19A'"
							>mdi-heart</v-icon>
						</v-btn>
					</v-hover>
				</div>
			</div>
		</div>
		<v-avatar
			tile
			@mouseover="mouseInIcon"
			@mouseleave="mouseOutIcon"
			@touchstart="mouseInIcon"
			@touchend="mouseOutIcon"
			class="my-icon"
			size="62"
		>
			<img
				:class="touchedIcon"
				src="/images/logo-without-background.png"
				alt="fun"
			>
		</v-avatar>
	</v-dialog>
</template>

<script>
const inAnima = 'zoomIn';
const OutAnima = 'zoomOut';
const iconSwing = 'animated swing';
import { mapGetters, mapActions } from 'vuex';

export default {
	data() {
		return {
			frontFirstLine: 'fadeInDownBig front-line-first',
			backFirstLine: 'notShow',
			frontSecondLine: 'fadeInDownBig front-line-second',
			backSecondLine: 'notShow',
			frontThirdLine: 'fadeInDownBig front-line-third',
			backThirdLine: 'notShow',
			frontWord: '',
			backWord: '',
			touchedIcon: '',
		};
	},
	computed: {
		...mapGetters(['loadingState']),
	},
	methods: {
		...mapActions(['changeLoadingState']),
		mouseInFirstLine() {
			this.frontFirstLine = OutAnima;
			this.backFirstLine = inAnima;
			this.touchedIcon = iconSwing;
		},
		mouseOutFirstLine() {
			this.touchedIcon = '';
			this.frontFirstLine = inAnima;
			this.backFirstLine = OutAnima;
		},
		mouseInSecondLine() {
			this.frontSecondLine = OutAnima;
			this.backSecondLine = inAnima;
			this.touchedIcon = iconSwing;
		},
		mouseOutSecondLine() {
			this.touchedIcon = '';
			this.frontSecondLine = inAnima;
			this.backSecondLine = OutAnima;
		},
		mouseInThirdLine() {
			this.frontThirdLine = OutAnima;
			this.backThirdLine = inAnima;
			this.touchedIcon = iconSwing;
		},
		mouseOutThirdLine() {
			this.touchedIcon = '';
			this.frontThirdLine = inAnima;
			this.backThirdLine = OutAnima;
		},
		mouseInIcon() {
			this.frontFirstLine = OutAnima;
			this.backFirstLine = inAnima;
			this.frontSecondLine = OutAnima;
			this.backSecondLine = inAnima;
			this.frontThirdLine = OutAnima;
			this.backThirdLine = inAnima;
			this.touchedIcon = iconSwing;
		},
		mouseOutIcon() {
			this.frontFirstLine = inAnima;
			this.backFirstLine = OutAnima;
			this.frontSecondLine = inAnima;
			this.backSecondLine = OutAnima;
			this.frontThirdLine = inAnima;
			this.backThirdLine = OutAnima;
			this.touchedIcon = '';
		},
		mounted() {
			document.getElementById('particle').scrollIntoView();
		},
	},
};
</script>

<style lang="scss" scoped>
$green-color: #2ee59d;
$gold: gold;
$breakpoint-md: 768px !default;
$wordInDuration: 2s;
.full {
	background-image: url(https://images.unsplash.com/photo-1516905041604-7935af78f572?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80);
	background-position: center center;

	@media only screen and (max-width: $breakpoint-md) {
		background-image: unset;
		background: black;
	}
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-color: #999;
}
.full {
	height: 100%;
}
.message {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	width: 100%;
	height: 50%;
	bottom: 0;
	display: block;
	position: absolute;
	background-color: rgba(116, 116, 116, 0.5);
	@media only screen and (max-width: $breakpoint-md) {
		background-color: transparent;
		bottom: 20%;
	}
	color: #fff;
	padding: 0.5em;
}

%display-text {
	line-height: 1.2;
	display: inline-block;
	font-family: Nunito !important;
	padding-left: 5%;
	animation-duration: 1s;
	animation-delay: 0.2s;
	transition: all 0.3s ease 0s;
}
.display {
	@media only screen and (max-width: $breakpoint-md) {
		line-height: 0;
	}
	&-1 {
		@extend %display-text;
		@media only screen and (max-width: $breakpoint-md) {
			font-size: 30px !important;
		}
	}
	&-2 {
		@extend %display-text;
		@media only screen and (max-width: $breakpoint-md) {
			font-size: 40px !important;
		}
	}
}
.second-line {
	padding-top: 2%;
}
.front {
	&-hello {
		@extend %display-text;
		position: absolute;
		top: 25%;
		color: white;
		animation-duration: $wordInDuration;
		font-family: monospace !important;
		background-color: hotpink;
		margin-left: 8%;
		padding-left: 0%;
		font-weight: 800;
		width: 2%;
		@media only screen and (max-width: $breakpoint-md) {
			font-size: 60px !important;
			top: 25%;
		}
		&:hover {
			background-image: linear-gradient(
				to right,
				rgba(hotpink, 0.9) 0%,
				rgba(gold, 0.9) 50%,
				rgba($green-color, 0.9) 100%
			);
			width: 15%;
			@media only screen and (max-width: $breakpoint-md) {
				width: 50%;
			}
		}
	}
	&-line {
		&-first {
			animation-duration: $wordInDuration;
			animation-delay: $wordInDuration;
		}
		&-second {
			animation-duration: $wordInDuration;
			animation-delay: $wordInDuration * 1.7;
		}
		&-third {
			animation-duration: $wordInDuration;
			animation-delay: $wordInDuration * 2.4;
		}
	}
	&-button {
		animation-duration: $wordInDuration;
		animation-delay: $wordInDuration * 3.1;
	}
}
.third-line {
	@media only screen and (max-width: $breakpoint-md) {
		padding-top: 10px;
	}
}
.notShow {
	visibility: hidden;
}

.loadBtn {
	border-radius: 0%;
	font-weight: 600;
	letter-spacing: 2px;
	font-family: Nunito;
	transition: all 0.3s ease 0s;
	&:hover {
		width: 12rem;
		background-color: $green-color;
		box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
		color: #fff;
		transform: translateY(-7px);
		letter-spacing: 4px;
	}
}
.some-difference {
	background-image: linear-gradient(
		to right,
		rgba(hotpink, 0.5) 0%,
		rgba(gold, 0.5) 50%,
		rgba($green-color, 0.5) 100%
	);
}
.idea {
	font-size: 40px;
	font-family: 'Times New Roman', Times, serif;
	font-style: italic;
}
.front-word {
	position: absolute;
}
.my-icon {
	position: absolute;
	top: 60%;
	left: 75%;
	z-index: 20;
	transition: all 0.5s;
	transform: rotateZ(-20deg) scale(1.1);

	@media only screen and (max-width: $breakpoint-md) {
		top: 20%;
		left: 80%;
	}

	transition-timing-function: ease-in-out;
	&:hover {
		transform: rotateZ(-40deg) scale(1.3);
	}
}
</style>
