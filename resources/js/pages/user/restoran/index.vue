<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Restoran</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Restoran</li>
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
              title="Buat restoran"
              class="btn btn-success flex-1-lg mr-1"
              @click="tambah"
            >
              <i class="fa fa-plus pr-2" /> Tambah restoran
            </button>
            <button
              type="button"
              title="Refresh"
              class="btn btn-secondary"
              @click="loadDataRestoran"
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
            :value="row.id_restoran"
            name="cbRestoran"
            type="checkbox"
          >
        </template>
        <template #id_restoran="{ row }">
          <span class="small" style="white-space: nowrap">{{ row.id_restoran }}</span>
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
          <CardRestoran
            :data="row"
            :tableDataChecked="tableDataChecked"
            @handleShow="lihat"
            @checkItem="checkItem"
          />
        </template>
      </table-comp>
    </div>
    <div class="modal fade" id="modal-restoran" tabindex="-1" role="dialog" aria-labelledby="modal-restoran-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="" @submit="onSubmit">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-restoran-label">
                {{(aksi === 'tambah') ? 'Tambah' : 'Edit'}}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_restoran">Nama Restoran</label>
                <input v-model="form.nama_restoran" id="nama_restoran" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="alamat_restoran">Alamat</label>
                <textarea v-model="form.alamat" id="alamat_restoran" class="form-control"></textarea>
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
import CardRestoran from '../../../components/user/restoran/CardRestoran.vue'

export default {
  components: {
    AdminLayout,
    TableComp,
    CardRestoran
  },
  data () {
    return {
      columns: [
        { label: '', field: 'checkbox' },
        { label: 'ID', field: 'id_restoran', sortable: true },
        { label: 'Nama Restoran', field: 'nama_restoran', sortable: true },
        { label: 'Alamat', field: 'alamat' },
        { label: 'Dibuat', field: 'created_at', sortable: true },
        { label: 'Aksi', field: 'aksi' }
      ],
      items: [],
      tableLoading: false,
      tableView: 'table',
      tableDataChecked: [],

      aksi: 'tambah',
      form: {
        id_restoran: '',
        nama_restoran: '',
        alamat: ''
      }
    }
  },
  mounted () {
    if (this.$store.state.restoran.restoran.length === 0) {
      this.loadDataRestoran()
    } else {
      this.items = this.$store.state.restoran.restoran
    }
    this.tableView = this.$store.state.restoran.tableViewRestoran
  },
  methods: {
    loadDataRestoran () {
      this.tableLoading = true
      setTimeout(() => {
        this.$store.dispatch('fetchRestoran').then((res) => {
          this.tableLoading = false
          if (res.data.status) {
            this.items = res.data.data
            this.$store.commit('setRestoran', this.items)
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
      this.form.id_restoran = ''
      this.form.nama_restoran = ''
      this.form.alamat = ''
      $('#modal-restoran').modal('show')
    },
    lihat (row) {
      this.aksi = 'edit'
      this.form.id_restoran = row.id_restoran
      this.form.nama_restoran = row.nama_restoran
      this.form.alamat = row.alamat
      $('#modal-restoran').modal('show')
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
      this.$store.commit('setTableViewRestoran', val)
    },
    handleCheckbox (val) {
      const cbVal = []
      if (val) {
        document.querySelectorAll('input[name="cbRestoran"]').forEach((e) => {
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