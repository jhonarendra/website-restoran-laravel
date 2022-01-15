<template>
  <form action="" method="POST" enctype="multipart/form-data" @submit="onSubmit">
    <div class="form-group row">
      <label for="nama" class="col-md-3">Nama <span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input
          v-model="form.nama"
          id="nama"
          name="nama"
          class="form-control"
          placeholder="Nama Lengkap"
          type="text"
          required
          autofocus
        />
      </div>
    </div>
    <div class="form-group row">
      <label for="no_hp" class="col-md-3">Nomor HP <span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input
          id="no_hp"
          v-model="form.no_hp"
          name="no_hp"
          class="form-control"
          type="text"
          required
        />
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-md-3">Alamat <span class="text-danger">*</span></label>
      <div class="col-md-9">
        <textarea
          id="alamat"
          v-model="form.alamat"
          class="form-control"
          required
        >
        </textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-3">Email <span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input
          id="email"
          v-model="form.email"
          name="email"
          class="form-control"
          placeholder="Email"
          type="email"
          required
        />
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-3">Password <span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input
          id="password"
          v-model="form.password"
          name="password"
          class="form-control"
          placeholder="Password"
          type="password"
          required
        />
      </div>
    </div>
    <div class="form-group row">
      <label for="foto_pelanggan" class="col-md-3">Foto</label>
      <div class="col-md-9">
        <input
          id="foto_pelanggan"
          class="form-control"
          type="file"
          name="foto_pelanggan"
          accept="Image/*"
          @change="setFoto"
        />
        <img
          v-if="fotoShow"
          :src="fotoShow"
          class="foto-show"
        />
      </div>
    </div>
    <div class="form-group">
      <button
        type="submit"
        class="btn btn-primary"
        :disabled="registerLoading"
      >
        <i v-if="registerLoading" class="fa fa-spinner fa-spin" />
        Daftar
      </button>
    </div>
    <p class="text-center">
      Sudah punya akun? <router-link to="/login">Login</router-link>
    </p>
  </form>
</template>

<script>
import swal from 'sweetalert'

export default {
  data () {
    return {
      form: {
        nama: '',
        alamat: '',
        no_hp: '',
        email: '',
        password: '',
        foto: ''
      },
      fotoShow: null,
      registerLoading: false
    }
  },
  methods: {
    onSubmit (e) {
      e.preventDefault()
      this.registerLoading = true
      const formData = new FormData()

      formData.append('nama', this.form.nama)
      formData.append('alamat', this.form.alamat)
      formData.append('no_hp', this.form.no_hp)
      formData.append('email', this.form.email)
      formData.append('password', this.form.password)
      formData.append('foto', this.form.foto)
      
      this.$store.dispatch('register', formData).then((res) => {
        this.registerLoading = false
        if (res.data.status) {
          swal({
            title: 'Berhasil',
            text: res.data.message,
            icon: 'success',
            buttons: 'Ok'
          })
            .then((val) => {
              this.$router.push({ path: '/login' })
            })
        } else {
          swal({
            title: 'Gagal',
            text: res.data.message,
            icon: 'error',
            buttons: 'Ok'
          })
        }
      }).catch((err) => {
        this.registerLoading = false
        console.log(err)
        swal({
          title: 'Gagal',
          text: 'Ada kesalahan teknis. Harap coba lagi nanti.',
          icon: 'error',
          buttons: 'Ok'
        })
      })
    },
    setFoto (input) {
      this.fotoShow = null
      if (input.target.files) {
        this.form.foto = input.target.files[0]
        this.fotoShow = URL.createObjectURL(input.target.files[0])
      }
    }
  }
}
</script>

<style scoped>
.login-form .btn {
  width: 100%;
  text-transform: uppercase;
  font-size: 14px;
  padding: 15px;
  border-width: 0px;
  margin: 30px 0;
  border-style: initial;
  border-color: initial;
  border-image: initial;
}
.foto-show {
  width: 200px;
  height: 200px;
  margin: 20px 0;
  border-radius: 50%;
}
</style>