@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')
@endsection
@section('content')


<main id="main" class="tour-details-page">
   <section class="tour-single-section pt-0" style= "background-image: url('{{url('/')}}/public/uploads/tour_gallery/{{$tour_details->tour_feature_image}}');">
      <div class="tour-title-section">
         <div class="container ">
            <div class="row ">
               <div class="col-12">
                  <div class="tour-name">
                     <div class="left-part">
                        <div class="tour-value">
                           <a href="#" class="tour-type">{{$tour_details->tour_type}}</a>
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
                        <?php  $nights = $tour_details->tour_days-1; ?>
                        <div class="btm-info d_n">
                           <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> {{$tour_details->tour_days}} Days & {{$nights}} Nights</p>
                           <a href="#" class="tour-type">Adventure</a>
                        </div>
                        <div class="facility-detail">
                           <a href="#">free wifi</a>
                           <a href="#">free breakfast</a>
                        </div>
                     </div>
                     <div class="right-part">
                        <h2 class="price">{{$tour_details->tour_price}} PKR <span>/ per person</span></h2>
                        <p>For twin sharing {{$tour_details->tour_price_others}} extra charges per person</p>
                        <a href="{{url('/tourBooking')}}?id={{$tour_details->id}}" class="btn btn-rounded btn-sm book-btn">book this now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @php $country_name = DB::table('country')->where('id', $tour_details->country_id)->first(); @endphp
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
                           <!-- Single Items -->
                           <div class="col-xs-6 col-lg-3 col-md-6">
                              <div class="singles_item">
                                 <div class="icon">
                                    <i class="icofont-travelling"></i>
                                 </div>
                                 <div class="info">
                                    <h4 class="name">Tour start day</h4>
                                    <p class="value">Every Friday</p>
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
                     <div class="desc-box">
                        <h4 class="content-title"><i class='bx bx-trip'></i> Trip details</h4>
                        <!-- <div class="menu-part accordion" id="trip-detail">
                           <div id="accordion" class="accordion-plan it-info">
                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                 @foreach($tour_itinerary as $key=> $trip)
                                 <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$key}}">
                                       <h4 class="panel-title">
                                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                          {{$trip->title}}
                                          </a>
                                       </h4>
                                    </div>
                                    <div id="collapse{{$key}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$key}}">
                                       <div class="panel-body">
                                          <div class="about-sec-list-tab">
                                             <ul>
                                                @foreach (json_decode($trip->trip_detail) as $details)
                                                <li>{{$details}}</li>
                                                @endforeach
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div> -->

                        <div class="accordion for-mobile new-collaps mt-2" id="accordionExample">
                          @foreach($tour_itinerary as $key=> $trip)
                          <div class="card">
                            <div class="card-header" id="heading{{$key}}">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                 <b>{{$trip->title}}</b>
                                </button>
                              </h2>
                            </div>
                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                              <div class="card-body">
                                <nav class="nav flex-column">
                                @foreach (json_decode($trip->trip_detail) as $details)
                                 <a class="nav-link" href="#">{{$details}}</a>
                                @endforeach
                                </nav>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          <!-- <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <b>MARKETING</b>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                               <nav class="nav flex-column">
                                 <a class="nav-link" href="#">Managed SEO</a>
                                 <a class="nav-link" href="#">Pay-Per-Click (PPC) Solutions</a>
                                 <a class="nav-link" href="#">Backlink Booster</a>
                                 <a class="nav-link" href="#">Premium Blog Writing Service</a>
                                 <a class="nav-link" href="#">Contextual Link Building</a>
                                 <a class="nav-link" href="#">Visitor Retargeting</a>
                                 <a class="nav-link" href="#">Social Media Ads Management</a>
                                </nav>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <b>SUPPORT</b>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <nav class="nav flex-column">
                                 <a class="nav-link" href="#">Free Consultation</a>
                                 <a class="nav-link" href="#">FAQs</a>
                                 <a class="nav-link" href="#">Support Center</a>
                                 <a class="nav-link" href="#">Ticket Center</a>
                                 <a class="nav-link" href="#">Contact Us</a>
                                 <a class="nav-link" href="#"
                                    target='_blank'>Client Control Panel</a>
                                </nav>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingFour">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                 <b>INFO</b>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <nav class="nav flex-column">
                                 <a class="nav-link" href="#">Testimonials</a>
                                 <a class="nav-link" href="#">News & Media</a>
                                 <a class="nav-link" href="#">Referral Program</a>
                                 <a class="nav-link" href="#">Affiliate Program</a>
                                 <a class="nav-link" href="#">Newsletter</a>
                                 <a class="nav-link" href="#">Contact Us</a>
                                </nav>
                              </div>
                            </div>
                          </div> -->
                        </div>


                     </div>
                     <div class="desc-box">
                        <h4 class="content-title"><i class='bx bxs-location-plus'></i> Location's</h4>
                        <div class="menu-part" id="locations">
                           <div class="info-locat">
                              <p>{{$tour_details->tour_locations}}</p>
                           </div>
                        </div>
                     </div>
                      <div class="desc-box">
                        <h4 class="content-title"><i class='bx bx-accessibility'></i> Activities </h4>
                        <div class="menu-part" id="locations">
                           <div class="info-locat">
                              <p> Cultural Events – Historical Visit to forts – Hiking.</p>
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
                        <h4 class="content-title"><i class='bx bx-images' ></i> Gallery</h4>
                        <div class="menu-part">
                           <div class="info-locat">
                              <div class="row">
                                @foreach($tour_gallery as $key=> $gallery)
                             <div class="col-lg-3 col-md-4 col-sm-6 pr-1" data-toggle="modal" data-target="#modal">
                                <a href="#lightbox" data-slide-to="0"><img src="{{url('/')}}/public/uploads/tour_gallery/{{$gallery->image}}" class="img-thumbnail my-3"></a>
                              </div>
                              @endforeach
<!--     <div class="col-lg-3 col-md-4 col-sm-6 pr-1" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="1"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 pr-1" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="2"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 pr-1" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="3"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 pr-1" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="4"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="img-thumbnail my-3"></a>
    </div> -->

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
                                            <div class="carousel-item @if($key == 0) active @endif"><img src="{{url('/')}}/public/uploads/tour_gallery/{{$gallery->image}}" class="w-100"
                                                alt=""></div>
                                            @endforeach
                                            <!-- <div class="carousel-item"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="w-100"
                                                alt=""></div>
                                            <div class="carousel-item"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="w-100"
                                                alt=""></div>
                                            <div class="carousel-item"><img src="https://votivetechnologies.in/roadNstays/public/uploads/tour_gallery/pexels-mehmet-turgut-kirkgoz-5865861-tourMainImg-1658816190.jpg" class="w-100"
                                                alt=""></div> -->
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
                  </div>
               </div>
            </div>
             @php $vendor = DB::table('users')->where('id', $tour_details->vendor_id)->first(); @endphp
            <div class="col-xl-4 col-lg-4 col-md-12">
               <div class="sticky-cls-top">
                  <div class="card-org overflow-hidden">
                     <div class="card-header">
                        <h3 class="card-title">Tour Operator Name</h3>
                     </div>
                     @php $vendor_counrty = DB::table('country')->where('id', $vendor->user_country)->first(); @endphp
                     <div class="card-body item-user">
                        <div class="profile-details">
                           <div class="profile-pic mb-0 mx-5"> <img src="{{url('/')}}/resources/assets/img/gilgit.jpg" class="brround w-150 h-150" alt="user">
                           </div>
                        </div>
                        <div class="text-center mt-2">
                           <a href="#" class="text-dark text-center">
                              <h4 class="mt-0 mb-1 pro-name">{{$vendor->first_name}} {{$vendor->last_name}}</h4>
                           </a>
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
                              <!-- <li class="">
                                 <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">New Tours</a>
                              </li> -->
                           </ul>
                           <!-- Tab panes -->
                           
                           <div class="tab-content">
                              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                 <div class="card-body item-user details_cont">
                                    <h4 class="mb-4">Contact Info</h4>
                                    <div>
                                       <h6><span class="font-weight-semibold"><i class="bx bx-map"></i></span><a href="#" class="text-body"> {{$vendor->address}},{{$vendor->user_city}},{{$vendor->state_id}},{{$vendor_counrty->name}} </a></h6>
                                       <h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> {{$vendor->email}}</a></h6>
                                       <h6><span class="font-weight-semibold"><i class="bx bx-phone"></i></span>{{$tour_details->contact_num}}, {{$tour_details->alternate_num}}</h6>
                                       <h6><span class="font-weight-semibold"><i class="bx bx-link"></i></span><a href="#" class="text-secondary">www.gbtourism.com</a></h6>
                                    </div>
                                    <div class="social-info-adv">
                                       <h4 class="mb-4">Social Info</h4>
                                       <a href="{{$tour_details->facebook}}" target="_blank"><i class="bx bxl-facebook"></i></a>
                                       <a href="{{$tour_details->instagram}}" target="_blank"><i class="bx bxl-instagram"></i></a>
                                       <a href="{{$tour_details->tiktok}}"  target="_blank" class="tiktok">
                                          <img src="{{url('/')}}/resources/assets/img/tiktok.png" alt="user" width="15" ></a>		
                                    </div>
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
                           <div class="profile-pic mb-0 mx-5"> <img src="{{url('/')}}/resources/assets/img/gilgit.jpg" class="brround w-150 h-150" alt="user">
                           </div>
                        </div>
                        <div class="text-center mt-2 details_cont">
                           <a href="#" class="text-dark text-center">
                              <h4 class="mt-0 mb-1 pro-name">{{$tour_details->contact_name}}</h4>
                           </a>
                           <span class="text-muted mt-1"><strong>Gilgit Baltistan Tourism Club</strong></span>
                           <div class=" opr-cont">
                              <h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> jumailhaider04@gmail.com</a></h6>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer btns-combo">
                        <div class="btns-chats">
                           <a href="tel:+{{$tour_details->contact_num}}" class="btn btn-secondary mt-1 mb-1"><i class="bx bx-user-circle"></i> Contact Me</a>		
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
                              <li><i class='bx bxs-bank'></i> Bank Name: <strong>{{$tour_details->bank_name}}</strong></li>
                              <li><i class='bx bxs-user-account' ></i> Account Title: <strong>{{$tour_details->account_holder}}</strong></li>
                              <li><i class='bx bx-credit-card-front'></i> Account Number: <strong>{{$tour_details->account_number}}</strong></li>
                              <li><i class='bx bx-building-house'></i> Branch: <strong>{{$tour_details->branch_name}}</strong></li>
                           </ul>
                        </div>
                     </div>
                     
                     <div class="card-footer btns-combo">
                        <div class="note-info">
                           <p>Submit Advance by any Method & send screenshot through WhatsApp on this number <i class="bx bxl-whatsapp"></i> <strong class="whtapp-num"><a href="tel:{{$tour_details->booking_contact_no}}">{{$tour_details->booking_contact_no}}</a></strong></p>
                        </div>
                     </div>
                  </div>
                  <div class="card-org overflow-hidden">
                     <div class="card-header">
                        <h3 class="card-title">Pay with Easypaisa and Jazz Cash</h3>
                     </div>
                     <div class="card-body toa item-user">
                        <div class="about-sec-list-bank">
                           <ul>
                               <li><i class='bx bx-credit-card-front'></i> Name  <strong>{{$tour_details->contact_name}}:</strong></li>
                              <li><i class='bx bxs-bank'></i> Easypaisa: <strong>{{$tour_details->easypaisa}}</strong></li>
                              <li><i class='bx bxs-user-account' ></i> Jazz Cash: <strong>{{$tour_details->jazz_cash}}</strong></li>
                              <li><i class='bx bx-building-house'></i> No: <strong> {{$tour_details->booking_contact_no}}</strong></li>
                           </ul>
                        </div>
                     </div>
                     
                     <div class="card-footer btns-combo">
                        <div class="note-info">
                           <p>Submit Advance by any Method & send screenshot through WhatsApp on this number <i class="bx bxl-whatsapp"></i> <strong class="whtapp-num"><a href="tel:{{$tour_details->booking_contact_no}}">{{$tour_details->booking_contact_no}}</a></strong></p>
                        </div>
                     </div>
                  </div>
                  <div class="card-org overflow-hidden">
                     <div class="card-header payment-heding ">
                        <h3 class="card-title pl-3"><i class='bx bx-notepad'></i> Payment Term</h3>
                     </div>
                     <div class="card-body item-user">
                            <h6 class="text-default font-weight-bold mt-1 boking-heading">For Booking make Payment of 50% advance / Per Head </h6>
                          
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
</main>
<!-- End #main -->
@endsection