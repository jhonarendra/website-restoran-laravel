<template>
  <div class="user-profile">
    <div
      class="user-photo"
      :style="'background-image: url(' + this.fotoUser + ')'"
    />
    <h4 v-if="userLogin" class="text-center text-white mt-3 font-weight-300">
      {{ (userLogin.pelanggan) ? userLogin.pelanggan.nama : (userLogin.pegawai) ? userLogin.pegawai.nama : '' }}
    </h4>
    <h4 v-else class="text-center text-white mt-3 font-weight-300">
      ...
    </h4>

    <p v-if="userLogin" class="text-center" >
      <span v-if="userLogin.pegawai && userLogin.pegawai.jabatan === 1" class="badge badge-success">Admin</span>
      <span v-else-if="userLogin.pegawai && userLogin.pegawai.jabatan === 2" class="badge badge-warning">Pegawai</span>
    </p>
    
    <p class="text-center">
      <router-link to="/user/profile" class="btn btn-link btn-sm text-brown">
        Edit Profil
      </router-link>
      <button class="btn btn-link btn-sm text-brown" @click="logout">
        Logout
      </button>
    </p>

    <ul v-if="userLogin" class="list-group mt-3">
      <li class="list-group-item">
        <i class="fa fa-envelope pr-2" />{{ userLogin.email }}
      </li>
      <li class="list-group-item"><i class="fa fa-user pr-2" />{{ userLogin.email }}</li>
      <li class="list-group-item">
        <i class="fa fa-phone pr-2" />
        {{ (userLogin.pelanggan) ? userLogin.pelanggan.no_hp : (userLogin.pegawai) ? userLogin.pegawai.no_hp : '' }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data () {
    return {
      
    }
  },
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    },
    fotoUser () {
      let foto = '/images/avatar-1.png'
      if (this.userLogin) {
        if (this.userLogin.pelanggan) {
          if (this.userLogin.pelanggan.foto) {
            foto = '/api/file/' + this.userLogin.pelanggan.foto
          }
        } else if (this.userLogin.pegawai) {
          if (this.userLogin.pegawai.foto) {
            foto = '/api/file/' + this.userLogin.pegawai.foto
          }
        }
      }
      return foto
    }
  },
  methods: {
    logout () {
      this.$store.dispatch('logout').then((res) => {
        console.log(res)
        if (res.data.status) {
          localStorage.removeItem('token')
          window.location = '/login'
        }
      })
    }
  }
}
</script>

<style scoped>
  .user-photo {
    border: 1px solid #ddd;
    height: 200px;
    width: 200px;
    border-radius: 50%;
    margin: 0 auto;
    background-position: center;
    background-size: contain;
  }
  @media (max-width: 992px) {
    .user-photo {
      height: auto;
      padding-bottom: 100%;
      width: 100%;
    }
  }
  .list-group-item {
    background: #faebcd;
  }

  @media (max-width: 769px) {
    .user-profile {
      display: none;
    }
  }
</style>