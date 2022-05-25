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
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.href=site_url+"/dashboard"},1000);
            setTimeout(function(){window.location.reload()},1000);
          } else {
            error_noti(response.msg);
          }
        }
      });
      // event.preventDefault();
    }
  });