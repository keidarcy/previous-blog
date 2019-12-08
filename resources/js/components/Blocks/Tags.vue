<template>
	<div>
		<v-chip
			class="my-tag cyan darken-1 mx-1 my-1"
			text-color="grey darken-3"
			v-for="(tag,index) in tagsName"
			:key="tag"
			draggable
			color="cyan"
			label
		>
			<v-icon left>mdi-label</v-icon>
			{{ tag }} ({{ tagsNumber[index] }})
		</v-chip>
	</div>
</template>

<script>
export default {
	data() {
		return {
			names: [],
			numbers: [],
		};
	},
	props: {
		tagsNumber: {
			type: Array,
			default: [],
		},
		tagsName: {
			type: Array,
			default: [],
		},
	},
};
</script>
<style lang="stylus" scoped>
.my-tag
	transition all 0.3s ease 0s

	&:hover
		transform translateX(-7px)
</style>
