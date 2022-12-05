@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<!-- Daterangepicker -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
<!-- <link href="{{asset('resources/css/daterangemaster/daterangepicker.css')}}" rel="stylesheet"> -->

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
<!-- Daterangepicker -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<!-- <script src="{{ asset('resources/css/daterangemaster/jquery.daterangepicker.js') }}"></script> -->

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
        // $('.reserved').dateRangePicker({
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
            // showDateFilter: function(time, date) {
            //     return '<div style="padding:0 5px;">\
            //                 <span style="font-weight:bold">' + date + '</span>\
            //                 <div style="opacity:0.3;">PKR' + Math.round(Math.random() * 999) + '</div>\
            //             </div>';
            // },
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
            "drops": "auto",

            // new calendar start from here
            // autoClose: true,
            // format: 'DD-MM-YYYY',
            // minDays: 2,
            // selectForward: true,
            // selectBackward: false,
            // showWeekNumbers: false,
            // showTopbar: false,
            // monthSelect: true,
            // yearSelect: true,
            // startDate: today,
            // // endDate: moment().endOf('day').format('DD-MM-YYYY'),
            // // dayDivAttrs: [],
            // // dayTdAttrs: [],
            // getValue: function() {
            //     if ($('#space_checkin_date').val() && $('#space_checkout_date').val())
            //         return $('#space_checkin_date').val() + ' to ' + $('#space_checkout_date').val();
            //     else
            //         return '';
            // },
            // setValue: function(s, s1, s2) {
            //     $('#space_checkin_date').val(s1);
            //     $('#space_checkout_date').val(s2);
            // },
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
                    setTimeout(function() {
                        window.location.reload()
                    });
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
                        setTimeout(function() {
                            window.location.reload();
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
            <div class="col-sm-12">
                <a href="javascript:history.back()"><i class="right fas fa-angle-left"></i>Back</a>
            </div>
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
                                    <!-- <li>.+30 Bed</li> -->
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
                            <?php $address = $space_details->space_address . ',' . $space_details->city . ',' . $country->name; ?>
                            <iframe src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='<?php echo str_replace(",", "", str_replace(" ", "+", $address)); ?>'&z=14&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                    <input type="text" id="space_checkin_date" class="daterange_detail" value="@if(!empty($check_in)){{date('d-m-Y', strtotime($check_in)) }} @endif" name="space_checkin_date" required placeholder="Add Date">
                                    <input type="hidden" id="spaceCheckInDate" value="{{ $check_in }}" name="spaceCheckInDate">
                                    <input type="hidden" id="spaceSessionCheckInDate" name="spaceSessionCheckInDate" value="{{ Session::get('space_check_in_date') }}">
                                    <input type="hidden" id="spaceIdd" value="{{ $space_details->space_id }}" name="spaceIdd">
                                </div>
                                <div class="date">
                                    <p>Check Out</p>
                                    <input type="text" id="space_checkout_date" class="daterange_detail" value="@if(!empty($check_out)){{date('d-m-Y', strtotime($check_out)) }} @endif" name="space_checkout_date" required placeholder="Add Date">
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

                            
                        @if(!empty($details))
                            @php $expense = $details->expense_value @endphp
                            @php $discount = $details->discount @endphp
                        @else
                            @php $expense = 0 @endphp
                            @php $discount = 0 @endphp
                        @endif



                        @php
                        $date1_ts = strtotime($check_in);
                        $date2_ts = strtotime($check_out);
                        $diff = $date2_ts - $date1_ts;
                        $booking_days = round($diff / 86400);
                        @endphp
                        @php $total_amount = ($booking_days*$space_details->price_per_night)+$space_details->cleaning_fee+$space_details->city_fee+$space_details->tax_percentage + $expense - $discount; @endphp


                        @php $total_amount = ($booking_days * $space_details->price_per_night) + $space_details->cleaning_fee + $space_details->city_fee + $space_details->tax_percentage + $expense - $discount @endphp
                        @if($space_details->payment_mode == 2)
                            @php $online_payable_amount = round((($total_amount * $space_details->online_payment_percentage)/100)) @endphp
                            @php $at_desk_payable_amount = $total_amount - $online_payable_amount @endphp
                        @else
                            @php $online_payable_amount = $total_amount; @endphp
                            @php $at_desk_payable_amount = 0; @endphp
                        @endif



                        @if(!empty($check_in))
                        <a href="{{url('space-checkout')}}?space_id={{$space_details->space_id}}&check_in={{$check_in}}&check_out={{$check_out}}"><button>Book Now</button></a>
                        @else
                        <button type="button" class="daterange_detail_btn">Check Availability</button>
                        @endif

                        <!-- <p class="charge-yet">You won't be charged yet</p> -->
                        @if(!empty($space_details->earlybird_discount))
                        <p class="charge-yet">
                            @if(now()->diffInDays($check_in) > $space_details->min_days_in_advance)
                                <b class="tect-event">Pay before {{$space_details->min_days_in_advance}} days to get {{$space_details->earlybird_discount}}% Early bird discount</b>
                            @endif
                        </p>    
                        @endif
                        <div class="charges <?php if (empty($check_out)) {
                                                echo "hiddenPrice";
                                            } ?>">
                            <ul>
                                <li>PKR {{$space_details->price_per_night}}x{{ $booking_days }} Nights</li>
                                <li>PKR {{$space_details->price_per_night*$booking_days }}/-</li>
                            </ul>
                            @if($space_details->cleaning_fee > 0)
                            <ul>
                                <li>Cleaning Fee</li>
                                <li>{{$space_details->cleaning_fee}}/-</li>
                            </ul>
                            @endif
                            @if($space_details->city_fee > 0)
                            <ul>
                                <li>City Fee</li>
                                <li>{{$space_details->city_fee}}/-</li>
                            </ul>
                            @endif
                            @if($space_details->tax_percentage > 0)
                            <ul>
                                <li>Service tax</li>
                                <li>{{$space_details->tax_percentage}}/-</li>
                            </ul>
                            @endif
                            @if(!empty($details->expense_value))
                            <ul>
                                <li>{{$details->expense_name}} Charges</li>
                                <li>PKR {{$details->expense_value}}/-</li>
                            </ul>
                            @endif
                            @if(!empty($details->discount))
                            <ul>
                                <li>{{$details->discount_name}} Discount</li>
                                <li>PKR -{{$details->discount}}/-</li>
                            </ul>
                            @endif

                            @if($space_details->payment_mode == 2)
                            <ul>
                                <li><b>Online Payable Amount ({{$space_details->online_payment_percentage}}%)</b></li>
                                <li><b>PKR {{$online_payable_amount}}</b>/-</li>
                            </ul>
                            <ul>
                                <li>At Desk Payable Amount ({{$space_details->at_desk_payment_percentage}}%)</li>
                                <li>PKR {{$at_desk_payable_amount}}/-</li>
                            </ul>
                            @endif

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
                        <p>
                            @if($space_details->payment_mode ==1)
                          <!-- full payment == 1 -->
                          <p> 100% Online Payment</p>
                          @elseif($space_details->payment_mode ==2)
                          <!-- partial payment == 2 -->
                          <p> Partial payment at the time of booking confirmation ({{$space_details->online_payment_percentage ?? '30'}}% online payment , {{$space_details->at_desk_payment_percentage ?? '70'}}% payment at the desk)</p>
                          @else
                          <!-- pay at desk == 0 -->
                          <p> 100% Offline Payment</p>
                          @endif</p>
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

                        @if(count($space_bedroom_detail) > 0)
                        <div class="about-property mt-3 p-4">
                            <h3 class="mb-2">Sleeping Situation</h3>
                            <p class="mt-1 w-50"><span>Total Bedrooms:</span> {{$space_details->bedroom_number}} Bedrooms</p>
                            <div class="furnising-details">
                                @foreach($space_bedroom_detail as $bedroom_detail)
                                <div class="mr-2 funris-faci">
                                    <p><b>{{ $bedroom_detail->bedroom_name}}</b> - {{ $bedroom_detail->bed_num}} {{ $bedroom_detail->bed_type}} </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

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