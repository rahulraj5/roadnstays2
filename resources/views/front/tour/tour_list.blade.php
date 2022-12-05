@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<link href="{{url('/')}}/resources/assets/css/slick.min.css" rel="stylesheet">
@endsection
@section('current_page_js')
<script src="{{url('/')}}/resources/assets/js/slick.js"></script>
<script>
   $(".slick1").slick({
      rows: 1,
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 5,
   
   
      responsive: [{
            breakpoint: 980, // tablet breakpoint
            settings: {
               slidesToShow: 4,
               slidesToScroll: 4
            }
         },
         {
            breakpoint: 480, // mobile breakpoint
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2
            }
         }
      ]
   });
</script>
<script>
   $(".slick_best_place").slick({
      rows: 1,
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [{
            breakpoint: 980, // tablet breakpoint
            settings: {
               slidesToShow: 4,
               slidesToScroll: 4
            }
         },
         {
            breakpoint: 480, // mobile breakpoint
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2
            }
         }
      ]
   });
</script>
<script>
   // $(document).ready(function() {
   
   //    $(".owl-carousel").owlCarousel({
   //       autoplay: true,
   //       autoplayTimeout: 3000,
   //       autoplayHoverPause: true,
   //       items: 3,
   //       itemsDesktop: [1199, 3],
   //       itemsDesktopSmall: [979, 3],
   //       loop: true,
   //       responsive: {
   //          0: {
   //             items: 1
   //          },
   //          600: {
   //             items: 1
   //          },
   //          1000: {
   //             items: 3
   //          }
   //       }
   
   //    });
   
   // });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
     $('#filterform').on('change', function() {
   
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
         url: "{{url('tour_list_ajax')}}",
         data: frmValues,
         dataType: 'json',
         success: function(response) {
           //console.log(response);
           $('#filterdata').html(response);
           $('#loading-image').hide();
   
         }
       });
   
     });
   
   });
</script>
<script type="text/javascript">
   $(function() {
    $(document).on("click", "#pagination a,#search_btn", function() {
   
      //get url and make final url for ajax 
      var url = $(this).attr("href");
      var append = url.indexOf("?") == -1 ? "?" : "&";
      var finalURL = url + append + $("#searchform").serialize();
   
      //set to current url
      window.history.pushState({}, null, finalURL);
   
      $.get(finalURL, function(data) {
   
        $("#pagination_data").html(data);
   
      });
   
      return false;
    })
   
   });
</script>
@endsection
@section('content')
<main id="main">
   <section class="info-slides" style="padding-top: 77px; padding-bottom: 0px; background-color: #f6f6f6;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/tour3.jpg" alt="First slide">
               <div class="carousel-caption1  d-md-block">
                  <!--   <h5>Tour</h5> -->
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/tour2.jpg" alt="Second slide">
               <div class="carousel-caption1  d-md-block">
                  <!--    <h5>Tour</h5>
                     -->
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/tour1.jpg" alt="Third slide">
               <div class="carousel-caption1  d-md-block">
                  <!--   <h5>Tour</h5> -->
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
         <div class="hotel-typ top-baner-fit">
            <!--   <h3 id="locat-h">Tours</h3> -->
            <form method="GET" action="{{url('tour-list')}}">
               @csrf
               <div id="hotel-form1" class="row  align-items-center hotel-form1">
                  <div class="col-md-10 pr-0 h-hotel pl-0">
                     <!-- <p>Where To</p>  -->
                     <span id="i-1" class="span3 form-control-lo"><i class="bx bx-map"></i>
                     <input type="location" name="destination" placeholder="Tour city..." class="locatin-hotel" id="autocompleteloc" required="">
                     </span>
                  </div>
                  <!-- <div class="col-md-5 pr-0 guest-no1">
                     <select class="locatin-hotel" name="duration" id="duration">
                        @php $get_tour = DB::table('tour_list')->where('status',1)->where('tour_status', 'available')->orderBy('tour_days', 'ASC')->get()->unique('tour_days'); @endphp
                        <option value=""> Select Duration </option>
                        @foreach($get_tour as $tourdata)
                        <option value="{{ base64_encode($tourdata->tour_days) }}"> {{ (int)$tourdata->tour_days-1 }} Nights / {{ $tourdata->tour_days }} Days</option>
                        @endforeach
                     </select>
                  </div> -->
                  <div class="col-md-2 pr-0" id="i-5">
                     <button><i class="bx bx-search"></i></button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </section>
   <section id="" class="tour-package">
      <div class="container-fluid" data-aos="">
         <div class="tour-filterrow">
            <div class="hotel-list sticky h-100">
               <div class="filter-row">
                  <form method="POST" id="filterform" action="{{url('tour_list_ajax')}}" enctype="multipart/form-data">
                     @csrf
                     <h6>Filter</h6>
                     <div class="category category-2">
                        <p>Star Rating</p>
                        <ul>
                           <li>
                              <label><input type="checkbox" name="star[]" id="" value="1"><i class='bx bxs-star'></i>
                              <label>
                           </li>
                           <li><label><input type="checkbox" name="star[]" id="" value="2"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                           <li><label><input type="checkbox" name="star[]" id="" value="3"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                           <li><label><input type="checkbox" name="star[]" id="" value="4"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                           <li><label><input type="checkbox" name="star[]" id="" value="5"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                        </ul>
                     </div>
                     <div class="category category-0">
                     <p>Duration</p>
                     <ul>
                     <li><label><input type="checkbox" name="duration[]" id="" value="3">3 Days<label></li>
                     <li><label><input type="checkbox" name="duration[]" id="" value="7">Less than 7 Days<label></li>
                     <li><label><input type="checkbox" name="duration[]" id="" value="10">10+ Days<label></li>
                     <li><label><input type="checkbox" name="duration[]" id="" value="15">15 Days<label></li>
                     <li><label><input type="checkbox" name="duration[]" id="" value="15">Less than 15 Days<label></li>
                     <li><label><input type="checkbox" name="duration[]" id="" value="20">20 Days<label></li>
                     </ul>
                     </div>
                     <div class="category category-1">
                     <p>Pickup Location</p>
                     <ul>
                     @foreach($tour_city as $city)
                     <li><label><input type="checkbox" name="location[]" id="" value="{{$city->city}}">{{$city->city}}</label></li>
                     @endforeach
                     <?php //print_r($tour_city); ?>
                     <!-- <li><label><input type="checkbox" name="location[]" id="" value="Lahore">Lahore</label></li>
                        <li><label><input type="checkbox" name="location[]" id="" value="Islamabad">Islamabad</label></li>
                        <li><label><input type="checkbox" name="location[]" id="" value="Phaktoon">Phaktoon</label></li>
                        <li><label><input type="checkbox" name="location[]" id="" value="Kashmir">Kashmir</label></li>
                        <li><label><input type="checkbox" name="location[]" id="" value="Karachi">Karachi</label></li> -->
                     </ul>
                     </div>
                     <div class="category category-3">
                        <p>Trip Type</p>
                        <ul>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="adventure">Adventures</label></li>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="sightseeing">Sightseeing</label></li>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="adventure_sightseeing">Adventures + Sightseeing</label></li>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="honeymoon">Honeymoon</label></li>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="school_trip">School Trip</label></li>
                           <li><label><input type="checkbox" name="trip_type[]" id="" value="corporate_trip">Corporate Trip</label></li>
                        </ul>
                     </div>
                     <div class="category category-3">
                        <p>Trip Status</p>
                        <ul>
                           <li><label><input type="checkbox" name="trip_status[]" id="" value="booked">Booked</label></li>
                           <li><label><input type="checkbox" name="trip_status[]" id="" value="available">Available</label></li>
                        </ul>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row container-fluid">
               <div class="col-lg-12 grid-margin stretch-card">
                  <div class="listing-tour">
                     <div class="section-title t01 d-flex justify-content-between">
                        <div>
                        <h4>Tours Search List</h4>
                        <span class="separator01"></span>
                     </div>

                      <a class="hed-help" href="{{url('/tour_enquiry')}}">Need Help! Request Custom Tour</a>

                     </div>

                   
                     <span><img id="loading-image" src="{{asset('resources/assets/img/loading.gif')}}" style="display: none;"></span>
                     <div class="tour-body row" id="filterdata">
                        @foreach($tour_data as $trip)
                        @php $country_name = DB::table('country')->where('id', $trip->country_id)->first(); @endphp
                        <div class="item col-md-4">
                           <a class="" href="{{url('tour_details')}}/{{$trip->id}}">
                              <div class="card mb-0 item-card2-card">
                                 <div class="item-card2-img">
                                    <img src="{{url('/')}}/public/uploads/tour_gallery/{{$trip->tour_feature_image}}" alt="img" class="cover-image" />
                                 </div>
                                 <div class="card-body mid-block">
                                    <div class="item-card2">
                                       <div class="item-card2-desc">
                                          <div class="item-card2-text">
                           <a href="{{url('tour_details')}}/{{$trip->id}}" class="text-dark">
                           <h4 class="font-weight-bold mb-1">{{$trip->tour_title}}</h4>
                           </a>
                           <div class="item-card2-rating mb-0">
                           <div class="star-ratings start-ratings-main clearfix">
                           <div class="d-flex" id="rating-ability-wrapper">
                           <label class="control-label" for="rating">
                           <span class="field-label-info"></span>
                           <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required" />
                           </label>
                           <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                           <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                           <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <?php $nights = (int)$trip->tour_days - 1; ?>
                           <div class="d-flex mt-4 dtl-t01">
                           <div class="btm-info">
                           <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> {{$trip->tour_days}} Days,{{$nights}} Nights</p>
                           <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> {{ ucfirst(strtolower(trans($trip->city))) }} {{ ucfirst(strtolower(trans($country_name->name))) }}</p>
                           <!--     <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i>Start date</p> -->
                           </div>
                           <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                           <h4 class="mb-2">Price</h4>
                           <h2 class="mb-0 font-weight-bold">PKR {{$trip->tour_price}}</h2>
                           <!-- <h2 class="mb-0 font-weight-bold">PKR 21/12/2022</h2> -->
                           </div>
                           </div>
                           <div class="d-flex justify-content-between s-end mt-1">
                           <h3 class="dura-tio"><i class='bx bx-calendar-alt'></i> {{$trip->tour_start_date}}</h3>
                           <h3>-</h3>
                           <h3> {{$trip->tour_end_date}}</h3>
                           </div>
                           </div>
                           </div>
                           <a class="card-footer text-center" href="{{url('tour_details')}}/{{$trip->id}}"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                           </div>
                           </a>
                        </div>
                        @endforeach 
                     </div>
                  </div>
               </div>
               <div class="col-md-12 pagin-botm">
                  {!! $tour_data->render() !!}
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