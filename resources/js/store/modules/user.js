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
    tipe_user: 1, // 1 pelanggan, 2 pegawai, 3 admin web
    created_at: '2022-10-10 10:10:10',
    updated_at: '2022-10-10 10:10:10',
    deleted_at: null
  }
]

const state = {
  user: null
}

const mutations = {
  setUser(state, data) {
    state.user = data
  }
}

const actions = {
  async fetchUser () {
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

export default {
  state,
  mutations,
  actions,
}