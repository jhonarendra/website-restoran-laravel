<template>
  <div class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="container">
        <div
          class="carousel-caption fadeInUp animated"
          style="bottom: 0; top: 200px"
        >
          <h2 class="carousel-title">8-Stars Restaurant</h2>
          <p class="carousel-desc">A Restaurant by Kelompok 8</p>
        </div>
      </div>
      <div class="carousel-item active">
        <div
          class="background-image"
          style="
            background-image: url('/images/sushi1.jpg');
            filter: brightness(40%);
          "
        />
      </div>
      <div class="carousel-item">
        <div
          class="background-image"
          style="
            background-image: url('/images/dinner1.jpg');
            filter: brightness(40%);
          "
        />
      </div>
      <div class="carousel-item">
        <div
          class="background-image"
          style="
            background-image: url('/images/steak1.jpg');
            filter: brightness(40%);
          "
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
  .carousel-title {
    font-size: 6rem;
    color: #ffffff;
    font-weight: 300;
    line-height: 1.2;
  }
  .carousel-desc {
    margin-top: 30px;
    font-size: 2rem;
    color: #dddddd;
  }

  @media (max-width: 767px) {
    .carousel-title {
      font-size: 4rem;
    }
    .carousel-desc {
      font-size: 1.5rem;
    }
  }
  @media (max-width: 480px) {
    .carousel-title {
      font-size: 3rem;
    }
  }
</style>