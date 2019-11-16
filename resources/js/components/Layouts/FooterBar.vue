<template>
	<div>
		<footer class="footer center has-text-weight-bold has-background-black">
			<div style="flex-direction: row">
				<div class="center">
					<figure class="media-left">
						<a :href="basicInfo.facebook">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-facebook"></i>
							</span>
						</a>
					</figure>
					<figure class="media-left">
						<a :href="basicInfo.github">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-github"></i>
							</span>
						</a>
					</figure>
					<figure
						class="media-left tooltip is-tooltip-up"
						:data-tooltip="basicInfo.wechat"
					>
						<a href="#">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-weixin"></i>
							</span>
						</a>
					</figure>
				</div>
				<div>
					<p class="center is-size-6 is-size-7-mobile"> Made With 🎩 & 💖 @<span class="has-text-primary">xyyolab</span>&nbsp2019
					</p>
				</div>
			</div>
		</footer>
	</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
	name: 'footer-bar',
	methods: {
		...mapActions(['fetchBasicInfo']),
	},
	computed: mapGetters(['basicInfo']),
	created() {
		this.fetchBasicInfo();
	},
};
</script>
