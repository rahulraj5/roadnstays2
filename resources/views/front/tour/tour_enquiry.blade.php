@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')
<script>
   $(".accordion-thumb").click(function() {
      // Close all open windows
      $(".hidden-menu").stop().slideUp(300);
      // Toggle this window open/close
      $(this).next(".hidden-menu").stop().slideToggle(300);
      //hitter test// 
      $(".hitter").show()
   });
   
   $(".hitter").click(function() {
      // Close all open windows
      $(".hidden-menu").stop().slideUp(300);
   });
</script>
<script>
   $(document).ready(function() {
   $('.minus1').click(function() {
     var $input = $(this).parent().find('input');
     var count = parseInt($input.val()) - 1;
     count = count < 1 ? 1 : count;
     $input.val(count);
     $("").val(count);
     $("").html(count + " ");
     $input.change();
     return false;
   });
   $('.plus1').click(function() {
     var $input = $(this).parent().find('input');
     $input.val(parseInt($input.val()) + 1);
     $("").val(parseInt($("").val()) + 1);
     var count = $("").val();
     $("").html(count.toString() + " ");
     $input.change();
     return false;
   });
   });

   $("#trip_with_us").validate({
      debug: false,
      rules: {
       name: {
           required: true,
       },
       email: {
         required: true,
         email:true,
       },
       phone: {
         required: true,
         number:true,
       },
       reason: {
           required: true
       },
       date:{
         required: true,
         date : true,
       },
       check: {
         required: true,
       },
       transport: {
         required: true,
       },
       departure: {
         required: true,
       },
       flex_date: {
         required: true,
       },
       type: {
         required: true,
       },
       location: {
         required: true,
       },
       message: {
         required: true,
       }
      },
      submitHandler: function (form) {
       var site_url = $("#baseUrl").val();
       // alert(site_url);
       var formData = $(form).serialize();

       $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });

       //alert(formData);die;
       $(form).ajaxSubmit({
         type: 'POST',
         url: site_url + '/submitMaketrip',
         data: formData,
         success: function (response) {
           if (response.status == 'success') {
             $("#trip_with_us")[0].reset();
             success_noti(response.msg);
           } else {
             error_noti(response.msg);
           }

         }
       });
      }
   });
</script>
@endsection
@section('content')
<main id="main" class="tour-details-page">
   <section class="tour-single-section pt-0" style="background-image: url('{{url('/')}}/resources/assets/img/tour3.jpg'); height: 200px;">
    <h1 class="boktrip-us"> Book your Trip with Us !</h1> 
   </section>
   <section class="info-tours">
      <div class="tour-title-section" style="position: inherit; background: inherit;">
         <div class="container ">
            <div class="row">
                  <div class="col-md-6 enquiry form" id="enquiry-form">
                     <form method="POST" id="trip_with_us">
                        <h1>Book your Trip with Us</h1>
                        <p>Please take a moment to get in touch, we will get back to you shortly.</p>
                        <div class="column">
                           <label for="1name">Your Name</label>
                           <input type="text" name="name" id="1name">
                           <label for="1email">Email Address</label>
                           <input type="email" name="email" id="1email">
                           <label for="1phone">Phone Number</label>
                           <input type="tel" name="phone" id="1phone">
                           <label for="Traveller">Travllers</label>
                           <ul class="count-traveller">
                              <li class="adult-count">
                                 <span>Adult</span>
                                 <div class="number">
                                    <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                                    <input type="text" name="adult" value="0" />
                                    <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                                 </div>
                              </li>
                              <li class="kids-count">
                                 <span>Child</span>
                                 <div class="number">
                                    <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                                    <input type="text" name="child" value="0" />
                                    <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                                 </div>
                              </li>
                              <li class="room-count">
                                 <span>Rooms</span>
                                 <div class="number">
                                    <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                                    <input type="text" name="rooms" value="0" />
                                    <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                                 </div>
                              </li>
                           </ul>
                           <label>Mattress Required:</label>
                           <div class="check-bo">
                              <div class="check-y"> <input type="radio" id="yes" onclick="show2();" name="check" value="Yes">
                                 <label for="yes">Yes</label><br>
                              </div>
                              <div class="check-n"><input type="radio" id="no" name="check" value="No" onclick="show1();">
                                 <label for="check">No</label><br>
                              </div>
                           </div>
                           <div class="matress-no" id="matress-number">
                              <span>Select Quantity</span>
                              <div class="number">
                                 <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                                 <input type="text" name="matress_number" value="0" />
                                 <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                              </div>
                           </div>
                           <label for="transport">Select Transport</label>
                           <select name="transport" id="transport">
                              <option value="">Choose one</option>
                              <option value="Bus">Bus</option>
                              <option value="Train">Train</option>
                              <option value="Suv Van">Suv Van</option>
                              <option value="Car">Car</option>
                              <option value="Mini">Mini Van</option>
                           </select>
                        </div>
                        <div class="date-loc">
                           <div class="Date-f">
                              <label for="date">Select Date</label>
                              <input type="date" name="date" id="">
                           </div>
                           <div class="location-f">
                              <label for="departure">Departure City</label>
                              <select name="departure" id="departure">
                                 <option value="">Choose One</option>
                                 <option value="Karachi">Karachi</option>
                                 <option value="Lahore">Lahore</option>
                                 <option value="Phaktoon">Phaktoon</option>
                                 <option value="Islamabad">Islamabad</option>
                                 <option value="paitlabad">paitlabad</option>
                              </select>
                           </div>
                        </div>
                        <div class="date-flex">
                           <div class="tour-days">
                              <label>Tour Duration</label>
                              <div class="number">
                                 <p class="minus1" data-quantity="minus1" data-field="quantity">-</p>
                                 <input type="text" name="duration" id="duration" value="0" />
                                 <p class="plus1" data-quantity="plus1" data-field="quantity">+</p>
                              </div>
                           </div>
                           <div class="flex-f">
                              <label for="flex_date">Flexible date</label>
                              <select name="flex_date" id="flex_date">
                                 <option value="">Choose One</option>
                                 <option value="5 days before">5 days before</option>
                                 <option value="2 days ago">2 days ago</option>
                                 <option value="2 days ago">after a week</option>
                                 <option value="not yet Decided">not yet Decided</option>
                                 <option value="Other">Other</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                        <div class="trip-type col-md-6 pl-1">
                           <label for="type">Trip Type</label>
                           <select name="type" id="type">
                              <option value="">Choose One</option>
                              <option value="Adventure">Adventure</option>
                              <option value="Sightseeing">Sightseeing</option>
                              <option value="Adventure + Sightseeing">Adventure + Sightseeing</option>
                              <option value="Honeymoon">Honeymoon</option>
                              <option value="School Trip">School Trip</option>
                              <option value="Corporate Trip">Corporate Trip</option>
                           </select>
                        </div>
                        <div class="trip-type trip-location col-md-6 pr-1 pl-0">
                           <label for="location">Location</label>
                           <select name="location" id="location">
                              <option value="">Choose One</option>
                              <option value="Shimla">Shimla</option>
                              <option value="Manali">Manali</option>
                              <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                              <option value="Laddhakh">Laddhakh</option>
                              <option value="Kerala">Kerala</option>
                              <option value="Madhya Pradesh">Madhya Pradesh</option>
                              <option value="Mandu">Mandu</option>
                           </select>
                        </div>
                      </div>
                        <div class="column">
                           <label for="message">Please share further details / Preferences?</label>
                           <textarea name="message" id="message"></textarea>
                           <input type="submit" value="Send Message">
                        </div>
                     </form>
                  </div>
                         <div class="col-md-6 trvnl-gn"> 
                         <img src="https://roadnstays.com/resources/assets/img/travel-items.png" alt="" class="">

                         </div>

              


            </div>
         </div>
      </div>
   </section>
</main>