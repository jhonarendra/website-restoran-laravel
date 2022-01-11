const data = [
  {
    id_pegawai: 1,
    nama_pegawai: 'Spagetti',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 45000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pegawai: 2,
    nama_pegawai: 'Mie',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 5000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pegawai: 3,
    nama_pegawai: 'Es Jeruk',
    jenis: 2, // 1 makanan, 2 minuman
    harga: 3000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
]

const state = {
  pegawai: [],
  tableViewPegawai: 'table'
}

const mutations = {
  setPegawai(state, data) {
    state.pegawai = data
  },
  setTableViewPegawai(state, data) {
    state.tableViewPegawai = data
  }
}

const actions = {
  async fetchPegawai () {
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
	getAllPegawai: state => {
		return state.pegawai
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}