<template>
	<div id="home">
		<NavBar
			brandType="img"
		 />
		<div class="container">
			<div>
				<div v-if="!isLoading" class="py-2">
					<h3>Halo {{userLogin.nama_panggilan}}, jangan lupa cek keuangan kamu hari ini</h3>
				</div>
				<div v-else class="py-2">
					<h3>Halo, jangan lupa cek keuangan kamu hari ini</h3>
				</div>
				<div class="pb-3">
					<p class="text-muted">Saldo</p>
					<p class="h5">
						<span v-if="isLoading" class="content-loader">99,999,999</span>
						<span v-else>Rp <b>{{ Number((saldo.saldo).toFixed(2)).toLocaleString() }}</b></span>
					</p>
				</div>
			</div>
		</div>
		<div id="dompet-area">
			<div class="container">
				<ListDompet
					:dompet="dompet"
					:isLoading="isLoading"
					:showAddDompet="true"
					actionButton="transaksi"
					itemClass="fixedWidth"
				/>
			</div>
		</div>

		<div class="filter-bar-wrapper">
			<FilterBar 
				:filter="filter"
				:widgetFilter="widgetFilter"
				@filterTransaksi="filterTransaksi"
				@fetchDataFilter="fetchDataFilter"
				:isLoading="isLoading"
				page="home"/>
		</div>
		<div class="filter-bar-holder"></div>
		

		<div class="container">
			<ChartDay
				:chartWaktu="chartWaktu" />
		</div>

		<div class="mt-3">
			<Neraca
				:neraca="neraca"
				:isLoading="isLoading" />
		</div>
		
		<div id="list-kategori" class="container">
			<div class="row">
				<div class="col-md-6 mt-2">
					<p class="mb-0"><small><b>Pemasukan</b></small></p>
					<p><small class="text-muted">Pemasukan berdasarkan kategori</small></p>
					<ListKategori
						:kategori="kategori[0]"
						page="home"
						:isLoading="isLoading"/>
				</div>
				<div class="col-md-6 mt-2">
					<p class="mb-0"><small><b>Pengeluaran</b></small></p>
					<p><small class="text-muted">Pengeluaran berdasarkan kategori</small></p>
					<ListKategori
						:kategori="kategori[1]"
						page="home"
						:isLoading="isLoading"/>
				</div>
			</div>
		</div>
		
		
		<FilterModal
			:filter="filter"
			:widgetFilter="widgetFilter"
			@filterTransaksi="filterTransaksi"
			@fetchDataFilter="fetchDataFilter"
			page="home" />

		<button
			id="btnAddTransaksi" title="Tambah Transaksi Baru" type="button" class="btn btn-purple btn-circle" data-toggle="modal" data-target="#formTransaksiModal" @click="aksi = 'tambah'">
			<svg class="svg-plus" viewBox="0 0 24 24"><path d=""></path></svg>
		</button>
		<FormTransaksiModal
			@filterTransaksi="filterTransaksi"
			@fetchDataFilter="fetchDataFilter"
			:form="form"
			:aksi="aksi"
			:kategori="widgetFilter.kategori"
			:dompet="widgetFilter.dompet"
			page="home" />

		<FormDompet
			@fetchDataDompet="filterTransaksi"
			@fetchDataFilter="fetchDataFilter"
			/>

	</div>
</template>

<style scoped="">
	#home {
		width: 100%;
		animation: slideIn .5s;
	}
	/* .dompet-overflow {
		white-space: nowrap;
		overflow: auto;
	}
	
	.dompet-overflow::-webkit-scrollbar {
		height: 5px;
	}
	.dompet-overflow::-webkit-scrollbar-track {
		background: transparent;
	}
	.dompet-overflow::-webkit-scrollbar-thumb {
		background: rgba(0,0,0,.5);
	}
	#app.dark .dompet-overflow::-webkit-scrollbar-thumb {
		background: rgba(255,255,255,.2);
	} */

	.filter-bar-wrapper {
		position: relative;
		width: 100%;
	}
	.filter-bar-wrapper.fixed {
		position: fixed;
		z-index: 999;
		top: 0;
	}
	.filter-bar-holder.hold{
		width: 100%;
		height: 50px;
	}
	
</style>

<script>
import NavBar from './../components/NavBar.vue'
import FilterBar from './../components/FilterBar.vue'
import FilterModal from './../components/FilterModal.vue'
import ListDompet from './../components/ListDompet.vue'
import Neraca from './../components/Neraca.vue'
import ChartDay from './../components/ChartDay.vue'
import ListKategori from './../components/ListKategori.vue'
import FormTransaksiModal from './../components/FormTransaksiModal.vue'
import FormDompet from './../components/FormDompet.vue'

export default {
	data(){
		return {
			userLogin: null,
			saldo: {
				saldo: 0
			},
			dompet: [{}, {}],
			chartWaktu: [{}],
			filter: {
				waktu: 'bulan',
				dompet: 1,
				kategori: 0,
				groupBy: 1,
				tanggalStart: '',
				tanggalEnd: '',
				bulan: 5,
				tahun: 2021
			},
			widgetFilter: {
				waktuDim: [],
				waktu: [{}, {}, {}],
				periode_waktu: {
					bulan: [{}, {}, {}],
					tahun: [{}, {}],
					semua: [{}]
				},
				groupBy: [{}, {}, {}],
				dompet: [],
				kategori: []
			},
			neraca: {
				debet: 0,
				debet_bln_lalu: 0,
				debet_rasio: 0,
				kredit: 0,
				kredit_bln_lalu: 0,
				kredit_rasio: 0,
				neraca: 0,
				neraca_bln_lalu: 0,
				neraca_rasio: 0
			},
			kategori: [[{}, {}, {}],[{},{},{}]],
			form: {
				id: 0, // untuk edit aja
				jenis: 1, // 1 pendapatan, 2 pengeluaran seperti db
				kategori: 0,
				dompet: 0,
				nominal: 0,
				uraian: '',
				tanggal: new Date().toISOString().substr(0, 10),
				_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			},
			aksi: 'tambah',
			isLoading: true,
			aksiDompet: 'tambah'
		}
	},
	// computed: {
	// 	widgetFilter(){
	// 		return this.$store.getters.getDataFilter
	// 	}
	// },
	components: {
		NavBar, FormTransaksiModal, ListDompet, FilterBar, FilterModal, Neraca, ChartDay, ListKategori, FormDompet
	},
	methods: {
		filterTransaksi(){
			this.$store.dispatch('getDataDashboard', this.filter).then(res => {
				let dataDashboard = this.$store.getters.getDataDashboard
				this.formattingDataDashboard(dataDashboard)
			})
		},
		formattingDataDashboard(data){
			this.saldo = data.saldo
			this.dompet = data.dompet
			this.neraca = data.neraca
			this.kategori = data.kategori
			this.chartWaktu = data.chart_waktu
			this.isLoading = false
		},
		fetchDataFilter(isUpdate){
			this.$store.dispatch('fetchDataFilter', isUpdate).then(res => {
				let dataFilter = this.$store.getters.getDataFilter
				this.widgetFilter.waktuDim = dataFilter.waktu_dim
				this.widgetFilter.waktu = dataFilter.waktu // ini kemungkinna gak dipake nanti
				this.widgetFilter.periode_waktu = dataFilter.periode_waktu
				this.widgetFilter.groupBy = dataFilter.group_by
				this.widgetFilter.dompet = dataFilter.dompet
				this.widgetFilter.kategori = dataFilter.kategori
			})
		},
		setAksiDompet(val){
			this.aksiDompet = val
		},
		fetchUserLogin(){
			if(!this.$store.getters.getUserLogin){
				this.$store.dispatch('fetchUserLogin').then(res => {
					let userLoginTest = this.$store.getters.getUserLogin
					if(userLoginTest){
						this.userLogin = userLoginTest
					}
				})
			} else {
				this.userLogin = this.$store.getters.getUserLogin
			}
		},
		fetchCurrentFilter(){
			if(!this.$store.getters.isFilterFetched){
				this.$store.dispatch('fetchCurrentFilter')
				this.filter = this.$store.getters.getFilter
			} else {
				this.filter = this.$store.getters.getFilter
			}
		},
		onScroll(){
			// fixed filter bar at point
			let filterBar = document.querySelector('.filter-bar-wrapper')
			let filterBarHolder = document.querySelector('.filter-bar-holder')

			if(filterBar){
				if(filterBar.getBoundingClientRect().top < 1){
					filterBar.classList.add('fixed')
					filterBarHolder.classList.add('hold')
				}
			}
			if(filterBarHolder){
				if(filterBar.getBoundingClientRect().top == 0 && filterBarHolder.getBoundingClientRect().top > 0){				filterBar.classList.remove('fixed')
					filterBarHolder.classList.remove('hold')
				}
			}
		}
	},
	created() {
		this.fetchCurrentFilter()
		this.fetchUserLogin()
		this.fetchDataFilter(false)
		this.filterTransaksi()
	},
	mounted() {
		window.addEventListener('scroll', this.onScroll)
	}
}
</script>