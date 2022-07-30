@extends('vendor.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
  .active .bs-stepper-circle {
    background-color: #126c62 !important;
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
<style>
  .card {
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    margin-bottom: 1rem;
    padding: 0 0.5rem;
  }
</style>
<style>
  /*.container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
  }*/
</style>
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bootstrap 4 -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->
<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">
<!-- BS Stepper -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/bs-stepper/css/bs-stepper.min.css')}}"> -->
<!-- summernote -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}"> -->
@endsection

@section('current_page_js')

<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- BS-Stepper -->
<!-- <script src="{{ asset('resources/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script> -->
<!-- Summernote -->
<!-- <script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<!-- Multi-form -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- <script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script> -->


<script>
  // $(function() {
  //   // Summernote
  //   $('#summernote').summernote()
  // })
</script>
<script>
  // BS-Stepper Init
  // document.addEventListener('DOMContentLoaded', function() {
  //   window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  // })
  $(document).ready(function() {
    // Select2 Multiple
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>

@endsection

@section('content')


<div class="row d-flex flex-wrap p-3">


  <div class="row add_m01">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="col-md-12 mb-0" style="padding-bottom:0px; padding-top:10px">
          <!-- <div class="tab-custom-content mt-0"> -->
          <!-- <p class="lead mb-0"> -->
          <h4>Space</h4>
          <!-- </p> -->
          <!-- </div> -->
        </div>
        <div class="card-body">

          <form method="POST" id="addSpaceVendor_form" enctype="multipart/form-data">

            @csrf
            <div class="row">

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Description</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">

                <div class="form-group">

                  <label>Space name</label>

                  <input type="text" class="form-control" name="space_name" placeholder="Enter Space Name" value="{{ $space_data->space_name ?? '' }}" readonly="">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Category</label>

                  <select class="form-control select2bs4" name="category_id" id="category_id" style="width: 100%;" disabled>

                    <option value="">Select Category</option>

                    @foreach ($space_categories as $cat)

                    <option value="{{ $cat->scat_id }}" {{ $cat->scat_id == $space_data->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>

                    @endforeach

                  </select>

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Listed In/Room Type</label>

                  <select class="form-control select2bs4" name="sub_category_id" id="sub_category_id" style="width: 100%;" disabled>

                    <option value="">Select Room Type</option>

                    @foreach ($space_sub_categories as $cont)

                    <option value="{{ $cont->sub_cat_id }}" {{ $cont->sub_cat_id == $space_data->sub_category_id ? 'selected': '' }}>{{ $cont->sub_category_name }}</option>

                    @endforeach

                  </select>

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Guest Number</label>

                  <input type="text" class="form-control" name="guest_number" id="guest_number" placeholder="Enter guest number" required value="{{ $space_data->guest_number ?? '' }}" readonly>

                </div>

              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Property Description</label>
                  <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                  <textarea class="form-control" id="summernoteRemoved" name="description" readonly>{{ $space_data->description ?? '' }}</textarea>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Private Notes</label>
                  <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                  <textarea class="form-control" id="summernote1Removed" name="notes" readonly>{{ $space_data->notes ?? '' }}</textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Document</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="space_document" id="space_document" disabled>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Scouts ID</label>
                  <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;" disabled>
                    <option value="">Select Scouts</option>
                    @php @endphp
                    @foreach ($scouts as $value)
                    <option value="{{ $value->id }}" {{ $value->id == $space_data->scout_id ? 'selected': '' }}>{{ $value->first_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Policy</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">
                <label>Reservation/Payment mode</label>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="payment_mode1" name="payment_mode" disabled value="1" @php if($space_data->payment_mode == 1){echo 'checked';} @endphp>
                        <label for="payment_mode1" class="custom-control-label">Pay now 100%</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="payment_mode2" name="payment_mode" disabled value="2" @php if($space_data->payment_mode == 2){echo 'checked';} @endphp>
                        <label for="payment_mode2" class="custom-control-label">Partial Payment (30% Online & 70% at Desk )</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="payment_mode3" name="payment_mode" disabled value="0" @php if($space_data->payment_mode == 0){echo 'checked';} @endphp>
                        <label for="payment_mode3" class="custom-control-label">Pay at Hotel 100%</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-sm-6">
                  <label>Booking Option</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="booking_option1" name="booking_option" disabled value="1" @php if($space_data->booking_option == 1){echo 'checked';} @endphp>
                          <label for="booking_option1" class="custom-control-label">Instant booking</label>
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">

                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" disabled value="2" @php if($space_data->booking_option == 2){echo 'checked';} @endphp>
                          <label for="booking_option2" class="custom-control-label">Approval based booking</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-sm-6">
                  <label>Reservation Change</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="reserv_date_change_allow1" name="reserv_date_change_allow" disabled value="1" @php if($space_data->reserv_date_change_allow == 1){echo 'checked';} @endphp>
                          <label for="reserv_date_change_allow1" class="custom-control-label">Date Change Allowed</label>
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="reserv_date_change_allow2" name="reserv_date_change_allow" disabled value="0" @php if($space_data->reserv_date_change_allow == 0){echo 'checked';} @endphp>
                          <label for="reserv_date_change_allow2" class="custom-control-label">Date Change not Allowed</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Listing Price</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Price per night</label>
                      <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night" value="{{ $space_data->price_per_night ?? '' }}" readonly>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Taxes in % (included in the price)</label>
                  <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Enter Taxes in %" value="{{$space_data->tax_percentage}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price per night 7 days</label>
                  <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days." value="{{$space_data->price_per_night_7d}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price per night 30 days</label>
                  <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days." value="{{$space_data->price_per_night_30d}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cleaning Fee in PKR</label>
                      <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee." value="{{$space_data->cleaning_fee}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cleaning Fee type</label>
                      <select class="form-control select2bs4" name="cleaning_fee_type" id="cleaning_fee_type" style="width: 100%;" disabled>
                        <option value="">Select Cleaning Fee type</option>
                        <option value="single_fee" {{ $space_data->cleaning_fee_type == "single_fee" ? 'selected' : '' }}>Single fee</option>
                        <option value="per_night" {{ $space_data->cleaning_fee_type == "per_night" ? 'selected' : '' }}>Per night</option>
                        <option value="per_guest" {{ $space_data->cleaning_fee_type == "per_guest" ? 'selected' : '' }}>Per guest</option>
                        <option value="per_night_per_guest" {{ $space_data->cleaning_fee_type == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City fee</label>
                      <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city_fee." value="{{$space_data->city_fee}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City Fee type</label>
                      <select class="form-control select2bs4" name="city_fee_type" id="city_fee_type" style="width: 100%;" disabled>
                        <option value="">Select City Fee type</option>
                        <option value="single_fee" {{ $space_data->city_fee_type == "single_fee" ? 'selected' : '' }}>Single fee</option>
                        <option value="per_night" {{ $space_data->city_fee_type == "per_night" ? 'selected' : '' }}>Per night</option>
                        <option value="per_guest" {{ $space_data->city_fee_type == "per_guest" ? 'selected' : '' }}>Per guest</option>
                        <option value="per_night_per_guest" {{ $space_data->city_fee_type == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Security Deposit</label>
                  <input type="text" class="form-control" name="security_deposite" id="security_deposite" placeholder="Enter security deposite" value="{{ $space_data->security_deposite ?? '' }}" readonly>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Earlybird Discount - in % from the price per night</label>
                      <input type="text" class="form-control" name="earlybird_discount" id="earlybird_discount" placeholder="Enter discount in %." value="{{$space_data->earlybird_discount}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Minimum number of days in advance</label>
                      <input type="text" class="form-control" name="min_days_in_advance" id="min_days_inadvance" placeholder="Enter Minimum No of days." value="{{$space_data->min_days_in_advance}}" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <label>Allow Guest in Room ?</label>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="icheck-success d-inline">
                            <input type="radio" id="allow_guest_in_room1" name="is_guest_allow" disabled value="1" @php if($space_data->is_guest_allow == 1){echo 'checked';} @endphp>
                            <label for="allow_guest_in_room1">Yes</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="icheck-danger d-inline">
                            <input type="radio" id="allow_guest_in_room2" name="is_guest_allow" disabled value="0" @php if($space_data->is_guest_allow == 0){echo 'checked';} @endphp>
                            <label for="allow_guest_in_room2">No</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 <? if ($space_data->is_guest_allow == 0) {
                                          echo 'd-none';
                                        } ?>" id="allow_guest_price_div">
                    <div class="form-group">
                      <label>Extra guest per night</label>
                      <input type="text" class="form-control" name="extra_guest_per_night" disabled id="extra_guest_per_night" placeholder="Enter extra guest per night." value="{{$space_data->extra_guest_per_night}}">
                    </div>
                  </div>
                  <div class="col-md-4 <? if ($space_data->is_guest_allow == 0) {
                                          echo 'd-none';
                                        } ?>" id="allow_guest_cap_div">
                    <div class="form-group">
                      <label>Please Check if Allow Above Capacity yes </label>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="is_above_guest_cap" id="checkboxSuccess1" disabled value="1" <? if ($space_data->is_above_guest_cap == 1) {
                                                                                                                    echo 'checked';
                                                                                                                  } ?>>
                        <label for="checkboxSuccess1">Allow guests above capacity?</label>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
              <div class="col-md-12 <? if ($space_data->is_guest_allow == 0) {
                                      echo 'd-none';
                                    } ?>" id="pay_by_no_guest_div">
                <div class="form-group">
                  <!-- <label>Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only) </label> -->
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="is_pay_by_num_guest" id="checkboxSuccess2" disabled value="1" <? if ($space_data->is_pay_by_num_guest == 1) {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>
                    <label for="checkboxSuccess2">Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only)</label>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Extra Option</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-12 field_wrapper">
                <div class="form-group" id="extra">
                  <label>Extra</label>

                  @if(count($space_extra_option) > 0)

                  @foreach ($space_extra_option as $key=>$value)

                  <div class="row form-group">
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="extra[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->ext_opt_name }}" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="extra[@php echo $key; @endphp][price]" placeholder="Enter Price" value="{{ $value->ext_opt_price }}" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-group">
                        <select class="form-control select2bs4" name="extra[@php echo $key; @endphp][type]" style="width: 100%;" disabled>
                          <option value="">Select Price type</option>
                          <option value="single_fee" {{ $value->ext_opt_type == "single_fee" ? 'selected' : '' }}>Single fee</option>
                          <option value="per_night" {{ $value->ext_opt_type == "per_night" ? 'selected' : '' }}>Per night</option>
                          <option value="per_guest" {{ $value->ext_opt_type == "per_guest" ? 'selected' : '' }}>Per guest</option>
                          <option value="per_night_per_guest" {{ $value->ext_opt_type == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>
                        </select>
                      </div>
                    </div>
                    @if($key == 0)
                    <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                    @else
                    <span><a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></span>
                    @endif
                  </div>

                  @endforeach

                  @else

                  <div class="row form-group">
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="extra[0][name]" placeholder="Enter Name" value="" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="extra[0][price]" placeholder="Enter Price" value="" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-group">
                        <select class="form-control select2bs4" name="extra[0][type]" style="width: 100%;" disabled>
                          <option value="">Select Price type</option>
                          <option value="single_fee">Single fee</option>
                          <option value="per_night">Per night</option>
                          <option value="per_guest">Per guest</option>
                          <option value="per_night_per_guest">Per night per guest</option>
                        </select>
                      </div>
                    </div>
                    <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                  </div>

                  @endif


                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Listing Media</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="field" align="left">
                    <label>Upload room featured images</label>
                    <input type="file" id="spaceFeaturedImg" name="spaceFeaturedImg" / disabled>
                  </div>
                </div>
              </div>

              @if((!empty($space_data->image)))
              <div class="col-md-12">
                <div class="d-flex flex-wrap">
                  <div class="image-gridiv">
                    <img src="{{url('public/uploads/space_images/')}}/{{$space_data->image}}">
                  </div>
                </div>
              </div>
              @endif

              <div class="col-md-12">
                <div class="form-group">
                  <div class="field" align="left">
                    <label>Upload room gallery</label>
                    <input type="file" id="files" name="imgupload[]" multiple disabled>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="d-flex flex-wrap">
                  @foreach($space_images as $image)
                  <div class="image-gridiv">
                    <span class="pip" id="remove_img_{{$image->id}}">
                      <img class="imageThumb" src="{{url('public/uploads/space_images/')}}/{{$image->image}}">
                      <!-- <br /><span class="removeImage" id="@php echo $image->id; @endphp">Remove image</span></span> -->
                  </div>
                  @endforeach
                </div>
              </div>


              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Listing Details</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Size in ft2</label>
                  <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2." value="{{$space_data->room_size}}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Rooms</label>
                  <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Enter Rooms" value="{{ $space_data->room_number ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bedrooms</label>
                  <input type="text" class="form-control" name="bedroom_number" id="bedroom_number" placeholder="Enter Bedrooms" value="{{ $space_data->bedroom_number ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bathrooms</label>
                  <input type="text" class="form-control" name="bathroom_number" id="bathroom_number" placeholder="Enter Bathrooms" value="{{ $space_data->bathroom_number ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Check-in hour (*text)</label>
                  <input type="text" class="form-control" name="checkin_hr" id="checkin_hr" placeholder="Enter Check-in hour" value="{{ $space_data->checkin_hr ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Check-Out hour (*text)</label>
                  <input type="text" class="form-control" name="checkout_hr" id="checkout_hr" placeholder="Enter Check-Out hour" value="{{ $space_data->checkout_hr ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Late Check-in (*text)</label>
                  <input type="text" class="form-control" name="late_checkin" id="late_checkin" placeholder="Enter Late Check-in" value="{{ $space_data->late_checkin ?? '' }}" readonly>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>BedRoom type</label>
                  <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;" disabled>
                    <option value="">Select Bed type</option>
                    <option value="Single bed" {{ $space_data->bed_type == "Single bed" ? 'selected' : '' }}>Single bed</option>
                    <option value="Double bed" {{ $space_data->bed_type == "Double bed" ? 'selected' : '' }}>Double bed</option>
                    <option value="Bunk bed" {{ $space_data->bed_type == "Bunk bed" ? 'selected' : '' }}>Bunk bed</option>
                    <option value="Sofa" {{ $space_data->bed_type == "Sofa" ? 'selected' : '' }}>Sofa</option>
                    <option value="Futon Mat" {{ $space_data->bed_type == "Futon Mat" ? 'selected' : '' }}>Futon Mat</option>
                    <option value="Extra-Large double bed (Super - King size)" {{ $space_data->bed_type == "Extra-Large double bed (Super - King size)" ? 'selected' : '' }}>Extra-Large double bed (Super - King size)</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Private bathroom</label>
                  <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;" disabled>
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->private_bathroom == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->private_bathroom == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Private entrance</label>
                  <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;" disabled>
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->private_entrance == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->private_entrance == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Optional services</label>
                  <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services" value="{{$space_data->optional_services}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Family friendly</label>
                  <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;" disabled>
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->family_friendly == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->family_friendly == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Outdoor facilities</label>
                  <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities." value="{{$space_data->outdoor_facilities}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Extra people</label>
                  <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people." value="{{$space_data->extra_people}}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Cancellation (*text)</label>
                  <input type="text" class="form-control" name="cancellation" id="cancellation" placeholder="Enter Cancellation" value="{{ $space_data->cancellation ?? '' }}" readonly>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Custom Details</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-12 field_wrapper_custom">
                <div class="form-group" id="custom_div">
                  <label>Extra Details</label>
                  @if(count($space_custom_details) > 0)

                  @foreach ($space_custom_details as $key=>$value)
                  <div class="row form-group">
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[@php echo $key; @endphp][label]" placeholder="Enter Name" value="{{ $value->custom_label }}" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[@php echo $key; @endphp][quantity]" placeholder="Enter Quantity" value="{{ $value->custom_quantity }}" / readonly>
                    </div>
                    @if($key == 0)
                    <span><a href="javascript:void(0);" class="add_custom_button" title="Add field">Add</a></span>
                    @else
                    <span><a href="javascript:void(0);" class="remove_custom_button" title="Remove field">Remove</a></span>
                    @endif
                  </div>
                  @endforeach

                  @else
                  <div class="row form-group">
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[0][label]" placeholder="Enter Name" value="" / readonly>
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[0][quantity]" placeholder="Enter Quantity" value="" / readonly>
                    </div>
                    <span><a href="javascript:void(0);" class="add_custom_button" title="Add field">Add</a></span>
                  </div>
                  @endif
                </div>
              </div>

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Listing Location Details</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="space_address" id="space_address" placeholder="Enter Address" required="required" value="{{ $space_data->space_address ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required value="{{ $space_data->city ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Neighborhood / Area</label>
                  <input type="text" class="form-control" name="neighbor_area" id="neighbor_area" placeholder="Enter Neighborhood / Area." value="{{ $space_data->neighbor_area ?? '' }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control select2bs4" name="space_country" id="space_country" style="width: 100%;" required="required" disabled>
                    <!-- <option value="">Select Country</option> -->
                    @foreach ($countries as $cont)
                    <option value="{{ $cont->id }}" {{ $cont->id == $space_data->space_country ? 'selected': '' }}>{{ $cont->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $space_data->zip_code ?? '' }}" readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province" value="{{ $space_data->province ?? '' }}" readonly>
                </div>
              </div>

              <!-- <div class="col-md-12">
                <h7>Google Map</h7>
                  <div id="map" style="position: initial !important;">
                  </div>
              </div> -->

              <!-- <p>The geographic coordinate</p> -->

              <div class="col-md-3">
                <div class="form-group">
                  <label>Latitude</label>
                  <input type="text" class="form-control" name="space_latitude" id="space_latitude" placeholder="Enter " value="{{ $space_data->space_latitude ?? '' }}" readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Longitude</label>
                  <input type="text" class="form-control" name="space_longitude" id="space_longitude" placeholder="Enter " value="{{ $space_data->space_longitude }}" readonly>
                </div>
              </div>

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Other Features</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Other Features</label>
                  <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;" disabled>
                    <!-- <option value="">Services & Extras</option> -->
                    @php @endphp
                    @foreach ($space_other_features as $value)
                    <option value="{{ $value->space_feature_id }}" <?php if (in_array($value->space_feature_id, $space_features)) {
                                                                      echo 'selected';
                                                                    } ?>>{{ $value->space_feature_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-12">

                <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn1" type="submit" disabled>Update</button> -->

              </div>

            </div>

          </form>
          <!-- /.row -->

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- End #main -->
@endsection