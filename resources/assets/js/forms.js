// $('[name=product_image]').removeAttr('required');

// $(document).ready(function(){

// $('label.error').addClass('error_label');

// });

jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value == '' || value.trim().length != 0;  
}, "No space please and don't leave it empty");

$("#userLogin_form").validate({

    debug: false,

    rules: {

      email: {

        required: true,

        email: true,

      },

      password: {

        required: true

      }

    },

    submitHandler: function (form) {

      var site_url = $("#baseUrl").val();

    //   alert(site_url);

      var formData = $(form).serialize();

      $(form).ajaxSubmit({

        type: 'POST',

        url: site_url + '/user/loginPost',

        data: formData,

        success: function (response) {

          // console.log(response);

          if (response.status == 'success') {
            $("#userLogin_form")[0].reset();
            success_noti(response.msg);

            if(response.role == 'vendor'){

              // setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);

            }else{

              $('#userLogin_form').modal('hide');
              // setTimeout(function(){window.location.href=site_url+"/user/profile"},1000);
              setTimeout(function(){window.location.reload()},1000);

            }

            // setTimeout(function(){window.location.reload()},1000);

          } else {

            error_noti(response.msg);

          }

        }

      });

      // event.preventDefault();

    }

});

$("#userSignup_form").validate({
  debug: false,
  rules: {
    remember: {
      required: true
    },
    firstname: {
      required: true,
      normalizer: function( value ) {
        return $.trim( value );
      }
    },
    lastname: {

      required: true,
      normalizer: function( value ) {
        return $.trim( value );
      }
    },
    semail: {
      required: true,
      email: true
    },
    phone_no: {
      required: true,
      number: true,
      minlength: 9,
      maxlength: 10
    },
    spassword: {
      required: true
    },
    sconfirm_password: {
      required: true,
      equalTo: "#spassword"
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
  //   alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/user/signup',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          $("#userSignup_form")[0].reset();
          success_noti_rigid(response.msg);
          $("#exampleModal-sign-up").removeClass('show');
          // setTimeout(function(){window.location.href=site_url+"/user/profile"},1000);
          // setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }
      }
    });
    // event.preventDefault();
  }

});

$("#vendorLogin_form").validate({

  debug: false,

  rules: {

    vlemail: {

      required: true,

      email: true,

    },

    vlpassword: {

      required: true

    }

  },

  submitHandler: function (form) {

    var site_url = $("#baseUrl").val();

  //   alert(site_url);

    var formData = $(form).serialize();

    $(form).ajaxSubmit({

      type: 'POST',

      url: site_url + '/servicepro/loginPost',

      data: formData,

      success: function (response) {

        // console.log(response);
        $("#vendorLogin_form")[0].reset();
        if (response.status == 'success') {

          success_noti(response.msg);

          if(response.role == 'vendor'){

            setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);

          }else{

            // setTimeout(function(){window.location.href=site_url+"/user/profile"},1000);

          }

          // setTimeout(function(){window.location.reload()},1000);

        } else {

          error_noti(response.msg);

        }

      }

    });

    // event.preventDefault();

  }

});

$("#vendorSignup_form").validate({

  debug: false,

  rules: {

    vsremember: {

      required: true

    },

    vslname: {

      required: true

    },

    vsname: {

      required: true

    },

    vsemail: {

      required: true,

      email: true

    },

    vsphone_no: {

      required: true,

      number: true,

      minlength: 9,

      maxlength: 10

    },

    vspassword: {

      required: true

    },

    vsconfirm_password: {

      required: true,

      equalTo: "#vspassword"

    }

  },

  submitHandler: function (form) {

    var site_url = $("#baseUrl").val();

  //   alert(site_url);

    var formData = $(form).serialize();

    $(form).ajaxSubmit({

      type: 'POST',

      url: site_url + '/servicepro/signup',

      data: formData,

      success: function (response) {
        $("#vendorSignup_form")[0].reset();
        // console.log(response);

        if (response.status == 'success') {
          // commented on 28oct2022
          // success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);

          success_noti_rigid(response.msg);
          $("#vendorModal-signup").removeClass('show');

          // setTimeout(function(){window.location.reload()},1000);

        } else {

          error_noti(response.msg);

        }

      }

    });

    // event.preventDefault();

  }

});

$("#profileUpdate_form").validate({
  debug: false,
  rules: {
    puname: {
      required: true
    },
    plname: {
      required: true
    },
    puemail: {
      required: true,
      email: true
    },
    puphone_no: {
      required: true,
      minlength: 9,
      maxlength: 10
    },
    city: {
      required: true
    },
    state: {
      required: true
    },
    country: {
      required: true
    },
    address: {
      required: true
    },
    zip_code: {
      required: true
    },
  },

  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
  //   alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/updateProfile',
      data: formData,
      success: function (response) {
        if (response.status == 'success') {
          success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);
          setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }
      }
    });
    // event.preventDefault();
  }
});




// $("#userLogin_form").validate({

//     debug: false,

//     rules: {

//       email: {

//         required: true,

//         email: true,

//       },

//       password: {

//         required: true

//       }

//     },

//     submitHandler: function (form) {

//       var site_url = $("#baseUrl").val();

//     //   alert(site_url);

//       var formData = $(form).serialize();

//       $(form).ajaxSubmit({

//         type: 'POST',

//         url: site_url + '/user/loginPost',

//         data: formData,

//         success: function (response) {

//           // console.log(response);

//           if (response.status == 'success') {
//             $("#userLogin_form")[0].reset();
//             success_noti(response.msg);

//             if(response.role == 'vendor'){

//               // setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);

//             }else{

//               // setTimeout(function(){window.location.href=site_url+"/user/profile"},1000);
//               setTimeout(function(){window.location.reload()},1000);
//             }

//             // setTimeout(function(){window.location.reload()},1000);

//           } else {

//             error_noti(response.msg);

//           }

//         }

//       });

//       // event.preventDefault();

//     }

// });

$('#userForgetPass').validate({
  // initialize the plugin
  rules: {
    forgetEmail: {
      required: true
    }
  },
  submitHandler: function(form) {
    // form.submit();
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/forgotPassword_action',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          $("#userForgetPass")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/business_owner/newsList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
  }
});

