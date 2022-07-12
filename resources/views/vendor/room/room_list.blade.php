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
<style>
  /*.container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
  }*/
</style>
<style>
  /* .btn_add {
    margin-left: 20px;
    top: 55px;
    left: 396px;
    position: relative;
    z-index: 999999;
    /* float: right; */
  } */
</style>
<style>
  /* .btn-group {
    float: right !important;
    padding-left:116px !important;
  } */
  /* .dataTables_filter {
   float: left !important;
  } */
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
    var id = $(this).data('id');
    // alert(status);
    // alert(user_id);
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/servicepro/changeRoomStatus'); ?>",
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
<script type="text/javascript">
  function copyConfirmation(id) {
    toastCopy.fire({}).then(function(e) {
      if (e.value === true) {
        // alert(id);
        var site_url = $("#baseUrl").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/servicepro/addCopyRoom')}}",
          data: {
            room_id: id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            // $("#row" + id).remove();
            // console.log(results);
            if (results.status == 'success') {
              success_noti(results.msg);
              // success_noti(results.msg+results.roomID);
              // setTimeout(function() {window.location.reload()}, 1000);
              setTimeout(function() {
                window.location.href = site_url + "/servicepro/editCopyRoom/" + results.new_room_id
              }, 2000);
            } else {
              error_noti(results.msg);
              // error_noti(results.msg+' '+results.roomID);
            }

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
  $(function() {
    $("#example1").DataTable({
      // "dom": '<"pull-left" f><t>',
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
  // $('#example1').dataTable( {
    
  // });
  
</script>
@endsection

@section('content')

            <div class="row d-flex flex-wrap p-3">

              <!-- <div class="row"> -->

              <div class="col-12">

                <div class="row">

                  <div class="col-md-11"></div>

                  <div class="col-md-1">
                   
                    <a href="{{ url('/servicepro/addroom/') }}/{{base64_encode($hotel_id)}}" class="btn btn-primary btn-dark btn_add">Add</a>

                  </div>

                </div>



                <div class="card">

                  <!-- <div class="card-header">

                                              <h3 class="card-title">DataTable</h3>

                                            </div> -->



                  <!-- /.card-header -->

                  <div class="card-body table-responsive">

                    <table id="example1" class="table table-bordered table-striped rm-listing">

                      <thead>

                        <tr>

                          <th>SNo.</th>

                          <th>Room Title</th>
                          <th>Room Type</th>
                          <th>Hotel Name</th>

                          <th>Price</th>
                          <th>Number of Rooms</th>

                          <!-- <th>Notes</th>

                            <th>Details</th> -->

                          <th>Copy</th>

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
                          <td>{{ $arr->room_type_cat_title }}</td>
                          <td>{{ $arr->hotel_name }}</td>

                          <td>{{ $arr->price_per_night }}</td>
                          <td>{{ $arr->number_of_rooms }}</td>

                          <!-- <td>{{ $arr->notes }}</td> -->

                          <!-- <td>{{ $arr->description }}</td> -->

                          <td>
                            <a href="javascript:void(0)" onclick="copyConfirmation('<?php echo $arr->id; ?>');" class="btn btn-info"><i class="bx bxs-copy" alt="copy" title="copy"></i></a>
                          </td>

                          <td class="project-state">

                            <input type="checkbox" class="toggle-class" data-id="{{$arr->id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Active" data-off="InActive" {{ $arr->status ? 'checked' : '' }}>

                          </td>

                          <td class="text-center py-0 align-middle">

                            <div class="btn-group btn-group-sm">

                              <a href="{{url('/servicepro/viewRoom')}}/{{base64_encode($arr->id)}}" class="btn btn-info" style="margin-right: 3px;"><i class="bx bx-show"></i></a>

                              <a href="{{url('/servicepro/editRoom')}}/{{base64_encode($arr->id)}}" class="btn btn-info" style="margin-right: 3px;"><i class="bx bxs-edit"></i></a>

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