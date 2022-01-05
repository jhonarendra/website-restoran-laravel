<template>
	<div id="transaksi">
		<div class="transaksi-header pt-2">
			<div class="container">
				<div class="d-flex">
					<h5>Transaksi</h5>
					<div style="margin-left: auto;">
						<button
							type="button"
							class="btn btn-light"
							data-toggle="modal"
							data-target="#formTransferModal"
							@click="aksiTransfer = 'tambah'"
						>
							<svg class="svg-swap-horizontal" viewBox="0 0 24 24"><path d=""></path></svg>
						</button>
					</div>
				</div>
				<FilterBar
					:filter="filter"
					:widgetFilter="widgetFilter"
					@filterTransaksi="filterTransaksi"
					@setAksiTransfer="setAksiTransfer"
					@fetchDataFilter="fetchDataFilter"
					:isLoading="isLoading"
					page="'transaksi'" />
			</div>
		</div>
		<div class="transaksi-content container">
			<FilterModal
				:filter="filter"
				:widgetFilter="widgetFilter"
				@filterTransaksi="filterTransaksi"
				@fetchDataFilter="fetchDataFilter"
				page="'transaksi'" />
			<ListTransaksi
				:transaksi="transaksi"
				:filter="filter"
				:dataFilterDompet="widgetFilter.dompet"
				@setFormTransaksi="setFormTransaksi"
				@setFormTransfer="setFormTransfer"
				@filterTransaksi="filterTransaksi"
				/>
			<button
				id="btnAddTransaksi"
				title="Tambah Transaksi Baru"
				type="button"
				class="btn btn-purple btn-circle"
				data-toggle="modal"
				data-target="#formTransaksiModal"
				@click="setAksi('tambah')"
			>
				<svg class="svg-plus" viewBox="0 0 24 24"><path d=""></path></svg>
			</button>
			<FormTransaksiModal
				@filterTransaksi="filterTransaksi"
				@fetchDataFilter="fetchDataFilter"
				:form="form"
				:aksi="aksi"
				:kategori="widgetFilter.kategori"
				:dompet="widgetFilter.dompet"
				page="transaksi" />
			<FormTransferModal
				@filterTransaksi="filterTransaksi"
				@fetchDataFilter="fetchDataFilter"
				:formTransfer="formTransfer"
				:aksiTransfer="aksiTransfer"
				:dompet="widgetFilter.dompet"
				page="transaksi" />
		</div>
	</div>
</template>
<style scoped="">
	#transaksi{
		width: 100%;
		animation: slideIn .5s;
	}
	.transaksi-header {
		position: fixed;
		width: 100%;
		z-index: 999;
		top: 0;
	}
	.transaksi-content {
		padding-top: 120px;
	}
</style>
<script>
import FilterBar from './../components/FilterBar.vue'
import FormTransaksiModal from './../components/FormTransaksiModal.vue'
import FormTransferModal from './../components/FormTransferModal.vue'
import ListTransaksi from './../components/ListTransaksi.vue'
import FilterModal from './../components/FilterModal.vue'
export default {
	data(){
		return {
			transaksi: null,
			filter: {
				waktu: 'bulan',
				dompet: 0,
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
			token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			form: {
				id: 0, // untuk edit aja
				jenis: 1, // 1 pendapatan, 2 pengeluaran seperti db
				kategori: 0,
				dompet: 0,
				nominal: 0,
				uraian: '',
				tanggal: new Date().toISOString().substr(0, 10),
				_token: null
			},
			formTransfer: {
				id: 0, // untuk edit aja
				dompetAsal: 0,
				dompetTujuan: 0,
				nominal: 0,
				uraian: '',
				tanggal: new Date().toISOString().substr(0, 10),
				_token: null
			},
			aksi: 'tambah',
			aksiTransfer: 'tambah',
			isLoading: true
		}
	},
	components: {
		FilterBar, ListTransaksi, FormTransaksiModal, FormTransferModal, FilterModal
	},
	methods: {
		filterTransaksi(){
			this.$store.dispatch('filterTransaksi', this.filter).then(res => {
				let transaksiTest = res
				if(transaksiTest.status){
					this.transaksi = transaksiTest.data
				} else {
					alert('kesalahan')
				}
				this.isLoading = false
			})
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
		fetchCurrentFilter(){
			if(!this.$store.getters.isFilterFetched){
				this.$store.dispatch('fetchCurrentFilter')
				this.filter = this.$store.getters.getFilter
			} else {
				this.filter = this.$store.getters.getFilter
			}
		},
		setFormTransaksi(t){
			this.aksi = 'edit'
			this.form.id = t.id_keuangan
			this.form.jenis = (t.debet > 0) ? 1 : 2
			this.form.kategori = t.id_kategori
			this.form.dompet = t.id_dompet
			this.form.nominal = (t.debet > 0) ? t.debet : t.kredit
			this.form.uraian = t.uraian
			this.form.tanggal = t.tanggal
		},
		setFormTransfer(t){
			this.aksiTransfer = 'edit'
			this.formTransfer.id = t.id_keuangan
			this.formTransfer.dompetAsal = (t.kategori.id_dompet_asal === 0) ? t.id_dompet : t.kategori.id_dompet_asal
			this.formTransfer.dompetTujuan = (t.kategori.id_dompet_tujuan === 0) ? t.id_dompet : t.kategori.id_dompet_tujuan
			this.formTransfer.nominal = (t.debet > 0) ? t.debet : t.kredit
			this.formTransfer.uraian = t.uraian
			this.formTransfer.tanggal = t.tanggal
		},
		setAksiTransfer(aksi){
			this.aksiTransfer = aksi
		},
		setAksi(aksi){
			this.aksi = aksi
			this.resetForm()
		},
		resetForm(){
			this.form.nominal = 0
		}
	},
	created() {
		this.fetchCurrentFilter()
		this.fetchDataFilter(false)
		this.filterTransaksi()

		this.form._token = this.token
		this.formTransfer._token = this.token

	}
}
</script>