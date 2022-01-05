<template>
	<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="filterModalLabel">Filter</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div>
						<div v-if="widgetFilter.waktuDim.length && filter">
							<p class="mb-2"><small><b>Periode</b></small></p>
							<span
								v-for="w in widgetFilter.waktuDim"
								:key="w"
								class="badge badge-pill"
								:class="{'badge-purple-100' : w === filter.waktu, 'badge-light-gray' : w !== filter.waktu}"
								@click="setFilterWaktu(w)"
								>
								{{w.charAt(0).toUpperCase() + w.substr(1, w.length)}}
							</span>
						</div>
						<div v-if="widgetFilter.dompet.length && filter && page!='home'" class="mt-3">
							<p class="mb-2"><small><b>Dompet</b></small></p>
							<span
								v-for="w in widgetFilter.dompet"
								:key="w.id_dompet"
								class="badge badge-pill"
								:class="{'badge-purple-100' : w.id_dompet === filter.dompet, 'badge-light-gray' : w.id_dompet !== filter.dompet}"
								@click="setFilterDompet(w.id_dompet)"
								>
								{{w.nama}}
							</span>
						</div>
						<div v-if="widgetFilter.kategori.length && filter && page!='home'" class="mt-3">
							<p class="mb-2"><small><b>Kategori</b></small></p>
							<span
								v-for="w in widgetFilter.kategori"
								v-if="w.is_transfer === 0 && w.deleted === 0"
								class="badge badge-pill"
								:class="{'badge-purple-100' : w.id_kategori === filter.kategori, 'badge-light-gray' : w.id_kategori !== filter.kategori}"
								@click="setFilterKategori(w.id_kategori)"
								:key="w.id_kategori"
								>
								{{w.nama}}
							</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-purple btn-sm btn-block" @click="applyFilter">Terapkan Filter</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data(){
		return {

		}
	},
	methods: {
		setFilterDompet(id){
			this.filter.dompet = id
		},
		setFilterKategori(id){
			this.filter.kategori = id
		},
		setFilterWaktu(id){
			this.filter.waktu = id
		},
		applyFilter(){
			$("#filterModal").modal('hide')
			this.$store.dispatch('setCurrentFilter', this.filter)
			this.$emit('fetchDataFilter')
			this.$emit('filterTransaksi')
		}
	},
	mounted(){
		// console.log(this.widgetFilter)
	},
	props: {
		filter: {
			type: Object,
			default: () => {}
		},
		widgetFilter: {
			type: Object,
			default: () => {}
		},
		page: {
			type: String,
			default: () => {}
		}
	}
}
</script>