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
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
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
<!-- Multi-form -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function() {
              $(this).parent(".pip").remove();
            });
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });

  $("#room_type").change(function() {
    var room_type_id = this.value;
    $("#room_name-dropdown").html('<option value="">Select room</option>');
    $.ajax({
      url: "{{ url('servicepro/room_name') }}",
      method: 'POST',
      data: {
        room_type_id: room_type_id,
        _token: '{{csrf_token()}}'
      },
      dataType: 'json',
      success: function(data) {
        $.each(data.room_name_list, function(key, value) {
          $("#room_name-dropdown").append('<option value="' + value.room_name + '">' + value.room_name + '</option>');
        });
      }
    });
  });
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
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
  })
</script>
<script>
  $("#allow_guest_in_room1").click(function() {
    $("#allow_guest_price_div").removeClass('d-none');
    $("#allow_guest_cap_div").removeClass('d-none');
    $("#pay_by_no_guest_div").removeClass('d-none');
  });

  $("#allow_guest_in_room2").click(function() {
    $("#allow_guest_price_div").addClass('d-none');
    $("#allow_guest_cap_div").addClass('d-none');
    $("#pay_by_no_guest_div").addClass('d-none');
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var x = 0;

    $(addButton).click(function() {
      if (x < maxField) {
        x++;
        $(wrapper).append('<div class="form-group"><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][type]" placeholder="Enter Type" value="" /></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
      }
    });

    $(wrapper).on('click', '.remove_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
  });
</script>

<script>
  $('#step_btn1').click(function() {
    $("#updateRoom_form").validate({
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
          url: "{{url('/servicepro/updateRoom')}}",
          data: formData,
          success: function(response) {
            // console.log(response);
            if (response.status == 'success') {
              // $("#register_form")[0].reset();
              success_noti(response.msg);
              setTimeout(function() {
                window.location.reload()
              }, 1000);
              // setTimeout(function(){window.location.href=site_url+"/servicepro/viewHotelRooms/"+response.hotel_id},1000);
            } else {
              error_noti(response.msg);
            }

          }
        });
        // event.preventDefault();
      }
    });
  });
</script>


@endsection

@section('content')
<main id="main">
  <section class="user-section" style="padding-top: 54px; background-color: #f6f6f6;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 pr-0">
          <div class="sidebar left ">
            <ul class="list-sidebar bg-defoult">
              <div class="vend-stays"> Road N Stays</div>
              <li> <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed active"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="hotels">
                  <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i class='bx bx-space-bar'></i> <span class="nav-label"> Private space </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="dashboard">
                  <li class="active"><a href="#"><i class='bx bx-chevron-left'></i>Add Private Space</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> List showing Privat space</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> Booking parivat space</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i class='bx bx-car'></i> <span class="nav-label">Tour Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                <ul class="sub-menu collapse" id="products">
                  <li class="active"><a href="#"> <i class='bx bx-chevron-left'></i> Add tour packages List</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> List showing tour packages</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                  <li><a href="#"><i class='bx bx-chevron-left'></i> Typography</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class='bx bx-calendar-event'></i> <span class="nav-label">Event Management </span><i class='bx bx-chevron-right pull-r'></i></a>
                <ul class="sub-menu collapse" id="tables">
                  <li><a href=""><i class='bx bx-chevron-left'></i> Static Tables</a></li>
                  <li><a href=""><i class='bx bx-chevron-left'></i> Data Tables</a></li>
                  <li><a href=""><i class='bx bx-chevron-left'></i> Foo Tables</a></li>
                  <li><a href=""><i class='bx bx-chevron-left'></i> jqGrid</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><i class='bx bx-chevron-right pull-r'></i></a>
                <ul class="sub-menu collapse" id="e-commerce">
                  <li><a href=""><i class='bx bx-chevron-left'></i> Products grid</a></li>
                  <li><a href=""><i class='bx bx-chevron-left'></i> Products list</a></li>
                  <li><a href=""><i class='bx bx-chevron-left'></i> Product edit</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#sidebar_bar').click(function() {
                $('.sidebar').toggleClass('fliph');
              });
            });
          </script>
        </div>

        <div class="col-md-9 pl-0">
          <div class="">
            <header id="header-vendor" class="fixed-top-vendor">
              <div class="container d-flex align-items-center justify-content-between">
                <h3 class="dashbord-text"> Dashboard</h3>
                <nav class=" vendor-nav d-lg-block">
                  <ul>
                    <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                    </li>
                    <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                    <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                      <ul>
                        <li><a href="{{ url('/servicepro/profile') }}">View profile</a></li>
                        <li><a href="#">Drop Down </a></li>
                        <li><a href="#">Drop Down 3</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </header>

            <div class="row d-flex flex-wrap p-3">


              <div class="row">
                <div class="col-md-12">
                  <div class="card card-default">
                    <div class="col-md-12 mb-0" style="padding-bottom:0px; padding-top:10px">
                      <!-- <div class="tab-custom-content mt-0"> -->
                      <!-- <p class="lead mb-0"> -->
                      <h4>Room</h4>
                      <!-- </p> -->
                      <!-- </div> -->
                    </div>
                    <div class="card-body">

                      <form method="POST" id="updateRoom_form" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="hotel_name" id="hotel_name" value="{{$room_data->hotel_id}}">

                        <input type="hidden" name="room_id" id="room_id" value="{{$room_data->id}}">

                        <div class="row">

                          <!-- <div class="col-md-6">

                            <div class="form-group">

                              <label>Hotel name</label>

                                <select class="form-control select2bs4" name="hotel_name"  id="hotel_name" style="width: 100%;" >

                                  <option value="">Select Hotel</option>

                                  @foreach ($hotels as $cont)

                                    <option value="{{ $cont->hotel_id }}" {{ $cont->hotel_id == $room_data->hotel_id ? 'selected' : '' }}>{{ $cont->hotel_name }}</option>

                                  @endforeach

                                </select>

                            </div>

                          </div> -->

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Description</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Room type</label>

                              <select class="form-control select2bs4" name="room_type" id="room_type" style="width: 100%;">

                                <option value="">Select Hotel</option>

                                @foreach ($room_type_categories as $cont)

                                <option value="{{ $cont->id }}" {{ $cont->id == $room_data->room_types_id ? 'selected' : '' }}>{{ $cont->title }}</option>

                                @endforeach

                              </select>

                              <!-- </div>   -->

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Room name</label>

                              <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Enter Room Name" value="{{$room_data->name}}">

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Max adults</label>

                              <input type="text" class="form-control" name="max_adults" id="max_adults" placeholder="Enter max adults" value="{{$room_data->max_adults}}">

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Max childern</label>

                              <input type="text" class="form-control" name="max_childern" id="max_childern" placeholder="Enter max childern" value="{{$room_data->max_childern}}">

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Room qty</label>

                              <input type="text" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Enter room qty." value="{{$room_data->number_of_rooms}}">

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

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Price per night</label>
                                  <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night" value="{{$room_data->price_per_night}}">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Type of price </label>
                                  <select class="form-control select2bs4" name="type_of_price" id="type_of_price" style="width: 100%;">
                                    <option value="">Select Price type</option>
                                    <option value="single_fee" {{ $room_data->type_of_price == "single_fee" ? 'selected' : '' }}>Single fee</option>
                                    <option value="per_night" {{ $room_data->type_of_price == "per_night" ? 'selected' : '' }}>Per night</option>
                                    <option value="per_guest" {{ $room_data->type_of_price == "per_guest" ? 'selected' : '' }}>Per guest</option>
                                    <option value="per_night_per_guest" {{ $room_data->type_of_price == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Taxes in % (included in the price)</label>
                              <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Enter Taxes in %" value="{{$room_data->tax_percentage}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price per night 7 days</label>
                              <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days." value="{{$room_data->price_per_night_7d}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price per night 30 days</label>
                              <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days." value="{{$room_data->price_per_night_30d}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Cleaning Fee in PKR</label>
                                  <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee." value="{{$room_data->cleaning_fee}}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Cleaning Fee type</label>
                                  <select class="form-control select2bs4" name="cleaning_fee_type" id="cleaning_fee_type" style="width: 100%;">
                                    <option value="">Select Cleaning Fee type</option>
                                    <option value="single_fee" {{ $room_data->type_of_price == "single_fee" ? 'selected' : '' }}>Single fee</option>
                                    <option value="per_night" {{ $room_data->type_of_price == "per_night" ? 'selected' : '' }}>Per night</option>
                                    <option value="per_guest" {{ $room_data->type_of_price == "per_guest" ? 'selected' : '' }}>Per guest</option>
                                    <option value="per_night_per_guest" {{ $room_data->type_of_price == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>
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
                                  <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city_fee." value="{{$room_data->city_fee}}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>City Fee type</label>
                                  <select class="form-control select2bs4" name="city_fee_type" id="city_fee_type" style="width: 100%;">
                                    <option value="">Select City Fee type</option>
                                    <option value="single_fee" {{ $room_data->type_of_price == "single_fee" ? 'selected' : '' }}>Single fee</option>
                                    <option value="per_night" {{ $room_data->type_of_price == "per_night" ? 'selected' : '' }}>Per night</option>
                                    <option value="per_guest" {{ $room_data->type_of_price == "per_guest" ? 'selected' : '' }}>Per guest</option>
                                    <option value="per_night_per_guest" {{ $room_data->type_of_price == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>

                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Earlybird Discount - in % from the price per night</label>
                                  <input type="text" class="form-control" name="earlybird_discount" id="earlybird_discount" placeholder="Enter discount in %." value="{{$room_data->earlybird_discount}}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Minimum number of days in advance</label>
                                  <input type="text" class="form-control" name="min_days_in_advance" id="min_days_inadvance" placeholder="Enter Minimum No of days." value="{{$room_data->min_days_in_advance}}">
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
                                        <input type="radio" id="allow_guest_in_room1" name="is_guest_allow" value="1" @php if($room_data->is_guest_allow == 1){echo 'checked';} @endphp>
                                        <label for="allow_guest_in_room1">Yes</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="icheck-danger d-inline">
                                        <input type="radio" id="allow_guest_in_room2" name="is_guest_allow" value="0"  @php if($room_data->is_guest_allow == 0){echo 'checked';} @endphp>
                                        <label for="allow_guest_in_room2">No</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3 <? if ($room_data->is_guest_allow == 0) {echo 'd-none';} ?>" id="allow_guest_price_div">
                                <div class="form-group">
                                  <label>Extra guest per night</label>
                                  <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night." value="{{$room_data->extra_guest_per_night}}">
                                </div>
                              </div>
                              <div class="col-md-5 <? if ($room_data->is_guest_allow == 0) {echo 'd-none';} ?>" id="allow_guest_cap_div">
                                <div class="form-group">
                                  <label>Please Check if Allow Above Capacity yes </label>
                                  <div class="icheck-success d-inline">
                                    <input type="checkbox" name="is_above_guest_cap" id="checkboxSuccess1" value="1" <? if ($room_data->is_above_guest_cap == 1) {echo 'checked';} ?>>
                                    <label for="checkboxSuccess1">Allow guests above capacity?</label>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                          <div class="col-md-12 <? if ($room_data->is_guest_allow == 0) {echo 'd-none';} ?>" id="pay_by_no_guest_div">
                            <div class="form-group">
                              <!-- <label>Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only) </label> -->
                              <div class="icheck-success d-inline">
                                <input type="checkbox" name="is_pay_by_num_guest" id="checkboxSuccess2" value="1" <? if ($room_data->is_pay_by_num_guest == 1) {echo 'checked';} ?>
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

                              @if(count($room_extra_option) > 0)

                                @foreach ($room_extra_option as $key=>$value)
                        
                                <div class="row form-group">
                                  <div class="col-md-3">
                                    <input type="text" class="form-control" name="extra[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->ext_opt_name }}" />
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" class="form-control" name="extra[@php echo $key; @endphp][price]" placeholder="Enter Price" value="{{ $value->ext_opt_price }}" />
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" class="form-control" name="extra[@php echo $key; @endphp][type]" placeholder="Enter type" value="{{ $value->ext_opt_type }}" />
                                  </div>
                                  @if($key == 0)
                                  <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                                  @else
                                  <span><a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></span>
                                  @endif
                                </div>
                                
                                @endforeach

                              @else if  

                              <div class="row">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="extra[0][name]" placeholder="Enter Name" value="" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="extra[0][price]" placeholder="Enter Price" value="" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="extra[0][type]" placeholder="Enter type" value="" />
                                </div>
                                <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                              </div>

                              @endif

                              

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
                              <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2." value="{{$room_data->room_size}}">
                            </div>
                          </div>



                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Bed type</label>

                              <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;">
                                <option value="">Select Bed type</option>
                                <option value="Single bed" {{ $room_data->bed_type == "Single bed" ? 'selected' : '' }}>Single bed</option>
                                <option value="Double bed" {{ $room_data->bed_type == "Double bed" ? 'selected' : '' }}>Double bed</option>
                                <option value="Bunk bed" {{ $room_data->bed_type == "Bunk bed" ? 'selected' : '' }}>Bunk bed</option>
                                <option value="Sofa bed" {{ $room_data->bed_type == "Sofa bed" ? 'selected' : '' }}>Sofa bed</option>
                                <option value="Futon Mat" {{ $room_data->bed_type == "Futon Mat" ? 'selected' : '' }}>Futon Mat</option>
                                <option value="Extra-Large double bed (Super - King size)" {{ $room_data->bed_type == "Extra-Large double bed (Super - King size)" ? 'selected' : '' }}>Extra-Large double bed (Super - King size)</option>
                              </select>

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Private bathroom</label>

                              <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1" {{ $room_data->private_bathroom == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $room_data->private_bathroom == 0 ? 'selected' : '' }}>No</option>
                              </select>

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Private entrance</label>

                              <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1" {{ $room_data->private_entrance == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $room_data->private_entrance == 0 ? 'selected' : '' }}>No</option>
                              </select>

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Optional services</label>

                              <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services" value="{{$room_data->optional_services}}">

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Family friendly</label>

                              <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1" {{ $room_data->family_friendly == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $room_data->family_friendly == 0 ? 'selected' : '' }}>No</option>
                              </select>

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Outdoor facilities</label>

                              <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities." value="{{$room_data->outdoor_facilities}}">

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Extra people</label>

                              <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people." value="{{$room_data->extra_people}}">

                            </div>

                          </div>


                          <!-- <div class="col-md-12">
                            <div class="form-group">
                              <div class="field" align="left">
                                <label>Upload room images</label>
                                <input type="file" id="files" name="imgupload[]" multiple />
                                <?php foreach ($room_images as $key => $ad_image) { ?>
                                  <span class="pip"><img class="imageThumb" src="{{url('public/uploads/room_images/')}}/{{$ad_image->image}}"><span class="remove">Remove image</span></span>
                                <?php } ?>

                              </div>
                            </div>
                          </div>  -->

                          <div class="col-md-12">
                            <div class="d-flex flex-wrap">
                              @foreach($room_images as $image)
                              <div class="image-gridiv">
                                <img src="{{url('public/uploads/room_images/')}}/{{$image->image}}">
                              </div>
                              @endforeach
                            </div>
                          </div>

                          <!-- <div class="row"> -->
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
                              <select class="form-control select2bs4" multiple="multiple" name="amenity[]" id="amenity_{{$value->id}}" data-placeholder="Select Room Amenities" style="width: 100%;">
                                <!-- <option value="">Select Room Amenities</option> -->
                                @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->amenity_id }}" <?php if (in_array($amenity->amenity_id, $room_amenities)) {
                                                                              echo 'selected';
                                                                            } ?>>{{ $amenity->amenity_name }}</option>
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
                          @php $room_services_count = DB::table('H3_Services')->where('service_type_id',$value->id)->count(); @endphp

                          @if($room_services_count > 0)
                          @php $services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type_id',$value->id)->get(); @endphp
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>{{$value->name}}</label>
                              <select class="form-control select2bs4" multiple="multiple" name="services[]" id="service_{{$value->id}}" data-placeholder="Select {{$value->name}}" style="width: 100%;">
                                <!-- <option value="">Select Room Amenities</option> -->

                                @foreach ($services as $service)
                                <option value="{{ $service->id }}" <?php if (in_array($service->id, $room_services)) {
                                                                      echo 'selected';
                                                                    } ?>>{{ $service->service_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @endif

                          @endforeach

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
                              <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;">
                                <!-- <option value="">Services & Extras</option> -->
                                @php $other_features = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get(); @endphp
                                @foreach ($other_features as $value)
                                <option value="{{ $value->id }}" <?php if (in_array($value->id, $room_features)) {
                                                                    echo 'selected';
                                                                  } ?>>{{ $value->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Room description</label>

                              <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description" value="{{$room_data->description}}"> -->
                              <textarea id="summernote" name="description" required>{{$room_data->description}}</textarea>

                            </div>

                          </div>

                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Notes</label>

                              <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes" value="{{$room_data->notes}}" > -->
                              <textarea id="summernote1" name="notes" required>{{$room_data->notes}}</textarea>

                            </div>

                          </div>


                          <div class="col-12">

                            <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn1" type="submit">Update</button>

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