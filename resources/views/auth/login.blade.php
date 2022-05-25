<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="{{ asset('resources/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <!-- icheck bootstrap -->
    <link href="{{ asset('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Theme style -->
    <link href="{{ asset('resources/dist/css/adminlte.min.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

    <!-- <link href="{{ asset('resources/css/notification-custom.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('resources/css/raone/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/js/raone/jquery.min.js') }}" rel="stylesheet" />
    <link href="{{ asset('resources/js/raone/jquery-ui.min.js') }}" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <input type="hidden" value="{{url('/')}}" id="baseUrl" name="baseUrl">
    <input type="hidden" value="{{ csrf_token() }}" id="csrfToken" name="csrfToken">
</head> 
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>Booking</b> User</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      
      <!-- route('login.post') -->
      <form method="POST" action={{ url('user/loginPost') }} id="userLogin_form" name="userLogin_form">
        @csrf
        <div class="input-group mb-3"> 
            <input type="email" class="form-control" placeholder="Email" name="email" id="email_address">
            <!-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <!-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      <!-- <p class="mb-1">
        <a href="{{ url('/register') }}">Sign Up</a>
      </p> -->
      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('resources/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('resources/dist/js/adminlte.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>


<script src="{{ asset('resources/js/notification-custom-script.js') }}"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>

<script src="{{ asset('resources/js/raone/jquery.validate.min.js') }}"></script>
<script src="{{ asset('resources/js/raone/jquery.form.js') }}"></script>

<script src="{{ asset('resources/js/forms.js') }}"></script>

</body>
</html>
