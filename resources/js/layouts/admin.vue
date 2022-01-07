<template>
  <div style="background-image: url('/images/wood_1.png')">
    <NavbarComp variant="light" />
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-3">
          <div class="user-photo" style="background-image: url('/images/hidangan/spageti.jpg')" />
          <ul class="list-group mt-3">
            <li class="list-group-item">
              Nama Lengkap Saya
            </li>
            <li class="list-group-item">
              email@gmail.com
            </li>
            <li class="list-group-item">
              username
            </li>
            <li class="list-group-item">
              0899298292
            </li>
          </ul>
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
</style>