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
            <h1>Services</h1>
        </div>
    </section>

    <!-- about us section -->
    <section class="services-us">
        <div class="row">
            <div class="services-col">
                <h3>Food Safety</h3>
                <p>We offer analytical testing and support in contaminant analysis of food and feed.</p>
                <p>Metabolites that we test for range from:</p>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Those produced by fungal
                        contamination of food i.e multimycotoxins.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Multi veterinary drug residues in
                        food.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Food processing induced contaminants such as
                        acrylamide.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Antinutrients such as phytates,
                        oxalates and tannins.</li>
                </ul>
                <a href="/products" class="ser-hero-btn ser-red-btn">Explore Now</a>
            </div>
            <div class="services-col">
                <img src="images/homage/img/galla/img11.jpg" alt="" srcset="">
            </div>
        </div>

        <div class="row">
            <div class="services-col">
                <img src="images/homage/img/galla/img9.jpg" alt="" srcset="">
            </div>
            <div class="services-col">
                <h3>Food Nutrition</h3>
                <!-- <p>We offer a wide range of testing in this category:</p> -->
                <!-- <p>What's included:</p> -->
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Proximate analysis in dry food and
                        feed (Ash, dry matter, crude protein, crude fibre, crude
                        fat).</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Proximate analysis in raw and
                        processed milk.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Elemental composition analysis in
                        food and feed.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Multivitamin analysis.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Primary amino acid analysis.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Fatty acid profiling.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Isoflavones in soy-based products.
                    </li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Sugar analysis (Sucrose, glucose,
                        fructose, xylose, maltose).</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Antioxidant activity, total free
                        phenolics, Flavonoids.</li>
                </ul>
                <a href="/products" class="ser-hero-btn ser-red-btn">Explore Now</a>
            </div>
        </div>

        <div class="row">
            <div class="services-col">
                <h3>Other Analyses</h3>
                <!-- <p>We also offer additional analyses as part of our services:</p> -->
                <!-- <p>What's included:</p> -->
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Untargeted GC-MS metabolite
                        profiling.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Profiling of volatile organic
                        compounds via solid phase microextraction gas chromatography mass
                        spectrometry.</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>Targeted UPLC-MS/MS metabolite
                        quantification.</li>
                </ul>
                <a href="/products" class="ser-hero-btn ser-red-btn">Explore Now</a>
            </div>
            <div class="services-col">
                <img src="images/homage/img/galla/img5.jpg" alt="" srcset="">
            </div>
        </div>

        <div class="row">
            <div class="services-col">
                <img src="images/homage/img/galla/img8.jpg" alt="" srcset="">
            </div>
            <div class="services-col">
                <h3>Training</h3>
                <!-- <p>What's included:</p> -->
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span>We offer on demand hands-on
                        capacity building on food
                        safety and food nutrition majoring in the
                        various technologies and assays that we perform on the platform.</li>
                </ul>
                <a href="/products" class="ser-hero-btn ser-red-btn">Explore Now</a>
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