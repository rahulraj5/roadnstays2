@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')

<script>
 
$(".accordion-thumb").click (function(){
  // Close all open windows
  $(".hidden-menu").stop().slideUp(300); 
  // Toggle this window open/close
  $(this).next(".hidden-menu").stop().slideToggle(300);
  //hitter test// 
  $(".hitter").show()
});

$(".hitter").click (function(){
  // Close all open windows
  $(".hidden-menu").stop().slideUp(300); 
});

</script>
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
                        <?php  $nights = $tour_details->tour_days-1; ?>
                        <div class="btm-info d_n">
                           <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> {{$tour_details->tour_days}} Days & {{$nights}} Nights</p>
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
                       <?php $timestamp = strtotime($tour_details->tour_start_date); ?>
                       <!-- Single Items -->
                       <div class="col-xs-6 col-lg-3 col-md-6">
                          <div class="singles_item">
                             <div class="icon">
                                <i class="icofont-travelling"></i>
                             </div>
                             <div class="info">
                                <h4 class="name">Tour start day</h4>
                                <p class="value"><?php echo date('l', $timestamp);?></p>
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
                  <div id="Itinerary" class="desc-box" >
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
                                 <li><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/breakfast1.png" alt="meal">
                                    Breakfast
                                 </li>
                                 <li><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/transfer1.png" alt="transport">
                                    {{$itinerary->transport}}
                                 </li>
                                 <li><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/stay1.png" alt="star hotel">
                                   {{$itinerary->hotel}}
                                 </li>
                              </ul>
                                <ul class="tags">
                                  <?php $trip_detail = json_decode($itinerary->trip_detail);?>
                                  @foreach($trip_detail as $detail)
                                    <li>{{$detail}}</li>
                                  @endforeach
                                </ul>
                           </div>                    
                        </div>
                        @endforeach
                        
                    </div>
                  </div>
                  <div class="extra-section desc-box">
                    <h4 class="content-title"><i class='bx bxs-location-plus'></i> Location's</h4>
                    <div class="menu-part" id="locations">
                       <div class="info-locat">
                          <p>{{$tour_details->tour_locations}}</p>
                       </div>
                    </div>
                  </div> 
                  <div class="desc-box">
                      <h4 class="content-title"><i class='bx bx-street-view' ></i></i>Service inculde</h4>
                      <div class="menu-part" id="locations">
                        <div class="info-service">
                          <p>{{$tour_details->tour_services_includes}}</p>
                        </div>
                      </div>
                  </div>
                  <div class="desc-box">
                      <h4 class="content-title"><i class='bx bx-street-view' ></i></i>Service without include</h4>
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
                                            <div class="carousel-item @if($key == 0) active @endif"><img src="{{url('/')}}/public/uploads/tour_gallery/{{$gallery->image}}" class="w-100"
                                                alt=""></div>
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
                     <a href="{{url('/tourBooking')}}?id={{$tour_details->id}}" class="btn btn-rounded btn-sm book-btn">book this now</a>   
                </div>
              </div>
            </div>
             @php $vendor = DB::table('users')->join('vendor_profile', 'users.id', '=', 'vendor_profile.user_id')->where('users.id', $tour_details->vendor_id)->first(); @endphp 
            <div class="col-xl-4 col-lg-4 col-md-12">
               <div class="sticky-cls-top">
                  <div class="card-org overflow-hidden">
                    <div class="card-header">
                      <h3 class="card-title">Tour Operator Name</h3>
                    </div>
                     @php $vendor_counrty = DB::table('country')->where('id', $vendor->user_country)->first(); @endphp
                    <div class="card-body item-user">
                        <div class="profile-details">
                           <div class="profile-pic mb-0 mx-5"> <img src="{{url('/')}}/public/uploads/vendor_document/img/{{$vendor->tour_op_img}}" class="brround w-150 h-150" alt="user">
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
                         <!-- Tab panes --> 
                        <div class="tab-content"> 
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                               <div class="item-user details_cont">
                                  <h4 class="mb-4">Contact Info</h4>
                                  <div>
                                     <h6><span class="font-weight-semibold"><i class="bx bx-map"></i></span><a href="#" class="text-body"> {{$vendor->address}},{{$vendor->user_city}},{{$vendor->state_id}},{{$vendor_counrty->name}} </a></h6>
                                     <h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> {{$vendor->email}}</a></h6>
                                     <h6><span class="font-weight-semibold"><i class="bx bx-phone"></i></span>{{ $vendor->tour_op_contact_num }}</h6>
                                     <h6><span class="font-weight-semibold"><i class="bx bx-link"></i></span><a href="{{ $vendor->tour_op_web_add }}" class="text-secondary">{{ $vendor->tour_op_web_add }}</a></h6>
                                  </div>
                                  <div class="social-info-adv">
                                     <h4 class="mb-4">Social Info</h4>
                                     <a href="{{ $vendor->tour_op_facebook }}" target="_blank"><i class="bx bxl-facebook"></i></a>
                                     <a href="{{ $vendor->tour_op_instagram }}" target="_blank"><i class="bx bxl-instagram"></i></a>
                                     <a href="{{ $vendor->tour_op_youtube }}" target="_blank"><i class="bx bxl-youtube"></i></a>
                                     <a href="{{ $vendor->tour_op_tiktok }}"  target="_blank" class="tiktok">
                                        <img src="{{url('/')}}/resources/assets/img/tiktok.png" alt="user" width="15" ></a>   
                                  </div>
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
                         <div class="profile-pic mb-0 mx-5"> <img src="{{url('/')}}/public/uploads/vendor_document/img/{{$vendor->tour_op_img}}" class="brround w-150 h-150" alt="user">
                         </div>
                      </div>
                      <div class="text-center mt-2 details_cont">
                         <a href="#" class="text-dark text-center">
                            <h4 class="mt-0 mb-1 pro-name">{{$vendor->tour_op_name}}</h4>
                         </a>
                         <span class="text-muted mt-1"><strong>{{$vendor->tour_op_contact_name}}</strong></span>
                         <div class=" opr-cont">
                            <h6><span class="font-weight-semibold"><i class="bx bx-mail-send"></i></span><a href="#" class="text-body"> {{$vendor->tour_op_email}}</a></h6>
                         </div>
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
                          <li><i class='bx bxs-bank'></i> Bank Name: <strong>{{$vendor->tour_op_bank_name}}</strong></li>
                          <li><i class='bx bxs-user-account' ></i> Account Title: <strong>{{$vendor->tour_op_account_title}}</strong></li>
                          <li><i class='bx bx-credit-card-front'></i> Account Number: <strong>{{$vendor->tour_op_account_num}}</strong></li>
                          <li><i class='bx bx-building-house'></i> Branch: <strong>{{$vendor->tour_op_branch}}</strong></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-footer btns-combo">
                      <div class="note-info">
                        <p>Submit Advance by any Method & send screenshot through WhatsApp on this number <i class="bx bxl-whatsapp"></i> <strong class="whtapp-num"><a href="tel:{{$vendor->tour_op_booking_num}}">{{$vendor->tour_op_booking_num}}</a></strong></p>
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
                             <li><i class='bx bx-credit-card-front'></i> Name  <strong>{{$vendor->tour_op_easypaisa_name}}</strong></li>
                            <li><i class='bx bxs-bank'></i> Easypaisa: <strong>{{$vendor->tour_op_easypaisa_num}}</strong></li>
                            <li><i class='bx bxs-user-account' ></i> Jazz Cash: <strong>{{$vendor->tour_op_jazzcash_num}}</strong></li>
                            <li><i class='bx bx-building-house'></i> No: <strong> 4545457878</strong></li>
                         </ul>
                      </div>
                    </div>
                    <div class="card-footer btns-combo">
                      <div class="note-info">
                         <p>Submit Advance by any Method & send screenshot through WhatsApp on this number <i class="bx bxl-whatsapp"></i> <strong class="whtapp-num"><a href="tel:{{$vendor->tour_op_booking_num}}">{{$vendor->tour_op_booking_num}}</a></strong></p>
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
                           <h6 class="text-default font-weight-bold mt-1">{{$vendor->tour_op_booking_num}}</h6>
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