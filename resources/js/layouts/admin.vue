<template>
  <div style="background-image: url('/images/wood_1.png')">
    <NavbarComp variant="light" />
    <div class="container pt-5">
      <div class="row">
        <div class="user-profile col-md-3">
          <div class="user-photo" style="background-image: url('/images/hidangan/spageti.jpg')" />
          <h4 class="text-center text-white mt-3 font-weight-300">Nama Lengkap Saya</h4>
          <p class="text-center">
            <span class="badge badge-success">Admin</span>
          </p>
          <ul class="list-group mt-3">
            <li class="list-group-item">
              <i class="fa fa-envelope pr-2" /> email@gmail.com
            </li>
            <li class="list-group-item">
              <i class="fa fa-user pr-2" /> username
            </li>
            <li class="list-group-item">
              <i class="fa fa-phone pr-2" />0899298292
            </li>
          </ul>
          <div class="list-group mt-3">
            <a href="#" class="list-group-item list-group-item-action bg-white">
              Edit Profil
            </a>
          </div>
        </div>
        <div class="col-md-9">
          <div style="min-height: 100vh" class="text-white">
            <slot />
          </div>
        </div>
      </div>
      <div class="text-white">
        <FooterComp />
      </div>
    </div>
  </div>
</template>

<script>
import FooterComp from '../components/index/FooterComp.vue'
import NavbarComp from '../components/index/NavbarComp.vue'
export default {
  components: {
    NavbarComp, FooterComp
  }
}
</script>

<style scoped>
  .user-photo {
    border: 1px solid #ddd;
    height: 200px;
    width: 200px;
    border-radius: 50%;
    margin: 0 auto
  }
  .list-group-item {
    background: #faebcd;
  }

  @media (max-width: 767px) {
    .user-profile {
      display: none;
    }
  }
</style>