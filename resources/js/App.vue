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
	.font-weight-300 {
		font-weight: 300;
	}




	.background-image {
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100vh
  }



	.overlay-table-loader, .overlay-page-loader {
  width: 100%;
  text-align: center;
  position: absolute;
  top: 0;
  padding-top: 100px;
  padding-bottom: 100px;
  background: rgba(255,255,255, 0.5);
  height: 110vh;
}
.overlay-page-loader {
  z-index: 100;
  height: 100vh;
  padding-top:30vh;
  position: fixed;
}
.spinner-container {
  width: 100%;
}

.spinner-container .spinner,
.overlay-page-loader .spinner,
.overlay-table-loader .spinner {
  position: relative;
  width: 50px;
  height: 50px;
  margin: 0 auto;
  background-size: 50px;
  background-position: center;
  background-repeat: no-repeat;
}
</style>