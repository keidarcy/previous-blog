<template>
	<div>
		<footer class="footer center has-text-weight-bold has-background-black">
			<div style="flex-direction: row">
				<div class="center">
					<figure class="media-left">
						<a :href="basic.facebook">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-facebook"></i>
							</span>
						</a>
					</figure>
					<figure class="media-left">
						<a :href="basic.github">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-github"></i>
							</span>
						</a>
					</figure>
					<figure
						class="media-left tooltip is-tooltip-up"
						:data-tooltip="basic.wechat"
					>
						<a href="#">
							<span class="icon has-text-light is-large hovered-shadow">
								<i class="fa-lg fab fa-weixin"></i>
							</span>
						</a>
					</figure>
				</div>
				<div>
					<p class="center is-size-6 is-size-7-mobile"> Made With 🎩 By @xyyolab 2019
					</p>
				</div>
			</div>
		</footer>
	</div>
</template>

<script>
export default {
	name: 'footer-bar',
	props: {
		basic: {
			required: true,
			type: Object,
		},
	},
};
</script>
