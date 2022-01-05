<template>
	<div id="master_dompet">
		<NavBar
			brandType="svg"
			pageTitle="Dompet"
			brandAction="router-link"
			brandLink="profil"
		 />

		<div class="container">
			<ListDompet
				:dompet="dompet"
				:isLoading="isLoading"
				:showAddDompet="true"
				actionButton="edit,hapus"
				itemClass="relativeWidth"
				@fetchDataDompet="fetchDataDompet"
			/>
		</div>
		<FormDompet
			@fetchDataDompet="fetchDataDompet"
			@fetchDataFilter="fetchDataFilter"
			/>
	</div>
</template>
<style scoped="">
	#master_dompet {
		width: 100%;
		animation: slideIn .5s;
	}
</style>
<script>
import FormDompet from './../components/FormDompet.vue'
import NavBar from './../components/NavBar.vue'
import ListDompet from './../components/ListDompet.vue'

export default {
	data(){
		return {
			dompet: [{}, {}, {}],
			isLoading: true,
			aksiDompet: 'tambah'
		}
	},
	components: {
		NavBar, ListDompet, FormDompet
	},
	methods: {
		fetchDataDompet(){
			this.$store.dispatch('fetchDataDompet').then(res => {
				let dompetTest = this.$store.getters.getDataDompet
				if(dompetTest){
					let dompet = []
					dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')
					this.dompet = dompet
				}
				this.isLoading = false
			})
		},
		setAksiDompet(val){
			this.aksiDompet = val
		},
		fetchDataFilter(isUpdate){
			this.$store.dispatch('fetchDataFilter', isUpdate).then(res => {
				console.log('berhasil fetch filter')
			})
		},
	},
	created(){
		this.fetchDataDompet()
	}
}
</script>