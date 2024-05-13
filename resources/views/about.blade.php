<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Platform</title>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/homage/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header section -->
    <section class="sub-header">
        <!-- navbar -->
        @include('layouts.nav')
        <div class="text-box">
            <h1>About Us</h1>
        </div>
    </section>

    <!-- about us section -->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <!-- <h1>Made In Africa, For You.</h1> -->
                <p>The Mycotoxin and Nutrition Analysis platform at the ILRI Biosciences Facility offers analytical
                    testing services and support in food safety, food nutrition and related agricultural applications.
                    The platform is equipped with high-end analytical testing equipment used in analysis of both
                    inorganic and organic compounds of interest in bioscience applications.</p>

                <p>The platform is open to researchers, regional research organizations or international research
                    centers operating in Africa.</p>
                <a href="/products" class="hero-btn red-btn">Explore Now</a>
            </div>
            <div class="about-col">
                <img src="images/homage/img/galla/about.jpg" alt="" srcset="">
            </div>
        </div>
    </section>

    <!-- footer section -->
    @include('layouts.footer')

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
    </script>

    <!-- external javascript -->
    <script src="js/homage/main.js"></script>
</body>

</html>