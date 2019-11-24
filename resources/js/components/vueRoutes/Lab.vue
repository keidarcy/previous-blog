<template>
	<div>
		<div class="container">
			<p>
				<router-link :to="{ name: 'Login' }">Login</router-link> |
				<router-link :to="{ name: 'Calendar' }">Calendar</router-link>
			</p>
			<router-view></router-view>
		</div>
	</div>
</template>

<script>
export default {};
</script>
