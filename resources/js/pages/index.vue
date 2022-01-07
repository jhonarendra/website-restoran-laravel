<template>
  <div>
    <!-- slider -->
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

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="/images/logo-text.png" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hidangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reservasi</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- about section -->
    <div id="about-section" class="row">
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
            <p class="text-brown">
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

    <!-- testimoni -->
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

    <!-- menu -->
    <div
      id="menu"
      class="background-image"
      style="background-image: url('/images/wood_1.png'); overflow: hidden"
    >
      <div class="container">
        <h3 class="text-center display-4 text-white py-5">Menu Favorit</h3>
        <div class="row">
          <div v-for="(h, i) in hidangan" :key="h.id_hidangan" class="col-md-6">
            <div class="row">
              <div
                class="col-md-6"
                :style="`height: 200px;background-image: url('/images/hidangan/${h.foto_hidangan}')`"
              />
              <div
                class="col-md-6"
                :style="`height: 200px; background: ${
                  [0, 3, 4].includes(i) ? '#f5f5f5' : '#faebcd'
                } ;padding: 30px 20px`"
              >
                <div
                  :style="`position:absolute;height:1px;width:1px;border:15px solid transparent;border-right: 15px solid ${
                    [0, 3, 4].includes(i) ? '#f5f5f5' : '#faebcd'
                  };left:-30px;top:80px`"
                />
                <h3 style="text-align: center; color: #444; line-height: 200%">
                  <span style="border-bottom: 2px solid #fb6e14">{{
                    h.nama_hidangan
                  }}</span>
                </h3>
                <p
                  class="display-4"
                  style="
                    margin-top: 30px;
                    font-size: 40px;
                    text-align: center;
                    color: #5e493a;
                  "
                >
                  IDR {{ h.harga_hidangan }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- reservasi -->
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="name" class="col-md-3">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" class="form-control" placeholder="Name" type="text" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-3">Email</label>
              <div class="col-md-9">
                <input id="email" name="email" class="form-control" placeholder="Email" type="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-md-3">Username</label>
              <div class="col-md-9">
                <input id="username" name="username" class="form-control" placeholder="Username" type="text" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-3">Password</label>
              <div class="col-md-9">
                <input id="password" name="password" class="form-control" placeholder="Password" type="password" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="foto_pelanggan" class="col-md-3">Foto</label>
              <div class="col-md-9">
                <input id="foto_pelanggan" class="form-control" type="file" name="foto_pelanggan" required>
              </div>
            </div>
            <div class="form-group">
              <button
                type="submit"
                class="btn btn-primary"
              >
                Daftar
              </button>
            </div>
            <p>Sudah punya akun? <a href=""><u>Login</u></a></p>
          </form>
        </div>
      </div>
    </div>



    <footer class="footer py-4 text-center">
      © 2018 All rights reserved
    </footer>
  </div>
</template>

<script>
export default {
  data () {
    return {
      hidangan: [ 
        { 
          id_hidangan:1,
          nama_hidangan:"Spageti",
          jenis_hidangan:"Makanan",
          harga_hidangan:45000,
          foto_hidangan:"spageti.jpg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:2,
          nama_hidangan:"Salad",
          jenis_hidangan:"Makanan",
          harga_hidangan:27500,
          foto_hidangan:"salad.jpeg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:3,
          nama_hidangan:"Spageti",
          jenis_hidangan:"Makanan",
          harga_hidangan:45000,
          foto_hidangan:"spageti.jpg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:4,
          nama_hidangan:"Pinneaple Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:12500,
          foto_hidangan:"pinepple.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        },
        { 
          id_hidangan:5,
          nama_hidangan:"Strawberry Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:15000,
          foto_hidangan:"heart.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        },
        { 
          id_hidangan:6,
          nama_hidangan:"Tropical Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:20000,
          foto_hidangan:"tropical.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        }
      ]
    }
  },
  mounted () {
    const nav = document.querySelector('nav')
    let sticky = nav.offsetTop
    window.onscroll = () => onScroll()
    function onScroll () {
      if (window.pageYOffset > sticky) {
        nav.classList.add('fixed-top')
      } else if (window.pageYOffset < sticky) {
        console.log('remove')
        nav.classList.remove('fixed-top')
      }
    }
  }
}
</script>

<style>
  .fixed-top + #about-section .background-image {
    padding-top: 56px;
  }




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






  .about-content-wrapper {
    overflow: hidden;
  }
  .about-content {
    padding: 50px;
  }

  @media (max-width: 767px) {
    #about-section .background-image.img-left {
      height: 200px;
    }
    #about-section .background-image.about-content-wrapper {
      height: 80vh;
    }
  }





  #menu.background-image {
    height: auto;
    min-height: 100vh;
    padding: 50px 0;
  }

  #reservasi h4 {
    font-weight: 300;
    font-size: 2rem;
  }
</style>
