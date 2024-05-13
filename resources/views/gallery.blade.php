<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Platform</title>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/splitting@1.0.5/dist/splitting-cells.css">
    <link rel="stylesheet" href="css/homage/style.css">
    <link rel="stylesheet" href="css/homage/gallery.css">
</head>

<body>
    <!-- header section -->
    <section class="sub-header">
        <!-- navbar -->
        @include('layouts.nav')
        <div class="text-box">
            <h1>Gallery</h1>
        </div>
    </section>

    <section class="gallery">
        <div class="wrap-con">
            <div class="ourgalla">
                <div class="tiler">
                    <img src="images/homage/img/galla/img1.jpg">
                </div>

                <div class="tiler">
                    <img src="images/homage/img/galla/img2.jpg">
                </div>

                <div class="tiler">
                    <img src="images/homage/img/galla/img3.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img4.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img5.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img6.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img7.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img8.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img9.jpg">
                </div>

                <div class="tiler">
                    <img src="images/homage/img/galla/img13.jpg">
                </div>


                <div class="tiler">
                    <img src="images/homage/img/galla/img11.jpg">
                </div>

                <div class="tiler">
                    <img src="images/homage/img/galla/img10.jpg">
                </div>
            </div>
        </div>
    </section>

    <!-- footer section -->
    @include('layouts.footer')

    <!-- external javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://unpkg.com/splitting@1.0.5/dist/splitting.js"></script>
    <script src="js/homage/main.js"></script>
    <script>
        let navLinks = document.getElementById('navLinks')
        function showMenu() {
            navLinks.style.left = '0'
        }
        function hideMenu() {
            navLinks.style.left = '-200px'
        }

        console.clear();

        Splitting({
            target: '.tiler',
            by: 'cells',
            rows: 3,
            columns: 3,
            image: true
        });
    </script>
</body>

</html>