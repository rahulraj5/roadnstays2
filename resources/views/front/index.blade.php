@extends('front.layout.layout') 
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
@endsection

@section('content')

    <!-- slider -->
    <section id="hero">
        <div id="" class=" carousel-fade">

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(resources/assets/img/road-banner.png)">
                    <div class="carousel-container">
                        <div class="container search-bar">
                            <div class="mt-3 mb-2">
                                <h2 class="animate__animated animate__fadeInDown">
                                    Make Your Trip Fun & Noted </h2>
                            </div>
                            <p class="animate__animated animate__fadeInUp mb-3">Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel..<a href="#" class="more-tag"> More </a>
                                <box-icon name='search'></box-icon>
                            </p>
                            <div class="card booking-slot">
                                <div class="card-header">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                                <div class="select-tab">
                                                    <img src="{{ asset('resources/assets/img/event.png')}}">
                                                    <span> Event</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                                <div class="select-tab">

                                                    <img src="{{ asset('resources/assets/img/hotel.png')}}">
                                                    Hotel
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
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="booking-type">
                                            <!-- <h6> make a Reservation</h6> -->
                                            <h4> Event</h4>

                                            <form>
                                                <input type="text" name="firstname" placeholder="Event name" class="span3 form-control">
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control"><span class="to-date"><i class='bx bx-transfer'></i></span>
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control">
                                                <span class="span3 form-control-lo"><i class='bx bx-map'></i>
                                                    <input type="location" name="location" placeholder="Destination" class="locatin-fil"></span>


                                                <input type="submit" value="Find" class="btn btn-primary pull-right">

                                            </form>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="booking-type">
                                            <h4> Hotel</h4>
                                            <form>
                                                <input type="text" name="firstname" placeholder="Hotel name" class="span3 form-control">
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control"><span class="to-date"><i class='bx bx-transfer'></i></span>
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control">
                                                <span class="span3 form-control-lo"><i class='bx bx-map'></i>
                                                    <input type="location" name="location" placeholder="Destination" class="locatin-fil"></span>

                                                <input type="submit" value="Find" class="btn btn-primary pull-right">

                                            </form>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages" role="tabpanel">
                                        <div class="booking-type">
                                            <h4> Tour</h4>
                                            <form>
                                                <input type="text" name="firstname" placeholder="Place name" class="span3 form-control">
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control"><span class="to-date"><i class='bx bx-transfer'></i></span>
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control">
                                                <span class="span3 form-control-lo"><i class='bx bx-map'></i>
                                                    <input type="location" name="location" placeholder="Destination" class="locatin-fil"></span>

                                                <input type="submit" value="Find" class="btn btn-primary pull-right">

                                            </form>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="booking-type">
                                            <h4> Space</h4>
                                            <form>
                                                <input type="text" name="firstname" placeholder="Space name" class="span3 form-control">
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control">
                                                <span class="to-date"><i class='bx bx-transfer'></i></span>
                                                <input type="date" name="lastname" placeholder="Date" class="span3 form-control">
                                                <span class="span3 form-control-lo"><i class='bx bx-map'></i>
                                                    <input type="location" name="location" placeholder="Destination" class="locatin-fil"></span>

                                                <input type="submit" value="Find" class="btn btn-primary pull-right">

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
                            best. </h2>

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
                                    Hotel </h3>

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
                                    Hotel </h3>
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
    <!-- End #main -->

@endsection