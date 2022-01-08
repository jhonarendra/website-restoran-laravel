<template>
  <div style="background-image: url('/images/wood_1.png')">
    <NavbarComp variant="light" />
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-3">
          <SidebarUser />
        </div>
        <div class="col-md-9">
          <div style="min-height: 100vh">
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
import SidebarUser from '../components/user/SidebarUser.vue'

export default {
  components: {
    NavbarComp, FooterComp, SidebarUser
  }
}
</script>

<style scoped>
  .list-group-item {
    background: #faebcd;
  }
</style>