@extends('admin.layouts.layout')
@section('title', 'Edit- Global Time')

@section('current_page_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
   .active .bs-stepper-circle {
   background-color: #126c62 !important;
   }
</style>
<style type="text/css">
   input[type="file"] {
   display: block;
   }
   .imageThumb {
   max-height: 75px;
   border: 2px solid;
   padding: 1px;
   cursor: pointer;
   width: 100%;
   }
   .pip {
   display: inline-block;
   margin: 10px 10px 0 0;
   }
   .remove {
   display: block;
   background: #444;
   border: 1px solid black;
   color: white;
   text-align: center;
   cursor: pointer;
   }
   .remove:hover {
   background: white;
   color: black;
   }
   .d-none {
   display: none;
   }
</style>
<style>
   .card {
   box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
   margin-bottom: 1rem;
   padding: 0 0.5rem;
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
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $("#updateGlobalTime_form").validate({
    debug: false,
    rules: {
      hotel_global_time:{
        required: true,
        number: true,
        min: 1,
      },
      tour_global_time:{
        required: true,
        number: true,
        min: 1,
      },
      space_global_time:{
        required: true,
        number: true,
        min: 1,
      },
      event_global_time:{
        required: true,
        number: true,
        min: 1,
      },
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      // console.log("formData",formData);
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateGlobalTime')}}",
        data: formData,
        
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            setTimeout(function(){window.location.reload()},1000);
          } else {
            error_noti(response.msg);
          }

        }
      });
      // event.preventDefault();
    }
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
          <!-- <a href="{{url('/admin/showChooseUs')}}"><i class="right fas fa-angle-left"></i>Back</a> -->
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Event</li>
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
            <h3 class="card-title">Update Global Time</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
              <form  method="POST" id="updateGlobalTime_form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Hotel Global Time</label>
                      <input type="text" class="form-control" name="hotel_global_time" id="hotel_global_time" placeholder="Enter Hotel Global Time" value="{{ $global_time->hotel ?? '' }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tour Global Time</label>
                      <input type="text" class="form-control" name="tour_global_time" id="tour_global_time" placeholder="Enter Tour Global Time" value="{{ $global_time->tour ?? '' }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Space Global Time</label>
                      <input type="text" class="form-control" name="space_global_time" id="space_global_time" placeholder="Enter Space Global Time" value="{{ $global_time->space ?? '' }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Event Global Time</label>
                      <input type="text" class="form-control" name="event_global_time" id="event_global_time" placeholder="Enter Event Global Time" value="{{ $global_time->event ?? '' }}">
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
        
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection         
