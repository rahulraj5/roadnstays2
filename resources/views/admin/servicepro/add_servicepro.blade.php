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
<!-- <script>
  var input = document.querySelector("#contact_number"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

  // Error messages based on the code returned from getValidationError
  var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  // Initialise plugin
  var intl = window.intlTelInput(input, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    nationalMode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
  });

  // phoneInput.getSelectedCountryData();

  var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide-new");
    validMsg.classList.add("hide-new");
  };

  // Validate on blur event
  input.addEventListener('blur', function() {
    reset();
    if (input.value.trim()) {
      if (intl.isValidNumber()) {
        validMsg.classList.remove("hide-new");
      } else {
        input.classList.add("error");
        var errorCode = intl.getValidationError();

        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide-new");
      }
    }
  });

  // Reset on keyup/change event
  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);


  function getIp(callback) {
    fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
    .then((resp) => resp.json())
    .catch(() => {
        return {
        country: 'us',
        };
    }).then((resp) => callback(resp.country));
  }

  var input2 = $('#contact_number');
  var country2 = $('#country_dialcode');
  var itii = intlTelInput(input2.get(0));
  input2.on('countrychange', function(e) {
    // change the hidden input value to the selected country code
    country2.val(itii.getSelectedCountryData().iso2);
    console.log(itii.getSelectedCountryData().iso2);
  });
</script> -->

<!-- <script>
   const phoneInputField = document.querySelector("#contact_number");
  //  console.log(phoneInputField);
   const phoneInput = window.intlTelInput(phoneInputField, 
   {
      preferredCountries: ["sa", "pk", "in", "us"],
      initialCountry: "auto",
      geoIpLookup: getIp,
      separateDialCode: true ,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    
    console.log(phoneInput);
    console.log(phoneInput.preferredCountries);
    console.log(phoneInput.preferredCountries[0].name);
    // console.log(phoneInput.j);
    // console.log(phoneInput.preferredCountries[0].name);

    // var input = $('#contact_number');
    // var country = $('#country');
    // var iti = intlTelInput(input.get(0))
    // var itia = input.get(0);
    // console.log(itia);
    // input.on('countrychange', function(e) {
    //   // change the hidden input value to the selected country code
    //   country.val(iti.getSelectedCountryData().iso2);
    //   console.log(iti.getSelectedCountryData().iso2);
    // });

    // input.on('countrychange', function (e, countryData) {
    //         $("#code").val(($("#contact_number").intlTelInput("getSelectedCountryData").dialCode));

    // });

    // $('.iti__country-list li').click(function(){
    //   console.log($(this).data('country-code-code'));
    //   $("#dialCode").val($(this).data('dial-code'));
    //   $("#countryCode").val($(this).data('country-code-code'));
    // })

    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
            country: 'us',
            };
        }).then((resp) => callback(resp.country));
    }

    const info = document.querySelector(".alert-info");
    function process(event) {
        event.preventDefault();
        const phoneNumber = phoneInput.getNumber();
        console.log(phoneNumber);
        info.style.display = "";
        info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    }    

    // var input2 = $('#contact_number');
    // var country2 = $('#country_dialcode');
    // var itii = intlTelInput(input2.get(0));
    // input2.on('countrychange', function(e) {
    //   // change the hidden input value to the selected country code
    //   country2.val(itii.getSelectedCountryData().iso2);
    //   console.log(itii.getSelectedCountryData().iso2);
    // });
</script> -->

<!-- get the country iso code successfully code  -->
<!-- <script>
  var input = document.querySelector("#contact_number"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var intl = window.intlTelInput(input, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    separateDialCode: true ,
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
              // console.log(typeof(intl));
              // console.log(intl);
              // const ObjtoArray = (obj) => Object.assign([], Object.values(obj))
              // console.log(ObjtoArray(intl.name))
              // console.log(Object.values(intl))

              // console.log($.parseJSON(intl));
              // console.log(JSON.parse(intl));
              // console.log(JSON.stringify(intl.getSelectedCountryData().iso2));
              console.log(intl.getSelectedCountryData().iso2);
              // var countryData = window.intlTelInputGlobals.getCountryData();
              // console.log(countryData);

              // var getName = intl.selectedCountryData["name"];
              // var getCode = intl.selectedCountryData["dialCode"];
              // console.log(intl);
              // console.log(getName);
              // console.log(getCode);
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
  //   $("#lead_prefix").val(getCode);//You will get country code only
  //   console.log(getName);
  //   console.log(getCode);
  // });

  // Reset on keyup/change event
  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);

  
</script> -->

<!-- for mobile number 1 start here -->
<script>
  var input = document.querySelector("#contact_number"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var intl = window.intlTelInput(input, {
    preferredCountries: ["sa", "pk", "in", "us"],
    initialCountry: "auto",
    geoIpLookup: getIp,
    separateDialCode: true ,
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
              // var intlNumber = intl.getNumber();
              // var numberType = intl.getNumberType();
              // console.log(intlNumber);
              // console.log(numberType);
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

<!-- <script>
   const phoneInputFieldCont = document.querySelector("#tour_operator_contact_num");
   const phoneInputCont = window.intlTelInput(phoneInputFieldCont, 
   {
      preferredCountries: ["sa", "pk", "in", "us"],
      initialCountry: "auto",
      geoIpLookup: getIp,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    // console.log(phoneInputCont);
    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
            country: 'us',
            };
        }).then((resp) => callback(resp.country));
    }    
</script>
<script>
   const phoneInputFieldBook = document.querySelector("#tour_operator_booking_num");
   const phoneInputBook = window.intlTelInput(phoneInputFieldBook, 
   {
      preferredCountries: ["sa", "pk", "in", "us"],
      initialCountry: "auto",
      geoIpLookup: getIp,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    // console.log(phoneInputBook);
    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
            country: 'us',
            };
        }).then((resp) => callback(resp.country));
    }    
</script> -->

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
          <h1>Add Service Provider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Service Provider</li>
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
        <div class="card-body">
          <!-- <h4 class="mt-5 ">Custom Content Above</h4> -->
          <!-- <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Service Provider Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Profile Details for Tour</a>
            </li>
          </ul> -->

          <!-- <div class="tab-content" id="custom-content-above-tabContent">

            <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
              <div class="tab-custom-content" style="border-top:0ch; !important">
                <h3 class="lead mb-2">Service Provider Profile</h3>
              </div> -->
          <form method="POST" id="servProAdmin_form">
            @csrf
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
                  <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" autocomplete="new-email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mobile Number</label>
                  <!-- <input type="hidden"  id="code" name ="code" value="1" > -->
                  <!-- <input type="hidden" name="dialCode" id="dialCode"> -->
                  <input type="hidden" id="country_dialcode" name="country_dialcode"/>
                  <input type="hidden" name="countryCode" id="countryCode">
                  <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Number">
                  <span id="valid-msg" class="hide-new">✓ Valid</span>
                  <span id="error-msg" class="hide-new"></span>
                  <!-- <div class="alert alert-info" style="display: none;"></div> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Phone (Landline)</label>
                  <input type="text" class="form-control" name="landline_number" id="landline_number" placeholder="Enter Phone Number">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="new-password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Verified User Status</label>
                    <select class="form-control select2bs4" name="user_email_verified"  id="user_email_verified" style="width: 100%;">
                      <!-- <option value="">Select Status</option> -->
                      <option value="1">Verified</option>
                      <option value="0" selected>Un-verified</option>
                    </select>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Country</label>
                  <!-- <div class="select2-purple"> -->
                  <select class="form-control select2bs4" name="user_country" id="user_country" style="width: 100%;">
                    <option value="">Select Country</option>
                    @foreach ($countries as $cont)
                    <option value="{{ $cont->id }}">{{ $cont->name }}</option>
                    @endforeach
                  </select>
                  <!-- </div>   -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea class="form-control" name="about_me" id="about_me" placeholder="Describe Yourself"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>I Speak</label>
                  <textarea class="form-control" name="i_speak" id="i_speak" placeholder="Enter Details"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Payment Info</label>
                  <textarea class="form-control" name="payment_info" id="payment_info" placeholder="Enter Payment Info"></textarea>
                </div>
              </div>

              <!-- <div class="col-md-12 mt-0">
                <div class="tab-custom-content mt-0">
                  <p class="lead mb-2">
                  <h4>Vendor Profile Details for Tour</h4>
                  </p>
                </div>
              </div> -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Name</label>
                  <input type="text" class="form-control" name="tour_operator_name" id="tour_operator_name" placeholder="Enter Tour Operator Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Contact Name</label>
                  <input type="text" class="form-control" name="tour_operator_contact_name" id="tour_operator_contact_name" placeholder="Enter Operator Contact Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Contact Number</label>
                  <input type="hidden" id="country_dialcode1" name="country_dialcode1"/>
                  <input type="hidden" name="countryCode1" id="countryCode1">
                  <input type="number" class="form-control" name="tour_operator_contact_num" id="tour_operator_contact_num" placeholder="Enter Operator Contact Number">
                  <span id="valid-msg1" class="hide-new">✓ Valid</span>
                  <span id="error-msg1" class="hide-new"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Email</label>
                  <input type="email" class="form-control" name="tour_operator_email" id="tour_operator_email" placeholder="Enter Email" autocomplete="new-email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tour Operator Booking Contact Number</label>
                  <input type="hidden" id="country_dialcode2" name="country_dialcode2"/>
                  <input type="hidden" name="countryCode2" id="countryCode2">
                  <input type="number" class="form-control" name="tour_operator_booking_num" id="tour_operator_booking_num" placeholder="Enter Booking Contact Number">
                  <span id="valid-msg2" class="hide-new">✓ Valid</span>
                  <span id="error-msg2" class="hide-new"></span>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Office Address</label>
                  <input type="text" class="form-control" name="tour_office_address" id="tour_office_address" placeholder="Enter Office Address">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Instagram Url</label>
                  <input type="text" class="form-control" name="tour_operator_instagram" id="tour_operator_instagram" placeholder="Enter Instagram Url">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Facebook Url</label>
                  <input type="text" class="form-control" name="tour_operator_facebook" id="tour_operator_facebook" placeholder="Enter Facebook Url">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Website Address</label>
                  <input type="text" class="form-control" name="tour_operator_web_add" id="tour_operator_web_add" placeholder="Enter Website Address">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tiktok Page link</label>
                  <input type="text" class="form-control" name="tour_operator_tiktok" id="tour_operator_tiktok" placeholder="Enter Tiktok Page link">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>YouTube URL</label>
                  <input type="text" class="form-control" name="tour_operator_youtube" id="tour_operator_youtube" placeholder="Enter YouTube URL">
                </div>
              </div>

              <div class="col-md-12">
                <h5>Bank Account (Main)</h5>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" name="tour_operator_bank_name" id="tour_operator_bank_name" placeholder="Enter Bank Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Title</label>
                  <input type="text" class="form-control" name="tour_operator_account_title" id="tour_operator_account_title" placeholder="Enter Account Title">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control" name="tour_operator_account_num" id="tour_operator_account_num" placeholder="Enter Account Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" name="tour_operator_branch" id="tour_operator_branch" placeholder="Enter Branch">
                </div>
              </div>
              <div class="col-md-12">
                <h5>Bank Account (Other)</h5>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Easypaisa Number</label>
                  <input type="text" class="form-control" name="tour_operator_easypaisa_num" id="tour_operator_easypaisa_num" placeholder="Enter Easypaisa Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Easypaisa Name</label>
                  <input type="text" class="form-control" name="tour_operator_easypaisa_name" id="tour_operator_easypaisa_name" placeholder="Enter Easypaisa Name">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jazz Cash Number</label>
                  <input type="text" class="form-control" name="tour_operator_jazzcash_num" id="tour_operator_jazzcash_num" placeholder="Enter Jazz Cash Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jazz Cash Name</label>
                  <input type="text" class="form-control" name="tour_operator_jazzcash_name" id="tour_operator_jazzcash_name" placeholder="Enter Jazz Cash Name">
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Contract Date</label>
                  <input type="date" class="form-control" name="contract_date" id="contract_date" placeholder="Enter ">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number</label>
                  <input type="text" class="form-control" name="tour_operator_id_number" id="tour_operator_id_number" placeholder="Enter Jazz Cash Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload Document</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_document" id="tour_operator_document">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <p id="documentPreview"></p>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_img" id="tour_operator_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <!-- <p id="imgPreview"></p> -->
                    <div class="col-md-12">
                      <div class="col" id="imgPreview"></div>
                    </div>
                  </div>
                </div>
              </div>
              

              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload an ID Scan (front) </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_id_front_img" id="tour_operator_id_front_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <!-- <p id="idFrontImgPreview"></p> -->
                    <div class="col-md-12">
                      <div class="col" id="idFrontImgPreview"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="customFile">Upload an ID Scan (Back) </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tour_operator_id_back_img" id="tour_operator_id_back_img">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <!-- <p id="idBackImgPreview"></p> -->
                    <div class="col-md-12">
                      <div class="col" id="idBackImgPreview"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Contract Terms</label>
                  <textarea class="form-control" name="tour_operator_terms" id="tour_operator_terms" placeholder="Enter Contract Terms"></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="tour_operator_notes" id="tour_operator_notes" placeholder="Enter Note"></textarea>
                </div>
              </div>
              
              <div class="col-12">
                <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
              </div>
            </div>
          </form>

          <!-- </div>

            <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
              <div class="tab-custom-content" style="border-top:0ch; !important">
                <h3 class="lead mb-2">Vendor Details for Tour</h3>
              </div> -->

          <!-- <form method="POST" id="tourVendorDetail_form">
                @csrf
                <div class="row">
                  
                  <div class="col-12">
                    <button class="btn btn-primary btn-dark float-right" name="submit" type="submit" disabled>Submit</button>
                  </div>
                </div>
              </form> -->

          <!-- </div>

          </div> -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection