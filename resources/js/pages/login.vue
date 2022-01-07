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
              <form method="POST" action="">
                <div class="form-group">
                  <label>Email</label>
                  <input
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
                    id="password"
                    class="form-control"
                    type="password"
                    name="password"
                    required
                  />
                </div>
                <button
                  type="submit"
                  class="btn btn-primary btn-flat m-b-30 m-t-30"
                >
                  Login
                </button>
                <div class="register-link m-t-15 text-center">
                  <p>
                    Belum punya akun?
                    <a href=""> Daftar</a>
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