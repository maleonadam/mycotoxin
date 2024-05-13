<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Platform</title>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/homage/style.css">
    <link rel="stylesheet" href="css/homage/carou.css">
    <link rel="stylesheet" href="css/homage/clients.css">
    <link rel="stylesheet" href="css/homage/slide.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
</head>

<body>
    <!-- navbar section-->
    <nav class="mynav">
        <div class="navLinks" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('aboutus') }}">About</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('charter') }}">Service Charter</a></li>
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="#" class="nav-link">Publications</a>
                        <div class="dropdown-content bg-dark">
                            <a href="{{ route('service_charter') }}">Service charter</a>
                            <a href="{{ route('credit_cert') }}">Accreditation certificate</a>
                        </div>
                    </div>
                </li>
                <li><a href="{{ route('contactus') }}">Contacts</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <div class="dropdown">
                            <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                            <div class="dropdown-content bg-dark">
                                <a href="{{ url('/useraccount') }}">Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <!-- header section -->
    <header>
        <div class="banner-area">
            <div class="single-banner">
                <div class="banner-img">
                    <img src="images/homage/img/galla/img7.jpg" alt="" srcset="">
                </div>
                <div class="banner-text">
                    <h2>Mycotoxin & Nutrition Platform</h2>
                    <p></p>
                    <a href="/products" class="hero-btn red-btn">GET STARTED</a>
                </div>
            </div>
            <div class="single-banner">
                <div class="banner-img">
                    <img src="images/homage/img/galla/img2.jpg" alt="" srcset="">
                </div>
                <div class="banner-text">
                    <h2>High-end Analytical Testing</h2>
                    <p></p>
                    <a href="/products" class="hero-btn red-btn">GET STARTED</a>
                </div>
            </div>
            <div class="single-banner">
                <div class="banner-img">
                    <img src="images/homage/img/galla/img6.jpg" alt="" srcset="">
                </div>
                <div class="banner-text">
                    <h2>Rapid Nutrition Testing for You!</h2>
                    <p></p>
                    <a href="/products" class="hero-btn red-btn">GET STARTED</a>
                </div>
            </div>
        </div>
    </header>

    <!-- services section -->
    <section class="services">
        <div class="headings">
            <h1>Our Services</h1>
            <!-- <p>Below are some of the services you can request in the platform.</p> -->
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow rounded-xs pt-5">
                        <div class="card-body"> <i
                                class="fas fa-check icon-lg icon-red icon-bg-red icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Food Safety</h4>
                            <!-- <p>We offer analytical testing and support in contaminant analysis of food and feed.</p> -->
                            <a href="{{ route('services') }}" title="Read more" class="read-more">Read
                                more <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow rounded-xs pt-5">
                        <div class="card-body"> <i
                                class="fas fa-chalkboard-teacher icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Training</h4>
                            <!-- <p>We offer on demand hands-on capacity building on food safety and food nutrition.</p> -->
                            <a href="{{ route('services') }}" title="Read more" class="read-more">Read
                                more <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow rounded-xs pt-5">
                        <div class="card-body"> <i
                                class="fab fa-nutritionix icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Food Nutrition</h4>
                            <!-- <p>We offer a wide range of testing in this category.</p> -->
                            <a href="{{ route('services') }}" title="Read more" class="read-more">Read
                                more <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow rounded-xs pt-5">
                        <div class="card-body">
                            <i class="fa fa-search-plus icon-lg icon-green icon-bg-green icon-bg-circle mb-3"></i>
                            <h4 class="mt-4 mb-3">Other Analyses</h4>
                            <!-- <p>We offer additional analyses which include:</p> -->
                            <a href="{{ route('services') }}" title="Read more" class="read-more">Read
                                more <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- team section -->
    <section class="teammembers">
        <h1>The Team</h1>
        <!-- <p>Meet our team.</p> -->

        <div class="container">
            <div class="row">
                <div class=" col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/homage/img/joy.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Joyce Musyoka</h5>
                            <div class="card-text text-black-50">Research Associate</div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/homage/img/fred.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Fredrick Ng'ang'a</h5>
                            <div class="card-text text-black-50">Research Officer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonials section -->
    <section class="testimonials">
        <h1>Testimonials</h1>
        <!-- <p>Here is what our clients say about us.</p> -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- <div class="img-box"><img src="/examples/images/clients/1.jpg" alt=""></div> -->
                                <p class="testimonial"><b>&ldquo;</b>The data from the first round of aflatoxin testing was
                                    good, we were able to identify
                                    maize lines which
                                    we further subjected to a second round or field test. We now want to submit
                                    additional material
                                    from the
                                    second round of testing for aflatoxins and possibly third round towards the last
                                    quarter of the
                                    year. The
                                    data came in a bit late but it’s understandable given the restrictions in movement
                                    and ability
                                    to access
                                    work during the Covid pandemic in mid-2020.<b>&rdquo;</b></p>
                                <p class="overview"><b>Anonymous client,</b></span>
                                </p>
                            </div>
                            <div class="carousel-item">
                                <!-- <div class="img-box"><img src="/examples/images/clients/2.jpg" alt=""></div> -->
                                <p class="testimonial"><b>&ldquo;</b>The laboratory environment was conducive as it allowed for
                                    complete participation in all
                                    stages
                                    of the training from theory to practical. Also, the platform has state of the art
                                    equipment run
                                    by
                                    very knowledgeable staff.<b>&rdquo;</b></p>
                                <p class="overview"><b>Anonymous client,</b></p>
                            </div>
                            <div class="carousel-item">
                                <!-- <div class="img-box"><img src="/examples/images/clients/3.jpg" alt=""></div> -->
                                <p class="testimonial"><b>&ldquo;</b>Handling of samples, enquiries feedback with regards to
                                    analysis and communication was
                                    explicitly gratifying.<b>&rdquo;</b></p>
                                <p class="overview"><b>Anonymous client,</p>
                            </div>
                            <div class="carousel-item">
                                <!-- <div class="img-box"><img src="/examples/images/clients/3.jpg" alt=""></div> -->
                                <p class="testimonial"><b>&ldquo;</b>Thanks for the excellent speed and great results. The
                                    students are happy.<b>&rdquo;</b></p>
                                <p class="overview"><b>Anonymous client,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- clients section -->
    <!-- <section class="clientiele">
        <h1>Our Clients</h1>
        <p>These are some of our clients.</p>

        <div class="container client-section">
            <div class="row">
                <div class="col">
                    <section class="customer-logos slider">
                        <div class="slide myslide"><img src="images/homage/img/clients/egerton.jpg"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/beca.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/cgiar.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/cimmyt.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/eldoret.jpeg"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/uon.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/naro.jpg"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/icipe.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/irri.png"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/ilri.jpg"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/fip.png" style="width:150px; height:70px;"></div>
                        <div class="slide myslide"><img src="images/homage/img/clients/jooust.png" style="width:200px; height:70px;"></div>
                    </section>
                </div>
            </div>
        </div>

    </section> -->

    <!-- call to action section -->
    <section class="cta">
        <h2>Request any of our services<br> from anywhere in the World</h2>
        <a href="/products" class="hero-btn cta-btn">GET STARTED</a>
    </section>

    <!-- footer section -->
    <section class="footer">
        <h4>The Mycotoxin and Nutrition Platform</h4>
        <p>Analytical testing Services and support in food safety, food nutrition and related agricultural applications.
        </p>

        <div class="contact-info">
            <h6>About ILRI</h6>
            <p>Learn more about the ILRI Biosciences Facility.</p>
            <a href="https://www.ilri.org/" target="_blank"><img src="images/homage/img/clients/ilri5.png"></a>
        </div>

        <div class="icons">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </div>
        <!-- <p>Made with <i class="fa fa-heart-o"></i> by Adam</p> -->
        <p>Copyright &copy; 2021.</p>
    </section>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!-- toggle menu -->
    <script>
        let navLinks = document.getElementById('navLinks')
        function showMenu() {
            navLinks.style.left = '0'
        }
        function hideMenu() {
            navLinks.style.left = '-200px'
        }

        $('.banner-area').slick({
            autoplay: true,
            speed: 800,
            arrows: false,
            dots: true,
            fade: true
        })
    </script>

    <!-- external javascript -->
    <script src="js/homage/main.js"></script>
    <script src="js/homage/clients.js"></script>
</body>

</html>