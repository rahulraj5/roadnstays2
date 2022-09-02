@extends('admin.layout.layout')

@section('title', 'User - Profile')

@section('current_page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
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

  .pip_front {
    display: inline-block;
    margin: 10px 10px 20px 0;
  }

  .remove_front_img {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  .remove_front_img:hover {
    background: white;
    color: black;
  }

  .iti {
    display: block !important;
  }

  .hide-new {
    display: none;
  }

  /* .intl-tel-input .hide,
  .hide-new {
    display: none;
  }

  .intl-tel-input .v-hide {
    visibility: hidden;
  }

  .iti__hide {
    display: none;
  }

  .iti__v-hide {
    visibility: hidden;
  } */
</style>
@endsection

@section('current_page_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- for mobile number 1 start here -->

<!-- <script>
  let countryCode1 = $('#countryCode').val();
  let countryCode2 = $('#countryCode1').val();
  let countryCode3 = $('#countryCode2').val();

  // console.log(countryCode1);
  // iti__flag
  // console.log('iti__'+countryCode1);
  // console.log('iti__'+countryCode2);
  // console.log('iti__'+countryCode3);

  const num1_addClass = 'iti__'+countryCode1;
  const num2_addClass = 'iti__'+countryCode2;
  const num3_addClass = 'iti__'+countryCode3;

  console.log(num1_addClass);
  // $('li:nth-child(2)').addClass('active');
  // $('.iti__flag').addClass(num1_addClass);

  // $(document).ready(function() {
  //   // console.log('ready !');
  //   // alert($("div").hasClass("iti__flag"));
  //   if($("div").hasClass("iti__flag")){
  //     // $(this).addClass(num1_addClass);
  //     // console.log($(this));
  //     $("div").addClass(num1_addClass);
  //   }
  //   // $('div:nth-child(2)').addClass('active');

  //   // if($("div").hasClass("abcde")){
  //   //   // $(this).addClass(num1_addClass);
  //   //   console.log($(this));
  //   //   $("div").removeClass('abcde');
  //   // }
    
  // });

  $(document).ready(function() {
    // if($("div").hasClass("iti__flag")){
    //   $("div").addClass(num1_addClass);
    // }
    // if($("#country_code1")){
    if($("div").hasClass("country_code1")){
      // console.log($('#test').attr('id'));
      // if($("div").hasClass("iti__flag")){
        // $("div").addClass(num1_addClass);
        // $('div:nth-child(2)').addClass(num1_addClass);
        // $('div:nth-child(2)').addClass(num1_addClass);
        $('#country_code1 div div div div').addClass(num1_addClass);
      // }
    }
    // if($("div").hasClass("country_code2")){
    //   // console.log($('#test').attr('id'));
    //   if($("div").hasClass("iti__flag")){
    //     $("div").addClass(num2_addClass);
    //   }
    // }
    // if($("div").hasClass("country_code3")){
    //   // console.log($('#test').attr('id'));
    //   if($("div").hasClass("iti__flag")){
    //     $("div").addClass(num3_addClass);
    //   }
    // }
  });
  
  // if($("div").hasClass('iti__flag')){
  //   alert('hi');
  // }
</script> -->

<!-- <script>
  let countryCode1 = $('#countryCode').val();
  let countryCode2 = $('#countryCode1').val();
  let countryCode3 = $('#countryCode2').val();
  const num1_addClass = 'iti__'+countryCode1;
  const num2_addClass = 'iti__'+countryCode2;
  const num3_addClass = 'iti__'+countryCode3;
  $(document).ready(function() {
    // $("[aria-controls=iti-0__country-listbox]").children().addClass(num1_addClass);
    // $("[aria-controls=iti-0__country-listbox] div").eq(0).addClass(num1_addClass);
    $("[aria-controls=iti-0__country-listbox] div:first").addClass(num1_addClass);
    // $("aria-controls[attribute='iti-0__country-listbox']:first-child").addClass(num1_addClass);
    // $("aria-controls[attribute='iti-1__country-listbox']:first-child").addClass(num2_addClass);
    // $("aria-controls[attribute='iti-2__country-listbox']:first-child").addClass(num3_addClass);
    // if($("div").hasClass("country_code1")){
    //   // $('#country_code1 div div div div').addClass(num1_addClass);
    //   if($("div").hasClass("iti__selected-flag")){
    //     $("div").children("div.iti__flag").addClass(num1_addClass);
    //   }
    //   // $('#country_code1.div:nth-of-type(4n+1)').addClass(num1_addClass);
    // }
    // if($("div").hasClass("country_code2")){
    //   // $('#country_code2 div div div div').addClass(num2_addClass);
    // }
    // if($("div").hasClass("country_code3")){
    //   // $('#country_code3 div div div div').addClass(num3_addClass);
    // }
  });
  // $(document).ready(function() {
  //     $('.iti__flag-container').click(function() { 
  //       // var countryCode = $('.iti__selected-flag').attr('title');
  //       // console.log(countryCode);
  //       // var countryCode = countryCode.replace(/[^0-9]/g,'');
  //       // $('#contact_number').val("");
  //       // $('#contact_number').val("+"+countryCode+" "+ $('#contact_number').val());
  //     });
  // });
</script> -->

<script>country_dialcode
  let countryCode1 = $('#countryCode').val();
  let country_dialcode1 = $('#country_dialcode').val();
  // console.log(country_dialcode1);
  let countryCode2 = $('#countryCode1').val();
  let country_dialcode2 = $('#country_dialcode2').val();
  let countryCode3 = $('#countryCode2').val();
  let country_dialcode3 = $('#country_dialcode3').val();
  const num1_addClass = 'iti__'+countryCode1;
  const num2_addClass = 'iti__'+countryCode2;
  const num3_addClass = 'iti__'+countryCode3;
  $(document).ready(function() {
    $("[aria-controls=iti-0__country-listbox] div").eq(0).addClass(num1_addClass);
    $("[aria-controls=iti-0__country-listbox] div").eq(1).val("+"+country_dialcode1);

    $("[aria-controls=iti-1__country-listbox] div").eq(0).addClass(num2_addClass);
    $("[aria-controls=iti-1__country-listbox] div").eq(1).val("+"+country_dialcode2);

    $("[aria-controls=iti-2__country-listbox] div").eq(0).addClass(num3_addClass);
    $("[aria-controls=iti-2__country-listbox] div").eq(1).val("+"+country_dialcode3);
    // $('.iti__selected-dial-code').val("+"+country_dialcode1);
  
  });
  // $(document).ready(function() {
  //     $('.iti__flag-container').click(function() { 
  //       // var countryCode = $('.iti__selected-flag').attr('title');
  //       // console.log(countryCode);
  //       // var countryCode = countryCode.replace(/[^0-9]/g,'');
  //       // $('#contact_number').val("");
  //       // $('#contact_number').val("+"+countryCode+" "+ $('#contact_number').val());
  //     });
  // });
</script>
<script>
  // let countryCode1 = $('#countryCode').val();
  var input = document.querySelector("#contact_number"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var intl = window.intlTelInput(input, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    separateDialCode: true ,
    // initialCountry: countryCode1,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide-new");
      validMsg.classList.add("hide-new");
  };

  function getIp(callback) {
      fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
      .then((resp) => resp.json())
      .catch(() => {
          return {
          country: 'us',
          };
      }).then((resp) => callback(resp.country));
  }

  // Validate on blur event
  input.addEventListener('blur', function() {
      reset();
      if(input.value.trim()){
          if(intl.isValidNumber()){
              validMsg.classList.remove("hide-new");
              // console.log(intl.getSelectedCountryData());
              // console.log(intl.getSelectedCountryData().iso2);
              $("#countryCode").val(intl.getSelectedCountryData().iso2);
              $("#country_dialcode").val(intl.getSelectedCountryData().dialCode);
          }else{
              input.classList.add("error");
              var errorCode = intl.getValidationError();
              errorMsg.innerHTML = errorMap[errorCode];
              errorMsg.classList.remove("hide-new");
          }
      }
  });

  // $("#phone").on("blur keyup change countrychange", function() {
  //   var getName = intl.selectedCountryData["name"];
  //   var getCode = intl.selectedCountryData["dialCode"];
  //   $("#lead_country_name").val(getName);//You will get only phone number without country code
  //   $("#countryCode").val(getCode);//You will get country code only
  //   console.log(getName);
  //   console.log(getCode);
  // });
  // Reset on keyup/change event
  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);
</script>
<!-- for mobile number 2 start here -->
<script>
  var input1 = document.querySelector("#tour_operator_contact_num"),
    errorMsg1 = document.querySelector("#error-msg1"),
    validMsg1 = document.querySelector("#valid-msg1");

  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var intl1 = window.intlTelInput(input1, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    separateDialCode: true ,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  var reset = function() {
      input1.classList.remove("error");
      errorMsg1.innerHTML = "";
      errorMsg1.classList.add("hide-new");
      validMsg1.classList.add("hide-new");
  };

  function getIp(callback) {
      fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
      .then((resp) => resp.json())
      .catch(() => {
          return {
          country: 'us',
          };
      }).then((resp) => callback(resp.country));
  }

  // Validate on blur event
  input1.addEventListener('blur', function() {
      reset();
      if(input1.value.trim()){
          if(intl1.isValidNumber()){
              validMsg1.classList.remove("hide-new");
              $("#countryCode1").val(intl1.getSelectedCountryData().iso2);
              $("#country_dialcode1").val(intl1.getSelectedCountryData().dialCode);
          }else{
              input1.classList.add("error");
              var errorCode1 = intl1.getValidationError();
              errorMsg1.innerHTML = errorMap[errorCode1];
              errorMsg1.classList.remove("hide-new");
          }
      }
  });
  // Reset on keyup/change event
  input1.addEventListener('change', reset);
  input1.addEventListener('keyup', reset);
</script>
<!-- for mobile number 3 start here -->
<script>
  var input2 = document.querySelector("#tour_operator_booking_num"),
    errorMsg2 = document.querySelector("#error-msg2"),
    validMsg2 = document.querySelector("#valid-msg2");

  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var intl2 = window.intlTelInput(input2, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    separateDialCode: true ,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  var reset = function() {
      input2.classList.remove("error");
      errorMsg2.innerHTML = "";
      errorMsg2.classList.add("hide-new");
      validMsg2.classList.add("hide-new");
  };

  function getIp(callback) {
      fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
      .then((resp) => resp.json())
      .catch(() => {
          return {
          country: 'us',
          };
      }).then((resp) => callback(resp.country));
  }

  // Validate on blur event
  input2.addEventListener('blur', function() {
      reset();
      if(input2.value.trim()){
          if(intl2.isValidNumber()){
              validMsg2.classList.remove("hide-new");
              $("#countryCode2").val(intl2.getSelectedCountryData().iso2);
              $("#country_dialcode2").val(intl2.getSelectedCountryData().dialCode);
          }else{
              input2.classList.add("error");
              var errorCode2 = intl2.getValidationError();
              errorMsg2.innerHTML = errorMap[errorCode2];
              errorMsg2.classList.remove("hide-new");
          }
      }
  });
  // Reset on keyup/change event
  input2.addEventListener('change', reset);
  input2.addEventListener('keyup', reset);
</script>

<script>
  $('#tour_operator_document').on('change', function(e) {
    var fileName = e.target.files[0].name;
    $('#documentPreview').html(fileName);
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#tour_operator_img").on("change", function(e) {
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
              "</span>").insertAfter("#imgPreview");
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
<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#tour_operator_id_front_img").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip_front\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove_front_img\">Remove image</span>" +
              "</span>").insertAfter("#idFrontImgPreview");
            $(".remove_front_img").click(function() {
              $(this).parent(".pip_front").remove();
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
      $("#tour_operator_id_back_img").on("change", function(e) {
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
              "</span>").insertAfter("#idBackImgPreview");
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
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Edit Service Provider</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Edit Service Provider</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-info card-outline">
        <!-- <div class="card-header"> -->
          <!-- <h3 class="card-title">Service Provider Form</h3> -->
          <!-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div> -->
        <!-- </div> -->

        <!-- /.card-header -->

        <div class="card-body">

          <form method="POST" id="servProUpdateAdmin_form">
            <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
            <input type="hidden" name="user_id" id="user_id" value="{{(!empty($user_info->id) ? $user_info->id : '')}}" />
            <input type="hidden" name="old_vendor_document" id="old_vendor_document" value="{{(!empty($user_info->tour_op_document) ? $user_info->tour_op_document : '')}}">

            <input type="hidden" name="old_operator_img" id="old_operator_img" value="{{(!empty($user_info->tour_op_img) ? $user_info->tour_op_img : '')}}">
            <input type="hidden" name="old_id_front_img" id="old_id_front_img" value="{{(!empty($user_info->tour_op_id_front_img) ? $user_info->tour_op_id_front_img : '')}}">
            <input type="hidden" name="old_id_back_img" id="old_id_back_img" value="{{(!empty($user_info->tour_op_id_back_img) ? $user_info->tour_op_id_back_img : '')}}">

            <div class="row">
              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-2">
                  <h4>Service Provider Details</h4>
                  </p>
                </div>
              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>First Name</label>

                  <input type="text" class="form-control" name="fnameup" id="fname" placeholder="Enter First Name" value="{{(!empty($user_info->first_name) ? $user_info->first_name : '')}}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Last Name</label>

                  <input type="text" class="form-control" name="lnameup" id="lname" placeholder="Enter Last Name" value="{{(!empty($user_info->last_name) ? $user_info->last_name : '')}}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group abcde">

                  <label>Email</label>

                  <input type="email" class="form-control" name="emailup" id="email" placeholder="Enter Email" value="{{(!empty($user_info->email) ? $user_info->email : '')}}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group country_code1" id="country_code1">

                  <label>Mobile Number</label>
                  <input type="hidden" id="country_dialcode" name="country_dialcode" value="{{ (!empty($user_info->num_dialcode_1) ? $user_info->num_dialcode_1 : '') }}" />
                  <input type="hidden" name="countryCode" id="countryCode" value="{{ (!empty($user_info->country_iso2_code1) ? $user_info->country_iso2_code1 : '') }}">
                  <input type="number" class="form-control" name="contact_numberup" id="contact_number" placeholder="Enter Number" value="{{(!empty($user_info->contact_number) ? $user_info->contact_number : '')}}">
                  <span id="valid-msg" class="hide-new">✓ Valid</span>
                  <span id="error-msg" class="hide-new"></span>
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Phone (Landline)</label>
                  <input type="text" class="form-control" name="landline_number" id="landline_number" value="{{(!empty($user_info->landline_number) ? $user_info->landline_number : '')}}" placeholder="Enter Phone Number">
                </div>
              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Temporary Password</label>

                  <input type="password" class="form-control" name="passwordup" id="password" placeholder="Enter Password" autocomplete="new-password">

                </div>

              </div>

              <!-- <div class="col-md-6">

                <div class="form-group">

                  <label>Confirm Password</label>

                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">

                </div>

              </div> -->

              <div class="col-md-12">

                <div class="form-group">

                  <label>Address</label>

                  <input type="text" class="form-control" name="addressup" id="address" placeholder="Enter Address" value="{{(!empty($user_info->address) ? $user_info->address : '')}}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>City</label>

                  <input type="text" class="form-control" name="cityup" id="city" placeholder="Enter City" value="{{(!empty($user_info->user_city) ? $user_info->user_city : '')}}">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Country</label>

                  <!-- <div class="select2-purple"> -->

                  <select class="form-control select2bs4" name="user_countryup" id="user_country" style="width: 100%;">

                    <!-- <option value="{{(!empty($user_info->user_country) ? $user_info->user_country : '')}}">{{(!empty($user_info->user_country) ? $user_info->user_country : '')}}</option> -->
                    <!-- @foreach ($countries as $cont) -->
                    <!-- <option value="{{ $cont->id }}">{{ $cont->name }}</option> -->
                    <!-- @endforeach -->

                    <option value="">Select Country</option>
                    <?php
                    //print_r($countries);
                    foreach ($countries as $value1) {
                    ?>
                      <option value="<?php echo $value1->id; ?>" <?php if ($user_info->user_country == $value1->id) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $value1->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <!-- </div>   -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea class="form-control" name="about_me" id="about_me" placeholder="Describe Yourself">{{(!empty($user_info->about_me) ? $user_info->about_me : '')}}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>I Speak</label>
                  <textarea class="form-control" name="i_speak" id="i_speak" placeholder="Enter Details">{{(!empty($user_info->i_speak) ? $user_info->i_speak : '')}}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Payment Info</label>
                  <textarea class="form-control" name="payment_info" id="payment_info" placeholder="Enter Payment Info">{{(!empty($user_info->payment_info) ? $user_info->payment_info : '')}}</textarea>
                </div>
              </div>

              <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-2">
                  <h4>Vendor Profile Details for Tour</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Name</label>
                  <input type="text" class="form-control" name="tour_operator_name" id="tour_operator_name" value="{{(!empty($user_info->tour_op_name) ? $user_info->tour_op_name : '')}}" placeholder="Enter Tour Operator Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Contact Name</label>
                  <input type="text" class="form-control" name="tour_operator_contact_name" id="tour_operator_contact_name" value="{{(!empty($user_info->tour_op_contact_name) ? $user_info->tour_op_contact_name : '')}}" placeholder="Enter Operator Contact Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group country_code2" id="country_code2">
                  <label>Tour Operator Contact Number</label>
                  <input type="hidden" id="country_dialcode1" name="country_dialcode1" value="{{ (!empty($user_info->num_dialcode_2) ? $user_info->num_dialcode_2 : '') }}">
                  <input type="hidden" name="countryCode1" id="countryCode1" value="{{ (!empty($user_info->country_iso2_code2) ? $user_info->country_iso2_code2 : '') }}">
                  <input type="number" class="form-control" name="tour_operator_contact_num" id="tour_operator_contact_num" value="{{(!empty($user_info->tour_op_contact_num) ? $user_info->tour_op_contact_num : '')}}" placeholder="Enter Operator Contact Number">
                  <span id="valid-msg1" class="hide-new">✓ Valid</span>
                  <span id="error-msg1" class="hide-new"></span>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Email</label>
                  <input type="email" class="form-control" name="tour_operator_email" id="tour_operator_email" value="{{ (!empty($user_info->tour_op_email) ? $user_info->tour_op_email : '') }}" placeholder="Enter Email" autocomplete="new-email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group country_code3" id="country_code3">
                  <label>Tour Operator Booking Contact Number</label>
                  <input type="hidden" id="country_dialcode2" name="country_dialcode2" value="{{ (!empty($user_info->num_dialcode_3) ? $user_info->num_dialcode_3 : '') }}"/>
                  <input type="hidden" name="countryCode2" id="countryCode2" value="{{ (!empty($user_info->country_iso2_code3) ? $user_info->country_iso2_code3 : '') }}" >
                  <input type="number" class="form-control" name="tour_operator_booking_num" id="tour_operator_booking_num" value="{{ (!empty($user_info->tour_op_booking_num) ? $user_info->tour_op_booking_num : '') }}" placeholder="Enter Booking Contact Number">
                  <span id="valid-msg2" class="hide-new">✓ Valid</span>
                  <span id="error-msg2" class="hide-new"></span>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Office Address</label>
                  <input type="text" class="form-control" name="tour_office_address" id="tour_office_address" value="{{ (!empty($user_info->tour_office_address) ? $user_info->tour_office_address : '') }}" placeholder="Enter Office Address">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Instagram</label>
                  <input type="text" class="form-control" name="tour_operator_instagram" id="tour_operator_instagram" value="{{ (!empty($user_info->tour_op_instagram) ? $user_info->tour_op_instagram : '') }}" placeholder="Enter Operator Instagram">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Facebook</label>
                  <input type="text" class="form-control" name="tour_operator_facebook" id="tour_operator_facebook" value="{{ (!empty($user_info->tour_op_facebook) ? $user_info->tour_op_facebook : '') }}" placeholder="Enter Operator Facebook">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Web Address</label>
                  <input type="text" class="form-control" name="tour_operator_web_add" id="tour_operator_web_add" value="{{ (!empty($user_info->tour_op_web_add) ? $user_info->tour_op_web_add : '') }}" placeholder="Enter Operator Web">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tiktok Page link</label>
                  <input type="text" class="form-control" name="tour_operator_tiktok" id="tour_operator_tiktok" value="{{ (!empty($user_info->tour_op_tiktok) ? $user_info->tour_op_tiktok : '') }}" placeholder="Enter Tiktok Page link">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>YouTube URL</label>
                  <input type="text" class="form-control" name="tour_operator_youtube" id="tour_operator_youtube" value="{{ (!empty($user_info->tour_op_youtube) ? $user_info->tour_op_youtube : '') }}" placeholder="Enter YouTube URL">
                </div>
              </div>

              <div class="col-md-12">
                <h5>Tour Operator Account (Main)</h5>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" name="tour_operator_bank_name" id="tour_operator_bank_name" value="{{(!empty($user_info->tour_op_bank_name) ? $user_info->tour_op_bank_name : '')}}" placeholder="Enter Bank Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Title</label>
                  <input type="text" class="form-control" name="tour_operator_account_title" id="tour_operator_account_title" value="{{(!empty($user_info->tour_op_account_title) ? $user_info->tour_op_account_title : '')}}" placeholder="Enter Account Title">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control" name="tour_operator_account_num" id="tour_operator_account_num" value="{{(!empty($user_info->tour_op_account_num) ? $user_info->tour_op_account_num : '')}}" placeholder="Enter Account Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" name="tour_operator_branch" id="tour_operator_branch" value="{{(!empty($user_info->tour_op_branch) ? $user_info->tour_op_branch : '')}}" placeholder="Enter Branch">
                </div>
              </div>
              <div class="col-md-12">
                <h5>Tour Operator Account (Other)</h5>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Easypaisa Number</label>
                  <input type="text" class="form-control" name="tour_operator_easypaisa_num" id="tour_operator_easypaisa_num" value="{{(!empty($user_info->tour_op_easypaisa_num) ? $user_info->tour_op_easypaisa_num : '')}}" placeholder="Enter Easypaisa Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Easypaisa Name</label>
                  <input type="text" class="form-control" name="tour_operator_easypaisa_name" id="tour_operator_easypaisa_name" value="{{(!empty($user_info->tour_op_easypaisa_name) ? $user_info->tour_op_easypaisa_name : '')}}" placeholder="Enter Easypaisa Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Jazz Cash Number</label>
                  <input type="text" class="form-control" name="tour_operator_jazzcash_num" id="tour_operator_jazzcash_num" value="{{(!empty($user_info->tour_op_jazzcash_num) ? $user_info->tour_op_jazzcash_num : '')}}" placeholder="Enter Jazz Cash Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jazz Cash Name</label>
                  <input type="text" class="form-control" name="tour_operator_jazzcash_name" id="tour_operator_jazzcash_name" value="{{(!empty($user_info->tour_op_jazzcash_name) ? $user_info->tour_op_jazzcash_name : '')}}" placeholder="Enter Jazz Cash Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="tour_operator_notes" id="tour_operator_notes" placeholder="Enter Note">{{(!empty($user_info->tour_op_notes) ? $user_info->tour_op_notes : '')}}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contract Terms</label>
                  <textarea class="form-control" name="tour_operator_terms" id="tour_operator_terms" placeholder="Enter Contract Terms">{{(!empty($user_info->tour_contract_terms) ? $user_info->tour_contract_terms : '')}}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contract Date</label>
                  <input type="date" class="form-control" name="contract_date" id="contract_date" value="{{(!empty($user_info->tour_contract_date) ? $user_info->tour_contract_date : '')}}" placeholder="Enter ">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number</label>
                  <input type="text" class="form-control" name="tour_operator_id_number" id="tour_operator_id_number" value="{{ $user_info->tour_op_id_number }}" placeholder="Enter Jazz Cash Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload Document</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_document" id="tour_operator_document">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if((!empty($user_info->tour_op_document)))
                    <p id="documentPreview"><a href="{{ url('public/uploads/vendor_document') }}/{{ $user_info->tour_op_document }}" download>{{ $user_info->tour_op_document }}</a></p>
                    @else
                    <p id="documentPreview"></p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_img" id="tour_operator_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if((!empty($user_info->tour_op_img)))
                      <div class="col-md-12">
                        <div class="d-flex flex-wrap" id="imgPreview">
                          <div class="image-gridiv">
                            <img src="{{url('public/uploads/vendor_document/img/')}}/{{$user_info->tour_op_img}}">
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="col-md-12">
                        <div class="col" id="imgPreview"></div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload an ID Scan (front) </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_id_front_img" id="tour_operator_id_front_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if((!empty($user_info->tour_op_id_front_img)))
                      <div class="col-md-12">
                        <div class="d-flex flex-wrap" id="idFrontImgPreview">
                          <div class="image-gridiv">
                            <img src="{{url('public/uploads/vendor_document/img/')}}/{{$user_info->tour_op_id_front_img}}">
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="col-md-12">
                        <div class="col" id="idFrontImgPreview"></div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload an ID Scan (Back) </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_id_back_img" id="tour_operator_id_back_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if((!empty($user_info->tour_op_id_back_img)))
                      <div class="col-md-12">
                        <div class="d-flex flex-wrap" id="idBackImgPreview">
                          <div class="image-gridiv">
                            <img src="{{url('public/uploads/vendor_document/img/')}}/{{$user_info->tour_op_id_back_img}}">
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="col-md-12">
                        <div class="col" id="idBackImgPreview"></div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>


              <div class="col-12">
                <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
              </div>
            </div>
          </form>

          <!-- /.row -->
        </div>

        <!-- /.card-body -->



        <div class="card-footer">

          <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about

            the plugin. -->

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