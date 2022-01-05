import kategoriApi from '../../services/kategoriApi'

const SET_DATA_KATEGORI = "SET_DATA_KATEGORI"
const SET_AKSI_KATEGORI = "SET_AKSI_KATEGORI"
const SET_FORM_KATEGORI = "SET_FORM_KATEGORI"

const state = {
	dataKategori: null,
	aksiKategori: 'tambah',
	formKategori: {
		id: '',
		nama: '',
		jenis: '',
		icon: '',
		color: ''
	}
}

const mutations = {
	[SET_DATA_KATEGORI](state, data){
		state.dataKategori = data
	},
	[SET_AKSI_KATEGORI](state, data){
		state.aksiKategori = data
	},
	[SET_FORM_KATEGORI](state, data){
		state.formKategori = data
	}
}

const actions = {
	async fetchDataKategori({commit}){
		if(!localStorage.kategori){
			return await kategoriApi.getDataKategori()
			.then(res => {
				commit(SET_DATA_KATEGORI, res.data.data)
				localStorage.setItem('kategori', JSON.stringify(res.data.data))
			})
			.catch(err => {
				console.log(err)
				alert(err)
			})
		} else {
			commit(SET_DATA_KATEGORI, JSON.parse(localStorage.kategori))
		}
	},
	async fetchStorageKategori({commit}){
		return await kategoriApi.getDataKategori()
		.then(res => {
			commit(SET_DATA_KATEGORI, res.data.data)
			localStorage.setItem('kategori', JSON.stringify(res.data.data))
		})
		.catch(err => {
			console.log(err)
			alert(err)
		})
	},
	async addKategori({dispatch, getters}, data){
		let passTest = true
		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}
		if(passTest){
			let kategoriDebet = []
			let kategoriKredit = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategoriDebet.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategoriKredit.push(e) : '')

			
			let newData = {
				id_kategori: +new Date(),
				id_user: kategoriDebet[0].id_user,
				nama: data.nama,
				icon: data.icon,
				color: data.color,
				jenis: data.jenis,
				is_transfer: 0,
				id_dompet_asal: 0,
				id_dompet_tujuan: 0,
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				deleted: 0,
				sync: 0
			}
			if(data.jenis === 1){
				kategoriDebet.push(newData)
			} else if(data.jenis === 2){
				kategoriKredit.push(newData)
			}

			let dataKategori = {
				status: true,
				msg: 'Berhasil menambah data',
				data: [kategoriDebet, kategoriKredit]
			}
			localStorage.setItem('kategori', JSON.stringify(dataKategori.data))

			return dataKategori
		}
	},
	async updateKategori({dispatch, getters}, data){
		let passTest = true
		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}
		if(passTest){
			let kategoriDebet = []
			let kategoriKredit = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategoriDebet.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategoriKredit.push(e) : '')

			let index = 0
			if(data.jenis === 1){
				index = kategoriDebet.findIndex(e => e.id_kategori === data.id)

				kategoriDebet[index].nama = data.nama
				kategoriDebet[index].jenis = data.jenis
				kategoriDebet[index].icon = data.icon
				kategoriDebet[index].color = data.color
				kategoriDebet[index].updated_at = new Date().toISOString()
				kategoriDebet[index].sync = 0

			} else if(data.jenis === 2){
				index = kategoriKredit.findIndex(e => e.id_kategori === data.id)

				kategoriKredit[index].nama = data.nama
				kategoriKredit[index].jenis = data.jenis
				kategoriKredit[index].icon = data.icon
				kategoriKredit[index].color = data.color
				kategoriKredit[index].updated_at = new Date().toISOString()
				kategoriKredit[index].sync = 0
			}
			

			let dataKategori = {
				status: true,
				msg: 'Berhasil mengedit data',
				data: [kategoriDebet, kategoriKredit]
			}
			localStorage.setItem('kategori', JSON.stringify(dataKategori.data))

			// lanjut edit attr keuangan yg pake kategori yg diedit



			return dataKategori
		}
	},
	async hapusKategori({dispatch, getters}, id){
		let passTest = true
		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}
		// untuk cek di transaksi, udah dipake? gak bisa dihps biar ga bentrok
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		if(passTest){
			let kategoriDebet = []
			let kategoriKredit = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategoriDebet.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategoriKredit.push(e) : '')

			
			if(kategoriDebet.length + kategoriKredit.length === 1){
				return {
					status: false,
					msg: 'Tidak boleh menghapus semua kategori'
				}
			}

			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')
			// cek kategori udh dipake di keuyangan?
			let isDipake = false
			keuangan.forEach(e => (e.id_kategori === id) ? isDipake = true : '')

			if(isDipake){
				return {
					status: false,
					msg: 'Kategori sudah dipakai pada transaksi, tidak bisa menghapus',
				}
			}

			let index = kategoriDebet.findIndex(e => e.id_kategori === id)
			if(index === -1){ // tidak ada di debet, cek di kredit
				index = kategoriKredit.findIndex(e => e.id_kategori === id)

				kategoriKredit[index].deleted = 1
				kategoriKredit[index].updated_at = new Date().toISOString()
				kategoriKredit[index].sync = 0
			} else {
				kategoriDebet[index].deleted = 1
				kategoriDebet[index].updated_at = new Date().toISOString()
				kategoriDebet[index].sync = 0
			}
			
			let dataKategori = {
				status: true,
				msg: 'Berhasil menghapus data',
				data: [kategoriDebet, kategoriKredit]
			}
			localStorage.setItem('kategori', JSON.stringify(dataKategori.data))

			// update attr kategori di transaksi yg kategorinya di hapus jadi null

			// hapus aja kategori transfer yg terkait kategori ini, dari xx, transfer ke xx
			

			return dataKategori
		}
	},
	setKategoriEdit({commit}, data){
		let formKategori = {
			id: data.id_kategori,
			nama: data.nama,
			jenis: data.jenis,
			icon: data.icon,
			color: data.color
		}
		commit(SET_FORM_KATEGORI, formKategori)
		commit(SET_AKSI_KATEGORI, 'edit')
	},
	setKategoriTambah({commit}, jenis){
		let formKategori = {
			id: 0,
			nama: '',
			jenis: jenis
		}
		commit(SET_FORM_KATEGORI, formKategori)
		commit(SET_AKSI_KATEGORI, 'tambah')
	}
}

const getters = {
	getDataKategori: state => {
		return state.dataKategori
	},
	getAksiKategori: state => {
		return state.aksiKategori
	},
	getFormKategori: state => {
		return state.formKategori
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}