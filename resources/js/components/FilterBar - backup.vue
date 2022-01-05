<template>
	<div id="filter-bar" class="container">
		<div class="d-flex">
			<div style="flex: 0 0 auto;">
				<button type="button" class="btn btn-light" data-toggle="modal" data-target="#filterModal">
					<svg class="svg-sort-variant" viewBox="0 0 24 24"><path d=""></path></svg>
				</button>
			</div>
			<div style="flex: 0 0 auto">
				<button type="button" class="btn btn-light" @click="setFilterWaktuSpesifikAfter()">
					<svg class="svg-chevron-left" viewBox="0 0 24 24"><path d=""></path></svg>
				</button>
			</div>
			<div v-if="!isLoading && widgetFilter && filter" id="filter-waktu-bar" style="flex: 1 1 auto;">
				<span
					v-if="filter.waktu == 'bulan'"
					v-for="w in widgetFilter.periode_waktu.bulan"
					class="badge badge-pill"
					:class="{'badge-purple-100' : w.bulan === filter.bulan && w.tahun === filter.tahun, 'badge-light-gray' : w.bulan !== filter.bulan || w.tahun !== filter.tahun}"
					@click="setFilterWaktuSpesifik(w.id)"
					>
					{{w. nama}}
				</span>
				<span
					v-if="filter.waktu == 'tahun'"
					v-for="w in widgetFilter.periode_waktu.tahun"
					class="badge badge-pill"
					:class="{'badge-purple-100' : w.tahun === filter.tahun, 'badge-light-gray' : w.tahun !== filter.tahun}"
					@click="setFilterWaktuSpesifik(w.id)"
					>
					{{w. nama}}
				</span>

				<span
					v-if="filter.waktu == 'semua'"
					v-for="w in widgetFilter.periode_waktu.semua"
					class="badge badge-pill badge-purple-100"
					@click="setFilterWaktuSpesifik(w.id)"
					>
					{{w.tgl_start + ' - ' + new Date().toLocaleDateString('id-ID', {year: 'numeric',month: 'short',day: 'numeric'})}}
				</span>
			</div>
			<div v-if="isLoading" id="filter-waktu-bar" style="flex: 1 1 auto;">
				<span
					v-for="w in widgetFilter.periode_waktu.bulan"
					class="content-loader"
					>
					waktu
				</span>
			</div>
			<div>
				<button type="button" class="btn btn-light" @click="setFilterWaktuSpesifikBefore()">
					<svg class="svg-chevron-right" viewBox="0 0 24 24"><path d=""></path></svg>
				</button>
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
		overflow: scroll;
		white-space: nowrap;
		text-align: center;
		padding: 5px 0;
	}
	
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
	}
</style>

<script>
export default {
	data(){
		return {
			
		}
	},
	computed: {
		setKeyDownListener(){
			return this.$store.getters.getKeyDownListener
		}
	},
	methods: {
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