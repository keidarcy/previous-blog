<template>
	<div>
		<v-card
			class="mx-auto"
			max-width="400"
		>

			<v-card-text>
				<v-avatar
					color="indigo"
					size="36"
				>
					<v-icon dark>mdi-account-circle</v-icon>
				</v-avatar>
				<span>hello</span>
				<div>
					<v-avatar
						color="indigo"
						size="36"
					>
						<v-icon dark>mdi-account-circle</v-icon>
					</v-avatar>
					<span>hello</span>
				</div>
			</v-card-text>

			<v-card-actions>
				<v-row class="mb-12 align-end">
					<v-col cols="8">
						<v-textarea
							color="grey"
							auto-grow
							outlined
							rows="1"
							row-height="1"
							placeholder="type a message"
						></v-textarea>
					</v-col>
					<v-col>
						<v-btn
							class="white--text"
							color="primary accent-4"
						>send</v-btn>

					</v-col>
				</v-row>
			</v-card-actions>
		</v-card>
	</div>
</template>
<script>
export default {};
</script>
<style lang="scss">
</style>
