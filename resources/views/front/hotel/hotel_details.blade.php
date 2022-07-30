  @extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')

@endsection
@section('content')
<style type="text/css">
   .owl-carousel .owl-stage-outer {
   position: relative;
   overflow: inherit !important;
   -webkit-transform: translate3d(0px, 0px, 0px);
   }
   .testimonials .testimonial-wrap {
   padding-left: 1px !important;
   }
   .sider-page .row label,
   .row p {
   padding: 1px;
   }
</style>

<!-- slider -->
<main id="main">
   <section class="user-section detail-section" style="padding-top: 100px; background-color: #f6f6f6;">
      <div class="container-fluid hero-banner">
         <div class="row hero-sec">
            <div class="col-md-12 full-img">
               <img src="{{url('public/uploads/hotel_gallery')}}/{{$hotel_data->hotel_gallery}}" alt="" class="img-responsive">
               <div class="box">
                  <h3>{{$hotel_data->hotel_name}}</h3>
                  <h6>{{$hotel_data->hotel_city}}</h6>
                  <div class="star">@if($hotel_data->hotel_rating === 5)
                           <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>
                           @elseif ($hotel_data->hotel_rating === 4)
                          <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>
                           @elseif ($hotel_data->hotel_rating === 3)
                           <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>
                           @elseif ($hotel_data->hotel_rating === 2)
                           <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>
                           @else
                           <i class='bx bxs-star' ></i>
                           @endif </div>
                  <!-- <div class="hero-btn">
                     <a class="selct-room" href="#">Select Room</a>
                     <a class="book-now" href="#">Book Now</a>
                  </div> -->
               </div>
            </div>
            @foreach($hotel_gallery as $gallery)
            <div class="col-lg-2 col-md-2 col-xs-2 thumb">
               <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                  data-image="{{url('public/uploads/hotel_gallery')}}/{{$gallery->image}}"
                  data-target="#image-gallery">
               <img class="img-thumbnail"
                  src="{{url('public/uploads/hotel_gallery')}}/{{$gallery->image}}"
                  alt="Another alt text">
               </a>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   <section class="tab-sec" id="nav-sec">
      <div class="row tab-row">
         <div class="col-md-12 nav-col">
            <nav id="navbar-example2" class="nav-bar " id="navbar">
               <ul class="nav-tab nav nav-pills">
                  <li>
                     <a href="#1" class="navLink active">Overview</a>
                  </li>
                  <li>
                     <a href="#2" class="navLink">Amenities</a>
                  </li>
                  <li>
                     <a href="#3" class="navLink">Rooms </a>
                  </li>
                  <li>
                     <a href="#4" class="navLink">Location</a>
                  </li>
                  <li>
                     <a href="#5" class="navLink">Reviews</a>
                  </li>
                  <li>
                     <a href="#6" class="navLink">Policies </a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </section>
   <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">

   <section class="emenities-sec" id="1">
    <div class="container">
       <div class="row emenities">
          <div class="col-md-8 hotel-about over-row">
             <a class="value" href="#">Top Value</a>
             <a class="newly" href="#">Newly renovated</a>
             <a class="workstation" href="#">workstation</a>
             <h3 class="pt-4">{{$hotel_data->hotel_name}} @if($hotel_data->hotel_rating === 5)
	            <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
	            <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="4" id="rating-star-4"> <i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="5" id="rating-star-5"><i class='bx bxs-star'></i></button>
	            @elseif ($hotel_data->hotel_rating === 4)
	            <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
	            <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="4" id="rating-star-4"> <i class='bx bxs-star'></i></button>
	            @elseif ($hotel_data->hotel_rating === 3)
	            <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
	            <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
	            <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
	            @elseif ($hotel_data->hotel_rating === 2)
	            <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
	            <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
	            @else
	            <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
	            @endif  
	         </h3>
             <p>{{$hotel_data->hotel_address}},{{$hotel_data->hotel_city}},{{$hotel_data->nicename}}</p>
             <p>{{strip_tags($hotel_data->hotel_content)}}</p>
             <h3 class="higllisght">HIGHLIGHTS</h3>
             <div class="check-time">
                <div class="check-in">
                   <i class='bx bxs-stopwatch' ></i> Check in: <b>{{$hotel_data->checkin_time}}</b>
                </div>
                <div class="check-out">
                   <i class='bx bx-stopwatch' ></i> Check Out: <b>{{$hotel_data->checkout_time}}</b>
                </div>
             </div>
          </div>
          <div class="col-md-4 location">
            <?php $address = $hotel_data->hotel_address.','.$hotel_data->hotel_city.','.$hotel_data->nicename; ?>
            <iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='<?php echo str_replace(",", "", str_replace(" ", "+", $address)); ?>'&z=14&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
             <div class="parking">
                <span><i class='bx bxs-parking' ></i>

                  <?php if ($hotel_data->parking_option == 2){echo "Paid Parking";}elseif ($hotel_data->parking_option == 1){echo "Free Parking";}else{echo "No Parking";} ?>
                </span>
                <span>Available</span>
             </div>
          </div>
       </div>
    </div>
 </section> 

  <section class="emenities-sec" id="2">
    <div class="container">
    <h1>FEATURED AMENITIES</h1>
       <div class="row amenity-row">
          <div class="col-md-12">
             <div class="row amenities-img">
                <ul>  
                  @foreach($amenities as $amenity)
                   <li><i class='bx bx-check'></i> {{$amenity->amenity_name}}</li>
                  @endforeach
                </ul>
             </div>
          </div>
       </div>
    </div>
  </section>

  <section>
    <div class="container">
      @foreach($room_data as $room)
      <div class="d-flex room-outline">
        <div class="col-md-4 p-0 m-0 roomlist border-right-0" style="height: 371px;">
          <div class="romtype">
            <div class="dropdown">
              <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo strtoupper($room['room_type']);?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Smart Room (Max. 2 adults) <br><small> Starting @ ₹2249</small></a>
                  <a class="dropdown-item" href="#">Classic A/C Room <br><small> Starting @ ₹2650</small></a>
                  <a class="dropdown-item" href="#">Deluxe AC Room <br><small> Starting @ ₹3052</small></a>
              </div>
            </div>
          </div> 
          <div id="roomdetails" class="roomdetails new-nav">
            <div class="container">
              <div class="owl-carousel testimonials-carousel">
                @foreach($room['room_gallery'] as $gallery)
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="heig-fic-room-list">
                    <img src="{{url('/public/uploads/room_images')}}/{{$gallery->image}}" class="testimonial-img" alt="">
                  </div>
                  </div>
                </div>
                @endforeach 
              </div> 
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0 m-0 roomlist border-right-0" style="height: 371px;">
           <h3>OPTIONS</h3>
           <div class="brakfast-price " style="height: auto; border: none;"> 
              <div class="rom-inf">
               <h4> {{$room['name']}} </h4>
               <div class="mart-rom">
                  <ul>
                     <li><i class='bx bx-square'></i> {{$room['room_size']}} sq.ft</li>
                     <li><i class='bx bx-border-all'></i> ON View</li>
                     <li><i class='bx bx-bed'></i> {{$room['bed_type']}}</li>
                     <li><i class='bx bxs-door-open'></i> {{$room['number_of_rooms']}} Rooms Qty</li>
                  </ul>
                  <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" class="more-details"> MORE DETAILS </a> -->
                  <button class="btn btn-primary more-details" roomid="<?php echo $room['id'];  ?>">MORE DETAILS</button>
               </div>
              </div>
           </div> 
        </div>
        <div class="col-md-4 p-0 m-0 roomlist " style="height: 371px;">
           <h3 class="mb-0">PRICE</h3>
           <div class="brakfast-price" style="height: 271px; border: none;">
              <div class="boking-plo">
                 <p> Partial payment at the time of booking confirmation (i.e. 30% online payment , 70% payment at the desk)</p>
              </div>
              <div class="chagr-es">
                 <span>Per Night</span>
                 <br>
                 <del>PKR {{$room['price_per_night']}}</del><br>
                 <h5>PKR {{$room['price_per_night']}}</h5>
                 @if($room['tax_percentage'] > 0)
                 <b>+PKR {{$room['tax_percentage']}} taxes & fees</b>
                 @endif
                 @if($room['cleaning_fee'] > 0)
                 <b>+PKR {{$room['cleaning_fee']}} Cleaning & fees</b>
                 @endif
                 @if($room['city_fee'] > 0)
                 <b>+PKR {{$room['city_fee']}} city & fees</b>
                 @endif
              </div>
              <a href="{{url('checkout')}}?hotel_id={{$hotel_data->hotel_id}}&room_id={{$room['id']}}&check_in={{$check_in}}&check_out={{$check_out}}" class="select-room mt-3">Room Book</a>
           </div>   
        </div>
      </div>   
      @endforeach 
    </div>
  </section>

  <section class="overview" id="3">
    <div class="container">
       <div class="row over-row">
          <div class="col-md-12 p-0">
             <?php $address = $hotel_data->hotel_address.','.$hotel_data->hotel_city.','.$hotel_data->nicename; ?>
            <iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='<?php echo str_replace(",", "", str_replace(" ", "+", $address)); ?>'&z=14&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
          </div>
       </div>
    </div>
  </section> 
  <section class="policy" id="4">
    <div class="container">
       <h1 class="mt-0">Hotel Policy</h1>
       <div class="row policy-row">
          {{strip_tags($hotel_data->hotel_notes)}}
          
       </div>
    </div>
    </div>
  </section>

  <section class="policy" id="5">
     <div class="container">
   <div class="row">
    <div class="col-md-12  p-0">
   <div class="total-rating">
      <h1 class="guest">Guest reviews </h1>
      <br> 
      <h2><label> 4.2</label> <span> Total rating</span> </h2>
   </div>
   <div class="rie-name">
      <div class="rating-var">
         <div class="mb-4 btom-border">
            <h3> Puspendra Thakur  </h3>
            <span>Business traveller</span>
            <div><small><i class='bx bxs-calendar'></i> 19 Dec 2021</small> 
               <small><i class='bx bx-time-five'></i> 12:30PM </small>
            </div>
            <div class="text-reive">
               <p> Rooms were super contemporary and fulfils all the needs for business trip. Loved the entire process right from checkin to checkout. Quality of restaurant food can be better</p>
            </div>
         </div>
         <div class="mb-4 btom-border">
            <h3> Puspendra Thakur  </h3>
            <span>Business traveller</span>
            <div><small><i class='bx bxs-calendar'></i> 19 Dec 2021</small> 
               <small><i class='bx bx-time-five'></i> 12:30PM </small>
            </div>
            <div class="text-reive">
               <p> Rooms were super contemporary and fulfils all the needs for business trip. Loved the entire process right from checkin to checkout. Quality of restaurant food can be better</p>
            </div>
         </div>
         <div class="text-area-type">
            <div class="well well-sm">
               <div class="row" id="post-review-box">
                  <div class="col-md-12">
                     <form  action="" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                           <div class="d-flex mr-2 tating-size">
                              <a href="#"><i class='bx bxs-star'></i></a>
                              <a href="#"><i class='bx bxs-star'></i></a>
                              <a href="#"><i class='bx bxs-star'></i></a>
                              <a href="#"><i class='bx bxs-star'></i></a>
                              <a href="#"><i class='bx bxs-star'></i></a>
                           </div>
                           <button class="btn btn-success-text" type="submit">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
       </div></div>
     </div>
      </div>
   </div>
</section> 
</div>
</main>
 
<!-- End #main -->
 
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <form>
      <div class="modal-content">
         <div class="modal-header">
            <span id="room_name"> Twin/Double Room - 1 Bedroom - Classic </span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="LoginForm">
               <div class="row">
                  <div class="col-md-12 p-0">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
					   <!--  <div class="carousel-item active">
					      <img class="d-block w-100" src="https://votivelaravel.in/roadNstays/public/uploads/hotel_gallery/1655471866_1246280_16061017110043391702.jpg" alt="First slide">
					    </div> -->
					    <div class="carousel-item">
					      <img class="d-block w-100" src="{{url('/public/uploads/hotel_gallery')}}/{{$hotel_gallery[0]->image}}" alt="First slide">
					    </div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>

				<div class="mart-rom">
                  <ul>
                     <li id="room_size"></li>
                     <li><i class='bx bx-border-all'></i> ON View</li>
                     <li id="bed_type"></li>
                     <li id="room_qty"></li>
                  </ul>                  
               </div>

                     <!-- <div id="roomdetails" class="roomdetails" style="overflow: hidden;">
                        <div class="owl-carousel testimonials-carousel" id="myCarousel">
                           <div class="testimonial-wrap">
                              <div class="testimonial-item">
                                 <div class="heig-fic-room-list">
                                    <img src="https://votivelaravel.in/roadNstays/public/uploads/hotel_gallery/1655471866_1246280_16061017110043391702.jpg" class="testimonial-img" alt="">
                                 </div>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 bed-room">
                     
                     <!-- <div class="tag-info">
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
                     </div> -->
                     <!-- <div class="all-detail-rom">
                        <h3 class="mt-4">Room Amenities</h3>
                        <div class="rom-aminit">
                           <div class="check-makr">
                              <i class='bx bx-check-circle'></i> <span>Balcony </span>
                           </div>
                        </div>
                     </div> -->
                     <div class="all-detail-rom">
                        <h3 class="mt-1 gust-rom">Room Amenities</h3>
                        <div class="rom-aminit row" id="amenity">
                           <div class="check-makr col-md-4">
                              <i class='bx bx-check-circle'></i> <span>Free Wi-Fi </span>
                           </div>
                           <!-- <div class="check-makr col-md-4">
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
                           </div> -->
                        </div>
                     </div>
                     <!-- <div class="all-detail-rom">
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
                     </div> -->
                     <div class="room-option">
                        <h2> Room options</h2>
                        <div class="cancellation-policy">
                           <h5> Cancellation policy</h5>
                           <a href="#"> More details on all policy options <i class='bx bx-info-circle'></i></a>
                           <!-- <div class="d-flex justify-content-between">
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
                           </div> -->
                           <div class="d-flex justify-content-between align-self-center align-items-center totalbefore">
                              <h4>Total before taxes <br><label id="total_amount">PKR 15,200</label></h4>
                              <!-- <a href="" class="resurve-btn-res"> Reserve</a> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
   let modalId = $('#image-gallery');
   
   $(document)
      .ready(function() {
   
         loadGallery(true, 'a.thumbnail');
   
         //This function disables buttons when needed
         function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
               .show();
            if (counter_max === counter_current) {
               $('#show-next-image')
                  .hide();
            } else if (counter_current === 1) {
               $('#show-previous-image')
                  .hide();
            }
         }
   
   
   
         function loadGallery(setIDs, setClickAttr) {
            let current_image,
               selector,
               counter = 0;
   
            $('#show-next-image, #show-previous-image')
               .click(function() {
                  if ($(this)
                     .attr('id') === 'show-previous-image') {
                     current_image--;
                  } else {
                     current_image++;
                  }
   
                  selector = $('[data-image-id="' + current_image + '"]');
                  updateGallery(selector);
               });
   
            function updateGallery(selector) {
               let $sel = selector;
               current_image = $sel.data('image-id');
               $('#image-gallery-title')
                  .text($sel.data('title'));
               $('#image-gallery-image')
                  .attr('src', $sel.data('image'));
               disableButtons(counter, $sel.data('image-id'));
            }
   
            if (setIDs == true) {
               $('[data-image-id]')
                  .each(function() {
                     counter++;
                     $(this)
                        .attr('data-image-id', counter);
                  });
            }
            $(setClickAttr)
               .on('click', function() {
                  updateGallery($(this));
               });
         }
      });
   
   // build key actions
   $(document)
      .keydown(function(e) {
         switch (e.which) {
            case 37: // left
               if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                  $('#show-previous-image')
                     .click();
               }
               break;
   
            case 39: // right
               if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                  $('#show-next-image')
                     .click();
               }
               break;
   
            default:
               return; // exit this handler for other keys
         }
         e.preventDefault(); // prevent the default action (scroll / move caret)
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


<script>
     
    // Scrolls down 90px from the top of
    // the document, to resize the navlist
    // padding and the title font-size
    window.onscroll = function() {
        scrollFunction()
    };
         
    function scrollFunction() {
        if (document.body.scrollTop > 600 ||
            document.documentElement.scrollTop > 600)
        {
            document.getElementById("header")
                        .style.display = "none";
                 
            document.getElementById("nav-sec")
                    .style.background = "#fff";
        }
        else {
            document.getElementById("header")
                        .style.display = "block";
                         
            document.getElementById("nav-sec")
                        .style.background = "#fff";
        }
    }
</script>

<script>
   $('.nav-bar li').on('click', function(){
    $(this).addClass('active').siblings().removeClass('active');
});
</script>


<script type="text/javascript">
    $(document).ready(function() {

      $('.more-details').click(function(){
          
          var id = $(this).attr('roomid'); 
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url : "{{url('room_details_ajax')}}",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success:function(response) {
                console.log(response);
                var total_amount = response.room_data.price_per_night+response.room_data.cleaning_fee+response.room_data.city_fee;
                $('#room_name').html(response.room_data.name+'-'+response.room_data.room_type);
                $('#room_title').html(response.room_data.name+'-'+response.room_data.room_type);
                $('#total_amount').html('PKR '+total_amount);
                $('#room_size').html('<i class="bx bx-square"></i>'+response.room_data.room_size+' sq.ft');
                $('#bed_type').html('<i class="bx bx-bed"></i>'+response.room_data.bed_type);
                
                $('#room_qty').html('<i class="bx bxs-door-open"></i>'+response.room_data.number_of_rooms+ 'Rooms Qty');

                var upload_url = "{{url('public/uploads/room_images/')}}/";
                $(response.room_gallery).each(function (i, item) {

                   if(i == 0){
                   	$('.carousel-inner').append($('<div class="carousel-item remove_slide active"><img class="d-block w-100" src="'+upload_url+item.image+'"></div>'));
                   }else{
                   	$('.carousel-inner').append($('<div class="carousel-item remove_slide"><img class="d-block w-100" src="'+upload_url+item.image+'"></div>'));
                   }
                  
                });

                var booking_url = "{{url('checkout')}}?hotel_id=<?php echo $hotel_data->hotel_id?>&&room_id="+id;

                $('.resurve-btn-res').attr('href', booking_url);

                $(response.room_features).each(function (i, features) {
                  $('.ami-pol-room').append($('<div class="ami-pol-detail"><i class="bx bx-restaurant"></i><h5>'+features.name+'</h5></div>'));
                });

                $(response.room_amenities).each(function (i, amenities) {
                  $('#amenity').append($('<div class="check-makr col-md-4"><i class="bx bx-check-circle"></i><span>'+amenities.amenity_name+'</span></div>'));
                });

                $('#exampleModal1').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });

    $( ".close" ).click(function() {
        $( ".remove_slide" ).remove();
        $( ".ami-pol-detail" ).remove();
        $( ".check-makr" ).remove();
    });
</script> 
<!-- End #main -->
@endsection
