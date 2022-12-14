<main id="main">
    <section class="user-section" style="padding-top: 0px; background-color: #f6f6f6;">
        <div class="container-fluid">
            <div class="row">
              <div class="pr-0 left-contents">
                <div class="sidebar left ">
                  <ul class="list-sidebar bg-defoult">
                    <div class="vend-stays"> Road N Stays</div>
                    <li class="active-bg"> <a href="{{ url('servicepro/dashboard') }}" class="collapsed active"> <i class='bx bx-home-circle'></i> <span class="nav-label"> Dashboard </span> </a>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="hotels">
                        <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#booking" class="collapsed"> <i class='bx bx-grid-vertical'></i> <span class="nav-label"> Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="booking">
                        <li class="active"><a href="{{ url('servicepro/bookingList') }}"><i class='bx bx-chevron-left'></i>Booking List</a></li>
                      </ul>
                    </li>
                    <li> <a href="{{ url('servicepro/profile') }}" class="collapsed"> <i class='bx bx-user-circle'></i> <span class="nav-label"> Profile </span> </a>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed"> <i class='bx bx-space-bar'></i> <span class="nav-label"> Private space </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="dashboard">
                        <li class="active"><a href="#"><i class='bx bx-chevron-left'></i>Add Private Space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> List showing Privat space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Booking parivat space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed"> <i class='bx bx-car'></i> <span class="nav-label">Tour Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="#"> <i class='bx bx-chevron-left'></i> Add tour packages List</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> List showing tour packages</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Typography</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed"><i class='bx bx-calendar-event'></i> <span class="nav-label">Event Management </span><i class='bx bx-chevron-right pull-r'></i></a>
                      <ul class="sub-menu collapse" id="tables">
                        <li><a href=""><i class='bx bx-chevron-left'></i> Static Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Data Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Foo Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> jqGrid</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><i class='bx bx-chevron-right pull-r'></i></a>
                      <ul class="sub-menu collapse" id="e-commerce">
                        <li><a href=""><i class='bx bx-chevron-left'></i> Products grid</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Products list</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Product edit</a></li>
                      </ul>
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
              </div>

              <div class="pl-0 table-contents">
                <div class="table-space">
                  <header id="header-vendor" class="fixed-top-vendor">
                    <div class="container d-flex align-items-center justify-content-between">
                      <h3 class="dashbord-text"> {{$page_heading_name}}</h3>
                      <nav class=" vendor-nav d-lg-block">
                        <ul>
                          <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                          </li>
                          <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                          <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                            <ul>
                              <!-- <li><a href="{{ url('/servicepro/profile') }}">View profile</a></li> -->
                              <li><a href="{{ route('servicepro.logout') }}">Logout </a></li>
                              <!-- <li><a href="#">Drop Down </a></li> -->
                              <!-- <li><a href="#">Drop Down 3</a></li> -->
                            </ul>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </header>