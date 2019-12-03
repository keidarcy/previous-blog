<template>
	<div>
		<template>
			<v-card
				class="mx-auto"
				height="300"
				width="330"
			>
				<DoughnutChart />
			</v-card>
		</template>
	</div>
</template>

<script>
import DoughnutChart from './DoughnutChart.js';
export default {
	components: {
		DoughnutChart: DoughnutChart,
	},
};
</script>
