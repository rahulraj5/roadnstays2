@extends('admin.layout.layout')
@section('title', 'User - Profile')

@section('current_page_css')
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #5f666c !important;
  }
</style>

<style type="text/css">
  input[type="file"] {
    display: block;
  }

  .imageThumb {
    max-height: 75px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
    width: 100%;
  }

  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }

  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  .remove:hover {
    background: white;
    color: black;
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
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
  })
</script>

<script>
  $(document).ready(function() {
    // Select2 Multiple
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>

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
          <h1>Invoice</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Invoice</li>
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
                  @if($bookingList->hotel_added_is_admin == 1)
                    <strong>{{ $admin_details->name }}</strong><br>
                    {{ $admin_details->admin_address }}<br>
                    {{ $admin_details->admin_city }}, {{ $admin_details->admin_state }}, {{ $admin_details->admin_postal_code }}, {{ $admin_details->admin_country }}<br>
                    Phone: {{ $admin_details->admin_number }}<br>
                    Email: {{ $admin_details->email }}
                  @else
                    <strong>{{ $vendor_details->first_name }} {{ $vendor_details->last_name }}</strong><br>
                    {{ $vendor_details->address }}<br>
                    {{ $vendor_details->user_city }}, {{ $vendor_details->state_id }}, {{ $vendor_details->postal_code }}, {{ $vendor_details->vendor_country_name }}<br>
                    Phone: {{ $vendor_details->contact_number }}<br>
                    Email: {{ $vendor_details->email }}
                  @endif
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
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> {{ $bookingList->check_out }}<br>
                <b>Account:</b> 968-34567
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
                      <th>Room Name</th>
                      <th>Hotel Name</th>
                      <th>Total Member</th>
                      <th>Total Room</th>
                      <th>Room Price</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if (!$order_details->isEmpty())

                  <?php $i = 1; ?>

                  @foreach ($order_details as $arr)

                    <tr id="row{{ $arr->id }}">
                      <td>{{ $i }}</td>
                      <td>{{ $arr->name }}</td>
                      <td>{{ $arr->hotel_name }}</td>
                      <td>{{ $arr->total_member }}</td>
                      <td>{{ $arr->total_room }}</td>
                      <td id="room_price_val">${{ number_format($arr->price_per_night), 2}}</td>
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
                <img src="{{ url('/') }}/resources/dist/img/credit/paypal2.png" alt="Paypal">

                <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                  plugg
                  dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p> -->
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Due {{ $bookingList->check_out }}</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <!-- <td><span> -->
                        <?php 
                        // $subtotal = $order_details->total*$vendor_order->commission_rate/100;
                        // echo '$'.number_format($com_amount, 2); 
                        ?> 
                     <!-- </span></td> -->
                      <td id="get_room_price_val"></td>
                    </tr>
                    <tr>
                      <th>Tax (Included in Price)<!-- (9.3%) --></th>
                      <td id="room_tax_val">${{ $bookingList->tax_percentage }}</td>
                    </tr>
                    
                    <tr>
                      <th>Cleaning Fee:</th>
                      <td id="cleaning_fee_val">${{ $bookingList->cleaning_fee }}</td>
                    </tr>
                    
                    
                    <tr>
                      <th>City Fee:</th>
                      <td id="city_fee_val">${{ $bookingList->city_fee }}</td>
                    </tr>

                    <tr>
                      <th>Total:</th>
                      <td>${{ $bookingList->total_amount }}</td>
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
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection