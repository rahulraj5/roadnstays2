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
                  <h5>Tour</h5>

               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/tour2.jpg" alt="Second slide">
               <div class="carousel-caption1  d-md-block">
                  <h5>Tour</h5>

               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/tour1.jpg" alt="Third slide">
               <div class="carousel-caption1  d-md-block">
                  <h5>Tour</h5>

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
      </div>
   </section>
   <section id="" class="tour-package">
      <div class="container" data-aos="">
         <div class="section-title t01">
            <h4>Tours Search List</h4>
            <span class="separator01"></span>
         </div>
         <div class="row container-fluid">
            <div class="col-lg-12 grid-margin stretch-card">
               <div class="listing-tour">
                  <div class="tour-body row">
                     
                     
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
                                       <?php $nights = $trip->tour_days - 1; ?>
                                       <div class="d-flex mt-4 dtl-t01">
                                          <div class="btm-info">
                                             <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> {{$trip->tour_days}} Days,{{$nights}} Nights</p>
                                             <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> {{ ucfirst(strtolower(trans($country_name->name))) }}</p>
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
                           </a>
                        </div>
                        @endforeach
                     
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