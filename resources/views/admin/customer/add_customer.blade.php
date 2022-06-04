@extends('admin.layout.layout')



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

            <h1>Add Customer</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Customer</li>

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

            <h3 class="card-title">Customer Form</h3>



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

              <form  method="POST" id="customerAdmin_form">

                @csrf

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Customer Full Name</label>

                      <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Customer First Name">

                    </div>

                  </div>

                  <!-- <div class="col-md-6">

                    <div class="form-group">

                      <label>Customer Last Name</label>

                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Customer Last Name">

                    </div>

                  </div> -->



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Customer Email</label>

                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Customer Email" autocomplete="new-email">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Customer Number</label>

                      <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Customer Number">

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