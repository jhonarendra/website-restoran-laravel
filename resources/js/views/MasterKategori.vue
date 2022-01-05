<template>
	<div id="master_kategori">
		<NavBar
			brandType="svg"
			pageTitle="Kategori"
			brandAction="router-link"
			brandLink="profil"
		 />
		<div class="container">
			<div class="row">
				<div class="col-md-6 mt-2">
					<div class="d-flex">
						<p class="mb-3"><small><b>Kategori Pemasukan</b></small></p>
						<p class="text-right" style="margin-left: auto;">
							<a class="text-purple" href="javascript:void(0)"
								data-toggle="modal"
								data-target="#formKategoriModal"
								@click="$store.dispatch('setKategoriTambah', 1)"
							>
								<small>Tambah</small>
							</a>
						</p>
					</div>
					
					<ListKategori
						:kategori="kategori[0]"
						page="master"
						:isLoading="isLoading"
						:jenis="1"/>
				</div>
				<div class="col-md-6 mt-2">
					<div class="d-flex">
						<p class="mb-3"><small><b>Kategori Pengeluaran</b></small></p>
						<p class="text-right" style="margin-left: auto;">
							<a class="text-purple" href="javascript:void(0)"
								data-toggle="modal"
								data-target="#formKategoriModal"
								@click="$store.dispatch('setKategoriTambah', 2)"
							>
								<small>Tambah</small>
							</a>
						</p>
					</div>
					<ListKategori
						:kategori="kategori[1]"
						page="master"
						:isLoading="isLoading"
						:jenis="2"/>
				</div>
			</div>
		</div>

		<FormKategoriModal 
			@fetchDataKategori="fetchDataKategori"
			/>
	</div>
</template>
<style scoped="">
	#master_kategori {
		width: 100%;
		animation: slideIn .5s;
	}
</style>
<script>
import NavBar from './../components/NavBar.vue'
import ListKategori from './../components/ListKategori.vue'
import FormKategoriModal from './../components/FormKategoriModal.vue'

export default {
	data(){
		return {
			kategori: [],
			isLoading: true
		}
	},
	components: {
		NavBar, ListKategori, FormKategoriModal
	},
	methods: {
		fetchDataKategori(){
			this.$store.dispatch('fetchDataKategori').then(res => {
				let dataKategoriTest = this.$store.getters.getDataKategori
				if(dataKategoriTest){
					let kategori_debet = []
					let kategori_kredit = []
					dataKategoriTest[0].forEach(e => (e.is_transfer === 0 && e.deleted === 0) ? kategori_debet.push(e) : '')
					dataKategoriTest[1].forEach(e => (e.is_transfer === 0 && e.deleted === 0) ? kategori_kredit.push(e) : '')
					this.kategori = [kategori_debet, kategori_kredit]
				}
				this.isLoading = false
			})
		}
	},
	created(){
		this.fetchDataKategori()
	}
}
</script>