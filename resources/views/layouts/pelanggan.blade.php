<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="Warung Ayu, Food Specialty" />
    <meta name="keywords" content="Food, Warung Ayu, AyuFood, Kuta, Bali" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style type="text/css">
        body{
            background: #fff;
        }
        .custom-nav{
            position: fixed;
            width: 100%;
            z-index: 100;
            height:68px;
            box-shadow: 0 0 7px 0 rgba(0, 0, 0, 0.3);
        }
        .custom-nav .navbar-brand{
            font-size: 40px;
            font-weight: 700;
            font-style: italic;
        }
        .nav{
            background: url({{ asset('images/res_img_8.jpg') }} );
            position:fixed;
            height:100%;
            top:68px;
        }
        .nav-link{
            color:#5e493a;
        }
        .nav-link.active{
            color:#fb6e14;
        }
        .custom-content{
            background: url({{ asset('images/wood_1.png') }}) repeat;
            padding-top:78px;
            color:#a99c92;
            line-height:2;
            min-height:700px;
        }
    </style>

</head>
<body>
    <nav class="custom-nav navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="{{URL('/')}}">MyRestoran</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @yield('nama_pelanggan')
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{URL('pelanggan/pengaturan')}}">Profil</a>
              <a class="dropdown-item" href="{{URL('pelanggan/logout')}}">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
        <ul class="nav flex-column col-md-2">
          <li class="nav-item">
            <a class="nav-link {{{(Request::is('pelanggan') ? 'active' : '')}}}" href="{{URL('pelanggan')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{{(Request::is('pelanggan/reservasi') ? 'active' : '')}}}" href="{{URL('pelanggan/reservasi')}}">Reservasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{{(Request::is('pelanggan/pemesanan') ? 'active' : '')}}}" href="{{URL('pelanggan/pemesanan')}}">Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{{(Request::is('pelanggan/pengaturan') ? 'active' : '')}}}" href="{{URL('pelanggan/pengaturan')}}">Pengaturan</a>
          </li>
        </ul>

        <div class="custom-content col-md-10 offset-md-2 to-animate">
            @yield('content')
        </div>


	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>