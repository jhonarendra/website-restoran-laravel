<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Buat Reservasi</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item"><router-link to="/user/reservasi" class="text-brown">Reservasi</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Buat Reservasi</li>
      </ol>
    </nav>
    <div class="card mt-3">
      <div class="card-body">
        <FormReservasi
          aksi="buat"
        />
      </div>
    </div>
  </admin-layout>
</template>


<script>
import AdminLayout from '../../../layouts/admin'
import FormReservasi from '../../../components/user/reservasi/FormReservasi.vue'

export default {
  components: {
    AdminLayout, FormReservasi
  },
  data () {
    return {

    }
  }
}
</script>
