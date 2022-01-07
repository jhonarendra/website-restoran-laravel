<template>
  <admin-layout>
    <h1>Reservasi</h1>
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
      items: [
        { id: 1, nama: 'jon', alamat: 'tes' },
        { id: 2, nama: 'jossn', alamat: 't222es' },
        { id: 3, nama: 'jondw', alamat: 'tesdws' }
      ],
      tableLoading: true,
    }
  }
}
</script>