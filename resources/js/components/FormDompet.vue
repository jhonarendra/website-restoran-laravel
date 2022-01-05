<template>
	<div class="modal fade" id="formDompet" tabindex="-1" role="dialog" aria-labelledby="formDompetLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form
					id="form-dompet"
					action="/api/dompet/add"
					@submit="submitForm"
					method="post"
				>
					<div class="modal-header">
						<h6 class="modal-title" id="formDompetLabel">
							{{ (aksiDompet === 'tambah') ? 'Tambah' : 'Edit' }}
							Dompet
						</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" required="" placeholder="Nama Dompet" v-model="formDompet.nama">
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" required="" placeholder="Deskripsi singkat" v-model="formDompet.deskripsi">
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
										v-for="i in iconDompet"
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
			iconDompet: [],
			color: []
		}
	},
	methods: {
		submitForm(e){
			e.preventDefault()
			let dispatch = null

			if(this.aksiDompet === 'tambah'){
				dispatch = 'addDompet'
			} else if(this.aksiDompet === 'edit'){
				dispatch = 'updateDompet'
			}

			this.$store.dispatch(dispatch, this.formDompet).then( res => {
				if(res.status){
					this.$emit('fetchDataDompet')
					this.$emit('fetchDataFilter', true) // is update true, biar update local storage
					$("#formDompet").modal('hide')
				} else {
					console.log(res.msg)
					alert(res.msg)
				}
			})
		},
		setIcon(val){
			this.formDompet.icon = val
			this.setIconPreview()
			
			// let ilEl = document.querySelector('.icon-list svg.'+val)
			// ilEl.parent.classList.add('active')

			// let ilValEl = document.querySelector('.icon-list svg.'+val)
			// ilValEl.classList.add('active')
		},
		setColor(val){
			this.formDompet.color = val
			this.setIconPreview()
		},
		setIconPreview(){
			let ipEl = document.querySelector('.icon-preview')
			let ipSvgEl = document.querySelector('.icon-preview svg')
			ipEl.setAttribute('class', 'icon-preview')
			ipEl.classList.add((this.formDompet.color) ? this.formDompet.color : 'bg-light-purple')
			ipSvgEl.setAttribute('class', (this.formDompet.icon) ? this.formDompet.icon : 'svg-coin')
		}
	},
	computed: {
		aksiDompet(){
			return this.$store.getters.getAksiDompet
		},
		dompetEdit(){
			return this.$store.getters.getDompetEdit
		},
		formDompet(){
			return this.$store.getters.getFormDompet
		}
	},
	created(){
		this.$store.dispatch('fetchIconDompet').then(res => {
			if(res.data.status){
				this.iconDompet = res.data.data
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
		// aksiDompet: {
		// 	type: String,
		// 	default: () => {}
		// }
	},
	watch: {
		formDompet(){
			this.setIconPreview()
		}
	}
}
</script>