<template>
	<div class="pt-md-12">
		<v-container>
			<ul id="switches">
				<li
					:class="speakingStatus"
					@mouseover="setStatus('speaking')"
				> Speaking 🤖</li>

				<v-tooltip top>
					<template v-slot:activator="{ on }">
						<li
							:class="listeningStatus"
							@mouseover="setStatus('listening')"
							v-on="on"
						> Listening 🤡</li>
					</template>
					<span>I'm listening, what do you like, type your words there, I can repeat it 👻</span>
				</v-tooltip>

				<li
					:class="thinkingStatus"
					@mouseover="setStatus('thinking')"
				> Thinking 🤔</li>

				<v-tooltip top>
					<template v-slot:activator="{ on }">
						<li
							:class="computingStatus"
							@mouseover="setStatus('computing')"
							v-on="on"
						> Computing 👾</li>
					</template>
					<span>This is me :)</span>
				</v-tooltip>

				<li
					:class="neutralStatus"
					@mouseover="setStatus('neutral')"
				> Neutral 😐</li>

			</ul>
			<v-container>
				<div
					id="bot"
					:class="status"
					class="pt-md-12 pr-12 pr-md-0"
				>
					<div id="head">
						<div id="left-ear">
							<div id="left-ear-inner"></div>
						</div>
						<div id="face">
							<div id="eyes">
								<div id="left-eye"></div>
								<div id="right-eye"></div>
							</div>
							<v-tooltip right>
								<template v-slot:activator="{ on }">
									<div
										id="mouth"
										v-on="on"
									></div>
								</template>
								<span>Am I cute 😍💅</span>
							</v-tooltip>
						</div>
						<div id="right-ear">
							<div id="right-ear-inner"></div>
						</div>
					</div>
				</div>
			</v-container>
		</v-container>
	</div>
</template>
<script>
export default {
	data() {
		return {
			status: 'speaking',
			neutralStatus: '',
			speakingStatus: '_selected-status',
			thinkingStatus: '',
			listeningStatus: '',
			computingStatus: '',
		};
	},
	methods: {
		setStatus(status) {
			switch (status) {
				case 'speaking':
					this.status = 'speaking';
					this.$emit('statusChanging', 'speaking');
					this.neutralStatus = '';
					this.speakingStatus = '_selected-status';
					this.thinkingStatus = '';
					this.listeningStatus = '';
					this.computingStatus = '';
					break;
				case 'thinking':
					this.status = 'thinking';
					this.$emit('statusChanging', 'thinking');
					this.neutralStatus = '';
					this.speakingStatus = '';
					this.thinkingStatus = '_selected-status';
					this.listeningStatus = '';
					this.computingStatus = '';
					break;
				case 'neutral':
					this.status = 'neutral';
					this.$emit('statusChanging', 'neutral');
					this.neutralStatus = '_selected-status';
					this.speakingStatus = '';
					this.thinkingStatus = '';
					this.listeningStatus = '';
					this.computingStatus = '';
					break;
				case 'listening':
					this.status = 'listening';
					this.$emit('statusChanging', 'listening');
					this.neutralStatus = '';
					this.speakingStatus = '';
					this.thinkingStatus = '';
					this.listeningStatus = '_selected-status';
					this.computingStatus = '';
					break;
				case 'computing':
					this.status = 'computing';
					this.$emit('statusChanging', 'computing');
					this.neutralStatus = '';
					this.speakingStatus = '';
					this.thinkingStatus = '';
					this.listeningStatus = '';
					this.computingStatus = '_selected-status';
					break;
			}
		},
	},
};
</script>
<style lang="scss" scoped>
._selected-status {
	background-color: aquamarine;
	font-weight: 600;
	border-radius: 25px;
	box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
	transform: translateY(-7px);
}
body {
	background-color: #000;
	color: #fff;
}

#switches {
	width: 100%;
	padding: 0;
	list-style-type: none;
	text-align: center;
	font-family: 'Monaco', 'monospace', 'Courier New';
}

#switches li {
	display: inline-block;
	font-size: large;
	padding: 0.5em 0.5em;
	cursor: pointer;
}

/* BOT */

#bot {
	position: relative;
	text-align: left;
	width: 24em;
	height: 24em;
	min-width: 10em;
	min-height: 10em;
	/*border: 1px solid lightblue;*/
	margin: 0 auto;
}

#head {
	position: relative;
	display: inline-block;
	margin-top: 15%;
	margin-left: 10%;
	width: 80%;
	height: 70%;
	/*border : 1px solid yellow;*/
}

#face {
	position: absolute;
	margin-left: 0%;
	margin-right: 0%;
	width: 100%;
	height: 100%;
	border: 0.4em solid #fff;
	border-radius: 1.5em;
	/*border : 1px solid red;*/
}

#left-ear,
#right-ear {
	position: absolute;
	top: 30%;
	width: 6%;
	height: 25%;
	border: 0.15em solid #fff;
	background-color: lightgray;
	border-radius: 0.1em;
}

#left-ear {
	left: -6%;
}

#right-ear {
	right: -6%;
}

#left-ear-inner,
#right-ear-inner {
	position: absolute;
	top: 20%;
	width: 100%;
	height: 60%;
	background-color: lightgray;
	border-radius: 0.1em;
}

#left-ear-inner {
	left: -150%;
}

#right-ear-inner {
	right: -150%;
}

#eyes {
	position: absolute;
	width: 70%;
	height: 20%;
	margin-left: 16%; /* 16 */
	margin-top: 20%; /* 20 */
	/*border : 1px solid lightseagreen;*/
}

#left-eye,
#right-eye {
	position: absolute;
	width: 35%;
	height: 100%;
	background-color: lightseagreen;
	border-radius: 0.5em;
	/*border: 0.15em solid #FFF;*/
}

#right-eye {
	right: 0%;
}

#mouth {
	position: absolute;
	width: 30%;
	height: 4%;
	border-left: 0.2em solid #fff;
	border-right: 0.2em solid #fff;
	border-bottom: 0.2em solid #fff;
	border-top: 0em solid #fff;
	border-radius: 0.5em;
	left: 35%;
	bottom: 20%;
}

/* Animations */
#bot.neutral #left-eye,
#bot.neutral #right-eye {
	animation: blink-eyes 3s infinite ease-in alternate;
	animation-delay: 2s;
}

#bot.neutral #left-ear-inner {
	animation: move-left-ear-inner 5s infinite ease alternate;
}

#bot.neutral #right-ear-inner {
	animation: move-right-ear-inner 5s infinite ease alternate;
}

@keyframes blink-eyes {
	0% {
		height: 10%;
		margin-top: 10%;
	}
	10% {
		height: 100%;
		margin-top: 0%;
	}
	100% {
		height: 100%;
		margin-top: 0%;
	}
}

/* Speaking */
#bot.speaking #mouth {
	border-top: 0.2em solid #fff;
	background-color: #fff;
	animation: speak-mouth 1s infinite ease alternate;
}

@keyframes speak-mouth {
	0% {
		width: 10%;
		height: 4%;
		left: 45%;
	}
	25% {
		width: 30%;
		height: 10%;
		left: 35%;
	}
	50% {
		width: 6%;
		height: 4%;
		left: 47%;
	}
	75% {
		width: 40%;
		height: 8%;
		left: 30%;
	}
	100% {
		width: 30%;
		height: 4%;
		left: 35%;
	}
}

/* Waiting (Thinking) */
#bot.thinking #eyes {
	animation: glance-eyes 8s infinite ease-in-out;
	animation-delay: 2s;
}

#bot.thinking #mouth {
	animation: pinch-mouth 6s infinite ease alternate;
	animation-delay: 4s;
}

#bot.thinking #left-ear-inner {
	animation: move-left-ear-inner 6s infinite ease alternate;
	animation-delay: 4s;
}

#bot.thinking #right-ear-inner {
	animation: move-right-ear-inner 6s infinite ease alternate;
	animation-delay: 4s;
}

@keyframes glance-eyes {
	0% {
		margin-left: 16%;
	}
	10% {
		margin-left: 6%;
	}
	40% {
		margin-left: 6%;
	}
	60% {
		margin-left: 24%;
	}
	70% {
		margin-left: 24%;
	}
	80% {
		margin-left: 16%;
	}
	100% {
		margin-left: 16%;
	}
}

@keyframes pinch-mouth {
	0% {
		width: 30%;
		left: 35%;
	}
	48% {
		width: 30%;
		left: 35%;
	}
	50% {
		width: 10%;
		left: 45%;
	}
	52% {
		width: 30%;
		left: 35%;
	}
	100% {
		width: 30%;
		left: 35%;
	}
}

@keyframes move-left-ear-inner {
	0% {
		left: -150%;
	}
	48% {
		left: -150%;
	}
	50% {
		left: -100%;
	}
	52% {
		left: -150%;
	}
	100% {
		left: -150%;
	}
}

@keyframes move-right-ear-inner {
	0% {
		right: -150%;
	}
	48% {
		right: -150%;
	}
	50% {
		right: -100%;
	}
	52% {
		right: -150%;
	}
	100% {
		right: -150%;
	}
}

/* Listening */
#bot.listening #left-eye,
#bot.listening #right-eye {
	background-color: lightgreen;
	border-radius: 1em;
	transition: border-radius 0.25s linear;
	animation: none;
}

#bot.listening #left-ear,
#bot.listening #right-ear,
#bot.listening #left-ear-inner,
#bot.listening #right-ear-inner {
	background-color: lightgreen;
}

#bot.listening #face,
#bot.listening #left-ear,
#bot.listening #right-ear {
	border-color: lightgreen;
	transition: border-color 0.25s linear;
}

#bot.listening #left-ear-inner,
#bot.listening #right-ear-inner {
	/*outline: 0.4em dotted lightgreen;*/
	animation: border-bump 0.4s infinite ease alternate;
	animation-delay: 0.5s;
}

@keyframes border-bump {
	0% {
		outline: 0.4em dotted lightgreen;
	}

	100% {
		outline: 0.2em dotted black;
	}
}

/* Computing */
#bot.computing #left-eye,
#bot.computing #right-eye {
	height: 100%;
	width: 25%;
	border-radius: 100%;
	transition: all 0.25s linear;
	border: 0.3em dashed black;
	animation-delay: 0.5s;
	background-color: #99ffff;
}

#bot.computing #left-eye {
	animation: border-dance 1s infinite linear reverse;
}

#bot.computing #right-eye {
	animation: border-dance 1s infinite linear;
}

#bot.computing #face,
#bot.computing #left-ear,
#bot.computing #right-ear,
#bot.computing #left-ear-inner,
#bot.computing #right-ear-inner {
	border-color: #99ffff;
	transition: border-color 0.25s linear;
}

#bot.computing #left-ear,
#bot.computing #right-ear,
#bot.computing #left-ear-inner,
#bot.computing #right-ear-inner {
	background-color: #99ffff;
	transition: background-color 0.25s linear;
	animation: none;
}

#bot.computing #mouth {
	border: 0.5em solid #fff;
	width: 10%;
	left: 45%;
}

@keyframes border-dance {
	100% {
		transform: rotateZ(360deg);
	}
}
</style>
