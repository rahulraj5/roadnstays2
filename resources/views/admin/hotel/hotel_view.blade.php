@extends('admin.layout.layout')
@section('title', 'User - Profile')

@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
  }

  /*Select2 ReadOnly Start*/
  /* select[readonly].select2-hidden-accessible+.select2-container {
    pointer-events: none;
    touch-action: none;
  }

  select[readonly].select2-hidden-accessible+.select2-container .select2-selection {
    background: #eee;
    box-shadow: none;
  }

  select[readonly].select2-hidden-accessible+.select2-container .select2-selection__arrow,
  select[readonly].select2-hidden-accessible+.select2-container .select2-selection__clear {
    display: none;
  } */
  /*Select2 ReadOnly End*/
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
<!-- BS-Stepper -->
<script src="{{ asset('resources/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
    $('#summernote').summernote('disable');
    $('#summernote1').summernote('disable');
  })
</script>
<script>
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<script>
  $(document).ready(function() {
    // Select2 Multiple
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>

<script>
  $(':radio:not(:checked)').attr('disabled', true);
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
          <h1>View Hotel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Hotel</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <!-- <div class="card-header">
                <h3 class="card-title">Hotel</h3>
              </div> -->
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#hotel-context-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="hotel-context-part" id="hotel-context-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Hotel Context</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#hotel-policy-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="hotel-policy-part" id="hotel-policy-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Hotel Policy</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#facility-service-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="facility-service-part" id="facility-service-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Facilities & Services</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="POST" id="updateHotelContext_form">
                      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />

                      <input type="hidden" name="hotel_id" id="hotel_id" value="{{(!empty($hotel_info->hotel_id) ? $hotel_info->hotel_id : '')}}" />
                      <input type="hidden" name="old_hotel_video" id="old_hotel_video" value="@if(!empty($hotel_info->hotel_id)){{ $hotel_info->hotel_video }}@endif" />
                      <input type="hidden" name="old_hotel_image" id="old_hotel_image" value="@if(!empty($hotel_info->hotel_id)){{ $hotel_info->hotel_gallery }}@endif" />
                      <input type="hidden" name="old_hotel_document" id="old_hotel_document" value="@if(!empty($hotel_info->hotel_id)){{ $hotel_info->hotel_document }}@endif" />
                      <input type="hidden" name="old_hotel_notes" id="old_hotel_notes" value="@if(!empty($hotel_info->hotel_id)){{ $hotel_info->hotel_notes }}@endif" />

                      <div id="hotel-context-part" class="content" role="tabpanel" aria-labelledby="hotel-context-part-trigger">
                        <!-- <form method="POST" id="addHotelContext_form"> -->

                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

                        <div class="row">

                          <div class="col-md-12 mt-0">
                            <!-- <div class="tab-custom-content mt-0"> -->
                            <p class="lead mb-0">
                            <h4>Hotel Context</h4>
                            </p>
                            <!-- </div> -->
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Hotel Name</label>
                              <input type="text" class="form-control" name="hotelName" id="hotelName" value="{{(!empty($hotel_info->hotel_name) ? $hotel_info->hotel_name : '')}}" placeholder="Enter Name" readonly>
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Hotel Content</label>
                              <textarea id="summernote" name="summernote" disabled>{{(!empty($hotel_info-> hotel_content) ? $hotel_info-> hotel_content : '')}}</textarea>
                              <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->
                              <!-- </textarea> -->
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="customFile">Hotel Gallery</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="hotelGallery" name="hotelGallery[]" disabled>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>

                          

                          <div class="col-md-12">
                            <div class="d-flex flex-wrap">
                              @php $hotel_gallery = DB::table('hotel_gallery')->orderby('id', 'ASC')->where('hotel_id', $hotel_info->hotel_id)->get(); @endphp
                              @foreach($hotel_gallery as $image)
                              <div class="image-gridiv">
                                <img src="{{url('public/uploads/hotel_gallery/')}}/{{$image->image}}">
                              </div>
                              @endforeach
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Hotel Video</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="hotelVideo" id="hotelVideo" disabled>
                                <label class="custom-file-label" for="customFile">Choose file</label>

                                @if((!empty($hotel_info->hotel_video)))
                                <div class="col-md-12">
                                  <video class="mt-2" width="200" height="150" controls>
                                    <source src="{{url('/')}}/public/uploads/hotel_video/{{$hotel_info->hotel_video}}" type="video/mp4">
                                  </video>
                                </div>
                                @endif
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Category</label>
                              <select class="form-control select2bs4" name="cat_listed_room_type" id="cat_listed_room_type" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Category and Listed In/Room Type</option> -->
                                @foreach ($properties as $prop)
                                <option value="{{ $prop->id }}" @php if($hotel_info->cat_listed_room_type == $prop->id){echo "selected";} @endphp >{{ $prop->stay_type }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label>Where else your property listed?</label>
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="where_property_listed1" name="where_property_listed" value="1" @php if($hotel_info->where_property_listed == 1){echo 'checked';} @endphp>
                                    <label for="where_property_listed1" class="custom-control-label">Yes</label>
                                  </div>

                                </div>
                              </div>
                              <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="where_property_listed2" name="where_property_listed" value="0" @php if($hotel_info->where_property_listed == 0){echo 'checked';} @endphp>
                                    <label for="where_property_listed2" class="custom-control-label">No</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <!-- select -->
                            <div class="form-group">
                              <label>Select Hotel Rating</label>
                              <select class="form-control" name="hotel_rating" id="hotel_rating" disabled="disabled">
                                <option value="1" @php if($hotel_info->hotel_rating == 1){echo "selected";} @endphp >1 Star</option>
                                <option value="2" @php if($hotel_info->hotel_rating == 2){echo "selected";} @endphp>2 Star</option>
                                <option value="3" @php if($hotel_info->hotel_rating == 3){echo "selected";} @endphp>3 Star</option>
                                <option value="4" @php if($hotel_info->hotel_rating == 4){echo "selected";} @endphp>4 Star</option>
                                <option value="5" @php if($hotel_info->hotel_rating == 5){echo "selected";} @endphp>5 Star</option>
                              </select>
                            </div>

                          </div>

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Contact Details for this Property</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Name</label>
                              <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{(!empty($hotel_info->property_contact_name) ? $hotel_info->property_contact_name : '')}}" placeholder="Enter Contact Name" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Number</label>
                              <input type="text" class="form-control" name="contact_num" id="contact_num" value="{{(!empty($hotel_info->property_contact_num) ? $hotel_info->property_contact_num : '')}}" placeholder="Enter Contact Number" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Alternate Number</label>
                              <input type="text" class="form-control" name="alternate_num" id="alternate_num" value="{{(!empty($hotel_info->property_alternate_num) ? $hotel_info->property_alternate_num : '')}}" placeholder="Enter Alternate Number" readonly>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label>Do you own multiple hotels or are you part of property management company or group?</label>
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="do_you_multiple_hotel1" name="do_you_multiple_hotel" value="1" @php if($hotel_info->do_you_multiple_hotel == 1){echo 'checked';} @endphp>
                                    <label for="do_you_multiple_hotel1" class="custom-control-label">Yes</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="do_you_multiple_hotel2" name="do_you_multiple_hotel" value="0" @php if($hotel_info->do_you_multiple_hotel == 0){echo 'checked';} @endphp>
                                    <label for="do_you_multiple_hotel2" class="custom-control-label">No</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Document</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="hotel_document" id="hotel_document" disabled>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @if((!empty($hotel_info->hotel_document)))
                                <a href="{{ url('public/uploads/hotel_document') }}/{{ $hotel_info->hotel_document }}" download>{{ $hotel_info->hotel_document }}</a>
                                @endif
                              </div>
                            </div>
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scouts ID</label>
                              <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Scouts</option> -->
                                @php $scouts = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get(); @endphp
                                @foreach ($scouts as $value)
                                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Hotel Notes</label>
                              <textarea id="summernote1" name="hotel_notes">{{(!empty($hotel_info-> hotel_notes) ? $hotel_info-> hotel_notes : '')}}</textarea>
                              <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->
                              <!-- </textarea> -->
                            </div>
                          </div>

                          <!-- <div class="col-md-6">
                              <div class="form-group">
                                <label>Scouts ID</label>
                                <input type="text" class="form-control" name="scout_id" id="scout_id" placeholder="Enter Scouts ID">
                              </div>
                            </div> -->

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Check In/out time</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <!-- <div class="form-group"> -->
                            <label>Time for Check in</label>
                            <!-- <input type="text" class="form-control" name="scout_id" id="datetime" placeholder="Enter Scouts ID"> -->
                            <div class="input-group date" id="mondatetimepicker31">
                              <input type="text" class="form-control" id="checkin_time" name="checkin_time" value="{{(!empty($hotel_info->checkin_time) ? $hotel_info->checkin_time : '')}}" readonly>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                              </span>
                            </div>
                            <!-- </div> -->
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Time for Check out</label>
                              <input type="text" class="form-control" name="checkout_time" id="checkout_time" value="{{(!empty($hotel_info->checkout_time) ? $hotel_info->checkout_time : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Min day before booking</label>
                              <input type="text" class="form-control" name="min_day_before_book" id="min_d_before_book" value="{{(!empty($hotel_info->min_day_before_book) ? $hotel_info->min_day_before_book : '')}}" placeholder="Enter Min day before booking" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Min day stays</label>
                              <input type="text" class="form-control" name="min_day_stays" id="min_day_stays" value="{{(!empty($hotel_info->min_day_stays) ? $hotel_info->min_day_stays : '')}}" placeholder="Enter Min day stays" readonly>
                            </div>
                          </div>

                          <div class="col-12">
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button> -->
                            <!-- <button type="submit" id="step_btn1" class="btn btn-primary">Submit</button> -->

                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn1" type="submit">Submit</button> -->
                            <a class="btn btn-primary btn-dark" onclick="stepper.next()">Next</a>
                          </div>
                        </div>

                        <!-- </form> -->
                        <!-- <button class="btn btn-primary btn-dark" onclick="stepper.next()">Next</button> -->
                      </div>

                      <div id="hotel-policy-part" class="content" role="tabpanel" aria-labelledby="hotel-policy-part-trigger">
                        <!-- <form method="POST" id="addHotelPolicy_form"> -->
                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

                        <div class="row">
                          <!--<div class="col-sm-6">
                                  <label>Booking Option</label>
                                  <div class="row">
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                          <label for="customCheckbox1" class="custom-control-label">Instant booking</label>
                                          </div>
                                          
                                      </div>
                                      </div>
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                          
                                          <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input" type="checkbox" id="customCheckbox2">
                                          <label for="customCheckbox2" class="custom-control-label">Approval based booking</label>
                                          </div>
                                      </div>
                                      </div>
                                  </div>
                              </div>-->

                          <div class="col-sm-6">
                            <label>Booking Option</label>
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="booking_option1" name="booking_option" value="1" @php if($hotel_info->booking_option == 1){echo 'checked';} @endphp>
                                    <label for="booking_option1" class="custom-control-label">Instant booking</label>
                                  </div>

                                </div>
                              </div>
                              <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">

                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" value="0" @php if($hotel_info->booking_option == 0){echo 'checked';} @endphp>
                                    <label for="booking_option2" class="custom-control-label">Approval based booking</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Locations</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter " value="{{(!empty($hotel_info->hotel_address) ? $hotel_info->hotel_address : '')}}" readonly>
                            </div>
                          </div>

                          <!-- <p>The geographic coordinate</p> -->

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Latitude</label>
                              <input type="text" class="form-control" name="hotel_latitude" id="hotel_latitude" placeholder="Enter " value="{{(!empty($hotel_info->hotel_latitude) ? $hotel_info->hotel_latitude : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Longitude</label>
                              <input type="text" class="form-control" name="hotel_longitude" id="hotel_longitude" placeholder="Enter " value="{{(!empty($hotel_info->hotel_longitude) ? $hotel_info->hotel_longitude : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="hotel_city" id="hotel_city" placeholder="Enter " value="{{(!empty($hotel_info->hotel_city) ? $hotel_info->hotel_city : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Neighborhood / Area</label>
                              <input type="text" class="form-control" name="neighb_area" id="neighb_area" placeholder="Enter Address" value="{{(!empty($hotel_info->neighb_area) ? $hotel_info->neighb_area : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Country</label>
                              <select class="form-control select2bs4" name="hotel_country" id="hotel_country" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Country</option> -->
                                @foreach ($countries as $cont)
                                <option value="{{ $cont->id }}" @php if($hotel_info->hotel_country == $cont->id){echo "selected";} @endphp >{{ $cont->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Atrractions</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="attraction_name" id="attraction_name" placeholder="Enter " value="{{(!empty($hotel_info->attraction_name) ? $hotel_info->attraction_name : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Content</label>
                              <input type="text" class="form-control" name="attraction_content" id="attraction_content" placeholder="Enter " value="{{(!empty($hotel_info->attraction_content) ? $hotel_info->attraction_content : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Distance</label>
                              <input type="text" class="form-control" name="attraction_distance" id="attraction_distance" placeholder="Enter " value="{{(!empty($hotel_info->attraction_distance) ? $hotel_info->attraction_distance : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" name="attraction_type" id="attraction_type" placeholder="Enter " value="{{(!empty($hotel_info->attraction_type) ? $hotel_info->attraction_type : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Pricing</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price ( min. Price of the Room )</label>
                              <input type="text" class="form-control" name="stay_price" id="stay_price" placeholder="Enter " value="{{(!empty($hotel_info->stay_price) ? $hotel_info->stay_price : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Extra price</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="extra_price_name" id="extra_price_name" placeholder="Enter " value="{{(!empty($hotel_info->extra_price_name) ? $hotel_info->extra_price_name : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price</label>
                              <input type="text" class="form-control" name="extra_price" id="extra_price" placeholder="Enter " value="{{(!empty($hotel_info->extra_price) ? $hotel_info->extra_price : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" name="extra_price_type" id="extra_price_type" placeholder="Enter " value="{{(!empty($hotel_info->extra_price_type) ? $hotel_info->extra_price_type : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Service fee</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="service_fee_name" id="service_fee_name" placeholder="Enter " value="{{(!empty($hotel_info->service_fee_name) ? $hotel_info->service_fee_name : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price</label>
                              <input type="text" class="form-control" name="service_fee" id="service_fee" placeholder="Enter " value="{{(!empty($hotel_info->service_fee) ? $hotel_info->service_fee : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" name="service_fee_type" id="service_fee_type" placeholder="Enter " value="{{(!empty($hotel_info->service_fee_type) ? $hotel_info->service_fee_type : '')}}" readonly>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Property Details</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Property Type</label>
                              <select class="form-control select2bs4" name="property_type" id="property_type" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Property Type</option> -->
                                @foreach ($properties as $prop)
                                <option value="{{ $prop->id }}" @php if($hotel_info->property_type == $prop->id){echo "selected";} @endphp >{{ $prop->stay_type }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>


                          <div class="col-12">
                            <!-- <button type="submit" id="step_btn2" class="btn btn-primary">Submit</button> -->
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn2" type="submit">Submit</button> -->
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <a class="btn btn-primary btn-dark" onclick="stepper.next()">Next</a>
                          </div>
                        </div>

                        <!-- </form> -->
                        <!-- <button class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</button>
                          <button class="btn btn-primary btn-dark" onclick="stepper.next()">Next</button> -->
                      </div>

                      <div id="facility-service-part" class="content" role="tabpanel" aria-labelledby="facility-service-part-trigger">
                        <!-- <form method="POST" id="addHotelFacilityService_form">
                          <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

                        <div class="row">
                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Facilities</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Room Amenities</label>
                              <select class="form-control select2bs4" multiple="multiple" name="entertain_service1[]" id="entertain_service1" data-placeholder="Select Room Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Room Amenities</option> -->
                                @php $entertain_service = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',1)->get(); @endphp
                                @foreach ($entertain_service as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->room_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Bathroom Amenities</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service2[]" id="extra_service2" data-placeholder="Select Bathroom Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',2)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->bathroom_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Media and Technology</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service3[]" id="extra_service3" data-placeholder="Select Media and Technology Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',3)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->media_tech_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Food & drink</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service4[]" id="extra_service4" data-placeholder="Select Food & drink Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',4)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->food_drink_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Outdoor and view</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service5[]" id="extra_service5" data-placeholder="Select Outdoor and view Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',5)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->outdoor_view_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Accessibility</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service6[]" id="extra_service6" data-placeholder="Select Accessibility Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',6)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->accessibility_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Entertainment and family services</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service7[]" id="extra_service7" data-placeholder="Select Entertainment and family services Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',7)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->entertain_family_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Services & extras</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service8[]" id="extra_service8" data-placeholder="Select Services & extras Amenities" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',8)->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->amenity_id }}" <?php if (in_array($value->amenity_id, json_decode($hotel_info->extra_service_amenities, true))) {
                                                                            echo 'selected';
                                                                          } ?>>{{ $value->amenity_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Services</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Entertainment and family services</label>
                              <select class="form-control select2bs4" multiple="multiple" name="entertain_service[]" id="entertain_service" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Select Entertainment and family services</option> -->
                                @php $entertain_service = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Entertainment_n_Family')->get(); @endphp
                                @foreach ($entertain_service as $value)
                                <option value="{{ $value->id }}" <?php if (in_array($value->id, json_decode($hotel_info->entertain_family_service, true))) {
                                                                    echo 'selected';
                                                                  } ?>>{{ $value->service_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Services & Extras</label>
                              <select class="form-control select2bs4" multiple="multiple" name="extra_service[]" id="extra_service" style="width: 100%;" disabled="disabled">
                                <!-- <option value="">Services & Extras</option> -->
                                @php
                                $leads = json_decode($hotel_info->extra_service, true);
                                @endphp
                                @php $extra_services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Services_n_Extras')->get(); @endphp
                                @foreach ($extra_services as $value)
                                <option value="{{ $value->id }}" <?php if (in_array($value->id, json_decode($hotel_info->extra_service, true))) {
                                                                    echo 'selected';
                                                                  } ?>>{{ $value->service_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn3" type="submit">Submit</button> -->
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn9" type="submit">Update</button> -->
                          </div>
                        </div>

                        <!-- </form> -->

                      </div>

                    </form>


                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div> -->
            </div>
            <!-- /.card -->
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