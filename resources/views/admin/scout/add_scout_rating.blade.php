@extends('admin.layout.layout')



@section('title', 'User - Profile')



@section('current_page_css')

@endsection



@section('current_page_js')

<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
  $('#contract_date').datetimepicker({
     format: 'YYYY-MM-DD'
    //  format: 'HH:mm'
    //format: 'LT'
  });
  $('#checkout_time').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
  $(document).ready(function(){
    $('#designation').on('change', function(){
      var value = $(this).val(); 
       if (value == 'Other') {
        $('#other').show();
       }else{
        $('#other').hide();
       }
    });
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

            <h1>Add Scout Rating</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Scout Rating</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        

        <!-- SELECT2 EXAMPLE -->

        <div class="card card-default">

          <div class="card-header">

            <h3 class="card-title">Scout Rating Form</h3>

          </div>



          <!-- /.card-header -->

          <div class="card-body">

              <form  method="POST" id="scoutRateAdmin_form">

                @csrf

                <input type="hidden" name="scout_id" name="scout_id" value="{{$scout_id}}">
                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Scout Rating</label>

                      <input type="text" class="form-control" name="rating" id="rating" placeholder="Enter Scout Rating">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Year</label>

                      <input type="text" class="form-control" name="year" id="year" placeholder="Enter Year">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Remarks</label>

                      <textarea class="form-control" name="remarks" id="remarks"></textarea>

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