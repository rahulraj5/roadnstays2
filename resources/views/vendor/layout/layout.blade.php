<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Road n stays</title>
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



   <link href = "{{ asset('resources/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
   <link href = "{{ asset('resources/assets/vendor/aos/aos.css')}}" rel="stylesheet">

   <link href = "{{ asset('resources/assets/css/style.css')}}" rel="stylesheet">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}"> -->

    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> -->

   <!-- DataTables -->
   <!-- <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->

   <!-- <link rel="stylesheet" href="{{url('/')}}/resources/css/custom.css"> -->

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

   <link href="{{ asset('resources/css/notification-custom.css') }}" rel="stylesheet" />
   <link href="{{ asset('resources/css/raone/jquery-ui.min.css') }}" rel="stylesheet" />

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->


   <script type="text/javascript" src="{{ asset('resources/js/raone/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('resources/js/raone/jquery-ui.min.js') }}"></script>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

   <!-- daterangepicker -->
   <script src="{{ asset('resources/plugins/moment/moment.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/daterangepicker/daterangepicker.js')}}"></script>   

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

   @yield('current_page_js')

   </body>

</html>