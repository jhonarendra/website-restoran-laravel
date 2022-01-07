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
      <div class="col-md-6">
        <h4 class="text-dark-brown py-4">Daftar</h4>
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
          <p>Sudah punya akun? <router-link to="/login">Login</router-link></p>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
  #reservasi h4 {
    font-weight: 300;
    font-size: 2rem;
  }
</style>