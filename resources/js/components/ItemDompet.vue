<template>
	<div class="dompet-item" :class="itemClass">
		<div v-if="!isLoading" class="card">
			<div class="card-header border-0">
				<p class="mb-0"><b>{{dompet.nama}}</b></p>
				<span class="text-muted">{{dompet.deskripsi}}</span>
				<div class="dompet-icon" :class="dompet.color">
					<svg :class="dompet.icon" viewBox="0 0 24 24"><path d=""></path></svg>
				</div>
			</div>
			<div class="card-body row">
				<div v-if="dompet.saldo" class="col-6">
					<span>Saldo</span>
					<p v-if="dompet.saldo">Rp <b>{{ Number((dompet.saldo).toFixed(2)).toLocaleString()}}</b></p>
					<p v-else>Rp <b>0</b></p>
				</div>
				<div v-else class="col-6">
					<span style="color:transparent">Saldo</span>
					<p style="color:transparent">Rp</p>
				</div>
				<div v-if="dompet.neraca_bln_ini" class="col-6">
					<span>Neraca (bln ini)</span>
					<p v-if="dompet.neraca_bln_ini > 0" class="text-success">Rp <b>{{ Number((dompet.neraca_bln_ini).toFixed(2)).toLocaleString()}}</b></p>
					<p v-if="dompet.neraca_bln_ini <= 0" class="text-danger">Rp <b>{{ Number((dompet.neraca_bln_ini).toFixed(2)).toLocaleString()}}</b></p>
				</div>
			</div>
			<div v-if="actionButton === 'transaksi'" class="card-footer p-0">
				<button
					class="btn btn-light btn-block btn-sm"
					@click="lihatTransaksi(dompet)"
				>
					Lihat Transaksi
				</button>
			</div>
			<div v-if="actionButton === 'edit,hapus'" class="card-footer p-0">
				<div class="row m-0">
					<div class="col-6 p-0">
						<button
							class="btn btn-light btn-block btn-sm"
							data-toggle="modal"
							data-target="#formDompet"
							@click="$store.dispatch('setDompetEdit', dompet)"
						>
							Edit
						</button>
					</div>
					<div class="col-6 p-0">
						<button
							class="btn btn-light btn-block btn-sm text-danger"
							@click="hapusDompet(dompet.id_dompet)"
						>
							Hapus
						</button>
					</div>
				</div>
			</div>
		</div>
		<div v-else class="card">
			<div class="card-header border-0">
				<p class="mb-0">
					<span class="content-loader">Kas Bank</span>
				</p>
				<span class="content-loader">Deskripsi dompet</span>
				<div class="dompet-icon content-loader">
				</div>
			</div>
			<div class="card-body row">
				<div class="col-6">
					<span class="content-loader">Saldo</span>
					<p><span class="content-loader">99,999</span></p>
				</div>
				<div class="col-6">
					<span class="content-loader">Neraca (bln ini)</span>
					<p class="text-success"><span class="content-loader">9,999</span></p>
				</div>
			</div>
			<div class="card-footer p-0">
				<button class="btn btn-light btn-block btn-sm content-loader">Transaksi</button>
			</div>
		</div>
	</div>
</template>

<style scoped="">
	.dompet-item {
		display: inline-block;
		cursor: pointer;
		padding: 10px;
		font-size: .8rem;
	}
	.dompet-item.fixedWidth {
		width: 280px;
		/* width: 20vw; */
	}
	.dompet-item.relativeWidth {
		width: 25%;
	}
	.dompet-item:hover{

	}
	.dompet-icon {
		position: absolute;
		display: flex;
		right: 20px;
		top: 12px;
		align-items: center;
		width: 40px;
		height: 40px;
		/*background: #D1C4E9;*/
		border-radius: 50%;
	}
	.dompet-icon svg {
		margin: 0 auto;
	}
	.dompet-icon svg path {
		/*fill: #673AB7;*/
	}

	@media (max-width: 1100px){
		.dompet-item.fixedWidth {
			width: 33vw;
		}
		.dompet-item.relativeWidth {
			width: 50%;
		}
	}

	@media (max-width: 992px){
		.dompet-item.relativeWidth {
			width: 50%;
		}
	}
	
	@media (max-width: 768px){
		.dompet-item.fixedWidth {
			width: 48vw;
		}
	}
	@media (max-width: 576px){
		.dompet-item.relativeWidth {
			width: 100%;
		}
		.dompet-item.fixedWidth {
			width: 100%;
		}
	}
</style>

<script>
export default {
	data(){
		return {

		}
	},
	props: {
		dompet: {
			type: Object,
			default: () => {}
		},
		isLoading: {
			type: Boolean,
			default: () => {}
		},
		actionButton: {
			type: String,
			default: () => {}
		},
		itemClass: {
			type: String,
			default: () => {}
		}
	},
	methods: {
		lihatTransaksi(data){
			let curFilter = this.$store.getters.getFilter
			this.$store.dispatch('setCurrentFilter', {
				waktu: curFilter.waktu,
				tanggalStart: curFilter.tanggalStart,
				tanggalEnd: curFilter.tanggalEnd,
				bulan: curFilter.bulan,
				tahun: curFilter.tahun,
				kategori: 0,
				groupBy: 3,
				dompet: data.id_dompet
			})
			this.$router.push({ path: '/transaksi'})
		},
		hapusDompet(id){
			this.$store.dispatch('hapusDompet', id).then( res => {
				if(res.status){
					this.$emit('fetchDataDompet')
					$("#formDompet").modal('hide')
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
		}
	}
}
</script>