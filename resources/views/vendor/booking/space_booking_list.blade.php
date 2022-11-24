@extends('vendor.layout.layout')

@section('title', 'User - Profile')

@section('current_page_css')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<style>
  .slow .toggle-group {
    transition: left 0.7s;
    -webkit-transition: left 0.7s;
  }
</style>
<style>
  /*.container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
  }*/
</style>
<style>
  .d-non{
    display: none;
  }
</style>
@endsection

@section('current_page_js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('resources/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- <script src="{{ asset('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/jszip/jszip.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/pdfmake/pdfmake.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/pdfmake/vfs_fonts.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script> -->
<!-- <script src="{{ asset('resources/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> -->
<script src="{{ asset('resources/assets/js/datatable_custom.js')}}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
  function deleteConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/deleteHotel')}}",
          data: {
            hotel_id: id,
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
      url: "<?php echo url('/servicepro/changeHotelStatus'); ?>",
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
<div class="row d-flex flex-wrap p-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive">
        <table id="example" class="table table-bordered table-striped bk-listing">
          <thead>
            <tr>
              <th>SNo.</th>
              <th>Booking Id</th>
              <th>Space Name</th>
              <th>User Name</th>
              <th>User Contact Info</th>
              <th>Check in - Check out</th>
              <th>Payment Type</th>
              <th>Payment Status</th>
              <th>Status</th>
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
              <td>{{ $arr->space_booking_id }}</td>
              <td>{{ $arr->space_name }}</td>
              <td>{{ $arr->user_first_name }} {{ $arr->user_last_name }}</td>
              <td><b>Contact No.</b>- {{ $arr->user_contact_num }} <br> <b>Email</b>- {{$arr->user_email}}</td>
              <td>{{ date('d/m/y', strtotime($arr->check_in_date)) }} - {{ date('d/m/y', strtotime($arr->check_out_date)) }}</td>
              <td>
                @if($arr->payment_type == 0)
                  {{ 'Offline' }}
                @elseif($arr->payment_type == 1)
                  {{ 'Alfa Wallet' }}
                @elseif($arr->payment_type == 2)
                  {{ 'Alfalah Bank Account' }}
                @elseif($arr->payment_type == 3)
                  {{ 'Credit/Debit Card' }}
                @elseif($arr->payment_type == 4)
                  {{ 'Other Bank Accounts' }}
                @else
                  {{ 'paypal' }}  
                @endif
              </td>
              <td>{{ $arr->payment_status }}</td>
              <td>{{ $arr->booking_status }}</td>
              @if($arr->booking_status == 'canceled')
                <td>{{ $arr->refund_status }}</td>
                <td>{{ $arr->refund_amount }}</td>
              @else
                <td>Not Yet</td>
                <td>Not Yet</td>
              @endif
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                  <a href="{{url('/servicepro/spaceBookingView')}}/{{base64_encode($arr->id)}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="bx bxs-show"></i></a>
                </div>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- End #main -->
@endsection