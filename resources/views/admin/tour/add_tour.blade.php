@extends('admin.layouts.layout')
 
@section('title', 'Add - Tour')
 
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
<script>
  $('#start_date').datepicker(
  { 
    minDate: 0,
      beforeShow: function() {
      $(this).datepicker('option', 'maxDate', $('#to').val());
    }
  });
  $('#end_date').datepicker(
    {
      defaultDate: "+1w",
      beforeShow: function()
      {
        $(this).datepicker('option', 'minDate', $('#start_date').val());
       if ($('#start_date').val() === '') $(this).datepicker('option', 'minDate', 0);                             
      }
    }
  );
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
      $("#tourGallery").on("change", function(e) {
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
              "</span>").insertAfter("#hotelGalleryPreview");
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
    var addServButton = $('.add_service_button');
    var servWrapper = $('.field_wrapper_service');
    var x = 0;

    $(addServButton).click(function() {
      if (x < maxField) {
        x++;
        $(servWrapper).append('<div class="form-group"><div class="row"><div class="col-md-4"><input type="text" class="form-control" name="service[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="service[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><div class="form-group"><select class="form-control select2bs4" name="service[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_serv_button">Remove</a></span></div></div>');
      }
    });

    $(servWrapper).on('click', '.remove_serv_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
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
        $(wrapper).append('<div class="form-group"><div class="row"><div class="col-md-4"><input type="text" class="form-control" name="itinerary[' + x + '][name]" placeholder="Enter Name" value="" /><ul style="padding: 3px; margin-top: 12px;" class="itinerary'+x+'"><li class="d-flex  mb-2" style="align-items: center;"><input type="text" class="form-control mr-2" name="itinerary['+x+'][services][0]" placeholder="services"><a href="javascript:void(0);" class="add_button_ser'+x+'" style="padding: 5px; top: 0px;" onclick="addtrips('+x+',0)">Button </a></li></ul></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
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
    var x = 1;
    function addtrips(id,inc) {
      var maxField = 10; 
     inc++;
      if(id > 0){
        $(".add_button_ser"+id).attr("onclick","addtrips('"+id+"','"+inc+"')");
        $('.itinerary'+id).append('<li class="d-flex  mb-2" style="align-items: center;"><input type="text" class="form-control mr-2" name="itinerary['+id+'][services]['+inc+']" placeholder="services"><a href="javascript:void(0);" class="remove_button remove_button_ser'+id+'" style="padding: 5px; top: 0px;">Remove</a></li>');
      
        $(".itinerary"+id).on('click','.remove_button_ser'+id,function(){
        $(this).parents('li').remove();
        });
      }else{ 
         $(".add_button_ser").attr("onclick","addtrips('"+id+"','"+inc+"')");
        $('.itinerary').append('<li class="d-flex  mb-2" style="align-items: center;"><input type="text" class="form-control mr-2" name="itinerary['+id+'][services]['+inc+']" placeholder="services"><a href="javascript:void(0);" class="remove_button remove_button_ser" style="padding: 5px; top: 0px;">Remove</a></li>');
        $(".itinerary").on('click','.remove_button_ser',function(){
        $(this).parents('li').remove();
        });
      } 
    }
</script> 
<script>
  $("#parking_option1").click(function() {
    $("#parking_free_div").removeClass('d-none');
    $("#parking_price_div").addClass('d-none');
  });

  $("#parking_option2").click(function() {
    $("#parking_price_div").removeClass('d-none');
    $("#parking_free_div").removeClass('d-none');
  });

  $("#parking_option3").click(function() {
    $("#parking_free_div").addClass('d-none');
  });

  $("#breakfast_availability1").click(function() {
    $("#breakfast_price_inclusion_div").removeClass('d-none');
    $("#breakfast_price_type_div").removeClass('d-none');
  });

  $("#breakfast_availability2").click(function() {
    $("#breakfast_price_inclusion_div").addClass('d-none');
    $("#breakfast_price_type_div").addClass('d-none');
  });

  $("#breakfast_price_inclusion1").click(function() {
    $("#breakfast_cost_div").addClass('d-none');
  });

  $("#breakfast_price_inclusion2").click(function() {
    // $("#breakfast_price_type_div").removeClass('d-none');
    $("#breakfast_cost_div").removeClass('d-none');
  });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNfo0u0kFSDaxpJfkR5VsQCUHiyhTBaAI&libraries=places"></script> 
<script type="text/javascript">
  function initialize() {
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      console.log(place);
      document.getElementById('latitude').value = place.geometry.location.lat();
      document.getElementById('longitude').value = place.geometry.location.lng();
      document.getElementById('neighb_area').value = place.vicinity;
      for (let i = 0; i < place.address_components.length; i++) {
        if (place.address_components[i].types[0] == "administrative_area_level_2") {
          document.getElementById('city').value = place.address_components[i].long_name;
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
          <a href="{{url('/admin/tourList')}}"><i class="right fas fa-angle-left"></i>Back</a>
          <h1>Add Tour</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Tour</li>
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
                        <span class="bs-stepper-label">Tour Context</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#hotel-policy-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="hotel-policy-part" id="hotel-policy-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Payment Mode & Bank Details</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#facility-service-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="facility-service-part" id="facility-service-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Tour Itinerary</span>
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
                              <label>Tour Name</label>
                              <input type="text" class="form-control" name="tour_title" id="tour_title" placeholder="Enter Name">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tour Description</label>
                              <textarea class="form-control" id="summernoteRemoved" name="tour_description" ></textarea>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tour Locations</label>
                              <textarea class="form-control" id="summernoteRemoved" name="tour_locations" ></textarea>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tour Activities</label>
                              <textarea class="form-control" id="tour_activities" name="tour_activities" ></textarea>
                            </div>
                          </div>

                          <!-- <div class="col-md-12"> -->
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Package Name</label>
                                  <input type="text" class="form-control" id="tour_package_name" name="tour_package_name">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Code</label>
                                  <input type="text" class="form-control" id="tour_code" name="tour_code">
                              </div>
                            </div>
                          <!-- </div> -->

                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="customFile">Tour Gallery</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="tourGallery" name="tourGallery[]" multiple>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                          </div> 

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Tour Featured/Main Image</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="tourFeaturedImg" name="tourFeaturedImg" >
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>  
                          
                          <div class="col-md-12">
                            <div class="col" id="hotelGalleryPreview"></div>
                          </div>

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Contact Details for this Tour</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Name</label>
                              <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Enter Contact Name">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Number</label>
                              <input type="text" class="form-control" name="contact_num" id="contact_num" placeholder="Enter Contact Number">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Alternate Number</label>
                              <input type="text" class="form-control" name="alternate_num" id="alternate_num" placeholder="Enter Alternate Number">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Document</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="tour_document" id="tour_document">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scouts</label>
                              <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;">
                                <option value="">Select Scouts</option>
                                @php $scouts = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get(); @endphp
                                @foreach ($scouts as $value)
                                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Vendor</label>
                              <select class="form-control select2bs4" name="vendor_id" id="vendor_id" style="width: 100%;">
                                <option value="">Select Vendors</option>
                                @php $vendors = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'service_provider')->get(); @endphp
                                @foreach ($vendors as $value)
                                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Tour Term & Condition</label>
                              <textarea class="form-control" id="summernote1Removed" name="tour_term_condition"></textarea>
                            </div>
                          </div>


                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Tour Start/End Date</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Start Date</label>
                              <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Enter start date" >
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>End Date</label>
                              <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Enter end date" >
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Days</label>
                              <input type="text" class="form-control" name="tour_days" id="tour_days" placeholder="Enter tour days" required="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Price</label>
                              <input type="text" class="form-control" name="tour_price" id="tour_price" placeholder="Enter tour price">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <!-- <label>Tour services includes</label> -->
                             <textarea class="form-control" name="tour_services_includes" id="tour_services_includes" hidden=""></textarea>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                             <!--  <label>Tour services not includes</label> -->
                              <textarea class="form-control" name="tour_services_not_includes" id="tour_services_not_includes" hidden=""></textarea>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Type</label>
                              <select class="form-control select2bs4" name="tour_type" id="tour_type" style="width: 100%;">
                                <option value="">Select Tour Type</option>
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="exclusive">Exclusive</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Booking Contact Mobile Nubmer</label>
                              <input type="text" name="booking_contact" id="booking_contact" placeholder="Please enter mobile number" class="form-control">
                            </div>
                          </div>
                          <div class="col-12">
                            <a class="btn btn-primary btn-dark button">Next</a>
                          </div>
                        </div>
                      </div>

                      <div id="hotel-policy-part" class="content slide two" role="tabpanel" aria-labelledby="hotel-policy-part-trigger"> 
                        <div class="row">

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Reservation/Payment mode</h4>
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

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Tour Address</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" name="address" id="address" placeholder="Enter " >
                            </div>
                          </div>

                          <!-- <p>The geographic coordinate</p> -->

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Latitude</label>
                              <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Enter ">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Longitude</label>
                              <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Enter ">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" id="city" placeholder="Enter " >
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Neighborhood / Area</label>
                              <input type="text" class="form-control" name="neighb_area" id="neighb_area" placeholder="Enter Address">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Country</label>
                              <select class="form-control select2bs4" name="country_id" id="country_id" style="width: 100%;" >
                                <!-- <option value="">Select Country</option> -->
                                @foreach ($countries as $cont)
                                <option value="{{ $cont->id }}">{{ $cont->name }}</option>
                                @endforeach
                              </select>
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
                              <label>Tour Price others</label>
                              <input type="text" class="form-control" name="tour_price_others" id="tour_price_others" placeholder="Enter ">
                            </div>
                          </div>

                         
                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>You can deposit money from any Bank</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Bank Name</label>
                              <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name " required="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Account Title</label>
                              <input type="text" class="form-control" name="account_title" id="account_title" placeholder="Enter Account Holder Name " required="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Account Number</label>
                              <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter Account Number" required="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Branch Name</label>
                              <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Enter Branch Name" required="">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>You can also deposit money through Easypaisa and Jazz Cash</h4>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Easypaisa</label>
                              <input type="text" class="form-control" name="easypaisa" id="easypaisa" placeholder="Enter easypaisa number" required="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Jazz Cash</label>
                              <input type="text" class="form-control" name="jazz_cash" id="jazz_cash" placeholder="Enter jazz cash number" required="">
                            </div>
                          </div>
                          <div class="col-12">
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <a class="btn btn-primary btn-dark button">Next</a>
                          </div>
                        </div> 
                      </div>

                      <div id="facility-service-part" class="content slide three" role="tabpanel" aria-labelledby="facility-service-part-trigger"> 
                        <div class="row">
                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Tour Itinerary</h4>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-12 field_wrapper">
                            <div class="form-group" id="extra">
                              <label>Itinerary</label>
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="text" class="form-control mr-2" name="itinerary[0][name]" placeholder="Enter title" value="" required="" />
                                  <ul style="padding: 3px; margin-top: 12px;" class="itinerary">
                                    <li class="d-flex  mb-2" style="align-items: center;"> 
                                     <input type="text" class="form-control mr-2" name="itinerary[0][services][0]" placeholder="services" required="">
                                      <a href="javascript:void(0);" class="add_button_ser" style="padding: 5px; top: 0px;" onclick="addtrips(0,0)">Button </a>
                                    </li>
                                 <!-- <li class="d-flex mb-2" style="align-items: center;"> <input type="text" class="form-control mr-2" name=""><a href="" class="add_button" style="padding: 5px; top: 0px;">Button </a></li> -->
                                   </ul>
                                </div>
                                <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                              </div>
                            </div>
                          </div> 
                          <div class="col-md-12">
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <button class="btn btn-primary btn-dark button float-right" name="submit" id="step_btn1" type="button">Submit</button>
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