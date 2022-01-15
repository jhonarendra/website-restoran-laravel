const data = [
  {
    id_pengaturan: 1,
    nama_pengaturan: 'Spagetti',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 45000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pengaturan: 2,
    nama_pengaturan: 'Mie',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 5000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pengaturan: 3,
    nama_pengaturan: 'Es Jeruk',
    jenis: 2, // 1 makanan, 2 minuman
    harga: 3000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
]

const state = {
  pengaturan: [],
  tableViewPengaturan: 'table'
}

const token = localStorage.token

const mutations = {
  setPengaturan(state, data) {
    state.pengaturan = data
  },
  setTableViewPengaturan(state, data) {
    state.tableViewPengaturan = data
  }
}

const actions = {
  async fetchPengaturan () {
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
	getAllPengaturan: state => {
		return state.pengaturan
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}