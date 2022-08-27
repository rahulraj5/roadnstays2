@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
@endsection
@section('current_page_js')
@endsection
@section('content')
<main id="main">
   <section style="padding-top: 80px; background-color: #f6f6f6;">
      <div class="container">
      <div class="row">
         <div class="col-md-12 rew-heding">
            <h3>Review your Hotel Room Booking</h3>
         </div>
         <div class="col-md-9">
            <form id="member-registration" method="post" class="form-validate form-horizontal well" action="{{url('/bookingRoomOrder')}}">
            @csrf
            <?php $total_amount =  ($total_room_num*($booking_days*$room_data->price_per_night))+$total_room_num*($room_data->cleaning_fee)+$total_room_num*($room_data->city_fee)+$total_room_num*($room_data->tax_percentage); ?>

            <input type="hidden" name="user_id" value="{{Auth::check()}}">
            <input type="hidden" name="hotel_id" value="{{$hotel_data->hotel_id}}">
            <input type="hidden" name="room_id" value="{{$room_data->id}}">
            <input type="hidden" name="check_in" value="{!! date('Y-m-d', strtotime($check_in)) !!}">
            <input type="hidden" name="check_out" value="{!! date('Y-m-d', strtotime($check_out)) !!}">
            <input type="hidden" name="cleaning_fee" value="{{$room_data->cleaning_fee}}">
            <input type="hidden" name="city_fee" value="{{$room_data->city_fee}}">
            <input type="hidden" name="tax_percentage" value="{{$room_data->tax_percentage}}">
            <input type="hidden" name="total_days" value="{{$booking_days}}">
            <input type="hidden" name="total_room" value="{{ $total_room_num }}">
            <input type="hidden" name="total_member" value="{{ $person }}">
            <input type="hidden" name="total_amount" value="{{$total_amount}}">
            <div class="infobox">
               <div class="revie-box">
                  <div class="page-detail">
                     <h5 class="p-0 m-0 citi-omr">{{$hotel_data->hotel_name}}</h5>
                     <span>@if($hotel_data->hotel_rating == 5)★★★★★@elseif($hotel_data->hotel_rating == 4)★★★★@elseif($hotel_data->hotel_rating == 3)★★★@elseif($hotel_data->hotel_rating ==2)★★@else★@endif</span>
                     <p> {{$hotel_data->hotel_address}}, {{$hotel_data->hotel_city}}, {{$hotel_data->nicename}}</p>
                  </div>
                  <div class="page-detail-sid">
                     <img class="rtnb" src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel_data->hotel_gallery}}" alt="Another alt text" style="width: 100px;">
                  </div>
               </div>
               <div class="runs-andpay">
                  <div class="date1">
                     <span>CHECK IN</span>
                     <h3>{{$check_in}}</h3>
                     <small>{{$start_day}}</small>
                  </div>
                  <div class="date3">
                     <small>{{$booking_days}} Night</small><br>
                     <i class='bx bx-transfer-alt'></i>
                  </div>
                  <div class="date1">
                     <span>CHECK OUT</span>
                     <h3> {{$check_out}}</h3>
                     <small>{{$end_day}}</small>
                  </div>
                  <div class="date2">
                     <!-- <h6>	2 Adults | 1 Room</h6> -->
                     <h6>	{{$person}} Person | {{$total_room_num}} Room</h6>
                  </div>
               </div>
               <div class="room-praci">
                  <h5>{{$room_data->name}} ({{$room_data->room_type}})<br><small>{{$person}} Person</small></h5>
                  <div class="">
                     <h5 class="mt-3">Price Includes </h5>
                     <ul>
                        <li>No meals included</li>
                        <?php if($room_data->breakfast_availability == 1){
                              if ($room_data->breakfast_price_inclusion == 0) {?>
                                 <li>Breakfast included</li>
                        <?php  }else{
                              echo '<li>No Breakfast included</li>';
                           }
                        }else{
                          echo '<li>Not Available Breakfast</li>';
                        } ?>
                        <li>Non-Refundable | On Cancellation, You will not get any refund </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                  <div class="col-md-12 p-0 mt-3">
                     <div class="bankpay">
                        <h4 class="mt-2">
                           <i class='bx bxs-user-badge'></i><b> Room {{$total_room_num}}:</b> {{$person}} Person {{$room_data->bed_type}}
                        </h4>
                        <ul class="brekfasr">
                           @foreach($room_amenities as $amenities)
                           <li><i class='bx bx-check'></i>{{$amenities->amenity_name}}</li>
                           <!-- <li><i class='bx bx-check'></i> Free parking</li>
                           <li><i class='bx bx-check'></i> Free WiFi </li> -->
                           @endforeach
                        </ul>
                        <div class="bank-bar">
                          
                              <fieldset>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email*</label>
                                    <input type="text" class="form-control" id="email" name="email" required="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="first_name">First name*</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="last_name">Last name*</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="mobile">Mobile phone number *</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" required="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="terms">	<input type="checkbox" name="terms" value="1">
                                    Remember this card for future use</label>
                                 </div>
                              </fieldset>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row" style="margin-left: -15px;  margin-right: -15px;">
                  <div class="col-md-12 p-0 mt-3">
                     <div class="bankpay">
                        <h5 class="mt-2">
                           <i class='bx bxs-info-circle'></i> We protect your personal information
                        </h5>
                        <div class="bank-bar">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#home">Debit/Credit Card</a>
                              </li>
                              <!-- <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#menu1">NetBanking</a>
                              </li> -->
                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content">
                              <div id="home" class="container tab-pane active">
                                 <br>
                                 <img src="{{url('resources/assets/img/banke.png')}}" class="mb-3 " style="">
                                 <!-- <form id="member-registration" method="post" class="form-validate form-horizontal well" > -->    
                                 <!-- <fieldset>
                                       <div class="form-group">
                                          <label for="exampleInputPassword1">Name on Card*</label>
                                          <input type="text" class="form-control" id="exampleInputPassword1">
                                       </div>
                                       <div class="form-group">
                                          <label for="exampleInputPassword1">Debit/Credit card number*</label>
                                          <input type="text" class="form-control" id="exampleInputPassword1">
                                       </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Expiry date</label>
                                          <div class="d-flex">
                                             <select class="form-control col-md-2 mr-2">
                                                <optgroup>
                                                   <option value="volvo">Month</option>
                                                   <option value="saab">01-jan</option>
                                                   <option value="saab">02-jan</option>
                                                </optgroup>
                                             </select>
                                             <select class="form-control col-md-2">
                                                <optgroup>
                                                   <option value="volvo">Year</option>
                                                   <option value="saab">01-jan</option>
                                                   <option value="saab">02-jan</option>
                                                </optgroup>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-3 pl-0">
                                          <label for="exampleInputEmail1">Security code</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1">
                                       </div>
                                       <div class="form-group">
                                          <label for="exampleInputPassword1">Billing country/territory*</label>
                                          <select class="form-control col-md-6">
                                             <optgroup>
                                                <option value="volvo">India</option>
                                                <option value="saab">Pakistan</option>
                                                <option value="saab">Iceland</option>
                                             </optgroup>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-6 p-0">
                                          <label for="exampleInputPassword1">PAN*</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1">
                                       </div>
                                       <label for="vehicle1">	<input type="checkbox" name="vehicle1" value="Bike">
                                       Remember this card for future use</label>
                                 </fieldset> -->
                                
                              </div>
                              <div id="menu1" class="tab-pane fade bankinfo">
                                 <h3 class="mt-3">Important information about your booking</h3>
                                 <p>Important: You will be redirected to your bank's website to securely complete your payment. You will have 30 minutes to pay for your booking.</p>
                                 <!-- <a href="#" class="paynow-btn">Continue To Your Bank </a> -->
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 text-center d-flex p-4">
                           <input type="submit" name="paynow" class="paynow-btn" value="Paynow">
                           <!-- <a href="#" class="paynow-btn">Paynow </a> -->
                        </div>
                         </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 pl-0">
            <div class="revie-box-boxi">
               <div class="image-section">
                  <img src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel_data->hotel_gallery}}" style="width: 260px;">
                  <p>{{$hotel_data->hotel_name}}</p>
               </div>
               <p><b>4.1/5</b> Very good (82 reviews)</p>
               <p class="rmn">1 Room: {{$room_data->name}} </p>
               <ul>
                  <li>
                     <b>Check-in:</b> {{$check_in}}
                  </li>
                  <li>
                     <b>Check-out:</b> {{$check_out}}
                  </li>
                  <li>{{$booking_days}}-night stay</li>
               </ul>
            </div>
            <div class="revie-box-boxi">
               <div class="price-bkp">
                  <h4>PRICE BREAK-UP</h4>
               </div>
               <div class="price-left">
                  <h5> {{$total_room_num}} Room x {{$booking_days}} Night<br> <small> Base Price {{$room_data->price_per_night}} Per Night</small></h5>
                  <h6>PKR <?php echo $total_room_num*($booking_days*$room_data->price_per_night);?> </h6>
               </div>
               @if($room_data->cleaning_fee > 0)
               <div class="price-left">
                  <h5> Clening Charge</h5>
                  <h6>PKR {{$total_room_num*$room_data->cleaning_fee}} </h6>
               </div>
               @endif
               @if($room_data->city_fee > 0)
               <div class="price-left">
                  <h5> City Charge</h5>
                  <h6>PKR {{$total_room_num*$room_data->city_fee}}</h6>
               </div>
               @endif
               @if($room_data->tax_percentage > 0)
               <div class="price-left">
                  <h5> Taxes & Service Fees</h5>
                  <h6>PKR {{$total_room_num*$room_data->tax_percentage}}</h6>
               </div>
               @endif
               <div class="price-left">
                  <h5> <b>Total Amount to be paid </b></h5>
                  <h6><b>PKR <?php echo ($total_room_num*($booking_days*$room_data->price_per_night))+$total_room_num*($room_data->cleaning_fee)+$total_room_num*($room_data->city_fee)+$total_room_num*($room_data->tax_percentage); ?></b></h6>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<!-- End #main -->
@endsection