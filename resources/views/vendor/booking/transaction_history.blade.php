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

<style type="text/css">
.vendor-transaction .table th, .table td {
    padding: 1px 6px;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
    font-size: 14px;
    font-weight: 500;
}

</style>

            <div class="row d-flex flex-wrap p-3">

              <!-- <div class="row"> -->
              <div class="col-12 vendor-transaction">
               <div class="card">
                  <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered table-striped bk-listing">
                      <thead>
                        <tr>

                          <th>SNo.</th>
                    
                          <th> id</th>

                          <th>User Name</th>
                          
                          <th>Booking id</th>

                          <th>Txn id</th>

                          <th>Amount</th>

                          <th>Method</th>

                          <th>Booking Type</th>

                          <th>Txn Status</th>

                          <th>Txn date</th>

                          <!-- <th>Action</th> -->


                        </tr>

                      </thead>

                      <tbody>

                         @if (!$transaction_history->isEmpty())

                  <?php $i = 1; ?>

                  @foreach ($transaction_history as $arr)

                  <tr id="row{{ $arr->id }}">

                    <td>{{ $i }}</td>

                    <td> <a href="{{url('/servicepro/transactionHistoryView')}}/{{$arr->id}}" style="margin-right: 3px;">{{ $arr->id }}</a></td>

                    <td>{{ $arr->first_name }} {{ $arr->last_name }}</td>

                    <td>{{ $arr->booking_id }}</td>

                    <td>{{ $arr->txn_id }}</td>

                    <td>{{ $arr->txn_amount }}</td>

                    <td> {{ $arr->payment_method }} </td>

                    <td>{{ $arr->booking_type }}</td>

                    <td>{{ $arr->txn_status }}</td>

                    <td>{{ $arr->txn_date }}</td>
                    


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