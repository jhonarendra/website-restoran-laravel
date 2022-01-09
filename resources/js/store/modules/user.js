const data = [
  {
    id_user: 1,
    nama_user: 'Putu Pa',
    email: 'kdlsdkf@fjdkf.com',
    username: 'lakdfjlasd',
    password: 'sdfsdfsd',
    no_hp: '08192929292',
    alamat: 'sd',
    foto: 'sds',
    tipe_user: 3, // 1 pelanggan, 2 pegawai, 3 admin web
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_user: 2,
    nama_user: 'Made Po',
    email: 'wpeopwewpe@weowe.com',
    username: 'wpeowpeow',
    password: 'weowpeopwe',
    no_hp: '081111111111',
    alamat: 'jalan jalna',
    foto: 'sjd',
    tipe_user: 1, // 1 pelanggan, 2 pegawai, 3 admin web
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  },
  {
    id_user: 3,
    nama_user: 'Gede La',
    email: 'eioruowslkdf@erqerqwe.com',
    username: 'qerqwerqwr',
    password: 'qerqerwqer',
    no_hp: '081081081081',
    alamat: 'jalan jalna',
    foto: 'sjd',
    tipe_user: 2, // 1 pelanggan, 2 pegawai, 3 admin web
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  }
]

const state = {
  user: [],
  userLogin: null
}

const mutations = {
  setUser(state, data) {
    state.user = data
  },
  setUserLogin(state, data) {
    state.userLogin = data
  }
}

const actions = {
  async fetchUser () {
    return {
      data: {
        status: true,
        data,
        message: ''
      }
    }
  },
  async fetchUserLogin () {
    const show = data.find(e => e.id_user === 1)
    return {
      data: {
        status: true,
        data: show,
        message: ''
      }
    }
  }
}

const getters = {
	getAllUser: state => {
		return state.user
	}
}

export default {
  state,
  mutations,
  actions,
  getters
}