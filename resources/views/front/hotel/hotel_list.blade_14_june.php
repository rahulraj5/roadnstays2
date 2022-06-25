@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')



@endsection



@section('current_page_js')


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
      <div class="container">
      <div class="row">
      <div class="col-md-12 ">
         <div class="event-locaation mb-4">
            <small><a href="#"> Home </a>/ <a href="#"> Event </a> </small>
            <h3>Hotels in India, Asia</h3>
         </div>
         <div class="hotel-type">
            <form>
               <div class="row">
                  <div class="col-md-4 pr-0 h-hotel ">
                     <span class="span3 form-control-lo"><i class="bx bx-map"></i>
                     <input type="location" name="location" placeholder="Destination" class="locatin-hotel"></span>
                  </div>
                  <div class="col-md-2 pr-0">
                     <input type="date" name="firstname" placeholder="Event name" class="h-siz">
                  </div>
                  <div class="col-md-2 pr-0">
                     <input type="date" name="firstname" placeholder="Event name" class="h-siz">
                  </div>
                  <div class="col-md-2 pr-0">
                     <select class="h-siz">
                        <option>1 </option>
                        <option>2</option>
                        <option>3</option>
                     </select>
                  </div>
                  <div class="col-md-2 pr-0">
                     <input type="submit" value="Find" class="hotel-btn pull-right">
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="col-md-3">
         <div class="filter-box">
            <h4>Filter </h4>
            <div class="new-ser">
               <form>
                  <div class="form-group-ser">
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
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-9 gird-event">
         <div class="row pt-3">
            <div class="col-md-12">
               <div class="col-md-12 pro-fund p-0">
                  <h2>Goa: 847 Hotel found</h2>
               </div>
               @foreach($hotel_data as $hotel)
               <div class="event-br">
                  <div class="img-list-event">
                     <img src="{{url('public/uploads/hotel_gallery/')}}/{{$hotel['gallary'][0]['img_name']}}">
                  </div>
                  <div class="tect-event d-flex align-items-start flex-column bd-highlight mb-3">
                     <div class="mb-auto w-100">
                        <h3>{{$hotel['hotel_name']}}</h3>
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
                        <b> {{$hotel['property_contact_name']}}</b>
                        <p class="p-0"> {{$hotel['hotel_content']}}.</p>
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
                              <h5>PKR {{$hotel['stay_price']}}/- </h5>
                              <!-- <div><small>+₹400 taxes and charges</small></div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
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
</script>




<!-- End #main -->



@endsection