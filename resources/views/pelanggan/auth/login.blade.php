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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Login - 8-Stars Restaurant</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @if($alert)
    <link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
    @endif
</head>

<body class="fix-header fix-sidebar" style="background-image: url('{{ asset('resto/images/Background_menu.jpg') }}')">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                    <form method="POST" action="{{ URL('pelanggan/login') }}">
                                        @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" class="form-control" type="password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="{{URL('pelanggan/register')}}"> Sign Up Here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    
    <script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('ela/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ela/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('ela/js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('ela/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('ela/js/custom.min.js') }}"></script>

    @if($alert)
    <script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
    <!-- scripit init-->
    <script type="text/javascript">
        sweetAlert("Oops...", "Something went wrong !!", "error");
    </script>
    @endif

</body>

</html>