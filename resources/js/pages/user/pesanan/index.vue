<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Pesanan</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Pesanan</li>
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
              title="Buat pesanan"
              class="btn btn-success flex-1-lg mr-1"
              @click="tambah"
            >
              <i class="fa fa-plus pr-2" /> Tambah pesanan
            </button>
            <button
              type="button"
              title="Refresh"
              class="btn btn-secondary"
              @click="loadDataPesanan"
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
            :value="row.id_pesanan"
            name="cbPesanan"
            type="checkbox"
          >
        </template>
        <template #no_pesanan="{ row }">
          <span class="small" style="white-space: nowrap">{{ row.no_pesanan }}</span>
        </template>
        <template #nama_pelanggan="{ row }">
          {{ row.pelanggan.nama_pelanggan }}
        </template>
        <template #nama_pegawai="{ row }">
          {{ row.pegawai.nama_pegawai }}
        </template>
        <template #nama_restoran="{ row }">
          {{ row.restoran.nama_restoran }}
        </template>
        <template #status="{ row }">
          {{ row.status }}
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
            <i class="fa fa-pencil" />
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
          <CardPesanan
            :data="row"
            :tableDataChecked="tableDataChecked"
            @handleShow="lihat"
            @checkItem="checkItem"
          />
        </template>
      </table-comp>
    </div>
    <div class="modal fade" id="modal-pesanan" tabindex="-1" role="dialog" aria-labelledby="modal-pesanan-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="" @submit="onSubmit">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-pesanan-label">
                {{(aksi === 'tambah') ? 'Tambah' : 'Edit'}}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_pesanan">Nama Pesanan</label>
                <input v-model="form.nama_pesanan" id="nama_pesanan" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="harga_pesanan">Harga</label>
                <input v-model="form.harga" id="harga_pesanan" type="number" class="form-control">
              </div>
              <div class="form-group">
                <label for="jenis_pesanan">Harga</label>
                <select id="jenis_pesanan" class="form-control">
                  <option :value="1">Makanan</option>
                  <option :value="2">Minuman</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import swal from 'sweetalert'
import TableComp from '../../../components/global/TableComp.vue'
import AdminLayout from '../../../layouts/admin'
import CardPesanan from '../../../components/user/pesanan/CardPesanan.vue'

export default {
  components: {
    AdminLayout,
    TableComp,
    CardPesanan
  },
  data () {
    return {
      columns: [
        { label: '', field: 'checkbox' },
        { label: 'Nomor', field: 'no_pesanan', sortable: true },
        { label: 'Pelanggan', field: 'nama_pelanggan', struct: 'pelanggan.nama_pelanggan', sortable: true },
        { label: 'Pegawai', field: 'nama_pegawai', struct: 'pegawai.nama_pegawai', sortable: true },
        { label: 'Restoran', field: 'nama_restoran', struct: 'restoran.nama_restoran', sortable: true },
        { label: 'Status', field: 'status', sortable: true },
        { label: 'Total', field: 'total', sortable: true },
        { label: 'Dibuat', field: 'created_at', sortable: true },
        { label: 'Aksi', field: 'aksi' }
      ],
      items: [],
      tableLoading: false,
      tableView: 'table',
      tableDataChecked: [],

      aksi: 'tambah',
      form: {
        id_pesanan: '',
        nama_pesanan: '',
        harga: 0,
        jenis: 1
      }
    }
  },
  mounted () {
    if (this.$store.state.pesanan.pesanan.length === 0) {
      this.loadDataPesanan()
    } else {
      this.items = this.$store.state.pesanan.pesanan
    }
    this.tableView = this.$store.state.pesanan.tableViewPesanan
  },
  methods: {
    loadDataPesanan () {
      this.tableLoading = true
      setTimeout(() => {
        this.$store.dispatch('fetchPesanan').then((res) => {
          this.tableLoading = false
          if (res.data.status) {
            this.items = res.data.data
            this.$store.commit('setPesanan', this.items)
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
    tambah () {
      this.aksi = 'tambah'
      this.form.id_pesanan = ''
      this.form.nama_pesanan = ''
      this.form.harga = 0
      this.form.jenis = 0
      $('#modal-pesanan').modal('show')
    },
    lihat (row) {
      this.aksi = 'edit'
      this.form.id_pesanan = row.id_pesanan
      this.form.nama_pesanan = row.nama_pesanan
      this.form.harga = row.harga
      this.form.jenis = row.jenis
      $('#modal-pesanan').modal('show')
    },
    hapus (row) {
      console.log(row)
    },
    onSubmit (e) {
      e.preventDefault()
      console.log('submit')
    },
    setTableViewMode (val) {
      this.tableView = val
      this.$store.commit('setTableViewPesanan', val)
    },
    handleCheckbox (val) {
      const cbVal = []
      if (val) {
        document.querySelectorAll('input[name="cbPesanan"]').forEach((e) => {
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