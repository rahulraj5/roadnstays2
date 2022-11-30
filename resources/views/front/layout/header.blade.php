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
        <li><a href="{{ url('/') }}">Hotel</a></li>
        <li><a href="{{ url('/tour-list') }}">Tour</a></li>
        <!-- <li><a href="{{ url('/events') }}">Event</a></li> -->
        <!-- <li><a href="{{ url('/space') }}">Space</a></li> -->
        <!-- <li><a href="#">Packages</a></li> -->
        <!-- <li><a href="#">Weather</a></li> -->

      </ul>
    </nav>


    @if(Auth::check())
    @if(Auth::user()->user_type == "normal_user")
    <!-- Auth::check() -->
    <!-- Auth::gaurd('user') -->
    <!-- <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('user.profile') }}">Profile</a></li>
      </ul>
    </nav>
    <a href="{{ route('user.logout') }}" class="get-started-btn">Logout </a> -->
    <!-- <nav class="navbar navbar-dark navbar-expand-sm">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-list-4">
        <ul class="navbar-nav main-menu">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if(is_null(Auth::user()->profile_pic))
              <img src="{{ asset('/public/img/user1.jpg') }}" width="40" height="40" class="rounded-circle">
              @else
              <img src="{{ asset('/public/uploads/profile_img/'.Auth::user()->profile_pic) }}" width="40" height="40" class="rounded-circle">
              @endif
            </a>
            <div class="dropdown-menu first-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('user.profile') }}"> <i class='bx bx-user-circle'></i>Profile</a>



              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-5" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar-list-5">
                <ul class="navbar-nav submenu">
                  <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle dropdown-item" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="justify-content: space-between;">
                      <p><i class='bx bx-book-content'></i>Booking</p>
                    </a>
                    <div class="dropdown-menu second-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="sub-drop" href="{{ url('/user/bookingList') }}">-Hotel Booking</a>
                      <a class="sub-drop" href="#">-Event Bokking</a>
                      <a class="sub-drop" href="#">-Space Booking</a>
                    </div>
                  </li>
                </ul>
              </div>

              <a class="dropdown-item" href="{{ route('user.logout') }}"><i class='bx bx-log-out-circle'></i>Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav> -->
    <nav>
      <ul id='menu'>
        <li class="profile-list-pic">
          <a class='prett' href='#' title='Menu'>
            @if(is_null(Auth::user()->profile_pic))
            <img src="{{ asset('/public/img/user.png') }}" width="40" height="40" class="rounded-circle">
            @else
            <img src="{{ asset('/public/uploads/profile_img/'.Auth::user()->profile_pic) }}" width="50" height="50" class="rounded-circle">

            @endif

          </a>
          <ul class='menus'>
            <li><a href="{{ route('user.profile') }}" title='Dropdown 2'><i class='bx bx-user-circle'></i>Profile</a></li>
            <li class='has-submenu'><a class='prett' href='' title='Dropdown 1'><i class='bx bx-book-content'></i>Booking</a>
              <ul class='submenu'>
                <li><a href="{{ url('/user/bookingList') }}" title="Sub Menu">Hotel Booking</a></li>
                <!-- <li><a href="{{ url('/user/spaceBookingList') }}" title="Sub Menu">Space Booking</a></li> -->
                <li><a href="{{ url('/user/tourBookingList') }}" title="Sub Menu">Tour Booking</a></li>
                <!-- <li><a href="{{ url('/user/eventBookingList') }}" title="Sub Menu">Event Booking</a></li> -->
              </ul>
            </li>

            <li><a href="{{ route('user.logout') }}" title='Dropdown 3'><i class='bx bx-log-out-circle'></i>Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>

    @elseif(Auth::user()->user_type == "service_provider")
    <!-- <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('servicepro.dashboard') }}">Dashboard</a></li>
      </ul>
    </nav>
    <a href="{{ route('servicepro.logout') }}" class="get-started-btn">Logout </a> -->
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('servicepro.dashboard') }}">Dashboard</a></li>
      </ul>
    </nav>
    <nav>
      <!-- <ul>
        <li><a href="{{ route('servicepro.dashboard') }}">Dashboard</a></li>
      </ul> -->
      <ul id='menu'>
        
        <li class="profile-list-pic">
          <a class='prett' href='#' title='Menu'>
            @if(is_null(Auth::user()->profile_pic))
            <img src="{{ asset('/public/img/user.png') }}" width="40" height="40" class="rounded-circle">
            @else
            <img src="{{ asset('/public/uploads/profile_img/'.Auth::user()->profile_pic) }}" width="50" height="50" class="rounded-circle">

            @endif

          </a>
          <ul class='menus'>
            <!-- <li><a href="{{ route('servicepro.dashboard') }}">Dashboard</a></li> -->
            <li><a href="{{ url('servicepro/profile') }}" title='Dropdown 2'><i class='bx bx-user-circle'></i>Profile</a></li>
            <li class='has-submenu'><a class='prett' href='' title='Dropdown 1'><i class='bx bx-book-content'></i>Booking</a>
              <ul class='submenu'>
                <li><a href="{{ url('/servicepro/hotel-reservation-list') }}" title="Sub Menu">Hotel Booking</a></li>
                <!-- <li><a href="{{ url('/servicepro/space-reservation-list') }}" title="Sub Menu">Space Booking</a></li> -->
                <li><a href="{{ url('/servicepro/tour-reservation-list') }}" title="Sub Menu">Tour Booking</a></li>
              </ul>
            </li>

            <li><a href="{{ route('servicepro.logout') }}" title='Dropdown 3'><i class='bx bx-log-out-circle'></i>Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    @else
    @endif
    @else
    <a href="" data-toggle="modal" data-target="#exampleModal-log-in" class="get-started-btn">SIGN IN</a>
    @endif





  </div>
</header>