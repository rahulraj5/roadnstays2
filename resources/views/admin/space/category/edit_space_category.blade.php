@extends('admin.layout.layout')
@section('title', 'Space - Edit Category')

@section('current_page_css')
@endsection

@section('current_page_js')
<script>
  $("#updateSpcaeCat_form").validate({
    debug: false,
    rules: {
      space_cat_name: {
        required: true,
      },
      // space_cat_img: {
      //   required: true,
      // },
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateSpaceCategory')}}",
        data: formData,
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.reload()},1000);
            setTimeout(function(){window.location.href=site_url+"/admin/space-category"},1000);
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
            <a href="{{url('/admin/space-category')}}"><i class="right fas fa-angle-left"></i>Back</a>
            <!-- <h1>Edit Space Category</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Space Category</li>
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
            <h3 class="card-title">Edit Space Category</h3>
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

              <form  method="POST" id="updateSpcaeCat_form" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />

                <input type="hidden" name="cat_id" id="cat_id" value="{{(!empty($space_cat_info->scat_id) ? $space_cat_info->scat_id : '')}}" />

                <input type="hidden" name="old_space_cat_img" id="old_space_cat_img" value="{{(!empty($space_cat_info->space_cat_image) ? $space_cat_info->space_cat_image : '')}}" />

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Space Category Name</label>
                      <input type="text" class="form-control" name="space_cat_name" id="space_cat_name" placeholder="Enter Name" value="{{ (!empty($space_cat_info->category_name) ? $space_cat_info->category_name: '')}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Space Category Image</label>
                      <input type="file" class="form-control" name="space_cat_img" id="space_cat_img" >
                    </div>
                  </div>
                  @if((!empty($space_cat_info->space_cat_image)))
                    <div class="col-md-12">
                      <div class="d-flex flex-wrap">
                        <div class="image-gridiv">
                          <img src="{{url('public/uploads/space_images/cat_img/')}}/{{$space_cat_info->space_cat_image}}">
                        </div>
                      </div>
                    </div>
                  @endif

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