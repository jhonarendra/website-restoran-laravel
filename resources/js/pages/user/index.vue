<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Home</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
      </ol>
    </nav>
    <div class="row">
      <div
        v-for="m in menu"
        :key="m.name"
        class="col-6 col-lg-3 my-2"
      >
        <router-link :to="m.link" class="card-link">
          <div class="menu-item card text-dark">
            <div class="card-body text-center" style="z-index: 10;">
              <i :class="m.icon" style="font-size: 2rem" />
              <h3 class="font-weight-300 pt-3">{{ m.name }}</h3>
            </div>
          </div>
        </router-link>
      </div>
    </div>
    <!-- <h3 class="font-weight-300 pt-3">Statistik</h3> -->
  </admin-layout>
</template>

<script>
import AdminLayout from '../../layouts/admin'
export default {
  components: {
    AdminLayout
  },
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    },
    menu () {
      let m = []
      if (this.userLogin) {
        if (this.userLogin.tipe === 2) {
          m = [
            { name: 'reservasi', icon: 'fa fa-taxi', link: '/user/reservasi' },
            { name: 'pesanan', icon: 'fa fa-phone', link: '/user/pesanan' },
            { name: 'hidangan', icon: 'fa fa-glass', link: '/user/hidangan' },
            { name: 'restoran', icon: 'fa fa-home', link: '/user/restoran' }
          ]
        } else if (this.userLogin.tipe === 1) {
          if (this.userLogin.pegawai.jabatan === 1) {
            m = [
              { name: 'reservasi', icon: 'fa fa-taxi', link: '/user/reservasi' },
              { name: 'pesanan', icon: 'fa fa-phone', link: '/user/pesanan' },
              { name: 'pelanggan', icon: 'fa fa-user-circle', link: '/user/pelanggan' },
              { name: 'pegawai', icon: 'fa fa-user-secret', link: '/user/pegawai' },
              { name: 'hidangan', icon: 'fa fa-glass', link: '/user/hidangan' },
              { name: 'restoran', icon: 'fa fa-home', link: '/user/restoran' },
              { name: 'pengaturan', icon: 'fa fa-gear', link: '/user/pengaturan' }
            ]
          } else if (this.userLogin.pegawai.jabatan === 2) {
            m = [
              { name: 'reservasi', icon: 'fa fa-taxi', link: '/user/reservasi' },
              { name: 'pesanan', icon: 'fa fa-phone', link: '/user/pesanan' },
              { name: 'hidangan', icon: 'fa fa-glass', link: '/user/hidangan' },
              { name: 'restoran', icon: 'fa fa-home', link: '/user/restoran' }
            ]
          }
        }
      }
      return m
    }
  }
}
</script>

<style scoped>
  @media (max-width: 576px) {
    .menu-item h3 {
      font-size: 1rem;
    }
  }
</style>