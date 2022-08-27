@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>

</style>

@endsection
@section('current_page_js')
<script>
   var today = new Date().toISOString().split('T')[0];
   $('.minimum_date').attr('min', today);
</script>
<script type="text/javascript">
   var placeSearch, autocomplete;

   function initAutocomplete() {
      autocomplete = new google.maps.places.Autocomplete(
         (document.getElementById('autocomplete1')), {
            types: ['(cities)']
         });
      autocomplete.addListener('place_changed', function() {
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
<script>
   var today = new Date();

   $(function() {

      $('.space_date_range').daterangepicker({
         autoApply: true,
         autoUpdateInput: true,
         minDate: today,
         locale: {
            format: 'DD-MM-YYYY'
         },
         "opens": "center",
         "drops": "auto"
      }, function(start, end, label) {
         $('#space_checkin_date').val(start.format('DD-MM-YYYY'));
         $('#space_checkout_date').val(end.format('DD-MM-YYYY'));

         console.log('what is wrong with you today');

         var date = $("#space_checkin_date").val();
         console.log(date);
      });
   });
</script>
<script>
   var today = new Date();

   $(function() {
      $('.hotel_date_range').daterangepicker({
         autoApply: true,
         autoUpdateInput: true,
         minDate: today,
         locale: {
            format: 'DD-MM-YYYY'
         },
         "opens": "center",
         "drops": "auto"
      }, function(start, end, label) {
         $('#date1').val(start.format('DD-MM-YYYY'));
         $('#date2').val(end.format('DD-MM-YYYY'));
      });
   });
</script>
<script>
   var today = new Date();

   $(function() {
      $('.tour_date_range').daterangepicker({
         autoApply: true,
         autoUpdateInput: true,
         minDate: today,
         locale: {
            format: 'DD-MM-YYYY'
         },
         "opens": "center",
         "drops": "auto"
      }, function(start, end, label) {
         $('#tour_check_in').val(start.format('DD-MM-YYYY'));
         $('#tour_check_out').val(end.format('DD-MM-YYYY'));
      });
   });
</script>

<script>
   var placeSearch, autocompleteloc;
   var componentForm = {
      // street_number: 'long_name',
      // route: 'long_name',
      // locality: 'long_name',
      // postal_code: 'short_name'
   };

   function initAutocompleteloc() {
      autocompleteloc = new google.maps.places.Autocomplete(
         (document.getElementById('autocompleteloc')), {
            types: ['geocode']
         });
      autocompleteloc.addListener('place_changed', function() {
         var place = autocompleteloc.getPlace();
         console.log(place);
         document.getElementById('hotel_latitude').value = place.geometry.location.lat();
         document.getElementById('hotel_longitude').value = place.geometry.location.lng();
         fillInAddressloc(autocompleteloc, "");
      });
   }

   function fillInAddressloc(autocompleteloc, unique) {

      var place = autocompleteloc.getPlace();
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
   google.maps.event.addDomListener(window, "load", initAutocompleteloc);

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
            autocompleteloc.setBounds(circle.getBounds());
         });
      }
   }
</script>


<script>
   var placeSearch, autocompletespace;
   var componentForm = {
      // street_number: 'long_name',
      // route: 'long_name',
      // locality: 'long_name',
      // postal_code: 'short_name'
   };

   function initAutocompletespace() {
      autocompletespace = new google.maps.places.Autocomplete(
         (document.getElementById('autocomplete_space')), {
            types: ['(cities)']
         });
      autocompletespace.addListener('place_changed', function() {
         var place = autocompletespace.getPlace();
         console.log(place);
         document.getElementById('space_latitude').value = place.geometry.location.lat();
         document.getElementById('space_longitude').value = place.geometry.location.lng();
         fillInAddress(autocompletespace, "");
      });
   }

   function fillInAddressSpace(autocompletespace, unique) {

      var place = autocompletespace.getPlace();
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

   google.maps.event.addDomListener(window, "load", initAutocompletespace);

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
            autocompletespace.setBounds(circle.getBounds());
         });
      }
   }
</script>
<script type="text/javascript">
   $(document).ready(function() {

      $("#dt1").datepicker({
         dateFormat: "dd-M-yy",
         minDate: 0,
         defaultDate: new Date(),
         onSelect: function() {
            var dt2 = $('#dt2');
            var startDate = $(this).datepicker('getDate');
            var minDate = $(this).datepicker('getDate');
            var dt2Date = dt2.datepicker('getDate');
            //difference in days. 86400 seconds in day, 1000 ms in second
            var dateDiff = (dt2Date - minDate) / (86400 * 1000);

            startDate.setDate(startDate.getDate() + 30);
            if (dt2Date == null || dateDiff < 0) {
               dt2.datepicker('setDate', minDate);
            } else if (dateDiff > 30) {
               dt2.datepicker('setDate', startDate);
            }
            //sets dt2 maxDate to the last day of 30 days window
            dt2.datepicker('option', 'maxDate', startDate);
            dt2.datepicker('option', 'minDate', minDate);
         }
      });
      $('#dt2').datepicker({
         dateFormat: "dd-M-yy",
         minDate: 1,
         defaultDate: new Date()
      });
   });
</script>

<script>
   $(document).ready(function() {
      $('.minus').click(function() {
         var $input = $(this).parent().find('input');
         var count = parseInt($input.val()) - 1;
         count = count < 1 ? 1 : count;
         $input.val(count);
         $("#guest_number").val(count);
         $("#btnGuestNumber").html(count+" Person");
         $input.change();
         return false;
      });
      $('.plus').click(function() {
         var $input = $(this).parent().find('input');
         $input.val(parseInt($input.val()) + 1);
         $("#guest_number").val(parseInt($("#guest_number").val()) + 1);
         var count = $("#guest_number").val();
         $("#btnGuestNumber").html(count.toString()+" Person");
         $input.change();
         return false;
      });
   });
</script>

@endsection
@section('content')
<!-- slider -->
<section id="hero">
   <div id="" class=" carousel-fade">
      <div class="carousel-inner">
         <!-- Slide 1 -->
         <div class=" carousel-item active" style="">
            <div class="carousel-container">
               <div class="container search-bar">
                  <div class="mt-3 mb-2">
                     <h2 class="animate__animated animate__fadeInDown">
                        Make Your Trip Fun & Noted
                     </h2>
                  </div>
                  <p class="animate__animated animate__fadeInUp mb-3 text-con">
                     Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel..<a href="#" class="more-tag"> More </a>
                     <box-icon name='search'></box-icon>
                  </p>
                  <div class="card booking-slot">
                     <div class="card-header">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">
                                 <div class="select-tab">
                                    <img src="{{ asset('resources/assets/img/hotel.png')}}">
                                    Hotel
                                 </div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#home" role="tab">
                                 <div class="select-tab">
                                    <img src="{{ asset('resources/assets/img/event.png')}}">
                                    <span> Event</span>
                                 </div>
                              </a>
                           </li>

                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                 <div class="select-tab">
                                    <img src="{{ asset('resources/assets/img/tour.png')}}">
                                    Tour
                                 </div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                                 <div class="select-tab">
                                    <img src="{{ asset('resources/assets/img/space.png')}}">
                                    Space
                                 </div>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <!-- Tab panes -->

                     <div class="tab-content text-center">
                        <div class="tab-pane active" id="profile" role="tabpanel">
                           <div class="booking-type hotel-book1">
                              <form method="GET" action="{{url('hotelList')}}">
                                 @csrf
                                 <div class="row">
                                    <div class="col-md-4 filter_01 pr-0 h-hotel ">
                                       <p>CITY, LOCATION...</p>
                                       <span class="hotel-searchbar"><i class="bx bx-map"></i>
                                          <input type="location" name="location" placeholder="Location, City, Place" class="locatin-hotel" id="autocompleteloc" required="">
                                          <input type="hidden" name="hotel_latitude" id="hotel_latitude" value="22.7196">
                                          <input type="hidden" name="hotel_longitude" id="hotel_longitude" value="75.8577">
                                       </span>
                                    </div>
                                    <div class="col-md-2 filter_01 pr-0 reserved reserved1 hotel_date_range">
                                       <p>Check_in</p>
                                       <input type="text" name="check_in" id="date1" placeholder="Check-in" required="" value="<?php echo date("d-M-y"); ?>">
                                       <span class="to-date"><i class="bx bx-transfer"></i></span>
                                    </div>

                                    <div class="col-md-2 filter_01 pr-0 reserved reserved2 hotel_date_range">
                                       <p>Check_out</p>
                                       <input type="text" name="check_out" id="date2" placeholder="Check-Out" required="" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>">
                                    </div>
                                    <div class="col-md-4 filter_01 pr-0 guest-no">
                                       <p>Add Guest</p>
                                       <div class="dropdown">
                                          <button class="btn dropdown-toggle" id="btnGuestNumber" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             <?php if(!empty($person)){ echo $person ;}else{ echo "1";} ?> Person
                                          </button>
                                          <input type="hidden" id="guest_number" name="person" value="1">
                                          <ul class="dropdown-menu">
                                             <li><a class="dropdown-item" href="#"><span>Adult(12+ Years)</span>
                                                   <div class="number">
                                                      <button class="minus" data-quantity="minus" data-field="quantity">-</button>
                                                      <input type="text" value="1" />
                                                      <button class="plus" data-quantity="plus" data-field="quantity">+</button>
                                                   </div>
                                                </a>
                                             </li>
                                             <!-- <li><a class="dropdown-item" href="#"><span>Child(0-12 Years)</span>
                                                   <div class="number">
                                                      <span class="minus">-</span>
                                                      <input type="text" value="1" />
                                                      <span class="plus">+</span>
                                                   </div>
                                                </a>
                                             </li> -->
                                          </ul>
                                       </div>

                                       <!-- <div class="dropdown show">
                                          <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             People, Guest No.
                                          </a>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                             <a class="dropdown-item" href="#">
                                                Adult
                                                <div class="number">
                                             <span class="minus">-</span>
                                             <input type="text" value="1"/>
                                             <span class="plus">+</span>
                                          </div></a>
                                          <a class="dropdown-item" href="#">
                                             Child <div class="number">
                                             <span class="minus">-</span>
                                             <input type="text" value="1"/>
                                             <span class="plus">+</span>
                                          </div></a>
                                             
                                          </div>
                                       </div> -->

                                    </div>
                                    <div class="col-md-2 filter_01 pr-0">
                                       <input type="submit" value="Find" class="hotel-btn pull-right">
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="tab-pane" id="home" role="tabpanel">
                           <div class="booking-type event-book1">
                              <!-- <h6> make a Reservation</h6> -->

                              <div class="d-flex justify-content-center align-self-center">
                                 <span class="span3 form-control-lo-event"><i class='bx bx-map'></i>
                                    <input type="location" name="event_location" placeholder="Destination" class="locatin-fil" id="autocomplete1"></span>
                                 <input type="submit" value="Find" class="btn btn-primary-event pull-right hotel-btn">
                              </div>
                              <div class="event-avlabel">
                                 <div class="event-box">
                                    <div class="ev-img">
                                       <img src="{{ asset('resources/assets/img/confrance.jpg')}}">
                                    </div>
                                    <h3>The conference planners expo'22 </h3>

                                 </div>
                                 <div class="event-box">
                                    <div class="ev-img">
                                       <img src="{{ asset('resources/assets/img/art.jpg')}}">
                                    </div>
                                    <h3>Modern Art Fair </h3>

                                 </div>
                                 <div class="event-box">
                                    <div class="ev-img">
                                       <img src="{{ asset('resources/assets/img/bmw.png')}}">
                                    </div>
                                    <h3>BMW 3 and 6 Series Gran </h3>

                                 </div>
                                 <div class="event-box">
                                    <div class="ev-img">
                                       <img src="{{ asset('resources/assets/img/confrance.jpg')}}">
                                    </div>
                                    <h3>The conference planners expo'22 </h3>

                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane" id="messages" role="tabpanel">
                           <div class="booking-type tour-book1">

                              <form>

                                 <div class="col-md-6 filter_01 pr-0 h-hotel ">
                                    <p>CITY, LOCATION...</p>
                                    <span class="hotel-searchbar"><i class="bx bx-map"></i>
                                       <input type="location" name="location" placeholder="Location, City, Place" class="locatin-hotel" id="autocompleteloc" required="">
                                       <input type="hidden" name="hotel_latitude" id="hotel_latitude" value="22.7196">
                                       <input type="hidden" name="hotel_longitude" id="hotel_longitude" value="75.8577">
                                    </span>
                                 </div>

                                 <div class="col-md-3 filter_01 pr-0 tourdater tourdater1 reserved reserved1 tour_date_range">
                                    <p>Check_in</p>
                                    <input id="tour_check_in" placeholder="Date" class="span3 min_date">
                                    <span class="to-date"><i class="bx bx-transfer"></i></span>
                                 </div>

                                 <div class="col-md-3 tourdater tourdater2 reserved tour_date_range">
                                    <p>Check_out</p>
                                    <input id="tour_check_out" placeholder="Date" class="span3 min_date">
                                 </div>

                                 <!-- <span class="tourdater">
                                    <input id="tour_check_in" placeholder="Date" class="span3 form-control min_date">
                                    <span class="to-date"><i class='bx bx-transfer'></i></span>
                                    <input id="tour_check_out" placeholder="Date" class="span3 form-control min_date">
                                 </span> -->


                                 <div class="col-md-2 filter_01 pr-0">
                                    <input type="submit" value="Find" class="hotel-btn pull-right">
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                           <div class="booking-type space-book1">

                              <!-- <form> -->
                              <form method="GET" action="{{url('spaceList')}}">
                                 @csrf
                                 <!-- <input type="text" name="location" placeholder="Space name" class="span3 form-control"> -->



                                 <div class="col-md-6 filter_01 pr-0 h-hotel ">
                                    <p>CITY, LOCATION...</p>
                                    <span class="hotel-searchbar"><i class="bx bx-map"></i>
                                       <input type="location" name="space_location" placeholder="Location, City, Place" class="span3 space-control" id="autocomplete_space" required="">
                                       <input type="hidden" name="space_latitude" id="space_latitude" value="22.7196">
                                       <input type="hidden" name="space_longitude" id="space_longitude" value="75.8577">
                                    </span>
                                 </div>

                                 <!-- <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date">
                                 <span class="to-date"><i class='bx bx-transfer'></i></span> -->
                                 <!-- <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date"> -->

                                 <!-- <input type="text" name="check_in" class="span3 form-control min_dat float-right reservation checkin" id="reservation"> to  -->
                                 <!-- <input type="text" name="check_in" class="span3 form-control min_dat float-right reservation checkout" id="reservation"> -->


                                 <!-- <span class="" id="reservation">
                                    <input id="date-range200" class="span3 min_dat" value="" placeholder="Choose_a_date">
                                 </span> -->

                                 <div class="col-md-3 filter_01 pr-0 tourdater tourdater1 reserved reserved1">
                                    <p>Check_in</p>
                                    <span class="reservation1 reservation space_date_range">
                                       <input id="space_checkin_date" class="span3 min_dat minimum_date" value="<?php echo date("d-M-y"); ?>" name="space_checkin_date" placeholder="Choose a date">
                                    </span>
                                    <span class="to-date"><i class="bx bx-transfer"></i></span>
                                 </div>

                                 <div class="col-md-3 tourdater tourdater2 reserved">
                                    <p>Check_out</p>
                                    <span class="reservation2 reservation space_date_range">
                                       <input id="space_checkout_date" class="span3 min_dat minimum_date" min="" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>" name="space_checkout_date" placeholder="Choose a date">
                                    </span>
                                 </div>


                                 <!-- <input type="text" name="daterange" class="span3 form-control min_date" value="<?php echo date("d-M-y"); ?>" placeholder="Select Date"> -->
                                 <!-- <input type="text" name="daterange" class="span3 form-control min_date" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>" placeholder="Select Date"> -->

                                 <input type="submit" value="Find" class="btn btn-primary pull-right space-button hotel-btn">
                              </form>
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
</section>
<main id="main">
   <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
         <div class="section-title trending-city">
            <p>Trending cities & Areas</p>
            <h3> Book flights to a destination popular with travelers from Pakistan</h3>
         </div>
         <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/1.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/2.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/3.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <h3> Piazza Castello </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/1.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/2.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> New Delhi, India </a>
                     <h3> Jama Masjid, Delhi </h3>
                     <p> Islamabad, Islamabad Capital Territory, Pakistan</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <img src="{{ asset('resources/assets/img/1.png')}}" class="testimonial-img" alt="">
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="truely-dedicated">
      <div class="container" data-aos="fade-up">
         <div class="row">
            <div class="col-md-6 exprience-heading">
               <h2>We're truely dedicated to
                  make your travel experience
                  best.
               </h2>
               <ul>
                  <li><a href="#"> Most Attractive Hotels</a></li>
                  <li><a href="#"> Guest Houses</a></li>
                  <li><a href="#"> Single space</a></li>
                  <li><a href="#"> Event spaces</a></li>
               </ul>
               <a href="#" class="more-arow"><span> More </span><i class='bx bx-right-arrow-alt'></i> </a>
            </div>
            <div class="col-md-6">
               <div class="image-expri">
                  <div class="grid-pric1">
                     <img src="{{ asset('resources/assets/img/hero2-image-group3.png')}}" class="testimonial-img" alt="">
                  </div>
                  <!-- <div class="grid-pric2">
                     <img src="{{ asset('resources/assets/img/3.png')}}" class="testimonial-img" alt="">
                     </div>
                     <div class="grid-pric3">
                     <img src="{{ asset('resources/assets/img/3.png')}}" class="testimonial-img" alt="">
                     </div>
                     <div class="grid-pric4">
                     <img src="{{ asset('resources/assets/img/3.png')}}" class="testimonial-img" alt="">
                     </div> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="featured" class="testimonials">
      <div class="container" data-aos="fade-up">
         <div class="section-title trending-city">
            <p>Featured Listings</p>
            <h3> These are the most recent properties added, with featured listed firstworld-class-feature</h3>
         </div>
         <div class="owl-carousel featured">
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a1.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Holiday Inn Swat, Family Room-11
                        Hotel
                     </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> Hotal/Private room w. bath</div>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a2.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Kumrat Glamping Resort – Basic, 5 </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> Hotal/Private room w. bath </div>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a3.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Calaca, Philippines </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Dennis Canonizado </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> Hotal/Private roomPrivate patio or ba.. </div>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a1.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Holiday Inn Swat, Family Room-11
                        Hotel
                     </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> Hotal/Private room w. bath</div>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a2.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Piazza Castello </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> F-7/2, Islamabad, Islamabad </div>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="imgae-rid">
                     <img src="{{ asset('resources/assets/img/a1.png')}}" class="testimonial-img" alt="">
                     <div class="wht-text-r">
                        <h4> PKR 4562 <small>/Night</small></h4>
                     </div>
                  </div>
                  <div class="world-class-feature">
                     <h3> Piazza Castello </h3>
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <div class="city-nam"><i class='bx bx-home-alt'></i> F-7/2, Islamabad, Islamabad </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="religious" class="testimonials">
      <div class="container" data-aos="fade-up">
         <div class="section-title trending-city">
            <p>Famous Religious Tourism Places</p>
            <h3> The existence of a large number of temples, mosques, churches, Gurudwaras and monasteries in world beckons the traveler to visit that is tolerant, spiritual and most of all diverse yet united.</h3>
         </div>
         <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-wrap">
               <div class="testimonial-item ">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g1.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item ">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g2.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item ">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g3.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> Hvar, Croatia </a>
                     <h3> Piazza Castello </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g1.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g2.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> New Delhi, India </a>
                     <h3> Jama Masjid, Delhi </h3>
                     <p> Islamabad, Islamabad Capital Territory, Pakistan</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
            <div class="testimonial-wrap">
               <div class="testimonial-item">
                  <div class="heig-fic">
                     <img src="{{ asset('resources/assets/img/g1.png')}}" class="testimonial-img" alt="">
                  </div>
                  <div class="world-class">
                     <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                     <h3> Islamabad </h3>
                     <p> Flights from Devi Ahilyabai Holkar International</p>
                     <a href="#" class="date-trip"> May 21 - May 28 · Round trip</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="special-offer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title special-offer-heading">
                  <p>Special Offers & Discount</p>
                  <h3> Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</h3>
               </div>
            </div>
         </div>
      </div>
      <div class="d-flex justify-content-between bor-botm">
         <div class="w-50">
            <div class="container">
               <div class="row">
                  <div class="col-md-11 m-auto p-0">
                     <div id="offernew" class="offer-tex">
                        <div class="container p-0" data-aos="fade-up">
                           <div class="owl-carousel testimonials-carousel">
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/offer3.png')}}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/hotlee.jpg') }}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/offer3.png')}}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/offer3.png')}}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/offer3.png')}}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="testimonial-wrap">
                                 <div class="testimonial-item ">
                                    <div class="offer-grid">
                                       <div class="offer-img">
                                          <img src="{{ asset('resources/assets/img/offer3.png')}}">
                                          <div class="offer-circle">
                                             <p>Discount 30%</p>
                                          </div>
                                       </div>
                                       <div class="wht-text">
                                          <h4> 30% OFF</h4>
                                          <h5> <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></h5>
                                       </div>
                                       <div class="world-class-p">
                                          <a href="#" class="city-nam"><i class='bx bx-map'></i> F-7/2, Islamabad, Islamabad </a>
                                          <h3> Islamabad </h3>
                                          <p> Flights from Devi Ahilyabai Holkar International</p>
                                          <div class="d-flex justify-content-between watch-time">
                                             <a href="#" class="date-trip"> <i class='bx bx-stopwatch'></i> 12 - 20 May </a>
                                             <a href="#"> <i class='bx bx-user'></i> 5 Peopel </a>
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
            </div>
         </div>
         <div class="w-50 newslatter-bg2">
            <div class="family-group p-5">
               <h2>Get 10% Off On <br> <span>Family & Group</span> Tour </h2>
               <p> Sign up to receive the best offers on promotion and coupons.</p>
               <a href="#" class="offer-btn"> Read more</a>
            </div>
         </div>
      </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-4 price-text-d">
               <div class="icon-bar">
                  <img src="{{ asset('resources/assets/img/offera.png')}}">
               </div>
               <div class="text-sut">
                  <h3> BEST PRICE GUARANTEED</h3>
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
               </div>
            </div>
            <div class="col-md-4 price-text-d">
               <div class="icon-bar">
                  <img src="{{ asset('resources/assets/img/location.png')}}">
               </div>
               <div class="text-sut">
                  <h3> AMAZING DESTINATION</h3>
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
               </div>
            </div>
            <div class="col-md-4 price-text-d">
               <div class="icon-bar">
                  <img src="{{ asset('resources/assets/img/headfone.png')}}">
               </div>
               <div class="text-sut">
                  <h3> PERSONAL SERVICES</h3>
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<!-- End #main -->
@endsection