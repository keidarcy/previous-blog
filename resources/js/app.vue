<template>
	<div>
		<header-bar />
		<transition
			enter-active-class="animated fadeInLeft delay-1s"
			leave-active-class="animated fadeOutRight"
		>
			<router-view></router-view>
		</transition>
		<chat-bot />
		<footer-bar />
	</div>
</template>
<script>
import HeaderBar from './components/Layouts/HeaderBar.vue';
import FooterBar from './components/Layouts/FooterBar.vue';
import ChatBot from './components/ChatBot.vue';
export default {
	components: { HeaderBar, FooterBar, ChatBot },
};
</script>
<style lang="scss" scoped>
</style>
