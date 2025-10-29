
<!DOCTYPE html>
<html lang="en">

<head>
      <title>@yield('title', 'Job Portal')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">

        <!-- Icofont -->
        <link rel="stylesheet" href="{{asset('assets/css/icofont.min.css')}}">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
 
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="assets/fonts/flaticon.css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/odometer.min.css')}}">
 
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
   
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/theme-dark.css')}}">
    

        <title>Gable - Job Portal</title>

        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    </head>
<body>

       @include('partials.navbar')
        <main class="py-4">
                @yield('content')
        </main>
       @include('partials.footer')

      <!-- Essential JS -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="assets/js/jquery.meanmenu.js"></script>
        <!-- Mixitup JS -->
        <script src="assets/js/jquery.mixitup.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Form Ajaxchimp JS -->
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator JS -->
    <script src="assets/js/form-validator.min.js"></script>
    <!-- Contact JS -->
        <script src="assets/js/contact-form-script.js"></script>
        <!-- Wow JS -->
        <script src="assets/js/wow.min.js"></script>
        <!-- Odometer JS -->
        <script src="assets/js/odometer.min.js"></script>
        <script src="assets/js/jquery.appear.min.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/custom.js"></script>
</body>
</html>
