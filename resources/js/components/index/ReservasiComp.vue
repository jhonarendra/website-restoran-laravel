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
        <FormRegister />
      </div>
    </div>
  </div>
</template>

<script>
import FormRegister from './FormRegister'

export default {
  components: {
    FormRegister
  },
  data () {
    
  },
}
</script>

<style scoped>
  #reservasi h4 {
    font-weight: 300;
    font-size: 2rem;
  }
</style>