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
            &copy; Copyright <strong><span>RoadNstays</span></strong>. All Rights Reserved
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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login/Signup</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="LoginForm">
            <div class="container">
              <div class="login-form">
                <div class="main-div">
                  <div class="panel">
                    <div class="tab-login">
                      <h2>User login </h2>
                      <h2>Vendore login </h2>
                    </div>
                    <h2 class="user-lo">User Login</h2>
                    <p>Please enter your email and password</p>
                  </div>
                  <form id="userLogin_form" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="forgot">
                      <a href="#" data-toggle="modal" data-target="#exampleModal-signup" class="signup-bar">Sign Up</a>
                      <a href="#">Forgot password?</a>
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