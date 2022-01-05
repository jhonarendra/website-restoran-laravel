<template>
	<div class="list-group">
		<div v-for="k in kategori" @click="lihatKategori(k)" class="list-group-item p-0">
			<ItemKategori
				:key="k.id_kategori"
				:kategori="k"
				:page="page"
				:isLoading="isLoading" />
		</div>
	</div>
</template>

<style scoped="">
	.card-add-kategori {
		font-size: .8rem;
		cursor: pointer;
		transition: all .2s;
	}
	.card-add-kategori:hover {
		background: #eee;
	}
	.kategori-icon {
		display: flex;
		align-items: center;
		width: 40px;
		height: 40px;
		background: #D1C4E9;
		border-radius: 50%;
	}
	.kategori-icon svg {
		margin: 0 auto;
	}
	.kategori-icon svg path {
		fill: #673AB7;
	}
</style>

<script>
import ItemKategori from './../components/ItemKategori.vue'
export default {
	data(){
		return {

		}
	},
	props: {
		kategori: {
			type: Array,
			default: () => {}
		},
		page: {
			type: String,
			default: () => {}
		},
		isLoading: {
			type: Boolean,
			default: () => {}
		},
		jenis: {
			type: Number,
			default: () => {}
		}
	},
	methods: {
		lihatKategori(data){
			if(this.page == 'anggaran'){
				if(data.anggaran){
					this.$emit('setAksiAnggaran', 'edit')
				} else {
					this.$emit('setAksiAnggaran', 'tambah')
				}
				this.$emit('setFormAnggaran', data)
				$("#formAnggaranModal").modal('show')
			} else if(this.page == 'master') {
				this.$store.dispatch('setKategoriEdit', data)
				$("#formKategoriModal").modal('show')
			} else {
				let curFilter = this.$store.getters.getFilter
				this.$store.dispatch('setCurrentFilter', {
					waktu: curFilter.waktu,
					tanggalStart: curFilter.tanggalStart,
					tanggalEnd: curFilter.tanggalEnd,
					bulan: curFilter.bulan,
					tahun: curFilter.tahun,
					kategori: data.id_kategori,
					groupBy: 2,
					dompet: data.id_dompet
				})
				this.$router.push({ path: '/transaksi'})
			}
		}
	},
	components: {
		ItemKategori
	},
	created(){

	}
}
</script>