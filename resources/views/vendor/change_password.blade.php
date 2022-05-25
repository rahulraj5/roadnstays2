@extends('vendor.layout.layout')

@section('title', 'User - Profile')

@section('current_page_css')
@endsection

@section('current_page_js')
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/vendor/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <!-- <div class="card-header p-2">
                <ul class="nav nav-pills"> -->
                  <!-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <!-- <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" method="POST" id="changePasswordSerPro_form" name="changePasswordSerPro_form">
                            <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
                            <!-- <input type="hidden" name="id" id="id" value="{{(!empty($profile_detail[0]->id) ? $profile_detail[0]->id : '')}}" /> -->

                            <!-- <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $profile_detail[0]->name ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $profile_detail[0]->email ?? '' }}" readonly>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-3 col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-3">
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection         