<template>
	<div class="modal fade" id="formTransaksiModal" tabindex="-1" role="dialog" aria-labelledby="formTransaksiModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form
					id="form-transaksi"
					@submit="submitForm"
					action="/api/keuangan/addTransaksi"
					method="post"
				>
					<div class="modal-header">
						<h6 class="modal-title" id="formTransaksiModalLabel">Transaksi</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-6">
								<button
									id="btn-pendapatan"
									type="button"
									class="btn btn-block btn-sm"
									:class="{'btn-success' : form.jenis == 1, 'btn-secondary' : form.jenis == 2}"
									@click="setJenis(1)">
									Pendapatan
								</button>
							</div>
							<div class="col-6">
								<button
									id="btn-pengeluaran"
									type="button"
									class="btn btn-block btn-sm"
									:class="{'btn-danger' : form.jenis == 2, 'btn-secondary' : form.jenis == 1}"
									@click="setJenis(2)">
									Pengeluaran
								</button>
							</div>
						</div>
						<div class="mt-3">
							<input type="date" class="form-control form-control-sm" v-model="form.tanggal">
						</div>
						<div class="row mt-3">
							<div class="col-md-3">
								<select class="form-control form-control-sm" v-model="form.dompet">
									<option
										v-if="e.id_dompet != 0"
										v-for="(e, i) in dompet"
										:value="e.id_dompet"
										:key="e.id_dompet"
									>
										{{e.nama}}
									</option>
								</select>
							</div>
							<div class="col-md-9">
								<input type="number" value="0" class="form-control form-control-sm text-right" v-model="form.nominal">
							</div>
						</div>
						<div class="mt-3">
							<span
								v-if="w.is_transfer === 0 && w.deleted === 0 && form.jenis == w.jenis"
								v-for="w in kategori"
								class="badge badge-pill"
								:class="{'badge-purple-100' : w.id_kategori === form.kategori, 'badge-light-gray' : w.id_kategori !== form.kategori}"
								@click="form.kategori = w.id_kategori"
								:key="w.id_kategori"
								>
								{{w.nama}}
							</span>
						</div>
						<div class="mt-3">
							<textarea class="form-control form-control-sm" placeholder="Uraian" v-model="form.uraian"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-purple btn-block btn-sm">Simpan</button>
						<button v-if="aksi == 'edit'" type="button" class="btn btn-sm btn-light btn-block" @click="hapusTransaksi"><span class="text-danger">Hapus</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<style scoped="">
	#btn-pendapatan:hover{
		background-color: #28a745;
	    border-color: #28a745;
	}
	#btn-pengeluaran:hover{
		background-color: #dc3545;
	    border-color: #dc3545;
	}
</style>

<script>
export default {
	data(){
		return {

		}
	},
	methods: {
		submitForm(e){
			e.preventDefault()
			let dispatch = null
			if(this.aksi == 'tambah'){
				dispatch = 'addTransaksi'
			} else if(this.aksi == 'edit'){
				dispatch = 'updateTransaksi'
			}
			this.$store.dispatch(dispatch, this.form).then( res => {
				if(res.status){
					// update data filter, misalnya aja nanti ganti bulan/tahun
					this.$store.dispatch('setDataFilter').then( res => {
						this.$emit('fetchDataFilter')
					})
					this.$emit('filterTransaksi')
					$("#formTransaksiModal").modal('hide')
					if(this.page != 'transaksi' && this.aksi == 'tambah'){
						this.$router.push({ path: '/transaksi'})
					}
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
		},
		hapusTransaksi(){
			if(this.aksi == 'edit'){
				this.$store.dispatch('hapusTransaksi', this.form.id).then( res => {
					if(res.status){
						this.$store.dispatch('setDataFilter').then( res => {
							this.$emit('fetchDataFilter')
						})
						this.$emit('filterTransaksi')
						$("#formTransaksiModal").modal('hide')
					} else {
						console.log(res.msg)
						alert(res.msg)
					}
				})
			}
		},
		setJenis(val){
			this.form.jenis = val
			this.form.kategori = this.kategori.find(e => e.jenis === val).id_kategori
		}
	},
	created(){
		
	},
	watch: {
		kategori(newVal, oldVal){
			if(newVal.length){
				this.form.kategori = newVal[0].id_kategori
			}
		},
		dompet(newVal, oldVal){
			if(newVal.length){
				this.form.dompet = newVal[0].id_dompet
			}
		}
	},
	props: {
		form: {
			type: Object,
			default: () => {}
		},
		aksi: {
			type: String,
			default: () => {}
		},
		page: {
			type: String,
			default: () => {}
		},
		kategori: {
			type: Array,
			default: () => {}
		},
		dompet: {
			type: Array,
			default: () => {}
		}
	}
}
</script>