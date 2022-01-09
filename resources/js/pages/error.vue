<template>
  <div class="text-center">
    <h1>{{ ($route.params.code) ? $route.params.code : '404' }}</h1>
    <p>{{ ($route.params.message) ? $route.params.message : 'Halaman Tidak Ditemukan' }}</p>
  </div>
</template>

<script>
export default {
  mounted () {
    if (this.$route.params.redirect) {
      const uriPath = this.$route.params.redirect.replace(/-/g, '/')
      window.history.pushState('', '', '/' + uriPath)
      document.querySelector('title').innerHTML = this.$route.params.code + ' | ' + this.$route.params.message
    } else {
      document.querySelector('title').innerHTML = '404 | Halaman Tidak Ditemukan'
    }
  }
}
</script>