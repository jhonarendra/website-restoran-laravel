import homeApi from '../../services/homeApi'

const SET_DATA_DASHBOARD = "SET_DATA_DASHBOARD"
const SET_INIT = "SET_INIT"
const SET_DARK_MODE = "SET_DARK_MODE"
const SET_SETTING = "SET_SETTING"

const state = {
	dataDashboard: null,
	setting: {
		init: false,
		darkMode: false
	}
}

const mutations = {
	[SET_DATA_DASHBOARD](state, data){
		state.dataDashboard = data
	},
	[SET_INIT](state, data){
		state.setting.init = data
	},
	[SET_DARK_MODE](state, data){
		state.setting.darkMode = data
	},
	[SET_SETTING](state, data){
		state.setting = data
	}
}

const actions = {
	async getDataDashboard({dispatch, getters, commit}, filter){
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
			// formatting data dashboard
			let keuangan = []
			transaksiTest.forEach(e => (e.deleted != 1) ? keuangan.push(e) : '')


			// saldo
			let debet = 0
			let kredit = 0
			let saldo = 0
			keuangan.forEach(e => {
				if(e.kategori.is_transfer === 0 && e.deleted === 0){
					debet += e.debet
					kredit += e.kredit
				}
			})
			saldo = debet - kredit

			let dataSaldo = {
				debet: debet,
				kredit: kredit,
				saldo: saldo
			}



			// formatting dompet
			let dompet = []
			dompetTest.forEach(e => (e.deleted != 1) ? dompet.push(e) : '')

			dompet.forEach(d => {
				let debet_dompet = 0
				let kredit_dompet = 0
				let saldo_dompet = 0
				let neraca_bln_ini = 0

				keuangan.forEach(k => {
					if(d.id_dompet === k.id_dompet){
						debet_dompet += k.debet
						kredit_dompet += k.kredit
					}
					let bulan_now = today.getMonth() + 1 // inget get month ini dari 0 - 11
					let tahun_now = today.getFullYear()

					let tgl_k = new Date(k.tanggal)
					let bulan_k = tgl_k.getMonth() + 1
					let tahun_k = tgl_k.getFullYear()

					if(d.id_dompet === k.id_dompet && bulan_now === bulan_k && tahun_now === tahun_k){
						neraca_bln_ini += k.debet - k.kredit
					}
				})
				saldo_dompet = debet_dompet - kredit_dompet
				d.debet_dompet = debet_dompet
				d.kredit_dompet = kredit_dompet
				d.saldo = saldo_dompet
				d.neraca_bln_ini = neraca_bln_ini
			})


			// formating filter

			let periode = ''
			let bulan_filter = ''
			let tahun_filter = ''

			if(filter.waktu != ''){
			    periode = filter.waktu;
			} else {
			    periode = 'bulan';
			    let tanggal_default = '';
			    keuangan.forEach((k, i) => {
			    	if(i === 0){
			    		tanggal_default = k.tanggal
			    	}
			    })

			    let tgl_k_default = new Date(tanggal_default)
			    bulan_filter = tgl_k_default.getMonth() + 1
			    tahun_filter = tgl_k_default.getFullYear()
			}
			if(filter.bulan != 0){
			    bulan_filter = filter.bulan
			    tahun_filter = filter.tahun
			}
			if(filter.tahun != 0){
			    tahun_filter = filter.tahun
			}
			if(filter.tanggalStart != ''){
				let tgl_start = new Date(filter.tanggalStart)
				bulan_filter = tgl_start.getMonth() + 1
				tahun_filter = tgl_start.getFullYear()
			}

			if(filter.waktu == 'bulan' && filter.bulan == 0){
			    periode = 'bulan'
			    let tanggal_default = ''
			    keuangan.forEach((k, i) => {
			    	if(i === 0){
			    		tanggal_default = k.tanggal
			    	}
			    })
			    let tgl_k_default_bulan = new Date(tanggal_default)
			    bulan_filter = tgl_k_default_bulan.getMonth() + 1
			    tahun_filter = tgl_k_default_bulan.getFullYear()
			}

			if(filter.waktu == 'tahun' && filter.tahun == 0){
				periode = 'tahun'
				let tanggal_default = ''
				keuangan.forEach((k, i) => {
					if(i === 0){
						tanggal_default = k.tanggal
					}
				})
				tahun_filter = new Date(tanggal_default).getFullYear()
			}

			let bulan_filter_lalu = 0
			let tahun_filter_lalu = 0
			if(periode == 'bulan'){
				bulan_filter_lalu = bulan_filter - 1
				tahun_filter_lalu = tahun_filter
				if(bulan_filter_lalu == 0){
					bulan_filter_lalu = 12
					tahun_filter_lalu = tahun_filter - 1
				}
			} else if(periode == 'tahun'){
				tahun_filter_lalu = tahun_filter - 1
			} else if(periode == 'semua'){
				// ya semua
			}



			// chart
			let arr_detail_waktu = []
			// cari tanggal periode 1 bulan
			let date_a = ''
			if(periode === 'bulan'){
				date_a = new Date(tahun_filter + '-' + String(bulan_filter).padStart(2, '0') + '-01')
			} else if(periode === 'tahun'){
				date_a = new Date(tahun_filter + '-01-01')
			} else {
				let tgl_min = new Date(keuangan[0].tanggal)
				keuangan.forEach((k, i) => {
					let tgl_i  = new Date(k.tanggal)
					if(tgl_i < tgl_min){
						tgl_min = tgl_i
					}
				})

				date_a = tgl_min
			}
			let month_a = date_a.getMonth()
			let year_a = date_a.getFullYear()
			let str_date_a = ''

			let loop = true

			while(loop){
				str_date_a = date_a.getFullYear()+'-'+String(date_a.getMonth()+1).padStart(2, '0')+'-'+String(date_a.getDate()).padStart(2, '0')
				let label = date_a.toLocaleDateString('id-ID', {
					year: 'numeric',
					month: 'short',
					day: 'numeric'
				})
				if(tahun_filter === parseInt(today.getFullYear())){
					label = date_a.toLocaleDateString('id-ID', {
						month: 'short',
						day: 'numeric'
					})
				}
				let row = {
					tanggal: str_date_a,
					hari: date_a.getDate(),
					bulan: bulan_filter,
					tahun: tahun_filter,
					label: label
				}
				arr_detail_waktu.push(row)


				if(periode === 'bulan'){
					if(date_a.getMonth() === month_a){
						loop = true
					} else {
						loop = false
					}
				} else if(periode === 'tahun'){
					if(date_a.getFullYear() === year_a){
						loop = true
					} else {
						loop = false
					}
				}
				if(date_a.getDate() === today.getDate() && date_a.getMonth() === today.getMonth() && date_a.getFullYear() === today.getFullYear()){
					loop = false
				}
				date_a.setDate(date_a.getDate() + 1)
			}
			arr_detail_waktu = arr_detail_waktu.reverse()
			

			saldo = 0
			/*
				Tambahan. stat pergerakan saldo tiap waktunya
				1. cari saldo sampai tanggal awal di periode waktu
				2. tinggal + debet - kredit
			*/
			//1
			// console.log('tanggal min', arr_detail_waktu[arr_detail_waktu.length - 1].tanggal)
			let tgl_first = new Date(arr_detail_waktu[arr_detail_waktu.length - 1].tanggal)
			let bulan_first = tgl_first.getMonth() + 1
			let tahun_first = tgl_first.getFullYear()
			keuangan.forEach(e => {
				let tgl_e = new Date(e.tanggal)
				// let bulan_e = tgl_e.getMonth() + 1
				let tahun_e = tgl_e.getFullYear()
				if(e.kategori.is_transfer === 0 && e.deleted === 0){
					if(tgl_e < tgl_first){
						saldo += e.debet - e.kredit
					}
				}
			})
			// console.log('saldo awal', saldo)

			let tmp_arr_detail_waktu = [];

			arr_detail_waktu.reverse().forEach(a => {
			    neraca = 0
			    debet = 0
			    kredit = 0

			    keuangan.forEach(k => {
			        if(k.kategori.is_transfer != 1){
			        	let tgl_k = new Date(k.tanggal)
			            let bulan_k = tgl_k.getMonth() + 1
			            let tahun_k = tgl_k.getFullYear()
						if(a['tanggal'] == k.tanggal){
							debet += k.debet
							kredit += k.kredit
							neraca += k.debet - k.kredit
							saldo += k.debet - k.kredit
						}
			        }
			    })
			    tmp_arr_detail_waktu.push({
			    	tanggal : a['tanggal'],
			    	hari : a['hari'],
			    	bulan : a['bulan'],
			    	tahun : a['tahun'],
			    	label : a['label'],
			    	neraca : neraca,
			    	debet : debet,
			    	kredit : kredit,
					saldo : saldo
			    })
			})
			// let chart_waktu = tmp_arr_detail_waktu.reverse()
			let chart_waktu = tmp_arr_detail_waktu

			// console.log(chart_waktu)



			// neraca
			let debet_filter = 0
			let debet_lalu = 0
			let kredit_filter = 0
			let kredit_lalu = 0
			let neraca_filter = 0
			let neraca_lalu = 0
			keuangan.forEach(k => {
			    if(k.kategori.is_transfer != 1){
			        if(periode == 'bulan'){
			        	let tgl_k = new Date(k.tanggal)
			            let bulan_k = tgl_k.getMonth() + 1
			            let tahun_k = tgl_k.getFullYear()
			            if(bulan_k == bulan_filter && tahun_k == tahun_filter){
			                debet_filter += k.debet
			                kredit_filter += k.kredit
			                neraca_filter += k.debet - k.kredit
			            }
			            if(bulan_k == bulan_filter_lalu && tahun_k == tahun_filter_lalu){
			                debet_lalu += k.debet
			                kredit_lalu += k.kredit
			                neraca_lalu += k.debet - k.kredit
			            }
			        } else if(periode == 'tahun'){
			        	let tgl_k = new Date(k.tanggal)
			            let tahun_k = tgl_k.getFullYear()
			            if(tahun_k == tahun_filter){
			                debet_filter += k.debet
			                kredit_filter += k.kredit
			                neraca_filter += k.debet - k.kredit
			            }
			            if(tahun_k == tahun_filter_lalu){
			                debet_lalu += k.debet
			                kredit_lalu += k.kredit
			                neraca_lalu += k.debet - k.kredit
			            }
			        } else if(periode == 'semua'){
			            debet_filter += k.debet
			            kredit_filter += k.kredit
			            neraca_filter += k.debet - k.kredit
			        }
			    }
				
			})
			let debet_rasio = 0
			if(debet_lalu == 0){
			    debet_rasio = 100
			} else {
			    debet_rasio = Number((debet_filter-debet_lalu)/debet_lalu*100).toFixed(2)
			}
			let kredit_rasio = 0
			if(kredit_lalu == 0){
			    kredit_rasio = 100
			} else {
			    kredit_rasio = Number((kredit_filter-kredit_lalu)/kredit_lalu*100).toFixed(2)
			}
			let neraca_rasio = 0
			if(neraca_lalu == 0){
			    neraca_rasio = 100
			} else {
			    neraca_rasio = Number((neraca_filter-neraca_lalu)/neraca_lalu*100).toFixed(2)
			}

			let neraca = {
				debet : debet_filter,
				debet_lalu : debet_lalu, // tahun lalu, bulan lalu, minggu lalu, dll
				debet_rasio : debet_rasio,
				kredit : kredit_filter,
				kredit_lalu : kredit_lalu,
				kredit_rasio : kredit_rasio,
				neraca : neraca_filter,
				neraca_lalu : neraca_lalu,
				neraca_rasio : neraca_rasio
			}
			


			// per kategori filter waktu
			// ini gak difilter dulu
			let kategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1 && e.is_transfer == 0) ? kategori.push(e) : '')
			
			kategori.forEach(kat => {
			    let row = []
			    let debet_kat = 0
			    let kredit_kat = 0
			    let debet_kat_lalu = 0
			    let kredit_kat_lalu = 0
			    let id_dompet = 0 // supaya pas diklik, bisa filter dompetnya

			    keuangan.forEach(k => {
			        if(periode == 'bulan'){
			        	let tgl_k = new Date(k.tanggal)
			            let bulan_k = tgl_k.getMonth() + 1
			            let tahun_k = tgl_k.getFullYear()
			            if(kat.id_kategori == k.id_kategori && bulan_k == bulan_filter && tahun_k == tahun_filter){
			                row.push(k)
			                debet_kat += k.debet
			                kredit_kat += k.kredit
			                id_dompet = k.id_dompet
			            }
			            if(kat.id_kategori == k.id_kategori && bulan_k == bulan_filter_lalu && tahun_k == tahun_filter_lalu){
			                debet_kat_lalu += k.debet
			                kredit_kat_lalu += k.kredit
			            }
			        } else if(periode == 'tahun'){
			        	let tgl_k = new Date(k.tanggal)
			            let tahun_k = tgl_k.getFullYear()
			            if(kat.id_kategori == k.id_kategori && tahun_k == tahun_filter){
			                row.push(k)
			                debet_kat += k.debet
			                kredit_kat += k.kredit
			                id_dompet = k.id_dompet
			            }
			            if(kat.id_kategori == k.id_kategori && tahun_k == tahun_filter_lalu){
			                debet_kat_lalu += k.debet
			                kredit_kat_lalu += k.kredit
			            }
			        } else if(periode == 'semua'){
			            if(kat.id_kategori == k.id_kategori){
			                row.push(k)
			                debet_kat += k.debet
			                kredit_kat += k.kredit
			                id_dompet = k.id_dompet
			            }
			        }
			    })
			    kat.debet = debet_kat
			    kat.kredit = kredit_kat
			    kat.debet_lalu = debet_kat_lalu
			    kat.kredit_lalu = kredit_kat_lalu
			    kat.id_dompet = id_dompet
			    if(debet_kat_lalu == 0){
			        debet_rasio = 100
			    } else {
			        debet_rasio = Number((debet_kat_lalu-debet_kat)/debet_kat_lalu*100).toFixed(2)
			        if(kat.jenis == 1){
			            debet_rasio = debet_rasio * -1
			        }
			    }
			    if(kredit_kat_lalu == 0){
			        kredit_rasio = 100
			    } else {
			        kredit_rasio = Number((kredit_kat_lalu-kredit_kat)/kredit_kat_lalu*100).toFixed(2)
			        if(kat.jenis == 2){
			            kredit_rasio = kredit_rasio * -1
			        }
			    }
			    kat.debet_rasio = debet_rasio
			    kat.kredit_rasio = kredit_rasio
			    kat.keuangan = row
			})
			let kat_debet = []
			let kat_kredit = []
			kategori.forEach(kat => {
		        kat.keuangan = null
		        if(kat.jenis === 1){
		        	kat_debet.push(kat)
		        } else {
		        	kat_kredit.push(kat)
		        }
			})
			kategori = [kat_debet, kat_kredit]

			let data = {
				saldo: dataSaldo,
				dompet: dompet,
				chart_waktu : chart_waktu,
				neraca : neraca,
				kategori : kategori
			}
			commit(SET_DATA_DASHBOARD, data)
		}
	},
	async initData({dispatch, getters, commit}){
		if(!localStorage.setting){
			commit(SET_INIT, true)
			localStorage.setItem('setting', JSON.stringify(getters.getSetting))
			console.log('init start')
			await dispatch('fetchUserLogin')
			let userLogin = getters.getUserLogin
			if(userLogin.sudah_init === 1){ // sudah initial load, insert template
				await dispatch('fetchTransaksi')
				await dispatch('fetchDataDompet')
				await dispatch('fetchDataKategori')
				await dispatch('fetchAnggaran')
			} else { // user pertamakali
				await dispatch('setInitialData')
				console.log('init udah, skgr trx')
				await dispatch('fetchTransaksi')
				console.log('trx udah')
				await dispatch('fetchDataDompet')
				await dispatch('fetchDataKategori')
				await dispatch('fetchAnggaran')
			}
			
			
			console.log('init finish')
		} else {
			commit(SET_SETTING, JSON.parse(localStorage.setting))
		}
	},
	setDarkMode({commit, getters}, data){
		commit(SET_DARK_MODE, data)
		localStorage.setItem('setting', JSON.stringify(getters.getSetting))
	},
	async fetchDataBelumSinkron({dispatch, getters}){
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

		await dispatch('fetchAnggaran')
		let anggaranTest = getters.getAnggaran
		if(!anggaranTest){
			passTest = false
		}
		if(passTest){
			let keuangan = []
			transaksiTest.forEach(e => (e.sync === 0) ? keuangan.push(e) : '')
			
			let dompet = []
			dompetTest.forEach(e => (e.sync === 0) ? dompet.push(e) : '')
			
			let kategori = []
			kategoriTest[0].forEach(e => (e.sync === 0) ? kategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.sync === 0) ? kategori.push(e) : '')
			
			let anggaran = []
			anggaranTest.forEach(e => (e.sync === 0) ? anggaran.push(e) : '')

			// masukin kategori ke anggaran
			let allKategori = []
			kategoriTest[0].forEach(e => (e.deleted != 1) ? allKategori.push(e) : '')
			kategoriTest[1].forEach(e => (e.deleted != 1) ? allKategori.push(e) : '')

			anggaran.forEach(e => {
				e.kategori = allKategori.find(k => k.id_kategori === e.id_kategori)
			})

			return {
				status: true,
				msg: 'Berhasil mengambil data yang belum sinkron',
				data: {
					transaksi: keuangan,
					dompet: dompet,
					kategori: kategori,
					anggaran: anggaran
				}
			}
		}
	},
	async sinkronData({dispatch, getters, commit}, data){
		return await homeApi.sinkronData(data)
	},
	async updateLocalData({dispatch, getters, commit}){
		await dispatch('fetchStorageTransaksi')
		await dispatch('fetchStorageDompet')
		await dispatch('fetchStorageKategori')
		await dispatch('fetchStorageAnggaran')
		await dispatch('fetchDataFilter', true)

		console.log('sinkronisasi finish')
		return {
			status: true,
			msg: 'Berhasil sinkronisasi data'
		}
	},
	async fetchDataSinkron(){
		return await homeApi.getDataSinkron()
	},
	async fetchIconDompet(){
		return await homeApi.getIconDompet()
	},
	async fetchIconKategori(){
		return await homeApi.getIconKategori()
	},
	async fetchColor(){
		return await homeApi.getColor()
	}
}

const getters = {
	getDataDashboard: state => {
		return state.dataDashboard
	},
	getSetting: state => {
		return state.setting
	},
	checkIsInit: state => {
		return state.setting.init
	},
	getDarkMode: state => {
		return state.setting.darkMode
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}