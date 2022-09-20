@extends('admin.layout.layout')
 
@section('title', 'User - Profile')

@section('current_page_css')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<style>

  .slow .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }

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
    toastDelete.fire({
    }).then(function(e) {
      if (e.value === true) {
          // alert(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/admin/deleteEvent')}}",
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
    var event_id = $(this).data('id');
    // alert(status);
    // alert(user_id);
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/changeEventStatus'); ?>",
      data: {'status': status, 'event_id': event_id},
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

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1>Static Pages Content List</h1>

                    </div>

                    <div class="col-sm-6">

                        <!-- <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Events List</li>

                        </ol> -->

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

                           <!--  <div class="col-md-11"></div>

                            <div class="col-md-1"><a href="{{ url('/admin/addEvent') }}"

                                    class="btn btn-block btn-dark">Add</a></div>

                            </div> -->



                        <div class="card">

                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>

                                        <tr> 
                                            <th>SNo.</th>

                                            <th>Images</th>

                                            <th>Heading</th>

                                            <th>Content</th>


                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    @if (!$static_content->isEmpty())

                                        <?php $i = 1; ?>

                                        @foreach ($static_content as $arr)

                                        <tr id="row{{ $arr->id }}">

                                            <td>{{ $i }}</td>

                                            
                                            <td><?php if($arr->banner != ""){?><img src="{{ url('resources/assets/img') }}/{{ $arr->banner }}" style="width: 100px; height: 100px;"><?php } ?></td>
                                            <td>{{ $arr->heading }}</td>
                                            <td style="color:black;">{!! $arr->content !!}</td>
                                            
                                            

                                            <td class="text-right py-0 align-middle"> 
                                                <div class="btn-group btn-group-sm"> 
                                                   <a href="{{url('/admin/editStaticData')}}/{{ base64_encode($arr->id) }}" class="btn btn-info" style="margin-right: 3px;"><i class="fas fa-pencil-alt"></i></a>
                                                   
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