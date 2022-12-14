@extends('vendor.layout.layout')

@section('title', 'User - Profile')

@section('current_page_css')
<style type="text/css">

 .transaction-view {
    display: flex;
    justify-content: left;
    flex-wrap: wrap;
  }

  .first-gird {
      margin-right: 25px;
      width: 20%;
  }
  .first-gird h4{
  font-size: 18px;
  }

  .first-gird h3{
  font-size: 18px;
  }
  .botm-data {
      font-size: 15px;
      margin-top: 3px;
      margin-bottom: 14px;
      color: #464646;
  }
  .main-id {
    font-size: 15px;
    color: #000;
    font-weight: 500;
  }
</style>
@endsection

@section('current_page_js')


@endsection

@section('content')
<div class="content-wrapper"> 
  <section class="content">
    <div class="container-fluid">
     <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="transaction-view">
	            <div class="first-gird">
	            	<h3> <div class="main-id"> ID </div> <div class="botm-data"> #{{$transaction_history->id}}</div></h3>
	            	<h3><div class="main-id"> Booking ID </div> <div class="botm-data"> #{{$transaction_history->booking_id}}</div> </h3>
	            </div>
	            <div class="first-gird">
	            	<h3><div class="main-id">First Name</div> <div class="botm-data">{{$transaction_history->first_name}}</div></h3>
	            	<h3><div class="main-id">Last Name</div> <div class="botm-data"> {{$transaction_history->last_name}}</div></h3>
	            </div>
            	<div class="first-gird">
	            	<h3><div class="main-id">Txn id</div> <div class="botm-data"> #{{$transaction_history->txn_id}}</div></h3>
	            	<h3><div class="main-id">Txn amount</div> <div class="botm-data"> {{$transaction_history->txn_amount}}</div></h3>
             	</div> 
	            <div class="first-gird">
	            	<h3><div class="main-id">Payment Method</div> <div class="botm-data"> {{$transaction_history->payment_method}}</div></h3>
	            	<h3><div class="main-id">Booking Type</div> <div class="botm-data"> {{$transaction_history->booking_type}}</div></h3>
	            </div>
	            <div class="first-gird">
	            	<h3><div class="main-id">Txn Status</div> <div class="botm-data"> {{$transaction_history->txn_status}}</div></h3>
	            	<h3><div class="main-id">Txn Date</div> <div class="botm-data"> {{$transaction_history->txn_date}}</div></h3>
	            </div> 
             @if($transaction_history->booking_type=='Room' or $transaction_history->booking_type=='Space')
              @if($booking_details->partial_payment_status==1)
              <div class="first-gird">
                <h3><div class="main-id">Online Paid Amount</div> <div class="botm-data"> {{$booking_details->online_paid_amount}}</div></h3>
                <h3><div class="main-id">Pay at Desk Amount</div> <div class="botm-data"> {{$booking_details->remaining_amount_to_pay}}</div></h3>
              </div>
              @endif
             @endif 
             @if($transaction_history->booking_type=='Room' or $transaction_history->booking_type=='Space')
              @if(!empty($property_details))
              <div class="first-gird">
                <h3><div class="main-id">Type of Payment</div> <div class="botm-data"> 
                  @if($property_details->payment_mode == 1)
                  {{'100% Online'}}
                  @endif
                  @if($property_details->payment_mode == 2)
                  {{'Partial'}}
                  @endif
                  @if($property_details->payment_mode == 3)
                  {{'At Desk'}}
                  @endif
                  </div>
                </h3>
                @if($transaction_history->booking_type=='Room' or $transaction_history->booking_type=='Space')
                  @if(!empty($property_details->commision))
                  <h3><div class="main-id">Commission</div> <div class="botm-data"> {{$property_details->commission}}</div></h3>
                  @endif
                @endif
              </div>
              @endif
            @endif
            </div> 
          </div>
        </div>
      </div>
     </div>
    </div>
  </section> 
</div> 
@endsection