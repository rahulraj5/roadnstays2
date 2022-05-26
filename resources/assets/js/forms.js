// $('[name=product_image]').removeAttr('required');
// $(document).ready(function(){
// $('label.error').addClass('error_label');
// });


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
        url: site_url + '/loginPost',
        data: formData,
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            success_noti(response.msg);
            if(response.role == 'vendor'){
              setTimeout(function(){window.location.href=site_url+"/servicepro/dashboard"},1000);
            }else{
              setTimeout(function(){window.location.href=site_url+"/dashboard"},1000);
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
    name: {
      required: true
    },
    semail: {
      required: true,
      email: true
    },
    phone_no: {
      required: true,
      minlength: 10,
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
      url: site_url + '/signup',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          success_noti(response.msg);
          setTimeout(function(){window.location.href=site_url+"/dashboard"},1000);
          // setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }
      }
    });
    // event.preventDefault();
  }
});
