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


<script>
  $(".slide.one .button").click(function() {
    // alert('sdfsd');
    var form = $("#addTourContext_form");
    form.validate({
      rules: {
        hotelName: {
          required: true,
        },
        summernote: {
          required: true,
        },
        "hotelGallery[]": {
          required: true,
          extension: "jpg|jpeg|png",
          // filesize: 20971520, 
        },
        hotelVideo: {
          // required: true,
          accept: "video/*"
        },
        cat_listed_room_type: {
          required: true,
        },
        hotel_rating: {
          required: true,
        },
        contact_name: {
          required: true,
        },
        contact_num: {
          required: true,
          number: true,
        },
        alternate_num: {
          number: true,
        },
        scout_id: {
          required: true,
        },
        vendor_id: {
          required: true,
        },
        checkin_time: {
          required: true,
        },
        checkout_time: {
          required: true,
        },
        min_day_before_book: {
          required: true,
          number: true,
        },
        min_day_stays: {
          required: true,
          number: true,
        },
        hotel_latitude: {
          number: true,
        },
        hotel_longitude: {
          number: true,
        },
        tour_type: {
          required: true,
        },
        booking_contact: {
          required: true,
          number: true,
        },
        stay_price: {
          required: true,
          number: true,
        },
        extra_price: {
          number: true,
        },
        service_fee: {
          number: true,
        },
        property_type: {
          required: true,
        },

      }, 
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    if (form.valid() === true) {
      stepper.next();
      // alert( "Form successful submitted!" );
      $(".slide.one").removeClass("active");
      $(".slide.two").addClass("active");
    }
  });

  $(".slide.two .button").click(function() {
    var form = $("#addTourContext_form");
    form.validate({
      rules: {
        hotel_address: {
          required: true
        },
        hotel_city: {
          required: true
        }
      },
      messages: {
        hotel_address: {
          required: "Please enter a Hotel Name"
        },
        hotel_city: {
          required: "Please provide a Hotel Content",
        },
        // terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    if (form.valid() === true) {
      stepper.next();
      $(".slide.two").removeClass("active");
      $(".slide.three").addClass("active");
    }
  });

  $(".slide.three .button").click(function() {
    var form = $("#addTourContext_form");
    form.validate({
      rules: {
        hotelName: {
          required: true,
        },
        entertain_service2: {
          required: true,
        },
      },
    });
    if (form.valid() === true) {
      var site_url = $("#baseUrl").val(); 
      var formData = $(form).serialize(); 
      $('#step_btn1').prop('disabled', true); 
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/submitTour')}}",
        data: formData,
        success: function(response) {
          console.log(response);
          if (response.status == 'success') { 
            success_noti(response.msg); 
            setTimeout(function() {
              window.location.href = site_url + "/admin/tourList"
            }, 1000);
          } else {
            error_noti(response.msg);
          }

        }
      });
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
                                    <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" value="2" @php if($hotel_info->booking_option == 2){echo 'checked';} @endphp>
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

                          @foreach ($amenity_type as $value)
                          @php $amenity_count = DB::table('H2_Amenities')->where('amenity_type',$value->id)->count(); @endphp

                          @if($amenity_count > 0)
                          @php $amenities = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',$value->id)->get(); @endphp
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>{{$value->name}}</label>
                                  <select class="form-control select2bs4" multiple="multiple" name="amenity[]" id="amenity_{{$value->id}}" data-placeholder="Select Room Amenities" style="width: 100%;" disabled="disabled">
                                    <!-- <option value="">Select Room Amenities</option> -->
                                    @foreach ($amenities as $amenity)
                                    <option value="{{ $amenity->amenity_id }}" <?php if (in_array($amenity->amenity_id, $hotel_amenities)) { echo 'selected'; } ?>>{{ $amenity->amenity_name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          @endif

                          @endforeach

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Services</h4>
                              </p>
                            </div>
                          </div>

                          @foreach ($service_type as $value)
                          @php $hotel_services_count = DB::table('H3_Services')->where('service_type_id',$value->id)->count(); @endphp

                          @if($hotel_services_count > 0)
                          @php $services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type_id',$value->id)->get(); @endphp
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>{{$value->name}}</label>
                                  <select class="form-control select2bs4" multiple="multiple" name="services[]" id="service_{{$value->id}}" data-placeholder="Select {{$value->name}}" style="width: 100%;" disabled="disabled">
                                      <!-- <option value="">Select Room Amenities</option> -->

                                      @foreach ($services as $service)
                                      <option value="{{ $service->id }}" <?php if (in_array($service->id, $hotel_services)) { echo 'selected'; } ?>>{{ $service->service_name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          @endif

                          @endforeach

                          <!-- checking for the other option added start here -->

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Other</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="col-md-6">
                              <label>Is parking available to guests?</label>
                              <!-- <div class="row"> -->
                              <div class="form-group">
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="parking_option1" name="parking_option" value="1" @php if($hotel_info->parking_option == 1){echo 'checked';} @endphp>
                                  <label for="parking_option1" class="custom-control-label">Yes, free</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="parking_option2" name="parking_option" value="2" @php if($hotel_info->parking_option == 2){echo 'checked';} @endphp>
                                  <label for="parking_option2" class="custom-control-label">Yes, paid</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="parking_option3" name="parking_option" value="0" @php if($hotel_info->parking_option == 0){echo 'checked';} @endphp>
                                  <label for="parking_option3" class="custom-control-label">No</label>
                                </div>
                              </div>
                              <!-- </div> -->
                            </div>

                            <div class="<? if ($hotel_info->parking_option == 0) {
                                          echo 'd-none';
                                        } ?>" id="parking_free_div">
                              <div class="col-md-12 <? if ($hotel_info->parking_option != 2) {
                                                      echo 'd-none';
                                                    } ?>" id="parking_price_div">
                                <label>How much does parking cost?</label>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" name="parking_price" id="parking_price" placeholder="INR" value="{{(!empty($hotel_info->parking_price) ? $hotel_info->parking_price : '')}}" readonly>
                                      </div>
                                      <div class="col-md-6">
                                        <select class="custom-select" name="payment_interval" id="payment_interval">
                                          <option value="0" @php if($hotel_info->payment_interval == 0){echo 'checked';} @endphp>Per Hour</option>
                                          <option value="1" @php if($hotel_info->payment_interval == 1){echo 'checked';} @endphp>Per Day</option>
                                          <option value="2" @php if($hotel_info->payment_interval == 2){echo 'checked';} @endphp>Per Stay</option>
                                        </select>
                                      </div>
                                    </div>

                                  </div>
                                  <!-- <div class="form-group">
                                  <label>Select</label>
                                  <select class="custom-select" name="payment_interval" id="payment_interval">
                                    <option value="hour">Per Hour</option>
                                    <option value="day">Per Day</option>
                                    <option value="stay">Per Stay</option>
                                  </select>
                                </div> -->
                                </div>
                              </div>
                              <div class="col-md-12">
                                <label>Do they need to reserve a parking spot?</label>
                                <div class="row">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_reserv_need1" name="parking_reserv_need" value="1" @php if($hotel_info->parking_reserv_need == 1){echo 'checked';} @endphp>
                                      <label for="parking_reserv_need1" class="custom-control-label">Reservation needed</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_reserv_need2" name="parking_reserv_need" value="0" @php if($hotel_info->parking_reserv_need == 0){echo 'checked';} @endphp>
                                      <label for="parking_reserv_need2" class="custom-control-label">No reservation needed</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <label>Where is the parking located?</label>
                                <div class="row">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_locate1" name="parking_locate" value="1" @php if($hotel_info->parking_locate == 1){echo 'checked';} @endphp>
                                      <label for="parking_locate1" class="custom-control-label">On site</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_locate2" name="parking_locate" value="0" @php if($hotel_info->parking_locate == 0){echo 'checked';} @endphp>
                                      <label for="parking_locate2" class="custom-control-label">Off site</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <label>What type of parking is it?</label>
                                <div class="row">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_type1" name="parking_type" value="1" @php if($hotel_info->parking_type == 1){echo 'checked';} @endphp>
                                      <label for="parking_type1" class="custom-control-label">Private</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="parking_type2" name="parking_type" value="0" @php if($hotel_info->parking_type == 0){echo 'checked';} @endphp>
                                      <label for="parking_type2" class="custom-control-label">Public</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Breakfast</h4>
                              </p>
                            </div>
                          </div> -->

                          <div class="col-md-12">
                            <div class="col-sm-6">
                              <label>Is breakfast available to guests?</label>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="breakfast_availability1" name="breakfast_availability" value="1" @php if($hotel_info->breakfast_availability == 1){echo 'checked';} @endphp>
                                      <label for="breakfast_availability1" class="custom-control-label">Yes</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="breakfast_availability2" name="breakfast_availability" value="0" @php if($hotel_info->breakfast_availability == 0){echo 'checked';} @endphp>
                                      <label for="breakfast_availability2" class="custom-control-label">No</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6 <? if ($hotel_info->breakfast_availability == 0) {
                                                    echo 'd-none';
                                                  } ?>" id="breakfast_price_inclusion_div">
                              <label>Is breakfast included in the price ?</label>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="breakfast_price_inclusion1" name="breakfast_price_inclusion" value="0" @php if($hotel_info->breakfast_price_inclusion == 0){echo 'checked';} @endphp>
                                      <label for="breakfast_price_inclusion1" class="custom-control-label">Yes, it's included in the price</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="breakfast_price_inclusion2" name="breakfast_price_inclusion" value="1" @php if($hotel_info->breakfast_price_inclusion == 1){echo 'checked';} @endphp>
                                      <label for="breakfast_price_inclusion2" class="custom-control-label">No, it's optional</label>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm-6 <? if ($hotel_info->breakfast_price_inclusion == 0) {
                                                        echo 'd-none';
                                                      } ?>" id="breakfast_cost_div">
                                  <div class="form-group">
                                    <!-- <label>Select all that apply</label> -->
                                    <label>Breakfast Price</label>
                                    <input type="text" class="form-control" name="breakfast_cost" id="breakfast_cost" placeholder="Price" value="{{(!empty($hotel_info->breakfast_cost) ? $hotel_info->breakfast_cost : '')}}" readonly>
                                  </div>
                                </div>

                                <div class="col-sm-12 <? if ($hotel_info->breakfast_availability == 0) {
                                                        echo 'd-none';
                                                      } ?>" id="breakfast_price_type_div">
                                  <div class="form-group">
                                    <!-- <label>Select all that apply</label> -->
                                    <label>What kind of breakfast is available?</label>
                                    <select class="form-control select2bs4" multiple="multiple" name="breakfast_type[]" id="breakfast_type" style="width: 100%;">
                                      <!-- <option value="">Select Entertainment and family services</option> -->
                                      @php $breakfast_type = DB::table('breakfast_type')->orderby('bfast_id', 'ASC')->get(); @endphp
                                      @foreach ($breakfast_type as $value)
                                      <option value="{{ $value->bfast_id }}">{{ $value->name }}</option>
                                      @endforeach

                                    </select>
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>

                          <!-- checking for the other option added end here -->

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