<template>
  <div id="about" class="row">
    <div class="col-md-6 px-0">
      <div
        class="background-image img-left"
        style="background-image: url('/images/sushi1.jpg')"
      />
    </div>
    <div class="col-md-6 px-0">
      <div
        class="background-image about-content-wrapper"
        style="background-image: url('/images/wood_1.png')"
      >
        <div class="about-content">
          <h3 class="display-4 text-white">About</h3>
          <p class="h6 text-brown" style="font-size: 1.5rem; line-height: 2rem; font-weight: 300">
            8-Stars Restaurant, Restoran dengan gaya khas Western yang sangat
            cocok untuk berbagai acara dan kebutuhan. Dikenal sejak tahun
            1867, Kami menggunakan bahan - bahan yang berkualitas dan dipilah
            secara baik dari sumbernya sehingga menghasilkan hasil masakan
            yang lezat dan berkualitas. 8-Stars Restaurant menyediakan tempat
            untuk anda yang ingin berbagi momen bersama orang - orang
            disekitar anda melalui makanan yang kami sediakan, mari pesan
            tempat anda sekarang.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .about-content-wrapper {
    overflow: hidden;
  }
  .about-content {
    padding: 50px;
  }

  @media (max-width: 767px) {
    #about .background-image.img-left {
      height: 200px;
    }
    #about .background-image.about-content-wrapper {
      height: auto;
    }
  }
</style>