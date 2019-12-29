<template>
	<div>
		<template>
			<v-card
				class="mx-auto"
				max-width="400"
				color="#a3d5d3"
			>

				<DoughnutChart
					v-if="isLoaded"
					:topicName="topicName"
					:topicNumber="topicNumber"
					:options="options"
				/>
			</v-card>
		</template>
	</div>
</template>

<script>
import DoughnutChart from './Blocks/DoughnutChart.vue';
export default {
	components: { DoughnutChart },
	data() {
		return {
			topicName: [],
			topicNumber: [],
			tagName: '',
			tagNumber: '',
			isLoaded: false,
			options: {},
		};
	},
	async beforeCreate() {
		let that = this;
		try {
			await axios.get('/api/number/topics/tags').then(res => {
				that.topicName = res.data.topicName;
				that.topicNumber = res.data.topicNumber;
				that.tagName = res.data.tagName;
				that.tagNumber = res.data.tagNumber;
				console.log(res.data.topicNumber);
				console.log(res.data.topicName);
			});
			that.isLoaded = true;
			this.options = {
				legend: {
					position: 'bottom',
					onClick: function(event, legendItem) {},
				},
				tooltips: {
					enabled: false,
				},
			};
		} catch (e) {
			console.log(err);
			console.log(1);
		}
	},
};
</script>
