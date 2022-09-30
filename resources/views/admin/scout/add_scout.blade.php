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

            <h1>Add Scout</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Scout</li>

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

            <h3 class="card-title">Scout Form</h3>

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

              <form  method="POST" id="scoutAdmin_form">

                @csrf

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>First Name</label>

                      <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Full Name">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Last Name</label>

                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Email</label>

                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" autocomplete="new-email">

                    </div>

                  </div>


                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Profile Picture</label>

                      <input type="file" class="form-control" name="profile_picture" id="profile_picture" accept="image/*">

                    </div>

                  </div>


                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Mobile Number</label>

                      <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Mobile Number">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Landline Number</label>

                      <input type="number" class="form-control" name="landline_number" id="landline_number" placeholder="Enter Landline Number">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Password</label>

                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="new-password">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Confirm Password</label>

                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">

                    </div>

                  </div>



                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Address</label>

                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>City</label>

                      <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">

                    </div>

                  </div>

                  

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Country</label>

                      <!-- <div class="select2-purple"> -->

                        <select class="form-control select2bs4" name="user_country"  id="user_country" style="width: 100%;">

                          <option value="">Select Country</option>

                          @foreach ($countries as $cont)

                            <option value="{{ $cont->id }}">{{ $cont->name }}</option>

                          @endforeach

                        </select>

                      <!-- </div>   -->

                    </div>

                  </div>

                  <div class="col-md-12 mt-0">
                    <div class="tab-custom-content mt-0">
                      <p class="lead mb-0">
                      <h4>Contract information</h4>
                      </p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                        <select class="form-control select2bs4" name="status"  id="status" style="width: 100%;">
                          <option value="">Select Status</option>
                          <option value="Active">Active</option>
                          <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Designation</label>
                        <select class="form-control select2bs4" name="designation"  id="designation" style="width: 100%;">
                          <option value="">Select Status</option>
                          <option value="Senior CEX">Senior CEX</option>
                          <option value="CEX">CEX</option>
                          <option value="Other">Other</option>
                        </select>
                        <div class="form-group">
                          <input type="text" class="form-control" name="other" id="other" placeholder="Please enter other" style="margin-top: 10px; display: none;">
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Contract Date</label>
                      <input type="text" class="form-control" name="contract_date" id="contract_date" placeholder="Contract Date">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIC </label>
                      <input type="text" class="form-control" name="nic" id="nic" placeholder="Enter NIC">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Upload NIC </label>
                      <input type="file" class="form-control" name="nic_upload" id="nic_upload">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Upload Contract </label>
                      <input type="file" class="form-control" name="contract_upload" id="contract_upload">
                    </div>
                  </div>

                  <div class="col-md-12 mt-0">
                    <div class="tab-custom-content mt-0">
                      <p class="lead mb-0">
                      <h4>Salary Information</h4>
                      </p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Basic salary</label>
                      <input type="text" class="form-control" name="basic_salary" id="basic_salary">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transport allowance</label>
                      <input type="text" class="form-control" name="transport_allowance" id="transport_allowance">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance</label>
                      <input type="text" class="form-control" name="other_allowance" id="other_allowance">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance 1</label>
                      <input type="text" class="form-control" name="other_allowance_1" id="other_allowance_1">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance 2</label>
                      <input type="text" class="form-control" name="other_allowance_2" id="other_allowance_2">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Gross salary</label>
                      <input type="text" class="form-control" name="gross_salary" id="gross_salary">
                    </div>
                  </div>


                  <div class="col-md-12 mt-0">
                    <div class="tab-custom-content mt-0">
                      <p class="lead mb-0">
                      <h4>Other Benifits</h4>
                      </p>
                    </div>
                  </div>

                  <div class="col-md-12 mt-0">
                    <!-- <div class="tab-custom-content mt-0"> -->
                      <p class="lead mb-0">
                      <h5>Fixed Commission</h5>
                      </p>
                    <!-- </div> -->
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Hotel Commission</label>
                      <input type="text" class="form-control" name="hotel_commission" id="hotel_commission">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tour Commision</label>
                      <input type="text" class="form-control" name="tour_commision" id="tour_commision">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Space Commission</label>
                      <input type="text" class="form-control" name="space_commission" id="space_commission">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Commission</label>
                      <input type="text" class="form-control" name="event_commission" id="event_commission">
                    </div>
                  </div>

                  <div class="col-md-12 mt-0">
                    <div class="tab-custom-content mt-0">
                      <p class="lead mb-0">
                      <h4>Performance</h4>
                      </p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rating</label>
                      <input type="text" class="form-control" name="rating" id="rating">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Year</label>
                      <input type="text" class="form-control" name="year" id="year">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Remarks</label>
                      <textarea class="form-control" id="remarks" name="remarks" required></textarea>
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