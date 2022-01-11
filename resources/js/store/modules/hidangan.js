const data = [
  {
    id_hidangan: 1,
    nama_hidangan: 'Spagetti',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 45000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_hidangan: 2,
    nama_hidangan: 'Mie',
    jenis: 1, // 1 makanan, 2 minuman
    harga: 5000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_hidangan: 3,
    nama_hidangan: 'Es Jeruk',
    jenis: 2, // 1 makanan, 2 minuman
    harga: 3000,
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
]

const state = {
  hidangan: [],
  tableViewHidangan: 'table'
}

const mutations = {
  setHidangan(state, data) {
    state.hidangan = data
  },
  setTableViewHidangan(state, data) {
    state.tableViewHidangan = data
  }
}

const actions = {
  async fetchHidangan () {
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
	getAllHidangan: state => {
		return state.hidangan
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}