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
            <h1>Contact Us</h1>
        </div>
    </section>

    <!-- contact us section -->
    <section class="location">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.331657546243!2d36.7280586!3d-1.2734374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f196b8cb30955%3A0x86c0b3fae81dd77a!2sILRI%20Offices!5e0!3m2!1sen!2ske!4v1616745882304!5m2!1sen!2ske"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>
                        <h5>ILRI Kenya</h5>
                        <p>P.O Box 30709 – 00100 Nairobi</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        <h5>+254 20 422 3494/3803/3836</h5>
                        <p>Monday to Friday, 7AM to 5PM</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span>
                        <h5>mycnutplatform@cgiar.org</h5>
                        <!-- <p>Send us an email</p> -->
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <!-- <div class="row">
                    <div class="col">
                        @include('layouts.alerts')
                    </div>
                </div> -->
                <form action="{{ route('submitinquiry') }}" method="POST">
                    {{csrf_field()}}
                    <input type="text" name="name" placeholder="enter name" required>
                    <input type="email" name="email" placeholder="enter email" required>
                    <!-- <input type="text" name="subject" placeholder="enter subject"> -->
                    <textarea name="message" rows="5" placeholder="enter your message" required></textarea>
                    <button type="submit" class="hero-btn red-btn">SEND MESSAGE</button>
                </form>
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