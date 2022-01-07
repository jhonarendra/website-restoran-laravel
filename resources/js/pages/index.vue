<template>
  <div>
    <div class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-img" style="background-image: url('/images/sushi1.jpg')" />
          <!-- <img class="d-block" src="/images/sushi1.jpg" alt="First slide"> -->
        </div>
        <div class="carousel-item">
          <div class="carousel-img" style="background-image: url('/images/dinner1.jpg')" />
        </div>
        <div class="carousel-item">
          <div class="carousel-img" style="background-image: url('/images/steak1.jpg')" />
        </div>
      </div>
    </div>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <div>
      <div class="row">
        <div class="col-md-6 px-0">
          <div style="background-image: url('/images/sushi1.jpg'); background-position: center; width: 100%; height: 100vh" />
        </div>
        <div class="col-md-6 px-0">
          <div style="background-image: url('/images/wood_1.png'); background-position: center; width: 100%; height: 100vh" />
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  data () {
    return {

    }
  }
}
</script>

<style scoped="">
  .carousel-img {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center
  }
</style>
