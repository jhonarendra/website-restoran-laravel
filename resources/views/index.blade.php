<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myRestoran</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Custom Style -->
        <style type="text/css">
            /* GLOBAL STYLES
            -------------------------------------------------- */
            /* Padding below the footer and lighter body text */

            body {
              padding-top: 3rem;
              padding-bottom: 3rem;
              color: #5a5a5a;
            }


            /* CUSTOMIZE THE CAROUSEL
            -------------------------------------------------- */

            /* Carousel base class */
            .carousel {
              margin-bottom: 4rem;
            }
            /* Since positioning the image, we need to help out the caption */
            .carousel-caption {
              bottom: 3rem;
              z-index: 10;
            }

            /* Declare heights because of positioning of img element */
            .carousel-item {
              height: 32rem;
              background-color: #777;
            }
            .carousel-item > img {
              position: absolute;
              top: 0;
              left: 0;
              min-width: 100%;
              height: 32rem;
            }


            /* MARKETING CONTENT
            -------------------------------------------------- */

            /* Center align the text within the three columns below the carousel */
            .marketing .col-lg-4 {
              margin-bottom: 1.5rem;
              text-align: center;
            }
            .marketing h2 {
              font-weight: 400;
            }
            .marketing .col-lg-4 p {
              margin-right: .75rem;
              margin-left: .75rem;
            }


            /* Featurettes
            ------------------------- */

            .featurette-divider {
              margin: 5rem 0; /* Space out the Bootstrap <hr> more */
            }

            /* Thin out the marketing headings */
            .featurette-heading {
              font-weight: 300;
              line-height: 1;
              letter-spacing: -.05rem;
            }


            /* RESPONSIVE CSS
            -------------------------------------------------- */

            @media (min-width: 40em) {
              /* Bump up size of carousel content */
              .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
              }

              .featurette-heading {
                font-size: 50px;
              }
            }

            @media (min-width: 62em) {
              .featurette-heading {
                margin-top: 7rem;
              }
            }

        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="">myRestoran</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="
                                @if(Auth::user()->jabatan == 'Admin')
                                admin
                                @else
                                pelanggan
                                @endif
                            ">{{Auth::user()->name}} <span class="sr-only">(current)</span></a>
                        </li>
                        @else
                        <!--<li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="pelanggan/login">Login Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pegawai/login">Login Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pelanggan/register">Register Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pegawai/register">Register Pegawai</a>
                        </li>
                        @endauth
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </header>

        <main role="main">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>myRestoran</h1>
                                <p>Website sistem restoran</p>
                                <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Dilengkapi Berbagai Fitur</h1>
                                <p>User Panel, Dashboard Admin, Reservation Order and many more...</p>
                                <p><a class="btn btn-lg btn-primary" href="" role="button">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>Mudah Digunakan</h1>
                                <p>Mudah dipakai semua kalangan</p>
                                <p><a class="btn btn-lg btn-primary" href="" role="button">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="index.html#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="index.html#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->

            <div class="container marketing">

            <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                        <p><a class="btn btn-secondary" href="index.html#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                        <p><a class="btn btn-secondary" href="index.html#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-secondary" href="index.html#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->


                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                    </div>
                </div>

                <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                        </div>
                    </div>

                <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

            </div><!-- /.container -->


                <!-- FOOTER -->
            <footer class="container">
            <p class="float-right"><a href="index.html#">Back to top</a></p>
            <p>&copy; 2017 Company, Inc. &middot; <a href="index.html#">Privacy</a> &middot; <a href="index.html#">Terms</a></p>
            </footer>

        </main>
        <!--<script type="text/javascript">
            alert("jangan lupa migrate, lalu db:seed")
        </script>-->
    </body>
</html>
