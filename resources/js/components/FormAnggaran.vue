<template>
	<div class="modal fade" id="formAnggaranModal" tabindex="-1" role="dialog" aria-labelledby="formAnggaranModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form
					id="form-transaksi"
					@submit="submitForm"
					action="/api/keuangan/addTransaksi"
					method="post"
				>
					<div class="modal-header">
						<h6 class="modal-title" id="formAnggaranModalLabel">Anggaran {{formAnggaran.namaKategori}}</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-4 pr-0">
								<button
									type="button"
									class="btn btn-sm btn-block btn-periode"
									:class="{'btn-success' : formAnggaran.periode == 'bulan', 'btn-secondary' : formAnggaran.periode != 'bulan'}"
									@click="formAnggaran.periode = 'bulan'"
									:disabled="aksiAnggaran == 'edit'">
									Bulan
								</button>
							</div>
							<div class="col-4 pr-0">
								<button
									type="button"
									class="btn btn-sm btn-block btn-periode"
									:class="{'btn-success' : formAnggaran.periode == 'tahun', 'btn-secondary' : formAnggaran.periode != 'tahun'}"
									@click="formAnggaran.periode = 'tahun'"
									:disabled="aksiAnggaran == 'edit'">
									Tahun
								</button>
							</div>
							<div class="col-4">
								<button
									type="button"
									class="btn btn-sm btn-block btn-periode"
									:class="{'btn-success' : formAnggaran.periode == 'semua', 'btn-secondary' : formAnggaran.periode != 'semua'}"
									@click="formAnggaran.periode = 'semua'"
									:disabled="aksiAnggaran == 'edit'">
									Semua
								</button>
							</div>
						</div>
						<div class="row mt-3">
							<div v-if="formAnggaran.periode == 'bulan'" class="col pr-0">
								<select
									class="form-control form-control-sm"
									v-model="formAnggaran.bulan"
									:disabled="aksiAnggaran == 'edit'"
								>
									<option value="1">Januari</option>
									<option value="2">Feb</option>
									<option value="3">Mar</option>
									<option value="4">Apr</option>
									<option value="5">Mei</option>
									<option value="6">Jun</option>
									<option value="7">Juli</option>
									<option value="8">Agustus</option>
									<option value="9">Sep</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>
									<option value="12">Dec</option>
								</select>
							</div>
							<div v-if="formAnggaran.periode != 'semua'" class="col">
								<select
									class="form-control form-control-sm"
									v-model="formAnggaran.tahun"
									:disabled="aksiAnggaran == 'edit'"
								>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
								</select>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12">
								<input type="number" value="0" class="form-control form-control-sm text-right" v-model="formAnggaran.nominal">
							</div>
						</div>
						<div class="mt-3">
							<textarea class="form-control form-control-sm" placeholder="Uraian" v-model="formAnggaran.deskripsi"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-sm btn-purple btn-block">Simpan</button>
						<button v-if="aksiAnggaran == 'edit'" type="button" class="btn btn-sm btn-light btn-block" @click="hapusAnggaran">
							<span class="text-danger">Hapus Anggaran</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<style scoped="">
	.btn-periode:hover{
		background-color: #28a745;
	    border-color: #28a745;
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
			let dispatch = 'addAnggaran'
			if(this.aksiAnggaran == 'tambah'){
				dispatch = 'addAnggaran'
			} else if(this.aksiAnggaran == 'edit'){
				dispatch = 'updateAnggaran'
			}
			this.$store.dispatch(dispatch, this.formAnggaran).then( res => {
				if(res.status){
					this.$emit('filterTransaksi')
					$("#formAnggaranModal").modal('hide')
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
			
		},
		hapusAnggaran(){
			if(this.aksiAnggaran == 'edit'){
				this.$store.dispatch('hapusAnggaran', this.formAnggaran.idAnggaran).then( res => {
					if(res.status){
						this.$emit('filterTransaksi')
						$("#formAnggaranModal").modal('hide')
					} else {
						console.log(res.msg)
						alert(res.msg)
					}
				})
			}
		}
	},
	created(){
		// setTimeout(() => {
		// 	let dataFilter = this.$store.getters.getDataFilter.data
		// 	this.kategori = dataFilter.kategori
		// 	this.dompet = dataFilter.dompet
		// 	this.form.kategori = this.kategori[0].id_kategori
		// 	this.form.dompet = this.dompet[0].id_dompet
		// 	this.form.tanggal = new Date().toISOString().slice(0, 10)
		// }, 2000)
		
	},
	mounted(){

	},
	props: {
		formAnggaran: {
			type: Object,
			default: () => {}
		},
		aksiAnggaran: {
			type: String,
			default: () => {}
		},
		page: {
			type: String,
			default: () => {}
		}
	}
}
</script>