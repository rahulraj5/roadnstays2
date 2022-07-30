@extends('front.layout.layout')

<!-- @section('title', 'User - Profile') -->

@section('current_page_css')
 <link href="{{url('/')}}/resources/assets/css/slick.min.css" rel="stylesheet">
@endsection
 
@section('current_page_js')
<script src="{{url('/')}}/resources/assets/js/slick.js"></script>
<script>
   $(".slick1").slick({
    rows: 1,
    dots: false,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 5,
    
    
    responsive: [
           {
               breakpoint: 980, // tablet breakpoint
               settings: {
                   slidesToShow: 4,
                   slidesToScroll: 4
               }
           },
           {
               breakpoint: 480, // mobile breakpoint
               settings: {
                   slidesToShow: 2,
                   slidesToScroll: 2
               }
           }
       ]
   });
</script>
@endsection 
@section('content')

@php $country_name = DB::table('country')->where('id', $country_id)->first(); @endphp
<main id="main" class="main-body">
        <section class="tl-1">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://source.unsplash.com/random/900×700/?tour" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <p>Amazing Holidays to {{$country_name->name}}</p>
                            <h5>{{$country_name->name}} Tour Packages</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-tour">
            <div class="container">
                <h5 class="pop-head">Popular {{$country_name->name}} Holiday Packages</h5>
                <div class="row">
                    @foreach($tour_data as $trip)
                    <?php  $nights = $trip->tour_days-1; ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="tour_package">
                            <div class="img_div"> <a href="{{url('tour_details')}}/{{$trip->id}}">
                                <img alt="image"
                                        nitro-lazy-src="{{url('/')}}/public/uploads/tour_gallery/{{$trip->tour_feature_image}}"
                                        class="img-responsive hoverZoomLink lazyloaded" nitro-lazy-empty=""
                                        id="MjkzOjI3Ng==-1"
                                        src="{{url('/')}}/public/uploads/tour_gallery/{{$trip->tour_feature_image}}"></a>
                                <figcaption class=" lazyloaded">
                                    <p><a href="{{url('tour_details')}}/{{$trip->id}}">{{$nights}} Nights / {{$trip->tour_days}} Days</a></p>
                                </figcaption>
                            </div> 
                            <a href="{{url('tour_details')}}/{{$trip->id}}">
                                <h2 class="pull-left">{{$trip->tour_title}}</h2>
                            </a>
                        </div>
                    </div>
                  
                    @endforeach
                </div>
            </div>

        </section> 


        <section class="best-sell card-design">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="section-title t01">
                    <h4>Best Selling Tours</h4>
                    <span class="separator01"></span>
                </div>
                <div class="slick-wrapper list-place">
                    <div class="slick1">
                      @foreach($tour_data_countries as $trip_country)
                       <div class="slide-item">
                          <a href="{{url('/tour_list_country')}}/{{$trip_country->country_id}}" target="_blank">
                          <div class="image-lists">
                             <img src="{{url('/')}}/public/uploads/tour_gallery/{{$trip_country->tour_feature_image}}">
                          </div>
                          <div class="name-lists">
                             <h3>{{ ucfirst(strtolower(trans($trip_country->country_name))) }}</h3>
                             <h6>starting from ${{$trip_country->tour_price}}</h6>
                          </div>
                          </a>
                       </div>
                       @endforeach 
                    </div>
                </div>
            </div>
        </section>  


    </main>
    <!-- End #main -->
    <!-- End #main -->


@endsection

@section('current_page_js')
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



<script type="text/javascript">
  
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>

<script type="text/javascript">
  
    jQuery(document).ready(function($){
      
  $(".btnrating").on('click',(function(e) {
  
  var previous_value = $("#selected_rating").val();
  
  var selected_value = $(this).attr("data-attr");
  $("#selected_rating").val(selected_value);
  
  $(".selected-rating").empty();
  $(".selected-rating").html(selected_value);
  
  for (i = 1; i <= selected_value; ++i) {
  $("#rating-star-"+i).toggleClass('btn-warning');
  $("#rating-star-"+i).toggleClass('btn-default');
  }
  
  for (ix = 1; ix <= previous_value; ++ix) {
  $("#rating-star-"+ix).toggleClass('btn-warning');
  $("#rating-star-"+ix).toggleClass('btn-default');
  }
  
  }));
  
    
});

</script>




@endsection
