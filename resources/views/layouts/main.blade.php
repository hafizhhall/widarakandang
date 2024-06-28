<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Widarakandang | WK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    @stack('jsMidtrans')
    <!-- Favicon -->
    <link href="/modal/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/modal/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/modal/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/modal/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/modal/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar Start -->
    @include('layouts.nav')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="wa.me/6289605007001" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-whatsapp"></i></a>


    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    @stack('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/modal/lib/wow/wow.min.js"></script>
    <script src="/modal/lib/easing/easing.min.js"></script>
    <script src="/modal/lib/waypoints/waypoints.min.js"></script>
    <script src="/modal/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/modal/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @stack('js')
</body>

</html>
