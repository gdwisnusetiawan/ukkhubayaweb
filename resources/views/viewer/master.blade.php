<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'UKKH UBAYA') }} | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('rapid/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('rapid/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('rapid/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('rapid/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('rapid/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('rapid/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('rapid/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('rapid/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('rapid/css/style.css') }}" rel="stylesheet">
  @stack('css')
  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="0">
  <!--==========================
  Header
  ============================-->
  @include('viewer.header')

  <main id="main">

    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  @include('viewer.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <!-- <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script> -->
  <script src="{{ asset('rapid/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ asset('rapid/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('rapid/lib/lightbox/js/lightbox.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('rapid/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('rapid/js/main.js') }}"></script>
  @stack('js')
</body>
</html>
