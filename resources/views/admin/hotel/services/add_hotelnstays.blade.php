@extends('admin.layout.layout')
@section('title', 'User - Profile')

@section('current_page_css')
@endsection

@section('current_page_js')
<script>
  $("#addhotelNstays_form").validate({
    debug: false,
    rules: {
      hotelstayname: {
        required: true,
      },
      hotelstaydescription: {
        required: true,
      },
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/submitHotelAndStays')}}",
        data: formData,
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.reload()},1000);
            setTimeout(function(){window.location.href=site_url+"/admin/hotelAndStays_list"},1000);
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
            <h1>Add Hotel and Stays</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Hotel and Stays</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Hotel and other accommodation</h3>
            <!-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div> -->
          </div>

          <!-- /.card-header -->
          <div class="card-body">
              <form  method="POST" id="addhotelNstays_form">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="hotelstayname" id="hotelstayname" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" name="hotelstaydescription" id="hotelstaydescription" placeholder="Enter Description">
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
            <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin. -->
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
