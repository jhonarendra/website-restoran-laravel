<template>
	<div id="master_profil">
		<NavBar
			brandType="svg"
			pageTitle="Data Pribadi"
			brandAction="router-link"
			brandLink="profil"
		 />
		<div class="container">
			<div class="row">
                
			</div>
		</div>
	</div>
</template>
<style scoped="">
	#master_profil {
		width: 100%;
		animation: slideIn .5s;
	}
</style>
<script>
import NavBar from './../components/NavBar.vue'

export default {
	data(){
		return {
			isLoading: true
		}
	},
	components: {
		NavBar
	},
	methods: {
        
	},
	created(){
        
	}
}
</script>