<template>
	<div>
		<div class="container">
			<p>
				<router-link :to="{ name: 'login' }">Login</router-link> |
				<router-link :to="{ name: 'calendar' }">Calendar</router-link>
			</p>
			<router-view></router-view>
		</div>
	</div>
</template>

<script>
export default {};
</script>
