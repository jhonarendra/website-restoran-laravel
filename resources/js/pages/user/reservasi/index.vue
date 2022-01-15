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
        <template #nama_pelanggan="{ row }">
          {{ row.pelanggan.nama }}
        </template>
        <template #nama_restoran="{ row }">
          {{ row.restoran.nama }}
        </template>
        <template #nama_pegawai="{ row }">
          {{ (row.pegawai) ? row.pegawai.nama : '-' }}
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
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    }
  },
  watch: {
    userLogin (newVal) {
      if (newVal) {
        this.setTableColumns()
      }
    }
  },
  data () {
    return {
      columns: [],
      items: [],
      tableLoading: false,
      tableView: 'table',
      tableDataChecked: []
    }
  },
  mounted () {
    if (this.userLogin) {
      this.setTableColumns()
    }
    if (this.$store.state.reservasi.reservasi.length === 0) {
      this.loadDataReservasi()
    } else {
      this.items = this.$store.state.reservasi.reservasi
    }
    this.tableView = this.$store.state.reservasi.tableViewReservasi
  },
  methods: {
    setTableColumns () {
      if (this.userLogin.pelanggan) {
        this.columns = [
          { label: '', field: 'checkbox' },
          { label: 'Nomor', field: 'no_reservasi', sortable: true },
          { label: 'Restoran', field: 'nama_restoran', struct: 'restoran.nama_restoran', sortable: true },
          { label: 'Pegawai', field: 'nama_pegawai', struct: 'pegawai.nama', sortable: true },
          { label: 'Status', field: 'status', sortable: true },
          { label: 'Dibuat', field: 'created_at', sortable: true },
          { label: 'Aksi', field: 'aksi' }
        ]
      } else {
        this.colums = [
          { label: '', field: 'checkbox' },
          { label: 'Nomor', field: 'no_reservasi', sortable: true },
          { label: 'Pelanggan', field: 'nama_pelanggan', struct: 'pelanggan.nama', sortable: true },
          { label: 'Restoran', field: 'nama_restoran', struct: 'restoran.nama_restoran', sortable: true },
          { label: 'Pegawai', field: 'nama_pegawai', struct: 'pegawai.nama', sortable: true },
          { label: 'Status', field: 'status', sortable: true },
          { label: 'Dibuat', field: 'created_at', sortable: true },
          { label: 'Aksi', field: 'aksi' }
        ]
      }
      
    },
    loadDataReservasi () {
      this.tableLoading = true
      this.$store.dispatch('fetchReservasi').then((res) => {
        this.tableLoading = false
        if (res.data.status) {
          this.items = res.data.data
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
      } else {
        let arr = this.tableDataChecked
        arr.splice(arr.findIndex(e => e === val), 1)
        this.tableDataChecked = arr
      }
    }
  }
}
</script>