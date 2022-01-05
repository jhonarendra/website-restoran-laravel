<template>
	<div id="transaksi" role="tablist">
		<!-- <div v-if="transaksi.length === 0" class="text-center">
			<small>Belum ada data</small>
		</div> -->
		<div v-if="filter.groupBy == 1 && t.keuangan && t.keuangan.length" class="card card-collapse" v-for="t in transaksi" :key="t.id">
			<a data-toggle="collapse" :href="'#collapse_'+t.id" aria-expanded="true" :aria-controls="'collapse_'+t.id">
				<div class="card-header d-flex" role="tab" :id="'heading_'+t.id">
					<p class="mb-0">
						<svg viewBox="0 0 24 24"><path d=""></path></svg>
						<b>{{t.str_tanggal}}</b>
						<span class="badge badge-pill badge-purple-100-noborder p-1">{{(t.keuangan) ? t.keuangan.length : '0'}}</span>
					</p>
					<span
						:class="{'text-success' : t.neraca > 0, 'text-danger' : t.neraca < 0}"
						style="margin-left:auto"
					>
						<b>{{Number((t.neraca).toFixed(2)).toLocaleString()}}</b>
					</span>
				</div>
			</a>

			<div :id="'collapse_'+t.id" class="collapse show" role="tabpanel" :aria-labelledby="'heading_'+t.id">
				<div class="card-body">
					<ul class="list-transaksi">
						<li
							v-for="k in t.keuangan"
							:key="k.id_keuangan"
							class="item-transaksi row pb-2"
							data-toggle="modal"
							:data-target="( k.kategori.is_transfer === 0 ) ? '#formTransaksiModal' : '#formTransferModal'"
							@click="showTransaksi(k)"
						>
							<div class="col-8">
								<div class="row">
									<div class="col-sm-6">
										<p class="pl-3 mb-0"><small><b>{{k.kategori.nama}}</b></small></p>
									</div>
									<div class="col-sm-6">
										<p class="pl-3 mb-0"><small>{{k.uraian}}</small></p>
										<p class="pl-3 mb-0"><small class="text-muted">{{k.dompet.nama}}</small></p>
									</div>
								</div>
							</div>
							<div class="col-4 text-right p-1">
								<small>{{(k.debet > 0) ? Number((k.debet).toFixed(2)).toLocaleString() : Number((k.kredit).toFixed(2)).toLocaleString()}}</small>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div v-if="filter.groupBy == 2 && t.keuangan && t.keuangan.length" class="card card-collapse" v-for="t in transaksi" :key="t.id_kategori">
			<a data-toggle="collapse" :href="'#collapse_'+t.id_kategori" aria-expanded="false" :aria-controls="'collapse_'+t.id_kategori" class="collapsed">
				<div class="card-header d-flex" role="tab" :id="'heading_'+t.id_kategori">
					<p class="mb-0">
						<svg viewBox="0 0 24 24"><path d=""></path></svg>
						<b>{{t.nama}}</b>
						<span class="badge badge-pill badge-purple-100-noborder p-1">{{(t.keuangan) ? t.keuangan.length : '0'}}</span>
					</p>
					<span
						:class="{'text-success' : t.neraca > 0, 'text-danger' : t.neraca < 0}"
						style="margin-left:auto"
					>
						<b>{{Number((t.neraca).toFixed(2)).toLocaleString()}}</b>
					</span>
				</div>
			</a>
			<div :id="'collapse_'+t.id_kategori" class="collapse" role="tabpanel" :aria-labelledby="'heading_'+t.id_kategori">
				<div class="card-body">
					<ul class="list-transaksi">
						<li
							v-for="k in t.keuangan"
							:key="k.id_keuangan"
							class="item-transaksi row pb-2"
							data-toggle="modal"
							:data-target="( k.kategori.is_transfer === 0 ) ? '#formTransaksiModal' : '#formTransferModal'"
							@click="showTransaksi(k)"
						>
							<div class="col-4 col-sm-3">
								<p class="pl-3"><small><b>{{k.str_tanggal}}</b></small></p>
							</div>
							<div class="col-5 col-sm-6">
								<p class="mb-0"><small>{{k.uraian}}</small></p>
								<small class="text-muted">{{k.dompet.nama}}</small>
							</div>
							<div class="col-3 text-right p-1">
								<small>{{(k.debet > 0) ? Number((k.debet).toFixed(2)).toLocaleString() : Number((k.kredit).toFixed(2)).toLocaleString()}}</small>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div v-if="filter.groupBy == 3">
			<div class="row pb-3 m-0">
				<div
					class="col text-center nav-item"
					:class="{'active':d.id_dompet == filter.dompet}"
					v-for="d in dataFilterDompet"
					v-if="d.id_dompet != 0"
					:key="d.id_dompet"
					@click="setFilterDompet(d.id_dompet)"
				>
					<small>{{d.nama}}</small>
				</div>
				<!-- <div class="col text-center nav-item">
					<small>Bank BNI</small>
				</div>
				<div class="col text-center nav-item">
					<small>Deposito BNI</small>
				</div>
				<div class="col text-center nav-item">
					<small>Bibit</small>
				</div>
				<div class="col text-center nav-item">
					<small>Amplop</small>
				</div> -->
			</div>
			<table class="table table-sm table-hover">
				<thead>
					<tr class="bg-purple-500 text-white">
						<th>Uraian</th>
						<th class="text-center">Tipe</th>
						<th class="text-center">Nominal</th>
						<th class="text-center">Saldo Akhir</th>
					</tr>
				</thead>
				<tbody>
					<tr
						v-for="t in transaksi"
						v-if="t.kategori"
						data-toggle="modal"
						:data-target="( t.kategori.is_transfer === 0 ) ? '#formTransaksiModal' : '#formTransferModal'"
						class="item-transaksi bg-purple-100"
						@click="showTransaksi(t)"
					>
						<td :class="{'bg-success' : t.highlight === 1}">
							<b>{{t.kategori.nama}}</b><br />
							{{t.uraian}}<br />
							{{t.tanggal}}
						</td>
						<td :class="{'bg-success' : t.highlight === 1}" class="text-center">
							{{(t.debet > 0) ? 'D' : 'K'}}
						</td>
						<td :class="{'bg-success' : t.highlight === 1}" class="text-right">
							{{(t.debet > 0) ? Number((t.debet).toFixed(2)).toLocaleString() : Number((t.kredit).toFixed(2)).toLocaleString()}}
						</td>
						<td :class="{'bg-success' : t.highlight === 1}" class="text-right">
							{{Number((t.saldo).toFixed(2)).toLocaleString()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<style scoped="">
	a[data-toggle='collapse'], a[data-toggle='collapse']:hover{
		color: #212529;
		text-decoration: none;
	}
	.card-collapse {
		border: 0;
		margin: 2px 0;
	}
	.card-collapse .card-header {
		/*background: #D1C4E9 !important;*/
		border-radius: 5px;
		font-size: .8rem;
		border-bottom: 0;
		padding: 10px 5px;
	}
	.card-collapse .card-body {
		padding: 0;
	}
	.card-collapse .card-header svg path{
		d: path("M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z");
	}
	 
	.card-collapse .collapsed .card-header svg path{
		d: path("M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z");
	}
	ul.list-transaksi{
		margin: 0;
		padding: 0;
	}
	.item-transaksi {
		cursor: pointer;
		transition: .2s all;
	}
	li.item-transaksi {
		margin: 0;
		border-radius: 5px;
	}
	.table-sm{
		font-size: .8rem;
	}
	.table thead th {
		border-bottom: 0;
	}
	.table td, .table th {
		border-top: 0;
	}
	.nav-item {
		border-bottom: 2px solid transparent;
		padding: 10px;
		cursor: pointer;
		transition: all .3s;
	}
	.nav-item.active, .nav-item:hover {
		border-bottom: 2px solid #673AB7;
	}
</style>

<script>
export default {
	data(){
		return {
			
		}
	},
	props: {
		transaksi: {
			type: Array,
			default: () => {}
		},
		filter: {
			type: Object,
			default: () => {}
		},
		dataFilterDompet: {
			type: Array,
			default: () => {}
		}
	},
	methods: {
		showTransaksi(t){
			if(t.kategori.is_transfer === 0){
				this.$emit('setFormTransaksi', t)
			} else {
				this.$emit('setFormTransfer', t)
			}
			
		},
		setFilterDompet(id){
			this.filter.dompet = id
			this.$emit('filterTransaksi')
		}
	}
}
</script>