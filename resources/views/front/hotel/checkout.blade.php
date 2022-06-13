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
			<h3>Review your Booking</h3>
		</div>
		<div class="col-md-9">
			<div class="infobox">
        <div class="revie-box">
        	<div class="page-detail">
            <h5 class="p-0 m-0 citi-omr"> Citadines OMR Chennai</h5>
            <span>★★★★★</span>
            <p> 290, Rajiv Gandhi Salai (OMR), IT Expressway, Sholinganallur, Chennai, Tamil Nadu, 600119</p>

        </div>
        <div class="page-detail-sid">
        <img class="rtnb" src="https://images.trvl-media.com/hotels/12000000/11960000/11958700/11958666/869e8f24.jpg?impolicy=resizecrop&amp;rw=297&amp;ra=fit" alt="Another alt text">
    </div></div>

    <div class="runs-andpay">
    	<div class="date1">
    		<span>CHECK IN</span>
    		<h3> 10 Jun 2022</h3>
    		<small>Friday, 1 PM</small>
    	</div>
    	<div class="date3">
    		<small>1 Night</small><br>
<i class='bx bx-transfer-alt'></i>
    	</div>
    	<div class="date1">
    		<span>CHECK IN</span>
    		<h3> 10 Jun 2022</h3>
    		<small>Friday, 1 PM</small>
    	</div>
    	<div class="date2">
    	<h6>	2 Adults | 1 Room</h6>
    	</div>
    	</div>
<div class="room-praci">
<h5>LUXURY DELUXE ROOM (WITH BATHTUB)<br><small>2 Adults</small></h5>
<div class="">
	<h5 class="mt-3">Price Includes </h5>
	<ul>
	
	<li> No meals included</li>
	<li>Non-Refundable | On Cancellation, You will not get any refund </li>

	</ul>

</div>

</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-12 p-0 mt-3">

<div class="bankpay">
<h4 class="mt-2">
	<i class='bx bxs-user-badge'></i><b> Room 1:</b>  2 Adults 2 Twin Beds
</h4>
<ul class="brekfasr">
	<li><i class='bx bx-check'></i> Breakfast included</li>
  <li><i class='bx bx-check'></i> Free parking</li>
<li><i class='bx bx-check'></i> Free WiFi </li>
</ul>
<div class="bank-bar">  
		<form id="member-registration" method="post" class="form-validate form-horizontal well" >
			<fieldset>
					<div class="form-group col-md-4">
					<label for="exampleInputPassword1">Traveller name*</label>
					<input type="text" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="container">
				<div class="row">
				<div class="form-group col-md-6">
					<label for="exampleInputPassword1">First name*</label>
					<input type="text" class="form-control" id="exampleInputPassword1">
				</div>
				
				<div class="form-group col-md-6">
					<label for="exampleInputEmail1">Surname*</label>
					<input type="email" class="form-control" id="exampleInputEmail1">
				</div>
			</div>
			</div>
				<div class="form-group col-md-6">
					<label for="exampleInputEmail1">Mobile phone number *</label>
					<input type="email" class="form-control" id="exampleInputEmail1">
				</div>
			<div class="form-group col-md-6">
			<label for="vehicle1">	<input type="checkbox" name="vehicle1" value="Bike">
   Remember this card for future use</label>
</div>
				
			</fieldset>
		</form>

		  </div>
   
  </div>
	</div>


</div>
  </div>




<div class="container">
	<div class="row">
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
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">NetBanking</a>
    </li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
     
	<img src="https://votivelaravel.in/roadNstays/resources/assets/img/banke.png" class="mb-3 " style="">
		<form id="member-registration" method="post" class="form-validate form-horizontal well" >
			<fieldset>
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
					<input type="email" class="form-control" id="exampleInputEmail1">
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
				<input type="email" class="form-control" id="exampleInputEmail1">

				</div>
			<label for="vehicle1">	<input type="checkbox" name="vehicle1" value="Bike">
   Remember this card for future use</label>
				
			</fieldset>
		</form>

		  </div>
    <div id="menu1" class="tab-pane fade bankinfo">
      <h3 class="mt-3">Important information about your booking</h3>
      <p>Important: You will be redirected to your bank's website to securely complete your payment. You will have 30 minutes to pay for your booking.</p>
      <!-- <a href="#" class="paynow-btn">Continue To Your Bank </a> -->
    </div>
   
  </div>
	</div>
<div class="col-md-12 text-center d-flex p-4">
<a href="#" class="paynow-btn">Paynow </a>

</div>

</div>

</div>
	</div>
  </div>
	</div>
			<div class="col-md-3 pl-0">
				<div class="revie-box-boxi">
				 <div class="image-section">
				 	 <img src="https://votivelaravel.in/roadNstays/resources/assets/img/detail.webp">
				 	 <p> Citadines OMR Chennai</p>

				 	</div>
				 	<p><b>4.1/5</b> Very good (82 reviews)</p>

				 	<p class="rmn">1 Room: Deluxe Twin Room with 20% Discount on Food & Soft Beverages & Spa</p>
				 	<ul><li>
					<b>Check-in:</b> Tue, 5 Jul</li>
					<li>
					<b>Check-out:</b> Sun, 31 Jul</li>
					<li>26-night stay</li>
				</ul>
				
					 </div>


					 <div class="revie-box-boxi">
					<div class="price-bkp">
						<h4>PRICE BREAK-UP</h4></div>
					<div class="price-left">
						<h5> 1 Room x 1 Night<br> <small> Base Price</small></h5>
						<h6>₹ 6,950 </h6>
					</div>
                   <div class="price-left">
						<h5> Price after Discount</h5>
						<h6>₹ 1,950 </h6>
					</div>
					<div class="price-left">
						<h5> Taxes & Service Fees</h5>
						<h6>₹ 1,706</h6>
					</div>
					<div class="price-left">
						<h5> <b>Total Amount to be paid </b></h5>
						<h6><b>₹ 6,453</b></h6>
					</div>
					 </div>

		</div>
	</div>
</section>





</main><!-- End #main -->



@endsection