<main id="main">
    <section class="user-section" style="padding-top: 78px; background-color: #f6f6f6;">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 pr-0">
                <div class="sidebar left ">
                  <ul class="list-sidebar bg-defoult">
                    <div class="vend-stays"> Road N Stays</div>
                    <li> <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed active"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="hotels">
                        <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i class='bx bx-space-bar'></i> <span class="nav-label"> Private space </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="dashboard">
                        <li class="active"><a href="#"><i class='bx bx-chevron-left'></i>Add Private Space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> List showing Privat space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Booking parivat space</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i class='bx bx-car'></i> <span class="nav-label">Tour Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                      <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="#"> <i class='bx bx-chevron-left'></i> Add tour packages List</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> List showing tour packages</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                        <li><a href="#"><i class='bx bx-chevron-left'></i> Typography</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class='bx bx-calendar-event'></i> <span class="nav-label">Event Management </span><i class='bx bx-chevron-right pull-r'></i></a>
                      <ul class="sub-menu collapse" id="tables">
                        <li><a href=""><i class='bx bx-chevron-left'></i> Static Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Data Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> Foo Tables</a></li>
                        <li><a href=""><i class='bx bx-chevron-left'></i> jqGrid</a></li>
                      </ul>
                    </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><i class='bx bx-chevron-right pull-r'></i></a>
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