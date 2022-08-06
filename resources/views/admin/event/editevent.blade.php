@extends('admin.layout.layout')
@section('title', 'Edit New Event')

@section('current_page_css')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">

@endsection

@section('current_page_js')
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

<script>
  $("#updateEvent_form").validate({
    debug: false,
    rules: {
      title: {
        required: true,
      },
      description: {
        required: true,
      },
      // event_img: {
      //   required: true,
      // },
      address: {
        required: true,
      },
      start_date: {
        required: true,
      },
      start_time: {
        required: true,
      },
      end_date: {
        required: true,
      },
      end_time: {
        required: true,
      },
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateEvent')}}",
        data: formData,
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.reload()},1000);
            setTimeout(function(){window.location.href=site_url+"/admin/events_list"},1000);
          } else {
            error_noti(response.msg);
          }

        }
      });
      // event.preventDefault();
    }
  });

    $(document).ready(function () {
        $("#start_date").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#end_date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#end_date').datepicker({
            dateFormat: "dd-M-yy"
        });

        $('#start_time').timepicker();
        $('#end_time').timepicker();
    });
    
    
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
          <a href="{{url('/admin/events_list')}}"><i class="right fas fa-angle-left"></i>Back</a>
          </div>
          <div class="col-sm-6">
           <!--  <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Event</li>
            </ol> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Event</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <form  method="POST" id="updateEvent_form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="event_id" id="event_id" value="{{$event['id']}}">
              <input type="hidden" name="old_event_image" id="old_event_image" value="{{$event['image']}}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$event['title']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="customFile">Event Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="event_img" name="event_img">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  @if((!empty($event['image'])))
                    <div class="col-md-12">
                      <div class="d-flex flex-wrap">
                        <div class="image-gridiv">
                          <img src="{{url('public/uploads/event_gallery/')}}/{{$event['image']}}">
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" required="">{{$event['description']}}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required="" value="{{$event['address']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start date</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Enter start date" required="" value="{{$event['start_date']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start time</label>
                    <input type="text" class="form-control timepicker" name="start_time" id="start_time" placeholder="Enter start time" value="{{$event['start_time']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End date</label>
                    <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Enter end date" required="" value="{{$event['end_date']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End time</label>
                    <input type="text" class="form-control timepicker" name="end_time" id="end_time" placeholder="Enter end time" required="" value="{{$event['end_time']}}">
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
                </div>
              </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection