<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Provider | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('resources/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


   <!-- <link rel="stylesheet" href="{{url('/')}}/resources/css/style.css"> -->

   <!-- <link rel="stylesheet" href="{{url('/')}}/resources/css/custom.css"> -->

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

   <link href="{{ asset('resources/css/notification-custom.css') }}" rel="stylesheet" />
   <link href="{{ asset('resources/css/raone/jquery-ui.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('resources/js/raone/jquery.min.js') }}" rel="stylesheet" />
   <link href="{{ asset('resources/js/raone/jquery-ui.min.js') }}" rel="stylesheet" />

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

   @yield('current_page_css')

   </head>

   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <input type="hidden" value="{{url('/')}}" id="baseUrl" name="baseUrl">
         <input type="hidden" value="{{ csrf_token() }}" id="csrfToken" name="csrfToken">
         <!-- Preloader -->
         <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('resources/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
         </div> -->


         <!-- Navbar Header -->

         @include('vendor.layout.header')



         <!-- Main Sidebar Container -->         

         @include('vendor.layout.sidebar')

         

         @yield('content')



         <!-- /.Footer -->

         @include('vendor.layout.footer')

         

      </div>

      <!-- ./wrapper -->

   <!-- jQuery -->
   <script type="text/javascript" src="{{ asset('resources/plugins/jquery/jquery.min.js')}}"></script>
   <!-- jQuery UI 1.11.4 -->
   <script type="text/javascript" src="{{ asset('resources/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
   $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="{{ asset('resources/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- ChartJS -->
   <script src="{{ asset('resources/plugins/chart.js/Chart.min.js')}}"></script>
   <!-- Sparkline -->
   <script src="{{ asset('resources/plugins/sparklines/sparkline.js')}}"></script>
   <!-- JQVMap -->
   <script src="{{ asset('resources/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
   <!-- jQuery Knob Chart -->
   <script src="{{ asset('resources/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
   <!-- daterangepicker -->
   <script src="{{ asset('resources/plugins/moment/moment.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/daterangepicker/daterangepicker.js')}}"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="{{ asset('resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
   <!-- Summernote -->
   <script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>
   <!-- overlayScrollbars -->
   <script src="{{ asset('resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('resources/dist/js/adminlte.js')}}"></script>
   <!-- AdminLTE for demo purposes -->
   <!-- <script src="{{ asset('resources/dist/js/demo.js')}}"></script> -->
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="{{ asset('resources/dist/js/pages/dashboard.js')}}"></script>

   <!-- Select2 -->
   <script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>

   <!-- DataTables  & Plugins -->
   <script src="{{ asset('resources/plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/jszip/jszip.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/pdfmake/pdfmake.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/pdfmake/vfs_fonts.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
   <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>




   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   
   <script src="{{ asset('resources/js/notification-custom-script.js') }}"></script>
   <script src="https://malsup.github.io/jquery.form.js"></script>

   <script src="{{ asset('resources/js/raone/jquery.validate.min.js') }}"></script>
   <script src="{{ asset('resources/js/raone/jquery.form.js') }}"></script>

   <script src="{{ asset('resources/js/forms.js') }}"></script>

   @yield('current_page_js')

   </body>

</html>