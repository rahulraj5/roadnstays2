  <!-- ======= Footer ======= -->

  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row">



          <div class="col-lg-3 col-md-3 footer-links">

            <div class="footer-info">

              <h4>ROAD N STAYS</h4>



              <ul>

                <li> <a href="#">About Us</a></li>

                <li> <a href="#">Business</a></li>

                <li> <a href="#">Leisure</a></li>

                <li> <a href="#">Student</a></li>

                <li> <a href="#">Religion</a></li>

                <li> <a href="#">Pre / post booking</a></li>

                <li> <a href="#">Premises support through scouts</a></li>



              </ul>

            </div>

          </div>



          <div class="col-lg-3 col-md-3 footer-links">

            <h4>Explore</h4>

            <ul>
            @if(Auth::check())
              @if(Auth::user()->user_type == "service_provider")
                <li> <a href="{{ url('/servicepro/dashboard') }}">Service Provider Dashboard</a></li>
              @else
                <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#vendorModal-signin" id="vendor_Signin">Service Provider Login</a></li>
              @endif
            @else  
              <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#vendorModal-signin" id="vendor_Signin">Service Provider Login</a></li>
            @endif
              
              <li> <a href="#">Weather</a></li>

              <li> <a href="#">Packages</a></li>

              <li> <a href="#">Blogs</a></li>

              <li> <a href="#">Guest Houses </a></li>

              <li> <a href="#">Business Advantage</a></li>

            </ul>

          </div>







          <div class="col-lg-3 col-md-3  footer-links">

            <h4>Terms and policies</h4>

            <ul>

              <li> <a href="#">Privacy statement</a></li>

              <li> <a href="#">Terms of use</a></li>



            </ul>

          </div>



          <div class="col-lg-3 col-md-3 footer-links">

            <h4>Help</h4>

            <ul>

              <li> <a href="#">Supports</a></li>

              <li> <a href="#" style="line-height: 24px;">Cancel your hotel or vaca-

                  tion rental booking</a></li>

              <li> <a href="#">Cancel your Trip</a></li>

            </ul>

          </div>



        </div>

      </div>

    </div>



    <div class="container">

      <div class="row">

        <div class="col-md-6">

          <div class="copyright">

            &copy; Copyright <strong><span>RoadNstays</span></strong>. All Rights Reserved {{Auth::getDefaultDriver()}}

          </div>

        </div>

        <div class="col-md-6">

          <div class="social-links mt-3 footer-newsletter">

            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>

            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>

            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

            <!--   <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>

              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->

          </div>

        </div>



      </div>

  </footer>



  <!-- Modal user login -->

  <div class="modal fade" id="exampleModal-log-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <!-- <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Login/Signup</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div> -->

        <div class="modal-body">

          <div id="LoginForm">

            <div class="container">

              <div class="login-form">

                <div class="main-div">

                  

                  <div class="panel">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>

                    <h2 class="user-lo">User Login</h2>

                    <p>Please enter your email and password</p>

                  </div>

                  <form id="userLogin_form" method="POST">

                    <div id="loginResBox">
                      @if(Session::has('message'))
                      <div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> {{ Session::get('message') }}</div>        
                      @endif
                      @if(Session::has('error'))
                      <div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Opps!</strong> {{ Session::get('error') }}</div>
                      @endif
                    </div>

                    @csrf

                    <div class="form-group">

                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">

                    </div>

                    <div class="form-group">

                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">

                    </div>

                    <div class="forgot">

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-sign-up" class="signup-bar" id="signup" data-dismiss="modal">Sign Up</a>

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#forgot-pass" id="forgot" data-dismiss="modal">Forgot password?</a>

                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                  </form>



                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Modal user signup-->

  <div class="modal fade" id="exampleModal-sign-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div id="LoginForm">

          <div class="container">

            <div class="login-form">

              <div class="main-div">

                <div class="panel">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                  <h2 class="user-lo">Sign Up</h2>

                  <p>Please enter details:</p>

                </div>

                <form id="userSignup_form" method="POST">

                    @csrf

                  <div class="form-group">

                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name">

                  </div>

                  <div class="form-group">

                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name">

                  </div>

                  <div class="form-group">

                    <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Mobile number">

                  </div>

                  <div class="form-group">

                    <input type="email" class="form-control" name="semail" id="semail" placeholder="Email Address">

                  </div>

                  <div class="form-group">

                    <input type="password" class="form-control" name="spassword" id="spassword" placeholder="Password">

                  </div>

                  <div class="form-group">

                    <input type="password" class="form-control" name="sconfirm_password" id="sconfirm_password" placeholder="Confirm password">

                  </div>

                  <div class="input-group">

                    <div class="checkbox">

                      <label class="login-tc">

                        <input id="login-remember" type="checkbox" name="remember" value="1"> By proceeding,

                        you agree to roadnstays Privacy Policy, User Agreement and T&Cs

                      </label>

                    </div>

                  </div>

                  <div class="forgot">

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-log-in"  data-dismiss="modal">Sign In</a>

                  </div>

                  <button type="submit" class="btn btn-primary">Sign Up</button>

                </form>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- forgotpass -->

  <div class="modal fade" id="forgot-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-body">

          <div id="LoginForm">

            <div class="container">

              <div class="login-form">

                <div class="main-div">

                  <div class="panel">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>
                    <!-- <div class="tab-login">

                    <h2>User login  </h2>

                      <h2>Vendore login  </h2>

                    </div> -->

                    <div class="forget-cirlcel">

                      <i class='bx bxs-low-vision'></i>

                    </div>

                    <h2 class="user-lo">Forget Password?</h2>

                    <p>You will get your password reset link from here.</p>

                  </div>

                  <form id="userForgetPass" method="POST">

                    <div class="form-group">
                      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
                      <input type="email" class="form-control" name="forgetEmail" id="forgetEmail" placeholder="Enter Email Address">

                    </div>

                    <div class="forgot">

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-sign-up" class="signup-bar" id="signup" data-dismiss="modal">SignUp</a>

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-log-in"  data-dismiss="modal">SignIn</a>

                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>

                  </form>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- vendor signup -->
  <div class="modal fade" id="vendorModal-signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div id="LoginForm">
          <div class="container">
            <div class="login-form">
              <div class="main-div">
                <div class="panel">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="user-lo">Vendor Sign Up</h2>
                  <p>Please enter details:</p>
                </div>
                <form id="vendorSignup_form" method="POST">
                    @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" name="vsname" id="vsname" placeholder="First name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="vslname" id="vslname" placeholder="Last name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="vsphone_no" id="vsphone_no" placeholder="Mobile number">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="vsemail" id="vsemail" placeholder="Email Address">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="vspassword" id="vspassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="vsconfirm_password" id="vsconfirm_password" placeholder="Confirm password">
                  </div>
                  <div class="input-group">
                    <div class="checkbox">
                      <label class="login-tc">
                        <input id="login-remember" type="checkbox" name="vsremember" value="1"> By proceeding,
                        you agree to roadnstays Privacy Policy, User Agreement and T&Cs
                      </label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal vendor login -->
  <div class="modal fade" id="vendorModal-signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login/Signup</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
        <div class="modal-body">
          <div id="LoginForm">
            <div class="container">
              <div class="login-form">
                <div class="main-div">
                  
                  <div class="panel">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="user-lo">Vendor Login</h2>
                    <p>Please enter your email and password</p>
                  </div>
                  <form id="vendorLogin_form" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control" name="vlemail" id="vlemail" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="vlpassword" id="vlpassword" placeholder="Password">
                    </div>
                    <div class="forgot">
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#vendorModal-signup" class="signup-bar" id="vendor_Signup" data-dismiss="modal">Sign Up</a>
                      <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#forgotpass" id="forgot">Forgot password?</a> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">

  $("#signup").click(function () {

      $("#exampleModal-log-in").addClass('disnone');

      $("#forgot-pass").addClass('disnone');

      $("#exampleModal-sign-up").addClass('disshow');

  });

  $("#forgot").click(function () {

      $("#exampleModal-log-in").modal('hide');

      $("#exampleModal-sign-up").modal('hide');

      $("#forgot-pass").modal('show');

  });

  $("#vendor_Signin").click(function () {

      $("#vendorModal-signup").modal('hide');

      $("#vendorForgotPass").modal('hide');

      $("#vendorModal-signin").modal('show');

  });
  
  $("#vendor_Signup").click(function () {

      $("#vendorModal-signin").modal('hide');

      $("#vendorModal-signup").modal('hide');

      $("#vendorModal-signup").modal('show');

  });



  // $('label.error').addClass('error_label');

</script>
<script>
  //  $(function() {
  //     $('#reservation').daterangepicker({
  //        opens: 'right'
  //     }, function(start, end, label) {
  //           $('#date-range200').val(start.format('DD-MM-YYYY'));
  //           $('#date-range201').val(end.format('DD-MM-YYYY'));
  //           // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  //     });
  //  });
</script>
<script>
  //  $(function() {
  //     $('.reserved').daterangepicker({
  //        opens: 'right'
  //     }, function(start, end, label) {
  //           $('#date1').val(start.format('DD-MM-YYYY'));
  //           $('#date2').val(end.format('DD-MM-YYYY'));
  //           // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  //     });
  //  });
</script>
<script>
   // $(function() {
   //    $('input[name="daterange"]').daterangepicker({
   //       opens: 'left'
   //    }, function(start, end, label) {
   //       console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
   //    });
   // });
   
   // $(function() {
   //    $('#reservation').daterangepicker({
   //       // autoClose: false,
	//       // format: 'YYYY-MM-DD',
   //       // separator : ' to ',
   //       // getValue: function()
   //       // {
   //       //    alert($('#date-range200').val());
   //       //    alert($('#date-range201').val());
   //       //    if ($('#date-range200').val() && $('#date-range201').val() )
   //       //       return $('#date-range200').val() + ' to ' + $('#date-range201').val();
   //       //    else
   //       //       return '';
   //       // },
   //       // setValue: function(s,s1,s2)
   //       // {
   //       //    $('#date-range200').val(s1);
   //       //    $('#date-range201').val(s2);
   //       // },
   //       opens: 'right'
   //    }, function(start, end, label) {
   //          $('#date-range200').val(start.format('DD-MM-YYYY'));
   //          $('#date-range201').val(end.format('DD-MM-YYYY'));
   //          // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
   //    });
      

   //    // $('input[name="daterange"]').daterangepicker({
   //    //    opens: 'left'
   //    // }, function(start, end, label) {
   //    //    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
   //    // });
   // });
    
</script>


<!-- <script>
   
   $(function() {
      $('#reservation').daterangepicker({
         autoClose: false,
	      format: 'YYYY-MM-DD',
         separator : ' to ',
         opens: 'right'
      },getValue: function()
         {
            if ($('#date-range200').val() && $('#date-range201').val() )
               return $('#date-range200').val() + ' to ' + $('#date-range201').val();
            else
               return '';
         },
         setValue: function(start, end, label) {
         {
            $('#date-range200').val(start);
            $('#date-range201').val(end);
      });
   });
    
</script> -->