<template>
  <admin-layout>
    <h1 class="font-weight-300 text-white">ID {{ $route.params.id }}</h1>
  </admin-layout>
</template>


<script>
import AdminLayout from '../../../layouts/admin'

export default {
  components: {
    AdminLayout,
  }
}
</script>
