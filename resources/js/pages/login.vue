<template>
  <div
    class="background-image"
    style="background-image: url('/images/Background_menu.jpg')"
  >
    <div id="main-wrapper">
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="login-content card">
            <div class="login-form">
              <h4>Login</h4>
              <form method="POST" action="" @submit="onSubmit">
                <div class="form-group">
                  <label>Email</label>
                  <input
                    v-model="form.email"
                    id="email"
                    class="form-control"
                    type="email"
                    name="email"
                    required
                    autofocus
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input
                    v-model="form.password"
                    id="password"
                    class="form-control"
                    type="password"
                    name="password"
                    required
                  />
                </div>
                <button
                  type="submit"
                  class="btn btn-primary"
                  :disabled="loginLoading"
                >
                  <i v-if="loginLoading" class="fa fa-spinner fa-spin" />
                  <span>Login</span>
                </button>
                <div class="register-link text-center">
                  <p>
                    Belum punya akun? <router-link to="/register">Daftar</router-link>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert'

export default {
  data () {
    return {
      form: {
        email: '',
        password: ''
      },
      loginLoading: false
    }
  },
  methods: {
    onSubmit (e) {
      e.preventDefault()
      this.loginLoading = true
      const formData = new FormData()
      formData.append('email', this.form.email)
      formData.append('password', this.form.password)
      setTimeout(() => {
        this.$store.dispatch('login', formData).then((res) => {
          this.loginLoading = false
          if (res.data.status) {
            this.$router.push({ path: '/user' })
          } else {
            swal({
              title: 'Gagal',
              text: res.data.message,
              icon: 'error',
              buttons: 'Ok'
            })
          }
        }).catch((err) => {
          this.loginLoading = false
          console.log(err)
          swal({
            title: 'Gagal',
            text: 'Ada kesalahan teknis. Harap coba lagi nanti.',
            icon: 'error',
            buttons: 'Ok'
          })
        })
      }, 2000)
    }
  }
}
</script>

<style scoped>
  .login-content {
    margin: 100px 0
  }
  .login-form {
    background: rgb(255, 255, 255);
    padding: 30px 30px 20px;
    border-radius: 2px;
  }
  .login-form h4 {
    color: rgb(69, 90, 100);
    text-align: center;
    margin-bottom: 50px;
    font-size: 2rem;
    font-weight: 300;
  }
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
</style>