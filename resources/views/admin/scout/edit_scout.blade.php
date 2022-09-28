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

            <h1>Edit Scout</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Edit Scout</li>

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

              <form  method="POST" id="scoutUpdateAdmin_form">

                <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />

                <input type="hidden" name="user_id" id="user_id" value="{{(!empty($user_info->id) ? $user_info->id : '')}}" />

                <input type="hidden" name="old_profile_image" id="old_profile_image" value="{{(!empty($user_info->profile_image) ? $user_info->profile_image : '')}}" />

                <input type="hidden" name="old_nic_upload" id="old_nic_upload" value="{{(!empty($scout_details->nic_upload) ? $scout_details->nic_upload : '')}}" />

                <input type="hidden" name="old_contract_upload" id="old_contract_upload" value="{{(!empty($scout_details->contract_upload) ? $scout_details->contract_upload : '')}}" />

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>First Name</label>

                      <input type="text" class="form-control" name="fnameu" id="fname" placeholder="Enter First Name"  value="{{(!empty($user_info->first_name) ? $user_info->first_name : '')}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Last Name</label>

                      <input type="text" class="form-control" name="lnameu" id="lname" placeholder="Enter Last Name"  value="{{(!empty($user_info->last_name) ? $user_info->last_name : '')}}">

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

                      <label>Email</label>

                      <input type="email" class="form-control" name="emailu" id="email" placeholder="Enter Email" value="{{(!empty($user_info->email) ? $user_info->email : '')}}">

                    </div>

                  </div>

                @if((!empty($user_info->profile_pic)))
                  <div class="col-md-12">
                    <div class="d-flex flex-wrap">
                      <div class="image-gridiv">
                        <img src="{{url('public/uploads/profile_img/')}}/{{$user_info->profile_pic}}">
                      </div>
                    </div>
                  </div>
                  @endif

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Mobile Number</label>

                      <input type="number" class="form-control" name="contact_numberu" id="contact_number" placeholder="Enter Number" value="{{(!empty($user_info->contact_number) ? $user_info->contact_number : '')}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Landline Number</label>

                      <input type="number" class="form-control" name="landline_numberu" id="landline_number" placeholder="Enter Number" value="{{(!empty($user_info->landline_number) ? $user_info->landline_number : '')}}">

                    </div>

                  </div>


                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Temporary Password</label>

                      <input type="password" class="form-control" name="passwordu" id="password" placeholder="Enter Password" autocomplete="new-password">

                    </div>

                  </div>

                  <!-- <div class="col-md-6">

                    <div class="form-group">

                      <label>Confirm Password</label>

                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">

                    </div>

                  </div> -->

                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Address</label>

                      <input type="text" class="form-control" name="addressu" id="address" placeholder="Enter Address" value="{{(!empty($user_info->address) ? $user_info->address : '')}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>City</label>

                      <input type="text" class="form-control" name="cityu" id="city" placeholder="Enter City" value="{{(!empty($user_info->user_city) ? $user_info->user_city : '')}}">

                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <!-- <div class="select2-purple"> -->
                        <select class="form-control select2bs4" name="user_countryu"  id="user_country" style="width: 100%;">
                        <!-- <option value="{{(!empty($user_info->user_country) ? $user_info->user_country : '')}}">{{(!empty($user_info->user_country) ? $user_info->user_country : '')}}</option> -->
                          <!-- @foreach ($countries as $cont) -->
                            <!-- <option value="{{ $cont->id }}">{{ $cont->name }}</option> -->
                          <!-- @endforeach -->
                          <option value="">Select Country</option>
                            <?php
                            //print_r($country);
                            foreach ($countries as $value1) {
                            ?>
                            <option value="<?php echo $value1->id; ?>" <?php if ($user_info->user_country == $value1->id) {echo "selected";} ?>><?php echo $value1->name; ?>
                            </option>
                            <?php
                            }
                            ?>
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
                        <select class="form-control select2bs4" name="statusu"  id="status" style="width: 100%;">
                          <option value="">Select Status</option>
                          <option value="Active" <?php if ($scout_details->status == 'Active') {echo "selected";} ?>>Active</option>
                          <option value="Suspended" <?php if ($scout_details->status == 'Suspended') {echo "selected";} ?>>Suspended</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Designation</label>
                        <select class="form-control select2bs4" name="designationu"  id="designation" style="width: 100%;">
                          <option value="">Select Status</option>
                          <option value="Senior CEX" <?php if ($scout_details->designation == 'Senior CEX') {echo "selected";} ?>>Senior CEX</option>
                          <option value="CEX" <?php if ($scout_details->designation == 'CEX') {echo "selected";} ?>>CEX</option>
                          <option value="Other" <?php if ($scout_details->designation == 'Other') {echo "selected";} ?>>Other</option>
                        </select>
                        <div class="form-group">
                          <input type="text" class="form-control" name="other" id="other" placeholder="Please enter other" style="margin-top: 10px;" value="{{(!empty($scout_details->other) ? $scout_details->other : '')}}">
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Contract Date</label>
                      <input type="text" class="form-control" name="contract_dateu" id="contract_date" placeholder="Contract Date" value="{{(!empty($scout_details->contract_date) ? $scout_details->contract_date : '')}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIC </label>
                      <input type="text" class="form-control" name="nicu" id="nic" placeholder="Enter NIC" value="{{(!empty($scout_details->nic) ? $scout_details->nic : '')}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIC Upload</label>
                      <input type="file" class="form-control" name="nic_uploadu" id="nic_upload">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Contract Upload</label>
                      <input type="file" class="form-control" name="contract_uploadu" id="contract_upload">
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
                      <input type="text" class="form-control" name="basic_salaryu" id="basic_salary" value="{{(!empty($scout_details->basic_salary) ? $scout_details->basic_salary : '')}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transport allowance</label>
                      <input type="text" class="form-control" name="transport_allowanceu" id="transport_allowance" value="{{(!empty($scout_details->transport_allowance) ? $scout_details->transport_allowance : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance</label>
                      <input type="text" class="form-control" name="other_allowanceu" id="other_allowance" value="{{(!empty($scout_details->other_allowance) ? $scout_details->other_allowance : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance 1</label>
                      <input type="text" class="form-control" name="other_allowance_1u" id="other_allowance_1" value="{{(!empty($scout_details->other_allowance_1) ? $scout_details->other_allowance_2 : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other allowance 2</label>
                      <input type="text" class="form-control" name="other_allowance_2u" id="other_allowance_2" value="{{(!empty($scout_details->other_allowance_2) ? $scout_details->other_allowance_2 : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Gross salary</label>
                      <input type="text" class="form-control" name="gross_salaryu" id="gross_salary" value="{{(!empty($scout_details->gross_salary) ? $scout_details->gross_salary : '')}}">
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
                      <label>Hotel commission</label>
                      <input type="text" class="form-control" name="hotel_commissionu" id="hotel_commission" value="{{(!empty($scout_details->hotel_commission) ? $scout_details->hotel_commission : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tour commision</label>
                      <input type="text" class="form-control" name="tour_commisionu" id="tour_commision" value="{{(!empty($scout_details->tour_commision) ? $scout_details->tour_commision : '')}}">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Space commission</label>
                      <input type="text" class="form-control" name="space_commissionu" id="space_commission" value="{{(!empty($scout_details->space_commission) ? $scout_details->space_commission : '')}}">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Event commission</label>
                      <input type="text" class="form-control" name="event_commissionu" id="event_commission" value="{{(!empty($scout_details->event_commission) ? $scout_details->event_commission : '')}}">
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
                      <input type="text" class="form-control" name="ratingu" id="rating" value="{{(!empty($scout_details->rating) ? $scout_details->rating : '')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Year</label>
                      <input type="text" class="form-control" name="yearu" id="year" value="{{(!empty($scout_details->year) ? $scout_details->year : '')}}">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Remarks</label>
                      <textarea class="form-control" id="remarks" name="remarksu" required>{{(!empty($scout_details->remarks) ? $scout_details->remarks : '')}}</textarea>
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