<template>
	<div id="erorr">
		<div class="error-content">
			<h1>500</h1>
			<p>Ada yang tidak beres</p>
			<router-link to="/" class="btn btn-sm btn-purple" tag="button">
				Kembali ke home
			</router-link>
		</div>
	</div>
</template>

<style scoped>
	h1 {
		font-size: 6em;	
	}
	.error-content {
		text-align: center;
		padding-top: 20vh;
	}
</style>

<script>
export default {
	data(){
		return {

		}
	}
}
</script>