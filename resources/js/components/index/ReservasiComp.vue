<template>
  <div id="reservasi" class="container">
    <h3 class="text-center display-4 text-dark-brown py-5">Reservasi</h3>
    <div class="row">
      <div class="contact-reservasi col-md-6">
        <h4 class="text-dark-brown py-4">Kontak</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <i class="fa fa-home pr-2" />
            Jalan Raya Batu Belig no. 17X, Seminyak, Bali
          </li>
          <li class="list-group-item">
            <i class="fa fa-phone pr-2" />
            (0361) 237-163
          </li>
          <li class="list-group-item">
            <i class="fa fa-envelope pr-2" />
            8-stars@gmail.com
          </li>
          <li class="list-group-item">
            <i class="fa fa-globe pr-2" />
            Cras justo odio
          </li>
        </ul>
      </div>
      <div v-if="userLogin" class="col-md-6">
        <div class="d-flex">
          <h4 class="text-dark-brown py-4">User Page</h4>
          <router-link to="/user" class="ml-auto py-4">Ke Halaman User</router-link>
        </div>
        <SidebarUser />
      </div>
      <div v-else class="col-md-6">
        <h4 class="text-dark-brown py-4">Daftar</h4>
        <FormRegister />
      </div>
    </div>
  </div>
</template>

<script>
import FormRegister from './FormRegister'
import SidebarUser from './../user/SidebarUser.vue'

export default {
  components: {
    FormRegister, SidebarUser
  },
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    }
  },
  mounted () {
    if (localStorage.token) {
      this.$store.dispatch('fetchUserLogin').then((res) => {
        if (res.data.status) {
          this.$store.commit('setUserLogin', res.data.data)
        }
      })
        .catch(() => {
          localStorage.removeItem('token')
        })
    }
  }
}
</script>

<style scoped>
  #reservasi h4 {
    font-weight: 300;
    font-size: 2rem;
  }
</style>