<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UML SOFTWARE</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('back/static/icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/css/tabler.css') }}" rel="stylesheet" />
    <!-- Template Main CSS File -->

    <!-- =======================================================
  * Template Name: Scaffold - v2.0.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('wcomponents.header')
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>Estamos atentos a tus necesidades como desarrollador</h1>
                        <h2>Eficiencia en el desarrollo de diagramas en base al modelo UML</h2>
                        <a href="#about" class="btn btn-success">Comenzar</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="{{asset('back/static/components/home-page.svg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        @include('wcomponents.about')
        <!-- End About Section -->
        <!-- ======= Features Section ======= -->
        @include('wcomponents.features')
        <!-- End Features Section -->
        <!-- ======= Services Section ======= -->
        @include('wcomponents.services')
        <!-- End Services Section -->
        <!-- ======= Portfolio Section ======= -->
        @include('wcomponents.portofolio')
        <!-- End Portfolio Section -->
        <!-- ======= Cta Section ======= -->
        @include('wcomponents.ctasection')
        <!-- End Cta Section -->
        <!-- ======= Testimonials Section ======= -->
        @include('wcomponents.testimonials')
        <!-- End Testimonials Section -->
        <!-- ======= Team Section ======= -->
        @include('wcomponents.team')
        <!-- End Team Section -->
        <!-- ======= Clients Section ======= -->
        @include('wcomponents.clients')
        <!-- End Clients Section -->
        <!-- ======= Pricing Section ======= -->
        @include('wcomponents.pricing')
        <!-- End Pricing Section -->
        <!-- ======= F.A.Q Section ======= -->
        @include('wcomponents.faq')
        <!-- End Frequently Asked Questions Section -->
        <!-- ======= Contact Section ======= -->
        @include('wcomponents.contact')
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('wcomponents.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Template Main JS File -->

</body>

</html>
