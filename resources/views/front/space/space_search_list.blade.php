@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style type="text/css">
    .owl-carousel .owl-stage-outer {
        position: relative;
        overflow: inherit !important;
        -webkit-transform: translate3d(0px, 0px, 0px);
    }

    .testimonials .testimonial-wrap {
        padding-left: 1px !important;
    }
</style>

<style type="text/css">
    .cate-text-icon-img .owl-carousel .item {
        background: #4DC7A0;
        padding: 0px;
        height: auto;
    }

    /*.cate-text-icon-img .owl-theme .owl-nav {
    margin-top: 10px;
    position: absolute;
    z-index: 999999;
    top: 81px;
    font-size: 43px;
    display: flex;
     justify-content: space-between; 
    color: #FFFF;
    }*/
    .cate-text-icon-img .owl-prev {}

    .owl-theme .owl-nav {
        margin-top: 10px;
        position: relative;
        bottom: 116px;
        color: #f1f3f4;
        font-size: 42px;
    }

    .btns {
        display: table;
        margin: 30px auto;
    }

    .customNextBtn,
    .customPreviousBtn {
        float: right;
        background: #2d9070;
        color: #fff;
        padding: 10px;
        margin-left: 5px;
        cursor: pointer;
    }

    .cate-text-icon-img .owl-theme .owl-nav [class*=owl-]:hover {
        background: inherit;
        color: #FFF;
        text-decoration: none;
    }
</style>

<style type="text/css">
  #profile-description {
    max-width: 400px;
    position: relative;
  }

  #profile-description .text {
    /*   width: 660px;  */
    margin-bottom: 5px;
    color: #777;
    padding: 0 15px;
    position: relative;
    font-family: Arial;
    font-size: 14px;
    display: block;
  }

  #profile-description .show-more {
    /*   width: 690px;  */
    color: #777;
    position: relative;
    font-size: 12px;
    padding-top: 5px;
    height: 20px;
    text-align: center;
    background: #f1f1f1;
    cursor: pointer;
  }

  #profile-description .show-more:hover {
    color: #1779dd;
  }

  #profile-description .show-more-height {
    height: 200px;
    overflow: hidden;
  }
</style>
@endsection

@section('current_page_js')

<script type="text/javascript">
    // $('.portfolio-item').isotope({
    //    itemSelector: '.item',
    //    layoutMode: 'fitRows'
    //  });
    $('.portfolio-menu ul li').click(function() {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        // ADDING DATA
        (function() {
            var inc = 0;
            $('.sc-sp-data-dis').each(function() {
                $(this).attr('data-scsp', "data" + inc)
                inc++;
            });
        })();
        (function() {
            var inc = 0;
            $('.sc-sp-list').each(function(ev) {
                $(this).attr('data-scsp', "data" + inc)
                inc++;
            });
        })();

        $(window).on("load scroll", function() {
            var windowScroll = $(this).scrollTop();
            $(".sc-sp-data-dis").each(function() {
                var thisOffsetTop = Math.round($(this).offset().top - 30);

                if (windowScroll >= thisOffsetTop) {
                    var thisAttr = $(this).attr('data-scsp');
                    $('.sc-sp-list').parent().removeClass("active");
                    $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
                }
            });
        });

        $('.sc-sp-list').click(function(ev) {
            ev.preventDefault();
            var thisAttr = $(this).attr("data-scsp");
            var scrollTo = $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').offset().top;

            $(this).parent().addClass("active").siblings().removeClass("active");

            $(".sc-sp-data-dis").removeClass("active");
            $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').addClass("active");

            $('html, body').animate({
                scrollTop: scrollTo - 5
            }, 150);
        });
    });
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".btnrating").on('click', (function(e) {

            var previous_value = $("#selected_rating").val();
            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }
        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1,
            dots: false,
            autoplay: true,
            responsiveClass: true,
        });
    });
</script>

<script>
   var today = new Date(); 
   var dd = today.getDate(); 
   var mm = today.getMonth()+1; //January is 0! 
   var yyyy = today.getFullYear(); 
   if(dd<10){ dd='0'+dd } 
   if(mm<10){ mm='0'+mm } 
   let today_date = dd+'/'+mm+'/'+yyyy;
   // alert(today);

   $(function() {
       
      $('.reserved').daterangepicker({
         // minDate:new Date(),
         dateFormat: "dd-M-yy",
         minDate: 1,
         defaultDate: new Date(),
         // minDate: today_date,
         // opens: 'right'
      }, function(start, end, label) {
            $('#space_checkin_date').val(start.format('DD-MM-YYYY'));
            $('#space_checkout_date').val(end.format('DD-MM-YYYY'));
      });
   });
</script>

<script>
   var placeSearch, autocomplete;
   var componentForm = {
      // street_number: 'long_name',
      // route: 'long_name',
      // locality: 'long_name',
      // postal_code: 'short_name'
   };

   function initAutocomplete() {
      autocomplete = new google.maps.places.Autocomplete(
         (document.getElementById('autocomplete_space')), {
            types: ['(cities)']
         });
      autocomplete.addListener('place_changed', function() {
         var place = autocomplete.getPlace();
         console.log(place);
         document.getElementById('space_latitude').value = place.geometry.location.lat();
         document.getElementById('space_longitude').value = place.geometry.location.lng();
         fillInAddress(autocomplete, "");
      });
   }

   function fillInAddress(autocomplete, unique) {

      var place = autocomplete.getPlace();
      for (var component in componentForm) {
         if (!!document.getElementById(component + unique)) {
            document.getElementById(component + unique).value = '';
            document.getElementById(component + unique).disabled = false;
         }
      }

      for (var i = 0; i < place.address_components.length; i++) {
         var addressType = place.address_components[i].types[0];
         if (componentForm[addressType] && document.getElementById(addressType + unique)) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType + unique).value = val;
         }
      }
   }
   google.maps.event.addDomListener(window, "load", initAutocomplete);

   function geolocate() {
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
               lat: position.coords.latitude,
               lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
               center: geolocation,
               radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
         });
      }
   }
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#spaceFilterFormR').on('change', function() {

      var $this = $(this);
      var frmValues = $this.serialize();

      $('#loading-image').show();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        method: 'POST',
        url: "{{url('space_list_ajax')}}",
        data: frmValues,
        dataType: 'json',
        success: function(response) {
          //console.log(response);
          $('#filterspacedata').html(response);
          $('#loading-image').hide();

        }
      });

    });

  });
</script>

<script type="text/javascript">
  $(".show-more").click(function() {
    if ($(".text").hasClass("show-more-height")) {
      $(this).text("Show less");
    } else {
      $(this).text("Show all");
    }

    $(".text").toggleClass("show-more-height");
  });
</script>
@endsection

@section('content')
<section id="dynamic" class="sticky-space" style="">
    
    <div class="container">

        <div class="row">
            <div class="col-md-12 ">
                <div class="event-locaatio">
                    <!-- <small><a href="#"> Home </a>/ <a href="#"> Event </a> </small> -->
                    <div class="hotel-typ">
                        <h3 id="locat-h">space in {{ $space_city }} </h3>
                        <form method="GET" action="{{url('spaceList')}}">
                            @csrf
                            <div id="hotel-form1" class="row  align-items-center hotel-form1">
                                <div class="col-md-4 filter_01 pr-0 h-hotel pl-0">
                                    <!-- <p>Where To</p>  -->
                                    <span id="i-1" class="span3 form-control-lo"><i class="bx bx-map"></i>
                                        <input type="location" name="space_location" placeholder="Location, City, Place" class="locatin-space" value="{{$space_city}}" id="autocomplete_space" required="">
                                        <input type="hidden" name="space_latitude" id="space_latitude" value="{{$space_latitude}}">
                                        <input type="hidden" name="space_longitude" id="space_longitude" value="{{$space_longitude}}">
                                    </span>
                                </div>
                                <div class="col-md-2 filter_01 pr-0 reserved">
                                    <input id="space_checkin_date" class="span3 min_dat minimum_date" value="{{ date('d-M-y', strtotime($space_check_in_date)) ?? '' }}" name="space_checkin_date" placeholder="Choose a date">
                                </div>
                                <div class="col-md-2 filter_01 pr-0 reserved">
                                    <input id="space_checkout_date" class="span3 min_dat minimum_date" min="" value="{{ date('d-M-y', strtotime($space_check_out_date)) ?? '' }}" name="space_checkout_date" placeholder="Choose a date">
                                </div>
                                
                                <div class="col-md-2 filter_01 pr-0" id="i-5">
                                    <button><i class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<main id="main" class="main-body">
    <!-- paste here html code -->
    <!-- slider -->
    <main id="main">
        <section class="user-section" style="padding-top: 10px; background-color: #f6f6f6;">
            <div class="container-fluid" id="filterspacedata">
                <!-- <div class="row gird-event"  id="filterspacedata"> -->
                <span><img id="loading-image" src="{{asset('resources/assets/img/loading.gif')}}" style="display: none;"></span>
                <div class="row filter-row">
                    <div class="col-md-3 sticky-spaclist">
                        <form method="POST" id="spaceFilterForm" action="" enctype="multipart/form-data">
                        <!-- put it in action -->
                        <!--{{ url('space_list_ajax') }}-->
                        @csrf
                            <h6>Filter - Space</h6>
                            <div class="category category-0">
                                <p>Distance</p>
                                <ul>
                                <li><label><input type="checkbox" name="distance[]" id="" value="1">Less than 1 Mile<label></li>
                                <li><label><input type="checkbox" name="distance[]" id="" value="3">Less than 3 Mile<label></li>
                                <li><label><input type="checkbox" name="distance[]" id="" value="5">Less than 5 Mile<label></li>
                                <li><label><input type="checkbox" name="distance[]" id="" value="7">Less than 7 Mile<label></li>

                                </ul>
                            </div>
                            <div class="category category-1">
                                <p>Space Type</p>
                                <ul>
                                    @foreach($categories as $category)
                                    <li><input type="checkbox" name="categories[]" value="{{$category->category_name}}" id="">{{$category->category_name}}</li>
                                    @endforeach 
                                </ul>
                            </div>

                            <div class="category category-2">
                                <p>Listed Wise</p>
                                <ul>
                                    @foreach($subcategories as $subcategory)
                                        <li><input type="checkbox" name="subcategories[]" value="{{$subcategory->sub_category_name}}" id="">{{$subcategory->sub_category_name}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- <div class="category category-4">
                                <p>LIVE </p>
                                <ul>
                                    <li><input type="checkbox" name="Music events" id="">Music events</li>
                                    <li><input type="checkbox" name="Sporting events" id="">Sporting events</li>
                                    <li><input type="checkbox" name="Festivals" id="">Festivals</li>
                                </ul>
                            </div>
                            <div class="category category-4">
                                <p>Date</p>
                                <input type="date" name="" id="" placeholder="select a date">

                            </div> -->
                            <div class="category category-5">
                                <p>space City</p>
                                <ul>
                                    @foreach($space_country as $country)
                                        <li><input type="checkbox" name="countries[]" value="{{ $country->country_id }}" id="">{{ $country->country_name }}</li>
                                    @endforeach 
                                </ul>
                            </div>

                            <div class="category category-3">
                                <p>Features</p>
                                <div id="profile-description">
                                    <div class="text show-more-height">
                                        <ul>
                                            <?php foreach ($features as $key => $value) { ?>

                                                <li><label><input type="checkbox" name="emenites[]" id="" value="{{$value->space_feature_id}}">{{$value->space_feature_name}}</label></li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                    <div class="show-more">Show all</div>
                                </div>        
                            </div>
                        </form>
                    </div>

                    <div class="col-md-9">
                        <div class="space-category">
                            <!-- <h3 class="mb-4">126 results |Coworking Space in Indore</h3> -->
                            <h3 class="mb-4">{{ $spaceList->total() }} results | {{ $space_city }}</h3>
                            @if(!empty($spaceList))
                            @foreach($spaceList as $space)
                            <div class="cate-box">
                                <!--  <div class="cate-text-icon-img">
                                    <img src="{{ url('resources/assets/img/a3.png')}}">
                                </div> -->

                                <div class="cate-text-icon-img">
                                    <div class="owl-carousel owl-theme">
                                        @if($space->image)
                                        <div class="item"><img src="{{ url('public/uploads/space_images')}}/{{$space->image}}"> </div>
                                        @endif

                                        @php $space_gallery = DB::table('space_gallery')->where('space_id', $space->space_id)->get(); @endphp
                                        @if($space_gallery)
                                        @foreach($space_gallery as $space_image)
                                        <div class="item"><img src="{{ url('public/uploads/space_images')}}/{{$space_image->image}}"> </div>
                                        @endforeach
                                        @endif
                                        <!-- <div class="item"> <img src="{{ url('resources/assets/img/a3.png')}}"> </div> -->
                                    </div>
                                </div>

                                <div class="co-overlay">
                                    <h3>{{ $space->space_name }}</h3>
                                    <div class="d-flex justify-content-between w-75">
                                        <h4 class="motn-text">PKR {{$space->price_per_night}}/-<small>/Per Night</small> </h4>
                                        <h4 class="motn-text">{{$space->room_size}}<small>/sq.ft.</small> </h4>
                                        <h4 class="motn-text">{{$space->bedroom_number}} Bedrooms<small>/{{$space->bathroom_number}} Baths</small> </h4>
                                    </div>

                                    <div class="d-flex justify-content-start hot-desh mt-2">
                                        <a href="#"> Hot Desk </a>
                                        <a href="#"> Dedicated Desk </a>
                                        <a href="#"> Meeting Room </a>
                                    </div>
                                    <p class="mt-3 v-text">
                                        <!-- Virtual coworks indore is a fine modern standalone building with all the facilities under one roof. -->
                                        {{ Str::limit($space->description, 90) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="social-icon-list">
                                            <ul>
                                                <li> <a href="#"> <i class='bx bxs-star'></i> <!-- <label> 3.0 </label> --></a> </li>
                                                <li> <a href="#"><i class='bx bxs-share'></i></a> </li>
                                                <li> <a href="#"> <i class='bx bxs-low-vision'></i></a> </li>
                                            </ul>
                                        </div>
                                        <!-- <button type="button" data-toggle="modal" data-target="#openEditor" class="contact-oprator"> Book Now</button> -->
                                        <a href="{{ url('/space-details') }}/{{ base64_encode($space->space_id) }}"><button type="button" class="contact-oprator"> Book Now</button></a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="cate-box">
                                    <div class="cate-text-icon-img">
                                        <img src="{{ url('resources/assets/img/a3.png')}}">
                                    </div>

                                    <div class="co-overlay">
                                        <h3>Virtual Coworks Indore</h3>
                                        <div class="d-flex justify-content-between w-75">
                                            <h4 class="motn-text">₹ 18000<small>/Month</small> </h4>
                                            <h4 class="motn-text">1300<small>/sq.ft.</small> </h4>
                                            <h4 class="motn-text">2BHK<small>/2Baths</small> </h4>
                                        </div>


                                        <div class="d-flex justify-content-start hot-desh mt-2">
                                            <a href="#"> Hot Desk </a>
                                            <a href="#"> Dedicated Desk </a>
                                            <a href="#"> Meeting Room </a>
                                        </div>
                                        <p class="mt-3 v-text">
                                            Virtual coworks indore is a fine modern standalone building with all the facilities under one roof.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="social-icon-list">
                                                <ul>
                                                    <li><a href="#"> <i class='bx bxs-star'></i></a></li>
                                                    <li><a href="#"><i class='bx bxs-share'></i></a></li>
                                                    <li><a href="#"> <i class='bx bxs-low-vision'></i></a></li>
                                                </ul>
                                            </div>

                                            <button type="button" data-toggle="modal" data-target="#openEditor" class="contact-oprator"> Contact
                                                Operator</button>
                                        </div>
                                    </div>
                                </div> -->

                            @endforeach

                            @else
                            <div class="cate-box">
                                <p>Not Found</p>
                            </div>
                            @endif

                        </div>

                    </div>
                    <!-- <div class="col-md-9">
                        <div class="">{{ $spaceList->links() }}</div>
                    </div> -->
                </div>

                <div class="row gird-event" id="filterdata">

                    <div class="col-md-9">
                        <div class="">{{ $spaceList->links() }}</div>
                    </div>

                </div>

    </main>
    <!-- End #main -->

    <!-- MODAL AREA START -->
    <div class="modal fade" id="openEditor" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close cros-btn" data-dismiss="modal">×</button>
                <div class="modal-body p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 user-details">
                                <h4> Send Enquiry to Owner</h4>
                                <div class="d-block">
                                    <h5 class="mb-3">You are - </h5>
                                    <div class="form-check-inline">
                                        <label class="customradio"><span class="radiotextsty">Individual</span>
                                            <input type="radio" checked="checked" name="radio">
                                            <span class="checkmark"></span>
                                        </label>        
                                        <label class="customradio"><span class="radiotextsty">Dealer</span>
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <input type="text" name="" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <input type="text" name="" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <input type="text" name="" placeholder="IND(+91)" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <textarea rows="5" cols="12" class="w-100 text-area-modal"></textarea>
                                        <label class="i-agree"> <input type="checkbox" name="vehicle1" value="Bike"> I agree to be contacted
                                            by Road N stays and others for similar properties or related services via </label>
                                    </div>
                                    <div class="w-100 text-center">
                                        <button type="button" class="send-mail mt-4"> Send email & SMS</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- MODAL AREA END -->
    <!-- ======= Footer ======= -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> Twin/Double Room - 1 Bedroom - Classic </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="LoginForm">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="roomdetails" class="roomdetails" style="overflow: hidden;">
                                    <div class="owl-carousel testimonials-carousel">
                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item">
                                                <div class="heig-fic-room-list">
                                                    <img src="{{ url('resources/assets/img/g1.png')}}" class="testimonial-img" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item">
                                                <div class="heig-fic-room-list">
                                                    <img src="{{ url('resources/assets/img/g1.png')}}" class="testimonial-img" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item">
                                                <div class="heig-fic-room-list">
                                                    <img src="{{ url('resources/assets/img/g2.png')}}" class="testimonial-img" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 bed-room">
                                <h3> Twin/Double Room - 1 Bedroom - Classic </h3>
                                <div class="tag-info">
                                    <h3 class="mt-4">Popular amenities</h3>

                                    <div class="ami-pol-room">
                                        <div class="ami-pol-detail">
                                            <i class='bx bx-swim'></i>
                                            <h5>Pool</h5>
                                        </div>
                                        <div class="ami-pol-detail">
                                            <i class='bx bxs-parking'></i>
                                            <h5>Parking</h5>
                                        </div>
                                        <div class="ami-pol-detail">
                                            <i class='bx bx-restaurant'></i>
                                            <h5>Restaurant</h5>
                                        </div>
                                        <div class="ami-pol-detail">
                                            <i class='bx bx-wifi'></i>
                                            <h5>Free wifi</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="all-detail-rom">
                                    <h3 class="mt-4">Room Amenities</h3>
                                    <div class="rom-aminit">
                                        <div class="check-makr">
                                            <i class='bx bx-check-circle'></i> <span>Balcony </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="all-detail-rom">
                                    <h3 class="mt-4 gust-rom">Popular with Guests</h3>
                                    <div class="rom-aminit row">
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Free Wi-Fi </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Air Conditioning </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Electric Kettle </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Room Service </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Smoking Room </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="all-detail-rom">
                                    <h3 class="mt-4 gust-rom">Room Features</h3>
                                    <div class="rom-aminit row">
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Charging Points </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Closet </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Mini Fridge </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Mirror </span>
                                        </div>

                                    </div>
                                </div>


                                <div class="all-detail-rom">
                                    <h3 class="mt-4 gust-rom">Beds and Blanket</h3>
                                    <div class="rom-aminit row">
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Cushions </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>Pillows </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="all-detail-rom">
                                    <h3 class="mt-4 gust-rom">Media and Entertainment</h3>
                                    <div class="rom-aminit row">
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>
                                                TV </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="all-detail-rom">
                                    <h3 class="mt-4 gust-rom">Bathroom</h3>
                                    <div class="rom-aminit row">
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>
                                                Towels </span>
                                        </div>
                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>
                                                Shower </span>
                                        </div>

                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>
                                                Toiletries </span>
                                        </div>

                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>

                                                Western Toilet Seat </span>
                                        </div>


                                        <div class="check-makr col-md-4">
                                            <i class='bx bx-check-circle'></i> <span>

                                                Dustbins </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="room-option">
                                    <h2> Room options</h2>

                                    <div class="cancellation-policy">
                                        <h5> Cancellation policy</h5>
                                        <a href="#"> More details on all policy options <i class='bx bx-info-circle'></i></a>

                                        <div class="d-flex justify-content-between">
                                            <label class="raio-new mt-3">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                                Non-refundable
                                            </label>
                                            <span>+ Rs0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <label class="raio-new">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>Fully refundable before 1 Jul
                                            </label>
                                            <span>+ Rs964</span>
                                        </div>
                                        <hr>
                                        <h5>Extras</h5>
                                        <div class="d-flex justify-content-between">
                                            <label class="raio-new mt-3">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                                No extras
                                            </label>
                                            <span>+ Rs0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <label class="raio-new">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>Breakfast
                                            </label>
                                            <span>+ Rs0</span>
                                        </div>

                                        <div class="d-flex justify-content-between align-self-center align-items-center totalbefore">

                                            <h4>Total before taxes <br><label>₹15,200</label></h4>
                                            <a href="#" class="resurve-btn-res"> Reserve</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>


        </div>

    </div>

</main><!-- End #main -->
@endsection