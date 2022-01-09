const data = [
  {
    id_reservasi: 1,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 1,
    id_pegawai: 1,
    jumlah_orang: 3,
    no_meja: null,
    status: 0, // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
    created_at: "2018-05-20 07:49:09",
    updated_at: "2018-05-20 07:49:09",
    deleted_at: null
  },
  {
    id_reservasi: 2,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 1,
    id_pegawai: 1,
    jumlah_orang: 3,
    no_meja: null,
    status: 0,
    created_at: "2018-05-20 07:49:09",
    updated_at: "2018-05-20 07:49:09",
    deleted_at: null
  },
  {
    id_reservasi: 3,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 1,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "202",
    status: 4,
    created_at: "2018-05-20 07:49:09",
    updated_at: "2018-05-20 07:49:09",
    deleted_at: null
  },
  {
    id_reservasi: 4,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 3,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "222",
    status: 1,
    created_at: "2018-05-20 07:50:29",
    updated_at: "2018-05-20 08:39:05",
    deleted_at: null
  },
  {
    id_reservasi: 5,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 4,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "2A",
    status: 1,
    created_at: "2018-05-23 01:09:50",
    updated_at: "2018-05-23 01:41:09",
    deleted_at: null
  },
  {
    id_reservasi: 6,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 5,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "232",
    status: 1,
    created_at: "2018-05-23 06:22:21",
    updated_at: "2018-05-23 06:23:56",
    deleted_at: "2018-05-24 01:36:38"
  },
  {
    id_reservasi: 7,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 5,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "3A",
    status: 1,
    created_at: "2018-05-23 23:17:40",
    updated_at: "2018-05-24 01:36:38",
    deleted_at: "2018-05-24 01:36:38"
  },
  {
    id_reservasi: 8,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 6,
    id_pegawai: 1,
    jumlah_orang: 3,
    no_meja: null,
    status: 0,
    created_at: "2021-11-16 11:31:30",
    updated_at: "2021-11-16 11:31:30",
    deleted_at: null
  },
  {
    id_reservasi: 9,
    no_reservasi: "RE-202/202/XC/0002",
    id_restoran: 1,
    nama_restoran: "Restoran Saya",
    nama_pelanggan: "Pelanggan",
    nama_pegawai: "Pegawai",
    id_pelanggan: 7,
    id_pegawai: 2,
    jumlah_orang: 3,
    no_meja: "8",
    status: 1,
    created_at: "2022-01-07 14:58:48",
    updated_at: "2022-01-07 15:01:02",
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
  async fetchReservasi () {
    return {
      data: {
        status: true,
        data,
        message: ''
      }
    }
  },
  async showReservasi ({ getters }, id) {
    const show = data.find(e => e.id_reservasi === parseInt(id))
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