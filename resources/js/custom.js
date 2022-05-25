$(function () {
  // implement start rating select/deselect
  $(".rateButton").click(function () {
    if ($(this).hasClass('btn-grey')) {
      $(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
      $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
      $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
    } else {
      $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
    }
    $("#rating").val($('.star-selected').length);
  });
  // save review using Ajax
  $('#ratingForm').on('submit', function (event) {
    event.preventDefault();
    var site_url = $("#baseUrl").val();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      dataType: "json",
      url: site_url + '/jobReviewSubmit',
      // url: "{{ url('/jobReviewSubmit') }}",
      data: formData,
      success: function (response) {
        // if (response.success == 1) {
          $("#ratingForm")[0].reset();
          success_noti(response.success);
          setTimeout(function(){ window.location.reload(); }, 2500);
        // }
      }
    });
  });
});


$(".enquiry-two").click(function () {
  var site_url = $("#baseUrl").val(); jobid
  var job_id = $("#jobid").val();
  var user_id = $(".auth_user_id").val();
  var csrf = $("#csrfToken").val();
  // alert(job_id);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'POST',
    url: site_url + '/changeFavJob',
    // url: "{{ url('/changeFavJob') }}",
    data: {
      job_id: job_id,
      user_id: user_id,
      _token: csrf
    },
    success: function (response) {
      // $("#enquiryForm")[0].reset();
      $("#statuschgfvjbMsg").html(response);
      // var myVar = $(".enquiry-two i").hasClass('fa-heart');
      //alert(myVar);
      // if (myVar == true) {
      // $(".enquiry-two").html("<i class='fa fa-heart-o favlist'></i>");
      // } else {
      // $(".enquiry-two").html("<i class='fa fa-heart favlist'></i>");
      // }

    }
  });

});

function alertlogin() {
  alert("Please Login");
}

function nothiredalert() {
  alert("you can’t rate this job, first employer hired you!");
}

function applyjob(jobid) {

  var userid = $(".auth_user_id").val();
  // var site_url = "<?php echo url('/'); ?>";
  var site_url = $("#baseUrl").val();
  var csrf = "{{ csrf_token() }}";
  // $.ajaxSetup({
  // 	headers: {
  // 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  // 	}
  // });

  $.ajax({
    url: site_url + '/jobApply',
    type: "POST",
    data: {
      jobid: jobid,
      userid: userid,
      _token: csrf
    },
    success: function (response) {
      $(".statusMsg").html(response);
      // if (response == 1) {
      // 	$('#msg').html('<h3 style="color:green;text-align:center;">Applied successfully</h3>');
      // } else if (response == 2) {
      // 	$('#msg').html('<h3 style="color:red;text-align:center;">you already applied for this job</h3>');
      // } else {
      // 	$('#msg').html('<h3 style="color:red;text-align:center;">you already applied for this job</h3>');
      // }
    }
  });
}

function selectState(value) {
  var site_url = $("#baseUrl").val();
  $.ajax({
    type: "get",
    url: site_url + '/getState',
    data: { country_id: value },
    dataType: 'json',
    success: function (data) {
      //console.log("response",data.states);
      $('.states').html('<option value="">Select State</option>');
      $.each(data.states, function (key, value) {
        $(".states").append('<option value="' + value
          .id + '">' + value.name + '</option>');
      });
      $('.cities').html('<option value="">Select City</option>');
    }
  });


}

function selectCity(value) {
  var site_url = $("#baseUrl").val();
  $.ajax({
    type: "get",
    url: site_url + '/getCity',
    data: { state_id: value },
    dataType: 'json',
    success: function (data) {
      console.log("response", data.cities);
      $('.cities').html('<option value="">Select City</option>');
      $.each(data.cities, function (key, value) {
        $(".cities").append('<option value="' + value
          .id + '">' + value.name + '</option>');
      });

    }
  });
}

// Get the modal
var modal1 = document.getElementById("myModal1");
// alert(modal1);
// Get the button that opens the modal
var btn1 = document.getElementById("myBtn-appointment");
// alert(btn1);
// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
// alert(span1);
// When the user clicks the button, open the modal 
btn1.onclick = function () {
  // alert('fghj');
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function () {
  modal1.style.display = "none";
}

// $(document).click(function(event) {
  //if you click on anything except the modal itself or the "open modal" link, close the modal
  // alert(!$(event.target).closest(".modal,.js-open-modal").length);
  // if (!$(event.target).closest(".modal,.js-open-modal").length) {
  //   // $("body").find(".modal").removeClass("visible");
  //   closeModal();
  // }
// });

// When the user clicks on <span> (x), close the modal
// span1.onclick = function () {
//   $('#myModal1 form')[0].reset();
//   // $('#myModal1').validate().resetForm();
//   // $('#myModal1').find('.text-danger').removeClass('text-danger');
//   modal1.style.display = "none";
// }

// $('#myModal').on('hidden.bs.modal', function () {
//   $('#myModal form')[0].reset();
// });

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//   // alert(event.target.id);
//   if (event.target == modal) {
//     // alert('modal');  
//     modal1.style.display = "none";
//   }
// }
	// document.addEventListener("click", function(event) {
	// 		// alert(event);
	// 		// If user either clicks X button OR clicks outside the modal window, then close modal by calling closeModal()
	// 		if (event.target.matches(".close") || !event.target.closest(".modal")) {
  //       // alert('sdsd');
	// 			closeModal()
	// 		}
	// 	},
	// 	false
	// )
  // function closeModal() {
	// 	document.querySelector(".modal").style.display = "none"
	// }

// $(document).ready(function () {
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.submitApplyJbBtn').on('click', function (event) {
    event.preventDefault();
    var url = $("#baseUrl").val() + '/jobApply';
    // alert(url);
    var job_user_id = $('#job_user_id').val();
    // alert(job_user_id);
    var jobid = $('#jobid').val();

    var inputAddress = $.trim($('#inputAddress').val());
    var inputCity = $.trim($('#inputCity').val());
    var inputState = $.trim($('#inputState').val());
    var inputCountry = $.trim($('#inputCountry').val());
    var inputZipcode = $.trim($('#inputZipcode').val());
    var inputGender = $.trim($('#inputGender').val());
    var inputExperience = $.trim($('#inputExperience').val());

    var error_address = '';
    if (inputAddress == 0){
      error_address = 'Address is required';
      $('#error_address').text(error_address);
      $('#error_address').addClass('has-error');
    }

    var error_city = '';
    if (inputCity == 0){
      error_city = 'City is required';
      $('#error_city').text(error_city);
      $('#error_city').addClass('has-error');
    }

    var error_state = '';
    if (inputState == 0){
      error_state = 'State is required';
      $('#error_state').text(error_state);
      $('#error_state').addClass('has-error');
    }

    var error_country = '';
    if (inputCountry == 0){
      error_country = 'Country is required';
      $('#error_country').text(error_country);
      $('#error_country').addClass('has-error');
    }

    var error_gender = '';
    if (inputGender == 0){
      error_gender = 'Gender is required';
      $('#error_gender').text(error_gender);
      $('#error_gender').addClass('has-error');
    }

    var error_experience = '';
    if (inputExperience == 0){
      error_experience = 'Experience is required';
      $('#error_experience').text(error_experience);
      $('#error_experience').addClass('has-error');
    }

    var error_zipcode = '';
    if (inputZipcode == 0){
      error_zipcode = 'Enter Vaild Zipcode Number';
      $('#error_zipcode').text(error_zipcode);
      $('#error_zipcode').addClass('has-error');
    }

    // console.log(inputCountry);
    // console.log(inputState);
    // console.log(inputCity);
    // console.log(inputGender);
    // console.log(inputExperience);

    var resumeName = $.trim($('#inputResume').val()).replace(/C:\\fakepath\\/i, '');
    var resumeExt = resumeName.split('.')[1];
    var error_file = '';
    if ($.trim($('#inputResume').val()).length == 0) {
      error_file = 'Resume is required';
      $('#error_file').text(error_file);
      $('#error_file').addClass('has-error');
    }
    // console.log('check rhaul');
    // console.log(error_file.trim());


    // var resumesize = $('#inputResume').prop('files')[0].size;
    // var error_file_size = '';
    // if (resumesize > 17900) {
    // 	error_file_size = "File too Big, please select a file less than 4mb";
    //   console.log(error_file_size);
    // 	$('#error_file_size').text(error_file_size);
    // 	$('#error_file_size').addClass('has-error');
    // }
    // else if	((resumeExt == 'jpg') || (resumeExt == 'jpeg') || (resumeExt == 'png') || (resumeExt == 'svg')){
    // 	error_file = 'File type is not supported';
    //   console.log(error_file);
    // 	$('#error_file').text(error_file);
    // 	$('#error_file').addClass('has-error');
    // }

    // console.log(error_file);
    // console.log(error_file_size);
    // console.log(error_file.trim());
    // var resumeExt = resumeName.split('.')[1];
    // console.log(resumeExt);

    var inputResume = $('#inputResume').prop('files')[0];
    // to check the type of file
    // var imageType = /doc.*/;
    // if (!inputResume.type.match(imageType)) return;

    var formData = new FormData();
    formData.append('inputResume', inputResume);
    formData.append('inputAddress', inputAddress);
    formData.append('inputCity', inputCity);
    formData.append('inputState', inputState);
    formData.append('inputCountry', inputCountry);
    formData.append('inputZipcode', inputZipcode);
    formData.append('inputGender', inputGender);
    formData.append('inputExperience', inputExperience);
    formData.append('job_user_id', job_user_id);
    formData.append('jobid', jobid);

    // console.log(inputResume);
    // console.log('eche');
    // console.log(document.location.href);
    // console.log(inputResume.file);
    // console.log(error_address);
    // console.log(error_city);
    // console.log(error_state);
    // console.log(error_country);
    // console.log(error_gender);
    // console.log(error_experience);
    // console.log(error_zipcode);
    // console.log(error_file);

    if (inputAddress.length > 0 || inputCity.length > 0 || inputState.length > 0 || inputCountry.length > 0 || inputGender.length > 0 || inputExperience.length > 0 || inputZipcode.length > 0 || inputResume.length > 0) {
      if (error_address.trim() != '' || error_city.trim() != '' || error_state.trim() != '' || error_country.trim() != '' || error_gender.trim() != '' || error_experience.trim() != '' || error_zipcode.trim() != '' || error_file.trim() != '') {
        return false;
      } else {
        $.ajax({
          url: url,
          enctype: 'multipart/form-data',
          method: "POST",
          data: formData,
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            $("#applyJobForm")[0].reset();
            // $("#jobformmsg").html(data);

            if (response.status == 'success') {
              success_noti(response.msg);
              setTimeout(function(){ window.location.reload(); }, 2600);
            }
            else if(response.status == 'info'){
              info_noti(response.msg);
              setTimeout(function(){ window.location.reload(); }, 2600);
            }
            else {
              console.log("error");
              // info_noti(response.msg);
            }

            // $('#message').css('display', 'block');
            // $('#message').html(data.message);
            // $('#message').addClass(data.class_name);
            // $('#uploaded_image').html(data.uploaded_image);error_address
          }
        });

      }
    }
  });


  $("#inputAddress").on('keyup', function () {
    if($.trim( $('#inputAddress').val() ).length != 0){
      $("#error_address").hide();
    }else{
      $("#error_address").show();
    }
  });

  $("#inputCity").on('change', function () {
    if($.trim( $('#inputCity').val() ).length != 0){
      $("#error_city").hide();
    }else{
      $("#error_city").show();
    }
  });

  $("#inputState").on('change', function () {
    if($.trim( $('#inputState').val() ).length != 0){
      $("#error_state").hide();
    }else{
      $("#error_state").show();
    }
  });

  $("#inputCountry").change(function () {
    if($.trim( $('#inputCountry').val() ).length != 0){
      $("#error_country").hide();
    }else{
      $("#error_country").show();
    }
  });

  $("#inputGender").change(function () {
    if($.trim( $('#inputGender').val() ).length != 0){
      $("#error_gender").hide();
    }else{
      $("#error_gender").show();
    }
  });

  $("#inputExperience").change(function () {
    if($.trim( $('#inputExperience').val() ).length != 0){
      $("#error_experience").hide();
    }else{
      $("#error_experience").show();
    }
  });

  $("#inputZipcode").on('keyup', function () {
    if($.trim( $('#inputZipcode').val() ).length != 0){
      $("#error_zipcode").hide();
    }else{
      $("#error_zipcode").show();
    }
  });

  $("#inputResume").change(function () {
    if($.trim( $('#inputResume').val() ).length != 0){
      $("#error_file").hide();
    }else{
      $("#error_file").show();
    }
  });
// });



$('#inputResume').on('change', function () {
  // var inputResume = $('#inputResume').prop('files')[0];
  var inputResume = $('#inputResume').prop('files');
  // console.log(inputResume[0].size);
  // console.log(this.files[0].size);
  // if (this.files[0].size > 17900) {
  // if (inputResume[0].size > 17900) {
  //   // alert("Try to upload file less than 2MB!");
  //   console.log("Try to upload file less than 2MB!");
  //   // error_file_size = "File too Big, please select a file less than 4mb";
  //   // $('#error_file_size').text(error_file_size);
  //   // $('#error_file_size').addClass('has-error');
  // } else {
  //   // $('#GFG_DOWN').text(this.files[0].size + "bytes");
  //   console.log("something getting wrong");
  // }
});


$(document).ready(function () {
  var base_url = window.location.origin;

  var host = window.location.host;

  var pathArray = window.location.pathname.split('/');
  // var base_path = "{{url('/')}}";
  var url = $("#baseUrl").val() + '/jobApply';
  // var = base_url + "jobApply";
  // const newLocal = window.location.origin + '/' + pathArray[1] + '/' + jobApply;
  // var url = newLocal;
  // var inputResume = $('#inputResume').prop('files')[0];
  // console.log(inputResume);
  // console.log(host);
  // console.log(pathArray[1]);
  // console.log(url);
});