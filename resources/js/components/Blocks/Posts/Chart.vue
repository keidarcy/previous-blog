<template>
	<div>
		<template>
			<div
				class="mx-auto"
				max-width="400"
			>

				<DoughnutChart
					v-if="isLoaded"
					:topicName="topicName"
					:topicNumber="topicNumber"
				/>
			</div>
		</template>
	</div>
</template>

<script>
import DoughnutChart from '../DoughnutChart.vue';
export default {
	components: { DoughnutChart },
	data() {
		return {
			topicName: [],
			topicNumber: [],
			tagName: '',
			tagNumber: '',
			isLoaded: false,
		};
	},
	async beforeCreate() {
		let that = this;
		try {
			await axios.get('/api/number/topics/tags').then(res => {
				that.topicName = res.data.topicName;
				that.topicNumber = res.data.topicNumber;
				this.$emit('tagName', res.data.tagName);
				this.$emit('tagNumber', res.data.tagNumber);
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
		}
	},
};
</script>
