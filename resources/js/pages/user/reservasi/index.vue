<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Reservasi</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Reservasi</li>
      </ol>
    </nav>
    <div class="card mt-3">
      <table-comp
        :columns="columns"
        :items="items"
        :loading="tableLoading"
        :showToggleView="true"
        :view="tableView"
        :card-grid="2"
        @setTableViewMode="setTableViewMode"
        @handleCheckbox="handleCheckbox"
      >
        <template #table-action>
          <div class="d-flex-lg float-right-lg-up">
            <button
              type="button"
              title="Buat reservasi"
              class="btn btn-success flex-1-lg mr-1"
              @click="$router.push({ path: '/user/reservasi/buat' })"
            >
              <i class="fa fa-plus pr-2" /> Buat reservasi
            </button>
            <button
              type="button"
              title="Refresh"
              class="btn btn-secondary"
              @click="loadDataReservasi"
            >
              <i class="fa fa-globe" />
            </button>
          </div>
        </template>
        <template #checkbox_action>
          <button
            v-if="tableDataChecked.length > 0"
            type="button"
            class="btn btn-danger"
          >
            <i class="fa fa-trash" />
          </button>
        </template>
        <template #checkbox="{ row }">
          <input
            v-model="tableDataChecked"
            :value="row.id_reservasi"
            name="cbReservasi"
            type="checkbox"
          >
        </template>
        <template #no_reservasi="{ row }">
          <span class="small" style="white-space: nowrap">{{ row.no_reservasi }}</span>
        </template>
        <template #status="{ row }">
          <span
            class="badge"
            :class="getBadgeStatus(row.status).class"
          >
            {{ getBadgeStatus(row.status).text }}
          </span>
        </template>
        <template #created_at="{ row }">
          <span class="small">{{ $helpers.dateFormat(row.created_at) }}</span>
        </template>
        <template #aksi="{ row }">
          <button
            title="Lihat"
            class="btn btn-primary m-1"
            @click="lihat(row)"
          >
            <i class="fa fa-eye" />
          </button>
          <button
            title="Hapus"
            class="btn btn-danger m-1"
            @click="hapus(row)"
          >
            <i class="fa fa-trash" />
          </button>
        </template>
        <template #cardview="{ row }">
          <CardReservasi
            :data="row"
            :tableDataChecked="tableDataChecked"
            @checkItem="checkItem"
          />
        </template>
      </table-comp>
    </div>
  </admin-layout>
</template>

<script>
import swal from 'sweetalert'
import TableComp from '../../../components/global/TableComp.vue'
import AdminLayout from '../../../layouts/admin'
import CardReservasi from '../../../components/user/reservasi/CardReservasi.vue'

export default {
  components: {
    AdminLayout,
    TableComp,
    CardReservasi
  },
  data () {
    return {
      columns: [
        { label: '', field: 'checkbox' },
        { label: 'Nomor', field: 'no_reservasi', sortable: true },
        { label: 'Pelanggan', field: 'nama_pelanggan', sortable: true },
        { label: 'Restoran', field: 'nama_restoran', sortable: true },
        { label: 'Pegawai', field: 'nama_pegawai', sortable: true },
        { label: 'Status', field: 'status', sortable: true },
        { label: 'Dibuat', field: 'created_at', sortable: true },
        { label: 'Aksi', field: 'aksi' }
      ],
      items: [],
      tableLoading: false,
      tableView: 'table',
      tableDataChecked: []
    }
  },
  mounted () {
    if (this.$store.state.reservasi.reservasi.length === 0) {
      this.loadDataReservasi()
    } else {
      this.items = this.$store.state.reservasi.reservasi
    }
    this.tableView = this.$store.state.reservasi.tableViewReservasi
  },
  methods: {
    loadDataReservasi () {
      this.tableLoading = true
      setTimeout(() => {
        this.$store.dispatch('fetchReservasi').then((res) => {
          this.tableLoading = false
          if (res.data.status) {
            this.items = [ 
              { 
              id_reservasi:1,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:1,
              id_pegawai:1,
              jumlah_orang: 3,
              no_meja:null,
              status:0, // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
              created_at:"2018-05-20 07:49:09",
              updated_at:"2018-05-20 07:49:09",
              deleted_at:null
              },
              { 
              id_reservasi:2,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:1,
              id_pegawai:1,
              jumlah_orang: 3,
              no_meja:null,
              status:0,
              created_at:"2018-05-20 07:49:09",
              updated_at:"2018-05-20 07:49:09",
              deleted_at:null
              },
              { 
              id_reservasi:3,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:1,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"202",
              status:4,
              created_at:"2018-05-20 07:49:09",
              updated_at:"2018-05-20 07:49:09",
              deleted_at:null
              },
              { 
              id_reservasi:4,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:3,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"222",
              status:1,
              created_at:"2018-05-20 07:50:29",
              updated_at:"2018-05-20 08:39:05",
              deleted_at:null
              },
              { 
              id_reservasi:5,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:4,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"2A",
              status:1,
              created_at:"2018-05-23 01:09:50",
              updated_at:"2018-05-23 01:41:09",
              deleted_at:null
              },
              { 
              id_reservasi:6,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:5,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"232",
              status:1,
              created_at:"2018-05-23 06:22:21",
              updated_at:"2018-05-23 06:23:56",
              deleted_at:"2018-05-24 01:36:38"
              },
              { 
              id_reservasi:7,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:5,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"3A",
              status:1,
              created_at:"2018-05-23 23:17:40",
              updated_at:"2018-05-24 01:36:38",
              deleted_at:"2018-05-24 01:36:38"
              },
              { 
              id_reservasi:8,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:6,
              id_pegawai:1,
              jumlah_orang: 3,
              no_meja:null,
              status:0,
              created_at:"2021-11-16 11:31:30",
              updated_at:"2021-11-16 11:31:30",
              deleted_at:null
              },
              { 
              id_reservasi:9,
              no_reservasi: "RE-202/202/XC/0002",
              id_restoran:1,
              nama_restoran: "Restoran Saya",
              nama_pelanggan: "Pelanggan",
              nama_pegawai: "Pegawai",
              id_pelanggan:7,
              id_pegawai:2,
              jumlah_orang: 3,
              no_meja:"8",
              status:1,
              created_at:"2022-01-07 14:58:48",
              updated_at:"2022-01-07 15:01:02",
              deleted_at:null
              }
            ]
            this.$store.commit('setReservasi', this.items)
          } else {
            swal({
              title: 'Gagal',
              text: res.data.message,
              icon: 'error',
              buttons: 'Ok'
            })
          }
        })
      }, 2000)
    },
    getBadgeStatus (status) {
      // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
      switch (status) {
        case 0:
          return {
            class: 'badge-secondary',
            text: 'Menunggu konfirmasi'
          }
        case 1:
          return {
            class: 'badge-primary',
            text: 'Dikonfirmasi'
          }
        case 2:
          return {
            class: 'badge-warning',
            text: 'Sedang Berlangsung'
          }
        case 3:
          return {
            class: 'badge-danger',
            text: 'Batal'
          }
        case 4:
          return {
            class: 'badge-success',
            text: 'Selesai'
          }
        default:
          return {
            class: 'badge-warning',
            text: 'Belum Dikonfirmasi'
          }
      }
    },
    lihat (row) {
      this.$router.push({ path: `/user/reservasi/${row.id_reservasi}` })
    },
    hapus (row) {
      console.log(row)
    },
    setTableViewMode (val) {
      this.tableView = val
      this.$store.commit('setTableViewReservasi', val)
    },
    handleCheckbox (val) {
      const cbVal = []
      if (val) {
        document.querySelectorAll('input[name="cbReservasi"]').forEach((e) => {
          cbVal.push(parseInt(e.value))
        })
      }
      this.tableDataChecked = cbVal
    },
    checkItem (val) {
      if (!this.tableDataChecked.includes(val)) {
        this.tableDataChecked.push(val)
      }
    }
  }
}
</script>