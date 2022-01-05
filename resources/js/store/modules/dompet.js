import dompetApi from '../../services/dompetApi'

const SET_DATA_DOMPET = "SET_DATA_DOMPET"
const SET_AKSI_DOMPET = "SET_AKSI_DOMPET"
const SET_FORM_DOMPET = "SET_FORM_DOMPET"

const state = {
	dataDompet: null,
	aksiDompet: 'tambah',
	formDompet: {
		id: '',
		nama: '',
		icon: 'svg-coin',
		color: 'bg-light-purple',
		deskripsi: ''
	}
}

const mutations = {
	[SET_DATA_DOMPET](state, data){
		state.dataDompet = data
	},
	[SET_AKSI_DOMPET](state, data){
		state.aksiDompet = data
	},
	[SET_FORM_DOMPET](state, data){
		state.formDompet = data
	}
}

const actions = {
	async fetchDataDompet({commit}){
		if(!localStorage.dompet){
			return await dompetApi.getDataDompet()
			.then(res => {
				commit(SET_DATA_DOMPET, res.data.data)
				localStorage.setItem('dompet', JSON.stringify(res.data.data))
			})
			.catch(err => {
				console.log(err)
				alert(err)
			})
		} else {
			commit(SET_DATA_DOMPET, JSON.parse(localStorage.dompet))
		}
	},
	async fetchStorageDompet({commit}){
		return await dompetApi.getDataDompet()
		.then(res => {
			commit(SET_DATA_DOMPET, res.data.data)
			localStorage.setItem('dompet', JSON.stringify(res.data.data))
		})
		.catch(err => {
			console.log(err)
			alert(err)
		})
	},
	async addDompet({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}
		if(passTest){
			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')
			
			let maxDompet = 5
			if(dompet.length === maxDompet){
				return {
					status: false,
					msg: 'Tidak dapat menambah dompet'
				}
			}

			let newData = {
				id_dompet: +new Date(),
				id_user: dompet[0].id_user,
				nama: data.nama,
				deskripsi: data.deskripsi,
				icon: data.icon,
				color: data.color,
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				deleted: 0,
				sync: 0
			}
			dompet.push(newData)
			
			let dataDompet = {
				status: true,
				msg: 'Berhasil menambah data',
				data: dompet
			}
			localStorage.setItem('dompet', JSON.stringify(dataDompet.data))


			// lanjut nambah kategori transfer ke, dari

			return dataDompet
		}
	},
	async updateDompet({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}
		if(passTest){
			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			let index = dompet.findIndex(e => e.id_dompet === data.id)

			// dompet[index].id_user = dompet[0].id_user
			dompet[index].nama = data.nama
			dompet[index].deskripsi = data.deskripsi
			dompet[index].icon = data.icon
			dompet[index].color = data.color
			dompet[index].updated_at = new Date().toISOString()
			dompet[index].sync = 0
			
			let dataDompet = {
				status: true,
				msg: 'Berhasil mengupdate data',
				data: dompet
			}
			localStorage.setItem('dompet', JSON.stringify(dataDompet.data))

			// update attr dompet di transaksi yg dompetnya di update

			// update nama kategori yg ada dompet asal / dompet tujuannya dompet ini
			// misalnya Transfer ke Kas, kalo ubah nama dompet


			return dataDompet
		}
	},
	async hapusDompet({dispatch, getters, commit}, id){
		let passTest = true
		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}
		// untuk cek transaksi
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}
		if(passTest){
			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			if(dompetTest.length === 1){
				return {
					status: false,
					msg: 'Tidak boleh menghapus semua dompet'
				}
			}

			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')
			console.log('tes')
			// cek dompet udh dipake di keuyangan?
			let isDipake = false
			keuangan.forEach(e => (e.id_dompet === id) ? isDipake = true : '')
			if(isDipake){
				return {
					status: false,
					msg: 'Dompet sudah dipakai pada transaksi, tidak bisa menghapus',
				}
			}

			// ntah knp g mau
			// let index = dompet.findIndex(e => e.id_dompet === id)
			let index = 0
			dompet.forEach((e,i) => {
				if(e.id_dompet === id){
					index = i
				}
			})

			// cek dulu ada gak transaksi, kategori transfer
			

			dompet[index].deleted = 1
			dompet[index].updated_at = new Date().toISOString(),
			dompet[index].sync = 0
			
			let dataDompet = {
				status: true,
				msg: 'Berhasil menghapus data',
				data: dompet
			}
			console.log(dataDompet)
			localStorage.setItem('dompet', JSON.stringify(dataDompet.data))

			// update attr dompet di transaksi yg dompetnya di hapus jadi null

			// hapus aja kategori transfer yg terkait dompet ini, dari xx, transfer ke xx
			

			return dataDompet
		}
	},
	setDompetEdit({commit}, data){
		let formDompet = {
			id: data.id_dompet,
			nama: data.nama,
			deskripsi: data.deskripsi,
			icon: data.icon,
			color: data.color
		}
		commit(SET_FORM_DOMPET, formDompet)
		commit(SET_AKSI_DOMPET, 'edit')
	},
	setDompetTambah({commit}){
		let formDompet = {
			id: 0,
			nama: '',
			deskripsi: ''
		}
		commit(SET_FORM_DOMPET, formDompet)
		commit(SET_AKSI_DOMPET, 'tambah')
	}
}

const getters = {
	getDataDompet: state => {
		return state.dataDompet
	},
	getAksiDompet: state => {
		return state.aksiDompet
	},
	getFormDompet: state => {
		return state.formDompet
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}