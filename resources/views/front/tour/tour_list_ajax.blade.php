<script src="https://roadnstays.com/resources/assets/vendor/jquery/jquery.min.js"></script>
<script src="https://roadnstays.com/resources/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script>
   $(document).ready(function() {

      $(".owl-carousel").owlCarousel({
         autoplay: true,
         autoplayTimeout: 3000,
         autoplayHoverPause: true,
         items: 3,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3],
         loop: true,
         responsive: {
            0: {
               items: 1
            },
            600: {
               items: 1
            },
            1000: {
               items: 3
            }
         }

      });

   });
</script>

@foreach($tour_data as $trip)
@php $country_name = DB::table('country')->where('id', $trip->country_id)->first(); @endphp
<div class="item col-md-4">
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
                  <div class="item-card2-rating mb-0 mt-1">
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
               </div>
            </div>
            <?php $nights = (int)$trip->tour_days - 1; ?>
            <div class="d-flex mt-4 dtl-t01">
               <div class="btm-info">
                  <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i>{{date('d M Y',strtotime($trip->tour_start_date))}} To {{date('d M Y', strtotime($trip->tour_end_date))}}</p>
                  <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-world"></i> {{$trip->tour_days}} Days,{{$nights}} Nights</p>
                  <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i>{{ ucfirst(strtolower(trans($trip->city))) }} {{ ucfirst(strtolower(trans($country_name->name))) }}</p>
               </div>
               <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                  <h4 class="mb-2">Price</h4>
                  <h2 class="mb-0 font-weight-bold">${{$trip->tour_price}}</h2>
               </div>
            </div>
         </div>
      </div>
      <a class="card-footer text-center" href="{{url('tour_details')}}/{{$trip->id}}"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
   </div>
</div>
@endforeach
                          


