<template>
  <admin-layout>
    <div class="row">
      <div
        v-for="m in menu"
        :key="m"
        class="col-md-3 my-2"
      >
        <div class="card text-dark">
          <div class="card-body">
            <h3>{{ m }}</h3>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from '../../layouts/admin'
export default {
  components: {
    AdminLayout
  },
  data () {
    return {
      menu: ['reservasi', 'pesanan', 'pelanggan', 'pegawai', 'hidangan', 'restoran']
    }
  }
}
</script>