@extends('admin.layout.layout')
@section('title', 'User - Profile')

@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
  }
</style>

<style>
  .portlet.box.yellow-crusta {
    border: 1px solid #ffd327;
    border-top: 0;
  }

  .portlet.box.yellow-crusta>.portlet-title,
  .portlet.yellow-crusta,
  .portlet>.portlet-body.yellow-crusta {
    background-color: #d6b226;
  }

  .portlet>.portlet-title:after,
  .portlet>.portlet-title:before {
    content: " ";
    display: table;
  }

  .portlet.box.yellow-crusta>.portlet-title>.caption,
  .portlet.box.yellow-crusta>.portlet-title>.caption>i {
    color: #fff;
  }

  .portlet.box>.portlet-title>.actions {
    padding: 7px 0 5px;
  }

  .portlet>.portlet-title:after {
    clear: both;
  }

  .portlet.light .portlet-body {
    padding-top: 8px;
  }

  .static-info {
    margin-bottom: 10px;
  }

  .static-info .name {
    font-size: 14px;
  }

  .static-info .value {
    font-size: 14px;
    font-weight: 600;
  }

  .static-info .name {
    font-size: 14px;
  }

  .label-success {
    background-color: #36c6d3;
  }

  .label-confirm {
    background-color: #DE3163;
  }

  .label-canceled {
    background-color: #E97451;
  }

  .label-info {
    background-color: #50C878;
  }

  .static-info .value {
    font-size: 14px;
    font-weight: 600;
  }

  .order_Detail_main_s {
    float: left;
    width: 100%;
    margin-bottom: 20px;
  }

  .portlet.box.yellow-crusta .portlet-body {
    float: left;
    width: 100%;
    padding: 15px;
    background: #fff;
    border: 1px solid #ffd327;
  }


  .portlet.box.yellow-crusta .portlet-title {
    padding: 10px 10px;
    line-height: 26px;
  }



  .portlet.box.yellow-crusta .actions {
    float: right;
    padding: 0;
  }

  .portlet.box.yellow-crusta .caption {
    float: left;
  }

  .portlet.box.yellow-crusta .actions a.btn.btn-default.btn-sm {
    background: transparent;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 0;
  }


  .portlet.box.yellow-crusta i.fa {
    margin-right: 10px;
  }

  .portlet-body .col-md-7.value {
    font-weight: 400;
  }

  .portlet-body span.label.label-info.label-sm {
    background: #6999e0;
    padding: 5px 10px;
    color: #fff;
    margin-left: 8px;
  }

  span.label.label-success {
    color: #fff;
    padding: 5px 10px;
  }

  span.label.label-confirm {
    color: #fff;
    padding: 5px 10px;
  }

  /* #50C878 */

  span.label.label-canceled {
    color: #fff;
    padding: 5px 10px;
  }

  span.label.label-info {
    color: #fff;
    padding: 5px 10px;
  }


  .portlet.blue-hoki.box .portlet-body {
    float: left;
    width: 100%;
    padding: 15px;
    background: #fff;
    border: 1px solid #67809F;
  }

  .portlet.blue-hoki.box .portlet-title {
    background: #67809F;
    padding: 10px 10px;
    line-height: 26px;
  }

  .portlet.blue-hoki.box .portlet-title .caption {
    float: left;
    line-height: 30px;
    color: #fff;
  }

  .portlet.blue-hoki.box .portlet-title .actions {
    float: right;
  }

  .portlet.blue-hoki.box .portlet-title .actions {
    padding: 0;
  }

  .portlet.blue-hoki.box .portlet-title .caption i.fa {
    margin-right: 10px;
  }



  .portlet.blue-hoki.box a.btn.btn-default.btn-sm {
    background: transparent;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 0;
  }

  .portlet.box.yellow-crusta .actions a.btn.btn-default.btn-sm:hover {
    background: #fff;
    color: #000;
  }

  .portlet.blue-hoki.box a.btn.btn-default.btn-sm:hover {
    background: #fff;
    color: #000;
  }

  .billing_add_sec {
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 15px;
  }


  .portlet.green-meadow.box .portlet-title {
    padding: 10px 10px;
    line-height: 26px;
    border: 1px solid #2ae0bb;
    background-color: #1BBC9B;
  }

  .portlet.green-meadow.box .portlet-body {
    float: left;
    width: 100%;
    padding: 15px;
    background: #fff;
    border: 1px solid #2ae0bb;
  }

  .portlet.green-meadow.box .portlet-title .caption {
    float: left;
    line-height: 30px;
    color: #fff;
  }

  .portlet.green-meadow.box .portlet-title .caption i.fa {
    margin-right: 10px;
  }

  .portlet.green-meadow.box .portlet-title .actions {
    padding: 0;
    float: right;
  }

  .portlet.green-meadow.box .portlet-title .actions a.btn.btn-default.btn-sm {
    background: transparent;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 0;
  }

  .portlet.green-meadow.box .portlet-title .actions a.btn.btn-default.btn-sm:hover {
    background: #fff;
    color: #000;
  }

  .portlet.green-meadow.box .portlet-body .col-md-12.value {
    font-weight: 500;
    line-height: 20px;
  }

  .portlet.red-sunglo.box .portlet-body {
    float: left;
    width: 100%;
    padding: 15px;
    background: #fff;
    border: 1px solid #E26A6A;
  }

  .portlet.red-sunglo.box .portlet-title {
    padding: 10px 10px;
    line-height: 26px;
    background-color: #E26A6A;
    border: 1px solid #ea9595;
  }

  .portlet.red-sunglo.box .portlet-title .caption {
    float: left;
    line-height: 30px;
    color: #fff;
  }

  .portlet.red-sunglo.box .portlet-title .actions {
    float: right;
    padding: 0;
  }


  .portlet.red-sunglo.box .portlet-title .caption i.fa {
    margin-right: 10px;
  }

  .portlet.red-sunglo.box .portlet-title .actions a.btn.btn-default.btn-sm {
    background: transparent;
    color: #fff;
    border-radius: 0;
  }

  .portlet.red-sunglo.box .portlet-title .actions a.btn.btn-default.btn-sm:hover {
    background: #fff;
    color: #000;
  }


  .portlet.red-sunglo.box .portlet-body .col-md-12.value {
    font-weight: 500;
    line-height: 20px;
  }
</style>

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
@endsection



@section('current_page_js')

<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  // $(document).ready(function() {
  //   // var p = $('.table tr:first-child td:last-child').text();  
  // var p = $('.table tr:last-child th:last-child').text();
  //   $(tr).find('td').each (function (index, td) {
  //   console.log(td)
  //   });
  // });  

  // var p = $('#room_charges tr:first-child td:last-child').val();
  // console.log(p);

  // $('#room_charges tr').each(function(index, tr) {

  // $(tr).find('td').each (function (index, td) {
  //   console.log(td)
  // });
  // });

  // $(function(){
  //   $("#onpressofabutton").click(function(){
  //       var data1 = $(this).find("td:eq(0) input[type='text']").val();
  //       var data2 = $(this).find("td:eq(1) input[type='text']").val();
  //   });
  // });

  $(document).ready(function() {
    var room_price = $('#room_price_val').text();
    // var room_pricee = $("#room_price_val").text()
    $('#get_room_price_val').text(room_price);
    // console.log(room_price);
  });
</script>
@endsection

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Booking Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Booking Details</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div> -->

          <section class="order_Detail_s">
            <div class="container-fluid">
              <div class="row">

                <div class="col-md-6">
                  <div class="col-md-12 col-sm-12">
                    <div class="order_Detail_main_s">
                      <div class="portlet yellow-crusta box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-cogs"></i>
                            Booking Details
                          </div>
                          <div class="actions">
                          </div>
                        </div>

                        <div class="portlet-body">

                          <div class="row static-info">

                            <div class="col-md-5 name"> Order #: </div>

                            <div class="col-md-7 value"> #000{{ $bookingList->id }}

                              <!-- <span class="label label-info label-sm"> Email confirmation was sent </span> -->

                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Order Date &amp; Time: </div>

                            <div class="col-md-7 value"> {{ date('d-M-Y h:i A', strtotime($bookingList->created_at)) }} </div>
                            <!-- <div class="col-md-7 value"> 03 July 2022 16:35 PM </div> -->

                          </div>

                          <div class="row static-info">
                            <div class="col-md-5 name"> Transaction Id: </div>
                            <div class="col-md-7 value"> #{{ $bookingList->payment_token }}
                            </div>
                          </div>

                          <div class="row static-info">
                            <div class="col-md-5 name"> Booking Status: </div>
                            <div class="col-md-7 value">
                              @if($bookingList->booking_status == "confirmed")
                              <span class="label label-confirm"> {{ $bookingList->booking_status }} </span>
                              @elseif($bookingList->booking_status == "canceled")
                              <span class="label label-canceled"> {{ $bookingList->booking_status }} </span>
                              @elseif($bookingList->booking_status == "processing" || $bookingList->booking_status == "pending")
                              <span class="label label-info"> {{ $bookingList->booking_status }} </span>
                              @else
                              <span class="label label-info"> {{ $bookingList->booking_status }} </span>
                              @endif
                            </div>
                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Order Status: </div>

                            <div class="col-md-7 value">

                              <span class="label label-success"> {{ $bookingList->payment_status }} </span>

                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Check In Date: </div>

                            <div class="col-md-7 value">{{ date('d M Y', strtotime($bookingList->tour_start_date)) }}</div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Check out Date : </div>

                            <div class="col-md-7 value">{{ date('d M Y', strtotime($bookingList->tour_end_date)) }}</div>

                          </div>

                          @if($bookingList->partial_payment_status == 1)
                            <div class="row static-info">

                              <div class="col-md-5 name"> Online Paid: </div>

                              <div class="col-md-7 value">PKR {{ $bookingList->online_paid_amount }}</div>

                            </div>

                            <div class="row static-info">

                              <div class="col-md-5 name"> Pay at Desk: </div>

                              <div class="col-md-7 value">PKR {{ $bookingList->remaining_amount_to_pay }}</div>

                            </div>
                          @endif

                          <div class="row static-info">

                            <div class="col-md-5 name"> Grand Total: </div>

                            <div class="col-md-7 value">PKR {{ $bookingList->total_amount }}</div>

                          </div>

                          @if($bookingList->booking_status == 'canceled')
                            <div class="row static-info">

                              <div class="col-md-5 name"> Refund Status: </div>

                              <div class="col-md-7 value">{{ $bookingList->refund_status }}</div>

                            </div>

                            <div class="row static-info">

                              <div class="col-md-5 name"> Refund Amount: </div>

                              <div class="col-md-7 value">{{ $bookingList->refund_amount }}</div>

                            </div>
                          @endif

                          <div class="row static-info">

                            <div class="col-md-5 name"> Payment Information: </div>

                            <div class="col-md-7 value"> @if($bookingList->payment_type == 1)
                                    {{ 'Alfa Wallet' }}
                                  @elseif($bookingList->payment_type == 2)
                                    {{ 'Alfalah Bank Account' }}
                                  @elseif($bookingList->payment_type == 3)
                                    {{ 'Credit/Debit Card' }}
                                  @elseif($bookingList->payment_type == 4)
                                    {{ 'Other Bank Accounts' }}
                                  @else
                                    {{ '' }}  
                                  @endif <span style="color:red">( {{ $bookingList->payment_status }} )</span></div>

                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="order_Detail_main_s">
                      <div class="portlet green-meadow box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-cogs"></i>
                            Billing Address
                          </div>
                        </div>
                        <div class="portlet-body">

                          <div class="row static-info">

                            <div class="col-md-12 value"> {{ $bookingList->user_first_name }} {{ $bookingList->user_last_name }}

                              @if(!empty($bookingList->user_email))
                              <br> {{ $bookingList->user_email }}
                              @endif

                              @if(!empty($bookingList->user_address))
                              <br>Address : {{ $bookingList->user_address }}
                              @endif

                              <br>
                              @if(!empty($bookingList->user_city))
                              {{ $bookingList->user_city }},
                              @endif

                              @if(!empty($bookingList->user_postal_code))
                              {{ $bookingList->user_postal_code }},
                              @endif

                              @if(!empty($bookingList->user_country))
                              {{ $bookingList->user_country }}
                              @endif

                              @if(!empty($bookingList->user_contact_num))
                              <br> T: {{ $bookingList->user_contact_num }}
                              @endif
                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="order_Detail_main_s">
                      <div class="portlet red-sunglo box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-cogs"></i>
                            Shipping Address
                          </div>
                        </div>
                        <div class="portlet-body">

                          <div class="row static-info">

                            <div class="col-md-12 value"> {{ $bookingList->user_first_name }} {{ $bookingList->user_last_name }}

                              @if(!empty($bookingList->user_address))
                              <br> {{ $bookingList->user_address }}
                              @endif

                              @if(!empty($bookingList->user_city))
                              <br> {{ $bookingList->user_city }},
                              @endif

                              @if(!empty($bookingList->user_postal_code))
                              <br> {{ $bookingList->user_postal_code }},
                              @endif

                              @if(!empty($bookingList->user_country))
                              <br> {{ $bookingList->user_country }}
                              @endif

                              @if(!empty($bookingList->user_contact_num))
                              <br> T: {{ $bookingList->user_contact_num }}
                              @endif

                              <br>

                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="order_Detail_main_s">
                      <div class="portlet blue-hoki box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-cogs"></i>
                            Vendor Information
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="row static-info">

                            <div class="col-md-5 name"> Vendor Name: </div>

                            <div class="col-md-7 value">
                              @if(isset($vendor_details->first_name)) {{ $vendor_details->first_name }} {{ $vendor_details->last_name }}@endif

                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Email: </div>

                            <div class="col-md-7 value">

                              @if(isset($vendor_details->email)) {{ $vendor_details->email }} @endif

                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Phone Number: </div>

                            <div class="col-md-7 value">
                              @if(isset($vendor_details->contact_number)) {{ $vendor_details->contact_number }} @endif

                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">

                  <div class="col-md-12 col-sm-12">
                    <div class="order_Detail_main_s">
                      <div class="portlet blue-hoki box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-cogs"></i>
                            Customer Information
                          </div>
                        </div>
                        <div class="portlet-body">

                          <div class="row static-info">

                            <div class="col-md-5 name"> Customer Name: </div>

                            <div class="col-md-7 value"> {{ $bookingList->user_first_name }} {{ $bookingList->user_last_name }}</div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Email: </div>

                            <div class="col-md-7 value"> {{ $bookingList->user_email }} </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Address: </div>

                            <div class="col-md-7 value"> {{ $bookingList->user_address }}
                              <br> {{ $bookingList->user_city }} {{ $bookingList->user_postal_code }} {{ $bookingList->user_country }},

                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Phone Number: </div>

                            <div class="col-md-7 value"> {{ $bookingList->user_contact_num }} </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Document Number: </div>

                            <div class="col-md-7 value"> {{ $bookingList->document_number }} </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Document Type: </div>

                            <div class="col-md-7 value"> {{ $bookingList->document_type }} </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Front Document Img: </div>

                            <div class="col-md-7 value">
                              <img src="{{ asset('public/uploads/user_document/') }}/{{$bookingList->front_document_img}}" alt="" style="height: 130px;">
                            </div>

                          </div>

                          <div class="row static-info">

                            <div class="col-md-5 name"> Back Document Img: </div>
                            <div class="col-md-7 value">
                              <img src="{{ asset('public/uploads/user_document/') }}/{{$bookingList->back_document_img}}" alt="" style="height: 130px;">
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


          <div class="row mb-2">
            <div class="col-sm-6">
              <h2>Invoice</h2>
            </div>
          </div>

          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> {{ config('app.name') }}
                  <small class="float-right">Date: {{ date('d-m-Y', strtotime($bookingList->created_at)) }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>

                  <strong>
                    @if(isset($vendor_details->first_name)) {{ $vendor_details->first_name }} {{ $vendor_details->last_name }}@endif
                  </strong><br>

                  @if(isset($vendor_details->address)) {{ $vendor_details->address }}@endif
                  <br>
                  @if(isset($vendor_details->user_city)) {{ $vendor_details->user_city }}@endif,
                  @if(isset($vendor_details->state_id)) {{ $vendor_details->state_id }}@endif,
                  @if(isset($vendor_details->postal_code)) {{ $vendor_details->postal_code }}@endif,
                  @if(isset($vendor_details->vendor_country_name)) {{ $vendor_details->vendor_country_name }}@endif
                  <br>
                  Phone:
                  @if(isset($vendor_details->contact_number)) {{ $vendor_details->contact_number }}@endif
                  <br>
                  Email:
                  @if(isset($vendor_details->email)) {{ $vendor_details->email }}@endif

                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{ $bookingList->user_first_name }} {{ $bookingList->user_last_name }}</strong><br>
                  {{ $bookingList->user_address }}<br>
                  {{ $bookingList->user_city }}, {{ $bookingList->user_state }}, {{ $bookingList->user_postal_code }}<br>
                  Phone: {{ $bookingList->user_contact_num }}<br>
                  Email: {{ $bookingList->user_email }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #0000{{ $bookingList->id }}</b><br>
                <br>
                <b>Order ID:</b> VXMN{{ $bookingList->id }}<br>
                <b>Payment Due:</b> {{ $bookingList->tour_end_date }}<br>
                <!-- <b>Account:</b> 968-34567 -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped" id="room_charges">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Tour Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Total Days</th>
                      <th>Tour Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!$order_details->isEmpty())

                    <?php $i = 1; ?>

                    @foreach ($order_details as $arr)

                    <tr id="row{{ $arr->id }}">
                      <td>{{ $i }}</td>
                      <td>{{ $arr->tour_title }}</td>
                      <td>{{ $arr->tour_start_date }}</td>
                      <td>{{ $arr->tour_end_date }}</td>
                      <td>{{ $arr->tour_days }}</td>
                      <td id="room_price_val">PKR {{ number_format($arr->tour_price), 2}}</td>
                    </tr>
                    <?php $i++; ?>

                    @endforeach

                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <!-- <img src="{{ url('/') }}/resources/dist/img/credit/visa.png" alt="Visa">
                        <img src="{{ url('/') }}/resources/dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="{{ url('/') }}/resources/dist/img/credit/american-express.png" alt="American Express"> -->
                <!-- <img src="{{ url('/') }}/resources/dist/img/credit/paypal2.png" alt="Paypal"> -->
                <img src="{{ url('/') }}/resources/dist/img/credit/alfalha.jpg" alt="Alfa" style="height: 40px; width: 50px;">

                <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                          plugg
                          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p> -->
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Due {{ $bookingList->tour_end_date }}</p>

                <div class="table-responsive">
                  <table class="table">

                    <!-- <tr>
                      <th style="width:50%">Subtotal:</th> -->
                      <!-- <td><span> -->
                      <?php
                      // $subtotal = $order_details->total*$vendor_order->commission_rate/100;
                      // echo '$'.number_format($com_amount, 2); 
                      ?>
                      <!-- </span></td> -->
                      <!-- <td id="get_room_price_val"></td>
                    </tr> -->
                    @if(!empty($bookingList->tax_percentage))
                    <tr>
                      <th>Tax (Included in Price)
                        <!-- (9.3%) -->
                      </th>
                      <td id="room_tax_val">PKR {{ $bookingList->tax_percentage }}</td>
                    </tr>
                    @endif
                    @if(!empty($bookingList->cleaning_fee))
                    <tr>
                      <th>Cleaning Fee:</th>
                      <td id="cleaning_fee_val">PKR {{ $bookingList->cleaning_fee }}</td>
                    </tr>
                    @endif
                    @if(!empty($bookingList->city_fee))
                    <tr>
                      <th>City Fee:</th>
                      <td id="city_fee_val">PKR {{ $bookingList->city_fee }}</td>
                    </tr>
                    @endif

                    @if($bookingList->partial_payment_status == 1)
                      <tr>
                        <th>Online Paid
                        </th>
                        <td id="room_tax_val">PKR {{ $bookingList->online_paid_amount ?? '' }}</td>
                      </tr>
                      <tr>
                        <th>Pay at Desk
                        </th>
                        <td id="room_tax_val">PKR {{ $bookingList->remaining_amount_to_pay ?? '' }}</td>
                      </tr>
                    @endif
                    
                    <tr>
                      <th>Total:</th>
                      <td>PKR {{ $bookingList->total_amount }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <!-- <div class="row no-print">
                          <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                              Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                              <i class="fas fa-download"></i> Generate PDF
                            </button>
                          </div>
                        </div> -->
          </div>
          <!-- /.invoice -->
        </div>
      </div>
    </div>
  </section>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection