@extends('admin.layouts.layout')
@section('title', 'add - Space')
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
<!-- <link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}"> -->
<!-- Daterange picker -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/daterangepicker/daterangepicker.css')}}"> -->
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('resources/plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- summernote -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}"> -->
@endsection


@section('current_page_js')

<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- datetimepicker -->
<!-- <script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script> -->
<!-- daterangepicker -->
<!-- <script src="{{ asset('resources/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('resources/plugins/daterangepicker/daterangepicker.js')}}"></script> -->
<!-- BS-Stepper -->
<script src="{{ asset('resources/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- Summernote -->
<!-- <script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
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
<script>
  // $('#start_date').datepicker(
  // { 
  //   minDate: 0,
  //     beforeShow: function() {
  //     $(this).datepicker('option', 'maxDate', $('#to').val());
  //   }
  // });
  // $('#end_date').datepicker(
  //   {
  //     defaultDate: "+1w",
  //     beforeShow: function()
  //     {
  //       $(this).datepicker('option', 'minDate', $('#start_date').val());
  //      if ($('#start_date').val() === '') $(this).datepicker('option', 'minDate', 0);                             
  //     }
  //   }
  // );
</script>
<script>
  $("select").on("select2:select", function(evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
  });
</script>

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

  // $("#room_type").change(function() {
  //   var room_type_id = this.value;
  //   $("#room_name-dropdown").html('<option value="">Select room</option>');
  //   $.ajax({
  //     url: "{{ url('admin/room_name') }}",
  //     method: 'POST',
  //     data: {
  //       room_type_id: room_type_id,
  //       _token: '{{csrf_token()}}'
  //     },
  //     dataType: 'json',
  //     success: function(data) {
  //       $.each(data.room_name_list, function(key, value) {
  //         $("#room_name-dropdown").append('<option value="' + value.room_name + '">' + value.room_name + '</option>');
  //       });
  //     }
  //   });
  // });
</script>
<script>
  $(".slide.one .button").click(function() {
    // alert('sdfsd');
    var form = $("#addTourContext_form");
    form.validate({
      rules: {
        tour_title: {
          required: true,
        },
        tour_description: {
          required: true,
        },
        "tourGallery[]": {
          required: true,
          extension: "jpg|jpeg|png",
          // filesize: 20971520, 
        },
        tourFeaturedImg: {
          required: true,
          extension: "jpg|jpeg|png",
        },
        tour_locations: {
          required: true,
        },
        tour_package_name: {
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
        start_date: {
          required: true,
        },
        end_date: {
          required: true,
        },
        tour_code: {
          required: true,
        },
        min_day_stays: {
          required: true,
          number: true,
        },
        tour_type: {
          required: true,
        },
        tour_days: {
          required: true,
        },
        booking_contact: {
          required: true,
          number: true,
        },
        tour_price: {
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
        address: {
          required: true,
        },
        city: {
          required: true,
        },
        latitude: {
          number: true,
        },
        longitude: {
          number: true,
        },
        country_id: {
          required: true,
        },
        bank_name: {
          required: true,
        },
        account_title: {
          required: true,
        },
        account_number: {
          required: true,
        },
        branch_name: {
          required: true,
        },
        easypaisa: {
          required: true,
        },
        jazz_cash: {
          required: true,
        }
      },
      messages: {
        address: {
          required: "Please enter a Your Office Address"
        },
        city: {
          required: "Please provide a City",
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
        address: {
          required: true,
        },
        city: {
          required: true,
        },
        latitude: {
          number: true,
        },
        longitude: {
          number: true,
        },
        country_id: {
          required: true,
        },
        bank_name: {
          required: true,
        },
        account_title: {
          required: true,
        },
        account_number: {
          required: true,
        },
        branch_name: {
          required: true,
        },
        easypaisa: {
          required: true,
        },
        jazz_cash: {
          required: true,
        }
      },
      messages: {
        address: {
          required: "Please enter a Your Office Address"
        },
        city: {
          required: "Please provide a City",
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
      $(".slide.three").removeClass("active");
      $(".slide.four").addClass("active");
    }
  });

  $(".slide.four .button").click(function() {
    var form = $("#addTourContext_form");
    form.validate({
      rules: {
        "itinerary[]": {
          required: true,
        }
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

<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var x = 0;

    $(addButton).click(function() {
      if (x < maxField) {
        x++;
        $(wrapper).append('<div class="form-group"><div class="row form-group"><div class="col-md-3 form-group"><input type="text" class="form-control" name="extra[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3 form-group"><input type="text" class="form-control" name="extra[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3 form-group"><div class="form-group"><select class="form-control select2bs4" name="extra[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
      }
    });

    $(wrapper).on('click', '.remove_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addButton = $('.add_custom_button');
    var wrapper = $('.field_wrapper_custom');
    var x = 0;

    $(addButton).click(function() {
      if (x < maxField) {
        x++;
        $(wrapper).append('<div class="form-group"><div class="row form-group"><div class="col-md-3 form-group"><input type="text" class="form-control" name="custom[' + x + '][label]" placeholder="Enter Label" value="" /></div><div class="col-md-3 form-group"><input type="text" class="form-control" name="custom[' + x + '][quantity]" placeholder="Enter Quantity" value="" /></div><span><a href="javascript:void(0);" class="remove_custom_button">Remove</a></span></div></div>');
      }
    });

    $(wrapper).on('click', '.remove_custom_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
  });
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
  function initialize() {
    var input = document.getElementById('space_address');
    var options = document.getElementById("space_country").options;
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      // console.log(place);
      document.getElementById('space_latitude').value = place.geometry.location.lat();
      document.getElementById('space_longitude').value = place.geometry.location.lng();
      // document.getElementById('neighb_area').value = place.vicinity;
      for (let i = 0; i < place.address_components.length; i++) {
        if (place.address_components[i].types[0] == "administrative_area_level_2") {
          document.getElementById('city').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "sublocality_level_1") {
          document.getElementById('neighbor_area').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "administrative_area_level_1") {
          document.getElementById('province').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "postal_code") {
          document.getElementById('zip_code').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "country") {
          console.log(place.address_components[i].long_name);
          for (var j = 0; j < options.length; j++) {
            if (options[j].text == place.address_components[i].long_name) {
              options[j].selected = true;
              document.getElementById("select2-space_country-container").textContent = options[j].text;
              const getSpan = document.getElementById("select2-space_country-container")
              getSpan.setAttribute("title", options[j].text);
              break;
            }
          }
        }
      }
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
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
          <a href="{{url('/admin/space-list')}}"><i class="right fas fa-angle-left"></i>Back</a>
          <h1>Add Space</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Space</li>
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
                        <span class="bs-stepper-label">Space Context</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#hotel-policy-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="hotel-policy-part" id="hotel-policy-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Listing Details</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#facility-service-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="facility-service-part" id="facility-service-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Address & Extra Option</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#media-other-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="media-other-part" id="media-other-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Media and Other Option</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="POST" id="addTourContext_form" action="#">
                      <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->
                      @csrf
                      <div id="hotel-context-part" class="content slide one" role="tabpanel" aria-labelledby="hotel-context-part-trigger">
                        <!-- <form method="POST" id="addHotelContext_form"> -->

                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

                        <div class="row">

                          <div class="col-md-12 mt-0">
                            <!-- <div class="tab-custom-content mt-0"> -->
                            <p class="lead mb-0">
                            <h4>Tour Context</h4>
                            </p>
                            <!-- </div> -->
                          </div>

                          <div class="col-md-12">

                            <div class="form-group">

                              <label>Space name</label>

                              <input type="text" class="form-control" name="space_name" placeholder="Enter Space Name">

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <label>Category</label>

                              <select class="form-control select2bs4" name="category_id" id="category_id" style="width: 100%;">

                                <option value="">Select Category</option>

                                @foreach ($space_categories as $cat)

                                <option value="{{ $cat->scat_id }}">{{ $cat->category_name }} {{ $cat->details }}</option>

                                @endforeach

                              </select>

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <label>Listed In/Room Type</label>

                              <select class="form-control select2bs4" name="sub_category_id" id="sub_category_id" style="width: 100%;">

                                <option value="">Select Room Type</option>

                                @foreach ($space_sub_categories as $cont)

                                <option value="{{ $cont->sub_cat_id }}">{{ $cont->sub_category_name }}</option>

                                @endforeach

                              </select>

                              <!-- </div>   -->

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <label>Guest Number</label>

                              <input type="text" class="form-control" name="guest_number" id="guest_number" placeholder="Enter guest number" required>

                            </div>

                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Property Description</label>
                              <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                              <textarea class="form-control" id="summernoteRemoved" name="description" required></textarea>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Private Notes</label>
                              <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                              <textarea class="form-control" id="summernote1Removed" name="notes" required></textarea>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Document</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="space_document" id="space_document">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scouts ID</label>
                              <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;">
                                <option value="">Select Scouts</option>
                                @php @endphp
                                @foreach ($scouts as $value)
                                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
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
                                    <input class="custom-control-input" type="radio" id="payment_mode1" name="payment_mode" value="1">
                                    <label for="payment_mode1" class="custom-control-label">Pay now 100%</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="payment_mode2" name="payment_mode" value="2">
                                    <label for="payment_mode2" class="custom-control-label">Partial Payment (30% Online & 70% at Desk )</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="payment_mode3" name="payment_mode" value="0" checked>
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
                                      <input class="custom-control-input" type="radio" id="booking_option1" name="booking_option" value="1">
                                      <label for="booking_option1" class="custom-control-label">Instant booking</label>
                                    </div>

                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- radio -->
                                  <div class="form-group">

                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" value="2" checked>
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
                                      <input class="custom-control-input" type="radio" id="reserv_date_change_allow1" name="reserv_date_change_allow" value="1">
                                      <label for="reserv_date_change_allow1" class="custom-control-label">Date Change Allowed</label>
                                    </div>

                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- radio -->
                                  <div class="form-group">

                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="reserv_date_change_allow2" name="reserv_date_change_allow" value="0" checked>
                                      <label for="reserv_date_change_allow2" class="custom-control-label">Date Change not Allowed</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-12">
                            <a class="btn btn-primary btn-dark button" style="float: right;">Next</a>
                          </div>
                        </div>
                      </div>

                      <div id="hotel-policy-part" class="content slide two" role="tabpanel" aria-labelledby="hotel-policy-part-trigger">
                        <div class="row">

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
                                  <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night">
                                </div>
                              </div>

                              <!-- <div class="col-md-6">
                                <div class="form-group">
                                  <label>Type of price </label>
                                  <select class="form-control select2bs4" name="type_of_price" id="type_of_price" style="width: 100%;">
                                    <option value="">Select Price type</option>
                                    <option value="single_fee">Single fee</option>
                                    <option value="per_night">Per night</option>
                                    <option value="per_guest">Per guest</option>
                                    <option value="per_night_per_guest">Per night per guest</option>
                                  </select>
                                </div>
                              </div> -->
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Taxes in % (included in the price)</label>
                              <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Enter Taxes in %">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price per night 7 days</label>
                              <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days.">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Price per night 30 days</label>
                              <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days.">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Cleaning Fee in PKR</label>
                                  <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee.">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Cleaning Fee type</label>
                                  <select class="form-control select2bs4" name="cleaning_fee_type" id="cleaning_fee_type" style="width: 100%;">
                                    <option value="">Select Cleaning Fee type</option>
                                    <option value="single_fee">Single fee</option>
                                    <option value="per_night">Per night</option>
                                    <option value="per_guest">Per guest</option>
                                    <option value="per_night_per_guest">Per night per guest</option>
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
                                  <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city_fee.">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>City Fee type</label>
                                  <select class="form-control select2bs4" name="city_fee_type" id="city_fee_type" style="width: 100%;">
                                    <option value="">Select City Fee type</option>
                                    <option value="single_fee">Single fee</option>
                                    <option value="per_night">Per night</option>
                                    <option value="per_guest">Per guest</option>
                                    <option value="per_night_per_guest">Per night per guest</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Security Deposit</label>
                              <input type="text" class="form-control" name="security_deposite" id="security_deposite" placeholder="Enter security deposite">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Earlybird Discount - in % from the price per night</label>
                                  <input type="text" class="form-control" name="earlybird_discount" id="earlybird_discount" placeholder="Enter discount in %.">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Minimum number of days in advance</label>
                                  <input type="text" class="form-control" name="min_days_in_advance" id="min_days_inadvance" placeholder="Enter Minimum No of days.">
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
                                        <input type="radio" id="allow_guest_in_room1" name="is_guest_allow" value="1">
                                        <label for="allow_guest_in_room1">Yes</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="icheck-danger d-inline">
                                        <input type="radio" id="allow_guest_in_room2" name="is_guest_allow" value="0" checked>
                                        <label for="allow_guest_in_room2">No</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 d-none" id="allow_guest_price_div">
                                <div class="form-group">
                                  <label>Extra guest per night</label>
                                  <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night.">
                                </div>
                              </div>
                              <div class="col-md-4 d-none" id="allow_guest_cap_div">
                                <div class="form-group">
                                  <label>Please Check if Allow Above Capacity yes </label>
                                  <div class="icheck-success d-inline">
                                    <input type="checkbox" name="is_above_guest_cap" id="checkboxSuccess1" value="1">
                                    <label for="checkboxSuccess1">Allow guests above capacity?</label>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                          <div class="col-md-12 d-none" id="pay_by_no_guest_div">
                            <div class="form-group">
                              <!-- <label>Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only) </label> -->
                              <div class="icheck-success d-inline">
                                <input type="checkbox" name="is_pay_by_num_guest" id="checkboxSuccess2" value="1">
                                <label for="checkboxSuccess2">Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only)</label>
                              </div>
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
                              <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2.">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Rooms</label>
                              <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Enter Rooms">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Bedrooms</label>
                              <input type="text" class="form-control" name="bedroom_number" id="bedroom_number" placeholder="Enter Bedrooms">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Bathrooms</label>
                              <input type="text" class="form-control" name="bathroom_number" id="bathroom_number" placeholder="Enter Bathrooms">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Check-in hour (*text)</label>
                              <input type="text" class="form-control" name="checkin_hr" id="checkin_hr" placeholder="Enter Check-in hour">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Check-Out hour (*text)</label>
                              <input type="text" class="form-control" name="checkout_hr" id="checkout_hr" placeholder="Enter Check-Out hour">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Late Check-in (*text)</label>
                              <input type="text" class="form-control" name="late_checkin" id="late_checkin" placeholder="Enter Late Check-in">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>BedRoom type</label>
                              <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;">
                                <option value="">Select Bed type</option>
                                <option value="Single bed">Single bed</option>
                                <option value="Double bed">Double bed</option>
                                <option value="Bunk bed">Bunk bed</option>
                                <option value="Sofa">Sofa</option>
                                <option value="Futon Mat">Futon Mat</option>
                                <option value="Extra-Large double bed (Super - King size)">Extra-Large double bed (Super - King size)</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Private bathroom</label>
                              <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Private entrance</label>
                              <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Optional services</label>

                              <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services">

                            </div>

                          </div>
                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Family friendly</label>

                              <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;">
                                <option value="">Please select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>

                            </div>

                          </div>
                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Outdoor facilities</label>

                              <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities.">

                            </div>

                          </div>
                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Extra people</label>

                              <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people.">

                            </div>

                          </div>
                          <div class="col-md-6">

                            <div class="form-group">

                              <label>Cancellation (*text)</label>

                              <input type="text" class="form-control" name="cancellation" id="cancellation" placeholder="Enter Cancellation">

                            </div>

                          </div>
                          <div class="col-12">
                            
                            <a class="btn btn-primary btn-dark button" style="float: right;">Next</a>
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()" style="float: right;">Previous</a>
                          </div>
                        </div>
                      </div>

                      <div id="facility-service-part" class="content slide three" role="tabpanel" aria-labelledby="facility-service-part-trigger">
                        <div class="row">
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
                              <input type="text" class="form-control" name="space_address" id="space_address" placeholder="Enter Address" required="required">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Neighborhood / Area</label>
                              <input type="text" class="form-control" name="neighbor_area" id="neighbor_area" placeholder="Enter Neighborhood / Area.">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Country</label>
                              <select class="form-control select2bs4" name="space_country" id="space_country" style="width: 100%;" required="required">
                                <!-- <option value="">Select Country</option> -->
                                @foreach ($countries as $cont)
                                <option value="{{ $cont->id }}">{{ $cont->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Zip Code</label>
                              <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Enter Zip Code">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Province</label>
                              <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province">
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
                              <input type="text" class="form-control" name="space_latitude" id="space_latitude" placeholder="Enter ">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Longitude</label>
                              <input type="text" class="form-control" name="space_longitude" id="space_longitude" placeholder="Enter ">
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
                              <div class="row">
                                <div class="col-md-3 form-group">
                                  <input type="text" class="form-control" name="extra[0][name]" placeholder="Enter Name" value="" />
                                </div>
                                <div class="col-md-3 form-group">
                                  <input type="text" class="form-control" name="extra[0][price]" placeholder="Enter Price" value="" />
                                </div>
                                <div class="col-md-3 form-group">
                                  <div class="form-group">
                                    <select class="form-control select2bs4" name="extra[0][type]" style="width: 100%;">
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
                              <div class="row form-group">
                                <div class="col-md-3 form-group">
                                  <input type="text" class="form-control" name="custom[0][label]" placeholder="Enter Name" value="" />
                                </div>
                                <div class="col-md-3 form-group">
                                  <input type="text" class="form-control" name="custom[0][quantity]" placeholder="Enter Quantity" value="" />
                                </div>
                                <span><a href="javascript:void(0);" class="add_custom_button" title="Add field">Add</a></span>
                              </div>
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
                              <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;">
                                <!-- <option value="">Services & Extras</option> -->
                                @php @endphp
                                @foreach ($other_features as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-12">
                            <a class="btn btn-primary btn-dark button" style="float: right;">Next</a>
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()" style="float: right;">Previous</a>
                          </div>
                        </div>
                        <!-- </form> -->
                      </div>

                      <div id="media-other-part" class="content slide four" role="tabpanel" aria-labelledby="media-other-part-trigger">
                        <div class="row">
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
                                <input type="file" id="spaceFeaturedImg" name="spaceFeaturedImg" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="field" align="left">
                                <label>Upload room gallery</label>
                                <input type="file" id="files" name="imgupload[]" multiple required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <button class="btn btn-primary btn-dark button float-right" name="submit" id="step_btn1" type="button">Submit</button>
                          </div>
                        </div>
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