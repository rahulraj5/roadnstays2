@extends('admin.layouts.layout')
@section('title', 'User - Profile')

@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
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

  .pip_featured_img {
    display: inline-block;
    margin: 10px 10px 20px 0;
  }

  .remove_featured_img {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  .remove_featured_img:hover {
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

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
  })
</script>
<script>
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
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

<!-- <script type="text/javascript">
  $(function() {
    $('.upload-video-file').on('change', function() {

      if (isVideo($(this).val())) {
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      } else {
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        error_noti("Only video files are allowed to upload.");
      }
    });
  });

  // If user tries to upload videos other than these extension , it will throw error.
  function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
      case 'm4v':
      case 'avi':
      case 'mp4':
      case 'mov':
      case 'mpg':
      case 'mpeg':
        // etc
        return true;
    }
    return false;
  }

  function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
  }
</script> -->

<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#hotelGallery").on("change", function(e) {
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
<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#hotelFeaturedImg").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip_featured_img\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove_featured_img\">Remove image</span>" +
              "</span>").insertAfter("#hotelFeaturedImgPreview");
            $(".remove_featured_img").click(function() {
              $(this).parent(".pip_featured_img").remove();
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
  function deleteConfirmation(Id) {
    toastDelete.fire({}).then(function(e) {
      if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: "{{url('/admin/deleteHotelSingleImage')}}",
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
</script>

<script>
  // $('#std_btn3').click(function() {
  //   var site_url = "<?php echo url('/'); ?>";
  //   $('#addHotelContext_form').on('submit', function(event) {
  //     event.preventDefault();
  //     $.ajaxSetup({
  //       headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //     });

  //     var formData = new FormData(this);

  //     $.ajax({
  //       url: site_url + "/admin/save_profilethree",
  //       type: "POST",
  //       data: formData,
  //       cache: false,
  //       contentType: false,
  //       processData: false,
  //       success: function(response) {
  //         // alert(response);
  //         console.log(response);
  //         if (response.status == true) {
  //           $('#msg3').html('<h3 style="color:green;text-align:center;">' + response.msg + '</h3>');
  //           setTimeout(function() {
  //             $('#msg3').hide();
  //             location.reload(true);
  //           }, 5000);
  //           //$('#step-3').css({"display": "none"});
  //           //$('#step-4').css({"display": "block"});
  //         } else {
  //           $('#msg3').html('<h3 style="color:red;text-align:center;">' + response.msg + '</h3>');
  //           setTimeout(function() {
  //             $('#msg3').hide();
  //             location.reload(true);
  //           }, 5000);
  //           //$('#step-3').css({"display": "none"});
  //           // $('#step-4').css({"display": "block"});
  //         }

  //         //alert(response.msg);
  //       },
  //     });

  //   });
  // });

  // $('#step_btn9').click(function() {
  //   $("#updateHotelContext_form").validate({
  //     debug: false,
  //     rules: {
  //       hotelName: {
  //         required: true,
  //       },
  //       summernote: {
  //         required: true,
  //       },
  //       "hotelGallery[]": {
  //         required: true,
  //         extension: "jpg|jpeg|png",
  //         // filesize: 20971520, 
  //       },
  //       hotelVideo: {
  //         // required: true,
  //         accept: "video/*"
  //       },
  //       cat_listed_room_type: {
  //         required: true,
  //       },
  //       hotel_rating: {
  //         required: true,
  //       },
  //       contact_name: {
  //         required: true,
  //       },
  //       contact_num: {
  //         required: true,
  //         number: true,
  //       },
  //       alternate_num: {
  //         number: true,
  //       },
  //       scout_id: {
  //         required: true,
  //       },
  //       checkin_time: {
  //         required: true,
  //       },
  //       checkout_time: {
  //         required: true,
  //       },
  //       min_day_before_book: {
  //         required: true,
  //         number: true,
  //       },
  //       min_day_stays: {
  //         required: true,
  //         number: true,
  //       },
  //       hotel_latitude: {
  //         number: true,
  //       },
  //       hotel_longitude: {
  //         number: true,
  //       },
  //       // attraction_distance: {
  //       //   required: true,
  //       // },
  //       stay_price: {
  //         required: true,
  //         number: true,
  //       },
  //       extra_price: {
  //         number: true,
  //       },
  //       service_fee: {
  //         number: true,
  //       },
  //       property_type: {
  //         required: true,
  //       },
  //       hotel_address: {
  //         required: true
  //       },
  //       hotel_city: {
  //         required: true
  //       },
  //     },
  //     submitHandler: function(form) {
  //       var site_url = $("#baseUrl").val();
  //       // alert(site_url);
  //       var formData = $(form).serialize();
  //       $(form).ajaxSubmit({
  //         type: 'POST',
  //         url: "{{url('/admin/updateHotel')}}",
  //         data: formData,
  //         success: function(response) {
  //           // console.log(response);
  //           if (response.status == 'success') {
  //             // $("#register_form")[0].reset();
  //             success_noti(response.msg);
  //             // setTimeout(function() {
  //             //   window.location.reload()
  //             // }, 1000);
  //             setTimeout(function() {
  //               window.location.href = site_url + "/admin/hotelList"
  //             }, 1000);
  //           } else {
  //             error_noti(response.msg);
  //           }

  //         }
  //       });
  //       // event.preventDefault();
  //     }
  //   });
  // });

  // $('#step_btn2').click(function() {
  //   $("#addHotelPolicy_form").validate({
  //     debug: false,
  //     // rules: {
  //     //   hotelName: {
  //     //     required: true,
  //     //   },
  //     //   summernote: {
  //     //     required: true,
  //     //   },
  //     // },
  //     submitHandler: function(form) {
  //       var site_url = $("#baseUrl").val();
  //       // alert(site_url);
  //       var formData = $(form).serialize();
  //       $(form).ajaxSubmit({
  //         type: 'POST',
  //         url: "{{url('/admin/submitHotelPolicy')}}",
  //         data: formData,
  //         success: function(response) {
  //           // console.log(response);
  //           if (response.status == 'success') {
  //             // $("#register_form")[0].reset();
  //             success_noti(response.msg);
  //             setTimeout(function() {
  //               window.location.reload()
  //             }, 1000);
  //             // setTimeout(function(){window.location.href=site_url+"/admin/hotelAmenity_list"},1000);
  //           } else {
  //             error_noti(response.msg);
  //           }

  //         }
  //       });
  //       // event.preventDefault();
  //     }
  //   });
  // });

  // $('#step_btn3').click(function() {
  //   $("#addHotelFacilityService_form").validate({
  //     debug: false,
  //     // rules: {
  //     //   hotelName: {
  //     //     required: true,
  //     //   },
  //     //   summernote: {
  //     //     required: true,
  //     //   },
  //     // },
  //     submitHandler: function(form) {
  //       var site_url = $("#baseUrl").val();
  //       // alert(site_url);
  //       var formData = $(form).serialize();
  //       $(form).ajaxSubmit({
  //         type: 'POST',
  //         url: "{{url('/admin/submitHotelPolicy')}}",
  //         data: formData,
  //         success: function(response) {
  //           // console.log(response);
  //           if (response.status == 'success') {
  //             // $("#register_form")[0].reset();
  //             success_noti(response.msg);
  //             setTimeout(function() {
  //               window.location.reload()
  //             }, 1000);
  //             // setTimeout(function(){window.location.href=site_url+"/admin/hotelAmenity_list"},1000);
  //           } else {
  //             error_noti(response.msg);
  //           }

  //         }
  //       });
  //       // event.preventDefault();
  //     }
  //   });
  // });
</script>

<script>
  $(".slide.one .button").click(function() {
    // alert('sdfsd');
    var form = $("#updateHotelContext_form");
    form.validate({
      rules: {
        hotelName: {
          required: true,
        },
        summernote: {
          required: true,
        },
        "hotelGallery[]": {
          // required: true,
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
        min_hrs: {
          number: true,
          required: true,
        },
        min_hrs_percentage: {
          number: true,
          required: true,
          range:[0,100]
        },
        max_hrs: {
          number: true,
          required: true,
        },
        max_hrs_percentage: {
          number: true,
          required: true,
          range:[0,100],
          max: function(element) {
              return $('input[name="min_hrs_percentage"]').val();
          }
        },
        commission: {
          number: true,
        },
        cancel_policy: {
          required: true,
          // wordCount: 5
          // minWordCount: ['5']
          // rangelength:[5,10]
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
        hotel_address: {
          required: true
        },
        hotel_city: {
          required: true
        },
        hotel_latitude: {
          required: true,
          number: true,
        },
        hotel_longitude: {
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

      },
      // messages: {
      //   hotelName: {
      //     required: "Please enter a Hotel Name"
      //   },
      //   summernote: {
      //     required: "Please provide a Hotel Content",
      //   },
      //   // terms: "Please accept our terms"
      // },
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
    var form = $("#updateHotelContext_form");
    form.validate({
      rules: {
        hotel_address: {
          required: true
        },
        hotel_city: {
          required: true
        },
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
    var form = $("#updateHotelContext_form");
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
      // alert(site_url);
      var formData = $(form).serialize();
      $('#step_btn9').prop('disabled', true);
      $('#step_btn9').html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
      );
      // alert(formData);
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateHotel')}}",
        data: formData,
        success: function(response) {
          console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function() {
            //   window.location.reload()
            // }, 1000);
            setTimeout(function() {
              window.location.href = site_url + "/admin/hotelList"
            }, 1000);
          } else {
            error_noti(response.msg);
            $('#step_btn9').html(
              `<span class=""></span>Update`
            );
            $('#step_btn9').prop('disabled', false);
          }

        }
      });
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addAttrButton = $('.add_attraction_button');
    var attrWrapper = $('.field_wrapper_attraction');
    var attractionCount = $('#attraction_count').val();
    if (attractionCount > 0) {
      var x = attractionCount - 1;
    } else {
      var x = attractionCount;
    }
    // console.log(x);

    $(addAttrButton).click(function() {
      if (x < maxField) {
        x++;
        $(attrWrapper).append('<div class="col-md-12"><div class="row"><div class="col-md-5 form-group"><input type="text" class="form-control" name="attraction[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-5 form-group"><input type="text" class="form-control" name="attraction[' + x + '][content]" placeholder="Enter Content" value="" /></div><div class="col-md-5 form-group"><input type="text" class="form-control" name="attraction[' + x + '][distance]" placeholder="Enter Distance" value="" /></div><div class="col-md-5 form-group"><input type="text" class="form-control" name="attraction[' + x + '][type]" placeholder="Enter Type" value="" /></div><span><a href="javascript:void(0);" class="remove_attraction_button">Remove</a></span></div></div>');
      }
    });

    $(attrWrapper).on('click', '.remove_attraction_button', function(e) {
      e.preventDefault();
      $(this).parent().parent('div').remove();
      x--;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var maxField = 10;
    var addServButton = $('.add_service_button');
    var servWrapper = $('.field_wrapper_service');

    var servFeeCount = $('#serv_fee_count').val();
    if (servFeeCount > 0) {
      var x = servFeeCount - 1;
    } else {
      var x = servFeeCount;
    }

    $(addServButton).click(function() {
      if (x < maxField) {
        x++;
        $(servWrapper).append('<div class="form-group"><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="service[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="service[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><div class="form-group"><select class="form-control select2bs4" name="service[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_serv_button">Remove</a></span></div></div>');
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

    var extraOptionCount = $('#extra_option_count').val();
    if (extraOptionCount > 0) {
      var x = extraOptionCount - 1;
    } else {
      var x = extraOptionCount;
    }



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

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jpjQRZn8vu59ElER36Q2LaxptdAghaA&libraries=places"></script>-->

<script type="text/javascript">
  function initialize() {
    var input = document.getElementById('hotel_address');
    var options = document.getElementById("hotel_country").options;
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      console.log(place);
      document.getElementById('hotel_latitude').value = place.geometry.location.lat();
      document.getElementById('hotel_longitude').value = place.geometry.location.lng();
      // document.getElementById('neighb_area').value = place.vicinity;
      for (let i = 0; i < place.address_components.length; i++) {
        if (place.address_components[i].types[0] == "administrative_area_level_2") {
          document.getElementById('hotel_city').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "sublocality_level_1") {
          document.getElementById('neighb_area').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "country") {
          // console.log(place.address_components[i].long_name);
          for (var j = 0; j < options.length; j++) {
            if (options[j].text == place.address_components[i].long_name) {
              options[j].selected = true;
              document.getElementById("select2-hotel_country-container").textContent = options[j].text;
              const getSpan = document.getElementById("select2-hotel_country-container")
              getSpan.setAttribute("title", options[j].text);
              break;
            }
          }
        }
        // if (place.address_components[i].types[0] == "neighborhood") {
        //   document.getElementById('neighb_area').value = place.address_components[i].long_name;
        // }
      }
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
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
          <a href="{{url('/admin/hotelList')}}"><i class="right fas fa-angle-left"></i>Back</a>
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
                      <!-- <input type="hidden" name="old_hotel_notes" id="old_hotel_notes" value="" /> -->
                      <input type="hidden" name="extra_option_count" id="extra_option_count" value="{{ count($hotel_extra_price) }}">
                      <input type="hidden" name="serv_fee_count" id="serv_fee_count" value="{{ count($hotel_service_fee) }}">
                      <input type="hidden" name="attraction_count" id="attraction_count" value="{{ count($hotel_attraction) }}">

                      <div id="hotel-context-part" class="content slide one" role="tabpanel" aria-labelledby="hotel-context-part-trigger">
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
                              <input type="text" class="form-control" name="hotelName" id="hotelName" value="{{(!empty($hotel_info->hotel_name) ? $hotel_info->hotel_name : '')}}" placeholder="Enter Name">
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Hotel Content</label>
                              <textarea class="form-control" id="summernoteRemoved" name="summernote">{{(!empty($hotel_info-> hotel_content) ? $hotel_info-> hotel_content : '')}}</textarea>
                              <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->
                              <!-- </textarea> -->
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="customFile">Hotel Gallery</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="hotelGallery" name="hotelGallery[]" multiple>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="d-flex flex-wrap">
                              @php $hotel_gallery = DB::table('hotel_gallery')->orderby('id', 'ASC')->where('hotel_id', $hotel_info->hotel_id)->get(); @endphp
                              @foreach($hotel_gallery as $image)
                              <div class="image-gridiv" id="hotelGalleryPreview">
                                <span class="pip" id="remove_img_{{$image->id}}">
                                  <img class="imageThumb" src="{{url('public/uploads/hotel_gallery/')}}/{{$image->image}}">
                                  <br /><span class="removeImage" id="@php echo $image->id; @endphp">Remove image</span></span>
                              </div>
                              @endforeach
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="customFile">Hotel Featured/Main Image</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="hotelFeaturedImg" name="hotelFeaturedImg">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            </div>

                            @if((!empty($hotel_info->hotel_gallery)))
                            <div class="col-md-12">
                              <div class="d-flex flex-wrap">
                                <div class="image-gridiv">
                                  <img src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel_info->hotel_gallery}}">
                                </div>
                              </div>
                            </div>
                            @endif
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Hotel Video</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input upload-video-file" name="hotelVideo" id="hotelVideo">
                                <label class="custom-file-label" for="customFile">Choose file</label>

                                @if((!empty($hotel_info->hotel_video)))
                                <div class="col-md-12">
                                  <div class='video-prev' class="pull-right">
                                    <video class="mt-2" width="200" height="150" class="video-preview" controls="controls" />
                                    <source src="{{url('/')}}/public/uploads/hotel_video/{{$hotel_info->hotel_video}}" type="video/mp4">
                                    </video>
                                  </div>
                                </div>
                                @endif
                                <!-- <div class="col-md-12">
                                  <div style="display: none;" class='video-prev' class="pull-right">
                                    <video width="225" height="150" class="video-preview" controls="controls" />
                                  </div>
                                </div> -->
                              </div>
                            </div>
                          </div>



                          <!-- <div class="col-md-6">
                            <div class="form-group">
                              <label>Category</label>
                              <select class="form-control select2bs4" name="cat_listed_room_type" id="cat_listed_room_type" style="width: 100%;">
                                @foreach ($properties as $prop)
                                <option value="{{ $prop->id }}" @php if($hotel_info->cat_listed_room_type == $prop->id){echo "selected";} @endphp >{{ $prop->stay_type }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div> -->

                          <div class="col-sm-6">
                            <label>Is your property listed anywhere else also ?</label>
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
                              <input type="text" class="form-control" name="contact_num" id="contact_num" value="{{(!empty($hotel_info->property_contact_num) ? $hotel_info->property_contact_num : '')}}" placeholder="Enter Contact Number">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Alternate Number</label>
                              <input type="text" class="form-control" name="alternate_num" id="alternate_num" value="{{(!empty($hotel_info->property_alternate_num) ? $hotel_info->property_alternate_num : '')}}" placeholder="Enter Alternate Number">
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
                                @if((!empty($hotel_info->hotel_document)))
                                <a href="{{ url('public/uploads/hotel_document') }}/{{ $hotel_info->hotel_document }}" download>{{ $hotel_info->hotel_document }}</a>
                                @endif
                              </div>
                            </div>
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scouts ID</label>
                              <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;">
                                <!-- <option value="">Select Scouts</option> -->
                                @php $scouts = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->where('status',1)->get(); @endphp
                                @foreach ($scouts as $value)
                                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Hotel Notes</label>
                              <textarea class="form-control" id="summernote1Removed" name="hotel_notes">{{(!empty($hotel_info-> hotel_notes) ? $hotel_info-> hotel_notes : '')}}</textarea>
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
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button> -->
                            <!-- <button type="submit" id="step_btn1" class="btn btn-primary">Submit</button> -->

                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn1" type="submit">Submit</button> -->
                            <!-- <a class="btn btn-primary btn-dark" onclick="stepper.next()">Next</a> -->
                            <a class="btn btn-primary btn-dark button">Next</a>
                          </div>
                        </div>

                        <!-- </form> -->
                        <!-- <button class="btn btn-primary btn-dark" onclick="stepper.next()">Next</button> -->
                      </div>

                      <div id="hotel-policy-part" class="content slide two" role="tabpanel" aria-labelledby="hotel-policy-part-trigger">
                        <!-- <form method="POST" id="addHotelPolicy_form"> -->
                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

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
                                    <input class="custom-control-input" type="radio" id="payment_mode1" name="payment_mode" value="1" @php if($hotel_info->payment_mode == 1){echo 'checked';} @endphp>
                                    <label for="payment_mode1" class="custom-control-label">Pay now 100%</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="payment_mode2" name="payment_mode" value="2" @php if($hotel_info->payment_mode == 2){echo 'checked';} @endphp>
                                    <label for="payment_mode2" class="custom-control-label">Partial Payment (Like 30% Online & 70% at Desk )</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="payment_mode3" name="payment_mode" value="0" @php if($hotel_info->payment_mode == 0){echo 'checked';} @endphp>
                                    <label for="payment_mode3" class="custom-control-label">Pay at Hotel 100%</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="row <? if ($hotel_info->payment_mode != 2) {
                                              echo 'd-none';
                                            } ?>" id="partial_payment_div">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Online Payment Percentage</label>
                                  <input type="text" class="form-control" name="online_payment_percentage" id="online_payment_percentage" placeholder="Enter Online Percentage" value="{{(!empty($hotel_info->online_payment_percentage) ? $hotel_info->online_payment_percentage : '')}}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>At Desk Payment Percentage</label>
                                  <input type="text" class="form-control" name="at_desk_payment_percentage" id="at_desk_payment_percentage" placeholder="Enter Offline Percentage" value="{{(!empty($hotel_info->at_desk_payment_percentage) ? $hotel_info->at_desk_payment_percentage : '')}}">
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

                          <!-- cancellation & policy start here -->

                          <!-- <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Cancellation and Refund</h4>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label>Cancellation and Refund</label>
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="cancellation_mode1" name="cancellation_mode" value="0" @php if($hotel_info->cancellation_mode == 0){echo 'checked';} @endphp>
                                    <label for="cancellation_mode1" class="custom-control-label">Free cancellation</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="cancellation_mode2" name="cancellation_mode" value="1" @php if($hotel_info->cancellation_mode == 1){echo 'checked';} @endphp>
                                    <label for="cancellation_mode2" class="custom-control-label">value (no. of day)</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="cancellation_mode3" name="cancellation_mode" value="2" @php if($hotel_info->cancellation_mode == 2){echo 'checked';} @endphp>
                                    <label for="cancellation_mode3" class="custom-control-label">Cancellation time period</label>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-12 <? if ($hotel_info->cancellation_mode != 1) {
                                                      echo 'd-none';
                                                    } ?>" id="cancel_num_of_days_div">
                                <div class="row">
                                  <div class="col-sm-3">
                                  </div>
                                  <div class="col-sm-5">
                                    <div class="form-group">
                                      <label>No. of Days</label>
                                      <input type="text" class="form-control" name="cancel_num_of_days" id="cancel_num_of_days" value="{{(!empty($hotel_info->num_of_days_cancellation) ? $hotel_info->num_of_days_cancellation : '')}}" placeholder="no. of days">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-12 <? if ($hotel_info->cancellation_mode != 2) {
                                                      echo 'd-none';
                                                    } ?>" id="cancel_time_period_div">
                                <div class="row">
                                  <div class="col-sm-8">
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="cancel_time_period1" name="cancel_time_period" value="1" @php if($hotel_info->cancel_time_period == 1){echo 'checked';} @endphp>
                                            <label for="cancel_time_period1" class="custom-control-label">24hrs</label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="cancel_time_period2" name="cancel_time_period" value="2" @php if($hotel_info->cancel_time_period == 2){echo 'checked';} @endphp>
                                            <label for="cancel_time_period2" class="custom-control-label">48hrs</label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="cancel_time_period3" name="cancel_time_period" value="3" @php if($hotel_info->cancel_time_period == 3){echo 'checked';} @endphp>
                                            <label for="cancel_time_period3" class="custom-control-label">7 days</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->


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
                              <textarea class="form-control" id="summernote2Removed" name="cancel_policy">{{(!empty($hotel_info->cancel_policy) ? $hotel_info->cancel_policy : '')}}</textarea>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Min. Hrs. (# of Hours <= from check in)</label>
                                      <input type="text" class="form-control" name="min_hrs" id="min_hrs" value="{{(!empty($hotel_info->min_hrs) ? $hotel_info->min_hrs : '')}}" placeholder="hrs.">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Deduction (%)</label>
                                  <input type="text" class="form-control" name="min_hrs_percentage" id="min_hrs_percentage" value="{{(!empty($hotel_info->min_hrs_percentage) ? $hotel_info->min_hrs_percentage : '')}}" placeholder="percentage">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Max. Hrs. (# of Hours <= from check in)</label>
                                      <input type="text" class="form-control" name="max_hrs" id="max_hrs" value="{{(!empty($hotel_info->max_hrs) ? $hotel_info->max_hrs : '')}}" placeholder="hrs">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Deduction (%)</label>
                                  <input type="text" class="form-control" name="max_hrs_percentage" id="max_hrs_percentage" value="{{(!empty($hotel_info->max_hrs_percentage) ? $hotel_info->max_hrs_percentage : '')}}" placeholder="percentage">
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- <div class="col-sm-3">
                            <div class="form-group">
                              <label>No. of Days (for 48 hrs)</label>
                              <input type="text" class="form-control" name="48_cancel_num_of_days" id="48_cancel_num_of_days" value="{{(!empty($hotel_info->num_of_days_cancellation) ? $hotel_info->num_of_days_cancellation : '')}}" placeholder="no. of days">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Deduction Percentage on cancel</label>
                              <input type="text" class="form-control" name="48_deduction_percentage" id="48_deduction_percentage" value="{{(!empty($hotel_info->deduction_percentage) ? $hotel_info->deduction_percentage : '')}}" placeholder="percentage">
                            </div>
                          </div> -->



                          <!-- <div class="col-md-12 field_wrapper_refund">
                            <div class="form-group" id="refund_div">
                              <label>Refund Policy</label>

                              @if(count($hotel_service_fee) > 0) -->
                          <!-- hotel_refund -->
                          <!-- @foreach ($hotel_service_fee as $key=>$value)

                              <div class="row form-group">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="refund[@php echo $key; @endphp][min_refund_day]" placeholder="Enter Day" value="{{ $value->min_refund_day ?? '' }}" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="refund[@php echo $key; @endphp][deduct_percentage]" placeholder="Enter Percentage" value="{{ $value->deduct_percentage ?? '' }}" />
                                </div>
                                @if($key == 0)
                                <span><a href="javascript:void(0);" class="add_refund_button" title="Add field">Add</a></span>
                                @else
                                <span><a href="javascript:void(0);" class="remove_refund_button" title="Add field">Remove</a></span>
                                @endif
                              </div>

                              @endforeach

                              @else

                              <div class="row">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="refund[0][min_refund_day]" placeholder="Enter Day" value="" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="refund[0][deduct_percentage]" placeholder="Enter Percentage" value="" />
                                </div>
                                <span><a href="javascript:void(0);" class="add_refund_button" title="Add field">Add</a></span>
                              </div>

                              @endif

                            </div>
                          </div> -->

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
                              <input type="text" class="form-control" name="commission" id="commission" placeholder="Enter Commission" value="{{(!empty($hotel_info->commission) ? $hotel_info->commission : '')}}">
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
                              <input type="text" class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter " value="{{(!empty($hotel_info->hotel_address) ? $hotel_info->hotel_address : '')}}">
                            </div>
                          </div>

                          <!-- <p>The geographic coordinate</p> -->

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Latitude</label>
                              <input type="text" class="form-control" name="hotel_latitude" id="hotel_latitude" placeholder="Enter " value="{{(!empty($hotel_info->hotel_latitude) ? $hotel_info->hotel_latitude : '')}}">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Longitude</label>
                              <input type="text" class="form-control" name="hotel_longitude" id="hotel_longitude" placeholder="Enter " value="{{(!empty($hotel_info->hotel_longitude) ? $hotel_info->hotel_longitude : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="hotel_city" id="hotel_city" placeholder="Enter " value="{{(!empty($hotel_info->hotel_city) ? $hotel_info->hotel_city : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Neighborhood / Area</label>
                              <input type="text" class="form-control" name="neighb_area" id="neighb_area" placeholder="Enter Address" value="{{(!empty($hotel_info->neighb_area) ? $hotel_info->neighb_area : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Country</label>
                              <select class="form-control select2bs4" name="hotel_country" id="hotel_country" style="width: 100%;">
                                <!-- <option value="">Select Country</option> -->
                                @foreach ($countries as $cont)
                                <option value="{{ $cont->id }}" @php if($hotel_info->hotel_country == $cont->id){echo "selected";} @endphp >{{ $cont->nicename }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="tab-custom-content">
                              <p class="lead mb-0">
                              <h4>Attractions</h4>
                              </p>
                            </div>
                          </div>

                          <div class="col-md-12 field_wrapper_attraction">
                            <div class="form-group" id="attraction">
                              <label>Attractions Details</label>

                              @if(count($hotel_attraction) > 0)

                              @foreach ($hotel_attraction as $key=>$value)
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->attraction_name }}" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[@php echo $key; @endphp][content]" placeholder="Enter Content" value="{{ $value->attraction_content }}" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[@php echo $key; @endphp][distance]" placeholder="Enter Distance" value="{{ $value->attraction_distance }}" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[@php echo $key; @endphp][type]" placeholder="Enter type" value="{{ $value->attraction_type }}" />
                                  </div>
                                  @if($key == 0)
                                  <span><a href="javascript:void(0);" class="add_attraction_button" title="Add field">Add</a></span>
                                  @else
                                  <span><a href="javascript:void(0);" class="remove_attraction_button" title="Remove field">Remove</a></span>
                                  @endif
                                </div>
                              </div>
                              @endforeach

                              @else
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[0][name]" placeholder="Enter Name" value="" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[0][content]" placeholder="Enter Content" value="" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[0][distance]" placeholder="Enter Distance" value="" />
                                  </div>
                                  <div class="col-md-5 form-group">
                                    <input type="text" class="form-control" name="attraction[0][type]" placeholder="Enter type" value="" />
                                  </div>
                                  <span><a href="javascript:void(0);" class="add_attraction_button" title="Add field">Add</a></span>
                                </div>
                              </div>
                              @endif
                            </div>
                          </div>


                          <!-- <div class="col-md-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="attraction_name" id="attraction_name" placeholder="Enter " value="{{(!empty($hotel_info->attraction_name) ? $hotel_info->attraction_name : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Content</label>
                              <input type="text" class="form-control" name="attraction_content" id="attraction_content" placeholder="Enter " value="{{(!empty($hotel_info->attraction_content) ? $hotel_info->attraction_content : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Distance</label>
                              <input type="text" class="form-control" name="attraction_distance" id="attraction_distance" placeholder="Enter " value="{{(!empty($hotel_info->attraction_distance) ? $hotel_info->attraction_distance : '')}}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" name="attraction_type" id="attraction_type" placeholder="Enter " value="{{(!empty($hotel_info->attraction_type) ? $hotel_info->attraction_type : '')}}">
                            </div>
                          </div> -->

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
                              <input type="text" class="form-control" name="stay_price" id="stay_price" placeholder="Enter " required="required" value="{{(!empty($hotel_info->stay_price) ? $hotel_info->stay_price : '')}}">
                            </div>
                          </div>

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Extra Price</h4>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-12 field_wrapper">
                            <div class="form-group" id="extra">
                              <label>Extra Price Details</label>

                              @if(count($hotel_extra_price) > 0)

                              @foreach ($hotel_extra_price as $key=>$value)

                              <div class="row form-group">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="extra[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->ext_opt_name }}" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="extra[@php echo $key; @endphp][price]" placeholder="Enter Price" value="{{ $value->ext_opt_price }}" />
                                </div>
                                <!-- <div class="col-md-3">
                                    <input type="text" class="form-control" name="extra[@php echo $key; @endphp][type]" placeholder="Enter type" value="{{ $value->ext_opt_type }}" />
                                  </div> -->
                                <div class="col-md-3">
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

                              @endif



                            </div>
                          </div>

                          <div class="col-md-12 mt-0">
                            <div class="tab-custom-content mt-0">
                              <p class="lead mb-0">
                              <h4>Service Fee</h4>
                              </p>
                            </div>
                          </div>
                          <div class="col-md-12 field_wrapper_service">
                            <div class="form-group" id="service_div">
                              <label>Service Fee</label>

                              @if(count($hotel_service_fee) > 0)

                              @foreach ($hotel_service_fee as $key=>$value)

                              <div class="row form-group">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="service[@php echo $key; @endphp][name]" placeholder="Enter Name" value="{{ $value->serv_fee_name }}" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="service[@php echo $key; @endphp][price]" placeholder="Enter Price" value="{{ $value->serv_fee_price }}" />
                                </div>
                                <!-- <div class="col-md-3">
                                    <input type="text" class="form-control" name="service[@php echo $key; @endphp][type]" placeholder="Enter type" value="{{ $value->serv_fee_type }}" />
                                  </div> -->
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <select class="form-control select2bs4" name="service[@php echo $key; @endphp][type]" style="width: 100%;">
                                      <option value="">Select Price type</option>
                                      <option value="single_fee" {{ $value->serv_fee_type == "single_fee" ? 'selected' : '' }}>Single fee</option>
                                      <option value="per_night" {{ $value->serv_fee_type == "per_night" ? 'selected' : '' }}>Per night</option>
                                      <option value="per_guest" {{ $value->serv_fee_type == "per_guest" ? 'selected' : '' }}>Per guest</option>
                                      <option value="per_night_per_guest" {{ $value->serv_fee_type == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>
                                    </select>
                                  </div>
                                </div>
                                @if($key == 0)
                                <span><a href="javascript:void(0);" class="add_service_button" title="Add field">Add</a></span>
                                @else
                                <span><a href="javascript:void(0);" class="remove_serv_button" title="Add field">Remove</a></span>
                                @endif
                              </div>

                              @endforeach

                              @else

                              <div class="row">
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="service[0][name]" placeholder="Enter Name" value="" />
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="service[0][price]" placeholder="Enter Price" value="" />
                                </div>
                                <!-- <div class="col-md-3">
                                  <input type="text" class="form-control" name="service[0][type]" placeholder="Enter type" value="" />
                                </div> -->
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <select class="form-control select2bs4" name="service[0][type]" style="width: 100%;">
                                      <option value="">Select Price type</option>
                                      <option value="single_fee">Single fee</option>
                                      <option value="per_night">Per night</option>
                                      <option value="per_guest">Per guest</option>
                                      <option value="per_night_per_guest">Per night per guest</option>
                                    </select>
                                  </div>
                                </div>
                                <span><a href="javascript:void(0);" class="add_service_button" title="Add field">Add</a></span>
                              </div>

                              @endif




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
                              <select class="form-control select2bs4" name="property_type" id="property_type" style="width: 100%;">
                                <!-- <option value="">Select Hotel Category</option> -->
                                @foreach ($properties as $prop)
                                <option value="{{ $prop->id }}" @php if($hotel_info->property_type == $prop->id){echo "selected";} @endphp >{{ $prop->stay_type }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>


                          <div class="col-12">
                            <!-- <button type="submit" id="step_btn2" class="btn btn-primary">Submit</button> -->
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn2" type="submit">Submit</button> -->
                            <!-- <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <a class="btn btn-primary btn-dark" onclick="stepper.next()">Next</a> -->
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <a class="btn btn-primary btn-dark button">Next</a>
                          </div>
                        </div>

                        <!-- </form> -->
                        <!-- <button class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</button>
                          <button class="btn btn-primary btn-dark" onclick="stepper.next()">Next</button> -->
                      </div>

                      <div id="facility-service-part" class="content slide three" role="tabpanel" aria-labelledby="facility-service-part-trigger">
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
                          @php $amenities = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',$value->id)->where('status',1)->get(); @endphp
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>{{$value->name}}</label>
                              <select class="form-control select2bs4" multiple="multiple" name="amenity[]" id="amenity_{{$value->id}}" data-placeholder="Select Room Amenities" style="width: 100%;">
                                <!-- <option value="">Select Room Amenities</option> -->
                                @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->amenity_id }}" <?php if (in_array($amenity->amenity_id, $hotel_amenities)) {
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
                          @php $hotel_services_count = DB::table('H3_Services')->where('service_type_id',$value->id)->count(); @endphp

                          @if($hotel_services_count > 0)
                          @php $services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type_id',$value->id)->where('status',1)->get(); @endphp
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>{{$value->name}}</label>
                              <select class="form-control select2bs4" multiple="multiple" name="services[]" id="service_{{$value->id}}" data-placeholder="Select {{$value->name}}" style="width: 100%;">
                                <!-- <option value="">Select Room Amenities</option> -->

                                @foreach ($services as $service)
                                <option value="{{ $service->id }}" <?php if (in_array($service->id, $hotel_services)) {
                                                                      echo 'selected';
                                                                    } ?>>{{ $service->service_name }}</option>
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
                                        <input type="text" class="form-control" name="parking_price" id="parking_price" placeholder="PKR" value="{{(!empty($hotel_info->parking_price) ? $hotel_info->parking_price : '')}}">
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
                                    <input type="text" class="form-control" name="breakfast_cost" id="breakfast_cost" placeholder="Price" value="{{(!empty($hotel_info->breakfast_cost) ? $hotel_info->breakfast_cost : '')}}">
                                  </div>
                                </div>

                                <!-- <div class="col-sm-12 <? if ($hotel_info->breakfast_availability == 0) {
                                                              echo 'd-none';
                                                            } ?>" id="breakfast_price_type_div">
                                  <div class="form-group">
                                    <label>What kind of breakfast is available?</label>
                                    <select class="form-control select2bs4" multiple="multiple" name="breakfast_type[]" id="breakfast_type" style="width: 100%;">
                                      @php $breakfast_type = DB::table('breakfast_type')->orderby('bfast_id', 'ASC')->get(); @endphp
                                      @foreach ($breakfast_type as $value)
                                      <option value="{{ $value->bfast_id }}">{{ $value->name }}</option>
                                      @endforeach

                                    </select>
                                  </div>
                                </div> -->

                              </div>
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
                              <input type="text" class="form-control" name="operator_name" id="operator_name" value="{{$hotel_info->operator_name}}" placeholder="Enter Operator Name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Operator Contact Name</label>
                              <input type="text" class="form-control" name="operator_contact_name" id="operator_contact_name" value="{{$hotel_info->operator_contact_name}}" placeholder="Enter Contact Name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Operator Contact Number</label>
                              <input type="text" class="form-control" name="operator_contact_num" id="operator_contact_num" value="{{$hotel_info->operator_contact_num}}" placeholder="Enter Contact Number">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Operator Email</label>
                              <input type="text" class="form-control" name="operator_email" id="operator_email" value="{{$hotel_info->operator_email}}" placeholder="Enter Operator Email">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Operator Booking Number</label>
                              <input type="text" class="form-control" name="operator_booking_num" id="operator_booking_num" value="{{$hotel_info->operator_booking_num}}" placeholder="Enter Operator Booking Number">
                            </div>
                          </div>

                          <!-- checking for the other option added end here -->

                          <div class="col-md-12">
                            <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                            <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn3" type="submit">Submit</button> -->
                            <button class="btn btn-primary btn-dark button float-right" name="submit" id="step_btn9" type="button"><span class=""></span>Update</button>
                          </div>
                        </div>

                        <!-- </form> -->

                      </div>

                    </form>


                  </div>
                </div>
              </div>
              <!-- /.card-body -->

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