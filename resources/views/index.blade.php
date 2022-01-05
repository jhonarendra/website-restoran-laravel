<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>8-Stars Restaurant &mdash; Food Specialty </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('resto/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <link href=" {{ asset('ela/css/lib/toastr/toastr.min.css') }}" rel="stylesheet">

    <style type="text/css">
        @media (min-width: 1024px){
            .page-wrapper {
                margin-left: 0px;
            }
        }
        .footer{
            left: 0;
        }
        #about .carousel-indicators li{
            background-color: rgba(0,0,0,.5)
        }
        #about .carousel-indicators li.active{
            background-color: rgba(0,0,0,.2)
        }
    </style>
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <!-- Carousel -->
        <div class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="container">
                      <div class="carousel-caption fadeInUp animated" style="bottom:0;top:200px">
                        <h2 class="display-1" style="color:#fff;">8-Stars Restaurant</h2>
                        <p class="h2" style="color: #ddd;padding-top:20px;padding-bottom: 20px">A Restaurant by Kelompok 8</p>
                      </div>
                    </div>
                    <div class="carousel-item active" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="first-slide" src="resto/images/dinner1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="second-slide" src="resto/images/carlo drink.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="third-slide" src="resto/images/sushi1.jpg" alt="Third slide">
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- Carousel -->
        <!-- header header  -->
        <div class="header" style="top:0; width: 100%;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="{{asset('images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="{{asset('images/logo-text.png')}}" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hidangan">Hidangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservasi">Reservasi</a>
                        </li>
                        <li class="nav-item">
                            <a id="login" class="nav-link" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservasi">Sign Up</a>
                        </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href=""><i class="fa fa-tachometer"></i> Dashboard</a></li>
                                    <li><a href=""><i class="ti-user"></i> Profile</a></li>
                                    <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <div id="about">
            <div class="row" style="background-image:url({{ asset('resto/images/wood_1.png')}});">
              <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('resto/images/dinner1.jpg')}}">
              </div>
              <div class="col-md-6" style="padding:30px 50px;">
                <h2 class="display-4" style="color:#fff;padding-bottom: 10px;padding-top: 20px">About</h2>
                <p class="lead" style="color:#a99c92;font-weight: 300">8-Stars Restaurant, Restoran dengan gaya khas Western yang sangat cocok untuk berbagai acara dan kebutuhan. Dikenal sejak tahun 1867, Kami menggunakan bahan - bahan yang berkualitas dan dipilah secara baik dari sumbernya sehingga menghasilkan hasil masakan yang lezat dan berkualitas. 8-Stars Restaurant menyediakan tempat untuk anda yang ingin berbagi momen bersama orang - orang disekitar anda melalui makanan yang kami sediakan, mari pesan tempat anda sekarang.</p>
              </div>
            </div>
        </div>

        <div id="kata" class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 300px">
                      <div class="container">
                        <div class="carousel-caption">
                          <h3 class="display-4" style="color:#5e493a;font-size: 40px ;">"Makan adalah hobiku. 8-Stars Restaurant mengirim hobiku ke tingkatan selanjutnya."</h3>
                          <p class="h4" style="color: gray; padding-top:20px;padding-bottom: 20px">Adhiarta</p>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item" style="height: 300px">
                      <div class="container">
                        <div class="carousel-caption">
                          <h3 class="display-1" style="color:#5e493a;font-size: 40px ;">"Pelayanannya ramah, tempatnya bersih, mantap deh pokoknya."</h3>
                          <p class="h2" style="color: gray;padding-top:20px;padding-bottom: 20px">Marria Tesalonika</p>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item" style="height: 300px">
                      <div class="container">
                        <div class="carousel-caption">
                          <h3 class="display-1" style="color:#5e493a;font-size: 40px ;">"Websitenya sangat bagus, apalagi restorannya, MANTAP."</h3>
                          <p class="h2" style="color: gray;padding-top:20px;padding-bottom: 20px">Urip Y</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>                
        </div>

        <div id="hidangan" style="background-image:url({{ asset('resto/images/wood_1.png')}});">
            <div class="row">
                <div class="col-md-12" style="padding: 100px 0 50px 0">
                    <h1 class="display-4" style="color:#fff;text-align: center">Hidangan</h1>
                    <div class="container" style="margin-top: 100px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-6" style="height: 200px;background-image: url({{ asset('images/hidangan/beef.jpg') }})">
                                    </div>
                                    <div class="col-md-6" style="background: #f5f5f5;padding: 30px 20px">
                                        <div style="position:absolute;height:1px;width:1px;border:15px solid transparent;border-right: 15px solid #f5f5f5;left:-30px;top:80px"></div>
                                        <h3 style="text-align: center;color: #444;line-height: 200%"><span style="border-bottom:2px solid #fb6e14">Hidangan</span></h3>
                                        <p class="display-4" style="margin-top:30px;font-size: 40px; text-align: center;color: #5e493a">IDR 20000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="reservasi" class="container">
            <h2 class="display-4" style="text-align: center;color:#5e493a;padding:50px 0;">Reservasi</h2>

            <div class="row">
                <div class="col-md-6">
                    <h3 class="display-4" style="font-size: 30px;margin-bottom: 30px">Contact Info</h3>
                    <ul>
                        <li style="padding-left: 50px;margin-bottom: 10px">
                            <i class="icon-home" style="position: absolute;left: 20px"></i>
                            Jalan Raya Batu Belig no. 17X, <br> Seminyak, Bali
                        </li>
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-phone" style="position: absolute;left: 20px"></i> (0361)237-163</li>
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-envelope" style="position: absolute;left: 20px"></i>8-stars@gmail.com</li>
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-globe" style="position: absolute;left: 20px"></i> <a href="#" target="_blank">8-stars.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="display-4" style="font-size: 30px;margin-bottom: 30px">
                            Sign Up
                    </h3>
                    <form action="{{URL('pelanggan/register')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input id="name" name="name" class="form-control" placeholder="Name" type="text"required>
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
                            <input class="btn btn-primary" value="Sign Up" type="submit"><br />
                        </div>
                        <p>Already have an account? <a href="{{URL('pelanggan/login')}}"><u>Sign in</u></a></p>
                    </form>
                </div>
            </div>
        </div>


        <footer class="footer" style="text-align: center;"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib <span id="tes"></span></a></footer>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('ela/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('ela/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('ela/js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('ela/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('ela/js/custom.min.js') }}"></script>

    <script type="text/javascript">
        $(document).scroll(function(){
            var y = $(this).scrollTop();
            var header = $(window).height();
            if(y > header){
                $('.header').css('position','fixed');
            } else {
                $('.header').css('position','relative');
            }
        });
    </script>
    <script src="{{ asset('ela/js/lib/toastr/toastr.min.js') }}"></script>

</body>

</html>