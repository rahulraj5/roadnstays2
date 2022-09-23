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


            <div class="row d-flex flex-wrap p-3">

              <!-- <div class="row"> -->

              <div class="col-12">

                <!-- <div class="row">

                    <div class="col-md-11">Booking List</div>

                    <div class="col-md-1"><a href="{{ url('/servicepro/addHotel') }}" class="btn btn-block btn-dark">Add</a></div>

                  </div> -->

                <div class="card">

                  <!-- <div class="card-header">
                    <h3 class="card-title">DataTable</h3>
                  </div> -->
                  <!-- /.card-header -->

                  <div class="card-body table-responsive">

                    <table id="example" class="table table-bordered table-striped bk-listing">

                      <thead>

                        <tr>

                          <th>SNo.</th>

                          <th>Room Name</th>

                          <th>Hotel Name</th>

                          <th>User Name</th>

                          <th>User Contact Number</th>

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

                          <td>{{ $arr->user_contact_num }}</td>

                          <td>{{ $arr->hotel_city }}</td>

                          <td>{{ $arr->payment_type }}</td>

                          <td>{{ $arr->payment_status }}</td>

                          <!-- <td><a href="{{url('/servicepro/viewHotelRooms')}}/{{base64_encode($arr->hotel_id)}}" class="btn btn-info"><i class="bx bx-list-ol"></i>  View</a></td> -->

                          <td>{{ $arr->booking_status }}</td>
                          <!-- <td class="project-state">

                              <input type="checkbox" class="toggle-class" data-id="{{$arr->hotel_id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Active" data-off="InActive" {{ $arr->booking_status ? 'checked' : '' }}>

                            </td> -->

                          <td class="text-right py-0 align-middle">

                            <div class="btn-group btn-group-sm">

                              <a href="{{url('/servicepro/viewBooking')}}/{{base64_encode($arr->id)}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="bx bxs-show"></i></a>
                              <!-- {{url('/servicepro/viewHotel')}}/{{$arr->hotel_id}} -->
                              <!-- <a href="" class="btn btn-info" style="margin-right: 3px;"><i class="bx bxs-edit"></i></a> -->
                              <!-- {{url('/servicepro/editHotel')}}/{{$arr->hotel_id}} -->
                              <!-- <a href="javascript:void(0)" onclick="deleteConfirmation('<?php echo $arr->hotel_id; ?>');" class="btn btn-danger" style="margin-right: 3px;"><i class="bx bxs-trash" alt="user" title="user"></i></a> -->

                              <!-- <a href="{{url('/servicepro/edit_user')}}/{{base64_encode($arr->hotel_id)}}"><i class="fa fa-edit" aria-hidden="true" alt="user" title="user"></i></a>

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