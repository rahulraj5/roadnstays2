  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('resources/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('resources/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/admin/profile') }}" class="d-block">John Dow</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Hotel Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
 
              <li class="nav-item">
                <a href="{{ url('/admin/hotelList') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hotels List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/hotelAndStays_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hotel & Stays</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/hotelAmenity_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Amenities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/hotelAmenityType_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Amenity Type</p>
                </a>
              </li>
             
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Room Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/room_type_categories') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Types List</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ url('/admin/roomlist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room List</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="{{ url('/admin/scoutList') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Scout List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/serviceProviderList') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Service Provider list
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/customer_management') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/booking_list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Booking List
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Tour Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/tourList') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour List</p>
                </a>
              </li>
            </ul>
          </li>  -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>