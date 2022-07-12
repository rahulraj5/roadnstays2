@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



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
	$(document).ready(function () {

        $("#dt1").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect: function () {
                var dt2 = $('#dt2');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                var dt2Date = dt2.datepicker('getDate');
                //difference in days. 86400 seconds in day, 1000 ms in second
                var dateDiff = (dt2Date - minDate)/(86400 * 1000);
                
                startDate.setDate(startDate.getDate() + 30);
                if (dt2Date == null || dateDiff < 0) {
                		dt2.datepicker('setDate', minDate);
                }
                else if (dateDiff > 30){
                		dt2.datepicker('setDate', startDate);
                }
                //sets dt2 maxDate to the last day of 30 days window
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
.sider-page .row label, .row p{
	padding: 1px;
}
</style>


<!-- slider -->
<main id="main">
   <section class="user-section" style="padding-top: 100px; background-color: #f6f6f6;">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 ">
         <div class="event-locaation mb-4">
            <!-- <small><a href="#"> Home </a>/ <a href="#"> Event </a> </small> -->
            
            <div class="hotel-type">
            <h3>Hotels in India, Asia</h3>
            <form method="GET" action="{{url('hotelList')}}">
              @csrf
               <div class="row">
                  <div class="col-md-4 filter_01 pr-0 h-hotel pl-0">
                 <!-- <p>Where To</p>  -->
                     <span class="span3 form-control-lo"><i class="bx bx-map"></i>
                     
                     <input type="location" name="location" placeholder="Location, City, Place" class="locatin-hotel" id="autocomplete" required="" value="{{$location}}">
                     <input type="hidden"  name="hotel_latitude" id="hotel_latitude" value="{{$hotel_latitude}}">
                     <input type="hidden"  name="hotel_longitude" id="hotel_longitude" value="{{$hotel_longitude}}">
                 	</span>
                  </div>

                  <div class="col-md-2 filter_01 pr-0 ">
                  <!-- <p>Check_in</p> -->
                  <input type="text" name="check_in" id="dt1" placeholder="Check-in" required="" value="{{date('d-M-y', strtotime($check_in))}}">
                  <!-- <input type="text" name="check_in" id="dt1" placeholder="Check-in" required="" value="<?php echo date("d-M-y");?>"> -->
                  </div>
                  <div class="col-md-2 filter_01 pr-0">
                  <!-- <p>Check_out</p> -->
                   <input type="text" name="check_out" id="dt2" placeholder="Check-Out" required="" value="{{date('d-M-y', strtotime($check_out))}}">
                   <!-- <input type="text" name="check_out" id="dt2" placeholder="Check-Out" required="" value="<?php echo date("d-M-y", strtotime("+ 1 day"));?> "> -->
                  </div>
                  <div class="col-md-2 filter_01 pr-0 ">
                    <!-- <p>Person</p> -->
                     <select class="h-siz" name="person">
                        <option>1 Person </option>
                        <option>2 Person</option>
                        <option>3 Person</option>
                        <option>Couple</option>
                        <option>Fammily</option>
                     </select>
                  </div>
                  <div class="col-md-2 filter_01 pr-0">
                  <input type="submit" value="Find" class="hotel-btn pull-right">
                  </div>
                  
               </div>
              
            </form>
         </div>
         </div>
         
      </div>
      <div class="col-md-3">
         <div class="filter-row">
            
            
               
                  <!-- <div class="form-group-ser">
                     <input type="checkbox" id="html">
                     <label for="html">Breakfast included</label>
                  </div>
                  <div class="form-group-ser">
                     <input type="checkbox" id="css">
                     <label for="css">House</label>
                  </div>
                  <div class="form-group-ser">
                     <input type="checkbox" id="javascript">
                     <label for="javascript">All-inclusive plan available</label>
                  </div> -->
                  <h6>Filter</h6>
        <div class="category category-1">
        <p> budget (per night)</p>
        <ul>
            <li><label><input type="checkbox" name="budget" id="">0 - 5000</label></li>
            <li><label><input type="checkbox" name="budget" id="">5000-7500</label></li>
            <li><label><input type="checkbox" name="budget" id="">7500 - 10000</label></li>
            <li><label><input type="checkbox" name="budget" id="">10000 - 20000</label></li>
            <li><label><input type="checkbox" name="budget" id="">20000 - 25000</label></li>
            <li><label><input type="checkbox" name="budget" id="">Other</label></li>
            
        </ul>
        </div>

        <div class="category category-2">
            <p>Star Category</p>
            <ul>
                <li><label><input type="checkbox" name="star" id="">5 star<label></li>
                <li><label><input type="checkbox" name="star" id="">4 star<label></li>
                <li><label><input type="checkbox" name="star" id="">3.5 star<label></li>
                <li><label><input type="checkbox" name="star" id="">3 star<label></li>
                
            </ul>
        </div>

        <div class="category category-3">
            <p>Room-Wise</p>
            <ul>
                <li><label><input type="checkbox" name="Room-Wise" id="">Room-Wise</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">double Bedroom</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">Bedroom with suite</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">Suite</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">Hall</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">Hall with double room</label></li>
                <li><label><input type="checkbox" name="Room-Wise" id="">Room with balcony</label></li>
                
               
            </ul>
        </div>

        <div class="category category-4">
            <p>Meals</p>
            <ul>
                <li><label><input type="checkbox" name="Meals" id="">Breakfast</label></li>
                <li><label><input type="checkbox" name="Meals" id="">Lunch</label></li>
                <li><label><input type="checkbox" name="Meals" id="">Dinner</label></li>
                <li><label><input type="checkbox" name="Meals" id="">Breakfast with dinner</label></li>
                
            </ul>
        </div>
        <div class="category category-4">
            <p>Emenites</p>
            <input type="Search" name="" id="" placeholder="search anything!">
           
        </div>
        <div class="category category-5">
            <p>Property type</p>
            <ul>
                <li><label><input type="checkbox" name="" id="">Hotels</label></li>
                <li><label><input type="checkbox" name="" id="">Villa</label></li>
                <li><label><input type="checkbox" name="" id="">Bed and breakfasts</label></li>
                <li><label><input type="checkbox" name="" id="">Resorts</label></li>
                <li><label><input type="checkbox" name="" id="">Country houses</label></li> 
            </ul>
        </div>
         </div>
      </div>
      <div class="col-md-9 gird-event">
         <div class="row pt-3">
            <div class="col-md-12">
              @if (!empty($hotel_data))
               <div class="col-md-12 pro-fund p-0">
                  <h2>{{$location}}: {{$hotelcount}} Hotel found</h2>
               </div>

               @foreach($hotel_data as $hotel)
               <div class="event-br">
                  <div class="img-list-event">
                     <img src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel['hotel_gallery']}}">
                     <!-- <div class="ribbon"><span>POPULAR</span></div> -->
                  </div>
                  <div class="tect-event d-flex align-items-start flex-column bd-highlight mb-3">
                     <div class="mb-auto w-100">
					 <div class="list-header">
						<div class="info-details">
							<h3>{{$hotel['hotel_name']}}</h3>
							<p><i class="bx bx-map"></i> {{$hotel['hotel_address']}},{{$hotel['hotel_city']}}</p>

						</div>
                  <a href="{{url('/hotelDetails')}}?hotel_id={{base64_encode($hotel['hotel_id'])}}&check_in={{base64_encode($check_in)}}&check_out={{base64_encode($check_out)}}" class="book-btn" target="_blank">View Room</a>
                  
						<!-- <div class="review-count">
							<div class="info_rev">
							  <p>287 reviews</p>
							</div>
							<div class="rating_rev">
								<span>{{$hotel['hotel_rating']}}</span>
							</div>
                        </div> -->
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

                              <!-- <a href="#"><i class='bx bx-wifi'></i> <label>Free Wifi</label> </a>
                              <a href="#"><i class='bx bxs-parking'></i>  <label>Free parking</label> </a>
                              <a href="#"><i class='bx bx-food-menu'></i>  <label>Restaurant</label> </a>
                              <a href="#"><i class='bx bx-rectangle'></i> <label>Room service</label> </a>
                              <a href="#"><i class='bx bx-camera-home'></i> <label> Safety measures</label> </a> -->
                           </div>
                           
                           
                           
                           <div class="pric-off">
                              <span>20% Off</span>
                              <h5>PKR {{$hotel['stay_price']}}/- </h5>
                              <!-- <div><small>+₹400 taxes and charges</small></div> -->
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
               <!-- <div class="event-br">
                  <div class="img-list-event">
                     <img src="assets/img/pany.png">
                  </div>
                  <div class="tect-event d-flex align-items-start flex-column bd-highlight mb-3">
                     <div class="mb-auto w-100">
                        <h3>JW Marriott Hotel New Delhi Aerocity </h3>
                        <div class="mb-1 d-flex" id="rating-ability-wrapper">
                           <label class="control-label" for="rating">
                           <span class="field-label-info"></span>
                           <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                           </label>
                           <button type="button" class="btnrating btn" data-attr="1" id="rating-star-1"><i class='bx bxs-star'></i> </button>
                           <button type="button" class="btnrating btn" data-attr="2" id="rating-star-2"><i class='bx bxs-star'></i></button>
                           <button type="button" class="btnrating btn" data-attr="3" id="rating-star-3"><i class='bx bxs-star'></i></button>
                           <button type="button" class="btnrating btn" data-attr="4" id="rating-star-4"> <i class='bx bxs-star'></i></button>
                           <button type="button" class="btnrating btn" data-attr="5" id="rating-star-5"><i class='bx bxs-star'></i></button>
                        </div>
                        <b> Comfiest Beds, Delicous Breakfast </b>
                        <p class="p-0">
                           stay at unbetable reates with complimentary breakfast and wi-fi. free stay for kids below 12 year of age.
                        </p>
                     </div>
                     <div class="w-100">
                        <div class="time-event-bn">
                           <div class="botm-icom">
                              <a href="#"><i class='bx bx-wifi'></i> <label>Free Wifi</label> </a>
                              <a href="#"><i class='bx bxs-parking'></i>  <label>Free parking</label> </a>
                              <a href="#"><i class='bx bx-food-menu'></i>  <label>Restaurant</label> </a>
                              <a href="#"><i class='bx bx-rectangle'></i> <label>Room service</label> </a>
                              <a href="#"><i class='bx bx-camera-home'></i> <label> Safety measures</label> </a>
                           </div>
                           <div class="pric-off">
                              <span>20% Off</span>
                              <h5>PKR 125/- </h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
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
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
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
  .ready(function () {

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
        .click(function () {
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
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
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
  
  $(function () {
    // ADDING DATA
    (function () {
        var inc = 0;
        $('.sc-sp-data-dis').each(function () {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
        });
    })();
    (function () {
        var inc = 0;
        $('.sc-sp-list').each(function (ev) {
            $(this).attr('data-scsp', "data" + inc)
            inc++;
        });
    })();

    $(window).on("load scroll", function () {
        var windowScroll = $(this).scrollTop();
        $(".sc-sp-data-dis").each(function () {
            var thisOffsetTop = Math.round($(this).offset().top - 30);

            if (windowScroll >= thisOffsetTop) {
                var thisAttr = $(this).attr('data-scsp');
                $('.sc-sp-list').parent().removeClass("active");
                $('.sc-sp-list[data-scsp="' + thisAttr + '"]').parent().addClass("active");
            }
        });
    });

    $('.sc-sp-list').click(function (ev) {
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

<script>
  
</script>





<!-- End #main -->



@endsection