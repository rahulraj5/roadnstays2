@extends('admin.layout.layout')
@section('title', 'User - Profile')
@section('current_page_css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('resources/plugins/fullcalendar/main.css')}}">

<!-- <link rel="stylesheet" href="{{ url('resources/assets/css/materialize.min.css') }}"> -->

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

    .d-none {
        display: none;
    }
</style>
@endsection
@section('current_page_js')
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- <script src="{{url('/')}}/resources/assets/js/materialize.min.js"></script> -->
<!-- fullCalendar 2.2.5 -->
<!-- <script src="../plugins/moment/moment.min.js"></script> -->
<script src="{{ asset('resources/plugins/fullcalendar/main.js')}}"></script>
<!-- Page specific script -->



<script>
    var date = new Date();
    var d = date.getDate();
    m = date.getMonth();
    y = date.getFullYear();


    // alert(checkdate);

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar1');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',

            navLinks: true, // can click day/week names to navigate views

            weekNumbers: true,
            weekNumberCalculation: 'ISO',
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                // omitZeroMinute: true,
                meridiem: 'short'
            },
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                // console.log('selected date range arg 1');
                // console.log(arg);

                // var check = convert(arg.start);
                // var today = convert(new Date());
                var check = arg.start;
                var today = new Date();
                // console.log(check);
                // console.log(today);
                var new_check = arg.start;
                var new_today = new Date();
                new_today.setHours(0, 0, 0, 0);

                if (new_check < new_today) {
                    error_noti("You can't select previous date.");
                    // alert("You can't select previous date.");
                } else {
                    // alert("You have selected date successfully.");
                    // success_noti("You have selected date successfully.");
                    openModal1();
                }
                calendar.unselect();
            },
            // editable: true,
            events: [
                <?php if (!empty($room_price_data)) { ?>
                    <?php foreach ($room_price_data as $key => $value) { ?>
                    {
                    title: '<?php echo $value->new_price; ?>',
                    start: '<?php echo $value->price_start_date; ?>',
                    end: '<?php echo date('Y-m-d', strtotime($value->price_end_date . ' +1 day')); ?>',
                    
                    backgroundColor: '#00c0ef',    
                    borderColor: '#00c0ef'  
                    } ,
                    <?php } ?>                     
                <?php } ?>
            ],
            dayClick: function(date, jsEvent, view) {
                console.log('clicked on ' + date.format());
                // alert('clicked');
            },
            eventClick: function(arg) {
                console.log('event click arg 2');
                console.log(arg);
            },
        });
        calendar.render();
    });
</script>

<script>
    // $('.modal-trigger').leanModal();

    function openModal1() {
        //open the modal
        $('#modal1').modal('show');
        
        // var month = $('#calendar1').fullCalendar('getView').intervalStart.format('MM');
        // console.log(month);
        //   $('#modal1').openModal({
        //     dismissible: false
        //   });
    };
</script>

<!-- calendar script end here -->

<script type="text/javascript">
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#files");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });

    $("#room_type").change(function() {
        var room_type_id = this.value;
        $("#room_name-dropdown").html('<option value="">Select room</option>');
        $.ajax({
            url: "{{ url('admin/room_name') }}",
            method: 'POST',
            data: {
                room_type_id: room_type_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(data) {
                $.each(data.room_name_list, function(key, value) {
                    $("#room_name-dropdown").append('<option value="' + value.room_name + '">' + value.room_name + '</option>');
                });
            }
        });
    });
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
        $('#summernote1').summernote()
    })
</script>
<script>
    // $(document).ready(function() {
    //     // Select2 Multiple
    //     $('.select2bs4').select2({
    //         theme: 'bootstrap4'
    //     })
    // });
    $("select").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });
</script>
<script>
    $("#allow_guest_in_room1").click(function() {
        $("#allow_guest_price_div").removeClass('d-none');
        $("#allow_guest_cap_div").removeClass('d-none');
        $("#pay_by_no_guest_div").removeClass('d-none');
    });

    $("#allow_guest_in_room2").click(function() {
        $("#allow_guest_price_div").addClass('d-none');
        $("#allow_guest_cap_div").addClass('d-none');
        $("#pay_by_no_guest_div").addClass('d-none');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var x = 0;

        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append('<div class="form-group"><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><div class="form-group"><select class="form-control select2bs4" name="extra[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent().parent('div').remove();
            x--;
        });
    });
</script>
<script>
    $("#submit_btn").click(function() {
        // alert('shdfsd');
        var form = $("#roomAdmin_form");
        form.validate({
            rules: {
                hotel_name: {
                    required: true,
                },
                room_type: {
                    required: true,
                },
                room_name: {
                    required: true,
                },
                max_adults: {
                    required: true,
                },
                max_childern: {
                    required: true,
                },
                number_of_rooms: {
                    required: true,
                },
                price_per_night: {
                    required: true,
                },
                type_of_price: {
                    required: true,
                },
                tax_percentage: {
                    required: true,
                },
                price_per_night_7d: {
                    required: true,
                },
                price_per_night_30d: {
                    required: true,
                },
                room_size: {
                    required: true,
                },
                bed_type: {
                    required: true,
                },
                private_bathroom: {
                    required: true,
                },
                private_entrance: {
                    required: true,
                },
                family_friendly: {
                    required: true,
                },
                outdoor_facilities: {
                    required: true,
                },
                extra_people: {
                    required: true,
                },
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            $('#submit_btn').prop('disabled', true);
            $('#submit_btn').html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/admin/submitroom',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        if (response.hotel_id == 0) {
                            setTimeout(function() {
                                window.location.href = site_url + "/admin/roomlist"
                            }, 1000);
                        } else {
                            setTimeout(function() {
                                window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id
                            }, 1000);
                            // console.log(response.hotel_id);
                        }
                    } else {
                        error_noti(response.msg);
                        $('#submit_btn').html(
                            `<span class=""></span>Submit`
                        );
                        $('#submit_btn').prop('disabled', false);
                    }
                }
            });
            // event.preventDefault();
        }
    });
</script>

<script>
    $("#custom_price_btn").click(function() {
        // alert('shdfsd');
        var form = $("#customPrice_form");
        form.validate({
            rules: {
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
                new_price: {
                    required: true,
                    number: true,
                },
                // extra_price: {
                //     required: true,
                // },
                price_per_night_7d: {
                    number: true,
                },
                price_per_night_30d: {
                    number: true,
                },
                price_per_weekend: {
                    number: true,
                },
                min_day_of_booking: {
                    number: true,
                },
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            // $('#submit_btn').prop('disabled', true);
            // $('#submit_btn').html(
            //     `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            // );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/admin/roomCustomPriceUpdate',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        setTimeout(function() {window.location.reload();}, 1000);
                        // if (response.hotel_id == 0) {
                        //     setTimeout(function() {
                        //         window.location.href = site_url + "/admin/roomlist"
                        //     }, 1000);
                        // } else {
                        //     setTimeout(function() {
                        //         window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id
                        //     }, 1000);
                        //     // console.log(response.hotel_id);
                        // }
                    } else {
                        error_noti(response.msg);
                        // $('#submit_btn').html(
                        //     `<span class=""></span>Submit`
                        // );
                        // $('#submit_btn').prop('disabled', false);
                    }
                }
            });
            // event.preventDefault();
        }
    });
</script>
@endsection
@section('content')


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="LoginForm">
                <div class="container">
                    <div class="login-form">
                        <div class="main-div">
                            <div class="panel">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h2 class="user-lo">Custom Price</h2>
                                <p>Set custom price for selected period:</p>
                            </div>
                            <form id="customPrice_form" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(!empty($room_data->id))
                                    <input type="hidden" name="hotel_id" id="hotel_id" value="{{$room_data->hotel_id}}">
                                    <input type="hidden" name="room_id" id="room_id" value="{{$room_data->id}}">
                                @endif

                                <div class="form-group">
                                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="end_date" id="end_date" placeholder="End Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_price" id="new_price" placeholder="New Price in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="extra_price" id="extra_price" placeholder="Extra Price per guest per night in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Price per night (7d+)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Price per night (30d+)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_weekend" id="price_per_weekend" placeholder="Price per weekend in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="min_day_of_booking" id="min_day_of_booking" placeholder="Minimum days of booking">
                                </div>
                                <button type="button" id="custom_price_btn" class="btn btn-primary btn-dark button">Set Price for Period</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if(!empty($room_data->hotel_id))
                    <a href="{{url('/admin/viewHotelRooms')}}/{{$room_data->hotel_id}}"><i class="right fas fa-angle-left"></i>Back</a>
                    @else
                    <a href="{{url('/admin/roomlist')}}"><i class="right fas fa-angle-left"></i>Back</a>
                    @endif
                    <!-- <h1>Add Room</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Price Adjustments Calendar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Price Adjustments Calendar for &nbsp;&nbsp;- &nbsp;&nbsp; <b>{{ $room_data->name ?? '' }}</b> ({{ $room_data->hotel_name ?? ''}})</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                        <!-- <div class="col-md-12">
                            <div class="tab-custom-content">
                                <p class="lead mb-0">
                                <h4>Room Name - {{ $room_data->name }} and Hotel Name - {{ $room_data->hotel_name }}</h4>
                                </p>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <div id="calendar1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    <!-- /.row -->

                </div>

                <!-- /.card-body -->

                <div class="card-footer">

                </div>

            </div>

            <!-- /.card -->

        </div>

        <!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>

<!-- /.content-wrapper -->



@endsection