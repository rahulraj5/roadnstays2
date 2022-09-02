@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style type="text/css">
    .owl-carousel .owl-stage-outer {
        position: relative;
        overflow: inherit !important;
        -webkit-transform: translate3d(0px, 0px, 0px);
    }

    .testimonials .testimonial-wrap {
        padding-left: 1px !important;
    }
</style>

<style type="text/css">
    .cate-text-icon-img .owl-carousel .item {
        background: #FFF;
        padding: 0px;
        height: auto;
    }

    .cate-text-icon-img .owl-carousel .owl-item img {
        display: block;
        width: 100%;
        border-radius: 10px;
        height: 282px !important;
    }

    /*.cate-text-icon-img .owl-theme .owl-nav {
    margin-top: 10px;
    position: absolute;
    z-index: 999999;
    top: 81px;
    font-size: 43px;
    display: flex;
     justify-content: space-between; 
    color: #FFFF;
    }*/
    .cate-text-icon-img .owl-prev {}

    .owl-theme .owl-nav {
        margin-top: 10px;
        position: relative;
        bottom: 78px;
        color: #f1f3f4;
        font-size: 42px;
    }

    .btns {
        display: table;
        margin: 30px auto;
    }

    .customNextBtn,
    .customPreviousBtn {
        float: right;
        background: #2d9070;
        color: #fff;
        padding: 10px;
        margin-left: 5px;
        cursor: pointer;
    }

    .cate-text-icon-img .owl-theme .owl-nav [class*=owl-]:hover {
        background: inherit;
        color: #FFF;
        text-decoration: none;
    }
</style>

<style>
    .hidden {
        display: none;
    }

    .hiddenPrice {
        display: none;
    }
</style>

@endsection

@section('current_page_js')

<script>
    $(document).ready(function() {
        const maxLoad = 4

        function showEl(el) {
            return el.removeClass('hidden')
        }

        function showMore(el) {
            return el.addClass('last-galimg')
        }

        function showSecond(el) {
            return el.addClass('third-galimg')
        }

        $('.hidden').each(function(index) {
            if (index < maxLoad) {
                if (index < 3) {
                    showEl($(this));
                }
                if (index === 1) {
                    showSecond($(this));
                }
                if (index === 3) {
                    showEl($(this));
                    showMore($(this));
                    $('<a href="#">see more</a>').insertAfter('img:eq(5)');
                }
            }
        })
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
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
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
    jQuery(document).ready(function($) {

        $(".btnrating").on('click', (function(e) {

            var previous_value = $("#selected_rating").val();

            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }

        }));


    });
</script>

<script type="text/javascript">
    // $('.portfolio-item').isotope({
    //    itemSelector: '.item',
    //    layoutMode: 'fitRows'
    //  });
    $('.portfolio-menu ul li').click(function() {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1,
            dots: false,
            autoplay: true,
            responsiveClass: true,
        });

    });
</script>

<script>
    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);

    // var disabledArr1 = ["09/01/2022","09/02/2022"];
    var disabledArr = JSON.parse('<?php echo $space_booked_date; ?>');
    $(function() {
        $('.reserved').daterangepicker({
            isInvalidDate: function(arg) {
                var thisMonth = arg._d.getMonth() + 1;
                if (thisMonth < 10) {
                    thisMonth = "0" + thisMonth;
                }
                var thisDate = arg._d.getDate();
                if (thisDate < 10) {
                    thisDate = "0" + thisDate;
                }
                var thisYear = arg._d.getYear() + 1900;
                var thisCompare = thisMonth + "/" + thisDate + "/" + thisYear;
                if ($.inArray(thisCompare, disabledArr) != -1) {
                    return true;
                }
            },
            // linkedCalendars: true,
            // "startDate": today,
            // "endDate": tomorrow,
            // datesDisabled:["08/17/2022","08/28/2022","08/02/2022","08/23/2022"],  
            "autoApply": true,
            "autoUpdateInput": true,
            minDate: today,
            locale: {
                format: 'DD-MM-YYYY',
                cancelLabel: 'Clear',
                customRangeLabel: 'Custom'
            },
            // defaultDate: new Date(),
            // minDate: today_date,
            "opens": "center",
            "drops": "auto"
        }, function(start, end, label) {
            console.log(end.format('DD-MM-YYYY'));
            $('#space_checkin_date').val(start.format('DD-MM-YYYY'));
            $('#space_checkout_date').val(end.format('DD-MM-YYYY'));

            let space_start_date = start.format('DD-MM-YYYY');
            let space_end_date = end.format('DD-MM-YYYY');

            chekchange(space_start_date, space_end_date);
            // }).on("change", function() {
            //     console.log("Got change event from field");
        });
    });

    function chekchange(start, end) {
        let space_start_date = start;
        let space_end_date = end;
        let spaceIdd = $('#spaceIdd').val();
        // alert(spaceIdd);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: "{{url('/updateDaterange')}}",
            data: {
                space_start_date: space_start_date,
                space_end_date: space_end_date,
                spaceIdd: spaceIdd,
                _token: CSRF_TOKEN
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'success') {
                    success_noti(response.msg);
                    setTimeout(function() {
                        window.location.reload()
                    }, 2000);
                } else if (response.status == 'notAvailable') {
                    error_noti(response.msg);
                    setTimeout(function() {
                        window.location.reload()
                    }, 2000);
                } else {
                    console.log('error');
                }
            }
        });
    }
</script>
<script>
    // $('.daterange_detail').on('change', function(e) {
    $(".daterange_detail_btn").click(function(e) {
        var form = $("#space_booking_detail_form");
        form.validate({
            rules: {
                space_checkin_date: {
                    required: true,
                },
                space_checkout_date: {
                    required: true,
                },
            },
        });
        if (form.valid() === true) {
            // e.preventDefault();
            var formData = $(form).serialize();
            $(form).ajaxSubmit({
                type: 'POST',
                url: "{{url('changeDaterange')}}",
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        setTimeout(function() { window.location.reload();},2000);
                    } else if (response.status == 'notAvailable') {
                        error_noti(response.msg);
                        setTimeout(function() {
                            window.location.reload()
                        }, 2000);
                    } else {
                        console.log('error');
                    }
                }
            });
        } else {
            e.dismiss;
        }
    });
</script>

@endsection

@section('content')
<main id="main" class="main-body">
    <section class="spaced-sec" style="padding-top: 100px;">
        <div class="container">
            <div class="row spaced-row">
                <h4>{{$space_details->space_name}}</h4>
                <div class="top-spac">
                    <!-- <div class="s-details">
                        <ul>
                            <li>.<i class='bx bxs-star'></i> 5.0</li>
                            <li>.<a href="#">11 reviews</a></li>
                            <li>.Best collection</li>
                            <li>.<a href="#">North Block, Sudan</a></li>
                        </ul>
                    </div>
                    <div class="like">
                        <a href="#"><i class='bx bx-heart'></i>
                            <p>Save</p>
                        </a>
                        <a href="#"><i class='bx bx-share-alt'></i>
                            <p> Share</p>
                        </a>
                    </div> -->
                </div>
            </div>
            <div class="gallery-row row">
                <div class="col-md-6 gallery-col1">

                    @if($space_details->image)
                    <img src="{{ url('public/uploads/space_images')}}/{{$space_details->image}}" alt="">
                    @endif
                </div>
                @if($space_gallery)
                <div class="col-md-6 gallery-col2">
                    <div class="row">
                        @foreach($space_gallery as $space_image)
                        <div class="col-md-6 gallery-col hidden">
                            <img src="{{ url('public/uploads/space_images')}}/{{$space_image->image}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        </div>

    </section>
    <!-- paste here html code -->
    <section class="hosted-sp">
        <div class="container">
            <div class="row hosted-row">
                <div class="space-content">
                    <div class="spaced-row">

                        <div class="top-spac">
                            <div class="s-details">
                                <h4>{{$space_details->space_name}}</h4>
                                <ul>
                                    <li>.{{$space_details->guest_number}} Guests</li>
                                    <li>.{{$space_details->bedroom_number}} bedroom</li>
                                    <li>.+30 Bed</li>
                                    <li>.{{$space_details->bathroom_number}} Bathroom</li>
                                </ul>
                            </div>
                            <div class="organizer">
                                <img src="https://a0.muscache.com/im/pictures/user/0ea3cd74-7ce9-4f59-bf57-334651d552c6.jpg?aki_policy=profile_large" alt="">
                            </div>
                        </div>
                        <div class="co-overlay-text">
                            <div class="d-flex justify-content-start w-100 about-space">
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/area.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="motn-text w-50 d-flex align-items-center mt-2"> Configuration </h4>
                                        <p>{{$space_details->room_number}} Bedrooms ,{{$space_details->bedroom_number}} Bedrooms , {{$space_details->bathroom_number}} Bathrooms, {{$space_details->outdoor_facilities}}, Others</p>
                                    </div>
                                </div>
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/rentsq.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="motn-text w-50 d-flex align-items-center mt-2"> Rent </h4>
                                        <p>PKR {{$space_details->price_per_night}}/-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start w-100 about-space">
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/plot.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="motn-text w-50 d-flex align-items-center mt-2"> Area </h4>
                                        <!-- <p> Built Up area: 1800 sq.ft. (167.23 sq.m.)<br>
                                            Carpet area: 1750 sq.ft. (162.58 sq.m.) </p> -->
                                        <p> Built Up area: {{$space_details->room_size}} sq.ft.<br>
                                            <!-- Carpet area: 1750 sq.ft. (162.58 sq.m.)  -->
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/areaq.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="motn-text w-50 d-flex align-items-center mt-2"> Address </h4>
                                        <p>{{$space_details->space_address}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start w-100 about-space">
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/calendar.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="motn-text  d-flex align-items-center mt-2"> Available From </h4>
                                        <p>Immediate </p>
                                    </div>
                                </div>
                                <div class="d-flex w-50">
                                    <div>
                                        <img src="{{ url('resources/assets/img/calendra.png')}}" class="mr-3">
                                    </div>
                                    <div class="mr-4">
                                        <h4 class="motn-text d-flex align-items-center mt-2"> Posted By and On </h4>
                                        <p>@if(!empty($space_user_details)){{$space_user_details->first_name}} {{$space_user_details->last_name}} on {{ date('M d, Y', strtotime($space_user_details->created_at)) }} @elseif(!empty($admin_user_details)) {{ $admin_user_details->name }} on {{ date('M d, Y', strtotime($admin_user_details->created_at)) }} @else @endif</p>
                                    </div>
                                </div>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14721.698887855493!2d75.86500349999999!3d22.71244985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd166aed3e83%3A0x1e7d346e04a1b812!2sHotel%20Balwas%20International!5e0!3m2!1sen!2sin!4v1659937701338!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>



                </div>

                <div class="space-form">
                    <div class="form">
                        <ul>
                            <li>
                                <h5>PKR {{$space_details->price_per_night}}/- <span>night</span></h5>
                            </li>

                        </ul>
                        <!-- @php echo $space_booked_date @endphp -->
                        <form action="" id="space_booking_detail_form">
                            @csrf
                            <div class="select-date reserved daterange_detail">
                                <div class="date">
                                    <p>Check in</p>
                                    <input type="text" id="space_checkin_date" class="daterange_detail" value="{{ $check_in }}" name="space_checkin_date" required placeholder="Add Date">
                                    <input type="hidden" id="spaceCheckInDate" value="{{ $check_in }}" name="spaceCheckInDate">
                                    <input type="hidden" id="spaceSessionCheckInDate" name="spaceSessionCheckInDate" value="{{ Session::get('space_check_in_date') }}">
                                    <input type="hidden" id="spaceIdd" value="{{ $space_details->space_id }}" name="spaceIdd">
                                </div>
                                <div class="date">
                                    <p>Check Out</p>
                                    <input type="text" id="space_checkout_date" class="daterange_detail" value="{{ $check_out }}" name="space_checkout_date" required placeholder="Add Date">
                                    <input type="hidden" id="spaceCheckOutDate" name="spaceCheckOutDate" value="{{ $check_out }}">
                                    <input type="hidden" id="spaceSessionCheckOutDate" name="spaceSessionCheckOutDate" value="{{ Session::get('space_check_out_date') }}">
                                </div>

                            </div>
                        </form>
                        <!-- <div class="space-sele">
                                <p>Guests</p>
                                <select class="s-siz" name="person">
                                    <option>1 Person </option>
                                    <option>2 Person</option>
                                    <option>3 Person</option>
                                    <option>Couple</option>
                                    <option>Family</option>
                                </select>
                            </div> -->

                        @php
                        $date1_ts = strtotime($check_in);
                        $date2_ts = strtotime($check_out);
                        $diff = $date2_ts - $date1_ts;
                        $booking_days = round($diff / 86400);
                        @endphp
                        @php $total_amount = ($booking_days*$space_details->price_per_night)+$space_details->cleaning_fee+$space_details->city_fee+$space_details->tax_percentage; @endphp
                        @if(!empty($check_in))
                        <a href="{{url('space-checkout')}}?space_id={{$space_details->space_id}}&check_in={{$check_in}}&check_out={{$check_out}}"><button>Reserve</button></a>
                        @else
                        <button type="button" class="daterange_detail_btn">Check Availability</button>
                        @endif

                        <!-- <p class="charge-yet">You won't be charged yet</p> -->
                        <div class="charges <?php if (empty($check_out)) {
                                                echo "hiddenPrice";
                                            } ?>">
                            <ul>
                                <li>PKR {{$space_details->price_per_night}}x{{ $booking_days }} Nights</li>
                                <li>PKR {{$space_details->price_per_night*$booking_days }}/-</li>
                            </ul>
                            <ul>
                                <li>Cleaning Fee</li>
                                <li>{{$space_details->cleaning_fee}}</li>
                            </ul>
                            <ul>
                                <li>City Fee</li>
                                <li>{{$space_details->city_fee}}</li>
                            </ul>
                            <ul>
                                <li>Service tax</li>
                                <li>{{$space_details->tax_percentage}}</li>
                            </ul>
                        </div>
                        <div class="total <?php if (empty($check_out)) {
                                                echo "hiddenPrice";
                                            } ?>">
                            <ul>
                                <li>total with Taxes</li>
                                <li>PKR {{ $total_amount }}</li>
                            </ul>
                        </div>

                    </div>
                    <div class="ktext">
                        <p><span>Lorem ipsum dolor sit</span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, velit.</p>
                        <img src="https://cf.bstatic.com/static/img/genius-globe-with-badge_desktop/d807514761b3684aedebced9265c5548a063b7a0.png" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>


    <section class="user-section" style=" background-color: #f6f6f6 !important; ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="space-category">
                        <!-- <h3 class="mb-4">126 results |Coworking Space in Indore</h3> -->

                        <!-- <div class="botm-info mt-4">
                            <div class="btom-text">
                                <ul>
                                    <li><span>Total Floors:</span> 1 Floors </li>
                                    <li><span>Parking:</span> 2 Covered, 2 Open </li>
                                    <li><span>Power Backup: </span> Full</li>
                                </ul>
                            </div>
                            <div class="btom-text">
                                <ul>
                                    <li><span>Facing:</span> North</li>
                                    <li><span>Rent Agreement Duration:</span> 12 Months</li>
                                    <li><span>Property Age:</span> 0 to 1 Year Old </li>
                                </ul>
                            </div>
                            <div class="btom-text">
                                <ul>
                                    <li><span>Width of facing road:</span> 20.0 Feet </li>
                                    <li><span>Electricity & Water Charges:</span> Charges not included</li>
                                    <li><span>Total Floors:</span> 1 Floors </li>
                                </ul>
                            </div>
                        </div> -->

                        <div class="about-property mt-3 p-4">
                            <h3 class="mb-2">About Property</h3>
                            <!-- <p class="mt-1 w-50"> -->
                            <p class="mt-1">
                                <!-- <span>Address:</span> 102, Kalani Nagar, Indore, M P
                                Spacious, daily needs within reach, near airport. -->
                                {{$space_details->description}}
                            </p>
                        </div>
                        @if(count($space_custom_details) > 0)
                        <div class="about-property mt-3 p-4">
                            <h3 class="mb-2">Semifurnished</h3>
                            <p class="mt-1 w-50">Furnishing Details</p>
                            <div class="furnising-details">
                                @foreach($space_custom_details as $custom_details)
                                <div class="mr-2 funris-faci">
                                    <p>{{ $custom_details->custom_quantity}} {{ $custom_details->custom_label}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if(count($space_extra_option) > 0)
                        <div class="about-property mt-3 p-4">
                            <h3 class="mb-2">Extra Option</h3>
                            <p class="mt-1 w-50">Extra Option Details</p>
                            <div class="furnising-details">
                                @foreach($space_extra_option as $extra_option)
                                <div class="mr-2 funris-faci">
                                    <p>{{ $extra_option->ext_opt_name}} - PKR {{ $extra_option->ext_opt_price}} </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if(count($space_features) > 0)
                        <div class="about-property mt-3 mb-3 p-4">
                            <h3 class="mb-2">Features</h3>
                            <div class="furnising-details">
                                @foreach($space_features as $feature)
                                <div class="mr-2 funris-faci">
                                    <p>{{ $feature->space_feature_name}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="owner-details about-property mt-3 p-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h4 class="mb-4"> Owner Details </h4>
                    <img src="{{ url('resources/assets/img/owner.png')}}" class="owner-img">
                </div>
                <div class="col-md-4">
                    <h4 class="mb-3 send-text"> Send enquiry to Owner</h4>
                    <div class="d-block">
                        <div class="form-check-inline">
                            <h5 class="mb-2 mr-4">You are - </h5>
                            <label class="customradio"><span class="radiotextsty">Individual</span>
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>    
                               
                            <label class="customradio"><span class="radiotextsty">Dealer</span>
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="" placeholder="Name" class="form-control">
                        </div>
                        <div class="mt-2">
                            <input type="text" name="" placeholder="Email" class="form-control">
                        </div>
                        <div class="mt-2">
                            <input type="text" name="" placeholder="IND(+91)" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mt-5 text-area-responsive">
                        <textarea rows="3" placeholder="I am interested in this Property." cols="12" class="w-100 text-area-modal">
                                    </textarea>
                        <label class="i-agree"> <input type="checkbox" name="vehicle1" value="Bike"> I agree to be contacted by Road N
                            stays and others for similar properties or related services via </label>
                    </div>
                    <div class="w-100 text-left">
                        <button type="button" class="send-mail mt-2"> Send email & SMS</button>
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
<!-- MODAL AREA START -->
<div class="modal fade" id="openEditor" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close cros-btn" data-dismiss="modal" style="">×</button>
            <div class="modal-body p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 user-details">
                            <h4> Send Enquiry to Owner</h4>
                            <div class="d-block">
                                <h5 class="mb-3">You are - </h5>
                                <div class="form-check-inline">
                                    <label class="customradio"><span class="radiotextsty">Individual</span>
                                        <input type="radio" checked="checked" name="radio">
                                        <span class="checkmark"></span>
                                    </label>        
                                    <label class="customradio"><span class="radiotextsty">Dealer</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <input type="text" name="" placeholder="Name" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <input type="text" name="" placeholder="Email" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <input type="text" name="" placeholder="IND(+91)" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <textarea rows="5" cols="12" class="w-100 text-area-modal"></textarea>
                                    <label class="i-agree"> <input type="checkbox" name="vehicle1" value="Bike"> I agree to be contacted
                                        by Road N stays and others for similar properties or related services via </label>
                                </div>
                                <div class="w-100 text-center mb-4">
                                    <button type="button" class="send-mail mt-4"> Send email & SMS</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- MODAL AREA END -->


@endsection