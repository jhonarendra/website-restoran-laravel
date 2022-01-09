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
  </admin-layout>
</template>


<script>
import AdminLayout from '../../../layouts/admin'

export default {
  components: {
    AdminLayout,
  }
}
</script>
