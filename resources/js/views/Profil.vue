<template>
	<div id="profil">
		<div class="container">
			<div class="d-flex pt-4 pb-3 pl-3 pr-3">
				<div>
					<div class="profil-img bg-purple-100">
					</div>
				</div>
				
				<div v-if="!isLoading" class="profil-name">
					<p class="mb-1"><b>{{userLogin.nama_lengkap}}</b></p>
					<span>{{userLogin.email}}</span>
				</div>

				<div v-else class="profil-name">
					<p class="mb-1"><span class="content-loader">Putu Jhonarendra</span></p>
					<span class="content-loader">jhonarendra@gmail.com</span>
				</div>
			</div>

			<div class="list-group">
				<router-link
					class="
						list-group-item
						list-group-item-action
						d-flex justify-content-between
						align-items-center
					"
					to="master_profil"
				>
					Data Pribadi
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</router-link>
			</div>

			<div class="list-group mt-3">
				<a class="
					list-group-item
					list-group-item-action
					d-flex justify-content-between
					align-items-center"
					@click="toggleDarkMode()">
					Dark Mode
					<svg v-if="darkMode" class="svg-toggle-switch svg-fill-purple" viewBox="0 0 24 24"><path d=""></path></svg>
					<svg v-else class="svg-toggle-switch-off svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</a>
			</div>

			<div class="list-group mt-3">
				<router-link
					class="
						list-group-item
						list-group-item-action
						d-flex justify-content-between
						align-items-center
					"
					to="master_dompet"
				>
					Dompet
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</router-link>
				<router-link
					class="
						list-group-item
						list-group-item-action
						d-flex justify-content-between
						align-items-center
					"
					to="master_kategori"
				>
					Kategori
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</router-link>
				<router-link
					class="
						list-group-item
						list-group-item-action
						d-flex justify-content-between
						align-items-center
					"
					to="sinkron_data"
				>
					Sinkron Data ke Cloud
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</router-link>
				<a class="
					list-group-item
					list-group-item-action
					d-flex justify-content-between
					align-items-center">
					Import Data
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</a>
				<a class="
					list-group-item
					list-group-item-action
					d-flex justify-content-between
					align-items-center"
					@click="exportData()">
					Export Data
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</a>
			</div>

			<div class="list-group mt-3">
				<a class="
					text-danger
					list-group-item
					list-group-item-action
					d-flex justify-content-between
					align-items-center"
					@click="logout">
					Logout
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</a>
				<a class="
					text-danger
					list-group-item
					list-group-item-action
					d-flex justify-content-between
					align-items-center"
					@click="hapusData">
					Hapus Data
					<svg class="svg-chevron-right svg-fill-light-gray" viewBox="0 0 24 24"><path d=""></path></svg>
				</a>
			</div>
			
			<div class="mt-5 text-center">
				<small>&copy; 2021 Keeuangan v1.0.0</small>
			</div>
		</div>
		
	</div>
</template>
<style scoped="">
	#profil {
		width: 100%;
		animation: slideIn .5s;
	}
	.profil-img {
		flex: 1;
		width: 80px;
		height: 80px;
		border-radius: 50%;
	}
	.profil-name {
		margin-top: 16px;
		padding-left: 16px;
		font-size: .8rem;
	}
	@media (max-width: 768px){
		.profil-img {
			width: 60px;
			height: 60px;
		}
		.profil-name {
			margin-top: 0;
			padding-left: 16px;
		}
	}
	.list-group {
		font-size: .8rem;
	}
</style>
<script>
export default {
	data(){
		return {
			darkMode: this.$store.getters.getDarkMode,
			userLogin: null,
			isLoading: true,
		}
	},
	methods: {
		toggleDarkMode(){
			if(this.darkMode){
				this.darkMode = false
			} else {
				this.darkMode = true
			}
			this.$store.dispatch('setDarkMode', this.darkMode)
		},
		exportData(){
			// ambil semua di localstorage
			let dompet = JSON.parse(localStorage.dompet)
			let setting = JSON.parse(localStorage.setting)
			let widgetFilter = JSON.parse(localStorage.widgetFilter)
			let transaksi = JSON.parse(localStorage.transaksi)
			let anggaran = JSON.parse(localStorage.anggaran)
			let kategori = JSON.parse(localStorage.kategori)
			let filter = JSON.parse(localStorage.filter)

			console.log({
				dompet: dompet,
				setting: setting,
				widgetFilter: widgetFilter,
				transaksi: transaksi,
				anggaran: anggaran,
				kategori: kategori,
				filter: filter
			})
			console.log('localStorage')
			console.log('localStorage.setItem("dompet", '+JSON.stringify(JSON.stringify(dompet))+')')
			console.log('localStorage.setItem("setting", '+JSON.stringify(JSON.stringify(setting))+')')
			console.log('localStorage.setItem("widgetFilter", '+JSON.stringify(JSON.stringify(widgetFilter))+')')
			console.log('localStorage.setItem("transaksi", '+JSON.stringify(JSON.stringify(transaksi))+')')
			console.log('localStorage.setItem("anggaran", '+JSON.stringify(JSON.stringify(anggaran))+')')
			console.log('localStorage.setItem("kategori", '+JSON.stringify(JSON.stringify(kategori))+')')
			console.log('localStorage.setItem("filter", '+JSON.stringify(JSON.stringify(filter))+')')
		},
		logout(){
			localStorage.clear()
			window.location = '/logout'
		},
		fetchUserLogin(){
			if(!this.$store.getters.getUserLogin){
				this.$store.dispatch('fetchUserLogin').then(res => {
					let userLoginTest = this.$store.getters.getUserLogin
					if(userLoginTest){
						this.userLogin = userLoginTest
					}
					this.isLoading = false
				})
			} else {
				this.userLogin = this.$store.getters.getUserLogin
				this.isLoading = false
			}
		},
		hapusData(){
			console.log('hapus data user')
		}
	},
	created(){
		this.fetchUserLogin()
	}
}
</script>