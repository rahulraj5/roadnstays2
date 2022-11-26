@extends('admin.layout.layout')
@section('title', 'Space - Edit')
@section('current_page_css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}"> -->

<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">

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

  .removeImage {
    display: block;
    background: #2a7b72 !important;
    border: 1px solid #126c62 !important;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  .removeImage:hover {
    background: #2a7b72 !important;
    color: black;
  }
</style>
@endsection
@section('current_page_js')
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<!-- <script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script> -->

<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
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
</script>
<script>
  // $(function() {
  //   // Summernote
  //   $('#summernote').summernote()
  //   $('#summernote1').summernote()
  // })
</script>
<script>
  // $(document).ready(function() {
  //     // Select2 Multiple
  //     $('.select2bs4').select2({
  //         theme: 'bootstrap4'
  //     })
  // });
  $("select").on("select2:select", function(evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
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

  $("#cancellation_mode1").click(function() {
    $("#cancel_num_of_days_div").addClass('d-none');
    $("#cancel_time_period_div").addClass('d-none');
  });

  $("#cancellation_mode2").click(function() {
    $("#cancel_num_of_days_div").removeClass('d-none');
    $("#cancel_time_period_div").addClass('d-none');
  });

  $("#cancellation_mode3").click(function() {
    $("#cancel_num_of_days_div").addClass('d-none');
    $("#cancel_time_period_div").removeClass('d-none');
  });

  $("#payment_mode1").click(function() {
    $("#partial_payment_div").addClass('d-none');
  });

  $("#payment_mode2").click(function() {
    $("#partial_payment_div").removeClass('d-none');
  });

  $("#payment_mode3").click(function() {
    $("#partial_payment_div").addClass('d-none');
  });

  $("#booking_option1").click(function() {
    $("#request_booking_valid_hr_div").addClass('d-none');
  });

  $("#booking_option2").click(function() {
    $("#request_booking_valid_hr_div").removeClass('d-none');
  });
</script>
<script>
  $('#checkin_hr').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
  $('#checkout_hr').datetimepicker({
    format: 'LT'
  });
  $('#late_checkin').datetimepicker({
    format: 'LT'
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var x = $('#extra_option_count').val() - 1;

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
    var x = $('#custom_details_count').val() - 1;

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
  function deleteConfirmation(Id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/admin/deleteSpaceSingleImage')}}",
          data: {
            'id': Id,
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(data) {
            $("#remove_img_" + Id).parent('div').remove();
            success_noti(data.msg);
          },
          error: function(errorData) {
            console.log(errorData);
            alert('Please refresh page and try again!');
          }
        });
      } else {
        e.dismiss;
      }
    }, function(dismiss) {
      return false;
    })
  }
  $(".removeImage").click(function() {
    var Id = $(this).attr('id');
    var hotel_id = $('#hotel_id').val();
    deleteConfirmation(Id);
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

<script>
  $(".space_up_submit").click(function(e) {
    var form = $("#updatespaceAdmin_form");
    form.validate({
      rules: {
        category_id: {
          required: true,
        },
        sub_category_id: {
          required: true,
        },
        space_name: {
          required: true,
          normalizer: function(value) {
            return $.trim(value);
          }
        },
        guest_number: {
          number: true,
        },
        city: {
          required: true,
        },
        space_country: {
          required: true,
        },
        description: {
          required: true,
          minlength: 200
          // wordCount: 50
        },
        scout_id: {
          required: true,
        },
        price_per_night: {
          required: true,
          number: true,
        },
        tax_percentage: {
          required: true,
          number: true,
        },
        price_per_night_7d: {
          required: true,
          number: true,
        },
        price_per_night_30d: {
          required: true,
          number: true,
        },
        cleaning_fee: {
          number: true,
        },
        city_fee: {
          number: true,
        },
        security_deposite: {
          number: true,
        },
        earlybird_discount: {
          number: true,
        },
        min_days_in_advance: {
          number: true,
        },
        extra_guest_per_night: {
          number: true,
        },
        room_size: {
          required: true,
        },
        room_number: {
          number: true,
        },
        bedroom_number: {
          number: true,
        },
        bathroom_number: {
          number: true,
        },
        bed_type: {
          required: true,
        },
        private_bathroom: {
          required: true,
        },
        private_entrance: {
          required: true,
        },
        family_friendly: {
          required: true,
        },
        outdoor_facilities: {
          required: true,
        },
        extra_people: {
          required: true,
          number: true,
        },
        operator_name: {
          required: true,
        },
        operator_contact_name: {
          required: true,
        },
        operator_contact_num: {
          required: true,
          number: true,
        },
        operator_email: {
          required: true,
          email: true,
        },
        operator_booking_num: {
          required: true,
          number: true,
        },
        cancel_policy: {
          required: true,
        },
        min_hrs: {
          number: true,
          required: true,
        },
        min_hrs_percentage: {
          number: true,
          required: true,
          range:[0,100],
          min: function(element) {
            var max_hrs_per = parseInt($('input[name="max_hrs_percentage"]').val());
            if(max_hrs_per == NaN){
              max_hrs_per = 0;
            }else{
              max_hrs_per = max_hrs_per;
            }
            // return parseInt($('input[name="max_hrs_percentage"]').val());
            return max_hrs_per;
          },
        },
        max_hrs: {
          number: true,
          // required: true,
          min: function(element) {
            return parseInt($('input[name="min_hrs"]').val()) + 1;
          },
        },
        max_hrs_percentage: {
          number: true,
          // required: true,
          range:[0,100],
          max: function(element) {
            return parseInt($('input[name="min_hrs_percentage"]').val());
          }
        },
        online_payment_percentage: {
          number: true,
          digits: true,
          range : [0, 100],
          required: function(element) {
              return $('input[name="payment_mode"]:checked').val() == 2;
          }
        },
        at_desk_payment_percentage: {
          number: true,
          digits: true,
          range : [0, 100],
          required: function(element) {
              return $('input[name="payment_mode"]:checked').val() == 2;
          }
        },
      },
    });
    if (form.valid() === true) {
      e.preventDefault();
      $('#space_up_submit').prop('disabled', true);
      $('#space_up_submit').html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
      );
      var site_url = $("#baseUrl").val();
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: site_url + '/admin/updateSpace',
        data: formData,
        success: function(response) {
          console.log(response);
          if (response.status == 'success') {
            // $('#space_up_submit').prop('disabled', true);
            // $('#space_up_submit').html(
            //   `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            // );
            success_noti(response.msg);
            setTimeout(function() {
              window.location.href = site_url + "/admin/space-list"
            }, 1000);
          } else {
            error_noti(response.msg);
            $('#space_up_submit').html(
              `<span class=""></span>Update`
            );
            $('#space_up_submit').prop('disabled', false);
          }
        }
      });
    } else {
      e.dismiss;
    }
  });
</script>
<script>
  $('#online_payment_percentage').keyup(function(){
    $("#at_desk_payment_percentage").prop('readonly', true);
    let online_per = parseFloat($('#online_payment_percentage').val());
    $('#at_desk_payment_percentage').val(100-online_per);
  });
  $('#at_desk_payment_percentage').keyup(function(){
    $("#online_payment_percentage").prop('readonly', true);
    let offline_per = parseFloat($('#at_desk_payment_percentage').val());
    $('#online_payment_percentage').val(100-offline_per);
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
          <a href="{{url('/admin/space-list')}}"><i class="right fas fa-angle-left"></i>Back</a>
          <!-- <h1>Edit Space</h1> -->

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Edit Space</li>

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

          <h3 class="card-title">Edit Space</h3>

        </div>

        <!-- /.card-header -->

        <div class="card-body">

          <form method="POST" id="updatespaceAdmin_form" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="space_id" id="space_id" value="{{$space_data->space_id}}">
            <input type="hidden" name="old_space_name" id="old_space_name" value="{{$space_data->space_name}}">
            <input type="hidden" name="old_space_image" id="old_space_image" value="@if(!empty($space_data->space_id)){{ $space_data->image }}@endif" />
            <input type="hidden" name="old_space_document" id="old_space_document" value="@if(!empty($space_data->space_id)){{ $space_data->space_document }}@endif" />
            <input type="hidden" name="extra_option_count" id="extra_option_count" value="{{ count($space_extra_option) }}">
            <input type="hidden" name="custom_details_count" id="custom_details_count" value="{{ count($space_custom_details) }}">

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

                  <input type="text" class="form-control" name="space_name" placeholder="Enter Space Name" value="{{ $space_data->space_name ?? '' }}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Category</label>

                  <select class="form-control select2bs4" name="category_id" id="category_id" style="width: 100%;">

                    <option value="">Select Category</option>

                    @foreach ($space_categories as $cat)

                    <option value="{{ $cat->scat_id }}" {{ $cat->scat_id == $space_data->category_id ? 'selected' : '' }}>{{ $cat->category_name }} {{ $cat->details }}</option>

                    @endforeach

                  </select>

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Listed In/Room Type</label>

                  <select class="form-control select2bs4" name="sub_category_id" id="sub_category_id" style="width: 100%;">

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

                  <input type="text" class="form-control" name="guest_number" id="guest_number" placeholder="Enter guest number" required value="{{ $space_data->guest_number ?? '' }}">

                </div>

              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Property Description</label>
                  <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                  <textarea class="form-control" id="summernoteRemoved" name="description" required>{{ $space_data->description ?? '' }}</textarea>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Private Notes</label>
                  <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                  <textarea class="form-control" id="summernote1Removed" name="notes" required>{{ $space_data->notes ?? '' }}</textarea>
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
                        <input class="custom-control-input" type="radio" id="payment_mode1" name="payment_mode" value="1" @php if($space_data->payment_mode == 1){echo 'checked';} @endphp>
                        <label for="payment_mode1" class="custom-control-label">Pay now 100%</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="payment_mode2" name="payment_mode" value="2" @php if($space_data->payment_mode == 2){echo 'checked';} @endphp>
                        <label for="payment_mode2" class="custom-control-label">Partial Payment (30% Online & 70% at Desk )</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="payment_mode3" name="payment_mode" value="0" @php if($space_data->payment_mode == 0){echo 'checked';} @endphp>
                        <label for="payment_mode3" class="custom-control-label">Pay at Hotel 100%</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row <? if ($space_data->payment_mode != 2) {
                                  echo 'd-none';
                                } ?>" id="partial_payment_div">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Online Payment Percentage</label>
                      <input type="text" class="form-control" name="online_payment_percentage" id="online_payment_percentage" placeholder="Enter Online Percentage" value="{{(!empty($space_data->online_payment_percentage) ? $space_data->online_payment_percentage : '')}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>At Desk Payment Percentage</label>
                      <input type="text" class="form-control" name="at_desk_payment_percentage" id="at_desk_payment_percentage" placeholder="Enter Offline Percentage" value="{{(!empty($space_data->at_desk_payment_percentage) ? $space_data->at_desk_payment_percentage : '')}}">
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
                          <input class="custom-control-input" type="radio" id="booking_option1" name="booking_option" value="1" @php if($space_data->booking_option == 1){echo 'checked';} @endphp>
                          <label for="booking_option1" class="custom-control-label">Instant booking</label>
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">

                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="booking_option2" name="booking_option" value="2" @php if($space_data->booking_option == 2){echo 'checked';} @endphp>
                          <label for="booking_option2" class="custom-control-label">Approval based booking</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="col-md-12">
                <div class="row <? if ($space_data->booking_option != 2) {
                                  echo 'd-none';
                                } ?>" id="request_booking_valid_hr_div">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Valid Hours for Booking Request </label>
                      <input type="text" class="form-control" name="request_booking_valid_hr" id="request_booking_valid_hr" placeholder="Enter Request Booking Valid Hours">
                    </div>
                  </div>
                </div>
              </div>  -->

              <div class="col-md-12">
                <div class="col-sm-6">
                  <label>Reservation Change</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="reserv_date_change_allow1" name="reserv_date_change_allow" value="1" @php if($space_data->reserv_date_change_allow == 1){echo 'checked';} @endphp>
                          <label for="reserv_date_change_allow1" class="custom-control-label">Date Change Allowed</label>
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="reserv_date_change_allow2" name="reserv_date_change_allow" value="0" @php if($space_data->reserv_date_change_allow == 0){echo 'checked';} @endphp>
                          <label for="reserv_date_change_allow2" class="custom-control-label">Date Change not Allowed</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Cancellation and Refund</h4>
                  </p>
                </div>
              </div>
              <!-- <label>Cancellation and Refund</label> -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Cancellation Policy</label>
                  <textarea class="form-control" id="summernote2Removed" name="cancel_policy">{{(!empty($space_data->cancel_policy) ? $space_data->cancel_policy : '')}}</textarea>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Min. Hrs. (# of Hours <= from check in)</label>
                          <input type="text" class="form-control" name="min_hrs" id="min_hrs" value="{{(!empty($space_data->min_hrs) ? $space_data->min_hrs : '')}}" placeholder="hrs.">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Deduction (%)</label>
                      <input type="text" class="form-control" name="min_hrs_percentage" id="min_hrs_percentage" value="{{(!empty($space_data->min_hrs_percentage) ? $space_data->min_hrs_percentage : '0')}}" placeholder="percentage">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Max. Hrs. (# of Hours <= from check in)</label>
                          <input type="text" class="form-control" name="max_hrs" id="max_hrs" value="{{(!empty($space_data->max_hrs) ? $space_data->max_hrs : '')}}" placeholder="hrs">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Deduction (%)</label>
                      <input type="text" class="form-control" name="max_hrs_percentage" id="max_hrs_percentage" value="{{(!empty($space_data->max_hrs_percentage) ? $space_data->max_hrs_percentage : '0')}}" placeholder="percentage">
                    </div>
                  </div>
                </div>
              </div>

              <!-- cancellation & policy end here -->

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Commission</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Commission</label>
                  <input type="text" class="form-control" name="commission" id="commission" placeholder="Enter Commission" value="{{(!empty($space_data->commission) ? $space_data->commission : '')}}">
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
                      <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night" value="{{ $space_data->price_per_night ?? '' }}">
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Taxes in % (included in the price)</label>
                  <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Enter Taxes in %" value="{{$space_data->tax_percentage}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price per night 7 days</label>
                  <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days." value="{{$space_data->price_per_night_7d}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price per night 30 days</label>
                  <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days." value="{{$space_data->price_per_night_30d}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cleaning Fee in PKR</label>
                      <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee." value="{{$space_data->cleaning_fee}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cleaning Fee type</label>
                      <select class="form-control select2bs4" name="cleaning_fee_type" id="cleaning_fee_type" style="width: 100%;">
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
                      <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city_fee." value="{{$space_data->city_fee}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City Fee type</label>
                      <select class="form-control select2bs4" name="city_fee_type" id="city_fee_type" style="width: 100%;">
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
                  <input type="text" class="form-control" name="security_deposite" id="security_deposite" placeholder="Enter security deposite" value="{{ $space_data->security_deposite ?? '' }}">
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Earlybird Discount - in % from the price per night</label>
                      <input type="text" class="form-control" name="earlybird_discount" id="earlybird_discount" placeholder="Enter discount in %." value="{{$space_data->earlybird_discount}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Minimum number of days in advance</label>
                      <input type="text" class="form-control" name="min_days_in_advance" id="min_days_inadvance" placeholder="Enter Minimum No of days." value="{{$space_data->min_days_in_advance}}">
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
                            <input type="radio" id="allow_guest_in_room1" name="is_guest_allow" value="1" @php if($space_data->is_guest_allow == 1){echo 'checked';} @endphp>
                            <label for="allow_guest_in_room1">Yes</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="icheck-danger d-inline">
                            <input type="radio" id="allow_guest_in_room2" name="is_guest_allow" value="0" @php if($space_data->is_guest_allow == 0){echo 'checked';} @endphp>
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
                      <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night." value="{{$space_data->extra_guest_per_night}}">
                    </div>
                  </div>
                  <div class="col-md-4 <? if ($space_data->is_guest_allow == 0) {
                                          echo 'd-none';
                                        } ?>" id="allow_guest_cap_div">
                    <div class="form-group">
                      <label>Please Check if Allow Above Capacity yes </label>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="is_above_guest_cap" id="checkboxSuccess1" value="1" <? if ($space_data->is_above_guest_cap == 1) {
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
                    <input type="checkbox" name="is_pay_by_num_guest" id="checkboxSuccess2" value="1" <? if ($space_data->is_pay_by_num_guest == 1) {
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
                      <input type="text" class="form-control" name="extra[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->ext_opt_name }}" />
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="extra[@php echo $key; @endphp][price]" placeholder="Enter Price" value="{{ $value->ext_opt_price }}" />
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-group">
                        <select class="form-control select2bs4" name="extra[@php echo $key; @endphp][type]" style="width: 100%;">
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
                    <input type="file" id="spaceFeaturedImg" name="spaceFeaturedImg" <?php if ($space_data->image === 'room_default_img.jpg') {
                                                                                        echo 'required';
                                                                                      } ?> />
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
                    <input type="file" id="files" name="imgupload[]" multiple />
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="d-flex flex-wrap">
                  @foreach($space_images as $image)
                  <div class="image-gridiv">
                    <span class="pip" id="remove_img_{{$image->id}}">
                      <img class="imageThumb" src="{{url('public/uploads/space_images/')}}/{{$image->image}}">
                      <br /><span class="removeImage" id="@php echo $image->id; @endphp">Remove image</span></span>
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
                  <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2." value="{{$space_data->room_size}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Rooms</label>
                  <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Enter Rooms" value="{{ $space_data->room_number ?? '' }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bedrooms</label>
                  <input type="text" class="form-control" name="bedroom_number" id="bedroom_number" placeholder="Enter Bedrooms" value="{{ $space_data->bedroom_number ?? '' }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bathrooms</label>
                  <input type="text" class="form-control" name="bathroom_number" id="bathroom_number" placeholder="Enter Bathrooms" value="{{ $space_data->bathroom_number ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Check-in hour (*text)</label>
                  <input type="text" class="form-control" name="checkin_hr" id="checkin_hr" placeholder="Enter Check-in hour" value="{{ $space_data->checkin_hr ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Check-Out hour (*text)</label>
                  <input type="text" class="form-control" name="checkout_hr" id="checkout_hr" placeholder="Enter Check-Out hour" value="{{ $space_data->checkout_hr ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Late Check-in (*text)</label>
                  <input type="text" class="form-control" name="late_checkin" id="late_checkin" placeholder="Enter Late Check-in" value="{{ $space_data->late_checkin ?? '' }}">
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>BedRoom type</label>
                  <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;">
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
                  <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->private_bathroom == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->private_bathroom == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Private entrance</label>
                  <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->private_entrance == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->private_entrance == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Optional services</label>
                  <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services" value="{{$space_data->optional_services}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Family friendly</label>
                  <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1" {{ $space_data->family_friendly == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $space_data->family_friendly == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Outdoor facilities</label>
                  <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities." value="{{$space_data->outdoor_facilities}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Extra people</label>
                  <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people." value="{{$space_data->extra_people}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Cancellation (*text)</label>
                  <input type="text" class="form-control" name="cancellation" id="cancellation" placeholder="Enter Cancellation" value="{{ $space_data->cancellation ?? '' }}">
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
                      <input type="text" class="form-control" name="custom[@php echo $key; @endphp][label]" placeholder="Enter Name" value="{{ $value->custom_label }}" />
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[@php echo $key; @endphp][quantity]" placeholder="Enter Quantity" value="{{ $value->custom_quantity }}" />
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
                      <input type="text" class="form-control" name="custom[0][label]" placeholder="Enter Name" value="" />
                    </div>
                    <div class="col-md-3 form-group">
                      <input type="text" class="form-control" name="custom[0][quantity]" placeholder="Enter Quantity" value="" />
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
                  <input type="text" class="form-control" name="space_address" id="space_address" placeholder="Enter Address" required="required" value="{{ $space_data->space_address ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Neighborhood / Area</label>
                  <input type="text" class="form-control" name="neighbor_area" id="neighbor_area" placeholder="Enter Neighborhood / Area." value="{{ $space_data->neighbor_area ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required value="{{ $space_data->city ?? '' }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control select2bs4" name="space_country" id="space_country" style="width: 100%;" required="required">
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
                  <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $space_data->zip_code ?? '' }}">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province" value="{{ $space_data->province ?? '' }}">
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
                  <input type="text" class="form-control" name="space_latitude" id="space_latitude" placeholder="Enter " value="{{ $space_data->space_latitude ?? '' }}">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Longitude</label>
                  <input type="text" class="form-control" name="space_longitude" id="space_longitude" placeholder="Enter " value="{{ $space_data->space_longitude }}">
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
                    @foreach ($space_other_features as $value)
                    <option value="{{ $value->space_feature_id }}" <?php if (in_array($value->space_feature_id, $space_features)) {
                                                                      echo 'selected';
                                                                    } ?>>{{ $value->space_feature_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-0">
                  <h4>Operator Details</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Operator Name</label>
                  <input type="text" class="form-control" name="operator_name" id="operator_name" value="{{$space_data->operator_name}}" placeholder="Enter Operator Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Operator Contact Name</label>
                  <input type="text" class="form-control" name="operator_contact_name" id="operator_contact_name" value="{{$space_data->operator_contact_name}}" placeholder="Enter Contact Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Operator Contact Number</label>
                  <input type="text" class="form-control" name="operator_contact_num" id="operator_contact_num" value="{{$space_data->operator_contact_num}}" placeholder="Enter Contact Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Operator Email</label>
                  <input type="text" class="form-control" name="operator_email" id="operator_email" value="{{$space_data->operator_email}}" placeholder="Enter Operator Email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Operator Booking Number</label>
                  <input type="text" class="form-control" name="operator_booking_num" id="operator_booking_num" value="{{$space_data->operator_booking_num}}" placeholder="Enter Operator Booking Number">
                </div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary btn-dark float-right button space_up_submit" name="submit" id="space_up_submit" type="button"><span class=""></span>Update</button>
              </div>

            </div>

          </form>
          <!-- /.row -->

        </div>

        <!-- /.card-body -->

        <div class="card-footer">

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