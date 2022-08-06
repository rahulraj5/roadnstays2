<main id="main">
  <section class="user-section" style="padding-top: 0px; background-color: #f6f6f6;">
    <div class="container-fluid">
      <div class="row">
        <div class="pr-0 left-contents">
          <div class="sidebar left ">
            <ul class="list-sidebar bg-defoult">
              <div class="vend-stays"> Road N Stays</div>
              <li class="active-bg"> <a href="{{ url('servicepro/dashboard') }}" class="collapsed"> <i class='bx bx-home-circle'></i> <span class="nav-label"> Dashboard </span> </a>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="hotels">
                  <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                  <li class="active"><a href="{{ url('servicepro/bookingList') }}"><i class='bx bx-chevron-left'></i>Hotels Booking List</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#space" class="collapsed"> <i class='bx bxs-city'></i> <span class="nav-label"> Space Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="space">
                  <li class="active"><a href="{{ url('servicepro/space-list') }}"><i class='bx bx-chevron-left'></i>Space List</a></li>
                  <li class="active"><a href="{{ url('servicepro/spaceBookingList') }}"><i class='bx bx-chevron-left'></i>Space Booking List</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed"> <i class='bx bx-car'></i> <span class="nav-label">Tour Management</span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="products">
                  <li class="active"><a href="{{ url('servicepro/tourList') }}"> <i class='bx bx-chevron-left'></i> Tour List</a></li>
                  <li class="active"><a href="{{ url('servicepro/tourbooking_list') }}"> <i class='bx bx-chevron-left'></i> Tour Booking</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#transacation" class="collapsed"> <i class='bx bx-transfer'></i> <span class="nav-label">Transacation History</span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="transacation">
                  <li class="active"><a href="{{ url('servicepro/transactionHistory') }}"> <i class='bx bx-chevron-left'></i> Transacation List</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#event" class="collapsed"> <i class='bx bx-calendar'></i> <span class="nav-label">Event Management</span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="event">
                  <li class="active"><a href="{{ url('servicepro/events_list') }}"> <i class='bx bx-chevron-left'></i> Event List</a></li>
                </ul>
              </li>
              <li> <a href="{{ url('servicepro/profile') }}" class="collapsed"> <i class='bx bx-user-circle'></i> <span class="nav-label"> Profile </span> </a>
              </li>
              
            </ul>
          </div>
 
          <script type="text/javascript">
            $(document).ready(function() {
              $('#sidebar_bar').click(function() {
                $('.sidebar').toggleClass('fliph');
              });
            });
          </script>

          <script type="text/javascript">
            function openNav() {
              document.getElementById("mySidenav").style.width = "275px";
            }

            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
          </script>

        </div>

        <div class="pl-0 table-contents">
          <div class="table-space">
            <header id="header-vendor" class="fixed-top-vendor">
              <div class="container d-flex align-items-center justify-content-between">
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <ul class="menu-trig01">
                    <div class="vend-stays title-mobi"> Road N Stays</div>
                    <li class="active-bg">
                      <a href="{{ url('servicepro/dashboard') }}" class="collapsed active"> <i class='bx bx-home-circle'></i> <span class="nav-label"> Dashboard </span> </a>
                    </li>
                    <li>
                      <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="hotels">
                        <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                        <li class="active"><a href="{{ url('servicepro/bookingList') }}"><i class='bx bx-chevron-left'></i>Hotels Booking List</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#" data-toggle="collapse" data-target="#space" class="collapsed"> <i class='bx bxs-city'></i> <span class="nav-label">Space Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="space">
                      <li class="active"><a href="{{ url('servicepro/space-list') }}"><i class='bx bx-chevron-left'></i>Space List</a></li>
                      <li class="active"><a href="{{ url('servicepro/spaceBookingList') }}"><i class='bx bx-chevron-left'></i>Space Booking List</a></li>
                      </ul>
                    </li>
                    <li><a href="#" data-toggle="collapse" data-target="#products" class="collapsed"> <i class='bx bx-car'></i> <span class="nav-label">Tour Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="{{ url('servicepro/tourList') }}"> <i class='bx bx-chevron-left'></i> Tour List</a></li> 
                        <li class="active"><a href="{{ url('servicepro/tourbooking_list') }}"> <i class='bx bx-chevron-left'></i> Tour Booking</a></li>
                      </ul>
                    </li>
                    <li><a href="{{ url('servicepro/profile') }}" class="collapsed"> <i class='bx bx-user-circle'></i> <span class="nav-label"> Profile </span> </a></li>
                  </ul>
                </div> 
                <span class="adj-nav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                <h3 class="dashbord-text"> {{$page_heading_name}}</h3>
                <nav class=" vendor-nav d-lg-block">
                  <ul>
                    <li><a href="{{ url('/') }}"><i class='bx bxs-home'></i></a></li>
                    <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                    </li>
                    <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                    <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                      <ul>
                        <li><a href="{{ route('servicepro.logout') }}">Logout </a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </header>