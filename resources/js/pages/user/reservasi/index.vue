<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Reservasi</h1>
    <div class="bg-light">
      <table-comp
        :columns="columns"
        :items="items"
        :loading="tableLoading"
      >
      </table-comp>
    </div>
  </admin-layout>
</template>

<script>
import TableComp from '../../../components/global/TableComp.vue'
import AdminLayout from '../../../layouts/admin'
export default {
  components: {
    AdminLayout,
    TableComp
  },
  data () {
    return {
      columns: [
        { label: 'ID', field: 'id', sortable: true },
        { label: 'Desa', field: 'nama', sortable: true },
        { label: 'Alamat', field: 'alamat', sortable: true },
        { label: 'Aksi', field: 'aksi' }
      ],
      items: [],
      tableLoading: true,
    }
  },
  mounted () {
    setTimeout(() => {
      this.items = [
        { id: 1, nama: 'jon', alamat: 'tes' },
        { id: 2, nama: 'jossn', alamat: 't222es' },
        { id: 3, nama: 'jondw', alamat: 'tesdws' }
      ]
      this.tableLoading = false
    }, 2000)
  }
}
</script>