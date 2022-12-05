@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style type="text/css">

</style>
@endsection
@section('current_page_js')
<script>
   $(".accordion-thumb").click(function() {
      // Close all open windows
      $(".hidden-menu").stop().slideUp(300);
      // Toggle this window open/close
      $(this).next(".hidden-menu").stop().slideToggle(300);
      //hitter test// 
      $(".hitter").show()
   });
   
   $(".hitter").click(function() {
      // Close all open windows
      $(".hidden-menu").stop().slideUp(300);
   });
</script>
<script>
   $(document).ready(function() {
   $('.minus1').click(function() {
     var $input = $(this).parent().find('input');
     var count = parseInt($input.val()) - 1;
     count = count < 1 ? 1 : count;
     $input.val(count);
     $("").val(count);
     $("").html(count + " ");
     $input.change();
     return false;
   });
   $('.plus1').click(function() {
     var $input = $(this).parent().find('input');
     $input.val(parseInt($input.val()) + 1);
     $("").val(parseInt($("").val()) + 1);
     var count = $("").val();
     $("").html(count.toString() + " ");
     $input.change();
     return false;
   });
   });

   $("#trip_with_us").validate({
      debug: false,
      rules: {
       name: {
           required: true,
       },
       email: {
         required: true,
         email:true,
       },
       phone: {
         required: true,
         number:true,
       },
       reason: {
           required: true
       },
       date:{
         required: true,
         date : true,
       },
       check: {
         required: true,
       },
       transport: {
         required: true,
       },
       departure: {
         required: true,
       },
       flex_date: {
         required: true,
       },
       type: {
         required: true,
       },
       location: {
         required: true,
       },
       message: {
         required: true,
       }
      },
      submitHandler: function (form) {
       var site_url = $("#baseUrl").val();
       // alert(site_url);
       var formData = $(form).serialize();

       $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });

       //alert(formData);die;
       $(form).ajaxSubmit({
         type: 'POST',
         url: site_url + '/submitMaketrip',
         data: formData,
         success: function (response) {
           if (response.status == 'success') {
             $("#trip_with_us")[0].reset();
             success_noti(response.msg);
           } else {
             error_noti(response.msg);
           }

         }
       });
      }
   });
</script>
@endsection
@section('content')
<main id="main" class="tour-details-page">
   <section class="tour-single-section pt-0" style="background-image: url('{{url('/')}}/public/uploads/tour_gallery/{{$tour_details->tour_feature_image}}');">
      <div class="tour-title-section">
         <div class="container ">
            <div class="row ">
               <div class="col-12">
                  <div class="tour-name">
                     <div class="left-part">
                        <div class="tour-value">
                           <a href="#" class="tour-type">{{$tour_details->tour_sub_type}}</a>
                        </div>
                        <div class="top">
                           <h2>{{$tour_details->tour_title}}</h2>
                           <div class="rating-tour">
                              <div class="star-ratings start-ratings-main clearfix d-inline-flex">
                                 <div class="mb-1 d-flex" id="rating-ability-wrapper">
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
                           <div class="share-buttons">
                              <a href="#" class="btn btn-solid"><i class="bx bx-share-alt"></i> share</a>
                           </div>
                        </div>
                        <?php $nights = (int)$tour_details->tour_days - 1; ?>
                        <div class="btm-info d_n">
                           <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> From - {{date('d M Y',strtotime($tour_details->tour_start_date))}} &nbsp; &nbsp; &nbsp; To  - {{date('d M Y', strtotime($tour_details->tour_end_date))}} ({{$tour_details->tour_days}} Days & {{$nights}} Nights)</p>
                           <a href="#" class="tour-type">{{$tour_details->tour_type}}</a>
                        </div>
                        <div class="facility-detail">
                           <a href="#">free wifi</a>
                           <a href="#">free breakfast</a>
                        </div>
                     </div>
                     <div class="right-part">
                        <h2 class="price">{{$tour_details->tour_price}} PKR <span>/ per person</span></h2>
                        <p>For twin sharing {{$tour_details->tour_price_others}} extra charges per person</p>
                        @if($tour_details->tour_max_capacity >= $tour_booked_count)
                        <a href="{{url('/tourBooking')}}?id={{$tour_details->id}}" class="btn btn-rounded btn-sm book-btn">book this now</a>
                        @else
                        <a href="" class="btn btn-rounded btn-sm book-btn" style="pointer-events: none;">Full All Seats</a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @php $country_name = DB::table('country')->where('id', $tour_details->country_id)->first(); @endphp
   <section class="info-tours ">
      <div class="row">    
         <div class="col-sm-12">
            <a href="javascript:history.back()"><i class="right fas fa-angle-left"></i>Back</a>
         </div>
         <div class="col-xl-10 col-lg-10 col-md-12">
            <div class="slide-property-detail">
               <div class="slide-property-first">
                  <div class="description-section tab-section">
                     <div class="row">
                        <!-- Single Items -->
                        <div class="col-xs-6 col-lg-3 col-md-6">
                           <div class="singles_item">
                              <div class="icon">
                                 <i class="icofont-stopwatch"></i>
                              </div>
                              <div class="info">
                                 <h4 class="name">Duration</h4>
                                 <p class="value">{{$tour_details->tour_days}} days</p>
                              </div>
                           </div>
                        </div>
                        <!-- Single Items -->
                        <div class="col-xs-6 col-lg-3 col-md-6">
                           <div class="singles_item">
                              <div class="icon">
                                 <i class="icofont-beach"></i>
                              </div>
                              <div class="info">
                                 <h4 class="name">Tour Type</h4>
                                 <p class="value">{{$tour_details->tour_type}}</p>
                              </div>
                           </div>
                        </div>
                        <?php $timestamp = strtotime($tour_details->tour_start_date); ?>
                        <!-- Single Items -->
                        <div class="col-xs-6 col-lg-3 col-md-6">
                           <div class="singles_item">
                              <div class="icon">
                                 <i class="icofont-travelling"></i>
                              </div>
                              <div class="info">
                                 <h4 class="name">Tour start day</h4>
                                 <p class="value"><?php echo date('l', $timestamp); ?></p>
                              </div>
                           </div>
                        </div>
                        <!-- Single Items -->
                        <div class="col-xs-6 col-lg-3 col-md-6">
                           <div class="singles_item">
                              <div class="icon">
                                 <i class="icofont-island"></i>
                              </div>
                              <div class="info">
                                 <h4 class="name">Location</h4>
                                 <p class="value">{{$tour_details->city}},{{$country_name->name}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="description-details">
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-clipboard'></i> Description</h4>
                     <div class="menu-part mt-0 about-tour" id="description">
                        <div class="about-sec">
                           <p>{{$tour_details->tour_description}}</p>
                        </div>
                     </div>
                  </div>
                  <div id="Itinerary" class="desc-box">
                     <div class="itinerary-cont accordion-box">
                        <h4 class="content-title"><i class='bx bx-sitemap'></i> Tour Itinerary</h4>
                        @foreach($tour_itinerary as $itinerary)
                        <div class="itinerary-cont-box accordion-item is-active" id="show-hidden-menu">
                           <span>Day {{$itinerary->title}}</span>
                           <div class="accordion-thumb">
                              <h4>{{$itinerary->place_from}} – {{$itinerary->place_to}}</h4>
                           </div>
                           <div class="accordion-panel hidden-menu">
                              <h5>Other Benfits (On Arrival) </h5>
                              <ul class="Benfits">
                                 <li><img src="{{url('/')}}/resources/assets/img/breakfast1.png" alt="meal">
                                    Breakfast
                                 </li>
                                 <li><img src="{{url('/')}}/resources/assets/img/transfer1.png" alt="transport">
                                    {{$itinerary->transport}}
                                 </li>
                                 <li><img src="{{url('/')}}/resources/assets/img/stay1.png" alt="star hotel">
                                    {{$itinerary->hotel}}
                                 </li>
                              </ul>
                              <ul class="tags">
                                 <?php $trip_detail = json_decode($itinerary->trip_detail); ?>
                                 @foreach($trip_detail as $detail)
                                 <li>{{$detail}}</li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div id="Itinerary" class="desc-box">
                     <div class="itinerary-cont accordion-box">
                        <h4 class="content-title"><i class='bx bx-sitemap'></i> Tour Pickup Locations 
                        (Additional Charges)</h4>
                        @foreach($tour_pickup_locations as $locations)
                        <div class="itinerary-cont-box accordion-item is-active" id="show-hidden-menu">
                           <span>City {{$locations->city}}</span>
                           <div class="accordion-panel hidden-menu">
                              <ul class="Benfits">
                                 <li>Transport {{$locations->transport}}</li>
                                 <li>Price {{$locations->price}}
                                 </li>
                              </ul>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="extra-section desc-box">
                     <h4 class="content-title"><i class='bx bxs-location-plus1'></i> Location's</h4>
                     <div class="menu-part" id="locations">
                        <div class="info-locat">
                           <p>{{$tour_details->tour_locations}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-street-view'></i></i>Service inculde</h4>
                     <div class="menu-part" id="locations">
                        <div class="info-service">
                           <p>{{$tour_details->tour_services_includes}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-street-view'></i></i>Service without include</h4>
                     <div class="menu-part" id="locations">
                        <div class="info-service">
                           <p>{{$tour_details->tour_services_not_includes}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-accessibility'></i> Activities </h4>
                     <div class="menu-part" id="locations">
                        <div class="info-locat">
                           <p>{{$tour_details->tour_activities}}</p>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-receipt'></i> Private Note</h4>
                     <div class="menu-part mt-0 about-tour" id="terms-conditions">
                        <div class="about-sec-list">
                           <ul>{{$tour_details->private_note}}</ul>
                        </div>
                     </div>
                  </div> -->
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-receipt'></i> Terms & Conditions</h4>
                     <div class="menu-part mt-0 about-tour" id="terms-conditions">
                        <div class="about-sec-list">
                           <ul>{{$tour_details->tour_term_condition}}</ul>
                        </div>
                     </div>
                  </div>
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-images'></i> Gallery</h4>
                     <div class="menu-part">
                        <div class="info-locat">
                           <div class="row">
                              @foreach($tour_gallery as $key=> $gallery)
                              <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
                                 <a href="#lightbox" data-slide-to="0"><img src="{{url('/')}}/public/uploads/tour_gallery/{{$gallery->image}}" class="img-thumbnail"></a>
                              </div>
                              @endforeach
                           </div>
                           <!-- Modal -->
                           <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered " role="document">
                                 <div class="modal-content">
                                    <div class="modal-body">
                                       <div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
                                          <ol class="carousel-indicators">
                                             @foreach($tour_gallery as $key=> $gallery)
                                             <li data-target="#lightbox" data-slide-to="{{$key}}"></li>
                                             @endforeach
                                          </ol>
                                          <div class="carousel-inner">
                                             @foreach($tour_gallery as $key=> $gallery)
                                             <div class="carousel-item @if($key == 0) active @endif"><img src="{{url('/')}}/public/uploads/tour_gallery/{{$gallery->image}}" class="w-100" alt=""></div>
                                             @endforeach
                                          </div>
                                          <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                                          <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div id="map" style="position: inherit; height:450px !important; width: 100% !important; overflow: inherit !important;"></div>
                 <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d945185.2755575953!2d75.09153876182457!3d22.273065524645048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3962fcad1b410ddb%3A0x96ec4da356240f4!2sindore!3m2!1d22.7195687!2d75.8577258!4m5!1s0x3bd885c4bd93b163%3A0xae95ec27b40bf31d!2skhargone!3m2!1d21.833524399999998!2d75.61498929999999!5e0!3m2!1sen!2sin!4v1661252086781!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                  @if($tour_details->tour_max_capacity >= $tour_booked_count)
                  <a href="{{url('/tourBooking')}}?id={{$tour_details->id}}" class="btn btn-rounded btn-sm book-btn">book this now</a>
                  @endif
               </div>
            </div>
         </div>
         @php $vendor = DB::table('users')->join('vendor_profile', 'users.id', '=', 'vendor_profile.user_id')->where('users.id', $tour_details->vendor_id)->first(); @endphp 
      </div>
      </div>
      </div>


   </section>

   <div id="sidebar" style="display: none;">
        <div>
          <b>Start:</b>
          <select id="start">
            <option value="{{$tour_itinerary[0]->place_from}}" selected="selected">{{$tour_itinerary[0]->place_from}}</option>
          </select>
          <br />
          <b>Waypoints:</b> <br />
          <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br />
         
          <select multiple id="waypoints">
            @foreach($new_tour_itinerary as $nitinerary)
            <option value="{{$nitinerary->place_from}}" selected="selected">{{$nitinerary->place_from}}</option>
            @endforeach
            <!-- <option value="Besham" selected="selected">"Besham"</option>
            <option value="Chilas" >"Chilas"</option>
            <option value="Islamabad" selected="selected">"Islamabad"</option>
            <option value="Lahore" selected="selected">"Lahore"</option>
            <option value="Shangrila">"Shangrila"</option>
            <option value="Skardu" selected="selected">"Skardu"</option> -->
          </select>
          <br />
          <b>End:</b>
          <select id="end">
            <option value="{{$tour_itinerary[1]->place_from}}" selected="selected">{{$tour_itinerary[1]->place_from}}</option>
          </select>
          <br />
          <input type="submit" id="submit" />
        </div>
        <div id="directions-panel"></div>
      </div>
      
</main>
<script>
   function show1(){
     document.getElementById('matress-number').style.display ='none';
   }
   function show2(){
     document.getElementById('matress-number').style.display = 'block';
   }
</script>
<script></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNfo0u0kFSDaxpJfkR5VsQCUHiyhTBaAI&callback=initMap&v=weekly"
      defer
    ></script>
    <script type="text/javascript">

/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: { lat: '<?php echo $tour_details->latitude; ?>', lng: '<?php echo $tour_details->longitude; ?>' },
  });

  directionsRenderer.setMap(map);
  //document.getElementById("submit").addEventListener("click", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  //});
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  const waypts = [];
  const checkboxArray = document.getElementById("waypoints");

  for (let i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected) {
      waypts.push({
        location: checkboxArray[i].value,
        stopover: true,
      });
    }
  }

  console.log(waypts);

  directionsService
    .route({
      origin: document.getElementById("start").value,
      destination: document.getElementById("end").value,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);

      const route = response.routes[0];
      const summaryPanel = document.getElementById("directions-panel");

      summaryPanel.innerHTML = "";

      
      // For each route, display summary information.
      for (let i = 0; i < route.legs.length; i++) {
        const routeSegment = i + 1;

        summaryPanel.innerHTML +=
          "<b>Route Segment: " + routeSegment + "</b><br>";
        summaryPanel.innerHTML += route.legs[i].start_address + " to ";
        summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
        summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
      }
    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}

window.initMap = initMap;

</script>
<!-- End #main -->
@endsection