<template>
	<div id="anggaran">
		<div class="anggaran-header pt-2">
			<div class="container">
				<h5>Anggaran</h5>
				<FilterBar 
					:filter="filter"
					:widgetFilter="widgetFilter"
					@filterTransaksi="filterTransaksi"
					@fetchDataFilter="fetchDataFilter"
					page="home"
					:isLoading="isLoading"/>
			</div>
		</div>
		<div class="anggaran-content container">
			<div class="row">
				<!-- <p>{{parseInt(anggaran.pendapatan[1].replace(/,/g,'')) - parseInt(anggaran.pengeluaran[1].replace(/,/g,''))}}</p> -->
			</div>
			<div class="alert alert-light alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="row">
					<div class="col-sm-3">

					</div>
					<div class="col-sm-9">
						<strong>Banyak Realisasi Yang Melewati Batas!</strong>
						<p>
							Kamu telah menetapkan anggaran untuk tiap kategori. Namun, ternyata realisasi banyak yang melewati anggaran.
							Berikut beberapa fakta dari keuangan kamu.
							<ul>
								<li>Terdapat 5 kategori pengeluaran yang realisasinya melampaui anggaran. Hiburan (130%), Kuliah Kantor(200%), </li>
								<li>Kelebihan realisasi pengeluaran sebesar 312,880. Kategori Transport memiliki kelebihan yang paling banyak 245,000</li>
								<li>Anggaran Pemasukan {{anggaran.pendapatan[0]}}, Anggaran Pengeluaran {{anggaran.pengeluaran[0]}}. Keuangan kamu bertambah {{anggaran.pendapatan[0] - anggaran.pengeluaran[0]}} pada bulan ini</li>
								<li>Andai saja realisasi-mu tidak melampaui anggaran, keuangan kamu akan bertambah maksimal 2,930,999</li>
							</ul>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mt-2">
					<p class="mb-0"><small><b>Pemasukan</b></small></p>
					<p><small class="text-muted">Pemasukan berdasarkan kategori</small></p>
					<div class="card total-anggaran mb-2">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-3 col-sm-2">
									<div class="persen-anggaran-icon bg-light-purple" style="margin:0 auto">
										{{anggaran.pendapatan[2]}}
									</div>
								</div>
								<div class="col-9 col-sm-10">
									<div class="row">
										<div class="col-6">
											<p class="mb-0"><span class="text-muted">Anggaran</span></p>
											<p><b>{{anggaran.pendapatan[0]}}</b></p>
										</div>
										<div class="col-6">
											<p class="mb-0"><span class="text-muted">Realisasi</span></p>
											<p><b>{{anggaran.pendapatan[1]}}</b></p>
										</div>
										<div class="col-12">
											<div class="progress mt-1" style="height: 8px;width: 100%;">
												<div
													class="progress-bar bg-purple-500"
													role="progressbar"
													:style="{'width': anggaran.pendapatan[2]+'%'}"
													:aria-valuenow="anggaran.pendapatan[2]"
													aria-valuemin="0"
													aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<ListKategori
						:kategori="kategori[0]"
						page="anggaran"
						@setFormAnggaran="setFormAnggaran"
						@setAksiAnggaran="setAksiAnggaran"
						:setAksiAnggaran="aksiAnggaran"
						:isLoading="isLoading" />
				</div>
				<div class="col-md-6 mt-2">
					<p class="mb-0"><small><b>Pengeluaran</b></small></p>
					<p><small class="text-muted">Pengeluaran berdasarkan kategori</small></p>
					<div class="card total-anggaran mb-2">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-3 col-sm-2">
									<div class="persen-anggaran-icon bg-light-purple" style="margin: 0 auto">
										{{anggaran.pengeluaran[2]}}
									</div>
								</div>
								<div class="col-9 col-sm-10">
									<div class="row">
										<div class="col-6">
											<p class="mb-0"><span class="text-muted">Anggaran</span></p>
											<p><b>{{anggaran.pengeluaran[0]}}</b></p>
										</div>
										<div class="col-6">
											<p class="mb-0"><span class="text-muted">Realisasi</span></p>
											<p><b>{{anggaran.pengeluaran[1]}}</b></p>
										</div>
										<div class="col-12">
											<div class="progress mt-1" style="height: 8px;width: 100%;">
												<div
													class="progress-bar"
													:class="{'bg-purple-500' : anggaran.pendapatan[2] < 100, 'bg-danger' : anggaran.pendapatan[2] >= 100}"
													role="progressbar"
													:style="{'width': anggaran.pengeluaran[2]+'%'}"
													:aria-valuenow="anggaran.pengeluaran[2]"
													aria-valuemin="0"
													aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<ListKategori
						:kategori="kategori[1]"
						page="anggaran"
						@setFormAnggaran="setFormAnggaran"
						@setAksiAnggaran="setAksiAnggaran"
						:setAksiAnggaran="aksiAnggaran"
						:isLoading="isLoading" />
				</div>
			</div>
		</div>
		
		
		<FormAnggaran
			:formAnggaran="formAnggaran"
			:aksiAnggaran="aksiAnggaran"
			@filterTransaksi="filterTransaksi"
		/>
		<FilterModal
			:filter="filter"
			:widgetFilter="widgetFilter"
			@filterTransaksi="filterTransaksi"
			@fetchDataFilter="fetchDataFilter"
			page="home" />
		<hr />
	</div>
</template>

<style scoped="">
	#anggaran {
		width: 100%;
		animation: slideIn .5s;
	}
	.anggaran-header {
		position: fixed;
		width: 100%;
		z-index: 999;
		top: 0;
	}
	.anggaran-content {
		padding-top: 120px;
	}

	.total-anggaran {
		font-size: .8rem;
	}
	.persen-anggaran-icon {
		width: 40px;
		height: 40px;
		text-align: center;
		line-height: 40px;
		border-radius: 50%;
		font-size: 14px;
		font-weight: bold;
		color: #673AB7;
	}

</style>

<script>
import FilterBar from './../components/FilterBar.vue'
import Neraca from './../components/Neraca.vue'
import FilterModal from './../components/FilterModal.vue'
import ListKategori from './../components/ListKategori.vue'
import FormAnggaran from './../components/FormAnggaran.vue'
export default {
	data(){
		return {
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
				groupBy: [],
				dompet: [],
				kategori: []
			},
			anggaran: {
				pendapatan: [0, 0, 0], // anggaran, realisasi, rasio
				pengeluaran: [0, 0, 0]
			},
			kategori: [[{}, {}, {}],[{},{},{}]],
			formAnggaran: {
				idKategori: null,
				idAnggaran: null,
				namaKategori: '',
				periode: 'bulan',
				bulan: 5,
				tahun: 2021,
				deskripsi: '',
				nominal: 0,
			},
			aksiAnggaran: 'tambah',
			isLoading: true,
		}
	},
	components: {
		FilterBar, Neraca, FilterModal, ListKategori, FormAnggaran
	},
	methods: {
		filterTransaksi(){
			this.$store.dispatch('getKategoriWithAnggaran', this.filter).then(res => {
				this.kategori = this.$store.getters.getDataAnggaran
				this.countNeraca()
				this.isLoading = false
			})
		},
		fetchCurrentFilter(){
			if(!this.$store.getters.isFilterFetched){
				this.$store.dispatch('fetchCurrentFilter')
				this.filter = this.$store.getters.getFilter
			} else {
				this.filter = this.$store.getters.getFilter
			}
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
		countNeraca(){
			// pendapatan
			let angg_pendapatan = 0
			let real_pendapatan = 0
			this.kategori[0].forEach( e => {
				angg_pendapatan += (e.anggaran) ? e.anggaran.nominal : 0
				real_pendapatan += e.debet
			})
			let rasio_real_pendapatan = parseInt(real_pendapatan/angg_pendapatan*100)
			if(real_pendapatan == 0 || angg_pendapatan == 0){
				rasio_real_pendapatan = 0
			}
			angg_pendapatan = Number(angg_pendapatan.toFixed(2)).toLocaleString()
			real_pendapatan = Number(real_pendapatan.toFixed(2)).toLocaleString()
			this.anggaran.pendapatan = [angg_pendapatan, real_pendapatan, rasio_real_pendapatan]


			let angg_pengeluaran = 0
			let real_pengeluaran = 0
			this.kategori[1].forEach( e => {
				angg_pengeluaran += (e.anggaran) ? e.anggaran.nominal : 0
				real_pengeluaran += e.kredit
			})

			let rasio_real_pengeluaran = parseInt(real_pengeluaran/angg_pengeluaran*100)
			if(real_pengeluaran == 0 || angg_pengeluaran == 0){
				rasio_real_pengeluaran = 0
			}
			angg_pengeluaran = Number(angg_pengeluaran.toFixed(2)).toLocaleString()
			real_pengeluaran = Number(real_pengeluaran.toFixed(2)).toLocaleString()
			this.anggaran.pengeluaran = [angg_pengeluaran, real_pengeluaran, rasio_real_pengeluaran]
		},
		setFormAnggaran(data){
			let periode = 'bulan'
			if(data.anggaran){
				if(data.anggaran.bulan == 0){
					periode = 'tahun'
				}
				if(data.anggaran.tahun == 0){
					periode = 'semua'
				}
			} else {
				periode = this.filter.waktu
			}
			this.formAnggaran = {
				idKategori: data.id_kategori,
				idAnggaran: (data.anggaran) ? data.anggaran.id_anggaran : null,
				namaKategori: data.nama,
				periode: periode,
				bulan: (data.anggaran) ? data.anggaran.bulan : this.filter.bulan,
				tahun: (data.anggaran) ? data.anggaran.tahun : this.filter.tahun,
				deskripsi: (data.anggaran) ? data.anggaran.deskripsi : '',
				nominal: (data.anggaran) ? data.anggaran.nominal : (data.debet > 0) ? data.debet : data.kredit
			}
		},
		setAksiAnggaran(val){
			this.aksiAnggaran = val
		}
	},
	mounted(){
		
	},
	created() {

		this.fetchCurrentFilter()
		this.fetchDataFilter(false)
		this.filterTransaksi()

		// let filterFetched = this.$store.getters.isFilterFetched

		// if(!filterFetched){
		// 	this.$store.dispatch('getCurrentFilter').then(res => {
		// 		let curFilterTest = this.$store.getters.getFilter
		// 		if(curFilterTest){
		// 			this.filter = curFilterTest
		// 			this.fetchDataFilter()
		// 			this.filterTransaksi()
		// 		}
		// 	})
		// } else {
		// 	let curFilterTest = this.$store.getters.getFilter
		// 	if(curFilterTest){
		// 		this.filter = curFilterTest
		// 		this.fetchDataFilter()
		// 		this.filterTransaksi()
		// 	}
		// }
	},
}
</script>