<template>
  <div class="user-profile">
    <div
      class="user-photo"
      style="background-image: url('/images/hidangan/spageti.jpg')"
    />
    <h4 class="text-center text-white mt-3 font-weight-300">Nama Lengkap Saya</h4>
    <p class="text-center">
      <span class="badge badge-success">Admin</span>
    </p>
    <ul class="list-group mt-3">
      <li class="list-group-item">
        <i class="fa fa-envelope pr-2" />email@gmail.com
      </li>
      <li class="list-group-item"><i class="fa fa-user pr-2" />username</li>
      <li class="list-group-item"><i class="fa fa-phone pr-2" />0899298292</li>
    </ul>
    <div class="list-group mt-3">
      <router-link to="/user/profile" class="list-group-item list-group-item-action bg-white">
        Edit Profil
      </router-link>
    </div>
    <div class="list-group mt-3">
      <router-link to="/login" class="list-group-item list-group-item-action bg-white text-danger">
        Logout
      </router-link>
    </div>
  </div>
</template>

<style scoped>
  .user-photo {
    border: 1px solid #ddd;
    height: 200px;
    width: 200px;
    border-radius: 50%;
    margin: 0 auto
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