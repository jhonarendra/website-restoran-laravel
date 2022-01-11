<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Hidangan</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Hidangan</li>
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
              title="Buat hidangan"
              class="btn btn-success flex-1-lg mr-1"
              @click="tambah"
            >
              <i class="fa fa-plus pr-2" /> Tambah hidangan
            </button>
            <button
              type="button"
              title="Refresh"
              class="btn btn-secondary"
              @click="loadDataHidangan"
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
            :value="row.id_hidangan"
            name="cbHidangan"
            type="checkbox"
          >
        </template>
        <template #id_hidangan="{ row }">
          <span class="small" style="white-space: nowrap">{{ row.id_hidangan }}</span>
        </template>
        <template #jenis="{ row }">
          {{ (row.jenis === 1) ? 'Makanan' : 'Minuman' }}
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
          <CardHidangan
            :data="row"
            :tableDataChecked="tableDataChecked"
            @handleShow="lihat"
            @checkItem="checkItem"
          />
        </template>
      </table-comp>
    </div>
    <div class="modal fade" id="modal-hidangan" tabindex="-1" role="dialog" aria-labelledby="modal-hidangan-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="" @submit="onSubmit">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-hidangan-label">
                {{(aksi === 'tambah') ? 'Tambah' : 'Edit'}}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_hidangan">Nama Hidangan</label>
                <input v-model="form.nama_hidangan" id="nama_hidangan" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="harga_hidangan">Harga</label>
                <input v-model="form.harga" id="harga_hidangan" type="number" class="form-control">
              </div>
              <div class="form-group">
                <label for="jenis_hidangan">Harga</label>
                <select id="jenis_hidangan" class="form-control">
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
import CardHidangan from '../../../components/user/hidangan/CardHidangan.vue'

export default {
  components: {
    AdminLayout,
    TableComp,
    CardHidangan
  },
  data () {
    return {
      columns: [
        { label: '', field: 'checkbox' },
        { label: 'ID', field: 'id_hidangan', sortable: true },
        { label: 'Nama Hidangan', field: 'nama_hidangan', sortable: true },
        { label: 'Harga', field: 'harga', sortable: true },
        { label: 'Jenis', field: 'jenis', sortable: true },
        { label: 'Dibuat', field: 'created_at', sortable: true },
        { label: 'Aksi', field: 'aksi' }
      ],
      items: [],
      tableLoading: false,
      tableView: 'table',
      tableDataChecked: [],

      aksi: 'tambah',
      form: {
        id_hidangan: '',
        nama_hidangan: '',
        harga: 0,
        jenis: 1
      }
    }
  },
  mounted () {
    if (this.$store.state.hidangan.hidangan.length === 0) {
      this.loadDataHidangan()
    } else {
      this.items = this.$store.state.hidangan.hidangan
    }
    this.tableView = this.$store.state.hidangan.tableViewHidangan
  },
  methods: {
    loadDataHidangan () {
      this.tableLoading = true
      setTimeout(() => {
        this.$store.dispatch('fetchHidangan').then((res) => {
          this.tableLoading = false
          if (res.data.status) {
            this.items = res.data.data
            this.$store.commit('setHidangan', this.items)
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
      this.form.id_hidangan = ''
      this.form.nama_hidangan = ''
      this.form.harga = 0
      this.form.jenis = 0
      $('#modal-hidangan').modal('show')
    },
    lihat (row) {
      this.aksi = 'edit'
      this.form.id_hidangan = row.id_hidangan
      this.form.nama_hidangan = row.nama_hidangan
      this.form.harga = row.harga
      this.form.jenis = row.jenis
      $('#modal-hidangan').modal('show')
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
      this.$store.commit('setTableViewHidangan', val)
    },
    handleCheckbox (val) {
      const cbVal = []
      if (val) {
        document.querySelectorAll('input[name="cbHidangan"]').forEach((e) => {
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