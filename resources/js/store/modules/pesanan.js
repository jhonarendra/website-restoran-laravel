const data = [
  {
    id_pesanan: 1,
    no_pesanan: 'PSN/2/2/1/1/1',
    id_restoran: 1,
    restoran: {
      id_restoran: 1,
      nama_restoran: 'Restoran Saya',
      alamat: 'Jalan Restoran Saya',
    },
    id_pelanggan: 1,
    pelanggan: {
      id_pelanggan: 2,
      nama_pelanggan: 'Made Po',
    },
    id_pegawai: 1,
    pegawai: {
      id_pegawai: 8,
      nama_pegawai: 'Wayan Li',
    },
    total: 200000,
    status: 1, // 0 belum dibayar, 1 sudah bayar, belum dikonfirmasi, 2 sudah bayar, sedang proses, 3 selesai
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  }
]

const state = {
  pesanan: [],
  tableViewPesanan: 'table'
}

const mutations = {
  setPesanan(state, data) {
    state.pesanan = data
  },
  setTableViewPesanan(state, data) {
    state.tableViewPesanan = data
  }
}

const actions = {
  async fetchPesanan () {
    return {
      data: {
        status: true,
        data,
        message: ''
      }
    }
  }
}

const getters = {
	getAllPesanan: state => {
		return state.pesanan
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}