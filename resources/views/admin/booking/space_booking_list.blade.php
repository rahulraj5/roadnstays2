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
<script>
  $('select').on("change", function() {
    var booking_id = $(this).attr('data-id');
    var status = this.value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeSpaceBookingStatus'); ?>",
      data: {
        'status': status,
        'booking_id': booking_id
      },
      success: function(data) {
        success_noti(data.msg);
        setTimeout(function() {
          window.location.reload()
        }, 1000);
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
                    <th>Booking Id</th>
                    <th>Space Name</th>
                    <th>User Name</th>
                    <th>User Contact Info</th>
                    <th>Space City</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Booking Status</th>
                    <th>Refund Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!$bookingList->isEmpty())
                  <?php $i = 1; ?>
                  @foreach ($bookingList as $arr)
                  <tr id="row{{ $arr->id }}">
                    <td>{{ $i }}</td>
                    <td>{{ $arr->space_booking_id }}</td>
                    <td>{{ $arr->space_name }}</td>
                    <td>{{ $arr->user_first_name }} {{ $arr->user_last_name }}</td>
                    <td><b>Contact No.</b>- {{ $arr->user_contact_num }} <br> <b>Email</b>- {{$arr->user_email}}</td>
                    <td>{{ $arr->city }}</td>
                    <td>{{ $arr->payment_type }}</td>
                    <td>{{ $arr->payment_status }}</td>
                    <td>{{ $arr->booking_status }}</td>
                    @if($arr->booking_status == 'canceled')
                    <td>
                      <select class="form-control" name="order_status" data-id="{{$arr->id}}">
                        <option value="pending" {{ $arr->refund_status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $arr->refund_status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <!-- <option value="canceled" {{ $arr->refund_status == 'canceled' ? 'selected' : '' }}>Canceled</option> -->
                        <option value="confirmed" {{ $arr->refund_status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                      </select>
                    </td>
                    @else
                    <td>Not Yet</td>
                    @endif
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="{{url('/admin/spaceViewBooking')}}/{{base64_encode($arr->id)}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="fas fa-eye"></i></a>
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