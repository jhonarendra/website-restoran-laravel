<template>
	<div id="app" style="overflow-x: hidden">
		<router-view/>
	</div>
</template>

<script>
export default {
	data () {
		return {
			
		}
	}
}
</script>

<style>
	@import '../../node_modules/bootstrap/dist/css/bootstrap.min.css';
	@import 'assets/icons/font-awesome/css/font-awesome.min.css';

	html {
		scroll-behavior: smooth;
	}
	
	.text-brown {
		color: #a99c92!important;
	}
	.text-dark-brown {
		color: #5e493a!important;
	}




	.background-image {
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100vh
  }
</style>