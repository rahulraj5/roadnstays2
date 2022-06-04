<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-center">

    <!-- <h1 class="logo mr-auto">
      <a href="{{ url('/') }}"></a></h1> -->
  <a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('resources/assets/img/road-logo.png')}}" alt="" class="img-fluid"></a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
         <li class="drop-down"><a href="">Services</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
           <!--    <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul> -->
            </li>
            <li><a href="#">Booking</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li>
        <li><a href="#">Booking</a></li>
        <li><a href="#">Stays</a></li>
        <li><a href="#">Event</a></li>
         <li><a href="#">Packages</a></li>
        <li><a href="#">Weather</a></li>
        <li><a href="#">Hotel</a></li>
        <li><a href="#">Tour</a></li>

      </ul>
    </nav>


    @if(Auth::check())
      @if(Auth::user()->user_type == "normal_user")
        <!-- Auth::check() -->
        <!-- Auth::gaurd('user') -->
        <a href="{{ route('user.logout') }}" class="get-started-btn">Logout </a>
      @elseif(Auth::user()->user_type == "service_provider")
        <a href="{{ route('servicepro.logout') }}" class="get-started-btn">Logout </a>
      @else
      @endif
    @else
      <a href="" data-toggle="modal" data-target="#exampleModal" class="get-started-btn">SIGN UP</a>
    @endif

    
  </div>
</header>