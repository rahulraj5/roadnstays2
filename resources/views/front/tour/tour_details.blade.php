@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



@endsection



@section('current_page_js')


@endsection



@section('content')

<main id="main" class="tour-details-page">

	<section class="tour-single-section pt-0">
		<div class="tour-title-section">
			<div class="container ">
				<div class="row ">
					<div class="col-12">
						<div class="tour-name">
							<div class="left-part">
							<div class="tour-value">
								<a href="#" class="tour-type">Standard</a>
								</div>
								<div class="top">
									<h2>Skardu Shigar & Bashu Valley</h2>
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
								 <div class="btm-info d_n">
                                    <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 7 Days & 6 Nights</p>
									<a href="#" class="tour-type">Adventure</a>
                                 </div>	
								<div class="facility-detail">
										<a href="#">free wifi</a>
										<a href="#">free breakfast</a>
								</div>
							</div>
							<div class="right-part">
								<h2 class="price">22,999 PKR <span>/ per person</span></h2>
								<p>For twin sharing 3000 extra charges per person</p>
								<a href="#" class="btn btn-rounded btn-sm book-btn">book this now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="info-tours ">
		<div class="container-fluid ">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
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
								<p class="value">7 days</p>
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
								<p class="value">Ligula</p>
							</div>
						</div>
					</div>
					
					<!-- Single Items -->
					<div class="col-xs-6 col-lg-3 col-md-6">
						<div class="singles_item">
							<div class="icon">
								<i class="icofont-travelling"></i>
							</div>
							<div class="info">
								<h4 class="name">Members</h4>
								<p class="value">3-4 Members</p>
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
								<p class="value">New York, USA</p>
							</div>
						</div>
					</div>
					</div></div>
				</div>
						<!-- <div class="menu-top menu-up" id="searchBar">
							<div class="container p-0">
								<ul class="nav nav-tabs tabs-info">
            <li class="nav-item">
              <a class="nav-link active" href="#description">
                Description
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#trip-detail">
                Trip Detail
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#locations">
                Location's
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#activities">
                Activities
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#services">
                Services
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#map">
                Map
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#terms-conditions">
                terms-conditions
              </a>
            </li>
         </ul>
							</div>
						</div> -->
						<div class="description-details">
							<div class="desc-box">
							<h4 class="content-title">Description</h4>
								<div class="menu-part mt-0 about-tour" id="description">
									<div class="about-sec">
										<p>"Skardu Valley: The Skardu valley is located in Gilgit-Baltistan, Pakistan. The valley is about 10 km wide and 40 km long. It is at the confluence of the Shigar River and Indus River. It surrounded by the large Karakoram Range. With the nearby lakes and mountains, it is an important tourist location in Pakistan. Skardu is the main town of Baltistan along the first  wide bank of the river Indus.
"</p>
									</div>
								
								</div>
							</div>
							
							<div class="desc-box">
                                <h4 class="content-title">Trip details</h4>
                                <div class="menu-part accordion" id="trip-detail">
									<div id="accordion" class="accordion-plan it-info">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Day 00 - Lahore- Islamabad
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Meet and greet guest</li>
                    <li>Departure towards Islamabad</li>
					<li>Short stay at Bhera</li>
					<li>Reach Islamabad</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Day 1 - Islamabad - Besham-Chilas - Kohistan
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Pick Participants from Islamabad</li>
                    <li>Move towards Besham city</li>
					<li>Breakfast at Besham</li>
					<li>Continue drive towards Chilas</li>
					<li>Short Stay at Kohistan and Dassu</li>
					<li>Reach Chilas Dinner and overnight stay at Hotel 1st Night stay.</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Day 2 - Chilas - Jugloat - Stak Nala - Skardu
        </a>
      </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Move towards Skardu</li>
					<li>Stop over at Nanga Parbat view point</li>
					<li>Stopover at mountain Junction Point</li>
					<li>Continue drive towards Skardu valley</li>
					<li>Stopover at Astak Nala</li>
					<li>Continue travelling towards Skardu</li>
					<li>Reach Skardu& transfer to Hotel</li>
					<li>Enjoy Dinner & Overnight stay at Hotel</li>
					<li>2nd  Night stay</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Day 3 - Shangrilla - Upper Kachura - Katpana Lake & Desert -Skardu city
        </a>
      </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Visit Shangrilla Resort & enjoy quality time</li>
					<li>Visit Upper Kachura lake & enjoy quality time</li>
					<li>Visit Katpana Desert &Katpana Lake</li>
					<li>Enjoy Shopping at Skardu local Market</li>
					<li>Move back towards Hotel</li>
					<li>Dinner & Overnight stay at Hotel 3rd Night stay</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Day 4 - Skardu - Manthokha Waterfall Cold desert - Shigar Valley
        </a>
      </h4>
      </div>
      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Move towards Manthokha Waterfall</li>
					<li>Visit Mehdiabad Valley Sermik Valley</li>
					<li>Reach Manthokha Waterfall</li>
					<li>Move Towards Shiger Valley</li>
					<li>Stopover at Bab E Shigar</li>
					<li>Visit Cold Desert Shigar</li>
					<li>Visit Shigar Fort</li>
					<li>Visit Amburiq Mosque</li>
					<li>Explore Shigar Valley</li>
					<li>Move back towards Hotel</li>
					<li>Enjoy BBQ Dinner & Bonfire</li>
					<li>Overnight stay at Hotel.</li>
					<li>4th Night stay.</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Day 5 - Skardu - Basho Valley – Sultanabad Basho
        </a>
      </h4>
      </div>
      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
         <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Drive Towards Basho Valley</li>
					<li>Short Stay at Basho Suspention Bridge</li>
					<li>Sightseeing at Basho Waterfall</li>
					<li>Move Towards Sultanabad Basho</li>
					<li>Visit Heart Rock on the way towards Sultanabad</li>
					<li>Reach Sultanabad Visit Basho River , Camel Rock and Basho Forest</li>
					<li>Back to Skardu city</li>
					<li>Overnight stay in Hotel</li>
					<li>5th  Night stay</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Day 6 - Skardu - chilas - Besham
        </a>
      </h4>
      </div>
      <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Departure towards Besham</li>
					<li>Stopover at Astak Nala</li>
					<li>continue drive Towards Besham</li>
					<li>Reach Besham Dinner & Overnight stay in hotel 6th  Night stay</li>		
                </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Day 7 - Besham - Islamabad - Lahore
        </a>
      </h4>
      </div>
      <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="about-sec-list-tab">
				<ul>
					<li>Breakfast at hotel</li>
                    <li>Departure towards Home</li>
					<li>Travel all day towards Islamabad/Lahore</li>
					<li>Consecutive stopovers for Restrooms & refueling</li>
					<li>Reach Islamabad & Drop Guests</li>
					<li>Stopover at Bhera interchange</li>
					<li>Reach Lahore & end of services</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
	
	
  </div>
</div>
									</div>
								</div>
								
								<div class="desc-box">
									<h4 class="content-title">Location's</h4>
									
									<div class="menu-part" id="locations">
										<div class="info-locat">
										<p>"Lahore – Islamabad- Faisalabad
Besham-Kohistan-Dassu -Chilas – Skardu – Shigar – Mantokha – Shangrilla Resort – Upper Kachura Lake – Katpana Desert – Katpana Lake – Cold Desert Shigar – Shigar Fort  – Sadpara Lake – Kharpocho Fort – Skardu Bazar – Newranga Skardu – Basho Valley – Suspention Bridge – Heard Rock – Camel Rock – Basho River – Sultanabad Basho – Basho Forest – Basho Glacier.

"</p>
									</div>
									</div>
								</div>
								
			<div class="desc-box">
				<h4 class="content-title">Activities</h4>
				
				<div class="menu-part" id="activities">
					<div class="info-activity">
					<div class="about-sec-list">
                            <ul>
                                <li>Sightseeing</li>
                                <li>Cultural Events</li>
								<li>Historical Visit to forts</li>
								<li>Hiking</li>
                            </ul>
                        </div>
				</div>
				</div>
			</div>
			

			<div class="desc-box">
			<h4 class="content-title">Services</h4>
			<div class="menu-part mt-0 about-tour" id="services">
				<div class="row">
					<div class="col-md-6">
						<div class="about-sec-list">
                            <h4>Services Includes<br>
                             <p> May vary according to your Package</p></h4>
							  <ul>
                                <li>Latest Model Grand Cabin, BRV or coaster for all transportation</li>
                                <li>All kinds of tolls, taxes and fuel expenses</li>
                                <li>Hotel Accommodations ( Sharing Basis )</li>
                                <li>7 Breakfast</li>
                                <li>6 Dinner</li>
                                <li>Live BBQ</li>
                                <li>Bonfire with Music</li>
								<li>First Aid Kit</li>
								<li>Services of Guide</li>
								<li>Entertainment</li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-6  margin-up">
						<div class="about-sec-list">
                            <h4>Services Not Included</h4>
                            <ul>
                                <li>Personal Clothing</li>
								<li>Extras at hotels like drinks, laundry, phone calls</li>
								<li>Insurance liability medical aid, and rescue etc</li>
								<li>Lunch Or other eatables items</li>
								<li>Entry Tickets</li>
								<li>Boating Charges</li>
								<li>Jeep charges</li>
								<li>Anything Not Mentioned in the Package Above</li>
								<li>Emergency Rescue or Medical charges</li>
                            </ul>
                        </div>
					</div>
				</div>
				
				
			</div>
		</div>
		
		<div class="desc-box">
			<h4 class="content-title">Map</h4>
			<div class="menu-part mt-0 about-tour" id="map">
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d416275.41769049113!2d75.17501082737272!3d35.40149016423934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x38e46392bac10283%3A0xc2f7a786f9833d7!2sSkardu!3m2!1d35.3247102!2d75.55096019999999!4m5!1s0x38e4474182653f5f%3A0x2b5c8cae06349c46!2sBasho!3m2!1d35.4703175!2d75.3592142!5e0!3m2!1sen!2sin!4v1655374833968!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				
			</div>
		</div>
								
							<div class="desc-box">
								<h4 class="content-title">Terms & Conditions</h4>
								<div class="menu-part mt-0 about-tour" id="terms-conditions">			
									<div class="about-sec-list">
                                                <ul>
                                                    <li>Using drugs or intoxication of any kind is strictly prohibited .If anyone is caught using any kind of substance on buses or during trip will be expelled from the trip on the spot. That person will not be eligible for any kind of refund.</li>
                                                    <li>We reserve the right to cancel trip without prior notice for any reasons deemed appropriate by them.</li>
                                                    <li>In such a case the registered participants will receive full refund.</li>
                                                    <li>On adventure trip of this type, weather, local politics, transport or a multitude of other factors beyond the control of organizers can result in a change of itinerary.</li>
                                                    <li>It is, however, very unlikely that the itinerary would be substantially altered; if alterations are necessary the Leader of the group and Guide will decide what the best alternative is, taking into consideration the best interests of the whole group.</li>
                                                    <li>Smoking in the transport is strictly prohibited.</li>
                                                    <li>Participants must hold a valid Computerized CNIC/Passport Card.</li>
													<li>Time management / punctuality is strictly recommended.</li>
													<li>Participants are advised to use Non-Slippery Shoes/Boot/Joggers/DMS. Participants must NOT wear Heel/Dress Shoes.</li>
													<li>On steep ascends in mountainous areas, air conditioned of the buses will be operational on on-off basis to keep the vehicles from overheating.</li>
													<li>The GBTC will not be responsible for any injury/damage/loss</li>
													<li>Room Service and additional ancillary services acquired from the hotel.</li>
													<li>Horses for personal used totop Pre Medical team Doctor Lunch &Dinner…</li>
                                                </ul>
                                            </div>
								</div>
							</div>
								
							</div>
							
							
							
						</div>
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-12">
						<div class="sticky-cls-top">
							<div class="card-org overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Tour Operator Name</h3>
								</div>
								<div class="card-body item-user">
									<div class="profile-details"> 
										<div class="profile-pic mb-0 mx-5"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/gilgit.jpg" class="brround w-150 h-150" alt="user">
										</div> 
									</div>
									<div class="text-center mt-2"> <a href="#" class="text-dark text-center"><h4 class="mt-0 mb-1 pro-name">Gilgit Baltistan Tourism Club</h4></a> 
										<span class="text-muted mt-1">Tour Organizer <b> Since November 2008</b></span>
										<small class="text-muted">Tour Operator ID <b>TO-101</b></small>
									</div>
								</div>
								
								<div class="profile-user-tabs">
									<div class="tabs-menu1">
										<ul class="nav nav-tabs cont-tab" role="tablist">
	<li class="">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Contact</a>
	</li>
	<li class="">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">New Tours</a>
	</li>
</ul><!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="tabs-1" role="tabpanel">
		<div class="card-body item-user details_cont"> 
			<h4 class="mb-4">Contact Info</h4>
			<div>
			<h6><span class="font-weight-semibold"><i class="bx bx-map"></i></span><a href="#" class="text-body"> Address goes here</a></h6>
			<h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> jumailhaider04@gmail.com</a></h6>
			<h6><span class="font-weight-semibold"><i class="bx bx-phone"></i></span>+92 341 8994572, +92 311 5137660</h6>
			<h6><span class="font-weight-semibold"><i class="bx bx-link"></i></span><a href="#" class="text-secondary">www.gbtourism.com</a></h6>
			</div>
			
			<div class="social-info-adv">
			<h4 class="mb-4">Social Info</h4>
			<a href="#"><i class="bx bxl-facebook"></i></a>
			<a href="#"><i class="bx bxl-instagram"></i></a>		
		</div>
		</div>
		
		
	
	</div>
	<div class="tab-pane" id="tabs-2" role="tabpanel">
		<div class="table-responsive card-body details_cont"> 
			<table class="table table-bordered border-top mb-0 text-nowrap">
				<tbody>
					<tr><td>Canada Tour</td><td class="font-weight-semibold">18th Dec - 10th Jan</td></tr>
					<tr><td>Europe Tour</td><td class="font-weight-semibold">10th Nov - 21st Dec</td></tr>
					<tr><td>France Tour</td><td class="font-weight-semibold">15th Dec - 6th Feb</td></tr>
					<tr><td>Australia Tour</td><td class="font-weight-semibold">16th Sep - 10th Nov</td></tr>
					<tr><td>USA Tour</td><td class="font-weight-semibold">5th Oct - 16th Dec</td></tr>
					<tr><td>Italy Tour</td><td class="font-weight-semibold">14th Oct - 19th Nov</td></tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="card-footer btns-combo">
		<div class="btns-chats">
			<a href="#" class="btn btn-secondary mt-1 mb-1"><i class="bx bx-user-circle"></i> Contact Me</a>		
		</div>
	</div>
	
</div>
									</div>
								</div>
								
							</div>
							
							<div class="card-org overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Tour Operator Contact Name</h3>
								</div>
								<div class="card-body item-user">
									<div class="profile-details"> 
										<div class="profile-pic mb-0 mx-5"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/gilgit.jpg" class="brround w-150 h-150" alt="user">
										</div> 
									</div>
									<div class="text-center mt-2 details_cont"> <a href="#" class="text-dark text-center"><h4 class="mt-0 mb-1 pro-name">Jumail haider</h4></a> 
										<span class="text-muted mt-1"><strong>Gilgit Baltistan Tourism Club</strong></span>
										<div class=" opr-cont">
										<h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> jumailhaider04@gmail.com</a></h6>
										</div>
									</div>
										
								</div>	
								<div class="card-footer btns-combo">
		<div class="btns-chats">
			<a href="tel:+923418994572" class="btn btn-secondary mt-1 mb-1"><i class="bx bx-user-circle"></i> Contact Me</a>		
		</div>
	</div>
							</div>
							
							<div class="card-org overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Tour Operator Account (Main)</h3>
								</div>
								<div class="card-body toa item-user">
									<div class="about-sec-list-bank">
				<ul>
					<li><i class='bx bxs-bank'></i> Bank Name: <strong>Habib Bank Limited</strong></li>
                    <li><i class='bx bxs-user-account' ></i> Account Title: <strong>Jumail haider</strong></li>
					<li><i class='bx bx-credit-card-front'></i> Account Number: <strong>12467903703903</strong></li>
					<li><i class='bx bx-building-house'></i> Branch: <strong>Township Branch Lahore</strong></li>
                </ul>
          </div>
										
								</div>	
								<div class="card-header">
									<h3 class="card-title">Tour Operator Account (Other)</h3>
								</div>
								<div class="card-body toaa item-user">
									<div class="about-sec-list-bank">
				<ul>
					<li><i class='bx bxs-bank'></i> Bank Name: <strong>Habib Bank Limited</strong></li>
                    <li><i class='bx bxs-user-account' ></i> Account Title: <strong>Jumail haider</strong></li>
					<li><i class='bx bx-credit-card-front'></i> Account Number: <strong>12467903703903</strong></li>
					<li><i class='bx bx-building-house'></i> Branch: <strong>Township Branch Lahore</strong></li>
                </ul>
          </div>
										
								</div>	
								<div class="card-footer btns-combo">
		<div class="note-info">
			<p>Submit Advance by any Method & send screenshot through WhatsApp on this number <i class="bx bxl-whatsapp"></i> <strong class="whtapp-num"><a href="tel:0341-8994572">0341-8994572</a></strong></p>		
		</div>
	</div>
							</div>
							
							<div class="card-org overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Need Help for any Details?</h3>
								</div>
								<div class="card-body item-user">
									<div class="support-service"> 
										<i class="bx bx-phone"></i>
										<h6 class="text-default font-weight-bold mt-1">+00 12-345-6789</h6>
										<p class="text-default mb-0 fs-12">Free Support!</p>
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



@endsection