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

<!-- <script>
  $('select').on("change", function() {
    var booking_id = $(this).attr('data-id');
    var status = this.value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeBookingStatus'); ?>",
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
</script> -->

<script>
  $('body').on('change', '.order_status',function(){
  // $('select').on("change", function() {
  // $('#order_status').on("change", function() {
    var booking_id = $(this).attr('data-id');
    var status = this.value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeBookingStatus'); ?>",
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
<script>
  $('body').on('change', '.booking_status',function(){
  // $('select').on("change", function() {
  // $('#booking_status').on("change", function() {
    var booking_id = $(this).attr('data-id');
    var status = this.value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeOfflineBookingStatus'); ?>",
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
          <h1>Room Wise Booking List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Room Wise Booking List</li>
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
                    <th>User Contact Info & Dates</th>
                    <!-- <th>Hotel City</th> -->
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Booking Status</th>
                    <th>Refund Status</th>
                    <th>Refund Amount</th>
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
                    <td><b>Contact No.</b>- {{ $arr->user_contact_num }} <br> <b>Email</b>- {{$arr->user_email}} <br>
                      <b>Checkin</b>- {{ date('d/m/y', strtotime($arr->check_in)) }} <br> <b>Checkout</b>- {{date('d/m/y', strtotime($arr->check_out))}}
                    </td>
                    <!-- <td>{{ $arr->hotel_city }}</td> -->
                    <td> @if($arr->payment_type == 1)
                              {{ 'Alfa Wallet' }}
                            @elseif($arr->payment_type == 2)
                              {{ 'Alfalah Bank Account' }}
                            @elseif($arr->payment_type == 3)
                              {{ 'Credit/Debit Card' }}
                            @elseif($arr->payment_type == 4)
                              {{ 'Other Bank Accounts' }}
                            @else
                              {{ 'paypal' }}  
                            @endif</td>
                    <td>{{ $arr->payment_status }}</td>
                    <!-- <td><a href="{{url('/admin/viewHotelRooms')}}/{{$arr->hotel_id}}" class="btn btn-default btn-sm"><i class="fas fa-list"></i> View</a></td> -->
                    <!-- <td>{{ $arr->booking_status }}</td> -->
                    <td>@if($arr->booking_status == 'pending')
                          <select class="form-control booking_status" name="booking_status" id="booking_status" data-id="{{$arr->id}}">
                            <option value="pending" {{ $arr->booking_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $arr->booking_status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                          </select>
                        @elseif($arr->booking_status == 'confirmed')
                          {{ $arr->booking_status }}
                        @else
                          {{'Failed'}}
                        @endif
                    </td>
                    @if($arr->booking_status == 'canceled')
                      <td>
                        <select class="form-control order_status" name="order_status" id="order_status" data-id="{{$arr->id}}">
                          <option value="pending" {{ $arr->refund_status == 'pending' ? 'selected' : '' }}>Pending</option>
                          <option value="processing" {{ $arr->refund_status == 'processing' ? 'selected' : '' }}>Processing</option>
                          <!-- <option value="canceled" {{ $arr->refund_status == 'canceled' ? 'selected' : '' }}>Canceled</option> -->
                          <option value="confirmed" {{ $arr->refund_status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        </select>
                      </td>
                    @else
                      <td>Not Yet</td>
                    @endif
                    @if(!empty($arr->refund_amount))
                      <td>{{ $arr->refund_amount }}</td>
                    @else
                      <td>Not Yet</td>
                    @endif
                    <!-- <td class="project-state">
                      <input type="checkbox" class="toggle-class" data-id="{{$arr->hotel_id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Active" data-off="InActive" {{ $arr->booking_status ? 'checked' : '' }}>
                    </td> -->
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="{{url('/admin/viewBooking')}}/{{$arr->id}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="fas fa-eye"></i></a>
                        <!-- <a href="{{url('/admin/roomWiseBookingList')}}/{{$arr->room_id}}" class="btn btn-info" style="margin-right: 3px;"><i class="fas fa-list-alt" alt="{{$arr->title}}" title="{{$arr->title}}"></i></a> -->
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