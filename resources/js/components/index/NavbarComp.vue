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
        <ul class="navbar-nav" v-if="$route.name.includes('user')">
          <li class="nav-item">
            <router-link class="nav-link" to="/user">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/reservasi">Reservasi</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/pesanan">Pesanan</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/pelanggan">Pelanggan</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/pegawai">Pegawai</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/hidangan">Hidangan</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/restoran">Restoran</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/pengaturan">Pengaturan</router-link>
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
  }
}
</script>