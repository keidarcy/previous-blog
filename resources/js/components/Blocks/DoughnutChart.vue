<script>
import { Doughnut } from 'vue-chartjs';
import * as palette from 'google-palette';

export default {
	extends: Doughnut,
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
		options: {
			type: Object,
			default: {},
		},
	},
	mounted() {
		this.renderChart({
			type: 'doughnut',
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
			options: this.options,
		});
	},
};
</script>
