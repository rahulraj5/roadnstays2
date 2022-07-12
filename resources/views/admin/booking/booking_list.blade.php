@extends('admin.layout.layout')



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
<script src="{{ asset('resources/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('resources/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('resources/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
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
          url: "{{url('/admin/deleteBooking')}}",
          data: {
            hotel_id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            $("#row" + id).remove();
            // console.log(results);
            success_noti(results.msg);
            setTimeout(function() {
              window.location.reload()
            }, 1000);
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
      url: "<?php echo url('/admin/changeBookingStatus'); ?>",
      data: {
        'status': status,
        'hotel_id': hotel_id
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

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Booking List</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Booking List</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>



  <!-- Main content -->

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <div class="row">

            <div class="col-md-11"></div>

            <!-- <div class="col-md-1"><a href="{{ url('/admin/addHotel') }}" class="btn btn-block btn-dark">Add</a>
            </div> -->

          </div>



          <div class="card">

            <!-- /.card-header -->

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                  <tr>

                    <th>SNo.</th>

                    <th>Room Name</th>

                    <th>Hotel Name</th>

                    <th>User Name</th>

                    <th>User Contact Info</th>

                    <th>Hotel City</th>

                    <th>Payment Type</th>

                    <th>Payment Status</th>

                    <th>Status</th>

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                  @if (!$bookingList->isEmpty())

                  <?php $i = 1; ?>

                  @foreach ($bookingList as $arr)

                  <tr id="row{{ $arr->id }}">

                    <td>{{ $i }}</td>

                    <td>{{ $arr->room_name }}</td>

                    <td>{{ $arr->hotel_name }}</td>

                    <td>{{ $arr->user_first_name }} {{ $arr->user_last_name }}</td>

                    <td><b>Contact No.</b>- {{ $arr->user_contact_num }} <br> <b>Email</b>- {{$arr->user_email}}</td>

                    <td>{{ $arr->hotel_city }}</td>

                    <td>{{ $arr->payment_type }}</td>

                    <td>{{ $arr->payment_status }}</td>

                    <!-- <td><a href="{{url('/admin/viewHotelRooms')}}/{{$arr->hotel_id}}" class="btn btn-default btn-sm"><i class="fas fa-list"></i> View</a></td> -->

                    <td>{{ $arr->booking_status }}</td>
                    <!-- <td class="project-state">

                      <input type="checkbox" class="toggle-class" data-id="{{$arr->hotel_id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Active" data-off="InActive" {{ $arr->booking_status ? 'checked' : '' }}>

                    </td> -->

                    <td class="text-right py-0 align-middle">

                      <div class="btn-group btn-group-sm">

                        <a href="{{url('/admin/viewBooking')}}/{{$arr->id}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="fas fa-eye"></i></a>
                        <!-- <a href="" class="btn btn-info" style="margin-right: 3px;"><i class="fas fa-pencil-alt"></i></a> -->
                        <!-- {{url('/admin/editHotel')}}/{{$arr->hotel_id}} -->
                        <!-- <a href="javascript:void(0)" onclick="deleteConfirmation('<?php echo $arr->hotel_id; ?>');" class="btn btn-danger" style="margin-right: 3px;"><i class="fas fa-trash" alt="user" title="user"></i></a> -->



                        <!-- <a href="{{url('/admin/edit_user')}}/{{base64_encode($arr->hotel_id)}}"><i class="fa fa-edit" aria-hidden="true" alt="user" title="user"></i></a>

                                                            <a href="javascript:void(0)" onclick="delete_user('<?php echo $arr->hotel_id; ?>');"><i class="fa fa-trash" aria-hidden="true" alt="user" title="user"></i></a> -->

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

      </div>

      <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

  </section>

  <!-- /.content -->

</div>

<!-- /.content-wrapper -->



@endsection