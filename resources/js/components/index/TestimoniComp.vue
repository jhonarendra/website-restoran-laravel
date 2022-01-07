<template>
  <div id="testimoni" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="carousel-caption">
            <h3 class="h2 text-dark-brown" style="font-weight: 300">
              "Pelayanannya ramah, tempatnya bersih, mantap deh pokoknya."
            </h3>
            <p class="text-secondary">Marria Tesalonika</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="carousel-caption">
            <h3 class="h2 text-dark-brown" style="font-weight: 300">
              "Makan adalah hobiku. 8-Stars Restaurant mengirim hobiku ke
              tingkatan selanjutnya."
            </h3>
            <p class="text-secondary">Marria Tesalonika</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="carousel-caption">
            <h3 class="h2 text-dark-brown" style="font-weight: 300">
              "Websitenya sangat bagus, apalagi restorannya, MANTAP."
            </h3>
            <p class="text-secondary">Marria Tesalonika</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  #testimoni .carousel-item {
    height: 300px;
  }
  #testimoni .carousel-item .carousel-caption {
    top: 50px;
  }
  @media (max-width: 480px) {
    #testimoni .carousel-item {
      height: 500px;
    }
  }
</style>