const data = [
  {
    id_pegawai: 1,
    nama_pegawai: 'Made Pegawai',
    jenis: 1, // 1 admin, 2 pegawai
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pegawai: 2,
    nama_pegawai: 'Nyoman Pegawai',
    jenis: 2, // 1 admin, 2 pegawai
    foto: '',
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_pegawai: 3,
    nama_pegawai: 'Nyoman Pegawai',
    jenis: 2, // 1 admin, 2 pegawai
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

const token = localStorage.token

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