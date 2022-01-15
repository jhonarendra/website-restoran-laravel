<template>
  <nav :class="`navbar navbar-expand-lg navbar-${variant} bg-${variant}`">
    <div class="container">
      <router-link to="/">
        <img src="/images/logo-text.png" />
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav" v-if="$route.name === 'index'">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#hidangan">Hidangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#reservasi">Reservasi</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown link
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        <ul class="navbar-nav" v-else-if="$route.name.includes('user')">
          <li
            class="nav-item"
            v-for="m in menu"
            :key="m.link"
          >
            <router-link
              class="nav-link"
              :to="m.link"
            >
              {{ m.text }}
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: {
    variant: {
      type: String,
      default: () => null
    }
  },
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    },
    menu () {
      let m = []
      if (this.$route.name.includes('user') && this.userLogin) {
        if (this.userLogin.tipe === 2) {
          m = [
            { text: 'Home', link: '/user'},
            { text: 'Reservasi', link: '/user/reservasi'},
            { text: 'Pesanan', link: '/user/pesanan'},
            { text: 'Restoran', link: '/user/restoran'},
            { text: 'Hidangan', link: '/user/hidangan'}
          ]
        } else if (this.userLogin.tipe === 1) {
          if (this.userLogin.pegawai.jabatan === 1) {
            m = [
              { text: 'Home', link: '/user'},
              { text: 'Reservasi', link: '/user/reservasi'},
              { text: 'Pesanan', link: '/user/pesanan'},
              { text: 'Pelanggan', link: '/user/pelanggan'},
              { text: 'Pegawai', link: '/user/pegawai'},
              { text: 'Restoran', link: '/user/restoran'},
              { text: 'Hidangan', link: '/user/hidangan'},
              { text: 'Pengaturan', link: '/user/pengaturan'}
            ]
          } else if (this.userLogin.pegawai.jabatan === 2) {
            m = [
              { text: 'Home', link: '/user'},
              { text: 'Reservasi', link: '/user/reservasi'},
              { text: 'Pesanan', link: '/user/pesanan'},
              { text: 'Restoran', link: '/user/restoran'},
              { text: 'Hidangan', link: '/user/hidangan'},
            ]
          }
        }
      }
      return m
    }
  },
  methods: {

  }
}
</script>