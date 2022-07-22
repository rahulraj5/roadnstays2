@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



@endsection






@section('content')

<main id="main" class="main-body">
  <section class="spaces-detail">
    <div class="container">
      <div class="row space-rw">
        <div class="col-md-12 space-dl">
          <h5 class="">Find Your Perfect Venue for any ocassion</h5>


        </div>
      </div>
    </div>

  </section>


  <section class="space-listsec">
    <div class="container">
      <div class="tabs">
        <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
        <label for="tab1" class="tabs__label"> <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/private-room.png" class="testimonial-img" alt=""> Private Room</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>

          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">


        </div>


        <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
        <label for="tab2" class="tabs__label"> <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/cabin.png" class="testimonial-img" alt="">cabin</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">

        </div>

        <input type="radio" class="tabs__radio" name="tabs-example" id="tab3">
        <label for="tab3" class="tabs__label"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/condo.png" class="testimonial-img" alt="">Condos</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>



        <input type="radio" class="tabs__radio" name="tabs-example" id="tab5">
        <label for="tab5" class="tabs__label"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/dorm.png" class="testimonial-img" alt="">Dorm</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>


        <input type="radio" class="tabs__radio" name="tabs-example" id="tab8">
        <label for="tab8" class="tabs__label"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/apartment.png" class="testimonial-img" alt="">Apartment</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>


        <input type="radio" class="tabs__radio" name="tabs-example" id="tab6">
        <label for="tab6" class="tabs__label"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/villa.png" class="testimonial-img" alt="">villa</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>


        <input type="radio" class="tabs__radio" name="tabs-example" id="tab7">
        <label for="tab7" class="tabs__label"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/house.png" class="testimonial-img" alt="">House</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>
          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>



        <input type="radio" class="tabs__radio" name="tabs-example" id="tab4">
        <label for="tab4" class="tabs__label"> <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/co-working.png" class="testimonial-img" alt="">Co-working</label>
        <div class="tabs__content">
          <div class="select-dropdown">
            <select>
              <option value="">Select Ocassion</option>
              <option value="Option 1">Wedding</option>
              <option value="Option 2">Engagement</option>
              <option value="Option 3">Reception</option>
              <option value="Option 4">Birthday Party</option>
              <option value="Option 5">Social Gathering</option>
              <option value="Option 6">Corporate Party</option>
              <option value="Option 7">Anniversary</option>
              <option value="Option 8">Cocktail Party</option>
              <option value="Option 9">Bachelor Party</option>
              <option value="Option 10">Kitty Party</option>
              <option value="Option 11">Pool Party</option>
              <option value="Option 12">Team Building</option>
              <option value="Option 13">Confrence</option>
              <option value="Option 14">Exhibition</option>
              <option value="Option 15">Meeting</option>
            </select>
          </div>

          <span class="space-span"><i class='bx bx-map'></i>
            <input type="location" name="location" placeholder="Destination, City, Locality, landmark...." class="locatin-fil"></span>
          <input type="submit" value="Find" class="btn btn-primary pull-right" style="background: #126c62; border:none;">
        </div>






      </div>
    </div>

  </section>
  <section class="space-sec">

    <div class="container-fluid">
      <div class="row filter-row space-filter">
        <div class="col-md-3">
          <h6>Filter- Space</h6>
          <div class="category category-1">
            <p>Private Space</p>
            <ul>
              <li><input type="checkbox" name="Wedding" id="">Wedding</li>
              <li><input type="checkbox" name="Wedding receptions" id="">Wedding receptions</li>
              <li><input type="checkbox" name="Birthday parties" id="">Birthday parties</li>
              <li><input type="checkbox" name="Festival gatherings" id="">Festival gatherings</li>
              <li><input type="checkbox" name="Business'" id="">Business'</li>
              <li><input type="checkbox" name="Schools" id="">Schools</li>
              <li><input type="checkbox" name="Manufacturers" id="">Manufacturers</li>
            </ul>
          </div>
          <div class="category category-8">
            <p>Range (in lacs)</p>
            <input type="range" name="range" id="">
            <label for="range">0</label>
          </div>

          <div class="category category-2">
            <p>CORPORATE</p>
            <ul>
              <li><input type="checkbox" name="Business dinners" id="">Business dinners</li>
              <li><input type="checkbox" name="Conferences" id="">Conferences</li>
              <li><input type="checkbox" name="Networking events" id="">Networking events</li>
              <li><input type="checkbox" name="Seminars" id="">Seminars</li>
              <li><input type="checkbox" name="Product launches" id="">Product launches</li>
              <li><input type="checkbox" name="Meetings" id="">Meetings</li>
              <li><input type="checkbox" name="Ensuring team building exercises" id="">Ensuring team building exercises</li>
              <li><input type="checkbox" name="Exhibitions and trade shows" id="">Exhibitions and trade shows</li>
            </ul>
          </div>

          <div class="category category-3">
            <p>CHARITY/FUNDRAISING</p>
            <ul>
              <li><input type="checkbox" name="Society balls" id="">Society balls</li>
              <li><input type="checkbox" name="Sports events" id="">Sports events</li>
              <li><input type="checkbox" name="Charitable auctions" id="">Charitable auctions</li>
              <li><input type="checkbox" name="Sponsored runs" id="">Sponsored runs</li>
              <li><input type="checkbox" name="Sponsored cycling" id="">Sponsored cycling</li>
              <li><input type="checkbox" name="Sponsored skydiving" id="">Sponsored skydiving</li>
              <li><input type="checkbox" name="Sponsored walks" id="">Sponsored walks</li>

            </ul>
          </div>

          <div class="category category-4">
            <p>Space For Kudo's</p>
            <ul>
              <li><input type="checkbox" name="Music events" id="">Music events</li>
              <li><input type="checkbox" name="Sporting events" id="">Sporting events</li>
              <li><input type="checkbox" name="Festivals" id="">Festivals</li>
            </ul>
          </div>
          <div class="category category-4">
            <p>Select Date</p>
            <input type="date" name="" id="" placeholder="select a date">

          </div>
          <div class="category category-5">
            <p>Event Venue</p>
            <ul>
              <li><input type="checkbox" name="" id="">Delhi</li>
              <li><input type="checkbox" name="" id="">islamabad</li>
              <li><input type="checkbox" name="" id="">Dubai</li>
              <li><input type="checkbox" name="" id="">Pakistan</li>
              <li><input type="checkbox" name="" id="">peshawar</li>
              <li><input type="checkbox" name="" id="">Karachi</li>
              <li><input type="checkbox" name="" id="">Lahore</li>
              <li><input type="checkbox" name="" id="">Mumbai</li>
              <li><input type="checkbox" name="" id="">New York</li>
              <li><input type="checkbox" name="" id="">Chicago</li>
            </ul>
          </div>
          <div class="category category-5">
            <p>Event Venue</p>
            <ul>
              <li><input type="checkbox" name="" id="">Owner</li>
              <li><input type="checkbox" name="" id="">vendor</li>

            </ul>
          </div>





        </div>
        <div class="col-md-9">
          <section id="featured" class="testimonials space-testimonial">
            <div class="container" data-aos="fade-up">
              <div class=" trending-city">
                <h3>Top Famous Spaces</h3>
                <p class=""> These are the most recent properties added, with featured listed </p>
              </div>
              <div class="owl-carousel featured">

                @if (!empty($spaceList))

                  @foreach($spaceList as $space)

                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <div class="imgae-rid">
                          <a href="{{ url('/space-details') }}/{{ base64_encode($space->space_id) }}">
                            <img src="{{url('public/uploads/space_images/')}}/{{$space->image}}" class="testimonial-img" alt="" width="250px" height="160px">
                          </a> 
                          <div class="wht-text-r text-t">
                            <h4> {{ $space->category_name }}</h4>
                          </div>
                        </div>
                        <div class="world-class-feature">

                          <a href="{{ url('/space-details') }}/{{ base64_encode($space->space_id) }}"><h3> {{ $space->space_name }} </h3></a>

                          <a href="" class="city-nam"><i class='bx bx-map'></i> {{ Str::limit($space->space_address, 20) }} </a>
                          <div class="city-nam"><i class='bx bx-home-alt'></i> {{ $space->city }}</div>
                        </div>
                      </div>
                    </div>

                  @endforeach  

                @endif  

              </div>



            </div>
          </section>
          <h5 class="curated-head">Curated Space collections <br> <span>In karachi</span></h5>
          <div class="curated-owl">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <div class="imgae-ri">
                  <img src="https://source.unsplash.com/random/?person" class="testimonial-img" alt="" height="300px">
                  <div class="text-t">
                    <h4>For Single Room</h4>
                    <p>300+ Spaces Listed</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="imgae-ri">
                  <img src="https://source.unsplash.com/random/?family" class="testimonial-img" alt="" height="300px">
                  <div class="text-t">
                    <h4>With Your Family</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="imgae-ri">
                  <img src="https://source.unsplash.com/random/?group, friends" class="testimonial-img" alt="" height="300px">
                  <div class="text-t">
                    <h4>Friends, Group</h4>
                    <p>10 best location for you!</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="imgae-ri">
                  <img src="https://source.unsplash.com/random/?travel, trip" class="testimonial-img" alt="" height="300px">
                  <div class="text-t">
                    <h4>Wedding Program</h4>
                    <p>Don't wait for the Location, We are here</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="imgae-ri">
                  <img src="https://source.unsplash.com/random/?couple" class="testimonial-img" alt="" height="300px">
                  <div class="text-t">
                    <h4>For Couple</h4>
                    <p>just book now</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="view-box">
            <img src="https://static.99acres.com/universalapp/img/d_hp_new_verified_prop_card.webp" alt="">
            <div class="view-text">
              <h5>View Spaces verified by Roadnstays</h5>
              <p>Verified on site for genuineness. Check out real photos of the property</p>
            </div>
            <a href="#"><i class='bx bxs-right-arrow-alt'></i></a>
          </div>
          <div class="quality-spaces">
            <h5 class="curated-head">List Space collections Type <br> <span>Choose your preferred furnishing</span></h5>
            <div class="q-space">
              <div class="img-dec">
                <img src="https://source.unsplash.com/random/?Bride, makeup" alt="">
                <h5>Facilation</h5>
              </div>
              <div class="img-dec">
                <img src="https://source.unsplash.com/random/?Room" alt="">
                <h5>Non-Facilation</h5>
              </div>
              <div class="img-dec">
                <img src="https://source.unsplash.com/random/?dj, event" alt="">
                <h5>Genie Services</h5>
              </div>
            </div>
          </div>
          <div class="segment-space">


            <h5> <img src="https://static.99acres.com/universalapp/img/proj_investment_v2.webp" alt="">View Spaces With Budget</h5>

            <div class="segment-owl">
              <div class="owl-carousel owl-theme">
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>
                        <<- PKR 15000/ month</span>
                    </h5>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Mid-Segment Space <span><br>->> PKR 15000/ month</span></h5>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>->> PKR 50000/ month</span></h5>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>->>PKR 100000/ month</span></h5>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>->>PKR 150000/ month</span></h5>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>



      </div>

    </div>
  </section>

  <section id="featured-city" class="testimonials spacecity-testimonial">
    <div class="container-fluid" data-aos="fade-up">
      <div class="trendwith-city">
        <p>Top Cities</p>
        <h5>Explore Spaces in Popular Cities</h5>
      </div>
      <div class="space-city">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bx-buildings'></i> -->
                  <img src="https://source.unsplash.com/random/?mumbai,india" alt="">
                </div>
                <h5> Mumbai </h5>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-buildings'></i> -->
                  <img src="https://source.unsplash.com/random/?indiagate, delhi" alt="">

                </div>


                <h5> Delhi </h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-city' ></i> -->
                  <img src="https://source.unsplash.com/random/?Tajmahal, Agra" alt="">

                </div>


                <h5> Agra</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?IT, bangalore" alt="">

                </div>


                <h5>bangalore</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?mosque,Karachi" alt="">

                </div>


                <h5>karachi</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?mosque,Lahore" alt="">
                </div>


                <h5>Lahore</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?mosque,god" alt="">

                </div>


                <h5>Islamabad</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?building, tower, newyork" alt="">

                </div>


                <h5>New york</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?london, england" alt="">

                </div>


                <h5>London</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?share, market" alt="">

                </div>


                <h5>chicago</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?South, food, catering" alt="">

                </div>
                <h5>chennai</h5>


              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bxs-business' ></i> -->
                  <img src="https://source.unsplash.com/random/?sea, mall, south" alt="">

                </div>


                <h5>vizag</h5>


              </div>
            </div>
          </div>
        </div>
      </div>




    </div>
  </section>


  <section id="featured-blog" class="testimonials spaceblog-testimonial">
    <div class="container-fluid" data-aos="fade-up">
      <div class="trend-blog">
        <h3 style="text-align: left;">Top Article on some spaces</h3>

      </div>
      <div class="owl-carousel featured">
        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?catering,haldi" class="testimonial-img" alt="" width="250px" height="250px">

            </div>
            <div class="world-class">

              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?Resort villa" class="testimonial-img" alt="" width="250px" height="250px">

            </div>
            <div class="world-class">
              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?yatch" class="testimonial-img" alt="" width="250px" height="250px">

            </div>
            <div class="world-class">

              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?hotel wedding" class="testimonial-img" alt="" width="250px" height="250px">
            </div>
            <div class="world-class">

              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?Wedding hall" class="testimonial-img" alt="" width="250px" height="250px">
            </div>
            <div class="world-class">

              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

        <div class="testimonial-wrap">
          <div class="testimonial-item">
            <div class="imgae">
              <img src="https://source.unsplash.com/random/?Beach" class="testimonial-img" alt="" width="250px" height="250px">

            </div>
            <div class="world-class">

              <h3> Top 5 affordable localities in Pune </h3>
              <a href="#" class="city-nam"><i class='bx bxs-user'></i> By shivendra, manager - roadnstays </a>
            </div>
          </div>
        </div>

      </div>



    </div>
  </section>






</main><!-- End #main -->


@endsection

@section('current_page_js')
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



<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {

    $(".btnrating").on('click', (function(e) {

      var previous_value = $("#selected_rating").val();

      var selected_value = $(this).attr("data-attr");
      $("#selected_rating").val(selected_value);

      $(".selected-rating").empty();
      $(".selected-rating").html(selected_value);

      for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-" + i).toggleClass('btn-warning');
        $("#rating-star-" + i).toggleClass('btn-default');
      }

      for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-" + ix).toggleClass('btn-warning');
        $("#rating-star-" + ix).toggleClass('btn-default');
      }

    }));


  });
</script>

<script>
  $('.curated-owl .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    }
  })
</script>
<script>
  $('.segment-owl .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  })
</script>

<script>
  $('.space-city .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 8
      }
    }
  })
</script>


@endsection