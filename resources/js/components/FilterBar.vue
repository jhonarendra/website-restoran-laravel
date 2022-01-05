<template>
	<div id="filter-bar" class="container">
		<div class="d-flex">
			<div style="flex: 0 0 auto;">
				<button type="button" class="btn btn-light" data-toggle="modal" data-target="#filterModal">
					<svg class="svg-sort-variant" viewBox="0 0 24 24"><path d=""></path></svg>
				</button>
			</div>
			<div v-if="!isLoading && widgetFilter && filter" id="filter-waktu-bar" style="flex: 1 1 auto;">
				<vue-horizontal-list
					:items="widgetWaktu"
					:options="widgetFilterOption"
				>
					<template v-slot:default="{ item }">
						<span
							class="badge badge-pill my-2"
							:class="getBadgeFilterWaktuClass(item)"
							@click="setFilterWaktuSpesifik(item.id)"
							style="display: block"
							>
							{{item.nama}}
						</span>
					</template>
				</vue-horizontal-list>
			</div>
			<div v-if="isLoading" id="filter-waktu-bar" style="flex: 1 1 auto;">
				<vue-horizontal-list
					:items="widgetFilter.periode_waktu.bulan"
					:options="widgetFilterOption"
				>
					<template v-slot:default="{ item }">
						<span
							class="badge badge-pill content-loader"
							>
							waktu
						</span>
					</template>
				</vue-horizontal-list>
			</div>
			<div v-if="widgetFilter.groupBy.length && filter && page != 'home'">
				<button type="button" class="btn btn-light" @click="setFilterGroupBy">
					<svg 
						v-if="widgetFilter.groupBy.find(e => e.id === this.filter.groupBy).nama == 'tanggal'"
						class="svg-calendar"
						viewBox="0 0 24 24"
					>
						<path d=""></path>
					</svg>
					<svg 
						v-if="widgetFilter.groupBy.find(e => e.id === this.filter.groupBy).nama == 'kategori'"
						class="svg-format-list-bulleted-type"
						viewBox="0 0 24 24"
					>
						<path d=""></path>
					</svg>
					<svg 
						v-if="widgetFilter.groupBy.find(e => e.id === this.filter.groupBy).nama == 'klasik'"
						class="svg-book"
						viewBox="0 0 24 24"
					>
						<path d=""></path>
					</svg>

				</button>
			</div>
		</div>
	</div>
</template>

<style type="text/css">
	.badge-pill {
		cursor: pointer;
	}
	#filter-bar{
		background-color: white;
		padding: 5px 0;
	}
	#filter-waktu-bar {
		overflow: hidden;
		padding: 0 20px;

		/* white-space: nowrap;
		text-align: center;
		padding: 5px 0; */
	}
/* 	
	#filter-waktu-bar::-webkit-scrollbar {
		height: 5px;
	}
	#filter-waktu-bar::-webkit-scrollbar-track {
		background: transparent;
	}
	#filter-waktu-bar::-webkit-scrollbar-thumb {
		background: rgba(0,0,0,.5);
	}
	#app.dark #filter-waktu-bar::-webkit-scrollbar-thumb {
		background: rgba(255,255,255,.2);
	} */
	#filter-waktu-bar .vhl-item {
		padding-top: 0px;
		padding-bottom: 0px;
	}
	#filter-waktu-bar .vhl-btn-left,
	#filter-waktu-bar .vhl-btn-right {
		border-radius: 0;
		box-shadow: none;
		margin-top: -5px;
	}
</style>

<script>
import VueHorizontalList from 'vue-horizontal-list'

export default {
	data(){
		return {
			widgetFilterOption: {
				item: {
					padding: 0
				},
				responsive: [
					{ end: 576, size: 5 },
					// { start: 576, end: 768, size: 2 },
					// { start: 768, end: 1100, size: 3 },
					{ size: 10 },
				],
				position: {
					start: 1
				}
			}
		}
	},
	components: {
		VueHorizontalList
	},
	computed: {
		setKeyDownListener(){
			return this.$store.getters.getKeyDownListener
		},
		widgetWaktu () {
			let widget = []
			if (this.filter.waktu === 'bulan') {
				widget = this.widgetFilter.periode_waktu.bulan
			} else if (this.filter.waktu === 'tahun') {
				widget = this.widgetFilter.periode_waktu.tahun
			} else if (this.filter.waktu === 'semua') {
				widget = this.widgetFilter.periode_waktu.semua
			}
			return widget
		}
	},
	methods: {
		getBadgeFilterWaktuClass (item) {
			if (this.filter.waktu === 'bulan') {
				if (item.bulan === this.filter.bulan && item.tahun === this.filter.tahun) {
					return 'badge-purple-100'
				} else {
					return 'badge-light-gray'
				}
			} else if (this.filter.waktu === 'tahun') {
				if (item.tahun === this.filter.tahun) {
					return 'badge-purple-100'
				} else {
					return 'badge-light-gray'
				}
			} else if (this.filter.waktu === 'semua') {
				return 'badge-purple-100'
			}
		},
		setFilterGroupBy(){
			let index = this.widgetFilter.groupBy.findIndex(e => e.id === this.filter.groupBy)
			let next = index + 1
			if(next > this.widgetFilter.groupBy.length - 1){
				next = 0
			}

			// jika tampilan per rekening, set filter dompetnya
			if(next === 2){
				if(this.filter.dompet === 0){
					this.filter.dompet = this.widgetFilter.dompet[0].id_dompet
				}
			}
			this.filter.groupBy = this.widgetFilter.groupBy[next].id

			this.$store.dispatch('setCurrentFilter', this.filter)
			this.$emit('filterTransaksi')
		},
		setFilterWaktuSpesifik(id){
			let filterSpesifik = this.widgetFilter.periode_waktu[this.filter.waktu].find(e => e.id === id)
			switch(this.filter.waktu){
				case 'bulan':
					this.filter.bulan = filterSpesifik.bulan
					this.filter.tahun = filterSpesifik.tahun
					break

				case 'tahun':
					this.filter.bulan = 0
					this.filter.tahun = filterSpesifik.tahun
					break

				case 'semua':
					this.filter.bulan = 0
					this.filter.tahun = 0
					break
			}
			
			this.$store.dispatch('setCurrentFilter', this.filter)
			this.$emit('filterTransaksi')
		},
		//setFilterWaktuSpesifikBefore dan setFilterWaktuSpesifikAfter nanti gabung
		setFilterWaktuSpesifikBefore(){
			let found = false
			switch(this.filter.waktu){
				case 'bulan':
					// cek kalau di widgetFilter gak ada, biar gak loss
					let foundBulan = false
					let bulanBefore = this.filter.bulan - 1
					let tahunBefore = this.filter.tahun
					if(bulanBefore == 0){
						bulanBefore = 12
						tahunBefore = tahunBefore - 1
					}
					this.widgetFilter.periode_waktu[this.filter.waktu].forEach(e => {
						if(e.bulan == bulanBefore && e.tahun == tahunBefore){
							foundBulan = true
						}
					})

					if(foundBulan){
						this.filter.bulan = bulanBefore
						this.filter.tahun = tahunBefore
						found = true
					}
					break

				case 'tahun':
					let foundTahun = false
					this.widgetFilter.periode_waktu[this.filter.waktu].forEach(e => {
						if(e.tahun == this.filter.tahun - 1){
							foundTahun = true
						}
					})
					if(foundTahun){
						this.filter.tahun -= 1
						found = true
					}
					break

				case 'semua':
					// do nothing
					break

				default:
					//do nothing
					break
			}
			if(found){
				this.$store.dispatch('setCurrentFilter', this.filter)
				this.$emit('filterTransaksi')
			}
		},
		setFilterWaktuSpesifikAfter(){
			let found = false
			switch(this.filter.waktu){
				case 'bulan':
					// cek kalau di widgetFilter gak ada, biar gak loss
					let foundBulan = false
					let bulanNext = this.filter.bulan + 1
					let tahunNext = this.filter.tahun
					if(bulanNext == 13){
						bulanNext = 1
						tahunNext = tahunNext + 1
					}
					this.widgetFilter.periode_waktu[this.filter.waktu].forEach(e => {
						if(e.bulan == bulanNext && e.tahun == tahunNext){
							foundBulan = true
						}
					})

					if(foundBulan){
						this.filter.bulan = bulanNext
						this.filter.tahun = tahunNext
						found = true
					}
					break

				case 'tahun':
					let foundTahun = false
					this.widgetFilter.periode_waktu[this.filter.waktu].forEach(e => {
						if(e.tahun == this.filter.tahun + 1){
							foundTahun = true
						}
					})
					if(foundTahun){
						this.filter.tahun += 1
						found = true
					}
					break

				case 'semua':
					// do nothing
					break

				default:
					//do nothing
					break
			}
			if(found){
				this.$store.dispatch('setCurrentFilter', this.filter)
				this.$emit('filterTransaksi')
			}
		},
		setFilterPeriode(aksi){
			//aksi next atau before
			let curFilter = this.filter.waktu
			let index = this.widgetFilter.waktuDim.findIndex(e => e === curFilter)
			if(aksi === 'next'){
				index -= 1
				if(index < 0){
					index = this.widgetFilter.waktuDim.length - 1
				}
			} else if(aksi === 'before'){
				index += 1
				if(index > this.widgetFilter.waktuDim.length - 1){
					index = 0
				}
			}
			this.filter.waktu = this.widgetFilter.waktuDim[index]
			this.$store.dispatch('setCurrentFilter', this.filter)
			this.$emit('filterTransaksi')
			this.$emit('fetchDataFilter')
		},
		keyDownListener(e){
			switch(e.key){
				case 'ArrowRight':
					this.setFilterWaktuSpesifikBefore()
					break

				case 'ArrowLeft':
					this.setFilterWaktuSpesifikAfter()
					break
					
				case 'ArrowUp':
					this.setFilterPeriode('before')
					break
					
				case 'ArrowDown':
					this.setFilterPeriode('next')
					break
					
				default:
					break
			}
		}
	},
	mounted(){
		// this.keyDownListener = this.keyDownListener.bind(this)

		// if(!this.setKeyDownListener){
			// window.addEventListener('keydown', this.keyDownListener)
			// this.$store.dispatch('setKeyDown')
		// }
	},
	destroyed(){
		// window.removeEventListener('keydown', this.keyDownListener)
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
		},
		isLoading: {
			type: Boolean,
			default: () => {}
		}
	}
}
</script>