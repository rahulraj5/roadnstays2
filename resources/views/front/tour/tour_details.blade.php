@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
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
                        <h4 class="content-title"><i class='bx bx-sitemap'></i> Tour Pickup Locations</h4>
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
                  <div class="desc-box">
                     <h4 class="content-title"><i class='bx bx-receipt'></i> Private Note</h4>
                     <div class="menu-part mt-0 about-tour" id="terms-conditions">
                        <div class="about-sec-list">
                           <ul>{{$tour_details->private_note}}</ul>
                        </div>
                     </div>
                  </div>
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
                  <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d945185.2755575953!2d75.09153876182457!3d22.273065524645048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3962fcad1b410ddb%3A0x96ec4da356240f4!2sindore!3m2!1d22.7195687!2d75.8577258!4m5!1s0x3bd885c4bd93b163%3A0xae95ec27b40bf31d!2skhargone!3m2!1d21.833524399999998!2d75.61498929999999!5e0!3m2!1sen!2sin!4v1661252086781!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  @if($tour_details->tour_max_capacity >= $tour_booked_count)
                  <a href="{{url('/tourBooking')}}?id={{$tour_details->id}}" class="btn btn-rounded btn-sm book-btn">book this now</a>
                  @endif
               </div>
            </div>
         </div>
         @php $vendor = DB::table('users')->join('vendor_profile', 'users.id', '=', 'vendor_profile.user_id')->where('users.id', $tour_details->vendor_id)->first(); @endphp
         <!-- <div class="col-xl-4 col-lg-4 col-md-12 enquiry form" id="enquiry-form">
            <form method="POST" id="trip_with_us">
               <h1>Book your Trip with Us</h1>
               <p>Please take a moment to get in touch, we will get back to you shortly.</p>
               <div class="column">
                  <label for="1name">Your Name</label>
                  <input type="text" name="name" id="1name">
                  <label for="1email">Email Address</label>
                  <input type="email" name="email" id="1email">
                  <label for="1phone">Phone Number</label>
                  <input type="tel" name="phone" id="1phone">
                  <label for="Traveller">Travllers</label>
                  <ul class="count-traveller">
                     <li class="adult-count">
                        <span>Adult</span>
                        <div class="number">
                           <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                           <input type="text" name="adult" value="0" />
                           <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                        </div>
                     </li>
                     <li class="kids-count">
                        <span>Child</span>
                        <div class="number">
                           <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                           <input type="text" name="child" value="0" />
                           <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                        </div>
                     </li>
                     <li class="room-count">
                        <span>Rooms</span>
                        <div class="number">
                           <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                           <input type="text" name="rooms" value="0" />
                           <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                        </div>
                     </li>
                  </ul>
                  <label>Mattress Required:</label>
                  <div class="check-bo">
                     <div class="check-y"> <input type="radio" id="yes" onclick="show2();" name="check" value="Yes">
                        <label for="yes">Yes</label><br>
                     </div>
                     <div class="check-n"><input type="radio" id="no" name="check" value="No" onclick="show1();">
                        <label for="check">No</label><br>
                     </div>
                  </div>
                  <div class="matress-no" id="matress-number">
                     <span>Select Quantity</span>
                     <div class="number">
                        <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                        <input type="text" name="matress_number" value="0" />
                        <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                     </div>
                  </div>
                  <label for="transport">Select Transport</label>
                  <select name="transport" id="transport">
                     <option value="">Choose one</option>
                     <option value="Bus">Bus</option>
                     <option value="Train">Train</option>
                     <option value="Suv Van">Suv Van</option>
                     <option value="Car">Car</option>
                     <option value="Mini">Mini Van</option>
                  </select>
               </div>
               <div class="date-loc">
                  <div class="Date-f">
                     <label for="date">Select Date</label>
                     <input type="date" name="date" id="">
                  </div>
                  <div class="location-f">
                     <label for="departure">Departure City</label>
                     <select name="departure" id="departure">
                        <option value="">Choose One</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Phaktoon">Phaktoon</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="paitlabad">paitlabad</option>
                     </select>
                  </div>
               </div>
               <div class="date-flex">
                  <div class="tour-days">
                     <label>Tour Duration</label>
                     <div class="number">
                        <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                        <input type="text" name="duration" id="duration" value="0" />
                        <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                     </div>
                  </div>
                  <div class="flex-f">
                     <label for="flex_date">Flexible date</label>
                     <select name="flex_date" id="flex_date">
                        <option value="">Choose One</option>
                        <option value="5 days before">5 days before</option>
                        <option value="2 days ago">2 days ago</option>
                        <option value="2 days ago">after a week</option>
                        <option value="not yet Decided">not yet Decided</option>
                        <option value="Other">Other</option>
                     </select>
                  </div>
               </div>
               <div class="trip-type">
                  <label for="type">Trip Type</label>
                  <select name="type" id="type">
                     <option value="">Choose One</option>
                     <option value="Adventure">Adventure</option>
                     <option value="Sightseeing">Sightseeing</option>
                     <option value="Adventure + Sightseeing">Adventure + Sightseeing</option>
                     <option value="Honeymoon">Honeymoon</option>
                     <option value="School Trip">School Trip</option>
                     <option value="Corporate Trip">Corporate Trip</option>
                  </select>
               </div>
               <div class="trip-type trip-location">
                  <label for="location">Location</label>
                  <select name="location" id="location">
                     <option value="">Choose One</option>
                     <option value="Shimla">Shimla</option>
                     <option value="Manali">Manali</option>
                     <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                     <option value="Laddhakh">Laddhakh</option>
                     <option value="Kerala">Kerala</option>
                     <option value="Madhya Pradesh">Madhya Pradesh</option>
                     <option value="Mandu">Mandu</option>
                  </select>
               </div>
               <div class="column">
                  <label for="message">Please share further details / Preferences?</label>
                  <textarea name="message" id="message"></textarea>
                  <input type="submit" value="Send Message">
               </div>
            </form>
         </div> -->
      </div>
      </div>
      </div>
   </section>
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
<!-- End #main -->
@endsection