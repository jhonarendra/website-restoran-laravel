<template>
	<div class="modal fade" id="formKategoriModal" tabindex="-1" role="dialog" aria-labelledby="formKategoriLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form
					id="form-kategori"
					action="/api/kategori/add"
					@submit="submitForm"
					method="post"
				>
					<div class="modal-header">
						<h6 class="modal-title" id="formKategoriLabel">
							{{ (aksiKategori === 'tambah') ? 'Tambah' : 'Edit' }}
							Kategori
						</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" required="" placeholder="Nama Kategori" v-model="formKategori.nama">
						</div>
						<div class="form-group">
							<p><small>Jenis: {{(formKategori.jenis === 1) ? 'Pemasukan' : 'Pengeluaran'}}</small></p>
						</div>
						<div class="row">
							<div class="col-4">
								<p><small>Preview</small></p>
								<div class="icon-preview">
									<svg viewBox="0 0 24 24"><path d=""></path></svg>
								</div>
							</div>
							<div class="col-8">
								<div class="form-group">
									<p><small>Icon</small></p>
									<div
										v-for="i in iconKategori"
										:key="i.id_icon"
										class="icon-list"
										@click="setIcon(i.nama)">
										<svg :class="i.nama" class="svg-fill-purple" viewBox="0 0 24 24"><path d=""></path></svg>
									</div>
									<div style="clear:both"></div>
								</div>
								<div class="form-group">
									<p><small>Warna</small></p>
									<div v-for="c in color" :key="c.id_color" class="color-list" :class="c.nama" @click="setColor(c.nama)">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-sm btn-purple">Simpan</button>
						<button v-if="aksiKategori == 'edit'" type="button" class="btn btn-sm btn-danger" @click="hapusKategori(formKategori.id)">Hapus</button>
						<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
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
			iconKategori: [],
			color: []
		}
	},
	methods: {
		submitForm(e){
			e.preventDefault()
			let dispatch = ''
			if(this.aksiKategori === 'tambah'){
				dispatch = 'addKategori'
			} else if(this.aksiKategori === 'edit'){
				dispatch = 'updateKategori'
			}
			this.$store.dispatch(dispatch, this.formKategori).then( res => {
				if(res.status){
					this.$emit('fetchDataKategori')
					$("#formKategoriModal").modal('hide')
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
		},
		hapusKategori(id){
			this.$store.dispatch('hapusKategori', id).then( res => {
				if(res.status){
					this.$emit('fetchDataKategori')
					$("#formKategoriModal").modal('hide')
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
		},
		setIcon(val){
			this.formKategori.icon = val
			this.setIconPreview()
		},
		setColor(val){
			this.formKategori.color = val
			this.setIconPreview()
		},
		setIconPreview(){
			let ipEl = document.querySelector('.icon-preview')
			let ipSvgEl = document.querySelector('.icon-preview svg')
			ipEl.setAttribute('class', 'icon-preview')
			ipEl.classList.add((this.formKategori.color) ? this.formKategori.color : 'bg-light-purple')
			ipSvgEl.setAttribute('class', (this.formKategori.icon) ? this.formKategori.icon : 'svg-coin')
		}
	},
	computed: {
		aksiKategori(){
			return this.$store.getters.getAksiKategori
		},
		kategoriEdit(){
			return this.$store.getters.getKategoriEdit
		},
		formKategori(){
			return this.$store.getters.getFormKategori
		}
	},
	created(){
		this.$store.dispatch('fetchIconKategori').then(res => {
			if(res.data.status){
				this.iconKategori = res.data.data
			}
		})
		this.$store.dispatch('fetchColor').then(res => {
			if(res.data.status){
				this.color = res.data.data
			}
		})
		
	},
	mounted(){
		this.setIconPreview()
	},
	props: {
		// aksiKategori: {
		// 	type: String,
		// 	default: () => {}
		// }
	},
	watch: {
		formKategori(){
			this.setIconPreview()
		}
	}
}
</script>