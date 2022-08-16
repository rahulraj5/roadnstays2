@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection

@section('current_page_js')
<script type="text/javascript">
  $(document).ready(function() {

    $("#dt1").datepicker({
      dateFormat: "dd-M-yy",
      minDate: 0,
      onSelect: function() {
        var dt2 = $('#dt2');
        var startDate = $(this).datepicker('getDate');
        var minDate = $(this).datepicker('getDate');
        var dt2Date = dt2.datepicker('getDate');
        //difference in days. 86400 seconds in day, 1000 ms in second
        var dateDiff = (dt2Date - minDate) / (86400 * 1000);

        startDate.setDate(startDate.getDate() + 30);
        if (dt2Date == null || dateDiff < 0) {
          dt2.datepicker('setDate', minDate);
        } else if (dateDiff > 30) {
          dt2.datepicker('setDate', startDate);
        }
        //sets dt2 maxDate to the last day of 30 days window
        dt2.datepicker('option', 'maxDate', startDate);
        dt2.datepicker('option', 'minDate', minDate);
      }
    });
    $('#dt2').datepicker({
      dateFormat: "dd-M-yy",
      minDate: 0
    });
  });
</script>
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
        items: 2
      },
      1000: {
        items: 3
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
        items: 4
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
<script>
  $('.space-t .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 4
      },
      600: {
        items: 6
      },
      1000: {
        items: 10
      }
    }
  })
</script>

<script>
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(document).scrollTop() > 50) {

        $("#search-space-sec").addClass("newClass-1");
        $("#space-searc").addClass("space-st");
      } else {
        $("#search-space-sec").removeClass("newClass-1");
        $("#space-searc").removeClass("space-st");
      }
    });
  });
</script>

<script>
   var placeSearch, autocomplete;
   var componentForm = {
      // street_number: 'long_name',
      // route: 'long_name',
      // locality: 'long_name',
      // postal_code: 'short_name'
   };

   function initAutocomplete() {
      autocomplete = new google.maps.places.Autocomplete(
         (document.getElementById('autocomplete')), {
            types: ['(cities)']
         });
      autocomplete.addListener('place_changed', function() {
         var place = autocomplete.getPlace();
         console.log(place);
         document.getElementById('space_latitude').value = place.geometry.location.lat();
         document.getElementById('space_longitude').value = place.geometry.location.lng();
         fillInAddress(autocomplete, "");
      });
   }

   function fillInAddress(autocomplete, unique) {

      var place = autocomplete.getPlace();
      for (var component in componentForm) {
         if (!!document.getElementById(component + unique)) {
            document.getElementById(component + unique).value = '';
            document.getElementById(component + unique).disabled = false;
         }
      }

      for (var i = 0; i < place.address_components.length; i++) {
         var addressType = place.address_components[i].types[0];
         if (componentForm[addressType] && document.getElementById(addressType + unique)) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType + unique).value = val;
         }
      }
   }
   google.maps.event.addDomListener(window, "load", initAutocomplete);

   function geolocate() {
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
               lat: position.coords.latitude,
               lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
               center: geolocation,
               radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
         });
      }
   }
</script>

<script>
   $(function() {
      $('.space_dater').daterangepicker({
         opens: 'right'
      }, function(start, end, label) {
            $('#space_checkin_date').val(start.format('DD-MM-YYYY'));
            $('#space_checkout_date').val(end.format('DD-MM-YYYY'));
      });
   });
</script>

<script>
$(window).scroll(function(){
    if ($(this).scrollTop() >0) {
       $('#logo-s').addClass('logo-z');
       

    } else {
       $('#logo-s').removeClass('logo-z');
       
       
    }
});

</script>

<script>
  var today = new Date(); 

   $(function() {
       
      $('.reserved').daterangepicker({
        "autoApply": true,
        "autoUpdateInput": true,
        minDate: today,
        locale: {
            format: 'DD-MM-YYYY'
        },
        "opens": "center",
        "drops": "auto"
      }, function(start, end, label) {
          $('#space_checkin_date').val(start.format('DD-MM-YYYY'));
          $('#space_checkout_date').val(end.format('DD-MM-YYYY'));
      });
   });
</script>

<script>
   var placeSearch, autocomplete;
   var componentForm = {
      // street_number: 'long_name',
      // route: 'long_name',
      // locality: 'long_name',
      // postal_code: 'short_name'
   };

   function initAutocomplete() {
      autocomplete = new google.maps.places.Autocomplete(
         (document.getElementById('autocomplete_space')), {
            types: ['(cities)']
         });
      autocomplete.addListener('place_changed', function() {
         var place = autocomplete.getPlace();
         console.log(place);
         document.getElementById('space_latitude').value = place.geometry.location.lat();
         document.getElementById('space_longitude').value = place.geometry.location.lng();
         fillInAddress(autocomplete, "");
      });
   }

   function fillInAddress(autocomplete, unique) {

      var place = autocomplete.getPlace();
      for (var component in componentForm) {
         if (!!document.getElementById(component + unique)) {
            document.getElementById(component + unique).value = '';
            document.getElementById(component + unique).disabled = false;
         }
      }

      for (var i = 0; i < place.address_components.length; i++) {
         var addressType = place.address_components[i].types[0];
         if (componentForm[addressType] && document.getElementById(addressType + unique)) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType + unique).value = val;
         }
      }
   }
   google.maps.event.addDomListener(window, "load", initAutocomplete);

   function geolocate() {
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
               lat: position.coords.latitude,
               lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
               center: geolocation,
               radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
         });
      }
   }
</script>

@endsection

@section('content')
<main id="main" class="main-body" style="padding-top:77px;">

  <section id="space-sticky" class="space-car">
  
    <div class="container-fluid">
      <div class="space-t">
        <div class="owl-carousel owl-theme">

        @foreach($categories as $category)
          <div class="item">
            <div class="img-rid">
              <!-- <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/cabin.png" alt="" class="img-fluid"> -->
              <a href="{{url('/space-category-list')}}/{{base64_encode($category->scat_id)}}"><img src="{{url('public/uploads/space_images/cat_img/')}}/{{$category->space_cat_image}}" alt="" class="img-fluid"></a>
              
            </div>
            <h6>{{ $category->category_name }}</h6>
          </div>
        @endforeach  

          <!-- <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/cabin.png" alt="" class="img-fluid">
            </div>
            <h6>Cabin</h6>
          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/condos.png" alt="" class="img-fluid">
            </div>
            <h6>Condos</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/co-work.png" alt="" class="img-fluid">
            </div>
            <h6>Coworking space</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/cabin.png" alt="" class="img-fluid">
            </div>
            <h6>Dorm</h6>
          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/villa.png" alt="" class="img-fluid">
            </div>
            <h6>Etire Villa</h6>

          </div>

          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/house.png" alt="" class="img-fluid">
            </div>
            <h6>Entire Homes</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/private-room.png" alt="" class="img-fluid">
            </div>
            <h6>Private Room</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/apartments.png" alt="" class="img-fluid">
            </div>
            <h6>Entire apartement</h6>

          </div>

          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/portions.png" alt="" class="img-fluid">
            </div>
            <h6>Upper/Lower Portions</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/shared-room.png" alt="" class="img-fluid">
            </div>
            <h6>Shared Room</h6>

          </div>
          <div class="item">
            <div class="img-rid">
              <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/space/event.png" alt="" class="img-fluid">
            </div>
            <h6>Event Space</h6>

          </div> -->

        </div>


      </div>
    </div>
    </div>

    <div id="search-space-sec" class="space-type">
    
      <form method="GET" action="{{url('spaceList')}}">
        @csrf
        <div class="container">
        <div class="logo-s" id="logo-s"><a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ url('/') }}/resources/assets/img/road-logo-white.png" alt="" class="img-fluid"></a></div>
          <div id="space-searc" class="row space-searc">
            <div class="col-md-4 pr-0 h-space">
              <span class="span3 form-control-lo"><i class="bx bx-map"></i>
                <!-- <input type="location" name="location" placeholder="Destination" class="locatin-space"> -->
                <input type="location" name="space_location" placeholder="Location, City, Place" class="locatin-space" id="autocomplete_space" required="">
                <input type="hidden" name="space_latitude" id="space_latitude" value="22.7196">
                <input type="hidden" name="space_longitude" id="space_longitude" value="75.8577">
              </span>
            </div>
            
            <div class="col-md-3 pr-0 space_dater reserved">
              <input id="space_checkin_date" placeholder="Check in Date" class="s-siz" value="<?php echo date("d-M-y"); ?>" name="space_checkin_date">
              <!-- <input id="space_checkin_date" class="span3 min_dat minimum_date" value="<?php echo date("d-M-y"); ?>" name="space_checkin_date" placeholder="Choose a date"> -->
            </div>
            <div class="col-md-3 pr-0 space_dater reserved">
              <input id="space_checkout_date" placeholder="Check out Date" class="s-siz" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>" name="space_checkout_date">
              <!-- <input id="space_checkout_date" class="span3 min_dat minimum_date" min="" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>" name="space_checkout_date" placeholder="Choose a date"> -->
            </div>

            <!-- <span class="reservation1" id="reservation">
              <input id="space_checkin_date" class="span3 min_dat minimum_date" value="<?php echo date("d-M-y"); ?>" name="space_checkin_date" placeholder="Choose a date">
            </span>
            <span class="to-date"><i class="bx bx-transfer"></i></span>
            <span class="reservation2" id="reservation">
              <input id="space_checkout_date" class="span3 min_dat minimum_date" min="" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?>" name="space_checkout_date" placeholder="Choose a date">
            </span> -->

            <div class="col-md-2 pr-0 space-sbutton">
              <button><i class='bx bx-search'></i></button>
            </div>
          </div>
        </div>
      </form>

    </div>






  </section>


  <section class="space-sec">
    <div class="container-fluid">
      <div class="row filter-row space-filter">

        <div class="col-md-12">
          <section id="featured" class="testimonials space-testimonial">
            <div class="container-fluid" data-aos="">
              <div class=" trending-city">
                <h3>Top Famous Spaces</h3>
                <p class=""> These are the most recent properties added, with featured listed </p>
              </div>
              <div class="owl-carousel featured">

                @if (!empty($spaceList))

                @foreach($spaceList as $space)

                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="img-rid">
                      <a href="{{ url('/space-details') }}/{{ base64_encode($space->space_id) }}">
                        <img src="{{url('public/uploads/space_images/')}}/{{$space->image}}" class="testimonial-img" alt="" width="250px" height="160px">
                      </a>
                      <div class="wht-text-r text-t">
                        <h4> {{ $space->category_name }}</h4>
                      </div>
                    </div>
                    <div class="world-class-feature">
                      <a href="{{ url('/space-details') }}/{{ base64_encode($space->space_id) }}">
                        <h3> {{ $space->space_name }} </h3>
                      </a>
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
            <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/7g.jpg" alt="">
            <div class="view-text">
              <h5>View Spaces verified by Roadnstays</h5>
              <p>Verified on site for genuineness. Check out real photos of the property</p>
              <a href="#"><i class='bx bxs-right-arrow-alt'></i></a>
            </div>

          </div>

          <!-- <div class="quality-spaces">
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
          </div> -->
          <div class="segment-space">


            <h5> <img src="https://static.99acres.com/universalapp/img/proj_investment_v2.webp" alt="">View Spaces With Budget</h5>

            <div class="segment-owl">
              <div class="owl-carousel owl-theme">
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>
                        PKR 15000/ month</span>
                    </h5>
                    <p>400+ Properties</p>
                    <a href="#">See All</a>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Mid-Segment Space <span><br>- PKR 15000/ month</span></h5>
                    <p>400+ Properties</p>
                    <a href="#">See All</a>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br> PKR 50000/ month</span></h5>
                    <p>400+ Properties</p>
                    <a href="#">See All</a>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>PKR 100000/ month</span></h5>
                    <p>400+ Properties</p>
                    <a href="#">See All</a>
                  </div>
                </div>
                <div class="item box-item">
                  <div class="segment-text">
                    <h5>Affordable Space <span><br>PKR 150000/ month</span></h5>
                    <p>400+ Properties</p>
                    <a href="#">See All</a>
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
    <div class="container-fluid" data-aos="">
      <div class="trendwith-city">
        <p>Top Cities</p>
        <h5>Explore Spaces in Popular Cities</h5>
      </div>
      <div class="space-city">
        <div class="owl-carousel owl-theme">

          @foreach($space_country_wise as $space_country)
          <div class="item">
            <div class="testimonial-wrap">
              <div class="testimonial-ite">
                <div class="imgae-r">
                  <!-- <i class='bx bx-buildings'></i> -->
                  <!-- <a href="{{ url('/space-city-wise') }}"><img src="{{url('/')}}/public/uploads/space_images/{{$space_country->image}}" alt=""></a> -->
                  <a href="{{url('/space-city-wise')}}/{{base64_encode($space_country->space_country)}}" target="_blank"><img src="{{url('/')}}/public/uploads/space_images/{{$space_country->image}}" alt=""></a>
                </div>
                <h5> {{ ucfirst(strtolower(trans($space_country->country_name))) }} </h5>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>
  <section id="featured-blog" class="testimonials spaceblog-testimonial">
    <div class="container-fluid" data-aos="">
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