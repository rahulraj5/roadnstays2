@extends('front.layout.layout') 
<!-- @section('title', 'User - Profile') --> 
@section('current_page_css') 
@endsection 
@section('current_page_js') 
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
  (function() {
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "<?php echo date('m/d/', strtotime($event_data->start_date)); ?>",
      birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
      birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(birthday).getTime(),
      x = setInterval(function() {

        const now = new Date().getTime(),
          distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "Event Start!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
</script>

<script>
  $('.sponser-block .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,

    autoplay: true,
    smartSpeed: 5000,
    autoplayTimeout: 8000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 5
      }
    }
  })
</script> 
<script>
  $('.hotel-addon .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,

    autoplay: true,
    smartSpeed: 5000,
    autoplayTimeout: 8000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 5
      }
    }
  })

  $('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
  })
  $('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
  })
</script>

<script>
  $('.space-addonslider .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    autoplay: true,
    smartSpeed: 5000,
    autoplayTimeout: 8000,
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

  $('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
  })
  $('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
  })
</script> 
@endsection
 
@section('content')

<main id="main">
  <section class="event-detail">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false"> 
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{url('/')}}/public/uploads/event_gallery/{{$event_data->image}}" class="d-block w-100" alt="...">
          <div class="carousel-caption  d-md-block">
            <h5>{{$event_data->title}}</h5>
            <div class="text">
              <p><i class='bx bx-building'></i>{{$event_data->address}}</p>
              <p><i class='bx bxs-calendar'></i>{{$event_data->start_date}} - {{$event_data->end_date}}</p>
            </div> 
            <?php if ($event_data->type == 'paid') {?>
              <a style="padding: 6px 20px;background: #609f23;color: #fff; border: none;margin-top: 20px;font-size: 20px;font-weight: 500;border-radius: 5px;" href="{{url('/eventBooking')}}/{{base64_encode($event_data->id)}}">Get Ticket</a>
          <?php }else{?>
              <a style="padding: 6px 20px;background: #609f23;color: #fff; border: none;margin-top: 20px;font-size: 20px;font-weight: 500;border-radius: 5px;" href="#">Free Ticket</a>
          <?php } ?>
          </div>
        </div> 
      </div>
    </div> 
    </div>
  </section>

  <section class="price-tag about-tag">
    <div class="container">
      <div class="row event-dt">
        <div class="col-md-4 detail">
          <i class='bx bxs-calendar'></i>
          <div class="text">
            <p>Event date</p>
            <h5>{{$event_data->start_date}} - {{$event_data->end_date}}</h5>
          </div> 
        </div>
        <div class="col-md-4 detail">

          <i class='bx bx-location-plus'></i>
          <div class="tag-1">
            <p>Event location</p>
            <h5>{{$event_data->address}}</h5>

          </div>
        </div>
        <div class="col-md-4 detail">
          <i class='bx bxs-stopwatch'></i>
          <div class="dl">
            <p>Event Time</p>
            <h5> {{$event_data->start_time}} ~ {{$event_data->end_time}}</h5>
          </div> 
        </div>
        <!-- <div class="col-md-3 ticket-btn">
          <p>$65/person</p>
          <button>Buy Tickets</button>
  
        </div> --> 
      </div> 
    </div>
    </div>
  </section>
 
  <section class="detail-about"> 
    <div class="container">
      <div class="row about-content">
        <div class="col-md-6">
          <div class="text-about">
          <h5>Event Overview</h5>
          <p>{{$event_data->description}}</p>

          <h5>Overview</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
          <button>Book Ticket</button>
        </div>
      </div>
        <div class="col-md-6 text-about">
          <img src="https://votivetechnologies.in/roadNstays/resources/assets/img/12.jpg" class="" alt="...">
          <div class="container-1">
            <h5 id="headline">Countdown to event start</h5>
            <div id="countdown">
              <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
              </ul>
            </div> 
          </div> 
        </div> 
      </div>      
    </div>
  </section>

<!--   <section class="blog_section Sponser-section">
    <div class="container">
      <div class="row blog_content sponser-block">
        <div class="col-md-12">
          <h5>Our Sponser</h5>
          <div class="owl-carousel owl-theme">
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_08.jpg" alt="images not found">


              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_09.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_10.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_11.jpg" alt="images not found">

              </div>
            </div>

            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_12.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_08.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_09.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_10.jpg" alt="images not found">

              </div>
            </div>
            <div class="blog_item">
              <div class="blog_image">
                <img class="img-fluid" src="http://labartisan.net/demo/big-event/images/sponsors/sponsor_11.jpg" alt="images not found">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
 
  <section class="section-ptb bg-white bg-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <div class="heading">
            <h4>Our Speaker</h4>
            <p class="">Looked up one of the more obscure Latin words, consectetur, from <br class="d-none d-md-block"> a Lorem Ipsum passage, and going</p>
            <hr class="line bw-2 mx-auto line-sm mb-2">
            <hr class="line bw-2 mx-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="client-testimonial position-relative">
            <div class="client-nav">
              <ul class="nav nav-tabs">

                <li class="nav-item">
                  <a class="nav-link" href="#client2" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/2.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client3" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/3.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client4" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/4.png" alt="Client Image">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#client5" data-toggle="tab">
                    <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/5.png" alt="Client Image">
                  </a>
                </li>
              </ul>
            </div>
            <div class="row text-center">
              <div class="col-10 col-md-8 col-lg-6 mx-auto">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="client1">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/1.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-2">Evelyn Riley</h4>
                        <h6>Hade Of Idea</h6>
                        <p>Richard McClintock, a Latin professor at Hampden <br class="d-none d-lg-block">College in
                          Virginia, looked up one of the more obscure Latin words</p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="client2">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/2.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-2">Ethan Green</h4>
                        <h6>Photograper</h6>
                        <p>Many desktop publishing packages and web page editors <br class="d-none d-lg-block"> now
                          use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'</p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="client3">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/3.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-2">Marie Soto</h4>
                        <h6>Designer</h6>
                        <p>Virginia, looked up one of the more obscure Latin <br class="d-none d-lg-block"> words,
                          consectetur, from a Lorem Ipsum passage, and going through the cites of looked</p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="client4">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/4.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-2">Willie Munoz</h4>
                        <h6>Content Writer</h6>
                        <p>Words which don't look even slightly believable. <br class="d-none d-lg-block">If you are
                          going to use a passage of Lorem Ipsum, you need to be sure there isn't anything</p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="client5">
                    <div class="client-thumb mx-auto mb-25">
                      <img class="drop-shadow" src="http://regaltheme.com/tf/multi/rnr/assets/img/client/thumb/5.png" alt="Client Image">
                    </div>
                    <div class="client-desc bg-white d-flex align-items-center">
                      <div class="text mx-auto">
                        <h4 class="mb-2">Susan Gardner</h4>
                        <h6>Manager</h6>
                        <p>The point of using Lorem Ipsum is that it has a more <br class="d-none d-lg-block">
                          normal
                          distribution of letters, as opposed to using 'Content here, content here point of using
                        </p>
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

  <section class="event-gallery">
    <div class="container gallery-container">

      <h5 class="text-center">Event Gallery</h5>

      <p class="page-description text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

      <div class="tz-gallery">

        <div class="row">

          @foreach($event_gallery as $gallery)
          <div class="col-sm-12 col-md-4">

            <img src="{{url('public/uploads/event_gallery')}}/{{$gallery->image}}" alt="Bridge">

          </div>
          @endforeach 

        </div>

      </div>

    </div>
  </section>

  <section class="hotel-addon">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Top listed Hotel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Luxury Hotels in your city</a>
            </li> 
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="owl-carousel owl-theme">

                @php $hotel_id = json_decode($event_data->hotel_ids) @endphp
                @foreach($hotel_id as $hotelid)

                @php $hotel_data = DB::table('hotels')->where('hotel_id', $hotelid)->first() @endphp 

                @if(!empty($hotel_data))
                <div class="item"><a href="{{url('/hotelDetails')}}?hotel_id={{base64_encode($hotel_data->hotel_id)}}&check_in={{base64_encode($event_data->start_date)}}&check_out={{base64_encode($event_data->end_date)}}"><img src="{{url('/')}}/public/uploads/hotel_gallery/{{$hotel_data->hotel_gallery}}" alt="">
                  <p>{{ $hotel_data->hotel_name }}</p></a>
                </div>
                @endif
                @endforeach 
              </div>
            </div> 
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="owl-carousel owl-theme"> 
                @php $hotel_id = json_decode($event_data->hotel_ids) @endphp
                @foreach($hotel_id as $hotelid)

                  @php $hotel_data = DB::table('hotels')->where('hotel_id', $hotelid)->first() @endphp  
                    @if(!empty($hotel_data))
                    <div class="item"><a href="{{url('/hotelDetails')}}?hotel_id={{base64_encode($hotel_data->hotel_id)}}&check_in={{base64_encode($event_data->start_date)}}&check_out={{base64_encode($event_data->end_date)}}"><img src="{{url('/')}}/public/uploads/hotel_gallery/{{$hotel_data->hotel_gallery}}" alt=""><p>{{ $hotel_data->hotel_rating }} Star Hotel</p></a>
                    </div>
                    @endif
                @endforeach
              </div>
            </div> 
          </div> 
        </div> 
      </div>
    </div> 
  </section> 

  <section class="space-addon">
    <div class="container">
      <div class="row">
        <div class="col-md-4 space-addontext">
          <p>For You!</p>
          <h3>Top Space Selection Near your Location</h3>
          <p>Explore by luxury space, super villa, and Many more...</p>
          <button>See More</button> 
        </div>
        <div class="col-md-8 space-addonslider">
          <div class="owl-carousel owl-theme">
            @php $space_id = json_decode($event_data->space_ids) @endphp
            @foreach($space_id as $spaceid)

              @php $space_data = DB::table('space')->where('space_id', $spaceid)->first() @endphp

                @if(!empty($space_data))
                <div class="item">
                  <a href="{{ url('/space-details') }}/{{ base64_encode($space_data->space_id) }}"><img src="{{url('/')}}/public/uploads/space_images/{{$space_data->image}}" alt="">
                  <div class="addn-text">
                    <h5>{{ $space_data->space_name }}</h5>
                    <p>{{ $space_data->description }}</p>
                  </div>
                  </a>
                </div>
                @endif 
            @endforeach 
          </div> 
        </div> 
      </div>
    </div>
  </section> 

</main><!-- End #main -->
 
@endsection