<script>
import { Pie } from 'vue-chartjs';
import * as palette from 'google-palette';
import Chart from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';
export default {
	extends: Pie,
	data() {
		return {
			animateRotate: true,
		};
	},
	props: {
		topicName: {
			type: Array,
			default: [],
		},
		topicNumber: {
			type: Array,
			default: [],
		},
	},
	mounted() {
		Chart.defaults.global.defaultFontSize = 15;
		Chart.defaults.global.defaultFontFamily = 'Nunito';
		console.log(ChartDataLabels);
		console.log(Chart);
		this.renderChart({
			type: 'Pie',
			plugins: [ChartDataLabels],
			labels: this.topicName,
			datasets: [
				{
					backgroundColor: palette('mpn65', this.topicName.length).map(function(hex) {
						return '#' + hex + 10;
					}),
					borderColor: palette('mpn65', this.topicName.length).map(function(hex) {
						return '#' + hex;
					}),
					borderWidth: Array(this.topicName.length).fill(1),
					data: this.topicNumber,
				},
			],
			options: {
				plugins: {
					datalabels: {
						labels: {
							title: {
								color: 'blue',
							},
						},
					},
				},
			},
		});
	},
};
</script>
