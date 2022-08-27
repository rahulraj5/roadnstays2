$(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"],
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    "scrollCollapse": true,
    "paging":         true,
    "fnDrawCallback": function() {
        jQuery('.toggle-class').bootstrapToggle();
    }
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  // $('#example1').DataTable({
  //   "paging": true,
  //   "lengthChange": false,
  //   "searching": false,
  //   "ordering": true,
  //   "info": true,
  //   "autoWidth": false,
  //   "responsive": true,
  // });
});

// $('#email_alerts').DataTable( {

//   "scrollCollapse": true,
//   "paging":         true,
//   "fnDrawCallback": function() {
//       jQuery('.toggle').bootstrapToggle();
//   }

// });


$(function () {
  //Initialize Select2 Elements
  $('.select2').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
});

$("#adminLogin_form").validate({
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
    var formData = $(form).serialize(); 
    $.ajaxSetup({ 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/loginPost',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          setTimeout(function(){window.location.href=site_url+"/admin/dashboard"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#adminProfileUpdate_form").validate({
  debug: false,
  rules: {
    name: {
      required: true,
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/profile',
      data: formData,
      success: function (response) {
        console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          setTimeout(function(){window.location.href=site_url+"/admin/profile"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#changePasswordAdmin_form").validate({
  debug: false,
  rules: {
    old_password: {
        required: true,
    },
    new_password: {
        required: true
    },
    confirm_password:{
      required: true,
      equalTo : "#new_password"
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/changePassword',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

// customer

$("#customerAdmin_form").validate({
  debug: false,
  rules: {
    fname: {
        required: true,
    },
    lname: {
      required: true,
    },
    email: {
      required: true,
      email:true,
    },
    contact_number: {
      required: true,
      number:true,
      // minlength: 10,
      // maxlength: 10,
    },
    password: {
        required: true
    },
    confirm_password:{
      required: true,
      equalTo : "#password"
    },
    address: {
      required: true,
    },
    city: {
      required: true,
    },
    user_country: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/add_customer_action',
      data: formData,
      success: function (response) {
        console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/customer_management"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#customerUpdateAdmin_form").validate({
  debug: false,
  rules: {
    fnameup: {
        required: true,
    },
    lnameup: {
      required: true,
    },
    emailup: {
      required: true,
      email:true,
    },
    contact_numberup: {
      required: true,
      number:true,
      // minlength: 10,
      // maxlength: 10,
    },
    // password: {
    //     required: true
    // },
    // confirm_password:{
    //   required: true,
    //   equalTo : "#password"
    // },
    addressup: {
      required: true,
    },
    cityup: {
      required: true,
    },
    user_countryup: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/customer_update',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/customer_management"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

// scout

$("#scoutAdmin_form").validate({
  debug: false,
  rules: {
    fname: {
        required: true,
    },
    lname: {
      required: true,
    },
    email: {
      required: true,
      email:true,
    },
    contact_number: {
      required: true,
      number:true,
      // minlength: 10,
      // maxlength: 10,
    },
    password: {
        required: true
    },
    confirm_password:{
      required: true,
      equalTo : "#password"
    },
    address: {
      required: true,
    },
    city: {
      required: true,
    },
    user_country: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/submitScout',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/scoutList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#scoutUpdateAdmin_form").validate({
  debug: false,
  rules: {
    fnameu: {
        required: true,
    },
    lnameu: {
      required: true,
    },
    emailu: {
      required: true,
      email:true,
    },
    contact_numberu: {
      required: true,
      number:true,
      // minlength: 10,
      // maxlength: 10,
    },
    // password: {
    //     required: true
    // },
    // confirm_password:{
    //   required: true,
    //   equalTo : "#password"
    // },
    addressu: {
      required: true,
    },
    cityu: {
      required: true,
    },
    user_countryu: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/updateScout',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/scoutList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

// service provider

$("#servProAdmin_form").validate({
  debug: false,
  rules: {
    fname: {
        required: true,
    },
    lname: {
      required: true,
    },
    email: {
      required: true,
      email:true,
    },
    // contact_number: {
    //   required: true,
    //   number:true,
    //   // minlength: 10,
    //   // maxlength: 10,
    // },
    password: {
        required: true
    },
    confirm_password:{
      required: true,
      equalTo : "#password"
    },
    address: {
      required: true,
    },
    city: {
      required: true,
    },
    user_country: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/submitServiceProvider',
      data: formData,
      success: function (response) {
        console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/serviceProviderList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#servProUpdateAdmin_form").validate({
  debug: false,
  rules: {
    fnameup: {
        required: true,
    },
    lnameup: {
      required: true,
    },
    emailup: {
      required: true,
      email:true,
    },
    contact_numberup: {
      required: true,
      number:true,
      // minlength: 10,
      // maxlength: 10,
    },
    // password: {
    //     required: true
    // },
    // confirm_password:{
    //   required: true,
    //   equalTo : "#password"
    // },
    addressup: {
      required: true,
    },
    cityup: {
      required: true,
    },
    user_countryup: {
      required: true,
    },
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/admin/updateServiceProvider',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.reload()},1000);
          setTimeout(function(){window.location.href=site_url+"/admin/serviceProviderList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

//  ########### Service Provider panel ###########

$("#servproLogin_form").validate({
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
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/vendor/loginPost',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          setTimeout(function(){window.location.href=site_url+"/vendor/dashboard"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#serproProfileUpdate_form").validate({
  debug: false,
  rules: {
    name: {
      required: true,
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/vendor/profile',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/vendor/dashboard"},1000);
          setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$("#changePasswordSerPro_form").validate({
  debug: false,
  rules: {
    old_password: {
        required: true,
    },
    new_password: {
        required: true
    },
    confirm_password:{
      required: true,
      equalTo : "#new_password"
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/vendor/changePassword',
      data: formData,
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          // $("#register_form")[0].reset();
          success_noti(response.msg);
          setTimeout(function(){window.location.reload()},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

 
$('#register_form').validate({ // initialize the plugin
  rules: {
    user_type: {
      required: true
    },
    fname: {
      required: true
    },
    lname: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    phone_no: {
      required: true,
      minlength: 10,
      maxlength: 10
    },
    password: {
      required: true
    },
    confirm_password: {
      required: true,
      equalTo: "#password"
    }
  },
  submitHandler: function (form) {
    var site_url = $("#baseUrl").val();
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/submit-user',
      data: formData,
      success: function (response) {
        // console.log(response);
        // $("#register_form")[0].reset();
        // $(".statusMsg").html(response);
        // console.log(obj);
        // console.log(JSON.parse(response));
        // var obj = JSON.parse(response);
        // console.log(obj);
        if (response.status == 'success') {
          $("#register_form")[0].reset();
          success_noti(response.msg);
        } else {
          error_noti(response.msg);
        }

      }
    });
    // event.preventDefault();
  }
});

$('#forgetPass_form').validate({
  // initialize the plugin
  rules: {
    email: {
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
          $("#forgetPass_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/business_owner/newsList"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
  }
});

$('#resetPassword_form').validate({
  // initialize the plugin
  rules: {
    reset_password: {
      required: true
    },
    reset_repassword: {
      required: true,
      equalTo: "#reset_password"
    }
  },
  submitHandler: function(form) {
    // form.submit();
    var site_url = $("#baseUrl").val();
    // alert(site_url);
    var formData = $(form).serialize();
    $(form).ajaxSubmit({
      type: 'POST',
      url: site_url + '/resetPassword_action',
      data: formData,
      success: function (response) {
        console.log(response);
        if (response.status == 'success'){
          $("#resetPassword_form")[0].reset();
          success_noti(response.msg);
          // setTimeout(function(){window.location.href=site_url+"/business_owner/newsList"},1000);
        }else if(response.status == 'expError'){
          error_noti(response.msg);
          setTimeout(function(){window.location.href=site_url+"/forgotPassword"},1000);
        } else {
          error_noti(response.msg);
        }

      }
    });
  }
});

// $("#submit_btn_new").click(function() {
//   // alert('shdfsd');
//   var form = $("#roomAdmin_form_new");
//     form.validate({
//       rules: {
//         room_type: {
//           required: true,
//         },
//         room_name: {
//           required: true,
//         },
//         max_adults: {
//           required: true,
//         },
//         max_childern: {
//           required: true,
//         },
//         number_of_rooms: {
//           required: true,
//         },
//         price_per_night: {
//           required: true,
//         },
//         type_of_price: {
//           required: true,
//         },
//         tax_percentage: {
//           required: true,
//         },
//         price_per_night_7d: {
//           required: true,
//         },
//         price_per_night_30d: {
//           required: true,
//         },
//         room_size: {
//           required: true,
//         },
//         bed_type: {
//           required: true,
//         },
//         private_bathroom: {
//           required: true,
//         },
//         private_entrance: {
//           required: true,
//         },
//         family_friendly: {
//           required: true,
//         },
//         outdoor_facilities: {
//           required: true,
//         },
//         extra_people: {
//           required: true,
//         },
//       },
//     });
//     if (form.valid() === true) {
//       var site_url = $("#baseUrl").val();
//       // alert(site_url);
//       var formData = $(form).serialize();
//       $('#submit_btn').prop('disabled', true);
//       $('#submit_btn').html(
//           `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
//       );
//       // alert(formData);
//       $(form).ajaxSubmit({
//         type: 'POST',
//         url: site_url + '/admin/submitroom',
//         data: formData,
//         success: function (response) {
//           console.log(response);
//           if (response.status == 'success') {
//             // $("#newsForm")[0].reset();
//             success_noti(response.msg);
//             if(response.hotel_id == 0){
//               setTimeout(function(){window.location.href=site_url+"/admin/roomlist"},1000);
//               // console.log(response.hotel_id);
//               // console.log('hello');
//             }else{
//               setTimeout(function() {window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id}, 1000);
//               // console.log(response.hotel_id);
//             }
            
//           } else {
//             error_noti(response.msg);
//             $('#submit_btn').html(
//               `<span class=""></span>Submit`
//               );
//               $('#submit_btn').prop('disabled', false);
//           }
  
//         }
//       });
//       // event.preventDefault();
//     }  
// });

// $('#roomAdmin_form').validate({
//   // initialize the plugin
//   rules: {
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
//     // form.submit();
//     var site_url = $("#baseUrl").val();
//     // alert(site_url);
//     var formData = $(form).serialize();
//     $('#submit_btn').prop('disabled', true);
//     $('#submit_btn').html(
//         `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
//     );
//     $(form).ajaxSubmit({
//       type: 'POST',
//       url: site_url + '/admin/submitroom',
//       data: formData,
//       success: function (response) {
//         console.log(response);
//         if (response.status == 'success') {
//           // $("#newsForm")[0].reset();
//           success_noti(response.msg);
//           if(response.hotel_id == 0){
//             setTimeout(function(){window.location.href=site_url+"/admin/roomlist"},1000);
//             // console.log(response.hotel_id);
//             // console.log('hello');
//           }else{
//             setTimeout(function() {window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id}, 1000);
//             // console.log(response.hotel_id);
//           }
          
//         } else {
//           error_noti(response.msg);
//           $('#submit_btn').html(
//             `<span class=""></span>Submit`
//             );
//             $('#submit_btn').prop('disabled', false);
//         }

//       }
//     });
//   }
// });


// $('#updateroomAdmin_form').validate({
//   // initialize the plugin
//   rules: {
//     hotel_name: {
//       required: true
//     },
//     room_type: {
//       required: true
//     },
//     room_name: {
//       required: true
//     },
//     max_adults: {
//       required: true,
//       number:true,
//     },
//     max_childern: {
//       required: true,
//       number:true,
//     },
//     number_of_rooms: {
//       required: true,
//       number:true,
//     },
//     price_per_night: {
//       required: true,
//       number:true,
//     },
//     price_per_night_7d: {
//       required: true,
//       number:true,
//     },
//     price_per_night_30d: {
//       required: true,
//       number:true,
//     },
//     // cleaning_fee: {
//     //   required: true,
//     //   number:true,
//     // },
//     // city_fee: {
//     //   required: true,
//     //   number:true,
//     // },
//     extra_guest_per_night: {
//       required: true,
//       number:true,
//     },
//     type_of_price: {
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
//     description: {
//       required: true,
//     },
//     notes: {
//       required: true,
//     },
//     extra_people: {
//       required: true,
//     }
    
//   },
//   submitHandler: function(form) {
//     // form.submit();
//     var site_url = $("#baseUrl").val();
//     // alert(site_url);
//     var formData = $(form).serialize();
//     $(form).ajaxSubmit({
//       type: 'POST',
//       url: site_url + '/admin/updateRoom',
//       data: formData,
//       success: function (response) {
//         // console.log(response);
//         if (response.status == 'success') {
//           // $("#newsForm")[0].reset();
//           success_noti(response.msg);
//           setTimeout(function(){window.location.href=site_url+"/admin/roomlist"},1000);
//         } else {
//           error_noti(response.msg);
//         }

//       }
//     });
//   }
// });

// $('#updateHotelroomAdmin_form').validate({
//   // initialize the plugin
//   rules: {
//     // hotel_nameh: {
//     //   required: true
//     // },
//     room_typeh: {
//       required: true
//     },
//     room_nameh: {
//       required: true
//     },
//     max_adultsh: {
//       required: true,
//       number:true,
//     },
//     max_childernh: {
//       required: true,
//       number:true,
//     },
//     number_of_roomsh: {
//       required: true,
//       number:true,
//     },
//     price_per_nighth: {
//       required: true,
//       number:true,
//     },
//     price_per_night_7dh: {
//       required: true,
//       number:true,
//     },
//     price_per_night_30dh: {
//       required: true,
//       number:true,
//     },
//     // cleaning_fee: {
//     //   required: true,
//     //   number:true,
//     // },
//     // city_fee: {
//     //   required: true,
//     //   number:true,
//     // },
//     extra_guest_per_nighth: {
//       required: true,
//       number:true,
//     },
//     room_sizeh: {
//       required: true,
//     },
//     type_of_priceh: {
//       required: true,
//     },
//     bed_typeh: {
//       required: true,
//     },
//     private_bathroomh: {
//       required: true,
//     },
//     private_entranceh: {
//       required: true,
//     },
//     family_friendlyh: {
//       required: true,
//     },
//     descriptionh: {
//       required: true,
//     },
//     notesh: {
//       required: true,
//     },
//     extra_peopleh: {
//       required: true,
//     }
    
//   },
//   submitHandler: function(form) {
//     // form.submit();
//     var site_url = $("#baseUrl").val();
//     // alert(site_url);
//     var formData = $(form).serialize();
//     $(form).ajaxSubmit({
//       type: 'POST',
//       url: site_url + '/admin/updateHotelRoom',
//       data: formData,
//       success: function (response) {
//         // console.log(response);
//         if (response.status == 'success') {
//           // $("#newsForm")[0].reset();
//           success_noti(response.msg);
//           // setTimeout(function(){window.location.href=site_url+"/admin/roomlist"},1000);
//           setTimeout(function(){window.location.href=site_url+"/admin/viewHotelRooms/"+response.hotel_id},1000);
//         } else {
//           error_noti(response.msg);
//         }

//       }
//     });
//   }
// });
