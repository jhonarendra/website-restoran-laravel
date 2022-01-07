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


	.btn-primary {
		box-shadow: rgba(116, 96, 238, 0.14) 0px 2px 2px 0px, rgba(116, 96, 238, 0.2) 0px 3px 1px -2px, rgba(116, 96, 238, 0.12) 0px 1px 5px 0px;
		background: rgb(92, 74, 199);
		border-width: 1px;
		border-style: solid;
		border-color: rgb(92, 74, 199);
		border-image: initial;
		transition: all 0.2s ease-in 0s;
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