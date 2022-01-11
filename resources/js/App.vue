<template>
	<div id="app" style="overflow-x: hidden">
		<div
			v-if="modeFrontEnd"
			class="alert alert-primary w-100 mb-0"
			style="position: fixed; bottom: 0; z-index: 99; border-radius: 0; border: 0;"
		>
			<p>Mode <i>front-end</i> aktif. Data aplikasi tidak terhubung dengan server</p>
		</div>
		<router-view/>
	</div>
</template>

<script>
export default {
	data () {
		return {
			modeFrontEnd: true
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

	.circle {
		border-radius: 50%;
	}



	a.card-link, a.card-link:hover {
		color: #444444;
		text-decoration: none;
	}


	.show-md {
		display: none !important;
	}
	.hide-md {
		display: block !important;
	}
	.float-right-lg-up {
		float: right;
	}
	
	@media (max-width: 767px) {
		.show-md {
			display: block !important;
		}
		.hide-md {
			display: none !important;
		}
	}
	@media (max-width: 992px) {
		.flex-1-lg {
			flex: 1;
		}
		.float-right-lg-up {
			float: none;
		}
		.d-flex-lg {
			display: flex;
		}
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



	.input-group-addon {
		padding: 0.375rem 0.75rem;
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-radius: 0.25rem 0 0 0.25rem;
    border-right: 0;
	}
	.input-group .form-control {
		position: relative;
		z-index: 2;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		width: 1%;
		margin-bottom: 0;
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