<!DOCTYPE html>
<html lang="en" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>@yield('title') - 8-Stars Restaurant</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">
    
    <script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .sidebar-nav > ul > li > a.active{
            background: #faebcd;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{URL('/')}}">
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
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        <!-- Comment -->
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('ela/images/users/5.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('ela/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('ela/images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('ela/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/@yield('foto_pegawai')" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="{{URL('pegawai/pengaturan')}}"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="{{URL('pegawai/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="background: #faebcd">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="background: #faebcd">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">@yield('jabatan_pegawai')</li>

                        <li class="{{{(Request::is('pegawai') ? 'active' : '')}}}"> <a href="{{URL('pegawai')}}" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard </a></li>
                        <li class="{{{(Request::is('pegawai/reservasi') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Reservasi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/reservasi')}}">Semua Reservasi</a></li>
                                <li><a href="{{URL('pegawai/reservasi/create')}}">Buat Reservasi</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/pemesanan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Pemesanan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/pemesanan')}}">Semua Pemesanan</a></li>
                                <li><a href="{{URL('pegawai/pemesanan/create')}}">Buat Pemesanan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/pelanggan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pelanggan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/pelanggan')}}">Semua Pelanggan</a></li>
                                <li><a href="{{URL('pegawai/pelanggan/create')}}">Buat Akun Pelanggan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/pegawai') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user-o"></i><span class="hide-menu">Pegawai</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/pegawai')}}">Semua Pegawai</a></li>
                                <li><a href="{{URL('pegawai/pegawai/create')}}">Buat Akun Pegawai</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/hidangan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-fire"></i><span class="hide-menu">Hidangan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/hidangan')}}">Semua Hidangan</a></li>
                                <li><a href="{{URL('pegawai/hidangan/create')}}">Tambah Hidangan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/restoran') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Restoran</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('pegawai/restoran')}}">Semua Restoran</a></li>
                                <li><a href="{{URL('pegawai/restoran/create')}}">Tambah Restoran</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('pegawai/pengaturan') ? 'active' : '')}}}"> <a href="{{URL('pegawai/pengaturan')}}" aria-expanded="false"><i class="fa fa-gears"></i>Pengaturan</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles" style="margin: 0;">
                <div class="col-md-5 align-self-center">
                    <h3 style="color: #5e493a">@yield('title')</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid" style="padding-top: 30px; min-height: 500px;background-image:url({{ asset('resto/images/wood_1.png')}});">
                <!-- Start Page Content -->
                @yield('content')
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer" style="text-align: center"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
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

</body>

</html>