<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Pengaturan</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Pengaturan</li>
      </ol>
    </nav>
    <div class="card mt-3">
      <p>Pengaturan</p>
    </div>
  </admin-layout>
</template>

<script>
import swal from 'sweetalert'
import AdminLayout from '../../../layouts/admin'

export default {
  components: {
    AdminLayout,
  },
  data () {
    return {

    }
  },
  mounted () {
    
  },
  methods: {

  }
}
</script>