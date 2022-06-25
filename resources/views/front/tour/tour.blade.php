@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')

<link href="https://votivelaravel.in/roadNstays/resources/assets/css/slick.min.css" rel="stylesheet">


@endsection



@section('current_page_js')

<script src="https://votivelaravel.in/roadNstays/resources/assets/js/slick.js"></script>


<script>
$(".slick1").slick({
	rows: 1,
	dots: false,
	arrows: false,
	infinite: true,
	speed: 300,
	slidesToShow: 5,
	slidesToScroll: 5,
	
	
	responsive: [
        {
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
	
	
	responsive: [
        {
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

$(document).ready(function() {
 
  $(".owl-carousel").owlCarousel({
 
      autoPlay: 3000,
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      loop:true,
      responsive: {
        600: {
          items: 3
        }
      }
       
 
  });
 
});
</script>

@endsection



@section('content')

<main id="main">
	
<section class="info-slides" style="padding-top: 50px; padding-bottom: 0px; background-color: #f6f6f6;">
	
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
		<div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://votivelaravel.in/roadNstays/resources/assets/img/1200x320-Family.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://votivelaravel.in/roadNstays/resources/assets/img/1200x320-August_new.webp" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://votivelaravel.in/roadNstays/resources/assets/img/1200x320-Goa_new.jpg" alt="Third slide">
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
    <div class="container" data-aos="fade-up">

      <div class="section-title t01">
					<h4>Popular Tours</h4>
					<span class="separator01"></span>	
				</div>

      <div class="row container-fluid">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="listing-tour">
            <div class="tour-body">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour5.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour2.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour3.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour4.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour6.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour8.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://www.spruko.com/demo/gowell/gowell/assets/images/categories/09.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
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
  
  <section class="best-sell card-design">
		
		<div class="container aos-init aos-animate" data-aos="fade-up">
				<div class="section-title t01">
					<h4>Best Selling Tours</h4>
					<span class="separator01"></span>
				</div>	
			<div class="slick-wrapper list-place">
				<div class="slick1">
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/8.jpg">
						</div>
						<div class="name-lists">
							<h3>South Africa</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/7.jpg">
						</div>
						<div class="name-lists">
							<h3>India</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/10.jpg">
						</div>
						<div class="name-lists">
							<h3>Europe</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/9.jpg">
						</div>
						<div class="name-lists">
							<h3>Australia</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/11.jpg">
						</div>
						<div class="name-lists">
							<h3>America</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/7.jpg">
						</div>
						<div class="name-lists">
							<h3>Spain</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/paris4.jpg">
						</div>
						<div class="name-lists">
							<h3>France</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/UAE.jpg">
						</div>
						<div class="name-lists">
							<h3>UAE</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/12.jpg">
						</div>
						<div class="name-lists">
							<h3>Japan</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					<div class="slide-item">
						<div class="image-lists">
							<img src="https://votivelaravel.in/roadNstays/resources/assets/img/7.jpg">
						</div>
						<div class="name-lists">
							<h3>Norway</h3>
							<h6>starting from $5000</h6>
						</div>
					</div>
					
				</div>
			</div>
       </div>
	
	</section>
	
	<section class="best-plc card-design">
		
		<div class="container aos-init aos-animate" data-aos="fade-up">
				<div class="section-title t01">
					<h4>Best For You</h4>
					<span class="separator01"></span>
				</div>	
				
				<div class="slick-wrapper list-place">
				<div class="slick_best_place">
					<div class="slide-item">
						<div class="item-card overflow-hidden mb-0">
                            <div class="item-card-desc">
								<div class="card-image-set text-center overflow-hidden mb-0">
									<div class="card-img"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/london1.jpg" alt="img" class="cover-image"> 
									</div>
									<div class="item-card-text text-left">
										<div class="mb-1 d-flex" id="rating-ability-wrapper">
                                                        <label class="control-label" for="rating">
                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                        </label>
                                                        <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                                                    </div>										
										<h4 class="mb-2">London</h4>
										<small class="text-white"><i class="bx bx-map"></i> 17 Cities <i class="ml-3 bx bx-world"></i></i> 24+ Tour Places </small>
									</div>
								</div>
                            </div>
                        </div>
					</div>
					
					<div class="slide-item">
						<div class="item-card overflow-hidden mb-0">
                            <div class="item-card-desc">
								<div class="card-image-set text-center overflow-hidden mb-0">
									<div class="card-img"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/germany1.jpg" alt="img" class="cover-image"> 
									</div>
									<div class="item-card-text text-left">
										<div class="mb-1 d-flex" id="rating-ability-wrapper">
                                                        <label class="control-label" for="rating">
                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                        </label>
                                                        <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                                                    </div>										
										<h4 class="mb-2">Germany</h4>
										<small class="text-white"><i class="bx bx-map"></i> 17 Cities <i class="ml-3 bx bx-world"></i></i> 24+ Tour Places </small>
									</div>
								</div>
                            </div>
                        </div>
					</div>
					<div class="slide-item">
						<div class="item-card overflow-hidden mb-0">
                            <div class="item-card-desc">
								<div class="card-image-set text-center overflow-hidden mb-0">
									<div class="card-img"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/austrelia1.jpg" alt="img" class="cover-image"> 
									</div>
									<div class="item-card-text text-left">
										<div class="mb-1 d-flex" id="rating-ability-wrapper">
                                                        <label class="control-label" for="rating">
                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                        </label>
                                                        <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                                                    </div>										
										<h4 class="mb-2">Australia</h4>
										<small class="text-white"><i class="bx bx-map"></i> 17 Cities <i class="ml-3 bx bx-world"></i></i> 24+ Tour Places </small>
									</div>
								</div>
                            </div>
                        </div>
					</div>
					<div class="slide-item">
						<div class="item-card overflow-hidden mb-0">
                            <div class="item-card-desc">
								<div class="card-image-set text-center overflow-hidden mb-0">
									<div class="card-img"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/canada1.jpg" alt="img" class="cover-image"> 
									</div>
									<div class="item-card-text text-left">
										<div class="mb-1 d-flex" id="rating-ability-wrapper">
                                                        <label class="control-label" for="rating">
                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                        </label>
                                                        <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                                                    </div>										
										<h4 class="mb-2">Canada</h4>
										<small class="text-white"><i class="bx bx-map"></i> 17 Cities <i class="ml-3 bx bx-world"></i></i> 24+ Tour Places </small>
									</div>
								</div>
                            </div>
                        </div>
					</div>
					<div class="slide-item">
						<div class="item-card overflow-hidden mb-0">
                            <div class="item-card-desc">
								<div class="card-image-set text-center overflow-hidden mb-0">
									<div class="card-img"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/germany1.jpg" alt="img" class="cover-image"> 
									</div>
									<div class="item-card-text text-left">
										<div class="mb-1 d-flex" id="rating-ability-wrapper">
                                                        <label class="control-label" for="rating">
                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                        </label>
                                                        <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class="bx bxs-star"></i></button>
                                                        <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class="bx bxs-star"></i></button>
                                                    </div>										
										<h4 class="mb-2">Germany</h4>
										<small class="text-white"><i class="bx bx-map"></i> 17 Cities <i class="ml-3 bx bx-world"></i></i> 24+ Tour Places </small>
									</div>
								</div>
                            </div>
                        </div>
					</div>
					
				</div>
			</div>
					
		</div>
		
		
	</section>
	
	<section id="" class="package-coming">
    <div class="container" data-aos="fade-up">

      <div class="section-title t01">
					<h4>Top Visited Destinations Tours</h4>
					<span class="separator01"></span>	
				</div>

      <div class="row container-fluid">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="listing-tour">
            <div class="tour-body">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour5.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour2.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour3.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour4.jpg" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour6.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://votivelaravel.in/roadNstays/resources/assets/img/tour8.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
                        </div>
                    </div>
					
					<div class="item">
                        <div class="card mb-0 item-card2-card">
                            <div class="item-card2-img">
                                <img src="https://www.spruko.com/demo/gowell/gowell/assets/images/categories/09.png" alt="img" class="cover-image" />
                            </div>
                            <div class="card-body mid-block">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            <a href="#" class="text-dark"><h4 class="font-weight-bold mb-1">Germany Beautiful Places</h4></a>
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
                                    <div class="d-flex mt-4 dtl-t01">
                                        <div class="btm-info">
                                            <p class="fs-14 mb-2 item-card2-desc"><i class="bx bx-calendar"></i> 12 Days,11 Nights</p>
                                            <p class="mb-1 item-card2-desc"><i class="bx bx-map"></i> Germany - 12 Places</p>
                                        </div>
                                        <div class="ml-auto price-box mt-0 border-left pl-5 text-center">
                                            <h4 class="mb-2">Price</h4>
                                            <h2 class="mb-0 font-weight-bold">$423</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="card-footer text-center" href="#"> <span class="d-block font-weight-semibold2">Book Now</span> </a>
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



@endsection