<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-center">

    <!-- <h1 class="logo mr-auto">
      <a href="{{ url('/') }}"></a></h1> -->
  <a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('resources/assets/img/road-logo.png')}}" alt="" class="img-fluid"></a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
         <!-- <li class="drop-down"><a href="">Services</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
            <ul>
              <li><a href="#">Deep Drop Down 1</a></li>
              <li><a href="#">Deep Drop Down 2</a></li>
              <li><a href="#">Deep Drop Down 3</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
            </li>
            <li><a href="#">Booking</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="#">Booking</a></li> -->
        <!-- <li><a href="#">Space</a></li> -->
        <!-- <li><a href="{{ url('/hotelList') }}">Hotel</a></li> -->
        <li><a href="{{ url('/tour') }}">Tour</a></li>
        <li><a href="{{ url('/events') }}">Event</a></li>
        <li><a href="{{ url('/space') }}">Space</a></li>
        <li><a href="#">Packages</a></li>
        <li><a href="#">Weather</a></li>

      </ul>
    </nav>


    @if(Auth::check())
      @if(Auth::user()->user_type == "normal_user")
        <!-- Auth::check() -->
        <!-- Auth::gaurd('user') -->
        <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li><a href="{{ route('user.profile') }}">Profile</a></li>
        </ul>
        </nav>
        <a href="{{ route('user.logout') }}" class="get-started-btn">Logout </a>
      @elseif(Auth::user()->user_type == "service_provider")
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li><a href="{{ route('servicepro.dashboard') }}">Dashboard</a></li>
        </ul>
        </nav>
        <a href="{{ route('servicepro.logout') }}" class="get-started-btn">Logout </a>
      @else
      @endif
    @else
      <a href="" data-toggle="modal" data-target="#exampleModal-log-in" class="get-started-btn">SIGN UP</a>
    @endif

    
  </div>
</header>