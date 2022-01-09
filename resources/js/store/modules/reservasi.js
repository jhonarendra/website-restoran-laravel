const data = [
  {
    id_reservasi: 1,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    id_pelanggan: 2,
    id_pegawai: 3,
    jumlah_tamu: 3,
    tanggal_reservasi: '2022-01-02 12:23:22',
    keterangan_pelanggan: 'ket',
    keterangan_pegawai: 'eke',
    no_meja: null,
    status: 0, // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
    created_at: "2018-05-20 07:49:09",
    updated_at: "2018-05-20 07:49:09",
    deleted_at: null
  },
  {
    id_reservasi: 2,
    no_reservasi: "RE-402/202/XC/0002",
    id_restoran: 2,
    id_pelanggan: 2,
    id_pegawai: 3,
    jumlah_tamu: 20,
    tanggal_reservasi: '2022-02-02 12:23:22',
    keterangan_pelanggan: 'ket',
    keterangan_pegawai: 'eke',
    no_meja: null,
    status: 0, // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
    created_at: "2018-05-20 17:49:09",
    updated_at: "2018-05-20 17:49:09",
    deleted_at: null
  }
]

const state = {
  reservasi: [],
  tableViewReservasi: 'table'
}

const mutations = {
  setReservasi(state, data) {
    state.reservasi = data
  },
  setTableViewReservasi(state, data) {
    state.tableViewReservasi = data
  }
}

const actions = {
  async fetchReservasi ({ getters, commit, dispatch }) {
    let user = getters.getAllUser
    let restoran = getters.getAllRestoran
    if (user.length === 0) {
      const res = await dispatch('fetchUser', true)
      commit('setUser', res.data.data)
      user = res.data.data
    }
    if (restoran.length === 0) {
      const res = await dispatch('fetchRestoran')
      commit('setRestoran', res.data.data)
      restoran = res.data.data
    }

    const reservasi = []
    data.forEach((e) => {
      const row = e
      row.pelanggan = user.find(f => f.id_user === e.id_pelanggan)
      row.pegawai = user.find(f => f.id_user === e.id_pegawai)
      row.restoran = restoran.find(f => f.id_restoran === e.id_restoran)
      reservasi.push(row)
    })
    
    return {
      data: {
        status: true,
        data: reservasi,
        message: ''
      }
    }
  },
  async showReservasi ({ getters, commit, dispatch }, id) {
    let user = getters.getAllUser
    let restoran = getters.getAllRestoran
    if (user.length === 0) {
      const res = await dispatch('fetchUser', true)
      commit('setUser', res.data.data)
      user = res.data.data
    }
    if (restoran.length === 0) {
      const res = await dispatch('fetchRestoran')
      commit('setRestoran', res.data.data)
      restoran = res.data.data
    }

    const show = data.find(e => e.id_reservasi === parseInt(id))
    show.pelanggan = user.find(f => f.id_user === show.id_pelanggan)
    show.pegawai = user.find(f => f.id_user === show.id_pegawai)
    show.restoran = restoran.find(f => f.id_restoran === show.id_restoran)

    if (show) {
      return {
        data: {
          status: true,
          data: show,
          message: ''
        }
      }
    } else {
      return {
        data: {
          status: false,
          data: null,
          message: 'Data tidak ditemukan'
        }
      }
    }
  }
}

export default {
  state,
  mutations,
  actions,
}