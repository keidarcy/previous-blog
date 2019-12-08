<template>
	<v-footer
		padless
		absolute
	>
		<v-col
			class="text-center white--text black text font-weight-bold"
			cols="12"
		>
			<div>
				<v-container>
					<a :href="basicInfo.facebook">
						<v-icon
							right
							dark
							large
							class="pr-2"
						>mdi-facebook</v-icon>
					</a>
					<a :href="basicInfo.github">
						<v-icon
							right
							dark
							large
						>mdi-github-circle</v-icon>
					</a>
					<v-tooltip top>
						<template v-slot:activator="{ on }">
							<v-icon
								right
								dark
								large
								v-on="on"
								@click="overlayWechat = !overlayWechat"
							>mdi-wechat</v-icon>
						</template>
						<span>{{ basicInfo.wechat }}</span>
					</v-tooltip>
				</v-container>
				<v-container>
					<p class="text--white"> Made With 🎩 & 💖 @<span class="has-text-primary">xyyolab</span>&nbsp2019
					</p>
				</v-container>

				<v-overlay :value="overlayWechat">
					<v-btn
						icon
						@click="overlayWechat = false"
					>
						<v-icon>mdi-close</v-icon>
					</v-btn>
					<v-img
						src="/images/my-qrcode.png"
						height="400"
						width="400"
					></v-img>
				</v-overlay>
			</div>
		</v-col>
	</v-footer>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
	name: 'footer-bar',
	data() {
		return {
			overlayWechat: false,
		};
	},
	methods: {
		...mapActions(['fetchBasicInfo']),
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
	},
};
</script>
