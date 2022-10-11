@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
@section('current_page_css')

<style type="text/css">
  #profile-description {
    max-width: 400px;
    position: relative;
  }

  #profile-description .text {
    /*   width: 660px;  */
    margin-bottom: 5px;
    color: #777;
    padding: 0 15px;
    position: relative;
    font-family: Arial;
    font-size: 14px;
    display: block;
  }

  #profile-description .show-more {
    /*   width: 690px;  */
    color: #777;
    position: relative;
    font-size: 12px;
    padding-top: 5px;
    height: 20px;
    text-align: center;
    background: #f1f1f1;
    cursor: pointer;
  }

  #profile-description .show-more:hover {
    color: #1779dd;
  }

  #profile-description .show-more-height {
    height: 200px;
    overflow: hidden;
  }
</style>

@endsection

@section('current_page_js')
<script>
  var placeSearch, autocomplete;
  var componentForm = {
    // street_number: 'long_name',
    // route: 'long_name',
    // locality: 'long_name',
    // postal_code: 'short_name'
  };

  function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('autocomplete')), {
        types: ['geocode']
      });
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      console.log(place);
      document.getElementById('hotel_latitude').value = place.geometry.location.lat();
      document.getElementById('hotel_longitude').value = place.geometry.location.lng();
      fillInAddress(autocomplete, "");
    });

  }

  function fillInAddress(autocomplete, unique) {

    var place = autocomplete.getPlace();
    for (var component in componentForm) {
      if (!!document.getElementById(component + unique)) {
        document.getElementById(component + unique).value = '';
        document.getElementById(component + unique).disabled = false;
      }
    }

    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType] && document.getElementById(addressType + unique)) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType + unique).value = val;
      }
    }
  }
  google.maps.event.addDomListener(window, "load", initAutocomplete);

  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $("#dt1").datepicker({
      dateFormat: "dd-M-yy",
      minDate: 0,
      onSelect: function() {
        var dt2 = $('#dt2');
        var startDate = $(this).datepicker('getDate');
        var minDate = $(this).datepicker('getDate');
        var dt2Date = dt2.datepicker('getDate');
        var dateDiff = (dt2Date - minDate) / (86400 * 1000);

        startDate.setDate(startDate.getDate() + 30);
        if (dt2Date == null || dateDiff < 0) {
          dt2.datepicker('setDate', minDate);
        } else if (dateDiff > 30) {
          dt2.datepicker('setDate', startDate);
        } 
        dt2.datepicker('option', 'maxDate', startDate); 
        dt2.datepicker('option', 'minDate', minDate);
      }
    });
    $('#dt2').datepicker({
      dateFormat: "dd-M-yy",
      minDate: 0
    });
  });
</script>
<script>
  var today = new Date();
  $(function() {
    $('.reserved').daterangepicker({
      autoApply: true,
      autoUpdateInput: true,
      minDate: today,
      locale: {
        format: 'DD-MM-YYYY'
      },
      "opens": "center",
      "drops": "auto"
    }, function(start, end, label) {
      $('#date1').val(start.format('DD-MM-YYYY'));
      $('#date2').val(end.format('DD-MM-YYYY'));
      let hotel_start_date = start.format('DD-MM-YYYY');
      let hotel_end_date = end.format('DD-MM-YYYY');
      checkSameDate(hotel_start_date, hotel_end_date);
    });
  });

  function checkSameDate(start, end) {
    let hotel_start_date = start;
    let hotel_end_date = end;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type: 'POST',
      url: "{{url('/checkValidHotelDaterange')}}",
      data: {
        hotel_start_date: hotel_start_date,
        hotel_end_date: hotel_end_date,
        _token: CSRF_TOKEN
      },
      dataType: 'JSON',
      success: function(response) {
        if (response.status == 'sameDateError') {
          error_noti(response.msg);
          setTimeout(function() {
            window.location.reload()
          }, 2000);
        }
      }
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#filterform').on('change', function() {

      var $this = $(this);
      var frmValues = $this.serialize();

      $('#loading-image').show();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        method: 'POST',
        url: "{{url('hote_list_ajax')}}",
        data: frmValues,
        dataType: 'json',
        success: function(response) {
          //console.log(response);
          $('#filterdata').html(response);
          $('#loading-image').hide();

        }
      });

    });

  });
</script>

<script type="text/javascript">
  $(".show-more").click(function() {
    if ($(".text").hasClass("show-more-height")) {
      $(this).text("Show less");
    } else {
      $(this).text("Show all");
    }

    $(".text").toggleClass("show-more-height");
  });
</script>
<script>
  $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
      $('#dynamic').addClass('newClass');
      $('#locat-h').addClass('hotel-type');
      $('#header').addClass('hotel-type');


      $('#hotel-form1').addClass('input-box');
      $('#logo-s').addClass('logo-z');
      $('#dynamic').removeClass('sticky-sec');

    } else {
      $('#dynamic').removeClass('newClass');
      $('#locat-h').removeClass('hotel-type');
      $('#header').removeClass('hotel-type');
      $('#hotel-form1').removeClass('input-box');
      $('#logo-s').removeClass('logo-z');
      $('#dynamic').addClass('sticky-sec');

    }
  });
</script>

<script>
  $(document).ready(function() {
    $('.minus').click(function() {
      var $input = $(this).parent().find('input');
      var count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
      $("#guest_number").val(count);
      $("#btnGuestNumber").html(count + " Person");
      $input.change();
      return false;
    });
    $('.plus').click(function() {
      var $input = $(this).parent().find('input');
      $input.val(parseInt($input.val()) + 1);
      $("#guest_number").val(parseInt($("#guest_number").val()) + 1);
      var count = $("#guest_number").val();
      $("#btnGuestNumber").html(count.toString() + " Person");
      $input.change();
      return false;
    });
  });
</script>

@endsection

@section('content')

<style type="text/css">
  .owl-carousel .owl-stage-outer {
    position: relative;
    overflow: inherit !important;
    -webkit-transform: translate3d(0px, 0px, 0px);
  }

  .testimonials .testimonial-wrap {
    padding-left: 1px !important;
  }

  .sider-page .row label,
  .row p {
    padding: 1px;
  }
</style>


<!-- slider -->
<main id="main">
  <section id="dynamic" class="sticky-sec" style="">
    <div class="logo-s col-md-2" id="logo-s"><a href="https://votivetechnologies.in/roadNstays" class="logo mr-auto"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/road-logo-white.png" alt="" class="img-fluid"></a></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="event-locaatio">
            <!-- <small><a href="#"> Home </a>/ <a href="#"> Event </a> </small> -->

            <div class="hotel-typ">
              <h3 id="locat-h">Hotels in {{$location}}</h3>
              <form method="GET" action="{{url('hotelList')}}">
                @csrf
                <div id="hotel-form1" class="row  align-items-center hotel-form1">

                  <div class="col-md-4 filter_01 pr-0 h-hotel pl-0">
                    <!-- <p>Where To</p>  -->
                    <span id="i-1" class="span3 form-control-lo"><i class="bx bx-map"></i>

                      <input type="location" name="location" placeholder="Location, City, Place" class="locatin-hotel" id="autocomplete" required="" value="{{$location}}">
                      <input type="hidden" name="hotel_latitude" id="hotel_latitude" value="{{$hotel_latitude}}">
                      <input type="hidden" name="hotel_longitude" id="hotel_longitude" value="{{$hotel_longitude}}">
                    </span>
                  </div>

                  <div class="col-md-2 filter_01 pr-0 reserved">
                    <!-- <p>Check_in</p> -->
                    <input type="text" name="check_in" id="date1" placeholder="Check-in" required="" value="{{date('d-M-y', strtotime($check_in))}}">
                    <!-- <input type="text" name="check_in" id="dt1" placeholder="Check-in" required="" value="<?php echo date("d-M-y"); ?>"> -->
                  </div>
                  <div class="col-md-2 filter_01 pr-0 reserved">
                    <!-- <p>Check_out</p> -->
                    <input type="text" name="check_out" id="date2" placeholder="Check-Out" required="" value="{{date('d-M-y', strtotime($check_out))}}">
                    <!-- <input type="text" name="check_out" id="dt2" placeholder="Check-Out" required="" value="<?php echo date("d-M-y", strtotime("+ 1 day")); ?> "> -->
                  </div>
                  <div class="col-md-2 filter_01 pr-0 guest-no1">
                    <!-- <p>Person</p> -->

                    <div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="btnGuestNumber" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (!empty($person)) {
                          echo $person;
                        } else {
                          echo "1";
                        } ?> Person
                      </button>
                      <input type="hidden" id="guest_number" name="person" value="{{$person}}">
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" href="#"><span>Adult(12+ Years)</span>
                            <div class="number">
                              <button class="minus" data-quantity="minus" data-field="quantity">-</button>
                              <input type="text" value="{{$person}}" />
                              <button class="plus" data-quantity="plus" data-field="quantity">+</button>
                            </div>
                          </a>
                        </li> 
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-2 filter_01 pr-0" id="i-5">
                    <button><i class="bx bx-search"></i></button>
                  </div>


                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>



  </section>

  <section>
    <div class="container-fluid">
      <div class="wrapper-d d-flex justify-content-between">
        <div class="hotel-list sticky w-25 h-100">

          <div class="filter-row">

            <form method="POST" id="filterform" action="{{url('hotel_list_ajax')}}" enctype="multipart/form-data">

              @csrf

              <h6>Filter</h6>
              <div class="category category-0">
                <p>Distance</p>
                <ul>
                  <li><label><input type="checkbox" name="distance[]" id="" value="1">Less than 1 Mile<label></li>
                  <li><label><input type="checkbox" name="distance[]" id="" value="3">Less than 3 Mile<label></li>
                  <li><label><input type="checkbox" name="distance[]" id="" value="5">Less than 5 Mile<label></li>
                  <li><label><input type="checkbox" name="distance[]" id="" value="7">Less than 7 Mile<label></li>

                </ul>
              </div>

              <div class="category category-1">
                <p>Your Budget (per night)</p>
                <ul>
                  <li><label><input type="checkbox" name="budget[]" id="" value="1">0 - 5000</label></li>
                  <li><label><input type="checkbox" name="budget[]" id="" value="2">5000 - 10000</label></li>
                  <li><label><input type="checkbox" name="budget[]" id="" value="3">10000 - 15000</label></li>
                  <li><label><input type="checkbox" name="budget[]" id="" value="4">15000 - 20000</label></li>
                  <li><label><input type="checkbox" name="budget[]" id="" value="5">20000 +</label></li>

                </ul>
              </div>

              <div class="category category-2">
                <p>Star Rating</p>
                <ul>
                  <li><label><input type="checkbox" name="star[]" id="" value="1"><i class='bx bxs-star'></i><label></li>
                  <li><label><input type="checkbox" name="star[]" id="" value="2"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                  <li><label><input type="checkbox" name="star[]" id="" value="3"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                  <li><label><input type="checkbox" name="star[]" id="" value="4"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                  <li><label><input type="checkbox" name="star[]" id="" value="5"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><label></li>
                </ul>
              </div>

              <div class="category category-3">
                <p>Room-Wise</p>
                <ul>
                  <?php foreach ($room_wise as $key => $value) { ?>

                    <li><label><input type="checkbox" name="roomwise[]" id="" value="{{$value->id}}">{{$value->title}}</label></li>

                  <?php } ?>

                </ul>
              </div> 

              <div class="category category-4">
                <p>Emenites</p>
                <!--<input type="Search" name="" id="" placeholder="search anything!">-->

                <div id="profile-description">
                  <div class="text show-more-height">

                    <ul>
                      <?php foreach ($emenites as $key => $value) { ?>

                        <li><label><input type="checkbox" name="emenites[]" id="" value="{{$value->amenity_id}}">{{$value->amenity_name}}</label></li>

                      <?php } ?>

                    </ul>

                  </div>
                  <div class="show-more">Show all</div>
                </div>

              </div>

              <div class="category category-5">
                <p>Property type</p>
                <ul>
                  <?php foreach ($property_type as $key => $value) { ?>

                    <li><label><input type="checkbox" name="property[]" id="" value="{{$value->id}}">{{$value->stay_type}}</label></li>

                  <?php } ?>

                </ul>
              </div>

            </form>

          </div>
        </div>



        <div class="gird-event hotel-list w-75 row pt-3" id="filterdata">
          <div class="">
            <div class="col-md-12">

              <span><img id="loading-image" src="{{asset('resources/assets/img/loading.gif')}}" style="display: none;"></span>

              @if (!empty($hotel_data))
              <div class="col-md-12 pro-fund p-0">
                <h2>{{$location}}: {{$hotelcount}} Hotel found</h2>
              </div>

              @foreach($hotel_data as $hotel)
              <div class="event-br">
                <div class="img-list-event">
                  <img src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel['hotel_gallery']}}" class="">
                  <!-- <div class="ribbon"><span>POPULAR</span></div> -->
                  <label class="add-fav">
                    <input type="checkbox" />
                    <i class="icon-heart">

                    </i>
                  </label>
                </div>
                <div class="tect-event d-flex align-items-start flex-column bd-highlight mb-3">
                  <div class="mb-auto w-100">
                    <div class="list-header">
                      <div class="info-details">
                        <h3>{{$hotel['hotel_name']}}</h3>
                        <p><i class="bx bx-map"></i> {{$hotel['hotel_address']}},{{$hotel['hotel_city']}}</p>

                      </div>
                      <a href="{{url('/hotelDetails')}}?hotel_id={{base64_encode($hotel['hotel_id'])}}&check_in={{base64_encode($check_in)}}&check_out={{base64_encode($check_out)}}&person={{base64_encode($person)}}" class="book-btn" target="_blank">View Room</a>

                    </div>

                    <div class="mb-1 d-flex" id="rating-ability-wrapper">
                      <label class="control-label" for="rating">
                        <span class="field-label-info"></span>
                        <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                      </label>
                      @if ($hotel['hotel_rating'] === 5)
                      <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                      <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="4" id="rating-star-4"> <i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="5" id="rating-star-5"><i class='bx bxs-star'></i></button>
                      @elseif ($hotel['hotel_rating'] === 4)
                      <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                      <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="4" id="rating-star-4"> <i class='bx bxs-star'></i></button>
                      @elseif ($hotel['hotel_rating'] === 3)
                      <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                      <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
                      <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
                      @elseif ($hotel['hotel_rating'] === 2)
                      <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                      <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
                      @else
                      <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                      @endif
                      <span class="rvw">26412 review</span>
                    </div>
                    <b> {{$hotel['property_contact_name']}}</b>
                    <!-- <p class="p-0"> {{$hotel['hotel_content']}}.</p> -->
                  </div>
                  <div class="w-100">
                    <div class="time-event-bn">
                      <div class="botm-icom">
                        @foreach($hotel['hotel_amenities'] as $amenities)
                        <a href="#"><i class='bx bx-check'></i> <label>{{$amenities->amenity_name}}</label> </a> 
                        @endforeach 
                      </div> 

                      <div class="pric-off"> 
                        <h5>PKR {{$hotel['stay_price']}}/- </h5> 
                      </div> 

                    </div>
                  </div>
                  <div class="room-avail">
                    <i class='bx bxs-hotel'></i>
                    Available
                  </div>
                </div>
              </div>
              @endforeach
              @else

              @endif

            </div>
          </div>

          <!-- <nav aria-label="Page navigation" class="pagination-list">
          <ul class="pagination">
          <li class="page-item "><a class="page-link" href="#">«</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
          </nav> -->



          {!! $hotels->render() !!}
        </div>

      </div>

    </div>
    </div>
    </div>



  </section>

</main>
<!-- End #main -->

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        dfsf dfsdf s//
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close</button>
          </div>

          <div class="btn-group" role="group">
            <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  let modalId = $('#image-gallery');

  $(document)
    .ready(function() {

      loadGallery(true, 'a.thumbnail');

      //This function disables buttons when needed
      function disableButtons(counter_max, counter_current) {
        $('#show-previous-image, #show-next-image')
          .show();
        if (counter_max === counter_current) {
          $('#show-next-image')
            .hide();
        } else if (counter_current === 1) {
          $('#show-previous-image')
            .hide();
        }
      }



      function loadGallery(setIDs, setClickAttr) {
        let current_image,
          selector,
          counter = 0;

        $('#show-next-image, #show-previous-image')
          .click(function() {
            if ($(this)
              .attr('id') === 'show-previous-image') {
              current_image--;
            } else {
              current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
          });

        function updateGallery(selector) {
          let $sel = selector;
          current_image = $sel.data('image-id');
          $('#image-gallery-title')
            .text($sel.data('title'));
          $('#image-gallery-image')
            .attr('src', $sel.data('image'));
          disableButtons(counter, $sel.data('image-id'));
        }

        if (setIDs == true) {
          $('[data-image-id]')
            .each(function() {
              counter++;
              $(this)
                .attr('data-image-id', counter);
            });
        }
        $(setClickAttr)
          .on('click', function() {
            updateGallery($(this));
          });
      }
    });

  // build key actions
  $(document)
    .keydown(function(e) {
      switch (e.which) {
        case 37: // left
          if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
            $('#show-previous-image')
              .click();
          }
          break;

        case 39: // right
          if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
            $('#show-next-image')
              .click();
          }
          break;

        default:
          return; // exit this handler for other keys
      }
      e.preventDefault(); // prevent the default action (scroll / move caret)
    });
</script>



<script type="text/javascript">
  $(function() {
    // ADDING DATA
    (function() {
      var inc = 0;
      $('.sc-sp-data-dis').each(function() {
        $(this).attr('data-scsp', "data" + inc)
        inc++;
      });
    })();
    (function() {
      var inc = 0;
      $('.sc-sp-list').each(function(ev) {
        $(this).attr('data-scsp', "data" + inc)
        inc++;
      });
    })();

    $(window).on("load scroll", function() {
      var windowScroll = $(this).scrollTop();
      $(".sc-sp-data-dis").each(function() {
        var thisOffsetTop = Math.round($(this).offset().top - 30);

        if (windowScroll >= thisOffsetTop) {
          var thisAttr = $(this).attr('data-scsp');
          $('.sc-sp-list').parent().removeClass("active");
          $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
        }
      });
    });

    $('.sc-sp-list').click(function(ev) {
      ev.preventDefault();
      var thisAttr = $(this).attr("data-scsp");
      var scrollTo = $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').offset().top;

      $(this).parent().addClass("active").siblings().removeClass("active");

      $(".sc-sp-data-dis").removeClass("active");
      $('.sc-sp-data-dis[data-scsp="' + thisAttr + '"]').addClass("active");

      $('html, body').animate({
        scrollTop: scrollTo - 5
      }, 150);
    });



  });


  $(function() {
    $(document).on("click", "#pagination a,#search_btn", function() {

      //get url and make final url for ajax 
      var url = $(this).attr("href");
      var append = url.indexOf("?") == -1 ? "?" : "&";
      var finalURL = url + append + $("#searchform").serialize();

      //set to current url
      window.history.pushState({}, null, finalURL);

      $.get(finalURL, function(data) {

        $("#pagination_data").html(data);

      });

      return false;
    })

  });
</script>


<!-- End #main -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

@endsection