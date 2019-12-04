<template>
	<div>
		<chat-card v-show="isChatting"></chat-card>
		<div class="d-flex align-end flex-column">
			<v-btn
				color="pink"
				small
				@click="isChatting = !isChatting"
			>
				<v-icon>mdi-robot </v-icon>
			</v-btn>
		</div>
	</div>
</template>
<script>
import ChatCard from './ChatCard.vue';
export default {
	components: {
		ChatCard: ChatCard,
	},
	data() {
		return {
			isChatting: false,
		};
	},
	methods: {},
};
</script>
