<template>
	<div>
		<header-bar />

		<router-view></router-view>

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
