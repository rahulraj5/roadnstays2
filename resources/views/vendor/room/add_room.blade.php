@extends('vendor.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
    .active .bs-stepper-circle {
        background-color: #126c62 !important;
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
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
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
              "</span>").insertAfter("#files");
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
    $(function() {
        // Summernote
        $('#summernote').summernote()
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
    $('#step_btn1').click(function() {
        $("#addHotelVen_form").validate({
            debug: false,
            rules: {
                hotelName: {
                    required: true,
                },
                summernote: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                var site_url = $("#baseUrl").val();
                // alert(site_url);
                var formData = $(form).serialize();
                $(form).ajaxSubmit({
                    type: 'POST',
                    url: "{{url('/servicepro/submitHotel')}}",
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 'success') {
                            // $("#register_form")[0].reset();
                            success_noti(response.msg);
                            setTimeout(function() {
                                window.location.reload()
                            }, 1000);
                            //   setTimeout(function(){window.location.href=site_url+"/admin/hotelList"},1000);
                        } else {
                            error_noti(response.msg);
                        }

                    }
                });
                // event.preventDefault();
            }
        });
    });

    
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
                            $('button').click(function() {
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
                                        <div class="card-body">

          <form method="POST" id="roomAdmin_form" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="hotel_name" id="hotel_name" value="{{$hotel_id}}">
            <div class="row">


              <div class="col-md-6">

                <div class="form-group">

                  <label>Room type</label>

                  <select class="form-control select2bs4" name="room_type" id="room_type" style="width: 100%;">

                    <option value="">Select room type</option>

                    @foreach ($room_type_categories as $cont)

                    <option value="{{ $cont->id }}">{{ $cont->title }}</option>

                    @endforeach

                  </select>

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room name</label>

                  <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Enter Room Name">

                </div>

              </div>



              <div class="col-md-6">

                <div class="form-group">

                  <label>Max adults</label>

                  <input type="text" class="form-control" name="max_adults" id="max_adults" placeholder="Enter max adults">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Max childern</label>

                  <input type="text" class="form-control" name="max_childern" id="max_childern" placeholder="Enter max childern">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room qty</label>

                  <input type="text" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Enter room qty.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night</label>

                  <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 7 days</label>

                  <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 30 days</label>

                  <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Cleaning fee</label>

                  <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>City fee</label>

                  <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city fee.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra guest per night</label>

                  <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night.">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Type of price </label>

                  <select class="form-control select2bs4" name="type_of_price" id="type_of_price" style="width: 100%;">

                    <option value="">Select Price type</option>

                    <option value="single_fee">Single fee</option>
                    <option value="per_night">Per night</option>
                    <option value="per_guest">Per guest</option>
                    <option value="per_night_per_guest">Per night per guest</option>

                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Bed type</label>

                  <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;">
                    <option value="">Select Bed type</option>
                    <option value="Single bed">Single bed</option>
                    <option value="Double bed">Double bed</option>
                    <option value="Bunk bed">Bunk bed</option>
                    <option value="Sofa bed">Sofa bed</option>
                    <option value="Futon Mat">Futon Mat</option>
                    <option value="Extra-Large double bed (Super - King size)">Extra-Large double bed (Super - King size)</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Private bathroom</label>

                  <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Private entrance</label>

                  <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Optional services</label>

                  <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Family friendly</label>

                  <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Outdoor facilities</label>

                  <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra people</label>

                  <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people.">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room description</label>

                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Notes</label>

                  <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes">

                </div>

              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="field" align="left">
                    <label>Upload room images</label>
                    <input type="file" id="files" name="imgupload[]" multiple />
                  </div>
                </div>
              </div>


              <!-- <div class="row"> -->
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
                  <select class="form-control select2bs4" multiple="multiple" name="entertain_service[]" id="entertain_service" data-placeholder="Select Entertainment and family services" style="width: 100%;" style="width: 100%;" required="required">
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
                  <select class="form-control select2bs4" multiple="multiple" name="extra_service[]" id="extra_service" data-placeholder="Select Services & Extras" style="width: 100%;" required="required">
                    <!-- <option value="">Services & Extras</option> -->
                    @php $extra_services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type','Services_n_Extras')->get(); @endphp
                    @foreach ($extra_services as $value)
                    <option value="{{ $value->id }}">{{ $value->service_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Other Features</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Other Features</label>
                  <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;" required="required">
                    <!-- <option value="">Services & Extras</option> -->
                    @php $other_features = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get(); @endphp
                    @foreach ($other_features as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
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