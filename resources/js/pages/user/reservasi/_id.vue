<template>
  <admin-layout>
    <div v-if="!loading">
      <div v-if="reservasi.id_reservasi">
        <h1 class="font-weight-300 text-white">{{ reservasi.no_reservasi }}</h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
            <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
            <li class="breadcrumb-item"><router-link to="/user/reservasi" class="text-brown">Reservasi</router-link></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Reservasi #{{ reservasi.no_reservasi }}</li>
          </ol>
        </nav>
      </div>
      <div v-else class="text-center">
        <i class="fa fa-exclamation-triangle text-brown" style="font-size: 4rem" />
        <h3 class="mt-3 text-white font-weight-300">Data Tidak Ditemukan</h3>
        <router-link to="/user/reservasi" class="btn btn-primary mt-3">Lihat Reservasi</router-link>
      </div>
    </div>
    <div v-else class="spinner-container">
      <div
        class="spinner"
        style="background-image: url('/images/spinner-primary.svg')"
      />
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
      reservasi: {},
      loading: false
    }
  },
  mounted () {
    this.showReservasi()
  },
  methods: {
    showReservasi () {
      this.loading = true
      setTimeout(() => {
        this.$store.dispatch('showReservasi', this.$route.params.id).then((res) => {
          this.loading = false
          if (res.data.status) {
            this.reservasi = res.data.data
          } else {
            // this.$router.push({ path: `/error/404/Data Tidak Ditemukan/user-reservasi-${this.$route.params.id}` })
            // this.$router.push({ name: 'error' })
          }
        })
      }, 2000)
    }
  }
}
</script>
