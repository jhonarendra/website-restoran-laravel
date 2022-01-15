<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">Profile</h1>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0">
        <li class="breadcrumb-item"><router-link to="/user" class="text-brown">Home</router-link></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>
      </ol>
    </nav>
    <div class="card mt-3">
      <div class="card-body">
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
                :disabled="!edit"
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
                :disabled="!edit"
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
                :disabled="!edit"
              >
              </textarea>
            </div>
          </div>
          <div v-if="edit" class="form-group row">
            <label for="foto_pelanggan" class="col-md-3">Foto</label>
            <div class="col-md-9">
              <input
                id="foto_pelanggan"
                class="form-control"
                type="file"
                name="foto_pelanggan"
                accept="Image/*"
                @change="setFoto"
                :disabled="!edit"
              />
              <p><small class="text-secondary">Kosongkan jika tidak ingin mengubah foto</small></p>
              <img
                v-if="fotoShow"
                :src="fotoShow"
                class="foto-show"
              />
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
                :disabled="!edit"
              />
            </div>
          </div>
          <div v-if="edit" class="form-group row">
            <label for="edit-password" class="col-md-3">Ubah Password</label>
            <div class="col-md-9">
              <input
                id="edit-password"
                v-model="editPassword"
                :value="1"
                type="checkbox"
              >
            </div>
          </div>
          <div v-if="editPassword" class="form-group row">
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
                :disabled="!edit"
              />
            </div>
          </div>
          <div class="form-group">
            <button
              type="button"
              class="btn"
              :class="(edit) ? 'btn-danger' : 'btn-primary'"
              @click="edit = !edit"
            >
              {{ (edit) ? 'Batal' : 'Edit' }}
            </button>
            <button
              v-if="edit"
              type="submit"
              class="btn btn-primary"
              :disabled="updateLoading"
            >
              <i v-if="updateLoading" class="fa fa-spinner fa-spin" />
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </admin-layout>
</template>


<script>
import swal from 'sweetalert'
import AdminLayout from '../../../layouts/admin'

export default {
  components: {
    AdminLayout
  },
  computed: {
    userLogin () {
      return this.$store.state.user.userLogin
    }
  },
  watch: {
    userLogin (newVal) {
      if (newVal) {
        this.setForm({
          nama: (newVal.pelanggan) ? newVal.pelanggan.nama : newVal.pegawai.nama,
          alamat: (newVal.pelanggan) ? newVal.pelanggan.alamat : newVal.pegawai.alamat,
          no_hp: (newVal.pelanggan) ? newVal.pelanggan.no_hp : newVal.pegawai.no_hp,
          email: newVal.email
        })
      }
    }
  },
  data () {
    return {
      edit: false,
      form: {
        nama: '',
        alamat: '',
        no_hp: '',
        email: '',
        password: '',
        foto: ''
      },
      editPassword: false,
      fotoShow: null,
      updateLoading: false
    }
  },
  mounted () {
    console.lg
    if (this.userLogin) {
      this.setForm({
        nama: (this.userLogin.pelanggan) ? this.userLogin.pelanggan.nama : this.userLogin.pegawai.nama,
        alamat: (this.userLogin.pelanggan) ? this.userLogin.pelanggan.alamat : this.userLogin.pegawai.alamat,
        no_hp: (this.userLogin.pelanggan) ? this.userLogin.pelanggan.no_hp : this.userLogin.pegawai.no_hp,
        email: this.userLogin.email
      })
    }
  },
  methods: {
    setForm (data) {
      this.form.nama = data.nama
      this.form.alamat = data.alamat
      this.form.no_hp = data.no_hp
      this.form.email = data.email
    },
    onSubmit (e) {
      e.preventDefault()

      if (!this.edit) {
        return false
      }
      if (this.editPassword && this.form.password === '') {
        return false
      }

      this.updateLoading = true
      const formData = new FormData()

      formData.append('nama', this.form.nama)
      formData.append('alamat', this.form.alamat)
      formData.append('no_hp', this.form.no_hp)
      if (this.form.foto) {
        formData.append('foto', this.form.foto)
      }
      formData.append('email', this.form.email)
      if (this.form.password) {
        formData.append('password', this.form.password)
      }
      
      this.$store.dispatch('updateProfile', formData).then((res) => {
        this.updateLoading = false
        if (res.data.status) {
          swal({
            title: 'Berhasil',
            text: res.data.message,
            icon: 'success',
            buttons: 'Ok'
          })
          this.edit = false
          this.editPassword = false
          this.$store.dispatch('fetchUserLogin').then((r) => {
            if (r.data.status) {
              this.$store.commit('setUserLogin', r.data.data)
            }
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
  .foto-show {
    width: 200px;
    height: 200px;
    margin: 20px 0;
    border-radius: 50%;
  }
</style>