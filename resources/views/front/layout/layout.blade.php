<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport"> 
   <title>Road n stays</title>
   <link rel="shortcut icon" href="{{url('/')}}/public/img/favicon-icin.png" type="image/x-icon">
   <meta content="" name="description">
   <meta content="" name="keywords">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Favicons -->
   <link href = "{{ asset('resources/assets/img/favicon.png')}}" rel="icon">
   <link href = "{{ asset('resources/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> 
   <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> --> 
   <link href="https://fonts.cdnfonts.com/css/cosmith" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
   <!-- Vendor CSS Files -->
   <link href="https://fonts.cdnfonts.com/css/requited-script-demo" rel="stylesheet">

   <link href="{{asset('resources/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

   <!-- Daterangepicker -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
   <!-- <link href="{{asset('resources/css/daterangemaster/daterangepicker.min.css')}}" rel="stylesheet"> -->

   <link href = "{{ asset('resources/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/aos/aos.css')}}" rel="stylesheet"> 
   <link href = "{{ asset('resources/assets/css/style.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/css/my-style.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/css/responsive.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/css/all.css')}}" rel="stylesheet">
   <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet"> 

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

   <link href="{{ asset('resources/css/notification-custom.css') }}" rel="stylesheet" /> 
   @yield('current_page_css')

   <style type="text/css"> 
      .nav-item .nav-link,
      .nav-tabs .nav-link {
      -webkit-transition: all 300ms ease 0s;
      -moz-transition: all 300ms ease 0s;
      -o-transition: all 300ms ease 0s;
      -ms-transition: all 300ms ease 0s;
      transition: all 300ms ease 0s;
      }

      .card a {
      -webkit-transition: all 150ms ease 0s;
      -moz-transition: all 150ms ease 0s;
      -o-transition: all 150ms ease 0s;
      -ms-transition: all 150ms ease 0s;
      transition: all 150ms ease 0s;
      }

      .nav-tabs {
      border: 0;
      padding: 15px 0.7rem;
      }

      .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
      box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
      }

      .card .nav-tabs {
      border-top-right-radius: 0.1875rem;
      border-top-left-radius: 0.1875rem;
      }

      .nav-tabs>.nav-item>.nav-link {
      color: #888888;
      margin: 0;
      margin-right: 5px;
      background-color: transparent;
      border: 1px solid transparent;
      /* border-radius: 30px;
      */  font-size: 14px;
      padding: 11px 23px;
      line-height: 1.5;
      }

      .nav-tabs>.nav-item>.nav-link:hover {
      background-color: transparent;
      }

      .nav-tabs>.nav-item>.nav-link.active {
      background-color: #444;
      /* border-radius: 30px;*/
      color: #FFFFFF;
      }

      .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
      font-size: 14px;
      position: relative;
      top: 1px;
      margin-right: 3px;
      }

      .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
      color: #FFFFFF;
      }

      .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      color: #FFFFFF;
      }

      .disnone {
      display: None;
      }
      .disshow {
      display: block;
      } 
   </style>
</head>

<body>
   <input type="hidden" value="{{url('/')}}" id="baseUrl" name="baseUrl">
   <input type="hidden" value="{{ csrf_token() }}" id="csrfToken" name="csrfToken">


   <!-- Navbar Header -->

   @include('front.layout.header')

   <!-- Main Sidebar Container -->         

   <!-- @include('front.layout.sidebar') -->

   @yield('content')

   <!-- /.Footer -->

   @include('front.layout.footer')

  
   <!-- ./wrapper -->

   <!-- jQuery -->
   <!-- <script type="text/javascript" src="{{ asset('resources/plugins/jquery/jquery.min.js')}}"></script> -->
   <!-- jQuery UI 1.11.4 -->
   <!-- <script type="text/javascript" src="{{ asset('resources/plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

   <!-- Vendor JS Files -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

   <script src="{{ asset('resources/assets/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/php-email-form/validate.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/counterup/counterup.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/venobox/venobox.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
   <script src="{{ asset('resources/assets/vendor/aos/aos.js')}}"></script>

   <!-- Template Main JS File -->
   <script src="{{ asset('resources/assets/js/main.js')}}"></script>

   <!-- Select2 -->
   <!-- <script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script> -->

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   <script src="{{ asset('resources/js/notification-custom-script.js') }}"></script>
   <script src="https://malsup.github.io/jquery.form.js"></script>
   <script src="{{ asset('resources/js/raone/jquery.validate.min.js') }}"></script>
   <script src="{{ asset('resources/js/raone/jquery.form.js') }}"></script>
   <script src="{{ asset('resources/assets/js/forms.js') }}"></script>
   
      <!-- Daterangepicker -->
   <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
   <script src="{{ asset('resources/css/daterangemaster/daterangepicker.js') }}"></script>
   <!-- <script src="{{ asset('resources/css/daterangemaster/jquery.daterangepicker.min.js') }}"></script> -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
   </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
   </script>
   <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyB6jpjQRZn8vu59ElER36Q2LaxptdAghaA=places&callback=initAutocomplete"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNfo0u0kFSDaxpJfkR5VsQCUHiyhTBaAI&libraries=places"></script>

   <script type="text/javascript">
      $(document).ready(function () {
          function disableBack() {window.history.forward()}

          window.onload = disableBack();
          window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
      });
   </script>
   @yield('current_page_js') 
   
</body>

</html>