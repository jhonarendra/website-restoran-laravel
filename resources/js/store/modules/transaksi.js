import transaksiApi from '../../services/transaksiApi'

const SET_DATA_TRANSAKSI = "SET_DATA_TRANSAKSI"
const SET_TRANSAKSI = "SET_TRANSAKSI"
const SET_WIDGET_FILTER = "SET_WIDGET_FILTER"
const SET_FILTER = "SET_FILTER"
const SET_FILTER_IS_FETCHED = "SET_FILTER_IS_FETCHED"

const state = {
	dataTransaksi: null, // semua transaksi tanpa di filter, masuk ke ke localstorage untuk di kelola tanpa mysql, tadinya di transaksi, cuma males ganti
	transaksi: null, // ini gk kepake?
	filter: {
		waktu: 'semua',
		dompet: 0,
		kategori: 0,
		groupBy: 1,
		tanggalStart: '',
		tanggalEnd: '',
		bulan: 0,
		tahun: 0
	},
	widgetFilter: {
		waktuDim: [],
		waktu: [{}, {}, {}],
		periode_waktu: {
			bulan: [{}, {}, {}],
			tahun: [{}, {}],
			semua: [{}]
		},
		groupBy: [{}, {}, {}],
		dompet: [],
		kategori: []
	},
	search: '',
	filterFetched: false, // ini gak dipake
}

const mutations = {
	[SET_DATA_TRANSAKSI](state, transaksi){
		state.dataTransaksi = transaksi
	},
	[SET_TRANSAKSI](state, transaksi){
		state.transaksi = transaksi
	},
	[SET_WIDGET_FILTER](state, widgetFilter){
		state.widgetFilter = widgetFilter
	},
	[SET_FILTER](state, filter){
		state.filter = filter
	},
	[SET_FILTER_IS_FETCHED](state, val){
		state.filterFetched = val
	}
}

const actions = {
	async fetchTransaksi({commit}){
		if(!localStorage.transaksi){
			await transaksiApi.getTransaksi(0)
			.then(res => {
				commit(SET_DATA_TRANSAKSI, res.data.data)
				localStorage.setItem('transaksi', JSON.stringify(res.data.data))
			})
			.catch(err => {
				console.log(err)
				alert(err)
			})
		} else {
			commit(SET_DATA_TRANSAKSI, JSON.parse(localStorage.transaksi))
		}
	},
	async fetchStorageTransaksi({commit}){
		await transaksiApi.getTransaksi(0)
		.then(res => {
			commit(SET_DATA_TRANSAKSI, res.data.data)
			localStorage.setItem('transaksi', JSON.stringify(res.data.data))
		})
		.catch(err => {
			console.log(err)
			alert(err)
		})
	},
	async filterTransaksi({dispatch, getters, commit}, filter){
		let today = new Date()
		let passTest = true

		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}

		if(passTest){
			// filter dulu flag deletenya, di local di delete, belum tentu di online udh delete soalnya
			let keuanganAll = [] // ini semua data yg gak difilter, diperluin ternyata (di klasik)
			let keuangan = []
			transaksiTest.forEach(e => {
				if(e.deleted != 1){
					keuanganAll.push(e)
					keuangan.push(e)
				}
			})

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')

			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')


			let dataTransaksi = null // status, msg, data
			let data = null // data transaksi

			let tmp_keuangan = []

			// filter bulan
			if(filter.bulan != 0 && filter.waktu == 'bulan'){
				if(filter.tahun != 0){
					tmp_keuangan = []
					keuangan.forEach(e => {
						let tgl_k = new Date(e.tanggal)
						if(tgl_k.getMonth()+1 === filter.bulan && tgl_k.getFullYear() === filter.tahun){
							tmp_keuangan.push(e)
						}
					})
					keuangan = tmp_keuangan
				}
			}

			// filter tahun
			if(filter.tahun != 0 && filter.waktu == 'tahun'){
				tmp_keuangan = []
				keuangan.forEach(e => {
					let tgl_k = new Date(e.tanggal)
					if(tgl_k.getFullYear() === filter.tahun){
						tmp_keuangan.push(e)
					}
				})
				keuangan = tmp_keuangan
			}

			// filter dompet
			if(filter.dompet != 0){
				tmp_keuangan = []
				keuangan.forEach(e => {
					if(e.id_dompet === filter.dompet){
						tmp_keuangan.push(e)
					}
				})
				keuangan = tmp_keuangan
			}

			// filter kategori
			if(filter.kategori != 0){
				tmp_keuangan = []
				keuangan.forEach(e => {
					if(e.id_kategori === filter.kategori){
						tmp_keuangan.push(e)
					}
				})
				keuangan = tmp_keuangan
			}


			let nama_group = ''
			if(filter.groupBy){
				nama_group = filter.groupBy
				if(filter.groupBy >= 1 && filter.groupBy <= 3){
				    let dataGroupBy = [
				    	{id: 1, nama: 'tanggal'},
				    	{id: 2, nama: 'kategori'},
				    	{id: 3, nama: 'klasik'}
				    ]
				    dataGroupBy.forEach((d, i) => {
				    	if(d.id == filter.groupBy){
				    		nama_group = d.nama
				    	}
				    })
				}
			}

			switch(nama_group){
				case 'tanggal':
					let arr_tanggal = []
					let iter = 0
					keuangan.forEach(e => {
						if(arr_tanggal.findIndex(a => a.tanggal === e.tanggal) == -1){
							arr_tanggal.push({
								id: iter,
								tanggal: e.tanggal,
								str_tanggal: new Date(e.tanggal).toLocaleDateString('id-ID', {year: 'numeric', month: 'short', day: 'numeric'}),
								debet: 0,
								kredit: 0,
								neraca: 0,
								keuangan: null
							})
							iter += 1
						}
					})
					arr_tanggal.forEach(e => {
						let debet = 0
						let kredit = 0
						let neraca = 0
						let dataKeuangan = []
						keuangan.forEach(k => {
							if(e.tanggal === k.tanggal){
								debet += k.debet
								kredit += k.kredit
								dataKeuangan.push(k)
							}
						})
						neraca = debet - kredit
						e.debet = debet 
						e.kredit = kredit 
						e.neraca = neraca
						e.keuangan = dataKeuangan
					})

					data = arr_tanggal

					break

				case 'kategori':
					kategori.forEach(e => {
						let debet = 0
						let kredit = 0
						let neraca = 0
						let dataKeuangan = []
						keuangan.forEach(k => {
							if(e.id_kategori === k.id_kategori){
								debet += k.debet
								kredit += k.kredit
								let k_tanggal = new Date(k.tanggal)
								let strTanggal = k_tanggal.toLocaleDateString('id-ID', {
									year: 'numeric',
									month: 'short',
									day: 'numeric'
								})
								if(k_tanggal.getFullYear() === today.getFullYear()){
									strTanggal = k_tanggal.toLocaleDateString('id-ID', {
										month: 'short',
										day: 'numeric'
									})
								}
								k.str_tanggal = strTanggal
								dataKeuangan.push(k)
							}
						})
						neraca = debet - kredit
						e.debet = debet 
						e.kredit = kredit 
						e.neraca = neraca
						e.keuangan = dataKeuangan
					})

					data = kategori

					break

				case 'klasik':
					if(filter.dompet == 0){
						filter.dompet = dompet[0].id_dompet
					}
					let saldo_sebelum = 0
					if(filter.waktu === 'bulan'){
						let str_bulan = (filter.bulan < 10) ? '0'+filter.bulan : filter.bulan
						let tanggal_filter = new Date(filter.tahun+'-'+ str_bulan + '-01')

						// keuangan filter per dompet
						keuanganAll.forEach(k => {
							let tgl_k = new Date(k.tanggal)
							if(tgl_k < tanggal_filter && k.id_dompet === filter.dompet){
								saldo_sebelum += k.debet - k.kredit
							}
						})
					} else if(filter.waktu == 'tahun'){
						let tanggal_filter = new Date(filter.tahun+'-01-01')

						// keuangan filter per dompet
						keuanganAll.forEach(k => {
							let tgl_k = new Date(k.tanggal)
							if(tgl_k < tanggal_filter && k.id_dompet === filter.dompet){
								saldo_sebelum += k.debet - k.kredit
							}
						})
					}

					// balik dulu, karena defaultnya desc keuangannya
					keuangan = keuangan.reverse()
					keuangan.forEach(k => {
						saldo_sebelum += k.debet - k.kredit
						k.saldo = saldo_sebelum
					})
					keuangan = keuangan.reverse()
					data = keuangan

					break

				case 'default':
					break
			}

			dataTransaksi = {
				status: true,
				msg: 'Berhasil mengambil data',
				data: data
			}

			return dataTransaksi
		}
	},
	setCurrentFilter({commit}, filter){
		commit(SET_FILTER, filter)
		localStorage.setItem('filter', JSON.stringify(filter))
	},
	fetchCurrentFilter({state, commit}){
		if(!localStorage.filter){
			localStorage.setItem('filter', JSON.stringify(state.filter))
		} else {
			commit(SET_FILTER, JSON.parse(localStorage.filter))
			commit(SET_FILTER_IS_FETCHED, true)
		}
	},
	async fetchDataFilter({dispatch, commit, getters}, isUpdate){
		// is_update -> jika true, update data di localstorage
		if(!localStorage.widgetFilter){
			await dispatch('setDataFilter')
		} else {
			if(isUpdate){
				await dispatch('setDataFilter')
			} else {
				commit(SET_WIDGET_FILTER, JSON.parse(localStorage.widgetFilter))
			}
		}
	},
	async setDataFilter({dispatch, getters, commit}){
		let today = new Date()
		let year_now = today.getFullYear()
		let month_now = today.getMonth()+1
		if(month_now < 10){
			month_now = '0'+month_now
		}
		let date_now = today.getDate()
		if(date_now < 10){
			date_now = '0'+date_now
		}
		let dateNow = year_now+'-'+month_now+'-'+date_now
		let passTest = true

		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')
			keuangan = keuangan.sort(compare({key: 'tanggal', order: 'desc'}))

			let trx_pertama = keuangan[keuangan.length-1]
			let trx_terakhir = keuangan[0]
			let tanggal_start = ''
			let tanggal_end = ''
			if(trx_pertama){
			    tanggal_start = trx_pertama.tanggal
			}
			if(trx_terakhir){
			    tanggal_end = trx_terakhir.tanggal
			}

			// console.log('start', tanggal_start)
			// console.log('ed', tanggal_end)

			// bulan
			if(!trx_pertama){
			    tanggal_start = dateNow
			}
			if(!trx_terakhir){
			    tanggal_end = dateNow
			}
			let periode_waktu = {
				bulan: null,
				tahun: null,
				semua: null
			}
			let waktu_bulan = []

			let tgl_start = new Date(tanggal_start)
			let tgl_end = new Date(tanggal_end)

			let bulan_start = tgl_start.getMonth() + 1
			let tahun_start = tgl_start.getFullYear()

			let bulan_end = tgl_end.getMonth() + 1
			let tahun_end = tgl_end.getFullYear()

			// console.log('start', bulan_start, tahun_start)
			// console.log('ed', bulan_end, tahun_end)

			let tahun_diff = tahun_end - tahun_start
			// console.log('tahundiff', tahun_diff)
			let iter = 0
			for(let i = 0; i <= tahun_diff; i++){
				let bulan_start_tahun_ini = 1
				let bulan_end_tahun_ini = 1
				if(i == 0){ // berarti tahun mulai
					bulan_start_tahun_ini = bulan_start
					bulan_end_tahun_ini = 12
					if(tahun_diff === 0){
						bulan_end_tahun_ini = bulan_end
					}
				} else if(i == tahun_diff){ // berarti tahun terakhir
					bulan_start_tahun_ini = 1
					bulan_end_tahun_ini = bulan_end
				} else { // berarti 12 bulan
					bulan_start_tahun_ini = 1
					bulan_end_tahun_ini = 12
				}
				for(let j = bulan_start_tahun_ini; j <= bulan_end_tahun_ini; j++){
					let tahun_ini = i + tahun_start
					let bulan_ini = j
					if(bulan_ini < 10){
						bulan_ini = '0'+bulan_ini
					}
					let tanggal_ini = tahun_ini+'-'+bulan_ini+'-01' // 2021-04-01 gitu

					let date_tanggal_ini = new Date(tanggal_ini)
					let nama = date_tanggal_ini.toLocaleDateString('id-ID', {
						year: 'numeric',
						month: 'short'
					})
					if(tahun_ini == year_now){
						nama = date_tanggal_ini.toLocaleDateString('id-ID', {
							month: 'short'
						})
					}
					waktu_bulan.push({
						id : iter,
				        nama : nama,
				        bulan : parseInt(bulan_ini), 
				        tahun : tahun_ini
					})
					iter += 1
				}
			}

			waktu_bulan = waktu_bulan.reverse()
			periode_waktu['bulan'] = waktu_bulan


			// tahun
			if(!trx_pertama){
			    tanggal_start = year_now
			}
			let waktu_tahun = []

			for(let i = 0; i <= tahun_diff; i++){
				waktu_tahun.push({
					id : i,
			        nama : i + tahun_start,
			        tahun : i + tahun_start
				})
			}
			waktu_tahun = waktu_tahun.reverse()
			periode_waktu['tahun'] = waktu_tahun



			// semua
			if(!trx_pertama){
			    tanggal_start = today.toLocaleDateString('id-ID', {
					year: 'numeric',
					month: 'short',
					day: 'numeric'
				})
			} else {
				tanggal_start = new Date(trx_pertama.tanggal)
			    tanggal_start = tanggal_start.toLocaleDateString('id-ID', {
					year: 'numeric',
					month: 'short',
					day: 'numeric'
				})
			}
			tanggal_end = today.toLocaleDateString('id-ID', {
				year: 'numeric',
				month: 'short',
				day: 'numeric'
			})
			
			periode_waktu['semua'] = [{
				id: 1,
				nama: tanggal_start+' - '+tanggal_end,
				tgl_start: tanggal_start
			}]

			let waktu_dim = ['bulan', 'tahun', 'semua']

			let dompet = []

			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')
			dompet.push({
				id_dompet: 0,
				nama: 'Semua'
			})
			

			let kategori = []
			kategoriTest[0].forEach(e => {
				kategori.push(e)
			})
			kategoriTest[1].forEach(e => {
				kategori.push(e)
			})


			kategori.push({
				id_kategori: 0,
				nama: 'Semua',
				is_transfer: 0,
				deleted: 0
			})

			let group_by = [
				{ id: 1, nama: 'tanggal' },
				{ id: 2, nama: 'kategori' },
				{ id: 3, nama: 'klasik' }
			]

			let data = {
		        waktu_dim: waktu_dim,
		        waktu: [], // ini gak dipake nanti
		        dompet: dompet,
		        kategori: kategori,
		        group_by: group_by,
		        periode_waktu: periode_waktu
		    }
			commit(SET_WIDGET_FILTER, data)
			localStorage.setItem('widgetFilter', JSON.stringify(data))
		}
	},
	async addTransaksi({dispatch, getters, commit}, data){

		// insert ke localstorage
		// idnya pake +new Date()
		// nanti pikirin mekanisme sinkronisasinya
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}
		await dispatch('fetchUserLogin')
		let userLogin = getters.getUserLogin
		if(!userLogin){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			let maxTrx = 1000
			if(transaksi.length === maxTrx){
				return {
					status: false,
					msg: 'Tidak dapat menambah transaksi'
				}
			}

			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')

			// reverse dulu
			keuangan = keuangan.reverse()

			// cari kategori dan dompetnya
			let kategori_ini = kategori.find(e => e.id_kategori === data.kategori)
			let dompet_ini = dompet.find(e => e.id_dompet === data.dompet)

			let debet = (data.jenis === 1) ? data.nominal : 0
			let kredit = (data.jenis === 2) ? data.nominal : 0
			

			let newData = {
				id_keuangan: +new Date(),
				id_user: userLogin.id_user,
				id_dompet: data.dompet,
				id_kategori: data.kategori,
				tanggal: data.tanggal,
				debet: parseInt(debet),
				kredit: parseInt(kredit),
				uraian: data.uraian,
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				deleted: 0,
				kategori: kategori_ini,
				dompet: dompet_ini,
				sync: 0
			}
			keuangan.push(newData)

			// balikin
			keuangan = keuangan.reverse()

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil mengambil data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))

			return dataTransaksi
		}
	},
	async updateTransaksi({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}


		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')

			// cari yg diedit
			let index = keuangan.findIndex(e => e.id_keuangan === data.id)

			// cari kategori dan dompetnya
			let kategori_ini = kategori.find(e => e.id_kategori === data.kategori)
			let dompet_ini = dompet.find(e => e.id_dompet === data.dompet)
			let debet = (data.jenis === 1) ? data.nominal : 0
			let kredit = (data.jenis === 2) ? data.nominal : 0

			// update
			keuangan[index].id_dompet = data.dompet
			keuangan[index].id_kategori = data.kategori
			keuangan[index].tanggal = data.tanggal
			keuangan[index].debet = parseInt(debet)
			keuangan[index].kredit = parseInt(kredit)
			keuangan[index].uraian = data.uraian
			keuangan[index].updated_at = new Date().toISOString()
			keuangan[index].kategori = kategori_ini
			keuangan[index].dompet = dompet_ini
			keuangan[index].sync = 0

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil mengupdate data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))

			return dataTransaksi
		}
	},
	async hapusTransaksi({dispatch, getters, commit}, id){
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			// cari yg dihapus
			let index = keuangan.findIndex(e => e.id_keuangan === id)

			// update
			keuangan[index].deleted = 1
			keuangan[index].sync = 0

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil menghapus data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))

			return dataTransaksi
		}
	},
	async addTransfer({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')


			// reverse dulu
			keuangan = keuangan.reverse()

			// cari kategori yg baru
			let kategori_baru = await dispatch('getIdKategoriAsalTujuan', {dompet: dompet, kategori: kategori, data: data})
			let id_kat_dompet_asal = kategori_baru.id_kat_dompet_asal
			let id_kat_dompet_tujuan = kategori_baru.id_kat_dompet_tujuan

			// cari detail kateri dan dompetna
			let kategori_ini_asal = kategori.find(e => e.id_kategori === id_kat_dompet_asal)
			let kategori_ini_tujuan = kategori.find(e => e.id_kategori === id_kat_dompet_tujuan)

			let dompet_ini_asal = dompet.find(e => e.id_dompet === data.dompetAsal)
			let dompet_ini_tujuan = dompet.find(e => e.id_dompet === data.dompetTujuan)

			// insert 
			let newData = {
				id_keuangan: +new Date(),
				id_user: keuangan[0].id_user,
				id_dompet: data.dompetAsal,
				id_kategori: id_kat_dompet_tujuan,
				tanggal: data.tanggal,
				debet: parseInt(0),
				kredit: parseInt(data.nominal),
				uraian: data.uraian,
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				deleted: 0,
				kategori: kategori_ini_tujuan,
				dompet: dompet_ini_asal,
				sync: 0
			}
			keuangan.push(newData)

			let newDataTujuan = {
				id_keuangan: parseInt(+new Date())+1,
				id_user: keuangan[0].id_user,
				id_dompet: data.dompetTujuan,
				id_kategori: id_kat_dompet_asal,
				tanggal: data.tanggal,
				debet: parseInt(data.nominal),
				kredit: parseInt(0),
				uraian: data.uraian,
				created_at: new Date().toISOString(),
				updated_at: new Date().toISOString(),
				deleted: 0,
				kategori: kategori_ini_asal,
				dompet: dompet_ini_tujuan,
				sync: 0
			}
			keuangan.push(newDataTujuan)

			// balikin
			keuangan = keuangan.reverse()

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil menambah data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))
			return dataTransaksi
		}
	},
	getIdKategoriAsalTujuan({commit}, data){
		let kat_dompet_asal = data.kategori.find(e => e.is_transfer === 1 && e.id_dompet_asal === data.data.dompetAsal)
		// TODO if empty, insert
		// soon
		let id_kat_dompet_asal = kat_dompet_asal.id_kategori

		let kat_dompet_tujuan = data.kategori.find(e => e.is_transfer === 1 && e.id_dompet_tujuan === data.data.dompetTujuan)
		// TODO if empty, insert
		// soon
		let id_kat_dompet_tujuan = kat_dompet_tujuan.id_kategori
		
		return {
			id_kat_dompet_asal: id_kat_dompet_asal,
			id_kat_dompet_tujuan: id_kat_dompet_tujuan
		}
		
	},
	async updateTransfer({dispatch, getters, commit}, data){
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		await dispatch('fetchDataDompet')
		let dompetTest = getters.getDataDompet
		if(!dompetTest){
			passTest = false
		}

		await dispatch('fetchDataKategori')
		let kategoriTest = getters.getDataKategori
		if(!kategoriTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')

			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? kategori.push(e) : '')


			// reverse dulu
			keuangan = keuangan.reverse()

			// ini berarti ngedit 2 transaksi keuangan
			// yg satu debetnya, yg satu kreditnya
			// mari kita coba

			// cari index yg diedit
			let index = keuangan.findIndex(e => e.id_keuangan === data.id)
			let is_debet = (keuangan[index].debet > 0) ? true : false

			let dompet_pair = null
			let index_pair = null
			if(is_debet){
				// jika debet = ini dompet tujuan, cari pasangan kategorinya yang kredit (dompet asalnya)
				dompet_pair = keuangan[index].kategori.id_dompet_asal
				index_pair = keuangan.findIndex(e => e.id_dompet === dompet_pair && e.tanggal === keuangan[index].tanggal && e.kredit === keuangan[index].debet)
				if(index_pair === -1){
					return {
						status: false,
						msg: 'Transaksi tidak ditemukan'
					}
				}
			} else {
				// jika kredit = ini dompet asal, cari pasangan kategorinya yang debet  (dompet tujuannya)
				dompet_pair = keuangan[index].kategori.id_dompet_tujuan
				index_pair = keuangan.findIndex(e => e.id_dompet === dompet_pair && e.tanggal === keuangan[index].tanggal && e.debet === keuangan[index].kredit)
				if(index_pair === -1){
					return {
						status: false,
						msg: 'Transaksi tidak ditemukan'
					}
				}
			}

			console.log('index pair', index_pair)

			let kategori_baru = await dispatch('getIdKategoriAsalTujuan', {dompet: dompet, kategori: kategori, data: data})
			let id_kat_dompet_asal = kategori_baru.id_kat_dompet_asal
			let id_kat_dompet_tujuan = kategori_baru.id_kat_dompet_tujuan

			// cari detail kateri dan dompetna
			let kategori_ini_asal = kategori.find(e => e.id_kategori === id_kat_dompet_asal)
			let kategori_ini_tujuan = kategori.find(e => e.id_kategori === id_kat_dompet_tujuan)

			let dompet_ini_asal = dompet.find(e => e.id_dompet === data.dompetAsal)
			let dompet_ini_tujuan = dompet.find(e => e.id_dompet === data.dompetTujuan)

			if(is_debet){
				keuangan[index].id_kategori = id_kat_dompet_asal
				keuangan[index].id_dompet = data.dompetTujuan
				keuangan[index].debet = parseInt(data.nominal)
				keuangan[index].kategori = kategori_ini_asal
				keuangan[index].dompet = dompet_ini_tujuan

				keuangan[index_pair].id_kategori = id_kat_dompet_tujuan
				keuangan[index_pair].id_dompet = data.dompetAsal
				keuangan[index_pair].kredit = parseInt(data.nominal)
				keuangan[index_pair].kategori = kategori_ini_tujuan
				keuangan[index_pair].dompet = dompet_ini_asal
			} else {
				keuangan[index].id_kategori = id_kat_dompet_tujuan
				keuangan[index].id_dompet = data.dompetAsal
				keuangan[index].kredit = parseInt(data.nominal)
				keuangan[index].kategori = kategori_ini_tujuan
				keuangan[index].dompet = dompet_ini_asal

				keuangan[index_pair].id_kategori = id_kat_dompet_asal
				keuangan[index_pair].id_dompet = data.dompetTujuan
				keuangan[index_pair].debet = parseInt(data.nominal)
				keuangan[index_pair].kategori = kategori_ini_asal
				keuangan[index_pair].dompet = dompet_ini_tujuan
			}

			keuangan[index].tanggal = data.tanggal
			keuangan[index].uraian = data.uraian
			keuangan[index].sync = 0
			keuangan[index].updated_at = new Date().toISOString()

			keuangan[index_pair].tanggal = data.tanggal
			keuangan[index_pair].uraian = data.uraian
			keuangan[index_pair].sync = 0
			keuangan[index_pair].updated_at = new Date().toISOString()

			// balikin
			keuangan = keuangan.reverse()

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil mengupdate data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))
			return dataTransaksi
		}
	},
	async hapusTransfer({dispatch, getters, commit}, id){
		let passTest = true
		await dispatch('fetchTransaksi')
		let transaksiTest = getters.getDataTransaksi
		if(!transaksiTest){
			passTest = false
		}

		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')


			// cari yg dihapus
			let index = keuangan.findIndex(e => e.id_keuangan === id)

			let is_debet = (keuangan[index].debet > 0) ? true : false
			let index_pair = null
			let dompet_pair = null
			
			if(is_debet){
				dompet_pair = keuangan[index].kategori.id_dompet_asal
				index_pair = keuangan.findIndex(e => e.id_dompet === dompet_pair && e.tanggal === keuangan[index].tanggal && e.kredit === keuangan[index].debet)
				if(index_pair === -1){
					return {
						status: false,
						msg: 'Transaksi tidak ditemukan'
					}
				}
			} else {
				dompet_pair = keuangan[index].kategori.id_dompet_tujuan
				index_pair = keuangan.findIndex(e => e.id_dompet === dompet_pair && e.tanggal === keuangan[index].tanggal && e.kredit === keuangan[index].debet)
				if(index_pair === -1){
					return {
						status: false,
						msg: 'Transaksi tidak ditemukan'
					}
				}
			}

			// update
			keuangan[index].deleted = 1
			keuangan[index].sync = 0

			keuangan[index_pair].deleted = 1
			keuangan[index_pair].sync = 0

			let dataTransaksi = {
				status: true,
				msg: 'Berhasil menghapus data',
				data: keuangan
			}
			localStorage.setItem('transaksi', JSON.stringify(dataTransaksi.data))

			return dataTransaksi
		}
	},
}

const getters = {
	getDataTransaksi: state => {
		return state.dataTransaksi
	},
	getTransaksi: state => {
		return state.transaksi
	},
	getDataFilter: state => {
		return state.widgetFilter
	},
	getFilter: state => {
		return state.filter
	},
	isFilterFetched: state => {
		return state.filterFetched
	}
}

const compare = ({key, order}) => {
	return (a, b) => {
		let result = 0

		if(a[key] > b[key]){
			result = 1
		}

		if(a[key] < b[key]){
			result = -1
		}

		if(order === 'asc') return result

		// kalo order desc tinggal dibalik (pake -1)
		return result * -1
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}