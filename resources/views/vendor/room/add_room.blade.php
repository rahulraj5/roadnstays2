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

  .d-none {
    display: none;
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
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
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
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
  })
</script>

<script>
  $(document).ready(function() {
    // Select2 Multiple
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
  $("select").on("select2:select", function(evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
  });
</script>

<script>
  // $('#files').change(function(){
  //   var imgNumber = $('input[name="imgupload[]"]', '#addRoomVendor_form')[0].files;
  //   alert(imgNumber.length);
  //   if (imgNumber.length < 4) {
  //     return true;
  //   } else {
  //     return false;
  //   }
  // });
</script>

<script>
  $("#submit_btn").click(function() {
    // alert('shdfsd');
    var form = $("#addRoomVendor_form");
    form.validate({
      rules: {
        // hotel_name: {
        //   required: true,
        // },
        room_type: {
          required: true,
        },
        room_name: {
          required: true,
        },
        max_adults: {
          required: true,
        },
        max_childern: {
          required: true,
        },
        number_of_rooms: {
          required: true,
        },
        price_per_night: {
          required: true,
        },
        type_of_price: {
          required: true,
        },
        tax_percentage: {
          required: true,
        },
        price_per_night_7d: {
          required: true,
        },
        price_per_night_30d: {
          required: true,
        },
        room_size: {
          required: true,
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
        },
      },
    });
    if (form.valid() === true) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      $('#submit_btn').prop('disabled', true);
      $('#submit_btn').html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
      );
      // alert(formData);
      $(form).ajaxSubmit({
        type: 'POST',
        url: site_url + '/servicepro/submitroom',
        data: formData,
        success: function(response) {
          console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // var hotel_id = $.base64.encode(response.hotel_id)
            // setTimeout(function() { window.location.reload() }, 1000);
            setTimeout(function() {
              window.location.href = site_url + "/servicepro/viewHotelRooms/" + response.hotel_id
            }, 1000);
          } else {
            error_noti(response.msg);
            $('#submit_btn').html(
              `<span class=""></span>Submit`
            );
            $('#submit_btn').prop('disabled', false);
          }
        }
      });
      // event.preventDefault();
    }
  });

  // $('#step_btn1').click(function() {
  // $("#addRoomVendor_form").validate({
  //   debug: false,
  //   rules: {
  //     hotel_name: {
  //       required: true,
  //     },
  //     room_type: {
  //       required: true,
  //     },
  //     room_name: {
  //       required: true,
  //     },
  //     max_adults: {
  //       required: true,
  //     },
  //     max_childern: {
  //       required: true,
  //     },
  //     number_of_rooms: {
  //       required: true,
  //     },
  //     price_per_night: {
  //       required: true,
  //     },
  //     type_of_price: {
  //       required: true,
  //     },
  //     tax_percentage: {
  //       required: true,
  //     },
  //     price_per_night_7d: {
  //       required: true,
  //     },
  //     price_per_night_30d: {
  //       required: true,
  //     },
  //     room_size: {
  //       required: true,
  //     },
  //     bed_type: {
  //       required: true,
  //     },
  //     private_bathroom: {
  //       required: true,
  //     },
  //     private_entrance: {
  //       required: true,
  //     },
  //     family_friendly: {
  //       required: true,
  //     },
  //     outdoor_facilities: {
  //       required: true,
  //     },
  //     extra_people: {
  //       required: true,
  //     },
  //   },
  //   submitHandler: function(form) {
  //     var site_url = $("#baseUrl").val();
  //     // alert(site_url);
  //     var formData = $(form).serialize();
  //     $(form).ajaxSubmit({
  //       type: 'POST',
  //       url: "{{url('/servicepro/submitroom')}}",
  //       data: formData,
  //       success: function(response) {
  //         // console.log(response);
  //         if (response.status == 'success') {
  //           // $("#register_form")[0].reset();
  //           success_noti(response.msg);

  //           // var hotel_id = $.base64.encode(response.hotel_id)
  //           // setTimeout(function() { window.location.reload() }, 1000);
  //           setTimeout(function() {
  //             window.location.href = site_url + "/servicepro/viewHotelRooms/" + response.hotel_id
  //           }, 1000);
  //         } else {
  //           error_noti(response.msg);
  //         }

  //       }
  //     });
  //     // event.preventDefault();
  //   }
  // });
  // });
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
        $(wrapper).append('<div class="form-group"><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><div class="form-group"><select class="form-control select2bs4" name="extra[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
      }
    });

    $(wrapper).on('click', '.remove_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
  });
</script>
@endsection

@section('content')


            <div class="row d-flex flex-wrap p-3">
              <div class="row add_m01 add_rm">
                <div class="col-md-12">
                  <div class="card card-default">
                    <!-- <div class="col-md-12 mb-0" style="padding-bottom:0px; padding-top:10px"> -->
                      <!-- <div class="tab-custom-content mt-0"> -->
                      <!-- <p class="lead mb-0"> -->
                      <!-- <h4>Room</h4> -->
                      <!-- </p> -->
                      <!-- </div> -->
                    <!-- </div> -->
                    <div class="card-body">

                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">

                            <form method="POST" id="addRoomVendor_form" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="hotel_id" id="hotel_id" value="{{$hotel_id}}">

                              <div class="row">

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

                                      <option value="">Select room type</option>

                                      @foreach ($room_type_categories as $cont)

                                      <option value="{{ $cont->id }}">{{ $cont->title }}</option>

                                      @endforeach

                                    </select>

                                    <!-- </div>   -->

                                  </div>

                                </div>

                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>Room name</label>

                                    <!-- <input type="text" class="form-control" name="room_name" placeholder="Enter Room Name"> -->

                                    <select class="form-control select2bs4" name="room_name" id="room_name-dropdown" style="width: 100%;">
                                      <option value="">Select room</option>
                                    </select>

                                  </div>

                                </div>

                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>Max adults</label>

                                    <input type="text" class="form-control" name="max_adults" id="max_adults" placeholder="Enter max adults">

                                  </div>

                                </div>

                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>Max childern</label>

                                    <input type="text" class="form-control" name="max_childern" id="max_childern" placeholder="Enter max childern">

                                  </div>

                                </div>

                                <div class="col-md-6">

                                  <div class="form-group">

                                    <label>Room qty</label>

                                    <input type="text" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Enter room qty.">

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
                                        <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night">
                                      </div>
                                    </div>

                                    <div class="col-md-6">
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
                                    </div>
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
                                    <h4>Extra Option</h4>
                                    </p>
                                  </div>
                                </div>
                                <div class="col-md-12 field_wrapper">
                                  <div class="form-group" id="extra">
                                    <label>Extra</label>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <input type="text" class="form-control" name="extra[0][name]" placeholder="Enter Name" value="" />
                                      </div>
                                      <div class="col-md-3">
                                        <input type="text" class="form-control" name="extra[0][price]" placeholder="Enter Price" value="" />
                                      </div>
                                      <!-- <div class="col-md-3">
                                        <input type="text" class="form-control" name="extra[0][type]" placeholder="Enter type" value="" />
                                      </div> -->
                                      <div class="col-md-3">
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
                                    <h4>Listing Details</h4>
                                    </p>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Size in ft2</label>
                                    <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2.">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Number of Beds</label>
                                    <input type="text" class="form-control" name="num_of_beds" id="num_of_beds" placeholder="Enter Number of Beds">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Bed type</label>
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

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <div class="field" align="left">
                                      <label>Upload room featured images</label>
                                      <input type="file" id="roomFeaturedImg" name="roomFeaturedImg" required />
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
                                      <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}</option>
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
                                      <option value="{{ $service->id }}">{{ $service->service_name }}</option>
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
                                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Room description</label>
                                    <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                                    <textarea class="form-control" id="summernoteRemoved" name="description" required></textarea>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Notes</label>
                                    <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                                    <textarea class="form-control" id="summernote1Removed" name="notes" required></textarea>
                                  </div>
                                </div>

                                <div class="col-12">

                                  <!-- <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button> -->
                                  <button class="btn btn-primary btn-dark button float-right" name="submit" id="submit_btn" type="button"><span class=""></span>Submit</button>

                                </div>

                              </div>

                            </form>
                            <!-- /.row -->
                            </div></div></div>
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