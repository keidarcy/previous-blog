<template>
	<div
		class="pb-12 pb-md-0"
		data-aos="flip-left"
		data-aos-easing="ease-out-cubic"
		data-aos-duration="2000"
		data-aos-once="true"
		data-aos-offset="-100"
	>
		<v-container :class="runningWordsStatus">
			<div class="changing-words center">
			</div>
		</v-container>

		<v-container
			:class="inputStatus"
			class="pb-12 pb-md-0"
		>
			<v-row>
				<v-col
					md="4"
					offset-md="4"
				>
					<v-text-field
						label="Type Your Words"
						append-icon="fas fa-robot"
						v-on:keyup.enter="addWords"
						v-model="userWords"
						required
						color="teal accent-2"
					></v-text-field>
				</v-col>
				<v-tooltip right>
					<template v-slot:activator="{ on }">
						<v-btn
							class="mx-2"
							fab
							dark
							color="indigo"
							@click="addWords"
							v-on="on"
						>
							<v-badge color="purple lighten-1">
								<template
									v-slot:badge
									v-if="userWordsLength>0"
								>{{ userWordsLength }}</template>
								<v-icon dark>mdi-plus</v-icon>
							</v-badge>
						</v-btn>
					</template>
					<span>What you type will add to My introduction 😉</span>
				</v-tooltip>
			</v-row>
		</v-container>
		<v-container
			:class="expansionStatus"
			class="pb-12 pb-md-0"
		>
			<v-row>
				<v-col
					md="6"
					offset-md="3"
				>
					<v-expansion-panels inset>
						<v-expansion-panel>
							<v-expansion-panel-header>
								Need some Motivations ?
								<template v-slot:actions>
									<v-icon color="primary">$expand</v-icon>
								</template></v-expansion-panel-header>
							<v-expansion-panel-content>
								Your limitation—it's only your imagination.
								<v-img
									src="/images/waitan.jpg"
									height="150"
								></v-img>
							</v-expansion-panel-content>
						</v-expansion-panel>
						<v-expansion-panel>
							<v-expansion-panel-header>
								Lack of Inspration ?
								<template v-slot:actions>
									<v-icon color="green">$expand</v-icon>
								</template></v-expansion-panel-header>
							<v-expansion-panel-content>
								我们的征途，是星辰大海 <br>
								My Conquest Is the Sea of Stars
								<v-img
									src="/images/me-in-moutain.jpeg"
									height="150"
								></v-img>
							</v-expansion-panel-content>
						</v-expansion-panel>
					</v-expansion-panels>
				</v-col>
			</v-row>
		</v-container>
		<v-container :class="buttonStatus">
			<div class="text-center">
				<v-bottom-sheet v-model="sheet">
					<template v-slot:activator="{ on }">
						<v-btn
							color="red lighten-1"
							dark
							v-on="on"
						>
							Don't click me
							<v-icon> fas fa-skull-crossbones fa-sm</v-icon>
						</v-btn>
					</template>
					<v-sheet
						class="text-center"
						height="100px"
						color="teal lighten-1"
					>
						<a href="/lab/login">
							<v-btn
								class="mt-6"
								color="teal lighten-5"
								@click="sheet = !sheet"
							>Adventure Tour</v-btn>
						</a>
						<div>Got a lot inspration from codepen.io</div>
					</v-sheet>
				</v-bottom-sheet>
			</div>
		</v-container>
	</div>
</template>

<script>
import TextScramble from '../../modules/textScramble.js';
function dateToStr12H(date, format) {
	if (!format) {
		format = 'Y/M/D h:m:s AP';
	}
	var hours = date.getHours();
	var ampm = hours < 12 ? 'AM' : 'PM';
	hours = hours % 12;
	hours = hours != 0 ? hours : 12;
	format = format.replace(/Y/g, date.getFullYear());
	format = format.replace(/M/g, date.getMonth() + 1);
	format = format.replace(/D/g, date.getDate());
	format = format.replace(/h/g, hours);
	format = format.replace(/m/g, date.getMinutes());
	format = format.replace(/s/g, date.getSeconds());
	format = format.replace(/AP/g, ampm);
	return format;
}
export default {
	props: {
		robotStatusNow: {
			type: String,
		},
	},
	data() {
		return {
			phrases: ['Hi, there 😈, My name is xyh 🐸', 'Here is my lab 🧪, Welcome 🧙‍♀️🧨'],
			userWords: '',
			runningWordsStatus: '',
			inputStatus: '',
			sheet: false,
			expansionStatus: 'StatusDis',
			buttonStatus: 'StatusDis',
			userWordsLength: 0,
		};
	},
	mounted() {
		const el = document.querySelector('.changing-words');
		const fx = new TextScramble(el);
		this.phrases = [...this.phrases, `It\'s ${dateToStr12H(new Date(), 'Y-M-D h:m:s AP')}`];
		let counter = 0;
		const next = () => {
			fx.setText(this.phrases[counter]).then(() => {
				setTimeout(next, 2000);
			});
			counter = (counter + 1) % this.phrases.length;
		};

		next();
	},
	methods: {
		addWords() {
			if (this.userWords == '') {
			} else {
				this.phrases = [this.userWords, ...this.phrases];
				this.userWords = '';
				this.userWordsLength = this.phrases.length - 3;
			}
		},
	},
	watch: {
		$props: {
			handler() {
				switch (this.$props.robotStatusNow) {
					case 'speaking':
						this.runningWordsStatus = '';
						this.inputStatus = '';
						this.expansionStatus = 'StatusDis';
						this.buttonStatus = 'StatusDis';
						break;
					case 'neutral':
						this.runningWordsStatus = 'StatusDis';
						this.inputStatus = 'StatusDis';
						this.expansionStatus = 'StatusDis';
						this.buttonStatus = '';
						break;
					case 'thinking':
						this.runningWordsStatus = 'StatusDis';
						this.inputStatus = 'StatusDis';
						this.expansionStatus = '';
						this.buttonStatus = 'StatusDis';
						break;
					case 'listening':
						this.runningWordsStatus = 'StatusDis';
						this.inputStatus = '';
						this.expansionStatus = 'StatusDis';
						this.buttonStatus = 'StatusDis';
						break;
					case 'computing':
						this.runningWordsStatus = '';
						this.inputStatus = 'StatusDis';
						this.expansionStatus = 'StatusDis';
						this.buttonStatus = 'StatusDis';
						break;
				}
			},
			deep: true,
			immediate: true,
		},
	},
};
</script>
<style lang="scss" scoped>
.changing-words {
	font-family: 'Monaco', 'monospace', 'Courier New';
}
.StatusDis {
	display: none;
}
</style>
