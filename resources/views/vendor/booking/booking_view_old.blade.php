@extends('vendor.layouts.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
  .active .bs-stepper-circle {
    background-color: #126c62 !important;
  }

  .d-none {
    display: none;
  }

  .d-bloc {
    display: block;
  }
</style>
<style>
  .container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
  }
</style>
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bootstrap 4 -->
<!-- <link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->
<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('current_page_js')

<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- jquery-validation -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
  })
</script>
<script>
  $('#checkin_time').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
  $('#checkout_time').datetimepicker({
    //  format: 'hh:mm:ss a'
    //  format: 'HH:mm'
    format: 'LT'
  });
</script>

<script>
  $(document).ready(function() {
    // Select2 Multiple
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
  $("select").on("select2:select", function(evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
  });
</script>

<script>
  $(document).ready(function() {
    var room_price = $('#room_price_val').text();
    // var room_pricee = $("#room_price_val").text()
    $('#get_room_price_val').text(room_price);
    // console.log(room_price);
  });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jpjQRZn8vu59ElER36Q2LaxptdAghaA&libraries=places"></script>

<script type="text/javascript">
  function initialize() {
    var input = document.getElementById('hotel_address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      document.getElementById('hotel_latitude').value = place.geometry.location.lat();
      document.getElementById('hotel_longitude').value = place.geometry.location.lng();
      document.getElementById('neighb_area').value = place.vicinity;
      for (let i = 0; i < place.address_components.length; i++) {
        if (place.address_components[i].types[0] == "administrative_area_level_2") {
          document.getElementById('hotel_city').value = place.address_components[i].long_name;
        }
      }
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection

@section('content')






    <!-- <div class="row d-flex flex-wrap p-3"> -->


    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <!-- <div class="card-header">
                            <h3 class="card-title">Hotel</h3>
                        </div> -->
          <div class="card-body p-0">
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
                            <i class="bx bx-globe"></i> {{ config('app.name') }}
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
                                <th>Tax (Included in Price)
                                  <!-- (9.3%) -->
                                </th>
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
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- </div> -->
  </div>
</div>
</div>
</div>
</section>
</main>
<!-- End #main -->
@endsection