<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">


@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->

@section('current_page_css')
@endsection
@section('current_page_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
   $(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true
    });
});
</script>


@endsection
@section('content')
<main id="main">
   <section  class="event-sec" >
      <div class="img-banner">
         <img src="{{url('/')}}/resources/assets/img/event2.jpg" alt="">
         <div class="bannner-text">
            <h1>Events</h1>
         </div>
      </div>
      <div class="container">
         <div class="row filter-row">
            <!-- <div class="col-md-3">
               <h6>Filter - Event Space</h6>
               <div class="category category-1">
                  <p>Private event</p>
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
                  <p>LIVE Events</p>
                  <ul>
                     <li><input type="checkbox" name="Music events" id="">Music events</li>
                     <li><input type="checkbox" name="Sporting events" id="">Sporting events</li>
                     <li><input type="checkbox" name="Festivals" id="">Festivals</li>
                  </ul>
               </div>
               <div class="category category-4">
                  <p>Date</p>
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
                  </ul>
               </div>
            </div> -->
            <div class="col-md-12">
               <h1>Recent events</h1>
               <div class="row event-box-1">
                @foreach($events_data as $event)
                  <div class="col-md-4 box">
                     <div class="img-box"><img src="{{url('/')}}//public/uploads/event_gallery/{{$event->image}}" alt=""><label class="add-fav">
                       <input type="checkbox" />
                       <i class="icon-heart"></i>
                     </label>
                     </div>
                     <div class="text">{{$event->title}}</div>
                     <div class="date-2"><i class='bx bxs-calendar'></i>{{$event->start_date}} - {{$event->end_date}}</div>
                     <div class="location"><i class='bx bx-location-plus' ></i>{{$event->address}}</div>
                     <div class="time"><i class='bx bx-stopwatch' ></i>{{$event->start_time}} - {{$event->end_time}}</div>
                     <?php if($event->type == 'paid'){ ?>
                     <a href="{{url('/event_details')}}/{{base64_encode($event->id)}}">Buy Ticket</a><?php }else{ ?>
                     <a href="{{url('/event_details')}}/{{base64_encode($event->id)}}">Free Ticket</a>
                     <?php } ?>
                  </div>
                @endforeach

               </div>
            </div>
           


         </div>
      </div>
   </section>

<section>
<div class="container">
  <div class="row">
   
    <div class="col-md-12 event-caro">
      <h1>Event Organised By RoadNstays</h1>
      <div id="news-slider" class="owl-carousel">
        @foreach($past_events_data as $past_event)
        <div class="post-slide">
          <div class="post-img">
            <img src="{{url('/')}}//public/uploads/event_gallery/{{$past_event->image}}" alt="">
            <a href="{{url('/event_details')}}/{{base64_encode($past_event->id)}}" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="{{url('/event_details')}}/{{base64_encode($past_event->id)}}">{{$past_event->title}}</a>
            </h3>
            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i><?php echo date( 'F j, Y', strtotime($past_event->start_date)); ?></span>
            <?php $address = (explode(",",$past_event->address)); ?>
            <span class="post-date"><i class='bx bx-location-plus' ></i>{{end($address)}}</span>
            </div>
            
          </div>
          <a href="{{url('/event_details')}}/{{base64_encode($past_event->id)}}" class="read-more">read more</a>
        </div>
        @endforeach
        <!-- <div class="post-slide">
          <div class="post-img">
            <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Lecture By Pablo.</a>
            </h3>

            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <span class="post-date"><i class='bx bx-location-plus' ></i>India</span>
            </div>
            
          </div>
          <a href="#" class="read-more">read more</a>
        </div>
        
        <div class="post-slide">
          <div class="post-img">
            <img src="https://images.unsplash.com/photo-1564979268369-42032c5ca998?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=500" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Meditation By Guruji</a>
            </h3>
            
            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <span class="post-date"><i class='bx bx-location-plus' ></i>India</span>
            </div>
            
          </div>
          <a href="#" class="read-more">read more</a>
        </div>
        
        <div class="post-slide">
          <div class="post-img">
            <img src="https://images.unsplash.com/photo-1576659531892-0f4991fca82b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Sports meet with dilip</a>
            </h3>
            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <span class="post-date"><i class='bx bx-location-plus' ></i>India</span>
            </div>
            
          </div>
          <a href="#" class="read-more">read more</a>
        </div>
        
        <div class="post-slide">
          <div class="post-img">
            <img src="https://images.unsplash.com/photo-1586083702768-190ae093d34d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=305&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=505" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Comedy nights with Munnavar</a>
            </h3>
           
            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <span class="post-date"><i class='bx bx-location-plus' ></i>India</span>
            </div>
            
          </div>
          <a href="#" class="read-more">read more</a>
        </div>

        <div class="post-slide">
          <div class="post-img">
            <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Kity Part for Ravi </a>
            </h3>
            
            <div class="sggsf">
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <span class="post-date"><i class='bx bx-location-plus' ></i>India</span>
            </div>
            
          </div>
          <a href="#" class="read-more">read more</a>
        </div> -->

      </div>
    </div>
  </div>
</div>


</section>

</main>
<!-- End #main -->
@endsection