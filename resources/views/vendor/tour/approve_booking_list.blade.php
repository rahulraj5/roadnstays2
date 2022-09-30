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
  .btn_add {
    margin-left: 20px;
    top: 55px;
    position: relative;
    z-index: 999999;
  }
</style>

<style>
  /* -------------------------------------
    INVOICE
    Styles for the billing table
    ------------------------------------- */
  .invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
  }

  .invoice td {
    padding: 5px 0;
  }

  .invoice .invoice-items {
    width: 100%;
  }

  .invoice .invoice-items td {
    border-top: #eee 1px solid;
  }

  .invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
  }

  /* .invoice-items {
    width: 100%;
  }

  .invoice-items td {
    border-top: #eee 1px solid;
  }

  .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
  } */
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
  function issueInvoiceConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/issueInvoiceTour')}}",
          data: {
            id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            // $("#row" + id).remove();
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

<script type="text/javascript">
  function rejectBookingReqConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/rejectBookingRequestTour')}}",
          data: {
            id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            // $("#row" + id).remove();
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

<script type="text/javascript">
  function deleteInvoiceConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/deleteInvoiceTour')}}",
          data: {
            id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            // $("#row" + id).remove();
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

<script type="text/javascript">
  function deleteConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/deleteTour')}}",
          data: {
            id: id,
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
<script type="text/javascript">
  function rejectBookingReqConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      // toastCancelRequest.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/cancelTourBookingRequestStatus')}}",
          data: {
            id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            // $("#row" + id).remove();
            // console.log(results);
            if (results.status == 'success') {
              success_noti(results.msg);
              setTimeout(function() {
                window.location.reload()
              }, 1000);
            } else {
              error_noti(results.msg);
            }

          },
          error: function(errorData) {
            console.log(errorData);
            alert('Please refresh page and try again!');
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
    var status = 0;
    var id = $(this).data('id');
    // alert(status);
    // alert(user_id);
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeTourStatus'); ?>",
      data: {
        'status': status,
        'id': id
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
  $('.issue_invoice').click(function() {

    var request_id = $(this).data('id');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // AJAX request
    $.ajax({
      url: "{{url('/servicepro/sendInvoice')}}",
      type: 'post',
      data: {
        request_id: request_id,
        _token: CSRF_TOKEN
      },
      success: function(response) {
        if(response.status == 'success'){
          $("#invoice_id").text(response.invoiceNum);
          success_noti(response.msg);
          setTimeout(function() {window.location.reload()}, 1000);
        }else{
          error_noti(response.msg);
        }
        // Add response in Modal body
        // $('.modal-body').html(response);

        // Display Modal
        // $('#empModal').modal('show');
      }
    });
  });
</script>

  <!-- Script -->
  <script type='text/javascript'>
  $(document).ready(function(){

    $('#example').on('click','.viewdetails',function(){
        var requestId = $(this).attr('data-id');

        // alert(requestId);
        if(requestId > 0){

            // AJAX request
            var url = "{{ route('getInvoiceDetails',[':requestId']) }}";
            url = url.replace(':requestId',requestId);
            // alert(url);

            // Empty modal data
            $('#tblinvoiceinfo tbody').empty();

            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function(response){
                    // console.log(response);
                    // Add employee details
                    $('#tblinvoiceinfo tbody').html(response.html);
                    $('.issue_invoice').attr("data-id", response.request_id);
                    // Display Modal
                    $('#invoice_modal').modal('show'); 
                }
            });
            
        }
    });

  });
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
              <!-- <th>Booking Id</th> -->
              <th>Tour Name</th>
              <th>User Name</th>
              <th>Status</th>
              <th>Invoice Number</th>
              <th>Period</th>
              <th>Approve Booking</th>
              <!-- <th>Payment Status</th> -->
              <!-- <th>Status</th> -->
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            @if (!$bookingList->isEmpty())
            <?php $i = 1; ?>
            @foreach ($bookingList as $arr)
            <tr id="row{{ $arr->id }}">
              <td>{{ $i }}</td>
              <td>{{ $arr->tour_title }}</td>
              <td>{{ $arr->user_first_name }} {{ $arr->user_last_name }}</td>
              <td>@if($arr->approve_status==1) {{ 'Generated'}} @else {{'Waiting'}} @endif</td>
              <td>@if($arr->approve_status==1) {{ $arr->invoice_num }} @else {{ 'Not yet' }} @endif </td>
              <td>From: {{ $arr->tour_start_date }} to: {{ $arr->tour_end_date }}</td>
              <td>@if($arr->booking_option == 2)
                <div class="btn-group btn-group-sm">
                  <!-- <a href="{{url('/servicepro/spaceBookingView')}}/{{base64_encode($arr->id)}}" class="btn btn-secondary" style="margin-right: 3px;">Issue Invoice</a> -->
                  <!-- <a href="javascript:void(0)" onclick="issueInvoiceConfirmation('<?php echo $arr->id; ?>');" class="btn btn-secondary" style="margin-right: 3px;">Issue Invoice</a> -->
                  <!-- <a href="" data-toggle="modal" data-target="#invoice_modal" class="btn btn-secondary" style="margin-right: 3px;">Issue Invoice</a> -->
                  <button class="btn btn-secondary viewdetails" style="margin-right: 3px;" data-id='{{ $arr->id }}' >Issue Invoice</button>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="javascript:void(0)" onclick="rejectBookingReqConfirmation('<?php echo $arr->id; ?>');" class="btn btn-danger" style="margin-right: 3px;">Reject Booking Request</a>
                </div>
                @else {{ "Instant Booking"}}
                @endif
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

<div class="modal fade" id="invoice_modal" >
         <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Create Invoice <span id="invoice_id"></span></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
               </div>
               <div class="modal-body">
                   <table class="w-100" id="tblinvoiceinfo">
                      <tbody></tbody>
                   </table>
               </div>
               <div class="modal-footer">
                  <!-- <input type="hidden" id="getRequestId" value="0"> -->
                  <!-- <button type="button" class="btn btn-info" data-bs-dismiss="modal">Send Invoice</button> -->
                  <button class="btn btn-info issue_invoice" data-id=''>Send Invoice</button>
               </div>
            </div>
         </div>
      </div>
@endsection