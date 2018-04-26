<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyRestaurant &mdash; Food Specialty </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <!-- Flexslider -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
    <div id="fh5co-container">
        <div id="fh5co-home" class="js-fullheight" data-section="home">

            <div class="flexslider">
                
                <div class="fh5co-overlay"></div>
                <div class="fh5co-text">
                    <div class="container">
                        <div class="row">
                            <h1 class="to-animate">MyResto</h1>
                            <h2 class="to-animate">Warung <span>by</span> <a href="#" target="_blank">Kelompok 8</a></h2>
                        </div>
                    </div>
                </div>
                <ul class="slides">
                <li style="background-image: url(images/steak1.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/mushroom_soup1.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/sushi1.jpg);" data-stellar-background-ratio="0.5"></li>
                </ul>

            </div>
            
        </div>
        <div class="js-sticky">
            <div class="fh5co-main-nav">
                <div class="container-fluid">
                    <div class="fh5co-menu-1">
                        <a href="#" data-nav-section="home">Home</a>
                        <a href="#" data-nav-section="about">About</a>
                        <a href="#" data-nav-section="features">Special Menu</a>
                    </div>
                    <div class="fh5co-logo">
                        <a href="index.html">MyRestoran</a>
                    </div>
                    <div class="fh5co-menu-2">
                        <a href="#" data-nav-section="menu">Menu</a>
                        <a href="#" data-nav-section="events">Events</a>
                        @guest
                        @else
                        <a href="#" data-nav-section="reservation">Reservation</a>
                        @endguest
                    </div>
                </div>
                
            </div>
        </div>

        <div id="fh5co-about" data-section="about">
            <div class="fh5co-2col fh5co-bg to-animate-2" style="background-image: url(images/dinner1.jpg)"></div>
            <div class="fh5co-2col fh5co-text">
                <h2 class="heading to-animate">About Us</h2>
                <p class="to-animate"><span class="firstcharacter">M</span>y Resto, Restoran dengan gaya khas Western yang sangat cocok untuk berbagai acara dan kebutuhan. Dikenal sejak tahun 1967, Kami menggunakan bahan - bahan yang berkualitas dan dipilah secara baik dari sumbernya sehingga menghasilkan hasil masakan yang lezat dan berkualitas. My Resto menyediakan tempat untuk anda yang ingin berbagi momen bersama orang - orang disekitar anda melalui makanan yang kami sediakan, mari pesan tempat anda sekarang.</p>
                <p class="text-center to-animate"><a href="/pelanggan/login" class="btn btn-primary btn-outline">RESERVATION</a></p>
            </div>
        </div>

        <div id="fh5co-sayings">
            <div class="container">
                <div class="row to-animate">

                    <div class="flexslider">
                        <ul class="slides">
                            
                            <li>
                                <blockquote>
                                    <p>&ldquo;Cooking is an art, but all art requires knowing something about the techniques and materials&rdquo;</p>
                                    <p class="quote-author">&mdash; Nathan Myhrvold</p>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p>&ldquo;Give a man food, and he can eat for a day. Give a man a job, and he can only eat for 30 minutes on break.&rdquo;</p>
                                    <p class="quote-author">&mdash; Lev L. Spiro</p>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p>&ldquo;Find something you’re passionate about and keep tremendously interested in it.&rdquo;</p>
                                    <p class="quote-author">&mdash; Julia Child</p>
                                </blockquote>
                            </li>
                            <li>
                                <blockquote>
                                    <p>&ldquo;Never work before breakfast; if you have to work before breakfast, eat your breakfast first.&rdquo;</p>
                                    <p class="quote-author">&mdash; Josh Billings</p>
                                </blockquote>
                            </li>
                            
                            
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div id="fh5co-featured" data-section="features">
            <div class="container">
                <div class="row text-center fh5co-heading row-padded">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="heading to-animate">Special Menu</h2>
                        <p class="sub-heading to-animate">Menu spesial khusus yang menjadi andalan kami.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="fh5co-grid">
                        <div class="fh5co-v-half to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_1.jpg)"></div>
                            <div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
                                <h2>Fresh Mushrooms</h2>
                                <span class="pricing">IDR 28k</span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="fh5co-v-half">
                            <div class="fh5co-h-row-2 to-animate-2">
                                <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_2.jpg)"></div>
                                <div class="fh5co-v-col-2 fh5co-text arrow-left">
                                    <h2>Grilled Chiken Salad</h2>
                                    <span class="pricing">IDR 22k</span>
                                    <p>Far far away, behind the word mountains.</p>
                                </div>
                            </div>
                            <div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
                                <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_8.jpg)"></div>
                                <div class="fh5co-v-col-2 fh5co-text arrow-right">
                                    <h2>Cheese and Garlic Toast</h2>
                                    <span class="pricing">IDR 18k</span>
                                    <p>Far far away, behind the word mountains.</p>
                                </div>
                            </div>
                        </div>

                        <div class="fh5co-v-half">
                            <div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
                                <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_7.jpg)"></div>
                                <div class="fh5co-v-col-2 fh5co-text arrow-right">
                                    <h2>Organic Egg</h2>
                                    <span class="pricing">IDR 15k</span>
                                    <p>Far far away, behind the word mountains.</p>
                                </div>
                            </div>
                            <div class="fh5co-h-row-2 to-animate-2">
                                <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_6.jpg)"></div>
                                <div class="fh5co-v-col-2 fh5co-text arrow-left">
                                    <h2>Salad with Crispy Chicken</h2>
                                    <span class="pricing">IDR 32k</span>
                                    <p>Far far away, behind the word mountains.</p>
                                </div>
                            </div>
                        </div>
                        <div class="fh5co-v-half to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_3.jpg)"></div>
                            <div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
                                <h2>Tomato Soup with Chicken</h2>
                                <span class="pricing">IDR 25k</span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div id="fh5co-type" style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="fh5co-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 to-animate">
                        <div class="fh5co-type">
                            <h3 class="with-icon icon-1">Fruits</h3>
                            <p>Buah-buahan segar yang dipilih dan dipetik langsung dari sumbernya.</p>
                        </div>
                    </div>
                    <div class="col-md-3 to-animate">
                        <div class="fh5co-type">
                            <h3 class="with-icon icon-2">Sea food</h3>
                            <p>Semua aneka hidangan laut yang fresh siap untuk anda nikmati.</p>
                        </div>
                    </div>
                    <div class="col-md-3 to-animate">
                        <div class="fh5co-type">
                            <h3 class="with-icon icon-3">Vegetables</h3>
                            <p>Sayur-sayuran khusus yang kami panen khusus untuk anda.</p>
                        </div>
                    </div>
                    <div class="col-md-3 to-animate">
                        <div class="fh5co-type">
                            <h3 class="with-icon icon-4">Meat</h3>
                            <p>Dipilih dengan kualitas daging yang terbaik dari peternakannya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-menus" data-section="menu">
            <div class="container">
                <div class="row text-center fh5co-heading row-padded">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="heading to-animate">Food Menu</h2>
                        <p class="sub-heading to-animate">Dipilih Dengan Bahan Terbaik dan Berkualitas.</p>
                    </div>
                </div>
                <div class="row row-padded">
                    <div class="col-md-6">
                        <div class="fh5co-food-menu to-animate-2">
                            <h2 class="fh5co-drinks">Drinks</h2>
                            <ul>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/pinepple.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Pina Colada</h3>
                                            <p>Icy mixed coconut cream with pinapple juice.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 28k
                                    </div>
                                </li>   
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/long_island.JPG" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Long Island</h3>
                                            <p>Teq,gin,rum,vodka mixed with cola and orange juice.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 25k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/soft%20drink.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Soft Drinks</h3>
                                            <p>Pepsi,7up,Sprite,Fanta.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 15k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/wine.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Winery</h3>
                                            <p>Red & White, You know the best right?</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 65k
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="fh5co-food-menu to-animate-2">
                            <h2 class="fh5co-dishes">Food</h2>
                            <ul>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/spageti.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>spagetti bolognese </h3>
                                            <p>pasta with sauce tomato.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 68k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/ribs.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Hot Grilled Ribs</h3>
                                            <p>ribs with sauce BBQ</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 86K
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/salad.jpeg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Thai Chicken Salad</h3>
                                            <p>salad with chiken sauce thai</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 52k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/sushi1.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>sushi</h3>
                                            <p>five roll with cheese.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 47k
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="fh5co-food-menu to-animate-2">
                            <h2 class="fh5co-drinks">Juice</h2>
                            <ul>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/tropical.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Tropical Juice</h3>
                                            <p>healty living with healty juice.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 30k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/green%20juice.jpg" class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>Green Juice</h3>
                                            <p>cucumber juice.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 22k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/beries.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Berries Juice</h3>
                                            <p>with berries fresh.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 25k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/heart.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Heartbeat Juice</h3>
                                            <p>with beetroot with apple and ginger.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 22k
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="fh5co-food-menu to-animate-2">
                            <h2 class="fh5co-dishes">Steak</h2>
                            <ul>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/beef.jpg" class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Beef Steak</h3>
                                            <p>Beef Steak with Western Style sauce</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 170k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/chiken.jpg" class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3> Chicken steak</h3>
                                            <p>Chicken Steak with Cheese sauce.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 75k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/saus.jpeg" class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>Italy Sausages</h3>
                                            <p>Sausages from italy.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 85k
                                    </div>
                                </li>
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img src="images/tuna.jpg"class="img-responsive" >
                                        </figure>
                                        <div>
                                            <h3>Tuna steak</h3>
                                            <p>Fresh Tuna Steak.</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        IDR 85k
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center to-animate-2">
                        <p><a href="file:///C:/xampp/htdocs/WAB/menu_ext.html" class="btn btn-primary btn-outline">More Food Menu</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-events" data-section="events" style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5">
            <div class="fh5co-overlay"></div>
            <div class="container">
                <div class="row text-center fh5co-heading row-padded">
                    <div class="col-md-8 col-md-offset-2 to-animate">
                        <h2 class="heading">Upcoming Events</h2>
                        <p class="sub-heading">Event Khusus yang akan datang untuk menemani malam anda.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="fh5co-event to-animate-2">
                            <h3>Kitchen Workshops</h3>
                            <span class="fh5co-event-meta">November 20th, 2017</span>
                            <p>Ikuti spesial di restoran kami bersama dengan Chef Gordon Ramsey.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fh5co-event to-animate-2">
                            <h3>Music Concerts</h3>
                            <span class="fh5co-event-meta">December 2nd, 2017</span>
                            <p>Datanglah di Music Concerts spesial di malam Minggu bersama pasangan anda!</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fh5co-event to-animate-2">
                            <h3>Free to Eat Party</h3>
                            <span class="fh5co-event-meta">December 31th, 2017</span>
                            <p>Ayo nikmati akhir tahun bersama kami di Free-to-eat party!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@guest

@else
        <div id="fh5co-contact" data-section="reservation">
            <div class="container">
                <div class="row text-center fh5co-heading row-padded">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="heading to-animate">Reserve a Table</h2>
                        <p class="sub-heading to-animate">Ingin memesan tempat? silahkan isi form dibawah, Terima Kasih.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 to-animate-2">
                        <h3>Contact Info</h3>
                        <ul class="fh5co-contact-info">
                            <li class="fh5co-contact-address ">
                                <i class="icon-home"></i>
                                Jalan Raya Kuta no. 17, <br> Kuta, Bali
                            </li>
                            <li><i class="icon-phone"></i> (0536) 288-6282</li>
                            <li><i class="icon-envelope"></i>warungayu@gmail.com</li>
                            <li><i class="icon-globe"></i> <a href="#" target="_blank">warungayu.co</a></li>
                        </ul>
                    </div> 
       
                    <div class="col-md-6 to-animate-2">
                        <h3>Reservation Form</h3>

                        <form action="insert.php" method="post">

                            <div class="form-group ">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" name="name" class="form-control" placeholder="Name" type="text">
                            </div>
                            <div class="form-group ">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" name="email" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="occation" class="sr-only">Occation</label>
                                <select class="form-control" name="occation" id="occation">
                                    <option>Select an Occation</option>
                                  <option>Wedding Ceremony</option>
                                  <option>Birthday</option>
                                  <option>Others</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="date" class="sr-only">Date</label>
                                <input id="date" name="date" class="form-control" placeholder="Date &amp; Time" type="text">
                            </div>                          
                            <div class="form-group ">
                                <label for="message" class="sr-only">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group ">
                                <input class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Send Message" type="submit">
                                
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    @endguest
        
    </div>

        <div id="fh5co-footer">
            <div class="container">
                <div class="row row-padded">
                    <div class="col-md-12 text-center">
                        <p class="to-animate">&copy; 2018 kelompok8.co. <br> Designed by <a href="#" target="_blank">Kelompok 8</a> Demo Images: <a href="http://pexels.com/" target="_blank">Pexels</a> <br> Tasty Icons Free <a href="http://handdrawngoods.com/store/tasty-icons-free-food-icons/" target="_blank">handdrawngoods</a>
                        </p>
                        <p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="fh5co-social">
                            <li class="to-animate-2"><a href="facebook.com"><i class="icon-facebook"></i></a></li>
                            <li class="to-animate-2"><a href="twitter.com"><i class="icon-twitter"></i></a></li>
                            <li class="to-animate-2"><a href="instagram.com"><i class="icon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </form>

        
        
        
        
        <!-- jQuery -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- jQuery Easing -->
        <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Bootstrap DateTimePicker -->
        <script src="{{ asset('js/moment.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
        <!-- Waypoints -->
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <!-- Stellar Parallax -->
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>

        <!-- Flexslider -->
        <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
        <script>
            $(function () {
               $('#date').datetimepicker();
           });
        </script>
        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>

        </body>
    </html>

