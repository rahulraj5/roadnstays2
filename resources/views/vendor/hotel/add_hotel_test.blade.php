@extends('vendor.layouts.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
    .active .bs-stepper-circle {
        background-color: #126c62 !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bootstrap 4 -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->
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
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> -->

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

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    // $('#step_btn1').click(function() {
    //     $("#addHotelVen_form").validate({
    //         debug: false,
    //         rules: {
    //             hotelName: {
    //                 required: true,
    //             },
    //             summernote: {
    //                 required: true,
    //             },
    //         },
    //         submitHandler: function(form) {
    //             var site_url = $("#baseUrl").val();
    //             // alert(site_url);
    //             var formData = $(form).serialize();
    //             $(form).ajaxSubmit({
    //                 type: 'POST',
    //                 url: "{{url('/servicepro/submitHotel')}}",
    //                 data: formData,
    //                 success: function(response) {
    //                     // console.log(response);
    //                     if (response.status == 'success') {
    //                         // $("#register_form")[0].reset();
    //                         success_noti(response.msg);
    //                         setTimeout(function() {
    //                             window.location.reload()
    //                         }, 1000);
    //                         //   setTimeout(function(){window.location.href=site_url+"/admin/hotelList"},1000);
    //                     } else {
    //                         error_noti(response.msg);
    //                     }

    //                 }
    //             });
    //             // event.preventDefault();
    //         }
    //     });
    // });


    $(".slide.one .button").click(function() {
        // alert('sdfsd');
        var form = $("#addHotelVen_form");
        form.validate({
            rules: {
                hotelName: {
                    required: true,
                },
                summernote: {
                    required: true,
                },
            },
            messages: {
                hotelName: {
                    required: "Please enter a Hotel Name"
                },
                summernote: {
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
            // alert( "Form successful submitted!" );
            $(".slide.one").removeClass("active");
            $(".slide.two").addClass("active");
        }
    });

    $(".slide.two .button").click(function() {
        var form = $("#addHotelVen_form");
        form.validate({
            rules: {
                hotel_address: {
                    required: true
                }
            },
            messages: {
                hotel_city: {
                    required: "This is required."
                }
            }
        });
        form.validate({
            rules: {
                hotel_address: {
                    required: true
                }
            },
            messages: {
                hotel_city: {
                    required: "This is required."
                }
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

    $(".slide.three .button").click(function(){
        var form = $("#addHotelVen_form");
        form.validate({
          rules: {
            entertain_service1: {
              required: true,
            },
            entertain_service2: {
              required: true,
            },
          },
        });
        if (form.valid() === true){  
            // var form = $("#addHotelVen_form");
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
              // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: "{{url('servicepro/submitHotel')}}",
                data: formData,
                success: function(response) {
                // console.log(response);  
                // alert('sd'); 
                if (response.status == 'success') {
                  // $("#register_form")[0].reset();
                  success_noti(response.msg);
                  // setTimeout(function() {
                  //   window.location.reload()
                  // }, 1000);
                  setTimeout(function() {
                    window.location.href = site_url + "/servicepro/hotelList"
                  }, 1000);
                } else {
                  error_noti(response.msg);
                }

                }
            });
            // event.preventDefault();
        }
    });

    // $('#step_btn1').click(function() {
    //     // alert('hello');
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var site_url = $("#baseUrl").val();
    //     var url = "{{url('/servicepro/submitHotel')}}";
    //     var form = $("#addHotelVen_form");
    //     // alert(url);
    //     $.ajax({
    //         enctype: 'multipart/form-data',
    //         method: "POST",
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         url: url,
    //         data: form.serialize(), // serializes the form's elements.
    //         success: function(data) {
    //             console.log(data);
    //             // alert(data); // show response from the php script.
    //         }
    //     });

    //     // var formData = $(form).serialize();

    //     // $(form).ajaxSubmit({
    //     //     type: 'POST',
    //     //     url: "{{url('/servicepro/submitHotel')}}",
    //     //     data: formData,
    //     //     success: function (response) {
    //     //     // console.log(response);
    //     //     if (response.status == 'success') {
    //     //         // $("#register_form")[0].reset();
    //     //         success_noti(response.msg);
    //     //         // setTimeout(function(){window.location.reload()},1000);
    //     //         // setTimeout(function(){window.location.href=site_url+"/admin/hotelAmenity_list"},1000);
    //     //     } else {
    //     //         error_noti(response.msg);
    //     //     }

    //     //     }
    //     // });
    // });


    // $('#step_btn1').click(function() {
    //     alert('hello');
    //     $("#addHotelVen_form").validate({
    //         debug: false,
    //         rules: {
    //             entertain_service1: {
    //             required: true,
    //             },
    //             entertain_service2: {
    //                 required: true,
    //             },
    //         },
    //         submitHandler: function (form) {
    //         var site_url = $("#baseUrl").val();
    //         var url = "{{url('/servicepro/submitHotel')}}";

    //         alert(url);
    //         var formData = $(form).serialize();
    //         $(form).ajaxSubmit({
    //             type: 'POST',
    //             url: "{{url('/servicepro/submitHotel')}}",
    //             data: formData,
    //             success: function (response) {
    //             // console.log(response);
    //             if (response.status == 'success') {
    //                 // $("#register_form")[0].reset();
    //                 success_noti(response.msg);
    //                 // setTimeout(function(){window.location.reload()},1000);
    //                 // setTimeout(function(){window.location.href=site_url+"/admin/hotelAmenity_list"},1000);
    //             } else {
    //                 error_noti(response.msg);
    //             }

    //             }
    //         });
    //         // event.preventDefault();
    //         }
    //     });
    // });    
</script>


@endsection

@section('content')
<main id="main">
    <section class="user-section" style="padding-top: 54px; background-color: #f6f6f6;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 pr-0">
                    <div class="sidebar left ">
                        <ul class="list-sidebar bg-defoult">
                            <div class="vend-stays"> Road N Stays</div>
                            <li> <a href="#" data-toggle="collapse" data-target="#hotels" class="collapsed active"> <i class='bx bx-buildings'></i> <span class="nav-label"> Hotel Management </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                                <ul class="sub-menu collapse" id="hotels">
                                    <li class="active"><a href="{{ url('servicepro/hotelList') }}"><i class='bx bx-chevron-left'></i>Hotels List</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i class='bx bx-space-bar'></i> <span class="nav-label"> Private space </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                                <ul class="sub-menu collapse" id="dashboard">
                                    <li class="active"><a href="#"><i class='bx bx-chevron-left'></i>Add Private Space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> List showing Privat space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Booking parivat space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i class='bx bx-car'></i> <span class="nav-label">Tour Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                                <ul class="sub-menu collapse" id="products">
                                    <li class="active"><a href="#"> <i class='bx bx-chevron-left'></i> Add tour packages List</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> List showing tour packages</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Typography</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class='bx bx-calendar-event'></i> <span class="nav-label">Event Management </span><i class='bx bx-chevron-right pull-r'></i></a>
                                <ul class="sub-menu collapse" id="tables">
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Static Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Data Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Foo Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> jqGrid</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><i class='bx bx-chevron-right pull-r'></i></a>
                                <ul class="sub-menu collapse" id="e-commerce">
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Products grid</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Products list</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Product edit</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#sidebar_bar').click(function() {
                                $('.sidebar').toggleClass('fliph');
                            });
                        });
                    </script>
                </div>

                <div class="col-md-9 pl-0">
                    <div class="table-space">
                        <header id="header-vendor" class="fixed-top-vendor">
                            <div class="container d-flex align-items-center justify-content-between">
                                <h3 class="dashbord-text"> Dashboard</h3>
                                <nav class=" vendor-nav d-lg-block">
                                    <ul>
                                        <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                                        </li>
                                        <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                                        <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                                            <ul>
                                                <li><a href="{{ url('/servicepro/profile') }}">View profile</a></li>
                                                <li><a href="#">Drop Down </a></li>
                                                <li><a href="#">Drop Down 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </header>

                        <div class="row d-flex flex-wrap p-3">


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
                                                    <form method="POST" id="addHotelVen_form" enctype="multipart/form-data">
                                                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->
                                                        @csrf
                                                        <div id="hotel-context-part" class="content slide one" role="tabpanel" aria-labelledby="hotel-context-part-trigger">
                                                            <!-- <form method="POST" id="addHotelContext_form"> -->

                                                            <!-- <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" /> -->

                                                            <div class="row">

                                                                <div class="col-md-12 mt-0">
                                                                    <!-- <div class="tab-custom-content mt-0"> -->
                                                                    <!-- <p class="" style="margin-bottom: 0px;padding: 3px!important;"> -->
                                                                    <h4>Hotel Context</h4>
                                                                    <!-- </p> -->
                                                                    <!-- </div> -->
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Hotel Name</label>
                                                                        <input type="text" class="form-control" name="hotelName" id="hotelName" placeholder="Enter Name" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Hotel Content</label>
                                                                        <textarea id="summernote" name="summernote" required></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="customFile">Hotel Video</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="hotelVideo" id="hotelVideo" required="required">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="customFile">Hotel Gallery</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="hotelGallery" name="hotelGallery" required="required">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Category and Listed In/Room Type</label>
                                                                        <select class="form-control select2bs4" name="cat_listed_room_type" id="cat_listed_room_type" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Select Category and Listed In/Room Type</option> -->
                                                                            @foreach ($properties as $prop)
                                                                            <option value="{{ $prop->id }}">{{ $prop->stay_type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label>Where else your property listed?</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <!-- checkbox -->
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input class="custom-control-input" type="radio" id="where_property_listed1" name="where_property_listed" value="1">
                                                                                    <label for="where_property_listed1" class="custom-control-label">Yes</label>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input class="custom-control-input" type="radio" id="where_property_listed2" name="where_property_listed" value="0" checked>
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
                                                                        <select class="form-control" name="hotel_rating" id="hotel_rating" required="required">
                                                                            <option value="1">1 Star</option>
                                                                            <option value="2">2 Star</option>
                                                                            <option value="3">3 Star</option>
                                                                            <option value="4">4 Star</option>
                                                                            <option value="5">5 Star</option>
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
                                                                        <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Enter Contact Name" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Contact Number</label>
                                                                        <input type="text" class="form-control" name="contact_num" id="contact_num" placeholder="Enter Contact Number" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Alternate Number</label>
                                                                        <input type="text" class="form-control" name="alternate_num" id="alternate_num" placeholder="Enter Alternate Number">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label>Do you own multiple hotels or are you part of property management company or group?</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <!-- checkbox -->
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input class="custom-control-input" type="radio" id="do_you_multiple_hotel1" name="do_you_multiple_hotel" value="1">
                                                                                    <label for="do_you_multiple_hotel1" class="custom-control-label">Yes</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input class="custom-control-input" type="radio" id="do_you_multiple_hotel2" name="do_you_multiple_hotel" value="0" checked>
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
                                                                            <input type="file" class="custom-file-input" name="hotel_document" id="hotel_document" required="required">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Scouts ID</label>
                                                                        <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;">
                                                                            <!-- <option value="">Select Scouts</option> -->
                                                                            @php $scouts = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get(); @endphp
                                                                            @foreach ($scouts as $value)
                                                                            <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Hotel Notes</label>
                                                                        <textarea id="summernote1" name="hotel_notes" required></textarea>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="customFile">Hotel Notes</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="hotel_notes" name="hotel_notes" required="required">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
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
                                                                        <input type="text" class="form-control" id="checkin_time" name="checkin_time" value="" required="required">
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-time"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- </div> -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time for Check out</label>
                                                                        <input type="text" class="form-control" name="checkout_time" id="checkout_time" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Min day before booking</label>
                                                                        <input type="text" class="form-control" name="min_day_before_book" id="min_d_before_book" placeholder="Enter Min day before booking" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Min day stays</label>
                                                                        <input type="text" class="form-control" name="min_day_stays" id="min_day_stays" placeholder="Enter Min day stays" required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <a class="btn btn-primary btn-dark button">Next</a>
                                                                    <!-- onclick="stepper.next()" -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="hotel-policy-part" class="content slide two" role="tabpanel" aria-labelledby="hotel-policy-part-trigger">

                                                            <div class="row">

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
                                                                        <h4>Locations</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input type="text" class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <!-- <p>The geographic coordinate</p> -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Latitude</label>
                                                                        <input type="text" class="form-control" name="hotel_latitude" id="hotel_latitude" placeholder="Enter ">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Longitude</label>
                                                                        <input type="text" class="form-control" name="hotel_longitude" id="hotel_longitude" placeholder="Enter ">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <input type="text" class="form-control" name="hotel_city" id="hotel_city" placeholder="Enter " required="required">
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
                                                                        <select class="form-control select2bs4" name="hotel_country" id="hotel_country" style="width: 100%;" required="required">
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
                                                                        <h4>Atrractions</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="attraction_name" id="attraction_name" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Content</label>
                                                                        <input type="text" class="form-control" name="attraction_content" id="attraction_content" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Distance</label>
                                                                        <input type="text" class="form-control" name="attraction_distance" id="attraction_distance" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Type</label>
                                                                        <input type="text" class="form-control" name="attraction_type" id="attraction_type" placeholder="Enter " required="required">
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
                                                                        <label>Price ( min. Price of the Room )</label>
                                                                        <input type="text" class="form-control" name="stay_price" id="stay_price" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="tab-custom-content">
                                                                        <p class="lead mb-0">
                                                                        <h4>Extra price</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="extra_price_name" id="extra_price_name" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input type="text" class="form-control" name="extra_price" id="extra_price" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Type</label>
                                                                        <input type="text" class="form-control" name="extra_price_type" id="extra_price_type" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="tab-custom-content">
                                                                        <p class="lead mb-0">
                                                                        <h4>Service fee</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="service_fee_name" id="service_fee_name" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input type="text" class="form-control" name="service_fee" id="service_fee" placeholder="Enter " required="required">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Type</label>
                                                                        <input type="text" class="form-control" name="service_fee_type" id="service_fee_type" placeholder="Enter " required="required">
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
                                                                        <select class="form-control select2bs4" name="property_type" id="property_type" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Select Property Type</option> -->
                                                                            @foreach ($properties as $prop)
                                                                            <option value="{{ $prop->id }}">{{ $prop->stay_type }}</option>
                                                                            @endforeach
                                                                        </select>
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
                                                                <div class="col-md-12">
                                                                    <div class="tab-custom-content">
                                                                        <p class="lead mb-0">
                                                                        <h4>Facilities</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Room Amenities</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="entertain_service1[]" id="entertain_service1" data-placeholder="Select Room Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Select Room Amenities</option> -->
                                                                            @php $entertain_service = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',1)->get(); @endphp
                                                                            @foreach ($entertain_service as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Bathroom Amenities</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service2[]" id="extra_service2" data-placeholder="Select Bathroom Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',2)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Media and Technology</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service3[]" id="extra_service3" data-placeholder="Select Media and Technology Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',3)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Food & drink</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service4[]" id="extra_service4" data-placeholder="Select Food & drink Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',4)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Outdoor and view</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service5[]" id="extra_service5" data-placeholder="Select Outdoor and view Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',5)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Accessibility</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service6[]" id="extra_service6" data-placeholder="Select Accessibility Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',6)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Entertainment and family services</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service7[]" id="extra_service7" data-placeholder="Select Entertainment and family services Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',7)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Services & extras</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service8[]" id="extra_service8" data-placeholder="Select Services & extras Amenities" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',8)->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->amenity_id }}">{{ $value->amenity_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="tab-custom-content">
                                                                        <p class="lead mb-0">
                                                                        <h4>Services</h4>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Entertainment and family services</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="entertain_service[]" id="entertain_service" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Select Entertainment and family services</option> -->
                                                                            @php $entertain_service = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Entertainment_n_Family')->get(); @endphp
                                                                            @foreach ($entertain_service as $value)
                                                                            <option value="{{ $value->id }}">{{ $value->service_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Services & Extras</label>
                                                                        <select class="form-control select2bs4" multiple="multiple" name="extra_service[]" id="extra_service" style="width: 100%;" required="required">
                                                                            <!-- <option value="">Services & Extras</option> -->
                                                                            @php $extra_services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Services_n_Extras')->get(); @endphp
                                                                            @foreach ($extra_services as $value)
                                                                            <option value="{{ $value->id }}">{{ $value->service_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <a class="btn btn-primary btn-dark" onclick="stepper.previous()">Previous</a>
                                                                    <!-- <button class="btn btn-primary btn-dark float-right" name="submit" id="step_btn3" type="submit">Submit</button> -->
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