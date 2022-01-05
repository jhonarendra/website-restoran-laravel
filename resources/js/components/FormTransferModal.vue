<template>
	<div class="modal fade" id="formTransferModal" tabindex="-1" role="dialog" aria-labelledby="formTransferModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form
					id="form-transfer"
					@submit="submitForm"
					action="/api/keuangan/addTransfer"
					method="post"
				>
					<div class="modal-header">
						<h6 class="modal-title" id="formTransferModalLabel">Transfer</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger" v-if="Object.keys(errors).length">
							Perbaiki form
						</div>
						<div>
							<input type="date" class="form-control form-control-sm" v-model="formTransfer.tanggal">
						</div>
						<div class="row mt-3">
							<div class="col-12">
								<input type="number" value="0" class="form-control form-control-sm text-right" v-model="formTransfer.nominal" required="" :class="{'is-invalid' : errors.nominal}">
								<small class="text-danger" v-if="errors.nominal">{{errors.nominal}}</small>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-5">
								<select class="form-control form-control-sm" v-model="formTransfer.dompetAsal" required="">
									<option
										v-for="e in dompet"
										v-if="e.id_dompet != 0"
										:value="e.id_dompet"
										:key="e.id_dompet"
									>
										{{e.nama}}
									</option>
								</select>
							</div>
							<div class="col-2 text-center">
								<svg class="svg-chevron-right" viewBox="0 0 24 24"><path d=""></path></svg>
							</div>
							<div class="col-5">
								<select class="form-control form-control-sm" v-model="formTransfer.dompetTujuan" required="" :class="{'is-invalid' : errors.dompetTujuan}">
									<option
										v-for="e in dompet"
										v-if="e.id_dompet != 0"
										:value="e.id_dompet"
										:key="e.id_dompet"
									>
										{{e.nama}}
									</option>
								</select>
								<small class="text-danger" v-if="errors.dompetTujuan">{{errors.dompetTujuan}}</small>
							</div>
							
						</div>
						<div class="mt-3">
							<textarea class="form-control form-control-sm" placeholder="Uraian" v-model="formTransfer.uraian"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-sm btn-block btn-purple">Simpan</button>
						<button v-if="aksiTransfer == 'edit'" type="button" class="btn btn-sm btn-light btn-block" @click="hapusTransfer"><span class="text-danger">Hapus</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<style scoped="">

</style>

<script>
export default {
	data(){
		return {
			errors: {}
		}
	},
	methods: {
		submitForm(e){
			e.preventDefault()
			this.errors = {}

			let errors = {}
			if(this.formTransfer.dompetAsal === this.formTransfer.dompetTujuan){
				errors['dompetTujuan'] = 'Dompet tujuan tidak boleh sama dengan dompet asal'
			}
			if(this.formTransfer.nominal === 0){
				errors['nominal'] = 'Nominal tidak boleh 0'
			}

			this.errors = errors

			if(Object.keys(errors).length === 0){
				let dispatch = null
				if(this.aksiTransfer == 'tambah'){
					dispatch = 'addTransfer'
				} else {
					dispatch = 'updateTransfer'
				}

				this.$store.dispatch(dispatch, this.formTransfer).then( res => {
					if(res.status){
						this.$store.dispatch('setDataFilter').then( res => {
							this.$emit('fetchDataFilter')
						})
						this.$emit('filterTransaksi')
						$("#formTransferModal").modal('hide')
					} else {
						console.log(res.msg)
						alert(res.msg)
					}
				})
			}
		},
		hapusTransfer(){
			if(this.aksiTransfer == 'edit'){
				this.$store.dispatch('hapusTransfer', this.formTransfer.id).then( res => {
					if(res.status){
						this.$store.dispatch('setDataFilter').then( res => {
							this.$emit('fetchDataFilter')
						})
						this.$emit('filterTransaksi')
						$("#formTransferModal").modal('hide')
					} else {
						console.log(res.msg)
						alert(res.msg)
					}
				})
			}
		}
	},
	created(){
		
	},
	watch: {
		dompet(newVal, oldVal){
			if(newVal.length){
				this.formTransfer.dompetAsal = newVal[0].id_dompet
				this.formTransfer.dompetTujuan = (newVal[1]) ? newVal[1].id_dompet : 0
			}
		}
	},
	props: {
		formTransfer: {
			type: Object,
			default: () => {}
		},
		aksiTransfer: {
			type: String,
			default: () => {}
		},
		page: {
			type: String,
			default: () => {}
		},
		dompet: {
			type: Array,
			default: () => {}
		}
	}
}
</script>