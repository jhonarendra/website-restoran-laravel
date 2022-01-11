const data = [
  {
    id_pelanggan: 1,
    nama_pelanggan: 'Spagetti',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 45000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pelanggan: 2,
    nama_pelanggan: 'Mie',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 5000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pelanggan: 3,
    nama_pelanggan: 'Es Jeruk',
    jenis: 2, // 1 makanan, 2 minuman
    harga: 3000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
]

const state = {
  pelanggan: [],
  tableViewPelanggan: 'table'
}

const mutations = {
  setPelanggan(state, data) {
    state.pelanggan = data
  },
  setTableViewPelanggan(state, data) {
    state.tableViewPelanggan = data
  }
}

const actions = {
  async fetchPelanggan () {
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
	getAllPelanggan: state => {
		return state.pelanggan
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}