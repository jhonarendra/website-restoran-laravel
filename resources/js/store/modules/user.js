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

const ygbarunanti = [
  {
    id_user: 1,
    email: 'kdlsdkf@fjdkf.com',
    password: 'sdfsdfsd',
    tipe: 1, // 1 pegawai, 2 pelanggan
    id_entitas: 1, // ke pegawai/pelanggan
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
  async fetchUser ({ getters }, filter) {
    let user = data
    if (filter.tipe) {
      user = user.filter(e => e.tipe_user === filter.tipe)
    }
    return {
      data: {
        status: true,
        data: user,
        message: ''
      }
    }
  },
  fetchUserLogin () {
    const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMCIsImp0aSI6IjFlMTBhNTljYmQyYzZkYjNkYWY1ZDAzMjcxZjhjZWQzM2RmOTI0N2ZiMjY1MTk4NWQ0OGJmZDdmYTU2Nzk2ZjQyMWE0ZDE3NTY2NmI5ZWEyIiwiaWF0IjoxNjQxOTkzNDk0LCJuYmYiOjE2NDE5OTM0OTQsImV4cCI6MTY3MzUyOTQ5NCwic3ViIjoiOCIsInNjb3BlcyI6W119.geidHX71dGcJ_cNMlvyof2Xzi9meFs7s659P0_tyjZaRS63t6UPIg_TcUTMLSGLLVWhTC0O5v5x3TRuyfegaM40cwUh5E8B5cC5u4A-kuOZkTGlse5ZqGKv3Y_2tA3jb1qa5RiUSlFxRJTvZ-y0oN1ZgaopHz7SsMlt133TSf7dZgY8nmMPiAASNa1IC83FrfFkNIaq-9yijYpx4AGEPCkTdG23TytSIYdwnyMGKVTfdNdp0piTD6V6XAgYGkcm1R5Yj2Mgb8L4SJmzVxGYYibTEwrMfpkjAEzhSjfUf4dlcN2JcB5jTUorBT3OnWXEuwWg4Ih_-7kRsX4vNRInZ3LHWSRIMLlugGNFLGld4IfXSrAQ3lOLA5nj3U-y5wNA-muipdWYEcWYmjYLTFw_15_8dS8flarAcj7evktjsnTrx9tF2XEy7Srjhq1wHo36xJvJdRr8MSsT_YRel2s1nPZ0YM4QLWIjONBApOv-IA28zQtesGwXQJP-HQbQ2KpDYGrJ81rmoiZJD5T_D_WjIVyp5BAkMfO_-HlerI5vGSsK73ZHDTF_ARpeYOnI8dfJX73asFWJ-6kxTGQNX1xkTThqpXNgGIZwsbGo2ntxgz3fEmmuZkmHOe9a6LklpPoiETkHdw5iAymOWjky_nVXfq8ouNzHEa0-j0Nz5ZQJ8_M0'
    return axios.get('/api/user',
      { headers: { Authorization: `Bearer ${token}` } }
    )
  },
  login ({ getters }, data) {
    return axios.post('/api/login', data)
  },
  register ({ getters }, data) {
    return axios.post('/api/register', data)
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