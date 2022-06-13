@extends('vendor.layout.layout')



@section('title', 'User - Profile')



@section('current_page_css')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<style>
  .slow .toggle-group {
    transition: left 0.7s;
    -webkit-transition: left 0.7s;
  }
</style>

@endsection



@section('current_page_js')


<!-- DataTables  & Plugins -->
<script src="{{ asset('resources/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- <script src="{{ asset('resources/plugins/jszip/jszip.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/pdfmake/pdfmake.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/pdfmake/vfs_fonts.js')}}"></script> -->
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<!-- <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script> -->
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
  function deleteConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/deleteRoom')}}",
          data: {
            room_id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            $("#row" + id).remove();
            // console.log(results);
            success_noti(results.msg);
          }
        });
      } else {
        e.dismiss;
      }
    }, function(dismiss) {
      return false;
    })
  }
</script>
<script>
  $('.toggle-class').on('change', function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var hotel_id = $(this).data('id');
    // alert(status);
    // alert(user_id);
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/servicepro/changeRoomStatus'); ?>",
      data: {
        'status': status,
        'room_id': id
      },
      success: function(data) {
        success_noti(data.success);
        // console.log(data);
        // $('#success_message').fadeIn().html(data.success);
        // setTimeout(function() { $('#success_message').fadeOut("slow"); }, 2000 );
      },
      error: function(errorData) {
        console.log(errorData);
        alert('Please refresh page and try again!');
      }
    });
  })
</script>

@endsection

@section('content')


<main id="main">
  <section class="user-section" style="padding-top: 54px; background-color: #f6f6f6;">
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
              $('button').click(function() {
                $('.sidebar').toggleClass('fliph');
              });
            });
          </script>
        </div>

        <div class="col-md-9 pl-0">
          <div class="table-space">
            <header id="header-vendor" class="fixed-top-vendor">
              <div class="container d-flex align-items-center justify-content-between">
                <h3 class="dashbord-text"> Dashboard</h3>
                <nav class=" vendor-nav d-lg-block">
                  <ul>
                    <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                    </li>
                    <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                    <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                      <ul>
                        <li><a href="{{ url('/servicepro/profile') }}">View profile</a></li>
                        <li><a href="#">Drop Down </a></li>
                        <li><a href="#">Drop Down 3</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </header>

            <div class="row d-flex flex-wrap p-3">

              <!-- <div class="row"> -->

                <div class="col-12">

                  <div class="row">

                    <div class="col-md-11"></div>

                    <div class="col-md-1"><a href="{{ url('/servicepro/addroom/') }}/{{base64_encode($hotel_id)}}" class="btn btn-block btn-dark">Add</a></div>
                  </div>



                  <div class="card">

                    <!-- <div class="card-header">

                                              <h3 class="card-title">DataTable</h3>

                                            </div> -->



                    <!-- /.card-header -->

                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">

                        <thead>

                          <tr>

                            <th>SNo.</th>

                            <th>Title</th>

                            <th>Price</th>

                            <th>Notes</th>

                            <th>Details</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                        </thead>

                        <tbody>

                          @if (!$room_list->isEmpty())

                          <?php $i = 1; ?>

                          @foreach ($room_list as $arr)

                          <tr id="row{{ $arr->id }}">

                                <td>{{ $i }}</td>

                                <td>{{ $arr->name }}</td>

                                <td>{{ $arr->price_per_night }}</td>

                                <td>{{ $arr->notes }}</td>

                                <td>{{ $arr->description }}</td>

                                <td class="project-state">

                                    <input  type="checkbox" class="toggle-class" data-id="{{$arr->id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Active" data-off="InActive" {{ $arr->status ? 'checked' : '' }}>

                                </td>

                                <td class="text-center py-0 align-middle">

                                    <div class="btn-group btn-group-sm">

                                      <a href="{{url('/servicepro/viewRoom')}}/{{$arr->id}}" class="btn btn-info" style="margin-right: 3px;"><i class="bx bx-show"></i></a>

                                      <a href="{{url('/servicepro/editRoom')}}/{{$arr->id}}" class="btn btn-info" style="margin-right: 3px;"><i class="bx bxs-edit"></i></a>

                                      <a href="javascript:void(0)" onclick="deleteConfirmation('<?php echo $arr->id; ?>');" class="btn btn-danger" style="margin-right: 3px;"><i class="bx bxs-trash" alt="user" title="user"></i></a>

                                    </div>

                                </td>

                                

                            </tr>

                          <?php $i++; ?>

                          @endforeach



                          @endif

                        </tbody>

                      </table>

                    </div>

                    <!-- /.card-body -->

                  </div>

                  <!-- /.card -->

                </div>

                <!-- /.col -->

              <!-- </div> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
@endsection