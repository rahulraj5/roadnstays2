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
  .btn_add{
  margin-left: 20px; 
  top: 55px; 
  position: relative; 
  z-index: 999999;
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
    toastDelete.fire({
    }).then(function(e) {
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
            setTimeout(function() { window.location.reload() }, 1000);
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
    var id = $(this).data('id');
    // alert(status);
    // alert(user_id);
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeTourStatus'); ?>",
      data: {'status': status, 'id': id},
      success: function(data){
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



            <!-- <div class="row d-flex flex-wrap p-3"> -->

              <!-- <div class="row"> -->

              <!-- <div class="col-12">

                <div class="row">

                  <div class="col-md-11"></div>

                  <div class="col-md-1"> -->
                  <!-- <div> -->
                    <!-- <a href="{{ url('/servicepro/addHotel') }}" class="btn btn-primary btn-dark btn_add">Add</a> -->
                  <!-- </div> -->

            <!-- </div> -->
            <a href="{{ url('/servicepro/addTour') }}" class="btn btn-primary btn-dark btn_add htl-add">Add</a>
            <div class="card hotel_info-card">

              <!-- <div class="card-header">

                                              <h3 class="card-title">DataTable</h3>

                                            </div> -->

              <!-- /.card-header -->

               <div class="card-body table-responsive">

                                <table id="example1" class="table table-bordered table-striped htl-listing">

                                    <thead>

                                        <tr>

                                      <th>SNo.</th>

                                      <th>Tour Name</th>

                                      <th>User Name</th>

                                      <th>User Contact Info</th>

                                      <th>Tour City</th>

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

                    <td>{{ $arr->tour_title }}</td>

                    <td>{{ $arr->user_first_name }} {{ $arr->user_last_name }}</td>

                    <td><b>Contact No.</b>- {{ $arr->user_contact_num }} <br> <b>Email</b>- {{$arr->user_email}}</td>

                    <td>{{ $arr->city }}</td>

                    <td>{{ $arr->payment_type }}</td>

                    <td>{{ $arr->payment_status }}</td>

                    <td>{{ $arr->booking_status }}</td>
                    

                    <td class="text-right py-0 align-middle">

                      <div class="btn-group btn-group-sm">

                        <a href="{{url('/servicepro/viewtourBooking')}}/{{$arr->id}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="bx bxs-show"></i></a>

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