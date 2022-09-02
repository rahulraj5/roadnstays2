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
  $('#example2').dataTable( {
      "pageLength": 50,
      retrieve: true,
      paging: true
    } );

  function deleteConfirmation(id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) { 
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

          <h1>Transaction List</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Transaction List</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

<style type="text/css">
  .histri-trans .card-body .table td, .table th {
    padding: 2px 8px;
    vertical-align: middle !important;
    border-top: 1px solid #dee2e6 !important;
    /*height: 20px;*/
    font-size: 15px !important;
}
</style>

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



          <div class="card histri-trans">

            <!-- /.card-header -->

            <div class="card-body new-color">

              <table id="example2" class="table table-bordered table-striped">

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

                    <td> <a href="{{url('/admin/transactionHistoryView')}}/{{$arr->id}}" style="margin-right: 3px;">{{ $arr->id }}</a></td>

                    <td>{{ $arr->first_name }} {{ $arr->last_name }}</td>

                    <td>{{ $arr->booking_id }}</td>

                    <td>{{ $arr->txn_id }}</td>

                    <td>{{ $arr->txn_amount }}</td>

                    <td> {{ $arr->payment_method }} </td>

                    <td>{{ $arr->booking_type }}</td>

                    <td>{{ $arr->txn_status }}</td>

                    <td>{{ $arr->txn_date }}</td>
                    

                    <!-- <td class="text-right py-0 align-middle">

                      <div class="btn-group btn-group-sm">

                        <a href="{{url('/admin/transactionHistoryView')}}/{{$arr->id}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="fas fa-eye"></i></a>

                      </div>

                    </td> -->



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