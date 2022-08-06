@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
<script>
  $('.scsecond-row .owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    autoPlay: 3000,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })
</script>
<script>
  $('.scmodal-row .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoPlay: 3000,
    responsive: {
      0: {
        items: 3
      },
      600: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  })
</script>

@endsection

@section('content')
<main id="main" class="main-body">
  <section class="sc-1">
    <div class="container-c">
      <div class="row scfirst-row">
        <div class="col-md-12 scfirst-col">
          <h4>Plan Your Special event with us. </h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, eum!</p>
          <i class='bx bxs-down-arrow-alt'></i>
        </div>
      </div>
    </div>
  </section>
  <section class="sc-2">

    <div class="container">
      <div class="row scthird-row">
        <div class="col-md-12 scthird-col">
          <h5>Hassle Free Planning & Booking at Our Guaranteed Best Prices.</h5>
          <ul>
            <li>10,000+ Events Organized till Date</li>
            <li>Present in 25+ Cities</li>
            <li>Over 20,000+ Venues & Vendors</li>
          </ul>
        </div>
      </div>

      <div class="row scrow-3">

        @if(!empty($space_data))
        @foreach($space_data as $space)

        <div class="col-md-3 col-sm-6 item">
          <div class="card item-card card-block">
            <img src="{{url('/')}}/public/uploads/space_images/{{$space->image}}" alt="Photo of sunset">
            <div class="text">
              <h6>{{$space->space_name}}, {{$space->city}}</h6>
              <p class="address-star"><span>-{{$space->space_address}}</span></p>
              <p><i class='bx bx-money'></i>From PKR {{$space->price_per_night}}</p>
              <p class="mb-3"><i class='bx bxs-group'></i>{{$space->guest_number}} Guests</p>
              <a href="{{ url('/space-details/') }}/{{ base64_encode($space->space_id) }}">Book Now</a>
            </div>
          </div>
        </div>
        @endforeach
        <div class="row gird-event"  id="filterdata">

            <div class="col-md-12">
                <div class="">{{ $space_data->links() }}</div>
            </div>
            
        </div>
        @else
        <p>Not Found</p>
        @endif

      </div>
    </div>
  </section>

  <section class="sc-3">
    <div class="container mt-2">
      <!--   <div class="card card-block mb-2">
            <h4 class="card-title">Card 1</h4>
            <p class="card-text">Welcom to bootstrap card styles</p>
            <a href="#" class="btn btn-primary">Submit</a>
          </div>   -->

      <h5 class="head-sc">Browse by Venue Categories</h5>
      <div class="row scsecond-row">
        <div class="owl-carousel owl-theme">
          @foreach($categories as $category)
          <!-- <a href="{{url('/space-category-list')}}/{{base64_encode($category->scat_id)}}" type="button" class="modal-up" data-toggle="modal" data-target="#exampleModalCenter"> -->
          <a href="{{url('/space-category-list')}}/{{base64_encode($category->scat_id)}}" type="button" class="modal-up">
            <div class="item"><img src="{{url('/')}}/public/uploads/space_images/cat_img/{{$category->space_cat_image}}" alt="">
              <p>{{ $category->category_name }}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>

    </div>

  </section>

</main>
<!-- End #main -->
<!-- MODAL AREA START -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content space-city-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #fff;">Please Select Your City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="control-group">
          <label for="select2-multiple" class="control-label" style="color: #fff;"></label>
          <select id="select2-multiple" class="form-control select2-single">
            <option>Select City</option>
            <optgroup label="Alaskan/Hawaiian Time Zone">
              <option value="AK">Alaska</option>
              <option value="HI">Hawaii</option>
            </optgroup>
            <optgroup label="Pacific Time Zone">
              <option value="CA">California</option>
              <option value="NV">Nevada</option>
              <option value="OR">Oregon</option>
              <option value="WA">Washington</option>
            </optgroup>
            <optgroup label="Mountain Time Zone">
              <option value="AZ">Arizona</option>
              <option value="CO">Colorado</option>
              <option value="ID">Idaho</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NM">New Mexico</option>
              <option value="ND">North Dakota</option>
              <option value="UT">Utah</option>
              <option value="WY">Wyoming</option>
            </optgroup>
            <optgroup label="Central Time Zone">
              <option value="AL">Alabama</option>
              <option value="AR">Arkansas</option>
              <option value="IL">Illinois</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="OK">Oklahoma</option>
              <option value="SD">South Dakota</option>
              <option value="TX">Texas</option>
              <option value="TN">Tennessee</option>
              <option value="WI">Wisconsin</option>
            </optgroup>
            <optgroup label="Eastern Time Zone">
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="IN">Indiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="OH">Ohio</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WV">West Virginia</option>
            </optgroup>
            <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
            <option value="TPZ">The Panic Zone</option>
            <option value="TTZ">The Twilight Zone</option>
          </select>
        </div>
        <section class="sc-4">

          <div class="container mt-2">
            <!--   <div class="card card-block mb-2">
                                        <h4 class="card-title">Card 1</h4>
                                        <p class="card-text">Welcom to bootstrap card styles</p>
                                        <a href="#" class="btn btn-primary">Submit</a>
                                      </div>   -->


            <h5 class="head-sc">Top Search City Picked for You.</h5>
            <div class="row scmodal-row">
              <div class="owl-carousel owl-theme">
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/party-halls.jpg" alt=""></a>
                  <p>Delhi</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/marriage-halls.jpg" alt=""></a>
                  <p>Pakistan</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/banquet-halls.jpg" alt=""></a>
                  <p>Allahabad</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/cocktail-venues.jpg" alt=""></a>
                  <p>bangalore</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/party-halls.jpg" alt=""></a>
                  <p>Mumbai</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/banquet-halls.jpg" alt=""></a>
                  <p>thailand</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/marriage-halls.jpg" alt=""></a>
                  <p>bangkok</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/banquet-halls.jpg" alt=""></a>
                  <p>London</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/party-halls.jpg" alt=""></a>
                  <p>Dubai</p>
                </div>
                <div class="item"><a href="{{ url('/space-category-list') }}"><img src="https://d3n56ro59bjwa6.cloudfront.net/img/venue-types/marriage-halls.jpg" alt=""></a>
                  <p>Lucknow</p>
                </div>

              </div>
            </div>

          </div>

        </section>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn" style="background-color:#126c62; color: #fff;">Proceed</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL AREA END -->


@endsection