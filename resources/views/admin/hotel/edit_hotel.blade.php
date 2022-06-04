@extends('admin.layout.layout')
@section('title', 'User - Profile')

@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
  }
</style>
<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('current_page_js')
<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
  $('#checkin_time').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
  $('#checkout_time').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
</script>

<script>
  $("#addHotelContext_form").validate({
    debug: false,
    rules: {
      hotelName: {
        required: true,
      },
      summernote: {
        required: true,
      },
    },
    submitHandler: function(form) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/submitHotel')}}",
        data: formData,
        success: function(response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            setTimeout(function() {
              window.location.reload()
            }, 1000);
            // setTimeout(function(){window.location.href=site_url+"/admin/hotelAmenity_list"},1000);
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
          <h1>Edit Hotel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Hotel</li>
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

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <!-- <div class="card"> -->
            <div class="card-header d-flex p-0">
              <!-- <h3 class="card-title p-3">Tabs</h3> -->
              <ul class="nav nav-pills p-2">
                <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Hotel</a></li>
                <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Hotel Policy</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Atrractions</a></li> -->
              </ul>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- <div class="tab-pane active" id="tab_1"> -->
                  <div class="tab-pane" id="tab_1">
                  <!-- <div class="card-header d-flex p-0">
                      <b class="card-title p-3">Hotel Context</b>
                    </div> -->
                  <div class="card-body">

                    <form method="POST" id="updateHotelContext_form">
                      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
                      <input type="hidden" name="user_id" id="user_id" value="{{(!empty($hotel_info->id) ? $hotel_info->id : '')}}" />

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
                            <input type="text" class="form-control" name="hotelName" id="hotelName" placeholder="Enter Name" value="{{(!empty($hotel_info->hotel_name) ? $hotel_info->hotel_name : '')}}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Hotel Content</label>
                            <textarea id="summernote" name="summernote" name="hotel_content"> {{(!empty($hotel_info-> hotel_content) ? $hotel_info-> hotel_content : '')}}
                            <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->
                            </textarea>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="customFile">Hotel Video</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="hotelVideo" id="hotelVideo">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              
                              @if((!empty($hotel_info->hotel_video)))
                                <video class="mt-2" width="200" height="150" controls>
                                  <source src="{{url('/')}}/public/uploads/hotel_video/{{$hotel_info->hotel_video}}" type="video/mp4">
                                </video>
                              @endif

                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="customFile">Hotel Gallery</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="hotelGallery" name="hotelGallery">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              <img class="mt-2" style="width: 200px; height: 150px;" src="{{url('/')}}/public/uploads/hotel_gallery/{{$hotel_info->hotel_gallery}}">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Category and Listed In/Room Type</label>
                            <select class="form-control select2bs4" name="cat_listed_room_type" id="cat_listed_room_type" style="width: 100%;">
                              <option value="">Select Category and Listed In/Room Type</option>
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
                            <select class="form-control" name="hotel_rating" id="hotel_rating">
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
                            <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{(!empty($hotel_info->property_contact_name) ? $hotel_info->property_contact_name : '')}}" placeholder="Enter Contact Name">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Number</label>
                            <input type="number" class="form-control" name="contact_num" id="contact_num" value="{{(!empty($hotel_info->property_contact_num) ? $hotel_info->property_contact_num : '')}}" placeholder="Enter Contact Number">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Alternate Number</label>
                            <input type="number" class="form-control" name="alternate_num" id="alternate_num" value="{{(!empty($hotel_info->property_alternate_num) ? $hotel_info->property_alternate_num : '')}}" placeholder="Enter Alternate Number">
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
                              <input type="file" class="custom-file-input" name="hotel_document" id="hotel_document">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              @if((!empty($hotel_info->hotel_video)))
                                <a href="{{ url('public/uploads/hotel_document') }}/{{ $hotel_info->hotel_document }}" download>{{ $hotel_info->hotel_document }}</a>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="customFile">Hotel Notes</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="hotel_notes" name="hotel_notes">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              @if((!empty($hotel_info->hotel_video)))
                                <a href="{{ url('public/uploads/hotel_notes') }}/{{ $hotel_info->hotel_notes }}" download>{{ $hotel_info->hotel_notes }}</a>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Scouts ID</label>
                            <input type="text" class="form-control" name="scout_id" id="scout_id" value="{{(!empty($hotel_info->scout_id) ? $hotel_info->scout_id : '')}}" placeholder="Enter Scouts ID">
                          </div>
                        </div>

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
                            <input type="text" class="form-control" id="checkin_time" name="checkin_time" value="{{(!empty($hotel_info->checkin_time) ? $hotel_info->checkin_time : '')}}">
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                          <!-- </div> -->
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Time for Check out</label>
                            <input type="text" class="form-control" name="checkout_time" id="checkout_time" value="{{(!empty($hotel_info->checkout_time) ? $hotel_info->checkout_time : '')}}">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Min day before booking</label>
                            <input type="text" class="form-control" name="min_day_before_book" id="min_d_before_book" value="{{(!empty($hotel_info->min_day_before_book) ? $hotel_info->min_day_before_book : '')}}" placeholder="Enter Min day before booking">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Min day stays</label>
                            <input type="text" class="form-control" name="min_day_stays" id="min_day_stays" value="{{(!empty($hotel_info->min_day_stays) ? $hotel_info->min_day_stays : '')}}" placeholder="Enter Min day stays">
                          </div>
                        </div>



                        <div class="col-12">
                          <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
                        </div>
                      </div>

                    </form>


                  </div>
                </div>
                <!-- /.tab-pane -->
                <!-- <div class="tab-pane" id="tab_2"> -->
                  <div class="tab-pane active" id="tab_2">
                  <div class="card-body">

                    <form method="POST" id="customerAdmin_form">

                      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />

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
                                  <input class="custom-control-input" type="radio" id="booking_option1" name="booking_option">
                                  <label for="booking_option1" class="custom-control-label">Instant booking</label>
                                </div>

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- radio -->
                              <div class="form-group">

                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" checked>
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

                            <label>Location</label>

                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter ">

                          </div>

                        </div>



                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Address</label>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter ">

                          </div>

                        </div>

                        <!-- <p>The geographic coordinate</p> -->

                        <div class="col-md-3">

                          <div class="form-group">

                            <label>Latitute</label>

                            <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Enter ">

                          </div>

                        </div>



                        <div class="col-md-3">

                          <div class="form-group">

                            <label>Longitude</label>

                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter ">

                          </div>

                        </div>



                        <div class="col-md-6">

                          <div class="form-group">

                            <label>City</label>

                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter ">

                          </div>

                        </div>



                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Neighborhood / Area</label>

                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Country</label>

                            <select class="form-control select2bs4" name="user_country" id="user_country" style="width: 100%;">

                              <option value="">Select Country</option>

                              @foreach ($countries as $cont)

                              <option value="{{ $cont->id }}">{{ $cont->name }}</option>

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

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Content</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Distance</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Type</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

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

                            <label>Price</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

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

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Price</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Type</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

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

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Price</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">

                            <label>Type</label>

                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter ">

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
                            <select class="form-control select2bs4" name="user_country" id="user_country" style="width: 100%;">
                              <option value="">Select Property Type</option>
                              @foreach ($properties as $prop)
                              <option value="{{ $prop->id }}">{{ $prop->stay_type }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

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
                            <select class="select2bs4" multiple="multiple" name="entertain_service1" id="entertain_service1" data-placeholder="Select Room Amenities" style="width: 100%;">
                              <!-- <option value="">Select Room Amenities</option> -->
                              @php $entertain_service = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',1)->get(); @endphp
                              @foreach ($entertain_service as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Bathroom Amenities</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service2" id="extra_service2" data-placeholder="Select Bathroom Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',2)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Media and Technology</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service3" id="extra_service3" data-placeholder="Select Media and Technology Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',3)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Food & drink</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service4" id="extra_service4" data-placeholder="Select Food & drink Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',4)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Outdoor and view</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service5" id="extra_service5" data-placeholder="Select Outdoor and view Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',5)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Accessibility</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service6" id="extra_service6" data-placeholder="Select Accessibility Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',6)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Entertainment and family services</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service7" id="extra_service7" data-placeholder="Select Entertainment and family services Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',7)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Services & extras</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service8" id="extra_service8" data-placeholder="Select Services & extras Amenities" style="width: 100%;">
                              <!-- <option value="">Services & Extras</option> -->
                              @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',8)->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
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
                            <select class="form-control select2bs4" multiple="multiple" name="entertain_service" id="entertain_service" data-placeholder="Select Entertainment and family services" style="width: 100%;">
                              <option value="">Select Entertainment and family services</option>
                              @php $entertain_service = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Entertainment_n_Family')->get(); @endphp
                              @foreach ($entertain_service as $value)
                              <option value="{{ $value->id }}">{{ $value->service_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Services & Extras</label>
                            <select class="form-control select2bs4" multiple="multiple" name="extra_service" id="extra_service" data-placeholder="Select Services & Extras" style="width: 100%;">
                              <option value="">Services & Extras</option>
                              @php $extra_services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Services_n_Extras')->get(); @endphp
                              @foreach ($extra_services as $value)
                              <option value="{{ $value->id }}">{{ $value->service_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-12">
                          <button class="btn btn-primary btn-dark float-right" name="submit" type="submit" disabled>Submit</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.card-header -->
        <!-- <div class="card-footer">
        </div> -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection