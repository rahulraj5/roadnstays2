@extends('admin.layouts.layout')
 
@section('title', 'View - Tour')
 
@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
  }

  .d-none {
    display: none;
  }

  .d-bloc {
    display: block;
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
</style>
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('resources/plugins/daterangepicker/daterangepicker.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('resources/plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
@endsection


@section('current_page_js')

<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>


<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- daterangepicker -->
<!-- <script src="{{ asset('resources/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('resources/plugins/daterangepicker/daterangepicker.js')}}"></script> -->
<!-- BS-Stepper -->
<script src="{{ asset('resources/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Multi-form -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
  })

  $(function() {
    // Summernote
    $('#summernote1').summernote()
  })
</script>
<script> 
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
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
          <a href="{{url('/admin/tourList')}}"><i class="right fas fa-angle-left"></i>Back</a>
          <h1>View Request Tour</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Request Tour</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <!-- <div class="card-header"> -->
        <!-- <h3 class="card-title">Hotel Form</h3> -->
        <!-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div> -->
        <!-- </div> -->

        <!-- old form code place -->

        <!-- /.card-header -->
        <!-- <div class="card-footer">
        </div> -->
        <!-- /.row -->
        <div class="row p-4">
          <div class="col-md-12">
              <!-- <div class="card-header">
                <h3 class="card-title">Request Tour</h3>
              </div> -->
                    <!-- your steps content here -->
                    <form method="POST" id="addTourContext_form" action="#">
                      <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->
                      @csrf
                      <div id="hotel-context-part" class="content slide one" role="tabpanel" aria-labelledby="hotel-context-part-trigger">
                        <!-- <form method="POST" id="addHotelContext_form"> -->

                        <div class="row">

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Status</label>
                              <select class="form-control select2bs4" name="status" id="status" style="width: 100%;" disabled="">
                                <option value="">Select Status</option>
                                <option value="1" @php if($tour_info->status == '1'){echo "selected";} @endphp>Available</option>
                                <option value="0" @php if($tour_info->status == '0'){echo "selected";} @endphp>Booked</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->email_address}}" readonly="">
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact No</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->phone_number}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Adult</label>child
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->adult}}" readonly="">
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Child</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->child}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Rooms</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->rooms}}" readonly="">
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Mattress</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->mattress}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Mattress quantity</label>
                              <input type="text" class="form-control" name="Your Name" id="your_name"value="{{$tour_info->mattress_quantity}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tour Description</label>
                              <textarea class="form-control" id="summernoteRemoved" name="tour_description" readonly="">{{$tour_info->details}}</textarea>
                            </div>
                          </div>
                          
                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Pickup Locations</h4>
                              </p>
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label>Transport</label>
                              <input type="text" class="form-control" name="city" id="city" placeholder="Enter " value="{{$tour_info->transport}}" readonly="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Start Date</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->date}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Departure city</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->departure_city}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour duration</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->tour_duration}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Flexible date</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->flexible_date}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Trip type</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->trip_type}}" readonly="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Location</label>
                              <input type="text" class="form-control" name="date" id="date"  value="{{$tour_info->location}}" readonly="">
                            </div>
                          </div>
                        </div>
                      </div>

                    </form>
          </div>
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