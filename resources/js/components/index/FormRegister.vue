<template>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="name" class="col-md-3">Name</label>
      <div class="col-md-9">
        <input id="name" name="name" class="form-control" placeholder="Name" type="text" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-3">Email</label>
      <div class="col-md-9">
        <input id="email" name="email" class="form-control" placeholder="Email" type="email" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-md-3">Username</label>
      <div class="col-md-9">
        <input id="username" name="username" class="form-control" placeholder="Username" type="text" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-3">Password</label>
      <div class="col-md-9">
        <input id="password" name="password" class="form-control" placeholder="Password" type="password" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="foto_pelanggan" class="col-md-3">Foto</label>
      <div class="col-md-9">
        <input id="foto_pelanggan" class="form-control" type="file" name="foto_pelanggan" required>
      </div>
    </div>
    <div class="form-group">
      <button
        type="submit"
        class="btn btn-primary"
      >
        Daftar
      </button>
    </div>
    <p class="text-center">Sudah punya akun? <router-link to="/login">Login</router-link></p>
  </form>
</template>

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
</style>