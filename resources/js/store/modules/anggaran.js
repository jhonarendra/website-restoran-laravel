import anggaranApi from '../../services/anggaranApi'

const SET_DATA_ANGGARAN = "SET_DATA_ANGGARAN"
const SET_ANGGARAN = "SET_ANGGARAN"

const state = {
	dataAnggaran: null, // ini yg sudah ada kategorinya
	anggaran: null // anggaran polosan dari tabel
}

const mutations = {
	[SET_DATA_ANGGARAN](state, data){
		state.dataAnggaran = data
	},
	[SET_ANGGARAN](state, data){
		state.anggaran = data
	},
}

const actions = {
	async fetchAnggaran({commit}){
		if(!localStorage.anggaran){
			await anggaranApi.getAnggaran()
			.then(res => {
				commit(SET_ANGGARAN, res.data.data)
				localStorage.setItem('anggaran', JSON.stringify(res.data.data))
			})
			.catch(err => {
				console.log(err)
				alert(err)
			})
		} else {
			commit(SET_ANGGARAN, JSON.parse(localStorage.anggaran))
		}
	},
	async fetchStorageAnggaran({commit}){
		await anggaranApi.getAnggaran()
		.then(res => {
			commit(SET_ANGGARAN, res.data.data)
			localStorage.setItem('anggaran', JSON.stringify(res.data.data))
		})
		.catch(err => {
			console.log(err)
			alert(err)
		})
	},
	async getKategoriWithAnggaran({dispatch, getters, commit}, filter){
		let passTest = true
		
		await dispatch('fetchAnggaran')
		let anggaranTest = getters.getAnggaran
		if(!anggaranTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}

		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			let anggaran = []
			anggaranTest.forEach(e => (e.deleted != 1) ? anggaran.push(e) : '')

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')

			let bulan_filter = 0
			let tahun_filter = 0
			let periode = 0

			if(filter.waktu != ''){
				periode = filter.waktu
			}
			if(filter.waktu === 'bulan' && filter.bulan != 0){
				bulan_filter = filter.bulan
				tahun_filter = filter.tahun
			}
			if(filter.waktu === 'tahun' && filter.tahun != 0){
				bulan_filter = 0
				tahun_filter = filter.tahun
			}



			kategori.forEach(kat => {
				let debet = 0
				let kredit = 0
				let id_dompet = 0
				keuangan.forEach(k => {
					let tgl_k = new Date(k.tanggal)
					let bulan_k = tgl_k.getMonth() + 1
					let tahun_k = tgl_k.getFullYear()

					if(periode === 'bulan'){
						if(k.id_kategori === kat.id_kategori && bulan_filter === bulan_k && tahun_filter === tahun_k){
							debet += k.debet
							kredit += k.kredit
							id_dompet = k.id_dompet
						}
					} else if(periode === 'tahun'){
						if(k.id_kategori === kat.id_kategori && tahun_filter === tahun_k){
							debet += k.debet
							kredit += k.kredit
							id_dompet = k.id_dompet
						}
					} else if(periode === 'semua'){
						if(k.id_kategori === kat.id_kategori){
							debet += k.debet
							kredit += k.kredit
							id_dompet = k.id_dompet
						}
					}
				})

				kat.debet = debet
				kat.kredit = kredit
				kat.id_dompet = id_dompet


				// cari anggaran
				let anggaran_ini = null
				if(periode === 'bulan'){
					anggaran.forEach(a => {
						if(a.id_kategori === kat.id_kategori && a.bulan === bulan_filter && a.tahun === tahun_filter){
							anggaran_ini = a
						}
					})
				} else if(periode === 'tahun') {
					anggaran.forEach(a => {
						if(a.id_kategori === kat.id_kategori && a.bulan === 0 && a.tahun === tahun_filter){
							anggaran_ini = a
						}
					})
				} else if(periode === 'semua'){
					anggaran.forEach(a => {
						if(a.id_kategori === kat.id_kategori && a.bulan === 0 && a.tahun === 0){
							anggaran_ini = a
						}
					})
				}

				kat.anggaran = anggaran_ini

				let anggaran_rasio = 0
				if(anggaran_ini){
					let realisasi = kat.debet
					if(kat.jenis === 2){
						realisasi = kat.kredit
					}
					if(realisasi != 0){
						anggaran_rasio = Number(realisasi/anggaran_ini.nominal*100).toFixed(2)
						if(anggaran_ini.nominal === 0){
							anggaran_rasio = 100
						}
					}
				}
				kat.anggaran_rasio = anggaran_rasio
			})

			let kat_debet = []
			let kat_kredit = []
			kategori.forEach(e => (e.jenis === 1) ? kat_debet.push(e) : kat_kredit.push(e))

			commit(SET_DATA_ANGGARAN, [kat_debet, kat_kredit])
			return [kat_debet, kat_kredit]
		}
	},
	async addAnggaran({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchAnggaran')
		let anggaranTest = getters.getAnggaran
		if(!anggaranTest){
			passTest = false
		}

		await dispatch('fetchUserLogin')
		let userLogin = getters.getUserLogin
		if(!userLogin){
			passTest = false
		}

		if(passTest){
			let anggaran = []
			anggaranTest.forEach(e => (e.deleted != 1) ? anggaran.push(e) : '')

			anggaran = anggaran.reverse()

			let newData = {
				id_anggaran: +new Date(),
				id_user: userLogin.id_user,
				id_kategori: data.idKategori,
				bulan: data.bulan,
				tahun: data.tahun,
				deskripsi: data.deskripsi,
				nominal: parseInt(data.nominal),
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				sync: 0
			}

			anggaran.push(newData)

			// balikin
			anggaran = anggaran.reverse()

			let dataAnggaran = {
				status: true,
				msg: 'Berhasil menambah data',
				data: anggaran
			}
			localStorage.setItem('anggaran', JSON.stringify(dataAnggaran.data))

			return dataAnggaran
		}
	},
	async updateAnggaran({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchAnggaran')
		let anggaranTest = getters.getAnggaran
		if(!anggaranTest){
			passTest = false
		}

		if(passTest){
			let anggaran = []
			anggaranTest.forEach(e => (e.deleted != 1) ? anggaran.push(e) : '')

			// cari index
			let index = anggaran.findIndex(e => e.id_anggaran === data.idAnggaran)

			anggaran[index].nominal = parseInt(data.nominal)
			anggaran[index].deskripsi = data.deskripsi
			anggaran[index].sync = 0
			anggaran[index].updated_at = new Date().toISOString()

			let dataAnggaran = {
				status: true,
				msg: 'Berhasil mengupdate data',
				data: anggaran
			}
			localStorage.setItem('anggaran', JSON.stringify(dataAnggaran.data))

			return dataAnggaran
		}
	},
	async hapusAnggaran({dispatch, getters, commit}, id){
		let passTest = true
		await dispatch('fetchAnggaran')
		let anggaranTest = getters.getAnggaran
		if(!anggaranTest){
			passTest = false
		}

		if(passTest){
			let anggaran = []
			anggaranTest.forEach(e => (e.deleted != 1) ? anggaran.push(e) : '')

			// cari index
			let index = anggaran.findIndex(e => e.id_anggaran === id)

			anggaran[index].deleted = 1
			anggaran[index].sync = 0
			anggaran[index].updated_at = new Date().toISOString()

			let dataAnggaran = {
				status: true,
				msg: 'Berhasil menghapus data',
				data: anggaran
			}
			localStorage.setItem('anggaran', JSON.stringify(dataAnggaran.data))

			return dataAnggaran
		}
	},
}

const getters = {
	getDataAnggaran: state => {
		return state.dataAnggaran
	},
	getAnggaran: state => {
		return state.anggaran
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}