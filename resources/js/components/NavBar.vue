<template>
	<nav class="navbar navbar-expand-lg navbar-light container">
		<a class="navbar-brand" href="#">
			<img v-if="brandType == 'img'" src="/favicon.svg" width="30" height="30" alt="">
			<svg
				v-if="brandType == 'svg'"
				class="svg-chevron-left"
				viewBox="0 0 24 24"
				@click="brandClick()"
			>
				<path d=""></path>
			</svg>


			<span v-if="pageTitle" class="h5">
				{{pageTitle}}
			</span>
		</a>
		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div> -->
	</nav>
</template>

<style scoped="">
	
</style>


<script>
export default {
	data(){
		return {

		}
	},
	props: {
		brandType: {
			type: String,
			default: () => {}
		},
		pageTitle: {
			type: String,
			default: () => {}
		},
		brandAction: {
			type: String,
			default: () => {}
		},
		brandLink: {
			type: String,
			default: () => {}
		}
	},
	methods: {
		brandClick(){
			if(this.brandAction === 'router-link'){
				this.$router.push({ path: '/' + this.brandLink})
			}
		}
	}
}
</script>