const data = [
  {
    id_restoran: 1,
    nama_restoran: 'Restoran Saya',
    alamat: 'Jalan Restoran Saya',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_restoran: 2,
    nama_restoran: 'Restoran Kamu',
    alamat: 'Jalan Restoran Kamu',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  }
]

const state = {
  restoran: [],
  tableViewRestoran: 'table'
}

const mutations = {
  setRestoran(state, data) {
    state.restoran = data
  },
  setTableViewRestoran(state, data) {
    state.tableViewRestoran = data
  }
}

const actions = {
  async fetchRestoran () {
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
	getAllRestoran: state => {
		return state.restoran
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}