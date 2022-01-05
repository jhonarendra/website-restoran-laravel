<template>
	<div class="item-kategori">
		<div v-if="!isLoading" class="p-3">
			<div class="row">
				<div class="col-3 col-sm-2">
					<div class="kategori-icon" :class="kategori.color" style="margin:0 auto">
						<svg :class="kategori.icon" viewBox="0 0 24 24"><path d=""></path></svg>
					</div>
				</div>
				<div class="col-4 col-sm-5">
					<p class="mb-0"><b>{{kategori.nama}}</b></p>
				</div>
				<div class="col-5 col-sm-5">
					<div v-if="page != 'master'">
						<div class="row">
							<div v-if="page != 'anggaran'" class="col-12">
								<p class="mb-0">
									<span class="text-muted">
										{{(kategori.jenis == 1) ? 'Pemasukan' : 'Pengeluaran'}}
									</span>
								</p>
								<p class="mb-2">
									<b>
										{{
											(kategori.jenis == 1) ? 
											Number((kategori.debet).toFixed(2)).toLocaleString() : 
											Number((kategori.kredit).toFixed(2)).toLocaleString()
										}}

									</b>
									<span v-if="page != 'anggaran'">
										<span v-if="kategori.jenis == 1 && kategori.debet_rasio < 0" class="text-danger">({{ kategori.debet_rasio }}%)</span>
										<span v-if="kategori.jenis == 1 && kategori.debet_rasio >= 0" class="text-success">(+{{ kategori.debet_rasio }}%)</span>
										<span v-if="kategori.jenis == 2 && kategori.kredit_rasio < 0" class="text-success">({{ kategori.kredit_rasio }}%)</span>
										<span v-if="kategori.jenis == 2 && kategori.kredit_rasio >= 0" class="text-danger">(+{{ kategori.kredit_rasio }}%)</span>
									</span>
								</p>
							</div>
							<div v-else class="col-sm-6">
								<p class="mb-0">
									<span class="text-muted">
										{{(kategori.jenis == 1) ? 'Pemasukan' : 'Pengeluaran'}}
									</span>
								</p>
								<p class="mb-2">
									<b>
										{{
											(kategori.jenis == 1) ? 
											Number((kategori.debet).toFixed(2)).toLocaleString() : 
											Number((kategori.kredit).toFixed(2)).toLocaleString()
										}}

									</b>
									<span v-if="page != 'anggaran'">
										<span v-if="kategori.jenis == 1 && kategori.debet_rasio < 0" class="text-danger">({{ kategori.debet_rasio }}%)</span>
										<span v-if="kategori.jenis == 1 && kategori.debet_rasio >= 0" class="text-success">(+{{ kategori.debet_rasio }}%)</span>
										<span v-if="kategori.jenis == 2 && kategori.kredit_rasio < 0" class="text-success">({{ kategori.kredit_rasio }}%)</span>
										<span v-if="kategori.jenis == 2 && kategori.kredit_rasio >= 0" class="text-danger">(+{{ kategori.kredit_rasio }}%)</span>
									</span>
								</p>
							</div>
							<div v-if="page == 'anggaran'" class="col-sm-6" data-toggle="tooltip" data-placement="top"
								:title="(kategori.anggaran) ? kategori.anggaran.deskripsi : ''">
								<p v-if="page == 'anggaran' && kategori.anggaran" class="mb-0">
									<span class="text-muted">
										Anggaran
										<svg class="svg-information-outline svg-fill-purple svg-small" viewBox="0 0 24 24"><path d=""></path></svg>
									</span>
								</p>
								<p v-if="page == 'anggaran' && kategori.anggaran" class="mb-2">
									<b>{{Number((kategori.anggaran.nominal).toFixed(2)).toLocaleString()}}</b>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div v-if="page == 'anggaran' && kategori.anggaran" class="row">
				<div class="col-3 col-sm-2 text-right pr-0">
					{{parseInt(kategori.anggaran_rasio)}}%
				</div>
				<div class="col-9 col-sm-10">
					<div class="progress mt-1" style="height: 8px;width: 100%;">
						<div
							class="progress-bar"
							:class="{'bg-danger' : kategori.anggaran_rasio >= 100 && kategori.jenis === 2, 'bg-purple-500' : kategori.anggaran_rasio < 100 || kategori.jenis === 1}"
							role="progressbar"
							:style="{'width': parseInt(kategori.anggaran_rasio)+'%' }"
							:aria-valuenow="parseInt(kategori.anggaran_rasio)"
							aria-valuemin="0"
							aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
		<div v-else class="p-3">
			<div class="row">
				<div class="col-2">
					<div class="kategori-icon"></div>
				</div>
				<div class="col-5">
					<p class="mb-0"><span class="content-loader">Nama Kategori</span></p>
					<span class="content-loader">Deskripsi kategori</span>
				</div>
				<div class="col-5">
					<p class="mb-0">
						<span class="content-loader"></span>
					</p>
					<p class="mb-2">
						<span class="content-loader">99,999</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped="">
	.item-kategori {
		font-size: .8rem;
		cursor: pointer;
		transition: all .2s;
	}
	.kategori-icon {
		text-align: center;
		width: 40px;
		height: 40px;
		background: #D1C4E9;
		border-radius: 50%;
	}
	.kategori-icon svg {
		margin: 0 auto;
		margin-top:8px;
	}
	.kategori-icon svg path {
		fill: #673AB7;
	}
</style>

<script>
export default {
	data(){
		return {

		}
	},
	methods: {

	},
	props: {
		kategori: {
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
	},
	created(){
		
	},
	mounted(){
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	}
}
</script>