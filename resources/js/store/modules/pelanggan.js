const data = [
  {
    id_pelanggan: 1,
    nama_pelanggan: 'Johnson',
    no_hp: '',
    alamat: '',
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pelanggan: 2,
    nama_pelanggan: 'Johnson',
    no_hp: '',
    alamat: '',
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pelanggan: 3,
    nama_pelanggan: 'Johnson',
    no_hp: '',
    alamat: '',
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