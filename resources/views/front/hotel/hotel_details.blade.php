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
.sider-page .row label, .row p{
	padding: 1px;
}
</style>


<!-- slider -->
<main id="main">
<section class="user-section" style="padding-top: 100px; background-color: #f6f6f6;">
    <div class="container">
<div class="row">
 <div class="col-md-12">
  <div class="row thbn-hotel">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
           
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>



            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&rw=297&ra=fit"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&rw=297&ra=fit"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/36a7bd6e.jpg?impolicy=resizecrop&rw=297&ra=fit"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/36a7bd6e.jpg?impolicy=resizecrop&rw=297&ra=fit"
                         alt="Another alt text">
                </a>
            </div>



            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/36a7bd6e.jpg?impolicy=resizecrop&rw=297&ra=fit"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/36a7bd6e.jpg?impolicy=resizecrop&rw=297&ra=fit"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                   data-image="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/b9897775.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/b9897775.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium"
                         alt="Another alt text">
                </a>
            </div>
        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  
                    <div class="modal-body p-0">
                        <img id="image-gallery-image" class="img-responsive col-md-12 p-0" src="">
                    </div>
                    <div class="modal-footer botm-left">
                        <button type="button" class="btn  float-left" id="show-previous-image"><i class='bx bx-chevron-left'></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn  float-right"><i class='bx bx-chevron-right'></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
   


 </div>



<div class="outersec">
        <div class="left-col">

          <div class="right-col">
            <div class="inner">
              <div class="left-facility">
                <ul>
                    <li>
                        <a href="" class="sc-sp-list">Overview</a>
                    </li>
                    <li>
                        <a href="#" class="sc-sp-list">Location</a>
                    </li>
                    <li>
                        <a href="#" class="sc-sp-list">Rooms</a>
                    </li>
                    <li>
                        <a href="#" class="sc-sp-list">Amenities</a>
                    </li>
                    <li>
                        <a href="#" class="sc-sp-list">Reviews</a>
                    </li>
                    <li>
                        <a href="#" class="sc-sp-list">Policies</a>
                    </li>
                  
                </ul></div>

                <a class="reserv-room mr-auto">Reserve a room</a>
            </div>
        </div>
            <div class="inner">
        <div class="header-div">
            <p class="heading sc-sp-data-dis"></p>
            <div class="data" class="heading sc-sp-data-dis">
              <div class="row">
                <div class="col-md-9">
              <h3> Citadines OMR Chennai<br>
                <h5 class="bx-tg"> <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i></h5>
              </h3>
              <div class="tag-info">
                <div class="phone-c">
                <i class='bx bxs-phone'></i>
                +91254852461
                 </div>
                 <p>Took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was </p>
             <h3>Popular amenities</h3>
             
             <div class="amienti">
            <div class="ami-pol">
             <i class='bx bx-swim'></i> 
           <h5>Pool</h5>
            </div>
           <div class="ami-pol">
             <i class='bx bxs-parking'></i>
           <h5>Parking</h5>
            </div>
             <div class="ami-pol">
            <i class='bx bx-restaurant'></i>
           <h5>Restaurant</h5>
            </div>
              <div class="ami-pol">
            <i class='bx bx-wifi'></i>
           <h5>Free wifi</h5>
            </div></div>
              </div></div>

               <div class="col-md-3">
                <div class="map-bar">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30710983.209769644!2d64.45235976587381!3d20.01273993518969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1654679354804!5m2!1sen!2sin" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <p>290, Rajiv Gandhi Salai (OMR), IT Expressway, Sholinganallur, Chennai, Tamil Nadu, 600119</p>
                </div>

                 <div class="explor-area">
                  <h5> Explore the area</h5>
                  <ul> 
              <li><p><i class='bx bxs-location-plus'></i> Kart Attack</p>
 <span>4 min drive<span> </li>
                    <li> <p><i class='bx bxs-location-plus'></i> VGP Snow Kingdom</p>
 <span>14 min drive<span> </li>
  <li><p><i class='bx bxs-location-plus'></i> VGP Universal Kingdom</p>
 <span>20 min drive<span> </li>

                  </ul>

                 </div>
              </div>
                </div>
                </div>
                

                <div class="header-div">
              <p class="heading sc-sp-data-dis">Cleaning and safety</p>
              <div class="data cleaning-head">
               <h3>Cleaning and safety practices</h3>
               <div class="row">
                <div class="col-md-4 safty">
                   <ul>
                   <li><i class='bx bx-spray-can'></i> Cleaned with disinfectant</li> 
                    <li><i class='bx bx-history'></i> 24-hour vacancy between guest room stays</li> 
                     <li><i class='bx bxs-spray-can'></i> Cleaned with disinfectant</li>
                      </ul>
               
                     </div>
                     <div class="col-md-4 safty">
                   <ul>
                   <li><i class='bx bx-spray-can'></i> Cleaned with disinfectant</li> 
                    <li><i class='bx bx-history'></i> 24-hour vacancy </li> 
                     <li><i class='bx bxs-spray-can'></i> Cleaned with disinfectant</li>
                      </ul>
                     </div>
                    </div>
                </div>
        <div class="header-div">
          <p class="heading sc-sp-data-dis"> Choose your room <a href="#" class="al-rom  float-right"> view all room </a></p>
          <div class="row ravelr-avilab">
            <div class="col-md-3 pr-0">
   <label>Check-in</label>
   <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date" min="2022-06-09"></div>
   
   <div class="col-md-3 pr-0">
    <label>Check-out</label>
   <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date" min="2022-06-09"></div>

   <div class="col-md-4 pr-0">
       <label>Travellers</label>
   <input type="text" name="lastname" placeholder="Travellers" class="span3 form-control min_date"></div>

   <div class="col-md-2">
     <label></label>
   <input type="submit" value="Check availability" class="btn btn-primary pull-right w-100"></div>

            </div>
            <div class="col-md-12">
              <section id="roombook" class="testimonials testnm pt-0">
    <div class="container">
      <div class="owl-carousel testimonials-carousel">
         <div class="testimonial-wrap">
          <div class="testimonial-item">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/a95e3f62.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium"></div>
              <h6>Twin/Double Room - 1 Bedroom - Classic</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class='bx bx-area'></i> 280 sq ft</li>
                    <li><i class='bx bxs-group'></i> Sleeps 4</li>
                   <li><i class='bx bx-bed'></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                      <div class="extras-add">
                    <h5>Extras </h5>
                  <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now, 
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label>
                  </div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class='bx bx-rupee'></i> 5,435</h6>
               
             <!-- <small>Rs141,314 total</small> --></div>
            
                     </div>
                      <a href="#" data-toggle="modal" data-target="#squarespaceModal" class="resvi-botm">Reserve </a>

                      <!-- line modal -->

                     </div>
                       </div>

            </div>

           
          </div>
        </div>

       <div class="testimonial-wrap">
          <div class="testimonial-item">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&rw=297&ra=fit"></div>
              <h6>Deluxe Twin Room with 20% Discount on Food & Soft Beverages & Spa </h6>
               <div class="safty-yu">
                 <ul>
                      <li><i class='bx bx-area'></i> 280 sq ft</li>
                    <li><i class='bx bxs-group'></i> Sleeps 4</li>
                   <li><i class='bx bx-bed'></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
                   <label class="container-raio d-flex justify-content-between">
                   <div class="">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class='bx bx-rupee'></i> 5,435</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/4c5d3153.jpg?impolicy=resizecrop&rw=297&ra=fit"></div>
              <h6>Premier Room, 1 King Bed</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class='bx bx-area'></i> 280 sq ft</li>
                    <li><i class='bx bxs-group'></i> Sleeps 4</li>
                   <li><i class='bx bx-bed'></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
              <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class='bx bx-rupee'></i> 7,035</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
          </div>
        </div>
      </div>
    </div>
  </section>

            </div>
            
        </div></div>

                <div class="header-div">
                    <p class="heading sc-sp-data-dis">About this area</p>
                    <div class="data">
                      <h4> Citadines OMR Chennai</h4>
                      <div class="row">
                      <div class="col-md-7 amitn">
                      <p> Located in Bengaluru, Novotel Bengaluru Outer Ring Road is in the business district. Central Mall Bengaluru and M.G. Road are worth visiting if shopping is on the agenda, while those wishing to experience the area's natural beauty can explore Lalbagh Botanical Gardens. Travelling with kids? Consider Church Street, or check out an event or a game at M. Chinnaswamy Stadium.</p></div>
                      <div class="col-md-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30710983.209769644!2d64.45235976587381!3d20.01273993518969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1654679354804!5m2!1sen!2sin" width="100%" height="210" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                        
                    </div>
                  </div>
                </div>
                <div class="header-div">
                    <p class="heading sc-sp-data-dis">Property amenities</p>
                    <div class="data">
                       <div class="row rom-avio">
                <div class="col-md-4 safty">
                   <ul>
                   <li><h4><i class="bx bx-spray-can"></i> Cleaned with disinfectant </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Available in all rooms: Free WiFi</li> 
                   <li>Available in some public areas: Free WiFi</li> 
                      </ul>
                     </div>
                     <div class="col-md-4 safty">
                  <ul>
                   <li><h4><i class='bx bx-check'></i> Languages spoken </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>English</li> 
                   <li>Hindi</li> 
                      </ul>
                     </div>

                      <div class="col-md-4 safty ">
                  <ul>
                   <li><h4><i class='bx bx-car'></i> Parking and public transport </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Free self-parking on site</li> 
                   <li>Limited on-site parking</li> 
                   <li> Wheelchair-accessible parking available</li>
                    <li>Airport shuttle on request</li>

                      </ul>
                     </div>
                        <div class="col-md-4 safty ">
                  <ul>
                   <li><h4><i class='bx bx-female'></i> Family friendly</h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Free self-parking on site</li> 
                   <li>Limited on-site parking</li> 
                   <li> Wheelchair-accessible parking available</li>
                   <li>24-hour return airport shuttle (surcharge) </li>
                   <li>Airport shuttle on request</li>

                      </ul>
                     </div>
                    </div>
                    
                    </div>
                </div>
                <div class="header-div">
                    <p class="heading sc-sp-data-dis">Room amenities</p>
                    <div class="data">
                        <div class="row rom-avio">
                <div class="col-md-4 safty">
                   <ul>
                   <li><h4><i class='bx bx-bed'></i> Bedroom </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Air conditioning (climate-controlled)</li> 
                   <li>Bed sheets</li> 
                   <li> Premium bedding</li>
                      </ul>
                     </div>
                     <div class="col-md-4 safty">
                  <ul>
                   <li><h4><i class='bx bxs-drink'></i> Food and drink </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>English</li> 
                   <li>Hindi</li> 
                      </ul>
                     </div>

                      <div class="col-md-4 safty ">
                  <ul>
                   <li><h4><i class='bx bx-bath'></i> Bathroom </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Bathroom (partially open)</li> 
                   <li>Free toiletries</li> 
                   <li> Hairdryer</li>
                    <li>Shower</li>

                      </ul>
                     </div>
                        <div class="col-md-4 safty ">
                  <ul>
                   <li><h4><i class='bx bxs-florist'></i> Outdoor space</h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Balcony</li> 
                   

                      </ul>
                     </div>
                    </div>
                    </div>
                </div>


                 <div class="header-div">
                    <p class="heading sc-sp-data-dis">Policies</p>
                    <div class="data">
                        <div class="row rom-avio">
                <div class="col-md-4 safty">
                   <ul>
                   <li><h4>Check-in </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Check-in from 2:00 PM - anytime</li> 
                   <li>Early check-in subject to availability</li> 
                   <li> Early check-in is available for a fee (amount varies)</li>
                      </ul>
                     </div>
                     <div class="col-md-4 safty">
                  <ul>
                   <li><h4>Check-out </h4></li> 
                      </ul>
                      <ul class="pl-4">
                   <li>Check-out before noon</li> 
                   <li>Late check-out subject to availability</li> 
                      </ul>
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


 
  
</main><!-- End #main -->


<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  
    <div class="modal-body">
      dfsf dfsdf s//
    </div>
    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
        </div>
      
        <div class="btn-group" role="group">
          <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


<script type="text/javascript">
  let modalId = $('#image-gallery');

$(document)
  .ready(function () {

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
        .click(function () {
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
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
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
  
  $(function () {
    // ADDING DATA
    (function () {
        var inc = 0;
        $('.sc-sp-data-dis').each(function () {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
        });
    })();
    (function () {
        var inc = 0;
        $('.sc-sp-list').each(function (ev) {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
        });
    })();

    $(window).on("load scroll", function () {
        var windowScroll = $(this).scrollTop();
        $(".sc-sp-data-dis").each(function () {
            var thisOffsetTop = Math.round($(this).offset().top - 30);

            if (windowScroll >= thisOffsetTop) {
                var thisAttr = $(this).attr('data-scsp');
                $('.sc-sp-list').parent().removeClass("active");
                $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
            }
        });
    });

    $('.sc-sp-list').click(function (ev) {
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




<!-- End #main -->



@endsection