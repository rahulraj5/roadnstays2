@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



@endsection



@section('current_page_js')


@endsection



@section('content')

<main id="main">
    <section  class="event-sec" >
    <h1>Lorem Test</h1>

<div class="container-fluid">
<div class="row filter-row">
    <div class="col-md-3">
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





    </div>
    <div class="col-md-9">
        <h1>Recent events</h1>
        <div class="row event-box-1">
        <div class="col-md-4 box">
            <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h1.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart" ></i>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2"><i class="fa-solid fa-calendar"></i>08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
            
            <div class="time">08:00am - 11:00am</div>
            <button>Buy Ticket</button>
            
        </div>
        <div class="col-md-4 box">
           <div class="img-box"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/h2.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart"></i>
        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2">08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
           
            <div class="time">08:00am - 11:00am</div>
            <button>free</button>
            
        </div>
        <div class="col-md-4 box">
            
            <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/confrance.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart"></i>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2">08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
            
            <div class="time">08:00am - 11:00am</div>
            <button>free</button>
            
       </div>
      
       <div class="row event-box-1">

       <div class="col-md-4 box">
            
            <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h3.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart"></i>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2">08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
          
            <div class="time">08:00am - 11:00am</div>
            <button>Buy Ticket</button>
            
        </div>
        <div class="col-md-4 box">
           
            <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h4.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart"></i>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2">08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
            
            <div class="time">08:00am - 11:00am</div>
            <button>free</button>
            
        </div>
        <div class="col-md-4 box">
           
            <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h5.jpg" alt=""></div>
            <i class='bx bx-heart'  id="heart"></i>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
            <div class="date-2">08 May 2022 - 22 september 2022</div>
            <div class="location">NEW DELHI</div>
            
            <div class="time">08:00am - 11:00am</div>
            <button>Buy Ticket</button>
           
        </div>
       </div>
        

       <h1>Wedding</h1>

        <div class="row event-box-1">
        <div class="col-md-4 box">
           
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h6.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           <div class="time">08:00am - 11:00am</div>
           <button>Buy Ticket</button>
           
       </div>
       <div class="col-md-4 box">
          
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h7.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>free</button>
           
       </div>
       <div class="col-md-4 box">
          
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h8.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>Buy Ticket</button>
          
       </div>
        </div>

        <h1>Business Conclave</h1>
        <div class="row event-box-1">
        <div class="col-md-4 box">
           
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/art.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           <div class="time">08:00am - 11:00am</div>
           <button>free</button>
           
       </div>
       <div class="col-md-4 box">
          
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h9.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>Buy Ticket</button>
           
       </div>
       <div class="col-md-4 box">
          
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h10.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>free</button>
          
       </div>
        </div>

        <h1>Live Concert</h1>
        <div class="row event-box-1">
        <div class="col-md-4 box">
           
          <div class="img-box"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/a1.png" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           <div class="time">08:00am - 11:00am</div>
           <button>free</button>
           
       </div>
       <div class="col-md-4 box">
          
          <div class="img-box"> <img src="https://votivelaravel.in/roadNstays/resources/assets/img/h1.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>free</button>
           
       </div>
       <div class="col-md-4 box">
          
           <div class="img-box"><img src="https://votivelaravel.in/roadNstays/resources/assets/img/h3.jpg" alt=""></div>
           <i class='bx bx-heart'  id="heart"></i>
           <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
           <div class="date-2">08 May 2022 - 22 september 2022</div>
           <div class="location">NEW DELHI</div>
           
           <div class="time">08:00am - 11:00am</div>
           <button>Buy Ticket</button>
          
       </div>
        </div>
        
        </div>
</div>



</div>

</div>

    </section>



</main><!-- End #main -->



@endsection