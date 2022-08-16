
      <div class="row pt-3">
         <div class="col-md-12">

         <span><img id="loading-image" src="{{asset('resources/assets/img/loading.gif')}}" style="display: none;"></span>

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

               <div class="col-md-12 pro-fund p-0">
                  <h2>{{$location}}: {{$hotelcount}} Hotel found</h2>
               </div>

               @endif

            </div>     
	<div id="ajaxpage">{!! $hotels->render() !!}</div>

   </div>

   <script type="text/javascript">
      
      $('a').on('click',function(){ 

      var urls = $(this).attr('href');

      var parts = urls.split("/");
      var last_part = parts[parts.length-1];

      var parts1 = last_part.split("?");
      var last_part2 = parts1[parts1.length-2];

    if(last_part2=='hote_list_ajax'){

    $('#loading-image').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method:'GET',
        url: urls,
        data:{},
        dataType:'json',
        success:function(response) {
          //console.log(response);
          $('#filterdata').html(response);
          $('#loading-image').hide();

        }
     });

     return false;

     }

      return true;
   
   }); 
     
   </script>