<template>
  <admin-layout>
    <div class="row">
      <div
        v-for="m in menu"
        :key="m.name"
        class="col-md-3 my-2"
      >
        <router-link :to="m.link">
          <div class="card text-dark">
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
  data () {
    return {
      menu: [
        { name: 'reservasi', icon: 'fa fa-taxi', link: '/user/reservasi' },
        { name: 'pesanan', icon: 'fa fa-phone', link: '/user/pesanan' },
        { name: 'pelanggan', icon: 'fa fa-user-circle', link: '/user/pelanggan' },
        { name: 'pegawai', icon: 'fa fa-user-secret', link: '/user/pegawai' },
        { name: 'hidangan', icon: 'fa fa-glass', link: '/user/hidangan' },
        { name: 'restoran', icon: 'fa fa-home', link: '/user/restoran' }
      ]
    }
  }
}
</script>