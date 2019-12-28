<template>
	<div id="about">
		<v-row>
			<v-col
				cols="12"
				md="5"
				class="offset-md-1"
				data-aos="zoom-in-up"
				data-aos-duration="2000"
				data-aos-once="true"
			>
				<v-card
					class="ma-12 pt-md-12 "
					max-width="600"
					color="transparent"
					elevation="0"
				>
					<v-img
						class="ma-2 artical about-image white--text align-end"
						src="/images/self-squar.png"
					>
					</v-img>

					<v-card-text class="white--text text-center">
						<div class="display-1">
							<div>
								Hi! I'm developer 👨‍💻.
							</div>
							<div>
								I use <span class="word-vue">Vue</span> and <span class="word-laravel">Laravel</span> to build
								<br>
								this blog to record somthing.
							</div>
						</div>
					</v-card-text>
				</v-card>
			</v-col>
			<v-col md="6">
				<v-container class="ma-12 pt-md-12">
					<about-svg />
				</v-container>
				<left-arrow-about />
			</v-col>
		</v-row>

	</div>
</template>
<script>
import LeftArrowAbout from './LeftArrowAbout.vue';
import AboutSvg from './AboutSvg.vue';
import { mapGetters, mapActions } from 'vuex';
export default {
	components: { AboutSvg, LeftArrowAbout },
	methods: {
		...mapActions(['fetchBasicInfo']),
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
	},
};
</script>
<style lang="scss" scoped>
#about {
	background-image: linear-gradient(to bottom, #000000 0%, #9890e3 100%);
}
.code-word {
	font-style: italic;
	font-weight: 600;
	font-size: 2rem;
	@media screen and (max-width: 600px) {
		font-size: 1rem !important;
	}
}
.word {
	&-vue {
		color: #4dba87;
		@extend .code-word;
	}
	&-laravel {
		color: #d14332;
		@extend .code-word;
	}
}
.about-image {
	box-shadow: 0px 0px 6px 2px rgba(9, 9, 16, 0.2);
	transform: scale(1);
	border-radius: 5px;
	transition: 0.3s ease-in-out;
	&:hover {
		transform: scale(1.1);
	}
}
.v-application .display-1 {
	font-family: unset !important;
	line-height: 1.2;
	color: snow;
	& > div {
		line-height: 2;
	}
	@media screen and (max-width: 600px) {
		font-size: 1rem !important;
	}
}
.row {
	margin-right: unset !important;
}
</style>
