@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



@endsection



@section('current_page_js')


@endsection



@section('content')

<main id="main">



<div class="header-div-room">
          <p class="heading sc-sp-data-dis" data-scsp="data2"> Choose your room <a href="#" class="al-rom  float-right"> view all room </a></p>
          <div class="row ravelr-avilab mt-5">
            <div class="col-md-3 pr-0">
   <label>Check-in</label>
   <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date" min="2022-06-09"></div>
   
   <div class="col-md-3 pr-0">
    <label>Check-out</label>
   <input type="date" name="lastname" placeholder="Date" class="span3 form-control min_date" min="2022-06-09"></div>

   <div class="col-md-4 pr-0">
       <label>Travellers</label>
   <input type="text" name="lastname" placeholder="Travellers" class="span3 form-control min_date"></div>

   <div class="col-md-2">
     <label></label>
   <input type="submit" value="Check availability" class="btn btn-primary pull-right w-100"></div>

            </div></div>
            <div class="col-md-12">
              <section id="roombook" class="testimonials testnm pt-0">
    <div class="container">
    
<div class="row">
       

        <div class="col-md-4">
     
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/a95e3f62.jpg?impolicy=fcrop&amp;w=1200&amp;h=800&amp;p=1&amp;q=medium"></div>
              <h6>Twin/Double Room - 1 Bedroom - Classic</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                      <div class="extras-add">
                    <h5>Extras </h5>
                  <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now, 
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label>
                  </div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
               
             <!-- <small>Rs141,314 total</small> --></div>
            
                     </div>
                      <a href="#" data-toggle="modal" data-target="#squarespaceModal" class="resvi-botm">Reserve </a>

                      <!-- line modal -->

                     </div>
                       </div>

            </div></div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Deluxe Twin Room with 20% Discount on Food &amp; Soft Beverages &amp; Spa </h6>
               <div class="safty-yu">
                 <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
                   <label class="container-raio d-flex justify-content-between">
                   <div class="">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           </div>
            <div class="col-md-4">
         
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/4c5d3153.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Premier Room, 1 King Bed</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
              <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 7,035</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
        </div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/a95e3f62.jpg?impolicy=fcrop&amp;w=1200&amp;h=800&amp;p=1&amp;q=medium"></div>
              <h6>Twin/Double Room - 1 Bedroom - Classic</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                      <div class="extras-add">
                    <h5>Extras </h5>
                  <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now, 
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label>
                  </div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
               
             <!-- <small>Rs141,314 total</small> --></div>
            
                     </div>
                      <a href="#" data-toggle="modal" data-target="#squarespaceModal" class="resvi-botm">Reserve </a>

                      <!-- line modal -->

                     </div>
                       </div>

            </div>

           
         </div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Deluxe Twin Room with 20% Discount on Food &amp; Soft Beverages &amp; Spa </h6>
               <div class="safty-yu">
                 <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
                   <label class="container-raio d-flex justify-content-between">
                   <div class="">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
          </div>
     
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/4c5d3153.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Premier Room, 1 King Bed</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
              <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 7,035</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
       </div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/a95e3f62.jpg?impolicy=fcrop&amp;w=1200&amp;h=800&amp;p=1&amp;q=medium"></div>
              <h6>Twin/Double Room - 1 Bedroom - Classic</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                      <div class="extras-add">
                    <h5>Extras </h5>
                  <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now, 
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label>
                  </div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
               
             <!-- <small>Rs141,314 total</small> --></div>
            
                     </div>
                      <a href="#" data-toggle="modal" data-target="#squarespaceModal" class="resvi-botm">Reserve </a>

                      <!-- line modal -->

                     </div>
                       </div>

            </div>

           
         </div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Deluxe Twin Room with 20% Discount on Food &amp; Soft Beverages &amp; Spa </h6>
               <div class="safty-yu">
                 <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
                   <label class="container-raio d-flex justify-content-between">
                   <div class="">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 5,435</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
         </div>
            <div class="col-md-4">
             <div class="room-box">
              <div class="img-he">
           <img src="https://images.trvl-media.com/hotels/5000000/4170000/4161800/4161727/4c5d3153.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit"></div>
              <h6>Premier Room, 1 King Bed</h6>
               <div class="safty-yu">
                   <ul>
                      <li><i class="bx bx-area"></i> 280 sq ft</li>
                    <li><i class="bx bxs-group"></i> Sleeps 4</li>
                   <li><i class="bx bx-bed"></i> 1 King Bed</li> 
                    <li><i class="bx bx-wifi"></i> Free wifi </li> 
                     <li><i class="bx bxs-spray-can"></i> Cleaned with disinfectant</li>
                      </ul>
                       <div class="extras-add">
                    <h5>Extras </h5>
              <label class="container-raio d-flex justify-content-between">
                   <div class="bekfas">
                     Breakfast
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </div>
                    <div class="rgh">
                      Rs. 450/-
                    </div>
                    </label>
                    <label class="container-raio  d-flex justify-content-between">
                      <div class="bekfas">
                    Breakfast + Reserve now
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </div>
                      <div class="rgh">
                      Rs. 450/-
                    </div>

                    </label></div>
                      <div class="btn-rebn">
                       <div class="botm-rersurv">
                        <div class="try">
             <h6><i class="bx bx-rupee"></i> 7,035</h6>
            <!--  <small>Rs141,314 total</small> --></div>
             
                     </div>

                     
                      <a href="#" class="resvi-botm"> Reserve</a>
                     
                     </div>
                       </div>

            </div>

           
          </div>
        </div></div></div></div></div>
    </div>
  </section>

            </div>
            
        </div>


</main><!-- End #main -->



@endsection